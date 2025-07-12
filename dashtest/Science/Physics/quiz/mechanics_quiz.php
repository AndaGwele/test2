<?php
// Mechanics Quiz - Grade 12 Physical Sciences
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mechanics Quiz - Grade 12 Physical Sciences</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #667eea, #764ba2);
        padding: 20px;
        color: #2c3e50;
    }

    .container {
        max-width: 900px;
        margin: auto;
        background: #fff;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        position: relative;
    }

    .header {
        text-align: center;
        margin-bottom: 30px;
    }

    .header h1 {
        font-size: 2.5rem;
        background: linear-gradient(90deg, #667eea, #764ba2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .progress-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #f1f1f1;
        border-radius: 12px;
        padding: 15px 25px;
        margin-bottom: 30px;
    }

    .progress-info {
        font-weight: bold;
        font-size: 1.1rem;
    }

    .progress-tracker {
        display: flex;
        gap: 10px;
    }

    .tracker-item {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        border: 2px solid #ccc;
        cursor: pointer;
    }

    .tracker-item.current {
        background: #764ba2;
        color: white;
        border-color: #5b3b8c;
    }

    .tracker-item.answered {
        background: #27ae60;
        color: white;
        border-color: #1e8449;
    }

    .question {
        background: #fafafa;
        border-left: 5px solid #667eea;
        padding: 20px;
        border-radius: 12px;
        margin-bottom: 25px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.05);
    }

    .question h3 {
        margin-bottom: 15px;
        font-size: 1.2rem;
    }

    .options label {
        display: block;
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 8px;
        background: #f0f0f0;
        border: 2px solid transparent;
        transition: all 0.2s ease;
    }

    .options label:hover {
        background: #e0e7ff;
        border-color: #a5b4fc;
    }

    .options input[type="radio"] {
        margin-right: 10px;
        accent-color: #667eea;
    }

    .navigation {
        display: flex;
        justify-content: space-between;
        margin: 20px 0;
    }

    .nav-btn {
        background: #764ba2;
        color: white;
        padding: 12px 24px;
        border: none;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .nav-btn:hover {
        background: #5b3b8c;
    }

    .submit-btn {
        background: linear-gradient(to right, #27ae60, #2ecc71);
        width: 100%;
        padding: 15px;
        border: none;
        color: white;
        font-size: 1.2rem;
        border-radius: 10px;
        margin-top: 20px;
        cursor: pointer;
    }

    .submit-btn:hover {
        opacity: 0.95;
    }

    .result {
        text-align: center;
        margin-top: 25px;
        font-size: 1.3rem;
        font-weight: bold;
        display: none;
    }

    .result.success {
        color: #27ae60;
    }

    .result.failure {
        color: #c0392b;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Mechanics Quiz</h1>
        </div>

        <div class="progress-container">
            <div class="progress-info">Question <span id="current-q">1</span> of 5</div>
            <div class="progress-tracker" id="progress-tracker"></div>
        </div>

        <form id="quizForm">
            <div class="question" id="q1">
                <h3>1. What is the unit of force in the SI system?</h3>
                <div class="options">
                    <label><input type="radio" name="q1" value="a"> Kilogram</label>
                    <label><input type="radio" name="q1" value="b"> Newton</label>
                    <label><input type="radio" name="q1" value="c"> Pascal</label>
                    <label><input type="radio" name="q1" value="d"> Joule</label>
                </div>
            </div>

            <div class="question" id="q2">
                <h3>2. What is the acceleration due to gravity on Earth?</h3>
                <div class="options">
                    <label><input type="radio" name="q2" value="a"> 8.9 m/s²</label>
                    <label><input type="radio" name="q2" value="b"> 10.8 m/s²</label>
                    <label><input type="radio" name="q2" value="c"> 9.8 m/s²</label>
                    <label><input type="radio" name="q2" value="d"> 7.8 m/s²</label>
                </div>
            </div>

            <div class="question" id="q3">
                <h3>3. Which law states that force equals mass times acceleration?</h3>
                <div class="options">
                    <label><input type="radio" name="q3" value="a"> Newton's First Law</label>
                    <label><input type="radio" name="q3" value="b"> Newton's Second Law</label>
                    <label><input type="radio" name="q3" value="c"> Newton's Third Law</label>
                    <label><input type="radio" name="q3" value="d"> Law of Conservation of Momentum</label>
                </div>
            </div>

            <div class="question" id="q4">
                <h3>4. What is the formula for kinetic energy?</h3>
                <div class="options">
                    <label><input type="radio" name="q4" value="a"> mv</label>
                    <label><input type="radio" name="q4" value="b"> mv²</label>
                    <label><input type="radio" name="q4" value="c"> ½mv²</label>
                    <label><input type="radio" name="q4" value="d"> ½mv</label>
                </div>
            </div>

            <div class="question" id="q5">
                <h3>5. What quantity is conserved in an elastic collision?</h3>
                <div class="options">
                    <label><input type="radio" name="q5" value="a"> Kinetic energy only</label>
                    <label><input type="radio" name="q5" value="b"> Momentum only</label>
                    <label><input type="radio" name="q5" value="c"> Energy only</label>
                    <label><input type="radio" name="q5" value="d"> Momentum and kinetic energy</label>
                </div>
            </div>

            <div class="navigation">
                <button type="button" class="nav-btn" id="prev-btn"><i class="fas fa-arrow-left"></i> Previous</button>
                <button type="button" class="nav-btn" id="next-btn">Next <i class="fas fa-arrow-right"></i></button>
            </div>

            <button type="submit" class="submit-btn"><i class="fas fa-paper-plane"></i> Submit Quiz</button>
        </form>

        <div id="result" class="result"></div>
    </div>

    <script>
    const answers = {
        q1: 'b',
        q2: 'c',
        q3: 'b',
        q4: 'c',
        q5: 'd'
    };
    let currentQuestion = 1;
    const totalQuestions = 5;

    const currentQ = document.getElementById("current-q");
    const prevBtn = document.getElementById("prev-btn");
    const nextBtn = document.getElementById("next-btn");
    const progressTracker = document.getElementById("progress-tracker");
    const resultDiv = document.getElementById("result");

    for (let i = 1; i <= totalQuestions; i++) {
        const tracker = document.createElement("div");
        tracker.className = "tracker-item" + (i === 1 ? " current" : "");
        tracker.textContent = i;
        tracker.dataset.q = i;
        tracker.onclick = () => scrollToQuestion(i);
        progressTracker.appendChild(tracker);
    }

    function updateTracker() {
        currentQ.textContent = currentQuestion;
        document.querySelectorAll(".tracker-item").forEach(el => {
            el.classList.remove("current");
            if (parseInt(el.dataset.q) === currentQuestion) {
                el.classList.add("current");
            }
        });
        prevBtn.disabled = currentQuestion === 1;
        nextBtn.disabled = currentQuestion === totalQuestions;
    }

    function scrollToQuestion(q) {
        document.getElementById("q" + q).scrollIntoView({
            behavior: "smooth",
            block: "center"
        });
        currentQuestion = q;
        updateTracker();
    }

    prevBtn.onclick = () => {
        if (currentQuestion > 1) scrollToQuestion(currentQuestion - 1);
    };
    nextBtn.onclick = () => {
        if (currentQuestion < totalQuestions) scrollToQuestion(currentQuestion + 1);
    };

    document.querySelectorAll('input[type="radio"]').forEach(radio => {
        radio.onchange = () => {
            const qNum = radio.name.slice(1);
            const tracker = document.querySelector(`.tracker-item[data-q="${qNum}"]`);
            if (tracker) tracker.classList.add("answered");
        };
    });

    document.getElementById("quizForm").addEventListener("submit", function(e) {
        e.preventDefault();
        const form = new FormData(this);
        let score = 0;
        for (let q in answers) {
            if (form.get(q) === answers[q]) score++;
        }
        const percent = (score / totalQuestions) * 100;
        resultDiv.textContent = `You scored ${score}/${totalQuestions} (${percent.toFixed(1)}%)`;
        resultDiv.className = "result " + (percent >= 70 ? "success" : "failure");
        resultDiv.style.display = "block";
        resultDiv.scrollIntoView({
            behavior: "smooth"
        });
    });

    scrollToQuestion(1);
    </script>
</body>

</html>