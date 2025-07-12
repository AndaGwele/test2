<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Grade 12 Accounting Quizzes</title>
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
    <h1>Grade 12 Accounting Quizzes</h1>
    <div class="gallery">
        <a href="Accounting_Budgeting.php" class="card">Budgeting</a>
        <a href="Accounting_FinancialStatements.php" class="card">Financial Statements</a>
        <a href="Accounting_Reconciliations.php" class="card">Reconciliations</a>
        <a href="Accounting_CostAccounting.php" class="card">Cost Accounting</a>
    </div>
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
</body>

</html>