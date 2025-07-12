<?php
// Agricultural Sciences Quizzes Index
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade 12 Agricultural Sciences Quizzes</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
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
            color: #27ae60;
        }

        .card p {
            font-size: 0.95rem;
            color: #7f8c8d;
        }

        .back-button-container {
            position: relative;
            padding: 1rem 0;
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
    <h1>Grade 12 Agricultural Sciences Quizzes</h1>
    <div class="gallery">
        <a href="Animal nutrition.php" class="card">
            <h2>Animal Nutrition</h2>
            <p>Understand essential nutrients and digestion in livestock.</p>
        </a>
        <a href="crop_production.php" class="card">
            <h2>Crop Production</h2>
            <p>Test your knowledge on crop growth and farming practices.</p>
        </a>
        <a href="genetics.php" class="card">
            <h2>Genetics</h2>
            <p>Assess your grasp on inheritance and breeding systems.</p>
        </a>
        <a href="soil_science.php" class="card">
            <h2>Soil Science</h2>
            <p>Explore soil types, profiles, and nutrient cycles.</p>
        </a>
        <a href="agri_management.php" class="card">
            <h2>Agricultural Management</h2>
            <p>Review planning, decision-making, and risk management.</p>
        </a>
        <a href="sustainable_farming.php" class="card">
            <h2>Sustainable Farming</h2>
            <p>Test your knowledge on eco-friendly agricultural methods.</p>
        </a>
        <a href="agri_economics.php" class="card">
            <h2>Agricultural Economics</h2>
            <p>Understand supply, demand, and agri-business principles.</p>
        </a>
    </div>
</body>

</html>