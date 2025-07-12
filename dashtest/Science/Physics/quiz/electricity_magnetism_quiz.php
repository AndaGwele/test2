<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electricity & Magnetism Quiz - Grade 12 Physical Sciences</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            color: #f0f8ff;
            padding: 20px;
            min-height: 100vh;
            line-height: 1.6;
        }

        .container {
            max-width: 900px;
            margin: 30px auto;
            background: rgba(25, 25, 60, 0.9);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            position: relative;
            overflow: hidden;
            border: 1px solid #4a4a8a;
        }

        .container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, #00d2ff, #3a7bd5, #00d2ff);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            position: relative;
            padding-bottom: 20px;
        }

        .header h1 {
            font-size: 2.8rem;
            margin-bottom: 10px;
            background: linear-gradient(90deg, #00d2ff, #928dab);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .header p {
            color: #a0a0d0;
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
            background: linear-gradient(90deg, transparent, #3a7bd5, transparent);
        }

        .progress-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(40, 40, 90, 0.7);
            border-radius: 12px;
            padding: 15px 25px;
            margin-bottom: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            border: 1px solid #4a4a8a;
        }

        .progress-info {
            font-weight: 700;
            color: #00d2ff;
            font-size: 1.1rem;
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
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
            background: rgba(30, 30, 70, 0.8);
            color: #a0a0d0;
            border: 2px solid #4a4a8a;
        }

        .tracker-item.answered {
            background: #3a7bd5;
            color: white;
            border: 2px solid #00d2ff;
        }

        .tracker-item.current {
            transform: scale(1.2);
            background: #00d2ff;
            color: #0f0c29;
            border: 2px solid #3a7bd5;
            box-shadow: 0 0 12px rgba(0, 210, 255, 0.6);
            font-weight: 800;
        }

        .quiz-content {
            padding: 20px 0;
        }

        .question {
            margin-bottom: 30px;
            padding: 25px;
            border-radius: 15px;
            background: rgba(35, 35, 75, 0.7);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            border-left: 5px solid #3a7bd5;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .question:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
            transform: translateY(-3px);
            border-left: 5px solid #00d2ff;
        }

        .question h3 {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            font-size: 1.3rem;
            color: #f0f8ff;
        }

        .question-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, #00d2ff, #3a7bd5);
            color: #0f0c29;
            border-radius: 50%;
            margin-right: 15px;
            font-weight: bold;
            font-size: 1.1rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
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
            background: rgba(50, 50, 100, 0.5);
            transition: all 0.2s ease;
            cursor: pointer;
            border: 2px solid #4a4a8a;
        }

        .option:hover {
            background: rgba(58, 123, 213, 0.3);
            border-color: #00d2ff;
            transform: translateX(5px);
        }

        .option input[type="radio"] {
            margin-right: 15px;
            width: 20px;
            height: 20px;
            cursor: pointer;
            accent-color: #00d2ff;
        }

        .navigation {
            display: flex;
            justify-content: space-between;
            margin: 30px 0;
        }

        .nav-btn {
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #3a7bd5, #00d2ff);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .nav-btn:hover {
            background: linear-gradient(135deg, #00d2ff, #3a7bd5);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 210, 255, 0.4);
        }

        .nav-btn:active {
            transform: translateY(1px);
        }

        .nav-btn:disabled {
            background: #4a4a8a;
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
            background: linear-gradient(to right, #00d2ff, #3a7bd5);
            color: #0f0c29;
            border: none;
            padding: 16px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 1.2rem;
            font-weight: 700;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.4);
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 210, 255, 0.6);
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
            background: rgba(0, 210, 255, 0.15);
            color: #00d2ff;
            border-left: 5px solid #00d2ff;
            display: block;
        }

        .result.failure {
            background: rgba(231, 76, 60, 0.15);
            color: #ff6b6b;
            border-left: 5px solid #ff6b6b;
            display: block;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: #a0a0d0;
            font-size: 0.95rem;
            padding-top: 20px;
            border-top: 1px solid #4a4a8a;
        }

        .circuit-icon {
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

        .circuit-line {
            position: absolute;
            height: 2px;
            background: rgba(0, 210, 255, 0.1);
            z-index: 0;
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
                box-shadow: 0 0 0 0 rgba(0, 210, 255, 0.4);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(0, 210, 255, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(0, 210, 255, 0);
            }
        }

        .pulse {
            animation: pulse 2s infinite;
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

            .circuit-icon {
                font-size: 8rem;
            }

            .header h1 {
                font-size: 2.2rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="circuit-icon icon-1">⚡</div>
        <div class="circuit-icon icon-2">🧲</div>

        <!-- Decorative circuit lines -->
        <div class="circuit-line" style="top: 15%; left: 0; width: 30%;"></div>
        <div class="circuit-line" style="top: 40%; right: 0; width: 25%;"></div>
        <div class="circuit-line" style="bottom: 20%; left: 10%; width: 20%;"></div>

        <div class="header">
            <h1>Electricity & Magnetism Quiz</h1>
            <p>Test your knowledge of Grade 12 Physical Sciences concepts</p>
        </div>

        <div class="progress-container">
            <div class="progress-info">
                Question <span id="current-q">1</span> of 10
            </div>
            <div class="progress-tracker" id="progress-tracker">
                <!-- Progress items will be generated by JavaScript -->
            </div>
        </div>

        <div class="quiz-content">
            <form id="quizForm">
                <!-- Question 1 -->
                <div class="question" id="q1">
                    <h3><span class="question-number">1</span> What is the SI unit of electric current?</h3>
                    <div class="options">
                        <label class="option">
                            <input type="radio" name="q1" value="a"> Ohm
                        </label>
                        <label class="option">
                            <input type="radio" name="q1" value="b"> Ampere
                        </label>
                        <label class="option">
                            <input type="radio" name="q1" value="c"> Volt
                        </label>
                        <label class="option">
                            <input type="radio" name="q1" value="d"> Coulomb
                        </label>
                    </div>
                </div>

                <!-- Question 2 -->
                <div class="question" id="q2">
                    <h3><span class="question-number">2</span> Which material is a good conductor?</h3>
                    <div class="options">
                        <label class="option">
                            <input type="radio" name="q2" value="a"> Wood
                        </label>
                        <label class="option">
                            <input type="radio" name="q2" value="b"> Glass
                        </label>
                        <label class="option">
                            <input type="radio" name="q2" value="c"> Copper
                        </label>
                        <label class="option">
                            <input type="radio" name="q2" value="d"> Plastic
                        </label>
                    </div>
                </div>

                <!-- Question 3 -->
                <div class="question" id="q3">
                    <h3><span class="question-number">3</span> According to Ohm's Law, what is the relationship between
                        voltage and current?</h3>
                    <div class="options">
                        <label class="option">
                            <input type="radio" name="q3" value="a"> Inversely proportional
                        </label>
                        <label class="option">
                            <input type="radio" name="q3" value="b"> Directly proportional
                        </label>
                        <label class="option">
                            <input type="radio" name="q3" value="c"> No relationship
                        </label>
                        <label class="option">
                            <input type="radio" name="q3" value="d"> Exponentially related
                        </label>
                    </div>
                </div>

                <!-- Question 4 -->
                <div class="question" id="q4">
                    <h3><span class="question-number">4</span> What does a transformer do?</h3>
                    <div class="options">
                        <label class="option">
                            <input type="radio" name="q4" value="a"> Converts AC to DC
                        </label>
                        <label class="option">
                            <input type="radio" name="q4" value="b"> Increases or decreases voltage
                        </label>
                        <label class="option">
                            <input type="radio" name="q4" value="c"> Stores electrical energy
                        </label>
                        <label class="option">
                            <input type="radio" name="q4" value="d"> Measures electric current
                        </label>
                    </div>
                </div>

                <!-- Question 5 -->
                <div class="question" id="q5">
                    <h3><span class="question-number">5</span> Which rule is used to determine the direction of magnetic
                        field around a current-carrying wire?</h3>
                    <div class="options">
                        <label class="option">
                            <input type="radio" name="q5" value="a"> Fleming's left-hand rule
                        </label>
                        <label class="option">
                            <input type="radio" name="q5" value="b"> Right-hand grip rule
                        </label>
                        <label class="option">
                            <input type="radio" name="q5" value="c"> Lenz's law
                        </label>
                        <label class="option">
                            <input type="radio" name="q5" value="d"> Faraday's law
                        </label>
                    </div>
                </div>

                <!-- Question 6 -->
                <div class="question" id="q6">
                    <h3><span class="question-number">6</span> What is electromagnetic induction?</h3>
                    <div class="options">
                        <label class="option">
                            <input type="radio" name="q6" value="a"> Generation of current by a moving magnet
                        </label>
                        <label class="option">
                            <input type="radio" name="q6" value="b"> Magnetic field produced by electric current
                        </label>
                        <label class="option">
                            <input type="radio" name="q6" value="c"> Force between two magnets
                        </label>
                        <label class="option">
                            <input type="radio" name="q6" value="d"> Charging by friction
                        </label>
                    </div>
                </div>

                <!-- Question 7 -->
                <div class="question" id="q7">
                    <h3><span class="question-number">7</span> What is the unit of electrical resistance?</h3>
                    <div class="options">
                        <label class="option">
                            <input type="radio" name="q7" value="a"> Volt
                        </label>
                        <label class="option">
                            <input type="radio" name="q7" value="b"> Ampere
                        </label>
                        <label class="option">
                            <input type="radio" name="q7" value="c"> Ohm
                        </label>
                        <label class="option">
                            <input type="radio" name="q7" value="d"> Watt
                        </label>
                    </div>
                </div>

                <!-- Question 8 -->
                <div class="question" id="q8">
                    <h3><span class="question-number">8</span> In a series circuit, what happens to the total
                        resistance?</h3>
                    <div class="options">
                        <label class="option">
                            <input type="radio" name="q8" value="a"> Decreases as more resistors are added
                        </label>
                        <label class="option">
                            <input type="radio" name="q8" value="b"> Increases as more resistors are added
                        </label>
                        <label class="option">
                            <input type="radio" name="q8" value="c"> Remains constant
                        </label>
                        <label class="option">
                            <input type="radio" name="q8" value="d"> Depends on the voltage
                        </label>
                    </div>
                </div>

                <!-- Question 9 -->
                <div class="question" id="q9">
                    <h3><span class="question-number">9</span> What does Lenz's law state about induced EMF?</h3>
                    <div class="options">
                        <label class="option">
                            <input type="radio" name="q9" value="a"> It is proportional to the rate of change of flux
                        </label>
                        <label class="option">
                            <input type="radio" name="q9" value="b"> It opposes the change producing it
                        </label>
                        <label class="option">
                            <input type="radio" name="q9" value="c"> It is independent of the magnetic field
                        </label>
                        <label class="option">
                            <input type="radio" name="q9" value="d"> It enhances the change producing it
                        </label>
                    </div>
                </div>

                <!-- Question 10 -->
                <div class="question" id="q10">
                    <h3><span class="question-number">10</span> What is the primary principle behind electric motors?
                    </h3>
                    <div class="options">
                        <label class="option">
                            <input type="radio" name="q10" value="a"> Electromagnetic induction
                        </label>
                        <label class="option">
                            <input type="radio" name="q10" value="b"> Force on a current-carrying conductor in a
                            magnetic field
                        </label>
                        <label class="option">
                            <input type="radio" name="q10" value="c"> Self-inductance
                        </label>
                        <label class="option">
                            <input type="radio" name="q10" value="d"> Electrostatic induction
                        </label>
                    </div>
                </div>

                <div class="navigation">
                    <button type="button" class="nav-btn" id="prev-btn">
                        <i class="fas fa-arrow-left"></i> Previous
                    </button>
                    <button type="button" class="nav-btn pulse" id="next-btn">
                        Next <i class="fas fa-arrow-right"></i>
                    </button>
                </div>

                <button type="submit" class="submit-btn pulse">
                    <i class="fas fa-bolt"></i> Submit Quiz
                </button>
            </form>

            <div id="result" class="result"></div>
        </div>

        <div class="footer">
            Grade 12 Physical Sciences | Electricity & Magnetism Quiz
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const quizForm = document.getElementById('quizForm');
            const resultDiv = document.getElementById('result');
            const progressTracker = document.getElementById('progress-tracker');
            const currentQ = document.getElementById('current-q');
            const prevBtn = document.getElementById('prev-btn');
            const nextBtn = document.getElementById('next-btn');

            // Correct answers
            const answers = {
                q1: 'b',
                q2: 'c',
                q3: 'b',
                q4: 'b',
                q5: 'b',
                q6: 'a',
                q7: 'c',
                q8: 'b',
                q9: 'b',
                q10: 'b'
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
                trackerItem.addEventListener('click', function () {
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
            prevBtn.addEventListener('click', function () {
                if (currentQuestion > 1) {
                    scrollToQuestion(currentQuestion - 1);
                }
            });

            nextBtn.addEventListener('click', function () {
                if (currentQuestion < totalQuestions) {
                    scrollToQuestion(currentQuestion + 1);
                }
            });

            // Update tracker when an answer is selected
            document.querySelectorAll('input[type="radio"]').forEach(radio => {
                radio.addEventListener('change', function () {
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
            quizForm.addEventListener('submit', function (e) {
                e.preventDefault();
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

                if (percentage >= 85) {
                    message += "⭐ Excellent! ⭐";
                } else if (percentage >= 70) {
                    message += "👍 Great job! 👍";
                } else if (percentage >= 50) {
                    message += "😊 Good effort! 😊";
                } else {
                    message += "📚 Keep studying! 📚";
                }

                resultDiv.textContent = message;

                // Style result based on performance
                if (percentage >= 70) {
                    resultDiv.className = 'result success';
                } else {
                    resultDiv.className = 'result failure';
                }

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