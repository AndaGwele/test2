<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meiosis & Mitosis Quiz</title>
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
        margin-bottom: 20px;
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
        <h1>Meiosis & Mitosis Quiz</h1>
        <form id="quizForm">
            <div class="question">
                <h3>1. How many daughter cells are produced in meiosis?</h3>
                <div class="options">
                    <label><input type="radio" name="q1" value="0"> 2</label>
                    <label><input type="radio" name="q1" value="1"> 4</label>
                    <label><input type="radio" name="q1" value="2"> 6</label>
                    <label><input type="radio" name="q1" value="3"> 8</label>
                </div>
            </div>
            <div class="question">
                <h3>2. Which process results in identical cells?</h3>
                <div class="options">
                    <label><input type="radio" name="q2" value="0"> Mitosis</label>
                    <label><input type="radio" name="q2" value="1"> Meiosis</label>
                    <label><input type="radio" name="q2" value="2"> Crossing over</label>
                    <label><input type="radio" name="q2" value="3"> Fertilization</label>
                </div>
            </div>
            <button type="submit" class="submit-btn">Submit Quiz</button>
        </form>
        <div id="result" class="result"></div>
    </div>
    <script>
    const answers = {
        q1: "1",
        q2: "0"
    };
    document.getElementById("quizForm").addEventListener("submit", function(e) {
        e.preventDefault();
        let score = 0;
        const form = new FormData(this);
        for (let key in answers) {
            if (form.get(key) === answers[key]) score++;
        }
        document.getElementById("result").textContent = `You scored ${score}/2`;
    });
    </script>
</body>

</html>