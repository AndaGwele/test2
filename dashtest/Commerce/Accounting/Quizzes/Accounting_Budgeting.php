<?php
session_start();
$q = $_SESSION['q'] ?? 0;
$score = $_SESSION['score'] ?? 0;

$questions = [
    ['What is a budget?', 'A plan for income and expenditure', ['A plan for income and expenditure', 'A type of tax', 'An income statement', 'A financial error']],
    ['Zero-based budgeting starts from?', 'Zero', ['Zero', 'Last year’s figures', 'Estimated revenue', 'Market trends']],
    ['Which of the following is a capital expenditure?', 'Buying a delivery van', ['Buying a delivery van', 'Paying rent', 'Wages', 'Electricity']],
    ['A flexible budget adjusts for?', 'Changes in activity levels', ['Changes in activity levels', 'Changes in tax rates', 'Inflation', 'Fixed costs']],
    ['Which budget is prepared first?', 'Sales budget', ['Sales budget', 'Cash budget', 'Production budget', 'Capital budget']],
    ['Cash budget does not include?', 'Depreciation', ['Depreciation', 'Salaries', 'Rent', 'Loan repayment']],
    ['What is variance analysis?', 'Comparing actual to budgeted figures', ['Comparing actual to budgeted figures', 'Predicting sales', 'Recording transactions', 'Auditing']],
    ['Overestimating expenses results in?', 'Understated profits', ['Understated profits', 'Overstated assets', 'Understated liabilities', 'Accurate reporting']],
    ['Short-term budget period is usually?', 'One year or less', ['One year or less', 'Two years', 'Five years', 'Ten years']],
    ['A surplus in the budget means?', 'Income exceeds expenditure', ['Income exceeds expenditure', 'Expenditure exceeds income', 'No income', 'No expenditure']]
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['answer'] === $questions[$q][1]) {
        $_SESSION['score']++;
    }
    $_SESSION['q']++;
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

if ($q >= count($questions)) {
    $score = $_SESSION['score'];
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
        <p>Your score: $score / " . count($questions) . "</p>
        <a href='" . $_SERVER['PHP_SELF'] . "'>Retry Quiz</a>
    </div></body></html>";
    exit();
}

$q_data = $questions[$q];
shuffle($q_data[2]);
$total = count($questions);
$progress = round((($q + 1) / $total) * 100);

echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Accounting Quiz</title>
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
        input[type='submit'] {
            background: #27ae60;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            cursor: pointer;
            margin-top: 25px;
        }
        input[type='submit']:hover {
            background: #219150;
        }
        .question-count {
            font-size: 1rem;
            color: #7f8c8d;
            margin-bottom: 10px;
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
        <div class='question-count'>Question " . ($q + 1) . " of {$total}</div>
        <div class='progress-bar'><div class='progress'></div></div>
        <h2>Accounting Quiz</h2>
        <form method='POST'>
            <p>{$q_data[0]}</p>";
foreach ($q_data[2] as $option) {
    echo "<label><input type='radio' name='answer' value='$option' required> $option</label>";
}
echo "<input type='submit' value='Next'>";
echo "</form></div></body></html>";
?>