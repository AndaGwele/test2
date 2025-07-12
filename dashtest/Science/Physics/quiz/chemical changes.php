<?php
// Chemical Change Quiz - Grade 12 Physical Sciences
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chemical Change Quiz - Grade 12 Physical Sciences</title>
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
        <div class="chemical-icon icon-1">⚗️</div>
        <div class="chemical-icon icon-2">🧪</div>

        <div class="header">
            <h1>Chemical Change Quiz</h1>
            <p>Test your knowledge of chemical change in Grade 12 Physical Sciences</p>
        </div>

        <div class="progress-container">
            <div class="progress-info">
                Question <span id="current-q">1</span> of 5
            </div>
            <div class="progress-tracker" id="progress-tracker"></div>
        </div>

        <div class="quiz-content">
            <form id="quizForm">

                <!-- Question 1 -->
                <div class="question" id="q1">
                    <h3><span class="question-number">1</span> What kind of reaction releases energy in the form of
                        heat?</h3>
                    <div class="options">
                        <label class="option"><input type="radio" name="q1" value="a"> Endothermic</label>
                        <label class="option"><input type="radio" name="q1" value="b"> Equilibrium</label>
                        <label class="option"><input type="radio" name="q1" value="c"> Exothermic</label>
                        <label class="option"><input type="radio" name="q1" value="d"> Spontaneous</label>
                    </div>
                </div>

                <!-- Question 2 -->
                <div class="question" id="q2">
                    <h3><span class="question-number">2</span> What effect does a catalyst have on a reaction?</h3>
                    <div class="options">
                        <label class="option"><input type="radio" name="q2" value="a"> Increases activation
                            energy</label>
                        <label class="option"><input type="radio" name="q2" value="b"> Slows down the reaction</label>
                        <label class="option"><input type="radio" name="q2" value="c"> Speeds up the reaction</label>
                        <label class="option"><input type="radio" name="q2" value="d"> Stops the reaction</label>
                    </div>
                </div>

                <!-- Question 3 -->
                <div class="question" id="q3">
                    <h3><span class="question-number">3</span> What is chemical equilibrium?</h3>
                    <div class="options">
                        <label class="option"><input type="radio" name="q3" value="a"> When the products
                            disappear</label>
                        <label class="option"><input type="radio" name="q3" value="b"> When the forward reaction
                            stops</label>
                        <label class="option"><input type="radio" name="q3" value="c"> When the forward and reverse
                            reactions occur at the same rate</label>
                        <label class="option"><input type="radio" name="q3" value="d"> When all the reactants are used
                            up</label>
                    </div>
                </div>

                <!-- Question 4 -->
                <div class="question" id="q4">
                    <h3><span class="question-number">4</span> Which of the following increases the rate of reaction?
                    </h3>
                    <div class="options">
                        <label class="option"><input type="radio" name="q4" value="a"> Lower temperature</label>
                        <label class="option"><input type="radio" name="q4" value="b"> Lower pressure</label>
                        <label class="option"><input type="radio" name="q4" value="c"> Increased surface area</label>
                        <label class="option"><input type="radio" name="q4" value="d"> Decreased concentration</label>
                    </div>
                </div>

                <!-- Question 5 -->
                <div class="question" id="q5">
                    <h3><span class="question-number">5</span> Which of the following can shift equilibrium?</h3>
                    <div class="options">
                        <label class="option"><input type="radio" name="q5" value="a"> Change in pressure</label>
                        <label class="option"><input type="radio" name="q5" value="b"> Change in temperature</label>
                        <label class="option"><input type="radio" name="q5" value="c"> Change in concentration</label>
                        <label class="option"><input type="radio" name="q5" value="d"> All of the above</label>
                    </div>
                </div>

                <div class="navigation">
                    <button type="button" class="nav-btn" id="prev-btn"><i class="fas fa-arrow-left"></i>
                        Previous</button>
                    <button type="button" class="nav-btn" id="next-btn">Next <i class="fas fa-arrow-right"></i></button>
                </div>

                <button type="submit" class="submit-btn"><i class="fas fa-paper-plane"></i> Submit Quiz</button>
            </form>

            <div id="result" class="result"></div>
        </div>

        <div class="footer">
            Grade 12 Physical Sciences | Chemical Change Quiz
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const quizForm = document.getElementById('quizForm');
        const resultDiv = document.getElementById('result');
        const progressTracker = document.getElementById('progress-tracker');
        const currentQ = document.getElementById('current-q');
        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');

        const answers = {
            q1: 'c',
            q2: 'c',
            q3: 'c',
            q4: 'c',
            q5: 'd'
        };

        let currentQuestion = 1;
        const totalQuestions = 5;

        for (let i = 1; i <= totalQuestions; i++) {
            const trackerItem = document.createElement('div');
            trackerItem.className = 'tracker-item unanswered';
            trackerItem.textContent = i;
            trackerItem.dataset.q = i;
            if (i === currentQuestion) trackerItem.classList.add('current');
            trackerItem.addEventListener('click', () => scrollToQuestion(i));
            progressTracker.appendChild(trackerItem);
        }

        function updateCurrentQuestionDisplay() {
            currentQ.textContent = currentQuestion;
            const trackerItems = document.querySelectorAll('.tracker-item');
            trackerItems.forEach(item => {
                item.classList.remove('current');
                if (parseInt(item.dataset.q) === currentQuestion) {
                    item.classList.add('current');
                }
            });
            prevBtn.disabled = currentQuestion === 1;
            nextBtn.disabled = currentQuestion === totalQuestions;
        }

        function scrollToQuestion(questionNum) {
            const questionElement = document.getElementById(`q${questionNum}`);
            if (questionElement) {
                questionElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
                currentQuestion = questionNum;
                updateCurrentQuestionDisplay();
            }
        }

        prevBtn.addEventListener('click', () => {
            if (currentQuestion > 1) scrollToQuestion(currentQuestion - 1);
        });

        nextBtn.addEventListener('click', () => {
            if (currentQuestion < totalQuestions) scrollToQuestion(currentQuestion + 1);
        });

        document.querySelectorAll('input[type="radio"]').forEach(radio => {
            radio.addEventListener('change', function() {
                const questionNum = this.name.substring(1);
                const trackerItem = document.querySelector(
                    `.tracker-item[data-q="${questionNum}"]`);
                if (trackerItem) {
                    trackerItem.classList.remove('unanswered');
                    trackerItem.classList.add('answered');
                }
            });
        });

        quizForm.addEventListener('submit', function(e) {
            e.preventDefault();
            let score = 0;
            const formData = new FormData(this);

            for (let q in answers) {
                if (formData.get(q) === answers[q]) {
                    score++;
                }
            }

            const percentage = (score / totalQuestions) * 100;
            resultDiv.textContent = `You scored ${score}/${totalQuestions} (${percentage.toFixed(1)}%)`;
            resultDiv.className = 'result ' + (percentage >= 70 ? 'success' : 'failure');
            resultDiv.scrollIntoView({
                behavior: 'smooth'
            });
        });

        scrollToQuestion(1);
    });
    </script>
</body>

</html>