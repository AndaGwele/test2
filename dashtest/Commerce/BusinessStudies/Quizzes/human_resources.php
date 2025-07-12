<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Ventures Quiz - Grade 12 Business Studies</title>
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
    }

    .container {
        max-width: 800px;
        margin: 30px auto;
        background: rgba(255, 255, 255, 0.95);
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    header {
        text-align: center;
        margin-bottom: 25px;
        padding-bottom: 20px;
        border-bottom: 2px solid #3498db;
    }

    h1 {
        font-size: 2.5rem;
        margin-bottom: 10px;
        color: #2c3e50;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
    }

    .subtitle {
        font-size: 1.1rem;
        color: #7f8c8d;
        margin-bottom: 5px;
    }

    .instructions {
        background-color: #e3f2fd;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 25px;
        font-size: 0.95rem;
        border-left: 4px solid #3498db;
    }

    .question {
        background: white;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-left: 4px solid #3498db;
    }

    .question:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .question h3 {
        font-size: 1.2rem;
        margin-bottom: 15px;
        color: #2c3e50;
        display: flex;
    }

    .question-number {
        background: #3498db;
        color: white;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-right: 10px;
        flex-shrink: 0;
    }

    .options {
        padding-left: 40px;
    }

    .option {
        display: flex;
        align-items: flex-start;
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 5px;
        transition: background-color 0.2s;
    }

    .option:hover {
        background-color: #f8f9fa;
    }

    .option input {
        margin-top: 5px;
        margin-right: 10px;
        cursor: pointer;
    }

    .option label {
        cursor: pointer;
        font-size: 1rem;
    }

    .submit-btn {
        display: block;
        margin: 30px auto;
        background: linear-gradient(to right, #3498db, #2980b9);
        color: white;
        border: none;
        padding: 12px 35px;
        border-radius: 30px;
        cursor: pointer;
        font-size: 1.1rem;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(52, 152, 219, 0.4);
    }

    .submit-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(52, 152, 219, 0.5);
        background: linear-gradient(to right, #2980b9, #3498db);
    }

    .result-container {
        text-align: center;
        padding: 25px;
        margin-top: 20px;
        border-radius: 10px;
        display: none;
    }

    .result-title {
        font-size: 1.8rem;
        margin-bottom: 15px;
        color: #2c3e50;
    }

    .score {
        font-size: 4rem;
        font-weight: bold;
        color: #3498db;
        margin: 20px 0;
    }

    .feedback {
        font-size: 1.2rem;
        margin-bottom: 20px;
    }

    .restart-btn {
        background: linear-gradient(to right, #2ecc71, #27ae60);
        color: white;
        border: none;
        padding: 10px 25px;
        border-radius: 30px;
        cursor: pointer;
        font-size: 1rem;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(46, 204, 113, 0.4);
    }

    .restart-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(46, 204, 113, 0.5);
    }

    .progress-container {
        margin-bottom: 20px;
    }

    .progress-bar {
        height: 12px;
        background-color: #ecf0f1;
        border-radius: 6px;
        overflow: hidden;
        margin-top: 5px;
    }

    .progress {
        height: 100%;
        background: linear-gradient(to right, #3498db, #2980b9);
        border-radius: 6px;
        width: 0%;
        transition: width 0.5s ease;
    }

    .progress-text {
        font-size: 0.9rem;
        color: #7f8c8d;
        text-align: right;
    }

    footer {
        text-align: center;
        margin-top: 30px;
        color: #ecf0f1;
        font-size: 0.9rem;
    }

    .correct {
        color: #27ae60;
        font-weight: bold;
    }

    .incorrect {
        color: #e74c3c;
        font-weight: bold;
    }

    @media (max-width: 600px) {
        .container {
            padding: 15px;
            margin: 15px;
        }

        h1 {
            font-size: 2rem;
        }

        .question {
            padding: 15px;
        }

        .options {
            padding-left: 20px;
        }
    }
    </style>
</head>

<body>
    <button onclick='history.back()' style='
    padding: 10px 20px; 
    background-color: #4CAF50; 
    color: white; 
    border: none; 
    border-radius: 5px; 
    cursor: pointer; 
    font-size: 16px;
  '>
        ← Back
    </button>
    <div class="container">
        <header>
            <h1>Human Resources Quiz</h1>
            <div class="subtitle">Grade 12 Business Studies</div>
        </header>

        <div class="instructions">
            <p><strong>Instructions:</strong> This quiz tests your knowledge of Human Resources. There are 10
                multiple-choice
                questions. Read each question carefully and select the best answer. Click "Submit Quiz" when you're
                finished to
                see your results.</p>
        </div>

        <div class="progress-container">
            <div class="progress-text">Progress: <span id="progress-count">0</span>/10 answered</div>
            <div class="progress-bar">
                <div class="progress" id="quiz-progress"></div>
            </div>
        </div>

        <form id="quizForm">
            <!-- Question 1 -->
            <div class="question">
                <h3><span class="question-number">1</span> What is the main function of Human Resources in a business?
                </h3>
                <div class="options">
                    <div class="option"><input type="radio" name="q1" value="a" id="q1a"><label for="q1a">Selling
                            products</label>
                    </div>
                    <div class="option"><input type="radio" name="q1" value="b" id="q1b"><label for="q1b">Managing
                            finances</label></div>
                    <div class="option"><input type="radio" name="q1" value="c" id="q1c"><label for="q1c">Managing and
                            developing
                            employees</label></div>
                    <div class="option"><input type="radio" name="q1" value="d" id="q1d"><label for="q1d">Designing
                            advertisements</label></div>
                </div>
            </div>

            <!-- Question 2 -->
            <div class="question">
                <h3><span class="question-number">2</span> Which of the following is part of the recruitment process?
                </h3>
                <div class="options">
                    <div class="option"><input type="radio" name="q2" value="a" id="q2a"><label for="q2a">Creating
                            employee
                            benefits</label></div>
                    <div class="option"><input type="radio" name="q2" value="b" id="q2b"><label for="q2b">Shortlisting
                            applicants</label></div>
                    <div class="option"><input type="radio" name="q2" value="c" id="q2c"><label for="q2c">Calculating
                            profit
                            margins</label></div>
                    <div class="option"><input type="radio" name="q2" value="d" id="q2d"><label for="q2d">Delivering
                            training</label></div>
                </div>
            </div>

            <!-- Question 3 -->
            <div class="question">
                <h3><span class="question-number">3</span> What is induction in HR?</h3>
                <div class="options">
                    <div class="option"><input type="radio" name="q3" value="a" id="q3a"><label for="q3a">The process of
                            firing
                            employees</label></div>
                    <div class="option"><input type="radio" name="q3" value="b" id="q3b"><label for="q3b">Introducing
                            new
                            employees to the organization</label></div>
                    <div class="option"><input type="radio" name="q3" value="c" id="q3c"><label for="q3c">Paying
                            salaries</label>
                    </div>
                    <div class="option"><input type="radio" name="q3" value="d" id="q3d"><label for="q3d">Measuring
                            company
                            profit</label></div>
                </div>
            </div>

            <!-- Question 4 -->
            <div class="question">
                <h3><span class="question-number">4</span> Which law protects employees in South Africa?</h3>
                <div class="options">
                    <div class="option"><input type="radio" name="q4" value="a" id="q4a"><label for="q4a">Basic
                            Conditions of
                            Employment Act</label></div>
                    <div class="option"><input type="radio" name="q4" value="b" id="q4b"><label for="q4b">Public
                            Holidays
                            Act</label></div>
                    <div class="option"><input type="radio" name="q4" value="c" id="q4c"><label for="q4c">Advertising
                            Act</label>
                    </div>
                    <div class="option"><input type="radio" name="q4" value="d" id="q4d"><label for="q4d">Taxation
                            Act</label>
                    </div>
                </div>
            </div>

            <!-- Question 5 -->
            <div class="question">
                <h3><span class="question-number">5</span> What is performance appraisal?</h3>
                <div class="options">
                    <div class="option"><input type="radio" name="q5" value="a" id="q5a"><label for="q5a">A job
                            interview</label>
                    </div>
                    <div class="option"><input type="radio" name="q5" value="b" id="q5b"><label for="q5b">Training for
                            staff</label></div>
                    <div class="option"><input type="radio" name="q5" value="c" id="q5c"><label for="q5c">Evaluation of
                            employee
                            performance</label></div>
                    <div class="option"><input type="radio" name="q5" value="d" id="q5d"><label for="q5d">Customer
                            satisfaction
                            survey</label></div>
                </div>
            </div>

            <!-- Question 6 -->
            <div class="question">
                <h3><span class="question-number">6</span> Which of the following is a motivation strategy?</h3>
                <div class="options">
                    <div class="option"><input type="radio" name="q6" value="a" id="q6a"><label for="q6a">Ignoring
                            employee
                            suggestions</label></div>
                    <div class="option"><input type="radio" name="q6" value="b" id="q6b"><label for="q6b">Providing
                            incentives and
                            rewards</label></div>
                    <div class="option"><input type="radio" name="q6" value="c" id="q6c"><label for="q6c">Cutting
                            salaries</label>
                    </div>
                    <div class="option"><input type="radio" name="q6" value="d" id="q6d"><label for="q6d">Increasing
                            work
                            hours</label></div>
                </div>
            </div>

            <!-- Question 7 -->
            <div class="question">
                <h3><span class="question-number">7</span> What does the term "job description" refer to?</h3>
                <div class="options">
                    <div class="option"><input type="radio" name="q7" value="a" id="q7a"><label for="q7a">List of
                            company
                            values</label></div>
                    <div class="option"><input type="radio" name="q7" value="b" id="q7b"><label for="q7b">Details of
                            duties and
                            responsibilities of a job</label></div>
                    <div class="option"><input type="radio" name="q7" value="c" id="q7c"><label for="q7c">Company
                            history</label>
                    </div>
                    <div class="option"><input type="radio" name="q7" value="d" id="q7d"><label for="q7d">Employee name
                            list</label></div>
                </div>
            </div>

            <!-- Question 8 -->
            <div class="question">
                <h3><span class="question-number">8</span> What is one role of trade unions in HR?</h3>
                <div class="options">
                    <div class="option"><input type="radio" name="q8" value="a" id="q8a"><label for="q8a">Enforcing tax
                            laws</label></div>
                    <div class="option"><input type="radio" name="q8" value="b" id="q8b"><label for="q8b">Representing
                            employee
                            interests and rights</label></div>
                    <div class="option"><input type="radio" name="q8" value="c" id="q8c"><label for="q8c">Hiring
                            managers</label>
                    </div>
                    <div class="option"><input type="radio" name="q8" value="d" id="q8d"><label for="q8d">Setting
                            company
                            prices</label></div>
                </div>
            </div>

            <!-- Question 9 -->
            <div class="question">
                <h3><span class="question-number">9</span> What is the benefit of training employees?</h3>
                <div class="options">
                    <div class="option"><input type="radio" name="q9" value="a" id="q9a"><label for="q9a">Decreases
                            employee
                            skills</label></div>
                    <div class="option"><input type="radio" name="q9" value="b" id="q9b"><label for="q9b">Improves
                            productivity
                            and job satisfaction</label></div>
                    <div class="option"><input type="radio" name="q9" value="c" id="q9c"><label for="q9c">Leads to
                            employee
                            resignations</label></div>
                    <div class="option"><input type="radio" name="q9" value="d" id="q9d"><label for="q9d">Reduces
                            company
                            profit</label></div>
                </div>
            </div>

            <!-- Question 10 -->
            <div class="question">
                <h3><span class="question-number">10</span> What is included in employee compensation?</h3>
                <div class="options">
                    <div class="option"><input type="radio" name="q10" value="a" id="q10a"><label for="q10a">Only
                            working
                            hours</label></div>
                    <div class="option"><input type="radio" name="q10" value="b" id="q10b"><label for="q10b">Salaries,
                            wages, and
                            benefits</label></div>
                    <div class="option"><input type="radio" name="q10" value="c" id="q10c"><label for="q10c">Furniture
                            expenses</label></div>
                    <div class="option"><input type="radio" name="q10" value="d" id="q10d"><label for="q10d">Advertising
                            budgets</label></div>
                </div>
            </div>




            <button type="submit" class="submit-btn">Submit Quiz</button>
        </form>

        <div id="result" class="result-container">
            <h2 class="result-title">Quiz Results</h2>
            <div class="score"><span id="final-score">0</span>/10</div>
            <div class="feedback" id="feedback-message"></div>
            <button class="restart-btn" onclick="resetQuiz()">Take Quiz Again</button>
        </div>
    </div>

    <footer>
        <p>Grade 12 Business Studies | Business Ventures Quiz</p>
    </footer>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('quizForm');
        const resultContainer = document.getElementById('result');
        const finalScore = document.getElementById('final-score');
        const feedbackMessage = document.getElementById('feedback-message');
        const progressCount = document.getElementById('progress-count');
        const progressBar = document.getElementById('quiz-progress');

        // Correct answers


        const answers = {
            q1: 'c',
            q2: 'b',
            q3: 'b',
            q4: 'a',
            q5: 'c',
            q6: 'b',
            q7: 'b',
            q8: 'b',
            q9: 'b',
            q10: 'b'
        };

        // Track answered questions
        let answeredCount = 0;

        // Update progress when an answer is selected
        const radioButtons = document.querySelectorAll('input[type="radio"]');
        radioButtons.forEach(radio => {
            radio.addEventListener('change', updateProgress);
        });

        function updateProgress() {
            // Count how many questions have been answered
            answeredCount = 0;
            for (let i = 1; i <= 10; i++) {
                const questionName = 'q' + i;
                if (document.querySelector(`input[name="${questionName}"
        ]:checked`)) {
                    answeredCount++;
                }
            }
            progressCount.textContent = answeredCount;
            progressBar.style.width = (answeredCount / 10 * 100) + '%';
        } // Submit form form.addEventListener('submit',
        function(e) {
            e.preventDefault();
            if (answeredCount < 10) {
                alert('Please answer all questions before
                    submitting.
                    '); return; } let score=0; // Check answers for (let i=1; i <=10; i++) { const questionName='
                    q ' + i;
                    const selectedAnswer = document.querySelector(`input[name="${questionName}" ]:checked`)
                        .value;
                    if (selectedAnswer === answers[questionName]) {
                        score++;
                    }
                } // Display results finalScore.textContent=score;
                resultContainer.style.display =
                    'block'; // Scroll to results resultContainer.scrollIntoView({ behavior: 'smooth'
            }); // Provide feedback if (score>= 8) {
        feedbackMessage.innerHTML =
            'Excellent! <span class="correct">You have mastered business venture concepts.</span>';
    } else if (score >= 5) {
        feedbackMessage.innerHTML =
            'Good job! <span class="correct">You have a solid understanding of business ventures.</span>';
    } else {
        feedbackMessage.innerHTML =
            'Keep studying! <span class="incorrect">Review business venture concepts and try again.</span>';
    }
    });

    // Reset quiz function
    window.resetQuiz = function() {
    form.reset();
    resultContainer.style.display = 'none';
    answeredCount = 0;
    progressCount.textContent = answeredCount;
    progressBar.style.width = '0%';
    }
    });
    </script>
</body>

</html>