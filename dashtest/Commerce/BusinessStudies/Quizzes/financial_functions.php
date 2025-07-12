<?php
// Financial Functions Quiz - Grade 12 Business Studies
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Functions Quiz - Grade 12 Business Studies</title>
    <style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #f4f6f8;
        color: #2c3e50;
        padding: 20px;
    }

    .container {
        max-width: 800px;
        margin: auto;
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 10px;
    }

    .question {
        margin-bottom: 20px;
    }

    .question h3 {
        margin-bottom: 10px;
    }

    .options label {
        display: block;
        margin-bottom: 5px;
        cursor: pointer;
    }

    .submit-btn {
        display: block;
        margin: 30px auto 0 auto;
        background: #2980b9;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .result {
        text-align: center;
        margin-top: 20px;
        font-size: 1.2em;
        font-weight: bold;
    }
    </style>
</head>

<body>
    <button onclick='history.back()' style='
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
    <div class="container">
        <h1>Financial Functions Quiz</h1>
        <form id="quizForm">
            <div class="question">
                <h3>1. Placeholder Question?</h3>
                <div class="options">
                    <label><input type="radio" name="q1" value="a"> Option A</label>
                    <label><input type="radio" name="q1" value="b"> Option B</label>
                    <label><input type="radio" name="q1" value="c"> Option C</label>
                    <label><input type="radio" name="q1" value="d"> Option D</label>
                </div>
            </div>
            <div class="question">
                <h3>2. Placeholder Question?</h3>
                <div class="options">
                    <label><input type="radio" name="q2" value="a"> Option A</label>
                    <label><input type="radio" name="q2" value="b"> Option B</label>
                    <label><input type="radio" name="q2" value="c"> Option C</label>
                    <label><input type="radio" name="q2" value="d"> Option D</label>
                </div>
            </div>
            <button type="submit" class="submit-btn">Submit Quiz</button>
        </form>
        <div id="result" class="result"></div>
    </div>
    <script>
    document.getElementById('quizForm').addEventListener('submit', function(e) {
        e.preventDefault();
        let score = 0;
        const answers = {
            q1: 'b',
            q2: 'c'
        };
        const form = new FormData(this);
        for (let q in answers) {
            if (form.get(q) === answers[q]) score++;
        }
        document.getElementById('result').textContent = `You scored ${score}/2`;
    });
    </script>
</body>

</html>