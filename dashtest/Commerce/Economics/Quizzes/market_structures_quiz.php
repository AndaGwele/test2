<?php
session_start();
$questions = [['Monopoly has?', 'One seller', ['One seller', 'Many sellers', 'Free entry', 'Perfect knowledge']], ['Oligopoly is?', 'Few large sellers', ['Few large sellers', 'Many buyers', 'Perfect info', 'No ads']], ['Perfect competition has?', 'Identical products', ['Identical products', 'High barriers', 'Advertising', 'Monopoly control']], ['Monopolistic competition has?', 'Differentiated products', ['Differentiated products', 'One seller', 'Same price', 'Perfect substitutes']], ['Barriers to entry mean?', 'Hard to start competing', ['Hard to start competing', 'Open to all', 'No sellers', 'Public support']], ['In monopoly, price is?', 'Set by firm', ['Set by firm', 'Market determined', 'Govt fixed', 'Demand only']], ['Price wars often occur in?', 'Oligopoly', ['Oligopoly', 'Monopoly', 'Perfect competition', 'Agriculture']], ['Non-price competition includes?', 'Branding', ['Branding', 'Lower prices', 'Raising price', 'Stockpiling']], ['In perfect competition, profits are?', 'Normal in long run', ['Normal in long run', 'Very high', 'Always rising', 'None']], ['Cartels are?', 'Firms colluding', ['Firms colluding', 'Govt groups', 'Consumers', 'Regulators']]];

if (!isset($_SESSION['q']))
    $_SESSION['q'] = 0;
if (!isset($_SESSION['score']))
    $_SESSION['score'] = 0;
if (!isset($_SESSION['answers']))
    $_SESSION['answers'] = [];

$q = $_SESSION['q'];
$score = $_SESSION['score'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['back'])) {
        if ($q > 0) {
            $_SESSION['q']--;
            $prev_q = $_SESSION['q'];
            if ($_SESSION['answers'][$prev_q] === $questions[$prev_q][1]) {
                $_SESSION['score']--;
            }
            unset($_SESSION['answers'][$prev_q]);
        }
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

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

$q_data = $questions[$q];
$questionText = $q_data[0];
$correctAnswer = $q_data[1];
$options = $q_data[2];
shuffle($options);

$total = count($questions);
$progress = round((($q + 1) / $total) * 100);

echo "<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Market Structures Quiz</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #eef2f7; padding: 40px 20px; }
        .quiz-container { max-width: 700px; background: white; margin: auto; padding: 30px; border-radius: 12px;
                          box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        h2 { color: #2c3e50; }
        form p { font-size: 1.1rem; }
        label { display: block; margin: 10px 0; background: #f5f7fa; padding: 10px 15px; border-radius: 8px; cursor: pointer; }
        input[type='radio'] { margin-right: 10px; }
        .button-group { display: flex; justify-content: space-between; margin-top: 20px; }
        input[type='submit'] {
            background: #27ae60; color: white; padding: 10px 20px; border: none;
            border-radius: 8px; font-size: 1rem; cursor: pointer; width: 48%;
        }
        input[type='submit']:hover { background: #219150; }
        .progress-bar { width: 100%; background: #ccc; border-radius: 10px; height: 20px; margin-bottom: 20px; overflow: hidden; }
        .progress { height: 100%; background: #27ae60; width: {$progress}%; transition: width 0.3s ease-in-out; }
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