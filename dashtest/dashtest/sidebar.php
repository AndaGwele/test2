<?php
include("../Conn test.php");



$user_id = $_SESSION['id'];
$name = '';

$stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
if ($stmt) {
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $name = $row["Name"];
    }

    $stmt->close();
} else {
    echo "Error in preparing statement: " . $conn->error;
}
?>

<!-- Load Font Awesome (Icons) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

<style>
.sidebar {
    background-color: #1f2937;
    width: 250px;
    height: 100vh;
    color: white;
    transition: transform 0.3s ease;
}

.sidebar.collapsed {
    transform: translateX(-250px);
    position: fixed;
    z-index: 1000;
}

.sidebar-header {
    padding: 20px;
    background-color: #111827;
    display: flex;
    align-items: center;
    gap: 10px;
}

.logo {
    background-color: #4ade80;
    border-radius: 50%;
    width: 40px;
    height: 40px;

    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 20px;
}

.sidebar-nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sidebar-nav ul li {
    padding: 15px 20px;
    cursor: pointer;
}

.sidebar-nav ul li.active,
.sidebar-nav ul li:hover {
    background-color: #374151;
}

.sidebar-nav ul li i {
    margin-right: 10px;
}

.sidebar-footer {
    padding: 20px;
    background-color: #111827;
    position: absolute;
    bottom: 0;
    width: 100%;
}

.sidebar-toggle {
    display: none;
    background: none;
    border: none;
    color: white;
    font-size: 24px;
    position: absolute;
    top: 15px;
    left: 15px;
    z-index: 1100;
    background-color: #111827;
    padding: 10px;
    border-radius: 6px;
}

@media screen and (max-width: 768px) {
    .sidebar {
        position: fixed;
        left: 0;
        top: 0;
        height: 100%;
        transform: translateX(-250px);
        transition: transform 0.3s ease;
        z-index: 1000;
    }

    .sidebar.show {
        transform: translateX(0);
    }

    .sidebar-toggle {
        display: block;
    }

    .sidebar-nav {
        display: block;
    }
}
</style>

<!-- Sidebar Toggle Button (Hamburger Icon) -->
<button class="sidebar-toggle" onclick="toggleSidebar()">
    <i class="fas fa-bars"></i>
</button>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="logo"><?php echo htmlspecialchars($name[0]); ?></div>
        <h2><?php echo htmlspecialchars($name); ?></h2>
    </div>

    <nav class="sidebar-nav">
        <ul>
            <li class="<?php echo $activePage == 'dashboard' ? 'active' : ''; ?>">
                <a href="?page=dashboard">
                    <i class="fas fa-home"></i> <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="Funding.html">
                    <i class="fas fa-hand-holding-usd"></i> <span>Looking for funding?</span>
                </a>
            </li>
            <li>
                <a href="Artificial.html">
                    <i class="fas fa-solid fa-hexagon-nodes"></i> <span>ASK AI</span>
                </a>
            </li>
            <li>
                <a href="View_Notes.php">
                    <i class="fas fa-bell"></i> <span>Your Notes</span>
                </a>
            </li>
            <li>
                <a href="StudyPlan.php">
                    <i class="fas fa-bell"></i> <span>Study Plans</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="sidebar-footer">
        <a href="ProfileView.php">
            <i class="fas fa-right-from-bracket"></i> <span>LogOut</span>
        </a>
    </div>
</div>

<script>
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('show');
}
</script>