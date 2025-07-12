<?php
// Calculus Quiz - Grade 12 Mathematics
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Calculus Quiz - Grade 12 Mathematics</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    <?php include 'style.css';
    ?>
    </style>
</head>

<body>
    <div class="container">
        <div class="chemical-icon icon-1">📐</div>
        <div class="chemical-icon icon-2">📊</div>

        <div class="header">
            <h1>Calculus Quiz</h1>
            <p>Test your understanding of Calculus concepts in Grade 12 Mathematics</p>
        </div>

        <div class="progress-container">
            <div class="progress-info">
                Question <span id="current-q">1</span> of 5
            </div>
            <div class="progress-tracker" id="progress-tracker"></div>
        </div>

        <div class="quiz-content">
            <form id="quizForm">

                <!-- Q1 -->
                <div class="question" id="q1">
                    <h3><span class="question-number">1</span> What is the derivative of \( f(x) = x^2 \)?</h3>
                    <div class="options">
                        <label class="option"><input type="radio" name="q1" value="a"> x³</label>
                        <label class="option"><input type="radio" name="q1" value="b"> 2x</label>
                        <label class="option"><input type="radio" name="q1" value="c"> 1</label>
                        <label class="option"><input type="radio" name="q1" value="d"> x</label>
                    </div>
                </div>

                <!-- Q2 -->
                <div class="question" id="q2">
                    <h3><span class="question-number">2</span> What is the limit of \( \frac{1}{x} \) as \( x \to \infty
                        \)?</h3>
                    <div class="options">
                        <label class="option"><input type="radio" name="q2" value="a"> ∞</label>
                        <label class="option"><input type="radio" name="q2" value="b"> 1</label>
                        <label class="option"><input type="radio" name="q2" value="c"> 0</label>
                        <label class="option"><input type="radio" name="q2" value="d"> Undefined</label>
                    </div>
                </div>

                <!-- Q3 -->
                <div class="question" id="q3">
                    <h3><span class="question-number">3</span> What rule is used to differentiate the product of two
                        functions?</h3>
                    <div class="options">
                        <label class="option"><input type="radio" name="q3" value="a"> Chain Rule</label>
                        <label class="option"><input type="radio" name="q3" value="b"> Product Rule</label>
                        <label class="option"><input type="radio" name="q3" value="c"> Quotient Rule</label>
                        <label class="option"><input type="radio" name="q3" value="d"> Constant Rule</label>
                    </div>
                </div>

                <!-- Q4 -->
                <div class="question" id="q4">
                    <h3><span class="question-number">4</span> What is the integral of \( f(x) = 2x \)?</h3>
                    <div class="options">
                        <label class="option"><input type="radio" name="q4" value="a"> x² + C</label>
                        <label class="option"><input type="radio" name="q4" value="b"> 2x + C</label>
                        <label class="option"><input type="radio" name="q4" value="c"> x + C</label>
                        <label class="option"><input type="radio" name="q4" value="d"> x²</label>
                    </div>
                </div>

                <!-- Q5 -->
                <div class="question" id="q5">
                    <h3><span class="question-number">5</span> What does the derivative represent graphically?</h3>
                    <div class="options">
                        <label class="option"><input type="radio" name="q5" value="a"> The area under the curve</label>
                        <label class="option"><input type="radio" name="q5" value="b"> The slope of the tangent
                            line</label>
                        <label class="option"><input type="radio" name="q5" value="c"> The y-intercept</label>
                        <label class="option"><input type="radio" name="q5" value="d"> The x-intercept</label>
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
            Grade 12 Mathematics | Calculus Quiz
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
            q1: 'b',
            q2: 'c',
            q3: 'b',
            q4: 'a',
            q5: 'b'
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