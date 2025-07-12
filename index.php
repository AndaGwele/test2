<?php
session_start();
include("session_check.php");

if (isset($_SESSION['logged_in']) && isset($_SESSION['username']) == true) {


    // Simulate database data - in a real app, this would come from a database
    $dashboardData = [
        'totalSales' => 'CA$15,182,000',
        'unitsSold' => 28,
        'avgPricePerSqFt' => 'CA$11,273,000',
        'remainingUnits' => 18,
        'totalAmount' => 'CA$11,273,000',
        'avgPricePerSqFtSmall' => 'CA$39',
        'unitStatus' => [
            ['label' => 'AVAILABLE UNITS', 'value' => 18, 'color' => '#ECD444'],
            ['label' => 'RESERVED UNITS', 'value' => 21, 'color' => '#6B7280'],
            ['label' => 'OFFERED UNITS', 'value' => 11, 'color' => '#1F2937'],
            ['label' => 'SOLD UNITS', 'value' => 28, 'color' => '#ECD444']
        ],
        'totalLeads' => 93
    ];

    // Generate random data for the leads chart
    $leadsData = [];
    for ($i = 1; $i <= 31; $i++) {
        $leadsData[] = rand(5, 35);
    }
    $activeTab = isset($_GET['tab']) ? $_GET['tab'] : 'general';
    $activePage = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
} else {
    header("location:../SignUPlogIN.html");
    exit();
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BA | HomePage</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="app-container">
        <?php include 'sidebar.php'; ?>

        <div class="main-content">
            <div class="dashboard-header">
                <h1 style="Text-align:Center; ">Welcome to Bubble Academy!!</h1>
            </div>

            <div class="tabs">
                <h2 style="Text-align:Center;"> Your Subjects </h2>
            </div>

            <div class="stats-cards">
                <?php include 'stats_cards.php'; ?>
            </div>

            <div class="status-section">
                <div class="status-chart-container" style="overflow-y:scroll; ">
                    <?php include 'status_chart.php'; ?>
                </div>
                <div class=" remaining-stats">
                    <?php //include 'remaining_stats.php'; ?>
                </div>
            </div>

            <div class="leads-chart-container">
                <? php// include 'leads_chart.php'; ?>
            </div>
        </div>
    </div>

    <script src="scripts.js"></script>
</body>

</html>