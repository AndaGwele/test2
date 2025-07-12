<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Grade 12 Physical Sciences Quizzes</title>
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
        font-weight: bold;
        font-size: 1.2rem;
    }

    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        color: #27ae60;
    }
    </style>
</head>

<body>
    <h1>Grade 12 Physical Sciences Quizzes</h1>
    <div class="gallery">
        <a href="mechanics_quiz.php" class="card">Mechanics</a>
        <a href="electricity_magnetism_quiz.php" class="card">Electricity & Magnetism</a>
        <a href="waves_sound_light_quiz.php" class="card">Waves, Sound & Light</a>
        <a href="matter.php" class="card">Matter & Materials</a>
        <a href="chemical changes.php" class="card">Chemical Change</a>
        <a href="chemical_systems.php" class="card">Chemical Systems</a>
        <a href="organic chem.php" class="card">Organic Chemistry</a>
    </div>
</body>

</html>