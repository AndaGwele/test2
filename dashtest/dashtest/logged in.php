<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Login - GitHub Style</title>
    <style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    body {
        display: flex;
        background-color: #0d1117;
        color: #c9d1d9;
    }

    .sidebar {
        width: 250px;
        height: 100vh;
        background: #161b22;
        padding: 20px;
        display: flex;
        flex-direction: column;
    }

    .sidebar h2 {
        font-size: 18px;
        margin-bottom: 15px;
        color: #58a6ff;
    }

    .sidebar ul {
        list-style: none;
    }

    .sidebar ul li {
        padding: 10px;
        cursor: pointer;
        border-radius: 5px;
    }

    .sidebar ul li:hover {
        background: #21262d;
    }

    .content {
        flex: 1;
        padding: 20px;
    }

    .calendar-container {
        background: #161b22;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
    }

    .months {
        display: flex;
        justify-content: space-between;
        font-size: 12px;
        margin-bottom: 5px;
    }

    .days-labels {
        display: grid;
        grid-template-rows: repeat(7, 12px);
        font-size: 10px;
        margin-right: 5px;
    }

    .calendar-wrapper {
        display: flex;
    }

    .calendar {
        display: grid;
        grid-template-columns: repeat(53, 12px);
        grid-template-rows: repeat(7, 12px);
        gap: 3px;
    }

    .day {
        width: 12px;
        height: 12px;
        background: #161b22;
        border-radius: 2px;
    }

    .level-1 {
        background: #0e4429;
    }

    .level-2 {
        background: #006d32;
    }

    .level-3 {
        background: #26a641;
    }

    .level-4 {
        background: #39d353;
    }
    </style>
</head>

<body>
    <div class="sidebar">
        <h2>Dashboard</h2>
        <ul>
            <li>🏫 Topics & Lessons</li>
            <li>📝 Tests & Exams</li>
            <li>🔖 Bookmarks</li>
            <li>🏆 Daily Challenges</li>
        </ul>
    </div>
    <div class="content">
        <div class="calendar-container">
            <h2>Login Activity (Past Year)</h2>
            <div class="months">
                <?php
                $start_date = strtotime("-364 days");
                for ($i = 0; $i < 12; $i++) {
                    $month = date("M", strtotime("+" . ($i * 30) . " days", $start_date));
                    echo "<span>$month</span>";
                }
                ?>
            </div>
            <div class="calendar-wrapper">
                <div class="days-labels">
                    <div>Mon</div>
                    <div>Wed</div>
                    <div>Fri</div>
                </div>
                <div class="calendar">
                    <?php
                    session_start();
                    if (!isset($_SESSION['login_history'])) {
                        $_SESSION['login_history'] = [];
                    }

                    $login_counts = array_count_values($_SESSION['login_history']);
                    for ($i = 364; $i >= 0; $i--) {
                        $date = date('Y-m-d', strtotime("-" . $i . " days"));
                        $count = isset($login_counts[$date]) ? $login_counts[$date] : 0;
                        $class = "day";
                        if ($count > 10)
                            $class .= " level-4";
                        elseif ($count > 5)
                            $class .= " level-3";
                        elseif ($count > 2)
                            $class .= " level-2";
                        elseif ($count > 0)
                            $class .= " level-1";
                        echo "<div class='$class' title='$date: $count logins'>$date</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>