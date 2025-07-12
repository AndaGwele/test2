<?php
// Crop Production Quiz - Grade 12 Agricultural Sciences
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crop Production Quiz - Grade 12 Agricultural Sciences</title>
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
            background: #27ae60;
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
    <div class="container">
        <h1>Crop Production Quiz</h1>
        <form id="quizForm">
            <div class="question">
                <h3>1. Which of the following is NOT a macronutrient for plants?</h3>
                <div class="options">
                    <label><input type="radio" name="q1" value="a"> Nitrogen</label>
                    <label><input type="radio" name="q1" value="b"> Potassium</label>
                    <label><input type="radio" name="q1" value="c"> Zinc</label>
                    <label><input type="radio" name="q1" value="d"> Phosphorus</label>
                </div>
            </div>

            <div class="question">
                <h3>2. What is the ideal soil pH for most crop growth?</h3>
                <div class="options">
                    <label><input type="radio" name="q2" value="a"> 3.5 – 4.5</label>
                    <label><input type="radio" name="q2" value="b"> 5.5 – 7.0</label>
                    <label><input type="radio" name="q2" value="c"> 7.5 – 9.0</label>
                    <label><input type="radio" name="q2" value="d"> 9.0 – 10.5</label>
                </div>
            </div>

            <button type="submit" class="submit-btn">Submit Quiz</button>
        </form>
        <div id="result" class="result"></div>
    </div>

    <script>
        document.getElementById('quizForm').addEventListener('submit', function (e) {
            e.preventDefault();
            let score = 0;
            const answers = { q1: 'c', q2: 'b' };
            const form = new FormData(this);
            for (let q in answers) {
                if (form.get(q) === answers[q]) score++;
            }
            document.getElementById('result').textContent = `You scored ${score}/2`;
        });
    </script>
</body>

</html>