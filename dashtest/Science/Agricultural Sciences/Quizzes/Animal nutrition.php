<?php
// Animal Nutrition Quiz - Grade 12 Agricultural Sciences
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Nutrition Quiz - Grade 12 Agricultural Sciences</title>
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
        <h1>Animal Nutrition Quiz</h1>
        <form id="quizForm">
            <div class="question">
                <h3>1. What is the main function of carbohydrates in animal feed?</h3>
                <div class="options">
                    <label><input type="radio" name="q1" value="a"> Build body tissues</label>
                    <label><input type="radio" name="q1" value="b"> Provide energy</label>
                    <label><input type="radio" name="q1" value="c"> Enhance digestion</label>
                    <label><input type="radio" name="q1" value="d"> Stimulate growth hormones</label>
                </div>
            </div>

            <div class="question">
                <h3>2. Which nutrient is responsible for muscle development in livestock?</h3>
                <div class="options">
                    <label><input type="radio" name="q2" value="a"> Vitamins</label>
                    <label><input type="radio" name="q2" value="b"> Carbohydrates</label>
                    <label><input type="radio" name="q2" value="c"> Proteins</label>
                    <label><input type="radio" name="q2" value="d"> Fats</label>
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
            const answers = { q1: 'b', q2: 'c' };
            const form = new FormData(this);
            for (let q in answers) {
                if (form.get(q) === answers[q]) score++;
            }
            document.getElementById('result').textContent = `You scored ${score}/2`;
        });
    </script>
</body>

</html>