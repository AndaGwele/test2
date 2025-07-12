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
            <h1>Entrepreneurship Quiz</h1>
            <div class="subtitle">Grade 12 Business Studies</div>
        </header>

        <div class="instructions">
            <p><strong>Instructions:</strong> This quiz tests your knowledge of Entrepreneurship. There are 10
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
                <h3><span class="question-number">1</span> What is an entrepreneur?</h3>
                <div class="options">
                    <div class="option"><input type="radio" name="q1" value="a" id="q1a"><label for="q1a">A government
                            official</label></div>
                    <div class="option"><input type="radio" name="q1" value="b" id="q1b"><label for="q1b">Someone who
                            manages a
                            nonprofit</label></div>
                    <div class="option"><input type="radio" name="q1" value="c" id="q1c"><label for="q1c">A person who
                            starts and
                            runs their own business</label></div>
                    <div class="option"><input type="radio" name="q1" value="d" id="q1d"><label for="q1d">A university
                            professor</label></div>
                </div>
            </div>

            <!-- Question 2 -->
            <div class="question">
                <h3><span class="question-number">2</span> Which trait is commonly associated with successful
                    entrepreneurs?
                </h3>
                <div class="options">
                    <div class="option"><input type="radio" name="q2" value="a" id="q2a"><label for="q2a">Fear of
                            risk</label>
                    </div>
                    <div class="option"><input type="radio" name="q2" value="b" id="q2b"><label
                            for="q2b">Indecisiveness</label>
                    </div>
                    <div class="option"><input type="radio" name="q2" value="c" id="q2c"><label
                            for="q2c">Procrastination</label>
                    </div>
                    <div class="option"><input type="radio" name="q2" value="d" id="q2d"><label
                            for="q2d">Creativity</label></div>
                </div>
            </div>

            <!-- Question 3 -->
            <div class="question">
                <h3><span class="question-number">3</span> What is a business plan?</h3>
                <div class="options">
                    <div class="option"><input type="radio" name="q3" value="a" id="q3a"><label for="q3a">A legal
                            document</label>
                    </div>
                    <div class="option"><input type="radio" name="q3" value="b" id="q3b"><label for="q3b">A bank
                            statement</label>
                    </div>
                    <div class="option"><input type="radio" name="q3" value="c" id="q3c"><label for="q3c">A detailed
                            strategy for
                            starting and running a business</label></div>
                    <div class="option"><input type="radio" name="q3" value="d" id="q3d"><label for="q3d">A motivational
                            speech</label></div>
                </div>
            </div>

            <!-- Question 4 -->
            <div class="question">
                <h3><span class="question-number">4</span> What is meant by "bootstrapping" in entrepreneurship?</h3>
                <div class="options">
                    <div class="option"><input type="radio" name="q4" value="a" id="q4a"><label for="q4a">Hiring too
                            many
                            staff</label></div>
                    <div class="option"><input type="radio" name="q4" value="b" id="q4b"><label for="q4b">Starting a
                            business with
                            little to no external funding</label></div>
                    <div class="option"><input type="radio" name="q4" value="c" id="q4c"><label for="q4c">Copying
                            another business
                            model</label></div>
                    <div class="option"><input type="radio" name="q4" value="d" id="q4d"><label for="q4d">Selling shares
                            to
                            investors</label></div>
                </div>
            </div>

            <!-- Question 5 -->
            <div class="question">
                <h3><span class="question-number">5</span> What is a common source of funding for new entrepreneurs?
                </h3>
                <div class="options">
                    <div class="option"><input type="radio" name="q5" value="a" id="q5a"><label for="q5a">Inheritance
                            only</label>
                    </div>
                    <div class="option"><input type="radio" name="q5" value="b" id="q5b"><label for="q5b">Bank loans and
                            venture
                            capital</label></div>
                    <div class="option"><input type="radio" name="q5" value="c" id="q5c"><label
                            for="q5c">Gambling</label></div>
                    <div class="option"><input type="radio" name="q5" value="d" id="q5d"><label for="q5d">Money
                            laundering</label>
                    </div>
                </div>
            </div>

            <!-- Question 6 -->
            <div class="question">
                <h3><span class="question-number">6</span> Why is innovation important in entrepreneurship?</h3>
                <div class="options">
                    <div class="option"><input type="radio" name="q6" value="a" id="q6a"><label for="q6a">It guarantees
                            profits</label></div>
                    <div class="option"><input type="radio" name="q6" value="b" id="q6b"><label for="q6b">It helps
                            businesses stay
                            competitive and meet new demands</label></div>
                    <div class="option"><input type="radio" name="q6" value="c" id="q6c"><label for="q6c">It reduces
                            production
                            time only</label></div>
                    <div class="option"><input type="radio" name="q6" value="d" id="q6d"><label for="q6d">It is required
                            by
                            law</label></div>
                </div>
            </div>

            <!-- Question 7 -->
            <div class="question">
                <h3><span class="question-number">7</span> What is "market research" used for?</h3>
                <div class="options">
                    <div class="option"><input type="radio" name="q7" value="a" id="q7a"><label for="q7a">Finding office
                            space</label></div>
                    <div class="option"><input type="radio" name="q7" value="b" id="q7b"><label for="q7b">Understanding
                            customer
                            needs and preferences</label></div>
                    <div class="option"><input type="radio" name="q7" value="c" id="q7c"><label for="q7c">Hiring
                            employees</label>
                    </div>
                    <div class="option"><input type="radio" name="q7" value="d" id="q7d"><label for="q7d">Filing
                            taxes</label>
                    </div>
                </div>
            </div>

            <!-- Question 8 -->
            <div class="question">
                <h3><span class="question-number">8</span> What is a "competitive advantage"?</h3>
                <div class="options">
                    <div class="option"><input type="radio" name="q8" value="a" id="q8a"><label for="q8a">A large
                            advertising
                            budget</label></div>
                    <div class="option"><input type="radio" name="q8" value="b" id="q8b"><label for="q8b">A feature or
                            condition
                            that puts a business ahead of its rivals</label></div>
                    <div class="option"><input type="radio" name="q8" value="c" id="q8c"><label for="q8c">Discounted
                            product
                            pricing only</label></div>
                    <div class="option"><input type="radio" name="q8" value="d" id="q8d"><label for="q8d">A government
                            grant</label></div>
                </div>
            </div>

            <!-- Question 9 -->
            <div class="question">
                <h3><span class="question-number">9</span> Why is customer feedback valuable to entrepreneurs?</h3>
                <div class="options">
                    <div class="option"><input type="radio" name="q9" value="a" id="q9a"><label for="q9a">It wastes
                            time</label>
                    </div>
                    <div class="option"><input type="radio" name="q9" value="b" id="q9b"><label for="q9b">It can help
                            improve
                            products and services</label></div>
                    <div class="option"><input type="radio" name="q9" value="c" id="q9c"><label for="q9c">It replaces
                            advertising</label></div>
                    <div class="option"><input type="radio" name="q9" value="d" id="q9d"><label for="q9d">It avoids
                            competition</label></div>
                </div>
            </div>

            <!-- Question 10 -->
            <div class="question">
                <h3><span class="question-number">10</span> What is the risk in entrepreneurship?</h3>
                <div class="options">
                    <div class="option"><input type="radio" name="q10" value="a" id="q10a"><label for="q10a">There is no
                            risk</label></div>
                    <div class="option"><input type="radio" name="q10" value="b" id="q10b"><label for="q10b">Guaranteed
                            success</label></div>
                    <div class="option"><input type="radio" name="q10" value="c" id="q10c"><label for="q10c">Possibility
                            of loss
                            or failure</label></div>
                    <div class="option"><input type="radio" name="q10" value="d" id="q10d"><label for="q10d">Free
                            government
                            support</label></div>
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
            q2: 'd',
            q3: 'c',
            q4: 'b',
            q5: 'b',
            q6: 'b',
            q7: 'b',
            q8: 'b',
            q9: 'b',
            q10: 'c'
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