<?php
// Database connection
$pdo = new PDO("mysql:host=localhost;dbname=bubble_academy", "root", "");

// Handle AJAX POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = htmlspecialchars($_POST['title'] ?? '');
    $content = htmlspecialchars($_POST['content'] ?? '');
    $user_id = 1; // Replace with dynamic session user ID

    if ($title && $content) {
        $stmt = $pdo->prepare("INSERT INTO notes (user_id, title, content) VALUES (?, ?, ?)");
        $stmt->execute([$user_id, $title, $content]);
        echo "Note saved!";
    } else {
        echo "Title and content required.";
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PDF + Notes</title>
    <style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    .reader-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        width: 65%;
        height: 100%;
        background: #fff;
    }

    .reader-wrapper iframe {
        width: 100%;
        height: 100%;
        border: none;
    }

    #note-float-btn {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background: #4CAF50;
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 50px;
        cursor: pointer;
        font-weight: bold;
        z-index: 1000;
    }

    #note-panel {
        position: fixed;
        top: 0;
        right: 0;
        height: 100%;
        width: 35%;
        background: white;
        box-shadow: -2px 0 10px rgba(0, 0, 0, 0.2);
        padding: 20px;
        display: none;
        flex-direction: column;
        z-index: 999;
    }

    #note-panel input,
    #note-panel textarea,
    #note-panel button {
        width: 100%;
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 6px;
        border: 1px solid #ccc;
    }

    #note-panel button {
        background-color: #4CAF50;
        color: white;
        border: none;
        font-weight: bold;
        cursor: pointer;
    }

    #note-panel button:hover {
        background-color: #45a049;
    }

    #note-panel .close-btn {
        background: #f44336;
    }

    #note-message {
        font-size: 14px;
        color: green;
    }

    #back-btn {
        position: fixed;
        top: 20px;
        left: 20px;
        background: #2196F3;
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 50px;
        cursor: pointer;
        font-weight: bold;
        z-index: 1000;
    }
    </style>
</head>

<body>

    <!-- PDF Viewer Section -->
    <div class="reader-wrapper">
        <iframe src="Vitae2.pdf"></iframe> <!-- Replace 'sample.pdf' with your actual PDF path -->
    </div>

    <!-- 📝 Floating Button to Open Note Panel -->
    <button id="note-float-btn" onclick="toggleNotePanel()">📝 Notes</button>
    <button id="back-btn" onclick="back()">Back</button>

    <!-- 📋 Slide-out Notes Panel -->
    <div id="note-panel">
        <button class="close-btn" onclick="toggleNotePanel()">Close ✖</button>
        <h3>Take a Note</h3>
        <input type="text" id="note-title" placeholder="Title">
        <textarea id="note-content" placeholder="Write your note here..."></textarea>
        <button onclick="saveNote()">Save</button>
        <div id="note-message"></div>
    </div>

    <script>
    function toggleNotePanel() {
        const panel = document.getElementById('note-panel');
        panel.style.display = (panel.style.display === 'flex') ? 'none' : 'flex';
    }

    function saveNote() {
        const title = document.getElementById("note-title").value;
        const content = document.getElementById("note-content").value;

        fetch('', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `title=${encodeURIComponent(title)}&content=${encodeURIComponent(content)}`
            })
            .then(res => res.text())
            .then(response => {
                document.getElementById("note-message").textContent = response;
                if (response.includes("Note saved")) {
                    document.getElementById("note-title").value = '';
                    document.getElementById("note-content").value = '';
                }
            });
    }

    function back() {
        window.history.back();
    }
    </script>
</body>

</html>