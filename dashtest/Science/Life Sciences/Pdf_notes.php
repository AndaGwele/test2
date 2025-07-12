<?php
session_start();
include("../../../Conn test.php");

if (!isset($_SESSION['id'])) {
    header("Location:../../../SignUPlogIN.html");
    exit();
}
$user_id = $_SESSION['id'];

// Subject selection from GET (e.g. ?subject=Economics)
$subject = $_GET['subject'] ?? 'Economics';

/* Fetch user name (optional) */
$stmt = $conn->prepare("SELECT Name FROM users WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$nameResult = $stmt->get_result();

/* Save note via AJAX */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = htmlspecialchars($_POST['title'] ?? '');
    $content = htmlspecialchars($_POST['content'] ?? '');

    if ($title && $content) {
        $stmt = $conn->prepare(
            "INSERT INTO notes (user_id, title, content, subject_name) 
             VALUES (?, ?, ?, ?)"
        );
        $stmt->bind_param("isss", $user_id, $title, $content, $subject);

        if ($stmt->execute()) {
            echo json_encode([
                "status" => "success",
                "message" => "Note saved!",
                "note" => [
                    "title" => $title,
                    "content" => $content,
                    "created_at" => date("Y-m-d H:i:s")
                ]
            ]);
        } else {
            echo json_encode(["status" => "error", "message" => "Database error."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Title and content required."]);
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PDF + Notes - <?php echo htmlspecialchars($subject); ?></title>
    <style>
    * {
        box-sizing: border-box
    }

    body {
        margin: 0;
        font-family: Arial, sans-serif
    }

    .reader-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        background: #fff;
        transition: width .3s;
        width: 100%
    }

    .reader-wrapper iframe {
        width: 100%;
        height: 100%;
        border: none
    }

    #note-float-btn,
    #back-btn {
        position: fixed;
        z-index: 1000;
        padding: 12px 20px;
        border: none;
        border-radius: 50px;
        font-weight: bold;
        color: #fff;
        cursor: pointer
    }

    #note-float-btn {
        bottom: 20px;
        right: 20px;
        background: #4caf50
    }

    #back-btn {
        top: 20px;
        left: 20px;
        background: #2196f3
    }

    #note-panel {
        position: fixed;
        top: 0;
        right: 0;
        height: 100%;
        width: 35%;
        background: #fff;
        box-shadow: -2px 0 10px rgba(0, 0, 0, .2);
        padding: 20px;
        display: none;
        flex-direction: column;
        z-index: 999
    }

    #note-panel input,
    #note-panel textarea,
    #note-panel button {
        width: 100%;
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 6px;
        border: 1px solid #ccc
    }

    #note-panel button {
        background: #4caf50;
        color: #fff;
        border: none;
        font-weight: bold;
        cursor: pointer
    }

    #note-panel button:hover {
        background: #45a049
    }

    .close-btn {
        background: #f44336
    }

    #note-message {
        font-size: 14px;
        color: green
    }

    #view-notes-btn {
        position: fixed;
        bottom: 80px;
        right: 20px;
        z-index: 1000;
        padding: 12px 20px;
        border: none;
        border-radius: 50px;
        background: #ff9800;
        color: #fff;
        font-weight: bold;
        cursor: pointer
    }

    #notes-list {
        position: fixed;
        bottom: 0;
        right: 20px;
        width: 35%;
        max-height: 50%;
        overflow-y: auto;
        background: #fff;
        border: 1px solid #ccc;
        box-shadow: 0 -2px 10px rgba(0, 0, 0, .2);
        display: none;
        z-index: 1000;
        padding: 15px
    }

    .note-card {
        margin-bottom: 15px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 6px
    }

    .note-card strong {
        display: block
    }

    .note-card small {
        color: #666
    }

    /* Responsive Adjustments */
    @media screen and (max-width: 768px) {

        #note-panel,
        #notes-list {
            width: 100% !important;
            bottom: 0;
            right: 0;
        }

        .reader-wrapper {
            width: 100% !important;
        }
    }
    </style>
</head>

<body>
    <div class="reader-wrapper" id="pdf-viewer">
        <iframe src="This is a textbook.pdf"></iframe><!-- Replace with your PDF file path -->
    </div>

    <button id="back-btn" onclick="window.location.href='Learning.php'">Go Back</button>
    <button id="note-float-btn" onclick="toggleNotePanel()">📝 Take Notes</button>
    <button id="view-notes-btn" onclick="toggleNotesList()">📄 View Notes</button>

    <div id="note-panel">
        <button class="close-btn" onclick="toggleNotePanel()">Close ✖</button>
        <h3>Take a Note</h3>
        <input type="text" id="note-title" placeholder="Title">
        <textarea id="note-content" placeholder="Write your note here..."></textarea>
        <button onclick="saveNote()">Save</button>
        <div id="note-message"></div>
    </div>

    <div id="notes-list">
        <h4>Your Saved Notes (<?php echo htmlspecialchars($subject); ?>)</h4>
        <?php
        $load = $conn->prepare(
            "SELECT title, content, created_at 
             FROM notes 
             WHERE user_id = ? AND subject_name = ? 
             ORDER BY created_at DESC"
        );
        $load->bind_param("is", $user_id, $subject);
        $load->execute();
        $res = $load->get_result();

        if ($res->num_rows) {
            while ($n = $res->fetch_assoc()) {
                echo "<div class='note-card'>";
                echo "<strong>" . htmlspecialchars($n['title']) . "</strong>";
                echo "<small>" . htmlspecialchars($n['created_at']) . "</small><br><br>";
                echo "<div style='white-space:pre-wrap'>" . nl2br(htmlspecialchars($n['content'])) . "</div>";
                echo "</div>";
            }
        } else {
            echo "<p id='no-notes-msg'>No notes yet.</p>";
        }
        ?>
        <button class="close-btn" onclick="toggleNotesList()" style="padding: 12px 20px; border: none; border-radius: 50px;
            background: #f44336; color: white; font-weight: bold;">Close ✖</button>
    </div>

    <script>
    let notesOpen = false;

    function toggleNotePanel() {
        const panel = document.getElementById('note-panel');
        const viewer = document.getElementById('pdf-viewer');
        if (!notesOpen) {
            panel.style.display = 'flex';
            viewer.style.width = window.innerWidth < 768 ? '100%' : '65%';
        } else {
            panel.style.display = 'none';
            viewer.style.width = '100%';
        }
        notesOpen = !notesOpen;
    }

    function toggleNotesList() {
        const list = document.getElementById('notes-list');
        list.style.display = (list.style.display === 'none' || !list.style.display) ? 'block' : 'none';
    }

    function saveNote() {
        const title = document.getElementById('note-title').value.trim();
        const content = document.getElementById('note-content').value.trim();
        if (!title || !content) {
            document.getElementById('note-message').textContent = 'Title and content required.';
            return;
        }

        fetch(window.location.href, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `title=${encodeURIComponent(title)}&content=${encodeURIComponent(content)}`
            })
            .then(r => r.json())
            .then(resp => {
                document.getElementById('note-message').textContent = resp.message;
                if (resp.status === 'success') {
                    document.getElementById('note-title').value = '';
                    document.getElementById('note-content').value = '';
                    const list = document.getElementById('notes-list');
                    if (list.style.display === 'none' || !list.style.display) {
                        list.style.display = 'block';
                    }
                    const noMsg = document.getElementById('no-notes-msg');
                    if (noMsg) noMsg.remove();
                    const n = resp.note;
                    const card = document.createElement('div');
                    card.className = 'note-card';
                    card.innerHTML =
                        `<strong>${n.title}</strong><small>${n.created_at}</small><br><br>` +
                        `<div style='white-space:pre-wrap'>${n.content.replace(/\n/g, '<br>')}</div>`;
                    list.insertBefore(card, list.children[1]);
                }
            })
            .catch(() => document.getElementById('note-message').textContent = 'Network error.');
    }
    </script>
</body>

</html>