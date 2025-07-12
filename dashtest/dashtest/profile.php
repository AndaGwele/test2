<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Confirm Logout</title>
    <style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        height: 100vh;
        background: #f0f2f5;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card {
        background: white;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        text-align: center;
        max-width: 400px;
        width: 90%;
    }

    .card h2 {
        margin-bottom: 1.5rem;
        color: #333;
    }

    .btn-group {
        display: flex;
        justify-content: center;
        gap: 1rem;
    }

    .btn {
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        cursor: pointer;
        transition: background 0.3s ease;
        text-decoration: none;
        color: white;
    }

    .btn.logout {
        background-color: #e74c3c;
    }

    .btn.logout:hover {
        background-color: #c0392b;
    }

    .btn.cancel {
        background-color: #2ecc71;
    }

    .btn.cancel:hover {
        background-color: #27ae60;
    }
    </style>
</head>

<body>
    <div class="card">
        <h2>Are you sure you want to log out?</h2>
        <div class="btn-group">
            <a href="logout.php" class="btn logout">Yes, Log Out</a>
            <a href="dashboard.php" class="btn cancel">Cancel</a>
        </div>
    </div>
</body>

</html>