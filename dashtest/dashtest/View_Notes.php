<?php
// Database connection
session_start();
include("../Conn test.php");

if (!isset($_SESSION['id'])) {
    header("Location:../SignUPlogIN.html");
    exit();
}

$user_id = $_SESSION['id'];

// Fetch notes from the database
$stmt = $conn->prepare("SELECT title, content, subject_name, created_at FROM notes WHERE user_id = ? ORDER BY created_at DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Your Notes</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        background: #f4f4f4;
        padding: 20px;
    }

    .back-btn {
        display: inline-block;
        margin-bottom: 20px;
        background-color: #2196F3;
        color: white;
        padding: 10px 20px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: bold;
    }

    h2 {
        text-align: center;
        margin-bottom: 30px;
    }

    .note-container {
        max-width: 1200px;
        margin: auto;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        padding: 20px;
    }

    .note {
        background: white;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .note h3 {
        margin-top: 0;
    }

    .note .meta {
        color: #888;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .no-notes {
        text-align: center;
        font-style: italic;
        color: #666;
    }
    </style>
</head>

<body>
    <a href="javascript:history.back()" class="back-btn">← Back</a>
    <h2>Your Notes</h2>
    <div class="note-container">
        <?php if ($result->num_rows > 0): ?>
        <?php while ($note = $result->fetch_assoc()): ?>
        <div class="note">
            <h3><?= htmlspecialchars($note['title']) ?></h3>
            <div class="meta"><?= htmlspecialchars($note['subject_name']) ?> |
                <?= htmlspecialchars($note['created_at']) ?>
            </div>
            <p><?= nl2br(htmlspecialchars($note['content'])) ?></p>
        </div>
        <?php endwhile; ?>
        <?php else: ?>
        <div class="no-notes">You haven’t created any notes yet.</div>
        <?php endif; ?>
    </div>
</body>

</html>