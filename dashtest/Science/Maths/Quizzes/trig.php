<?php
// Grade 12 Mathematics - Trigonometry Quiz
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trigonometry Quiz - Grade 12 Mathematics</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    <?php include 'style.css';
    ?>
    </style>
</head>

<body>
    <div class="container">
        <div class="chemical-icon icon-1">📐</div>
        <div class="chemical-icon icon-2">📏</div>

        <div class="header">
            <h1>Trigonometry Quiz</h1>
            <p>Challenge your understanding of Grade 12 Trigonometry concepts</p>
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
                    <h3><span class="question-number">1</span> What is the exact value of \( \sin(30^\circ) \)?</h3>
                    <div class="options">
                        <label class="option"><input type="radio" name="q1" value="a"> 0</label>
                        <label class="option"><input type="radio" name="q1" value="b"> \( \frac{1}{2} \)</label>
                        <label class="option"><input type="radio" name="q1" value="c"> \( \frac{\sqrt{2}}{2} \)</label>
                        <label class="option"><input type="radio" name="q1" value="d"> 1</label>
                    </div>
                </div>

                <!-- Q2 -->
                <div class="question" id="q2">
                    <h3><span class="question-number">2</span> Which identity is correct?</h3>
                    <div class="options">
                        <label class="option"><input type="radio" name="q2" value="a"> \( \sin^2 x + \cos^2 x = 1
                            \)</label>
                        <label class="option"><input type="radio" name="q2" value="b"> \( \tan x = \frac{\cos x}{\sin x}
                            \)</label>
                        <label class="option"><input type="radio" name="q2" value="c"> \( \sin x = \frac{1}{\cos x}
                            \)</label>
                        <label class="option"><input type="radio" name="q2" value="d"> \( \cos^2 x - \sin^2 x = 0
                            \)</label>
                    </div>
                </div>

                <!-- Q3 -->
                <div class="question" id="q3">
                    <h3><span class="question-number">3</span> What is the period of the function \( f(x) = \tan x \)?
                    </h3>
                    <div class="options">
                        <label class="option"><input type="radio" name="q3" value="a"> \( 2\pi \)</label>
                        <label class="option"><input type="radio" name="q3" value="b"> \( \pi \)</label>
                        <label class="option"><input type="radio" name="q3" value="c"> \( \frac{\pi}{2} \)</label>
                        <label class="option"><input type="radio" name="q3" value="d"> 360°</label>
                    </div>
                </div>

                <!-- Q4 -->
                <div class="question" id="q4">
                    <h3><span class="question-number">4</span> The general solution of \( \sin x = 0 \) is:</h3>
                    <div class="options">
                        <label class="option"><input type="radio" name="q4" value="a"> \( x = 90^\circ + 180^\circ n
                            \)</label>
                        <label class="option"><input type="radio" name="q4" value="b"> \( x = 180^\circ n \)</label>
                        <label class="option"><input type="radio" name="q4" value="c"> \( x = 0^\circ + 360^\circ n
                            \)</label>
                        <label class="option"><input type="radio" name="q4" value="d"> \( x = 270^\circ + 180^\circ n
                            \)</label>
                    </div>
                </div>

                <!-- Q5 -->
                <div class="question" id="q5">
                    <h3><span class="question-number">5</span> If \( \cos x = 0.5 \), what is \( x \) in degrees in the
                        interval
                        \( 0^\circ \leq x \leq 360^\circ \)?</h3>
                    <div class="options">
                        <label class="option"><input type="radio" name="q5" value="a"> 60° and 300°</label>
                        <label class="option"><input type="radio" name="q5" value="b"> 30° and 330°</label>
                        <label class="option"><input type="radio" name="q5" value="c"> 45° and 315°</label>
                        <label class="option"><input type="radio" name="q5" value="d"> 90° and 270°</label>
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
            Grade 12 Mathematics | Trigonometry Quiz
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
            q2: 'a',
            q3: 'b',
            q4: 'b',
            q5: 'a'
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
            document.querySelectorAll('.tracker-item').forEach(item => {
                item.classList.remove('current');
                if (parseInt(item.dataset.q) === currentQuestion) {
                    item.classList.add('current');
                }
            });
            prevBtn.disabled = currentQuestion === 1;
            nextBtn.disabled = currentQuestion === totalQuestions;
        }

        function scrollToQuestion(num) {
            const qEl = document.getElementById(`q${num}`);
            if (qEl) {
                qEl.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
                currentQuestion = num;
                updateCurrentQuestionDisplay();
            }
        }

        prevBtn.addEventListener('click', () => currentQuestion > 1 && scrollToQuestion(currentQuestion - 1));
        nextBtn.addEventListener('click', () => currentQuestion < totalQuestions && scrollToQuestion(
            currentQuestion + 1));

        document.querySelectorAll('input[type="radio"]').forEach(radio => {
            radio.addEventListener('change', function() {
                const qNum = this.name.substring(1);
                const trackerItem = document.querySelector(`.tracker-item[data-q="${qNum}"]`);
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