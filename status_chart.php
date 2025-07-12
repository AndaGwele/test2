<?php

include("../Conn test.php");
if (!isset($_SESSION['id']))
    header("Location:../SignUPlogIN.html");
$user_id = $_SESSION['id'];

// Fetch notes from the DB
$stmt = $conn->prepare("SELECT subject_name, created_at FROM notes WHERE user_id = ? ORDER BY created_at ASC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Data arrays
$notes_per_subject = [];
$notes_per_month = [];

while ($row = $result->fetch_assoc()) {
    $subject = $row['subject_name'];
    $created_at = $row['created_at'];

    // Count per subject
    if (!isset($notes_per_subject[$subject]))
        $notes_per_subject[$subject] = 0;
    $notes_per_subject[$subject]++;

    // Count per month (YYYY-MM)
    $month = date("Y-m", strtotime($created_at));
    if (!isset($notes_per_month[$month]))
        $notes_per_month[$month] = 0;
    $notes_per_month[$month]++;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Note Analytics</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f4f4;
    }

    .container {
        max-width: 1100px;
        margin: 40px auto;
        background: #fff;
        border-radius: 8px;
        padding: 20px 30px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 30px;
    }

    .charts {
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
        justify-content: center;
    }

    .chart-card {
        flex: 1 1 450px;
    }

    canvas {
        width: 40%;
        height: 300px;
        max-height: 400px;
    }

    .back-btn {
        display: inline-block;
        margin: 10px 0 20px 0;
        background-color: #2196F3;
        color: white;
        padding: 10px 20px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: bold;
    }
    </style>
</head>

<body>
    <div class="container">
        <!--a href="javascript:history.back()" class="back-btn">← Back</a-->
        <h2>📊 Notes Analytics</h2>
        <div class="charts">
            <div class="chart-card">
                <h3>Notes Per Subject</h3>
                <canvas id="subjectChart"></canvas>
            </div>
            <div class="chart-card">
                <h3>Notes Per Month</h3>
                <canvas id="monthChart"></canvas>
            </div>
        </div>
    </div>

    <script>
    const subjectLabels = <?= json_encode(array_keys($notes_per_subject)) ?>;
    const subjectData = <?= json_encode(array_values($notes_per_subject)) ?>;

    const monthLabels = <?= json_encode(array_keys($notes_per_month)) ?>;
    const monthData = <?= json_encode(array_values($notes_per_month)) ?>;

    // Chart: Notes per Subject
    new Chart(document.getElementById('subjectChart'), {
        type: 'bar',
        data: {
            labels: subjectLabels,
            datasets: [{
                label: 'Notes',
                data: subjectData,
                backgroundColor: '#4caf50'
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    // Chart: Notes per Month
    new Chart(document.getElementById('monthChart'), {
        type: 'bar',
        data: {
            labels: monthLabels,
            datasets: [{
                label: 'Notes',
                data: monthData,
                backgroundColor: '#2196F3'
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
    </script>
</body>

</html>