<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Algebra Quiz - Grade 12 Maths</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #1a2980, #26d0ce);
        color: #2c3e50;
        padding: 20px;
        min-height: 100vh;
        line-height: 1.6;
    }

    .container {
        max-width: 900px;
        margin: 30px auto;
        background: rgba(255, 255, 255, 0.95);
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        position: relative;
        overflow: hidden;
    }

    .container::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 6px;
        background: linear-gradient(90deg, #ff6b6b, #4ecdc4, #556270);
    }

    .header {
        text-align: center;
        margin-bottom: 30px;
        position: relative;
        padding-bottom: 20px;
    }

    .header h1 {
        font-size: 2.5rem;
        color: #2c3e50;
        margin-bottom: 10px;
        background: linear-gradient(90deg, #1a2980, #26d0ce);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .header p {
        color: #7f8c8d;
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto;
    }

    .header::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 25%;
        width: 50%;
        height: 3px;
        background: linear-gradient(90deg, transparent, #3498db, transparent);
    }

    .progress-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #f8f9fa;
        border-radius: 12px;
        padding: 15px 25px;
        margin-bottom: 30px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    .progress-info {
        font-weight: 700;
        color: #2c3e50;
        font-size: 1.1rem;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .timer {
        background: #e74c3c;
        color: white;
        padding: 8px 15px;
        border-radius: 20px;
        font-weight: bold;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .timer i {
        font-size: 1.2rem;
    }

    .progress-tracker {
        display: flex;
        gap: 10px;
    }

    .tracker-item {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
    }

    .tracker-item.unanswered {
        background: #ecf0f1;
        color: #7f8c8d;
        border: 2px solid #bdc3c7;
    }

    .tracker-item.answered {
        background: #2ecc71;
        color: white;
        border: 2px solid #27ae60;
    }

    .tracker-item.current {
        transform: scale(1.2);
        background: #3498db;
        color: white;
        border: 2px solid #2980b9;
        box-shadow: 0 0 12px rgba(52, 152, 219, 0.6);
    }

    .quiz-content {
        padding: 20px 0;
    }

    .question {
        margin-bottom: 30px;
        padding: 25px;
        border-radius: 15px;
        background: white;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        border-left: 5px solid #3498db;
        transition: all 0.3s ease;
    }

    .question:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        transform: translateY(-3px);
    }

    .question h3 {
        margin-bottom: 20px;
        color: #2c3e50;
        display: flex;
        align-items: center;
        font-size: 1.3rem;
    }

    .question-number {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        background: #3498db;
        color: white;
        border-radius: 50%;
        margin-right: 15px;
        font-weight: bold;
        font-size: 1.1rem;
    }

    .options {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
        margin-top: 15px;
    }

    .option {
        display: flex;
        align-items: center;
        padding: 15px 20px;
        border-radius: 10px;
        background: #f8f9fa;
        transition: all 0.2s ease;
        cursor: pointer;
        border: 2px solid #e0e0e0;
    }

    .option:hover {
        background: #e3f2fd;
        border-color: #bbdefb;
        transform: translateX(5px);
    }

    .option input[type="radio"] {
        margin-right: 15px;
        width: 20px;
        height: 20px;
        cursor: pointer;
        accent-color: #3498db;
    }

    .navigation {
        display: flex;
        justify-content: space-between;
        margin: 30px 0;
    }

    .nav-btn {
        display: flex;
        align-items: center;
        background: #3498db;
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 8px rgba(52, 152, 219, 0.3);
    }

    .nav-btn:hover {
        background: #2980b9;
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(52, 152, 219, 0.4);
    }

    .nav-btn:active {
        transform: translateY(1px);
    }

    .nav-btn:disabled {
        background: #bdc3c7;
        cursor: not-allowed;
        transform: none;
        box-shadow: none;
    }

    .nav-btn i {
        margin: 0 8px;
    }

    .submit-btn {
        display: block;
        width: 100%;
        margin: 20px 0;
        background: linear-gradient(to right, #27ae60, #2ecc71);
        color: white;
        border: none;
        padding: 16px;
        border-radius: 10px;
        cursor: pointer;
        font-size: 1.2rem;
        font-weight: 700;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(46, 204, 113, 0.3);
    }

    .submit-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(46, 204, 113, 0.4);
    }

    .result {
        text-align: center;
        margin-top: 20px;
        padding: 30px;
        border-radius: 15px;
        font-size: 1.4rem;
        font-weight: bold;
        display: none;
        animation: fadeIn 0.8s ease;
    }

    .result.success {
        background: rgba(46, 204, 113, 0.15);
        color: #27ae60;
        border-left: 5px solid #2ecc71;
        display: block;
    }

    .result.failure {
        background: rgba(231, 76, 60, 0.15);
        color: #c0392b;
        border-left: 5px solid #e74c3c;
        display: block;
    }

    .footer {
        text-align: center;
        margin-top: 30px;
        color: #7f8c8d;
        font-size: 0.95rem;
        padding-top: 20px;
        border-top: 1px solid #ecf0f1;
    }

    .math-icon {
        position: absolute;
        opacity: 0.05;
        font-size: 12rem;
        z-index: 0;
        pointer-events: none;
    }

    .icon-1 {
        top: 10%;
        left: 5%;
        transform: rotate(25deg);
    }

    .icon-2 {
        bottom: 10%;
        right: 5%;
        transform: rotate(-15deg);
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(46, 204, 113, 0.4);
        }

        70% {
            box-shadow: 0 0 0 10px rgba(46, 204, 113, 0);
        }

        100% {
            box-shadow: 0 0 0 0 rgba(46, 204, 113, 0);
        }
    }

    .pulse {
        animation: pulse 1s infinite;
    }

    .back-button {
        display: inline-flex;
        align-items: center;
        background-color: #3498db;
        color: white;
        padding: 10px 20px;
        border-radius: 30px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        cursor: pointer;
        box-shadow: 0 4px 8px rgba(52, 152, 219, 0.3);
        border: none;
        font-size: 1rem;
        margin-bottom: 20px;
    }

    .back-button:hover {
        background: #2980b9;
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(52, 152, 219, 0.4);
    }

    .back-button:active {
        transform: translateY(1px);
    }

    .back-button i {
        margin-right: 8px;
    }

    @media (max-width: 768px) {
        .container {
            padding: 25px;
        }

        .options {
            grid-template-columns: 1fr;
        }

        .progress-tracker {
            flex-wrap: wrap;
            justify-content: center;
            gap: 8px;
        }

        .progress-container {
            flex-direction: column;
            gap: 15px;
        }

        .math-icon {
            font-size: 8rem;
        }

        .progress-info {
            flex-direction: column;
            gap: 10px;
        }

        .nav-btn {
            padding: 10px 15px;
            font-size: 1rem;
        }
    }
    </style>
</head>

<body>
    <div style="max-width: 900px; margin: 20px auto 0;">
        <button class="back-button" onclick="window.history.back()">
            <i class="fas fa-arrow-left"></i> Back to Previous Page
        </button>
    </div>

    <div class="container">
        <div class="math-icon icon-1">∫</div>
        <div class="math-icon icon-2">∞</div>

        <div class="header">
            <h1>Algebra Quiz</h1>
            <p>Test your Grade 12 Mathematics knowledge</p>
        </div>

        <div class="progress-container">
            <div class="progress-info">
                <div class="timer">
                    <i class="fas fa-clock"></i>
                    Time left: <span id="time">600</span>s
                </div>
                <div>
                    Question <span id="current-q">1</span> of 10
                </div>
            </div>
            <div class="progress-tracker" id="progress-tracker">
                <!-- Progress items will be generated by JavaScript -->
            </div>
        </div>

        <div class="quiz-content">
            <form id="quizForm">
                <!-- Question 1 -->
                <div class="question" id="q1">
                    <h3><span class="question-number">1</span> Solve for x: 2x + 3 = 11</h3>
                    <div class="options">
                        <label class="option">
                            <input type="radio" name="q1" value="a"> x = 5
                        </label>
                        <label class="option">
                            <input type="radio" name="q1" value="b"> x = 4
                        </label>
                        <label class="option">
                            <input type="radio" name="q1" value="c"> x = 3
                        </label>
                    </div>
                </div>

                <!-- Question 2 -->
                <div class="question" id="q2">
                    <h3><span class="question-number">2</span> What is the solution to the inequality: x - 2 > 3</h3>
                    <div class="options">
                        <label class="option">
                            <input type="radio" name="q2" value="a"> x > 1
                        </label>
                        <label class="option">
                            <input type="radio" name="q2" value="b"> x > 5
                        </label>
                        <label class="option">
                            <input type="radio" name="q2" value="c"> x < 5 </label>
                    </div>
                </div>

                <!-- Question 3 -->
                <div class="question" id="q3">
                    <h3><span class="question-number">3</span> Factorize: x² - 4x + 4</h3>
                    <div class="options">
                        <label class="option">
                            <input type="radio" name="q3" value="a"> (x - 2)(x - 2)
                        </label>
                        <label class="option">
                            <input type="radio" name="q3" value="b"> (x + 2)(x + 2)
                        </label>
                        <label class="option">
                            <input type="radio" name="q3" value="c"> (x - 4)(x - 1)
                        </label>
                        <label class="option">
                            <input type="radio" name="q3" value="d"> (x + 4)(x - 1)
                        </label>
                    </div>
                </div>

                <!-- Question 4 -->
                <div class="question" id="q4">
                    <h3><span class="question-number">4</span> Solve the system: 2x + y = 8, x - y = 1</h3>
                    <div class="options">
                        <label class="option">
                            <input type="radio" name="q4" value="a"> x = 3, y = 2
                        </label>
                        <label class="option">
                            <input type="radio" name="q4" value="b"> x = 2, y = 3
                        </label>
                        <label class="option">
                            <input type="radio" name="q4" value="c"> x = 4, y = 0
                        </label>
                        <label class="option">
                            <input type="radio" name="q4" value="d"> x = 3, y = 3
                        </label>
                    </div>
                </div>

                <!-- Question 5 -->
                <div class="question" id="q5">
                    <h3><span class="question-number">5</span> What is the value of x in the equation: 3(x - 4) = 15
                    </h3>
                    <div class="options">
                        <label class="option">
                            <input type="radio" name="q5" value="a"> x = 5
                        </label>
                        <label class="option">
                            <input type="radio" name="q5" value="b"> x = 7
                        </label>
                        <label class="option">
                            <input type="radio" name="q5" value="c"> x = 9
                        </label>
                        <label class="option">
                            <input type="radio" name="q5" value="d"> x = 11
                        </label>
                    </div>
                </div>

                <!-- Question 6 -->
                <div class="question" id="q6">
                    <h3><span class="question-number">6</span> Solve for x: √(2x + 3) = 5</h3>
                    <div class="options">
                        <label class="option">
                            <input type="radio" name="q6" value="a"> x = 11
                        </label>
                        <label class="option">
                            <input type="radio" name="q6" value="b"> x = 12
                        </label>
                        <label class="option">
                            <input type="radio" name="q6" value="c"> x = 13
                        </label>
                        <label class="option">
                            <input type="radio" name="q6" value="d"> x = 14
                        </label>
                    </div>
                </div>

                <!-- Question 7 -->
                <div class="question" id="q7">
                    <h3><span class="question-number">7</span> Solve the quadratic equation: x² - 5x + 6 = 0</h3>
                    <div class="options">
                        <label class="option">
                            <input type="radio" name="q7" value="a"> x = 1, x = 6
                        </label>
                        <label class="option">
                            <input type="radio" name="q7" value="b"> x = 2, x = 3
                        </label>
                        <label class="option">
                            <input type="radio" name="q7" value="c"> x = -2, x = -3
                        </label>
                        <label class="option">
                            <input type="radio" name="q7" value="d"> x = 1.5, x = 4
                        </label>
                    </div>
                </div>

                <!-- Question 8 -->
                <div class="question" id="q8">
                    <h3><span class="question-number">8</span> Simplify: (3x²y³) × (2x⁴y²)</h3>
                    <div class="options">
                        <label class="option">
                            <input type="radio" name="q8" value="a"> 6x⁶y⁵
                        </label>
                        <label class="option">
                            <input type="radio" name="q8" value="b"> 5x⁶y⁵
                        </label>
                        <label class="option">
                            <input type="radio" name="q8" value="c"> 6x⁸y⁶
                        </label>
                        <label class="option">
                            <input type="radio" name="q8" value="d"> 5x⁸y⁶
                        </label>
                    </div>
                </div>

                <!-- Question 9 -->
                <div class="question" id="q9">
                    <h3><span class="question-number">9</span> Solve for x: log₂(x) = 4</h3>
                    <div class="options">
                        <label class="option">
                            <input type="radio" name="q9" value="a"> x = 8
                        </label>
                        <label class="option">
                            <input type="radio" name="q9" value="b"> x = 16
                        </label>
                        <label class="option">
                            <input type="radio" name="q9" value="c"> x = 32
                        </label>
                        <label class="option">
                            <input type="radio" name="q9" value="d"> x = 64
                        </label>
                    </div>
                </div>

                <!-- Question 10 -->
                <div class="question" id="q10">
                    <h3><span class="question-number">10</span> Solve the inequality: -3x + 7 ≤ 1</h3>
                    <div class="options">
                        <label class="option">
                            <input type="radio" name="q10" value="a"> x ≥ 2
                        </label>
                        <label class="option">
                            <input type="radio" name="q10" value="b"> x ≤ 2
                        </label>
                        <label class="option">
                            <input type="radio" name="q10" value="c"> x ≥ -2
                        </label>
                        <label class="option">
                            <input type="radio" name="q10" value="d"> x ≤ -2
                        </label>
                    </div>
                </div>

                <div class="navigation">
                    <button type="button" class="nav-btn" id="prev-btn">
                        <i class="fas fa-arrow-left"></i> Previous
                    </button>
                    <button type="button" class="nav-btn" id="next-btn">
                        Next <i class="fas fa-arrow-right"></i>
                    </button>
                </div>

                <button type="submit" class="submit-btn">
                    <i class="fas fa-paper-plane"></i> Submit Quiz
                </button>
            </form>

            <div id="result" class="result"></div>
        </div>

        <div class="footer">
            Grade 12 Mathematics | Algebra Quiz
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const quizForm = document.getElementById('quizForm');
        const resultDiv = document.getElementById('result');
        const progressTracker = document.getElementById('progress-tracker');
        const currentQ = document.getElementById('current-q');
        const timerDisplay = document.getElementById('time');
        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');

        // Timer functionality (10 minutes for 10 questions)
        let timeLeft = 600;
        const timer = setInterval(() => {
            timeLeft--;
            timerDisplay.textContent = timeLeft;

            // Change timer color when time is running low
            if (timeLeft <= 60) {
                document.querySelector('.timer').style.background = '#e74c3c';
                document.querySelector('.timer').classList.add('pulse');
            }

            if (timeLeft <= 0) {
                clearInterval(timer);
                quizForm.dispatchEvent(new Event('submit'));
            }
        }, 1000);

        // Correct answers
        const answers = {
            q1: 'b',
            q2: 'b',
            q3: 'a',
            q4: 'a',
            q5: 'c',
            q6: 'a',
            q7: 'b',
            q8: 'a',
            q9: 'b',
            q10: 'a'
        };

        // Current question tracking
        let currentQuestion = 1;
        const totalQuestions = 10;

        // Create progress tracker items
        for (let i = 1; i <= totalQuestions; i++) {
            const trackerItem = document.createElement('div');
            trackerItem.className = 'tracker-item unanswered';
            trackerItem.textContent = i;
            trackerItem.dataset.q = i;

            // Highlight current question
            if (i === currentQuestion) {
                trackerItem.classList.add('current');
            }

            // Scroll to question when clicked
            trackerItem.addEventListener('click', function() {
                scrollToQuestion(i);
            });

            progressTracker.appendChild(trackerItem);
        }

        // Update current question display
        function updateCurrentQuestionDisplay() {
            currentQ.textContent = currentQuestion;

            // Update tracker items
            const trackerItems = document.querySelectorAll('.tracker-item');
            trackerItems.forEach(item => {
                item.classList.remove('current');
                if (parseInt(item.dataset.q) === currentQuestion) {
                    item.classList.add('current');
                }
            });

            // Update navigation buttons
            prevBtn.disabled = currentQuestion === 1;
            nextBtn.disabled = currentQuestion === totalQuestions;
        }

        // Scroll to a specific question
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

        // Navigation button event listeners
        prevBtn.addEventListener('click', function() {
            if (currentQuestion > 1) {
                scrollToQuestion(currentQuestion - 1);
            }
        });

        nextBtn.addEventListener('click', function() {
            if (currentQuestion < totalQuestions) {
                scrollToQuestion(currentQuestion + 1);
            }
        });

        // Update tracker when an answer is selected
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

        // Form submission
        quizForm.addEventListener('submit', function(e) {
            e.preventDefault();
            clearInterval(timer);
            let score = 0;
            const formData = new FormData(this);

            // Check answers
            for (let q in answers) {
                if (formData.get(q) === answers[q]) {
                    score++;
                }
            }

            // Display results
            const percentage = (score / totalQuestions) * 100;
            let message = `You scored ${score}/${totalQuestions} (${percentage.toFixed(1)}%) `;

            if (percentage >= 70) {
                message += "⭐ Great job! ⭐";
                resultDiv.className = 'result success';
            } else {
                message += "📚 Keep practicing! 📚";
                resultDiv.className = 'result failure';
            }

            resultDiv.textContent = message;

            // Show results
            resultDiv.style.display = 'block';

            // Scroll to results
            resultDiv.scrollIntoView({
                behavior: 'smooth'
            });
        });

        // Initialize scroll position to first question
        scrollToQuestion(1);
    });
    </script>
</body>

</html>