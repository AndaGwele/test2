<?php
// Grade 12 Mathematics - Sequences and Series Quiz
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sequences & Series Quiz - Grade 12 Mathematics</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    <?php include 'style.css';
    ?>
    </style>
</head>

<body>
    <div class="container">
        <div class="chemical-icon icon-1">🔢</div>
        <div class="chemical-icon icon-2">📈</div>

        <div class="header">
            <h1>Sequences and Series Quiz</h1>
            <p>Test your knowledge of Sequences and Series in Grade 12 Mathematics</p>
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
                    <h3><span class="question-number">1</span> What is the 5th term of the arithmetic sequence 3, 7, 11,
                        ...?</h3>
                    <div class="options">
                        <label class="option"><input type="radio" name="q1" value="a"> 15</label>
                        <label class="option"><input type="radio" name="q1" value="b"> 17</label>
                        <label class="option"><input type="radio" name="q1" value="c"> 19</label>
                        <label class="option"><input type="radio" name="q1" value="d"> 21</label>
                    </div>
                </div>

                <!-- Q2 -->
                <div class="question" id="q2">
                    <h3><span class="question-number">2</span> What is the sum of the first 10 terms of the arithmetic
                        sequence: 2, 5, 8, ...?</h3>
                    <div class="options">
                        <label class="option"><input type="radio" name="q2" value="a"> 125</label>
                        <label class="option"><input type="radio" name="q2" value="b"> 140</label>
                        <label class="option"><input type="radio" name="q2" value="c"> 150</label>
                        <label class="option"><input type="radio" name="q2" value="d"> 160</label>
                    </div>
                </div>

                <!-- Q3 -->
                <div class="question" id="q3">
                    <h3><span class="question-number">3</span> What is the common ratio of the geometric sequence 81,
                        27, 9, ...?</h3>
                    <div class="options">
                        <label class="option"><input type="radio" name="q3" value="a"> 3</label>
                        <label class="option"><input type="radio" name="q3" value="b"> 1/3</label>
                        <label class="option"><input type="radio" name="q3" value="c"> -3</label>
                        <label class="option"><input type="radio" name="q3" value="d"> 1/9</label>
                    </div>
                </div>

                <!-- Q4 -->
                <div class="question" id="q4">
                    <h3><span class="question-number">4</span> What is the formula for the n-th term of a geometric
                        sequence?</h3>
                    <div class="options">
                        <label class="option"><input type="radio" name="q4" value="a"> \( T_n = a + (n - 1)d \)</label>
                        <label class="option"><input type="radio" name="q4" value="b"> \( T_n = a \times r^{n-1}
                            \)</label>
                        <label class="option"><input type="radio" name="q4" value="c"> \( T_n = a \div r^{n-1}
                            \)</label>
                        <label class="option"><input type="radio" name="q4" value="d"> \( T_n = ar^n \)</label>
                    </div>
                </div>

                <!-- Q5 -->
                <div class="question" id="q5">
                    <h3><span class="question-number">5</span> The sum to infinity of a geometric series is given by:
                    </h3>
                    <div class="options">
                        <label class="option"><input type="radio" name="q5" value="a"> \( \frac{a}{1 + r} \)</label>
                        <label class="option"><input type="radio" name="q5" value="b"> \( a \times (1 - r) \)</label>
                        <label class="option"><input type="radio" name="q5" value="c"> \( \frac{a}{1 - r} \)</label>
                        <label class="option"><input type="radio" name="q5" value="d"> \( \frac{ar}{1 - r} \)</label>
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
            Grade 12 Mathematics | Sequences and Series Quiz
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
            q3: 'b',
            q4: 'b',
            q5: 'c'
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