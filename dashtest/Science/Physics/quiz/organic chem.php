<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organic Chemistry Quiz - Grade 12 Physical Sciences</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* All previous CSS stays exactly the same — omitted here for brevity */
        /* You can paste the same <style> block from the previous quiz */
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

        .science-icon {
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

            .science-icon {
                font-size: 8rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="chemical-icon icon-1">🧬</div>
        <div class="chemical-icon icon-2">🧫</div>

        <div class="header">
            <h1>Organic Chemistry Quiz</h1>
            <p>Test your understanding of Organic Chemistry in Grade 12 Physical Sciences</p>
        </div>

        <div class="progress-container">
            <div class="progress-info">
                Question <span id="current-q">1</span> of 10
            </div>
            <div class="progress-tracker" id="progress-tracker"></div>
        </div>

        <div class="quiz-content">
            <form id="quizForm">
                <!-- Q1 -->
                <div class="question" id="q1">
                    <h3><span class="question-number">1</span> What is the general formula for alkanes?
                    </h3>
                    <div class="options">
                        <label class="option"><input type="radio" name="q1" value="a"> CₙH₂ₙ</label>
                        <label class="option"><input type="radio" name="q1" value="b"> CₙH₂ₙ₊₂</label>
                        <label class="option"><input type="radio" name="q1" value="c"> CₙH₂ₙ₋₂</label>
                        <label class="option"><input type="radio" name="q1" value="d"> CₙH₂ₙO</label>
                    </div>
                </div>

                <!-- Q2 -->
                <div class="question" id="q2">
                    <h3><span class="question-number">2</span> Which functional group is found in
                        alcohols?</h3>
                    <div class="options">
                        <label class="option"><input type="radio" name="q2" value="a"> –CHO</label>
                        <label class="option"><input type="radio" name="q2" value="b"> –OH</label>
                        <label class="option"><input type="radio" name="q2" value="c"> –COOH</label>
                        <label class="option"><input type="radio" name="q2" value="d"> –NH₂</label>
                    </div>
                </div>

                <!-- Q3 -->
                <div class="question" id="q3">
                    <h3><span class="question-number">3</span> What is the IUPAC name of CH₃CH₂CH₂OH?
                    </h3>
                    <div class="options">
                        <label class="option"><input type="radio" name="q3" value="a"> Methanol</label>
                        <label class="option"><input type="radio" name="q3" value="b"> Ethanol</label>
                        <label class="option"><input type="radio" name="q3" value="c"> Propanol</label>
                        <label class="option"><input type="radio" name="q3" value="d"> Butanol</label>
                    </div>
                </div>

                <!-- Q4 -->
                <div class="question" id="q4">
                    <h3><span class="question-number">4</span> Which type of reaction involves the
                        breaking of a larger molecule into smaller ones?</h3>
                    <div class="options">
                        <label class="option"><input type="radio" name="q4" value="a"> Addition</label>
                        <label class="option"><input type="radio" name="q4" value="b">
                            Substitution</label>
                        <label class="option"><input type="radio" name="q4" value="c">
                            Elimination</label>
                        <label class="option"><input type="radio" name="q4" value="d">
                            Condensation</label>
                    </div>
                </div>

                <!-- Q5 -->
                <div class="question" id="q5">
                    <h3><span class="question-number">5</span> Which of the following is an unsaturated
                        hydrocarbon?</h3>
                    <div class="options">
                        <label class="option"><input type="radio" name="q5" value="a"> Methane</label>
                        <label class="option"><input type="radio" name="q5" value="b"> Ethene</label>
                        <label class="option"><input type="radio" name="q5" value="c"> Propane</label>
                        <label class="option"><input type="radio" name="q5" value="d"> Butane</label>
                    </div>
                </div>

                <!-- Q6 -->
                <div class="question" id="q6">
                    <h3><span class="question-number">6</span> What is the suffix used in naming
                        ketones?</h3>
                    <div class="options">
                        <label class="option"><input type="radio" name="q6" value="a"> -ol</label>
                        <label class="option"><input type="radio" name="q6" value="b"> -al</label>
                        <label class="option"><input type="radio" name="q6" value="c"> -one</label>
                        <label class="option"><input type="radio" name="q6" value="d"> -ene</label>
                    </div>
                </div>

                <!-- Q7 -->
                <div class="question" id="q7">
                    <h3><span class="question-number">7</span> What is an isomer?</h3>
                    <div class="options">
                        <label class="option"><input type="radio" name="q7" value="a"> Same formula,
                            different properties</label>
                        <label class="option"><input type="radio" name="q7" value="b"> Same formula,
                            different structure</label>
                        <label class="option"><input type="radio" name="q7" value="c"> Same structure,
                            different elements</label>
                        <label class="option"><input type="radio" name="q7" value="d"> Same elements,
                            same structure</label>
                    </div>
                </div>

                <!-- Q8 -->
                <div class="question" id="q8">
                    <h3><span class="question-number">8</span> Which compound is classified as an
                        alkene?</h3>
                    <div class="options">
                        <label class="option"><input type="radio" name="q8" value="a"> CH₄</label>
                        <label class="option"><input type="radio" name="q8" value="b"> C₂H₆</label>
                        <label class="option"><input type="radio" name="q8" value="c"> C₂H₄</label>
                        <label class="option"><input type="radio" name="q8" value="d"> C₄H₁₀</label>
                    </div>
                </div>

                <!-- Q9 -->
                <div class="question" id="q9">
                    <h3><span class="question-number">9</span> What is the product of the complete
                        combustion of a hydrocarbon?</h3>
                    <div class="options">
                        <label class="option"><input type="radio" name="q9" value="a"> CO + H₂O</label>
                        <label class="option"><input type="radio" name="q9" value="b"> CO₂ + H₂O</label>
                        <label class="option"><input type="radio" name="q9" value="c"> C + H₂O</label>
                        <label class="option"><input type="radio" name="q9" value="d"> H₂O + O₂</label>
                    </div>
                </div>

                <!-- Q10 -->
                <div class="question" id="q10">
                    <h3><span class="question-number">10</span> Which compound is an example of a
                        carboxylic acid?</h3>
                    <div class="options">
                        <label class="option"><input type="radio" name="q10" value="a"> CH₃OH</label>
                        <label class="option"><input type="radio" name="q10" value="b">
                            CH₃CH₂COOH</label>
                        <label class="option"><input type="radio" name="q10" value="c">
                            CH₃CH₂NH₂</label>
                        <label class="option"><input type="radio" name="q10" value="d"> CH₄</label>
                    </div>
                </div>

                <div class="navigation">
                    <button type="button" class="nav-btn" id="prev-btn"><i class="fas fa-arrow-left"></i>
                        Previous</button>
                    <button type="button" class="nav-btn" id="next-btn">Next <i class="fas fa-arrow-right"></i></button>
                </div>

                <button type="submit" class="submit-btn"><i class="fas fa-paper-plane"></i> Submit
                    Quiz</button>
            </form>

            <div id="result" class="result"></div>
        </div>

        <div class="footer">Grade 12 Physical Sciences | Organic Chemistry Quiz</div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const quizForm = document.getElementById('quizForm');
            const resultDiv = document.getElementById('result');
            const progressTracker = document.getElementById('progress-tracker');
            const currentQ = document.getElementById('current-q');
            const prevBtn = document.getElementById('prev-btn');
            const nextBtn = document.getElementById('next-btn');

            const answers = {
                q1: 'b',
                q2: 'b',
                q3: 'c',
                q4: 'c',
                q5: 'b',
                q6: 'c',
                q7: 'b',
                q8: 'c',
                q9: 'b',
                q10: 'b'
            };

            let currentQuestion = 1;
            const totalQuestions = 10;

            for (let i = 1; i <= totalQuestions; i++) {
                const trackerItem = document.createElement('div');
                trackerItem.className = 'tracker-item unanswered';
                trackerItem.textContent = i;
                trackerItem.dataset.q = i;
                if (i === currentQuestion) trackerItem.classList.add('current');
                trackerItem.addEventListener('click', function () {
                    scrollToQuestion(i);
                });
                progressTracker.appendChild(trackerItem);
            }

            function updateCurrentQuestionDisplay() {
                currentQ.textContent = currentQuestion;
                document.querySelectorAll('.tracker-item').forEach(item => {
                    item.classList.remove('current');
                    if (parseInt(item.dataset.q) === currentQuestion) item.classList.add(
                        'current');
                });
                prevBtn.disabled = currentQuestion === 1;
                nextBtn.disabled = currentQuestion === totalQuestions;
            }

            function scrollToQuestion(qNum) {
                const questionElement = document.getElementById(`q${qNum}`);
                if (questionElement) {
                    questionElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                    currentQuestion = qNum;
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
                radio.addEventListener('change', function () {
                    const qNum = this.name.substring(1);
                    const trackerItem = document.querySelector(
                        `.tracker-item[data-q="${qNum}"]`);
                    if (trackerItem) {
                        trackerItem.classList.remove('unanswered');
                        trackerItem.classList.add('answered');
                    }
                });
            });

            quizForm.addEventListener('submit', function (e) {
                e.preventDefault();
                let score = 0;
                const formData = new FormData(this);
                for (let q in answers) {
                    if (formData.get(q) === answers[q]) score++;
                }
                const percentage = (score / totalQuestions) * 100;
                resultDiv.textContent =
                    `You scored ${score}/${totalQuestions} (${percentage.toFixed(1)}%)`;
                resultDiv.className = percentage >= 70 ? 'result success' :
                    'result failure';
                resultDiv.scrollIntoView({
                    behavior: 'smooth'
                });
            });

            scrollToQuestion(1);
        });
    </script>
</body>

</html>