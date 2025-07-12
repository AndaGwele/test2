<?php
// Soil Science Quiz - Grade 12 Agricultural Sciences
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soil Science Quiz - Grade 12 Agricultural Sciences</title>
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

        .back-button-container {
            position: relative;
            padding: 1rem 0;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            background-color: #1a73e8;
            color: white;
            padding: 0.6rem 1.2rem;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .back-button:hover {
            background-color: #1557b0;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .back-button:active {
            transform: translateY(0);
        }

        .back-button::before {
            content: "←";
            margin-right: 8px;
            font-size: 1.1rem;
        }
    </style>
</head>

<body>
    <div class="back-button-container">
        <button class="back-button" onclick="window.history.back()">Back</button>
    </div>
    <div class="container">
        <h1>Soil Science Quiz</h1>
        <form id="quizForm">
            <div class="question">
                <h3>1. What is the main role of humus in the soil?</h3>
                <div class="options">
                    <label><input type="radio" name="q1" value="a"> Reduces erosion</label>
                    <label><input type="radio" name="q1" value="b"> Improves water drainage</label>
                    <label><input type="radio" name="q1" value="c"> Provides plant nutrients</label>
                    <label><input type="radio" name="q1" value="d"> Increases soil acidity</label>
                </div>
            </div>

            <div class="question">
                <h3>2. Which soil texture holds the most water?</h3>
                <div class="options">
                    <label><input type="radio" name="q2" value="a"> Sandy</label>
                    <label><input type="radio" name="q2" value="b"> Loamy</label>
                    <label><input type="radio" name="q2" value="c"> Clay</label>
                    <label><input type="radio" name="q2" value="d"> Silt</label>
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
            const answers = {
                q1: 'c',
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