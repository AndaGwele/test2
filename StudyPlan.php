<?php

include("../Conn test.php");
session_start();
if (!isset($_SESSION['id'])) {
    header("Location:../SignUPlogIN.html");
    exit();
}

$user_id = $_SESSION['id'];

$stmt = $conn->prepare("SELECT faculty FROM users WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$userFaculty = '';
if ($row = $result->fetch_assoc()) {
    $userFaculty = $row['faculty'];
}
$stmt->close();

function hasConflict($start, $end, $conn)
{
    $stmt = $conn->prepare("SELECT * FROM study_plan WHERE (start_time < ? AND end_time > ?) AND user_id = ?");
    $stmt->bind_param("ssi", $end, $start, $_SESSION['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->num_rows > 0;
}

$subjectsList = [];
$stmt = $conn->prepare("SELECT name FROM subjects WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $subjectsList[] = $row['name'];
}
$stmt->close();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['subject']) && isset($_POST['duration'])) {
    $subject = $_POST['subject'];
    $start = $_POST['start'];
    $duration = (int) $_POST['duration'];
    $end = date('Y-m-d\TH:i', strtotime("+$duration minutes", strtotime($start)));

    if (hasConflict($start, $end, $conn)) {
        echo "<script>alert('Time conflict detected. Please choose a different time.');</script>";
    } else {
        $stmt = $conn->prepare("INSERT INTO study_plan (user_id, subject, start_time, end_time) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $user_id, $subject, $start, $end);
        $stmt->execute();
        $stmt->close();
        echo "<script>alert('Study Plan Saved!');</script>";
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['event_id'])) {
    $id = $_POST['event_id'];
    $start = $_POST['new_start'];
    $end = $_POST['new_end'];
    $stmt = $conn->prepare("UPDATE study_plan SET start_time = ?, end_time = ? WHERE id = ?");
    $stmt->bind_param("ssi", $start, $end, $id);
    $stmt->execute();
    echo json_encode(['success' => true]);
    exit();
}

// Auto-delete expired plans
$conn->query("DELETE FROM study_plan WHERE end_time < NOW() AND user_id = $user_id");

$plans = [];
$stmt = $conn->prepare("SELECT * FROM study_plan WHERE user_id = ? ORDER BY start_time ASC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $plans[] = $row;
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Study Planner</title>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet" />
    <style>
    body {
        font-family: Arial, sans-serif;
        background: #f0f0f0;
        padding: 20px;
    }

    .container {
        max-width: 1000px;
        margin: auto;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1,
    h2 {
        text-align: center;
    }

    label {
        display: block;
        margin-top: 10px;
    }

    select,
    input {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        background-color: #4caf50;
        color: white;
        padding: 10px 15px;
        margin-top: 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }

    .back-button {
        margin-bottom: 20px;
        display: inline-block;
        padding: 10px 20px;
        background-color: #1a73e8;
        color: #fff;
        border-radius: 5px;
        text-decoration: none;
    }

    .plan-list,
    .calendar {
        margin-top: 30px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th,
    td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: center;
    }

    th {
        background-color: #f9f9f9;
    }
    </style>
</head>

<body>
    <div class="container">
        <a href="javascript:history.back()" class="back-button">← Back</a>
        <h1>Smart Study Planner</h1>
        <form method="POST">
            <label for="subject">Choose a Subject:</label>
            <select name="subject" id="subject" required>
                <option value="">-- Select Subject --</option>
                <?php foreach ($subjectsList as $subject): ?>
                <option value="<?= htmlspecialchars($subject) ?>"><?= htmlspecialchars($subject) ?></option>
                <?php endforeach; ?>
            </select>

            <label for="start">Start Time:</label>
            <input type="datetime-local" name="start" id="start" required />

            <label for="duration">Study Duration (in minutes):</label>
            <input type="number" name="duration" id="duration" min="15" step="15" required />

            <button type="submit">Save Study Plan</button>
        </form>

        <div class="plan-list">
            <h2>My Study Schedule</h2>
            <table>
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($plans as $plan): ?>
                    <tr>
                        <td><?= htmlspecialchars($plan['subject']) ?></td>
                        <td><?= date('D, M j Y, H:i', strtotime($plan['start_time'])) ?></td>
                        <td><?= date('D, M j Y, H:i', strtotime($plan['end_time'])) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="calendar">
            <h2>Calendar View</h2>
            <div id='calendar'></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            editable: true,
            selectable: true,
            events: [
                <?php foreach ($plans as $plan): ?> {
                    id: "<?= $plan['id'] ?>",
                    title: "<?= htmlspecialchars($plan['subject']) ?>",
                    start: "<?= $plan['start_time'] ?>",
                    end: "<?= $plan['end_time'] ?>",
                    backgroundColor: "#007bff",
                    borderColor: "#007bff",
                    textColor: "#fff",
                    allDay: false
                },
                <?php endforeach; ?>
            ],
            eventDrop: function(info) {
                updateEvent(info.event);
            },
            eventResize: function(info) {
                updateEvent(info.event);
            }
        });
        calendar.render();

        function updateEvent(event) {
            fetch('', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams({
                        event_id: event.id,
                        new_start: event.start.toISOString(),
                        new_end: event.end.toISOString()
                    })
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.success ? 'Event updated successfully.' : 'Failed to update event.');
                });
        }
    });
    </script>
</body>

</html>