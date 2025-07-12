<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Grade 12 Maths Quizzes</title>
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #eef2f7;
        margin: 0;
        padding: 40px 20px;
        color: #34495e;
    }

    h1 {
        text-align: center;
        margin-bottom: 40px;
        color: #2c3e50;
    }

    .gallery {
        max-width: 960px;
        margin: auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 25px;
    }

    .card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        text-align: center;
        padding: 30px 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
        text-decoration: none;
        color: #2c3e50;
    }

    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .card h2 {
        margin-bottom: 12px;
        font-size: 1.3rem;
        color: #2980b9;
    }

    .card p {
        font-size: 0.95rem;
        color: #7f8c8d;
    }

    .back-button {
        display: inline-flex;
        align-items: center;
        background-color: #1a73e8;
        color: white;
        padding: 0.6rem 1.2rem;
        border-radius: 4px;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s ease;
        cursor: pointer;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .back-button:hover {
        background-color: #1557b0;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .back-button:active {
        transform: translateY(0);
    }

    .back-button::before {
        content: "←";
        margin-right: 8px;
        font-size: 1.1rem;
    }
    </style>
</head>

<body>
    <div class="back-button-container">
        <button class="back-button" onclick="window.history.back()">Back</button>
    </div>
    <h1>Grade 12 Mathematics Quizzes</h1>
    <div class="gallery">
        <a href="Calculus.php" class="card">
            <h2>Calculus</h2>
            <p>Test your knowledge on limits, differentiation, and
                integration.</p>
        </a>
        <a href="algebra.php" class="card">
            <h2>Algebra</h2>
            <p>Practice solving equations and inequalities.</p>
        </a>
        <a href="sequences.php" class="card">
            <h2>Sequences & Series</h2>
            <p>Challenge yourself with arithmetic and geometric
                sequences.</p>
        </a>
        <a href="functions.php" class="card">
            <h2>Functions</h2>
            <p>Understand domain, range, and function properties.</p>
        </a>
        <a href="trig.php" class="card">
            <h2>Trigonometry</h2>
            <p>Review trig values and identities.</p>
        </a>
        <a href="vectors.php" class="card">
            <h2>Vectors</h2>
            <p>Practice vector magnitudes and dot products.</p>
        </a>
        <a href="probability.php" class="card">
            <h2>Probability & Statistics</h2>
            <p>Test basic probability and statistical concepts.</p>
        </a>
    </div>
</body>

</html>