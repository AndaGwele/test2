<?php
session_start();

// Define questions
$questions = [
    ['The income statement shows?', 'Profit or loss', ['Profit or loss', 'Assets', 'Liabilities', 'Cash flow']],
    ['Which is a current asset?', 'Inventory', ['Inventory', 'Land', 'Vehicles', 'Bank loan']],
    ['Which account appears on the balance sheet?', 'Accounts receivable', ['Accounts receivable', 'Sales', 'Expenses', 'Revenue']],
    ['The accounting equation is?', 'Assets = Liabilities + Equity', ['Assets = Liabilities + Equity', 'Assets + Liabilities = Equity', 'Equity = Revenue - Expenses', 'Cash = Assets - Liabilities']],
    ['Revenue is recorded when?', 'Earned', ['Earned', 'Received', 'Invoiced', 'Paid']],
    ['Depreciation is recorded as?', 'An expense', ['An expense', 'An asset', 'A liability', 'Equity']],
    ['Net profit is found by?', 'Revenue - Expenses', ['Revenue - Expenses', 'Assets - Liabilities', 'Income - Drawings', 'Capital + Profit']],
    ['A balance sheet shows?', 'Financial position', ['Financial position', 'Cash inflows', 'Income over time', 'Sales records']],
    ['Cost of sales is?', 'Opening inventory + Purchases - Closing inventory', ['Opening inventory + Purchases - Closing inventory', 'Revenue - Expenses', 'Cash in hand', 'Liabilities + Equity']],
    ['Drawings reduce?', 'Owner’s equity', ['Owner’s equity', 'Assets', 'Liabilities', 'Income']]
];

// Initialize
if (!isset($_SESSION['q']))
    $_SESSION['q'] = 0;
if (!isset($_SESSION['score']))
    $_SESSION['score'] = 0;
if (!isset($_SESSION['answers']))
    $_SESSION['answers'] = [];

$q = $_SESSION['q'];
$score = $_SESSION['score'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Back button pressed
    if (isset($_POST['back'])) {
        if ($q > 0) {
            $_SESSION['q']--;
            $prev_q = $_SESSION['q'];
            // Remove score if previous answer was correct
            if ($_SESSION['answers'][$prev_q] === $questions[$prev_q][1]) {
                $_SESSION['score']--;
            }
            unset($_SESSION['answers'][$prev_q]);
        }
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    // Next or submit
    $selected = $_POST['answer'] ?? null;
    if ($selected !== null) {
        $_SESSION['answers'][$q] = $selected;
        if ($selected === $questions[$q][1]) {
            $_SESSION['score']++;
        }
    }

    $_SESSION['q']++;

    if ($_SESSION['q'] >= count($questions)) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Quiz complete
if ($q >= count($questions)) {
    $finalScore = $_SESSION['score'];
    session_destroy();
    echo "<!DOCTYPE html>
    <html><head><title>Quiz Complete</title><style>
        body { font-family: Arial, sans-serif; background: #f9f9f9; text-align: center; padding: 50px; }
        .result-box { background: #fff; padding: 30px; margin: auto; max-width: 400px; border-radius: 12px;
                      box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        h2 { color: #2c3e50; }
        p { font-size: 1.2rem; }
        a {
            display: inline-block; margin-top: 20px; padding: 10px 20px; background: #27ae60;
            color: #fff; border-radius: 8px; text-decoration: none;
        }
        a:hover { background: #219150; }
    </style></head><body>
    <div class='result-box'>
        <h2>Quiz Complete</h2>
        <p>Your score: $finalScore / " . count($questions) . "</p>
        <a href='" . $_SERVER['PHP_SELF'] . "'>Retry Quiz</a>
    </div></body></html>";
    exit();
}

// Get question and shuffle options
$q_data = $questions[$q];
$questionText = $q_data[0];
$correctAnswer = $q_data[1];
$options = $q_data[2];
shuffle($options);
$total = count($questions);
$progress = round((($q + 1) / $total) * 100);

// HTML Output
echo "<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Accounting Quiz</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #eef2f7; padding: 40px 20px; }
        .quiz-container { max-width: 700px; background: white; margin: auto; padding: 30px; border-radius: 12px;
                          box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        h2 { color: #2c3e50; }
        form p { font-size: 1.1rem; }
        label { display: block; margin: 10px 0; background: #f5f7fa; padding: 10px 15px; border-radius: 8px; cursor: pointer; }
        input[type='radio'] { margin-right: 10px; }
        .button-group {
            display: flex; justify-content: space-between; margin-top: 20px;
        }
        input[type='submit'] {
            background: #27ae60; color: white; padding: 10px 20px; border: none;
            border-radius: 8px; font-size: 1rem; cursor: pointer; width: 48%;
        }
        input[type='submit']:hover { background: #219150; }
        .progress-bar {
            width: 100%; background: #ccc; border-radius: 10px; height: 20px; margin-bottom: 20px;
            overflow: hidden;
        }
        .progress {
            height: 100%; background: #27ae60; width: {$progress}%;
            transition: width 0.3s ease-in-out;
        }
    </style>
</head>
<body>
<button 
  onclick='history.back()'
  style='
    padding: 10px 20px; 
    background-color: #4CAF50; 
    color: white; 
    border: none; 
    border-radius: 5px; 
    cursor: pointer; 
    font-size: 16px;
  '>
  ← Back
</button>
    <div class='quiz-container'>
        <div class='progress-bar'><div class='progress'></div></div>
        <h2>Question " . ($q + 1) . " of $total</h2>
        <form method='POST'>
            <p>$questionText</p>";
foreach ($options as $option) {
    echo "<label><input type='radio' name='answer' value='$option' required> $option</label>";
}
echo "<div class='button-group'>";
if ($q > 0) {
    echo "<input type='submit' name='back' value='Previous'>";
} else {
    echo "<span></span>";
}
echo "<input type='submit' value='" . ($q === $total - 1 ? "Submit" : "Next") . "'>";
echo "</div></form></div></body></html>";
?>