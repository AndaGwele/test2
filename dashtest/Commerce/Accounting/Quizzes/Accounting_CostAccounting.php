<?php
session_start();

// Initialize question and score
if (!isset($_SESSION['q']))
    $_SESSION['q'] = 0;
if (!isset($_SESSION['score']))
    $_SESSION['score'] = 0;

$q = $_SESSION['q'];
$score = $_SESSION['score'];

$questions = [
    ['Fixed costs?', 'Remain constant', ['Remain constant', 'Change with output', 'Change with revenue', 'Are variable']],
    ['Variable costs?', 'Change with output', ['Change with output', 'Stay constant', 'Are fixed', 'Include rent']],
    ['Break-even point is where?', 'No profit no loss', ['No profit no loss', 'Profit is maximum', 'Costs are zero', 'Revenue is zero']],
    ['Direct costs are?', 'Traced to a specific product', ['Traced to a specific product', 'Indirect', 'Overhead', 'Fixed only']],
    ['Overhead costs are?', 'Indirect costs', ['Indirect costs', 'Direct', 'Variable', 'Capital']],
    ['Unit cost is?', 'Total cost ÷ units', ['Total cost ÷ units', 'Fixed cost', 'Revenue', 'Profit margin']],
    ['Which is not a cost category?', 'Revenue', ['Revenue', 'Fixed', 'Variable', 'Direct']],
    ['A cost center is?', 'A unit to which costs are assigned', ['A unit to which costs are assigned', 'A profit center', 'Customer', 'Supplier']],
    ['Contribution is?', 'Selling price - Variable cost', ['Selling price - Variable cost', 'Profit', 'Revenue - Expenses', 'Cost - Revenue']],
    ['Cost-volume-profit analysis helps?', 'Decision making', ['Decision making', 'Banking', 'Auditing', 'Inventory tracking']]
];

$totalQuestions = count($questions);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['back'])) {
        if ($_SESSION['q'] > 0) {
            $_SESSION['q']--;
            if (isset($_SESSION['last_correct']) && $_SESSION['last_correct']) {
                $_SESSION['score']--;
            }
        }
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        $selected = $_POST['answer'];
        $correct = $questions[$q][1];
        $_SESSION['last_correct'] = ($selected === $correct);
        if ($_SESSION['last_correct'])
            $_SESSION['score']++;
        $_SESSION['q']++;
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}

if ($q >= $totalQuestions) {
    $finalScore = $_SESSION['score'];
    session_destroy();
    echo "<!DOCTYPE html>
    <html><head><title>Quiz Complete</title><style>
        body { font-family: Arial, sans-serif; background: #f0f4f8; text-align: center; padding: 60px; }
        .result-box { background: #fff; padding: 40px; margin: auto; max-width: 500px; border-radius: 12px;
                      box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        h2 { color: #2c3e50; }
        p { font-size: 1.3rem; margin-top: 10px; }
        a {
            display: inline-block; margin-top: 30px;
            padding: 12px 25px; background: #27ae60; color: #fff; border-radius: 8px;
            text-decoration: none; font-weight: bold;
        }
        a:hover { background: #219150; }
    </style></head><body>
    <div class='result-box'>
        <h2>Quiz Complete</h2>
        <p>Your score: $finalScore / $totalQuestions</p>
        <a href='" . $_SERVER['PHP_SELF'] . "'>Retry Quiz</a>
    </div></body></html>";
    exit();
}

$q_data = $questions[$q];
shuffle($q_data[2]);
$progress = round((($q + 1) / $totalQuestions) * 100);

echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Costing Quiz</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #eef2f7;
            margin: 0;
            padding: 40px 20px;
        }
        .quiz-container {
            max-width: 700px;
            background: #ffffff;
            margin: auto;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #2c3e50;
            margin-bottom: 15px;
        }
        .progress-bar {
            width: 100%;
            background: #ccc;
            border-radius: 20px;
            overflow: hidden;
            margin-bottom: 25px;
            height: 20px;
        }
        .progress {
            height: 100%;
            background: #27ae60;
            width: {$progress}%;
            transition: width 0.3s ease-in-out;
        }
        form p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 12px;
            background: #f5f7fa;
            padding: 10px 15px;
            border-radius: 8px;
            cursor: pointer;
        }
        input[type='radio'] {
            margin-right: 10px;
        }
        .btn-group {
            display: flex;
            justify-content: space-between;
            margin-top: 25px;
        }
        .btn-group input {
            background: #27ae60;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            cursor: pointer;
            flex: 1;
            margin: 0 5px;
        }
        .btn-group input:hover {
            background: #219150;
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
        <div class='question-count'>Question " . ($q + 1) . " of $totalQuestions</div>
        <div class='progress-bar'><div class='progress'></div></div>
        <h2>Costing Concepts Quiz</h2>
        <form method='POST'>
            <p>{$q_data[0]}</p>";
foreach ($q_data[2] as $option) {
    echo "<label><input type='radio' name='answer' value='$option' required> $option</label>";
}
echo "<div class='btn-group'>
        <input type='submit' name='back' value='Back'" . ($q === 0 ? " disabled" : "") . ">
        <input type='submit' value='Next'>
    </div>";
echo "</form></div></body></html>";
?>