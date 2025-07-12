<?php
session_start();
include("../../session_check.php");
include("../../../Conn test.php");
if (!isset($_SESSION['id'])) { //check if logged in
    // Redirect to login page
    header("Location:../../../SignUPlogIN.html");
    exit(); // Stop further execution
}
$user_id = $_SESSION['id'];
// Prepare the SELECT statement
$stmt = $conn->prepare("SELECT Name FROM users WHERE user_id = ?");


$stmt->bind_param("i", $user_id); // "i" indicates the parameter is an integer

// Execute the statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Fetch the data
while ($row = $result->fetch_assoc()) {
    $name = $row['Name'];

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Physics Dashboard</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    :root {
        --primary-color: #1d4ed8;
        --primary-hover: #1e40af;
        --sidebar-bg: #1e1e2d;
        --main-bg: #f3f4f6;
        --card-bg: #ffffff;
        --text-primary: #111827;
        --text-secondary: #4b5563;
        --text-light: #9ca3af;
        --border-color: #e5e7eb;
        --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --transition: all 0.3s ease;
    }

    body {
        background-color: var(--main-bg);
        color: var(--text-primary);
        display: flex;
        min-height: 100vh;
        transition: var(--transition);
    }

    .sidebar {
        width: 280px;
        background-color: var(--sidebar-bg);
        transition: var(--transition);
        overflow-y: auto;
        box-shadow: var(--shadow-md);
        position: fixed;
        height: 100vh;
        z-index: 100;
    }

    .sidebar-header {
        padding: 24px 20px;
        text-align: center;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .sidebar-header h2 {
        color: #ffffff;
        font-size: 1.25rem;
        font-weight: 600;
        letter-spacing: 0.025em;
    }

    .sidebar-menu {
        padding: 16px 0;
    }

    .menu-item {
        padding: 14px 20px;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-left: 4px solid transparent;
        color: rgba(255, 255, 255, 0.7);
        margin: 4px 0;
    }

    .menu-item:hover {
        background-color: rgba(255, 255, 255, 0.1);
        border-left-color: var(--primary-color);
        color: #ffffff;
    }

    .menu-item.active {
        background-color: rgba(255, 255, 255, 0.1);
        border-left-color: var(--primary-color);
        color: #ffffff;
    }

    .menu-item-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
        background-color: rgba(0, 0, 0, 0.2);
        margin: 0 8px;
        border-radius: 8px;
    }

    .menu-item-content.show {
        max-height: 200px;
        padding: 12px 16px;
    }

    .menu-item-text {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .menu-item-text a {
        color: inherit;
        text-decoration: none;
        transition: var(--transition);
    }

    .menu-item-text a:hover {
        color: #ffffff;
    }

    .menu-item-icon {
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: inherit;
    }

    .arrow {
        border: solid rgba(255, 255, 255, 0.7);
        border-width: 0 2px 2px 0;
        display: inline-block;
        padding: 3px;
        transform: rotate(45deg);
        transition: transform 0.3s ease;
    }

    .arrow.up {
        transform: rotate(-135deg);
    }

    .main-content {
        flex: 1;
        padding: 24px;
        margin-left: 280px;
        transition: var(--transition);
        width: calc(100% - 280px);
    }

    .dashboard-header {
        margin-bottom: 24px;
        padding-bottom: 16px;
        border-bottom: 1px solid var(--border-color);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .dashboard-content {
        background-color: var(--card-bg);
        padding: 24px;
        border-radius: 12px;
        box-shadow: var(--shadow-sm);
        min-height: 500px;
    }

    .dashboard-content h1 {
        color: var(--primary-color);
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 16px;
        padding-bottom: 12px;
        border-bottom: 2px solid var(--border-color);
    }

    .dashboard-content h1.text-center {
        text-align: center;
    }

    .dashboard-content p {
        color: var(--text-secondary);
        line-height: 1.6;
        margin-bottom: 16px;
    }

    .dashboard-content ul {
        list-style: none;
        margin: 24px 0;
    }

    .dashboard-content li {
        padding: 16px;
        background-color: #f9fafb;
        border-radius: 8px;
        margin-bottom: 12px;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
        border-left: 3px solid var(--primary-color);
    }

    .dashboard-content li:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    .dashboard-content strong {
        color: var(--text-primary);
    }

    .dashboard-content .font-semibold {
        font-weight: 600;
    }

    .dashboard-content .text-blue-700 {
        color: var(--primary-color);
    }

    .toggle-sidebar {
        display: none;
        background-color: var(--primary-color);
        color: white;
        border: none;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 200;
        cursor: pointer;
        box-shadow: var(--shadow-md);
        align-items: center;
        justify-content: center;
    }

    .action-button {
        padding: 12px 24px;
        font-size: 1rem;
        background-color: var(--primary-color);
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: var(--transition);
        font-weight: 500;
        box-shadow: var(--shadow-sm);
        margin-top: 16px;
    }

    .action-button:hover {
        background-color: var(--primary-hover);
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    /* Dynamic Chapter Sections */
    section[id] {
        background-color: var(--card-bg);
        padding: 24px;
        border-radius: 12px;
        box-shadow: var(--shadow-sm);
        margin-left: 280px;
        transition: var(--transition);
        width: calc(100% - 280px);
    }

    .back-button {
        display: inline-block;
        margin-bottom: 20px;
        margin-left: -30px;
        padding: 10px 20px;
        background-color: var(--primary-color);
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 500;
        transition: var(--transition);
        box-shadow: var(--shadow-sm);
    }

    .back-button:hover {
        background-color: var(--primary-hover);
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }


    @media (max-width: 1024px) {
        .sidebar {
            width: 240px;
        }

        .main-content,
        section[id] {
            margin-left: 240px;
            width: calc(100% - 240px);
        }
    }

    @media (max-width: 768px) {
        .sidebar {
            width: 0;
            transform: translateX(-100%);
        }

        .sidebar.expanded {
            width: 280px;
            transform: translateX(0);
        }

        .main-content,
        section[id] {
            margin-left: 0;
            width: 100%;
        }

        .toggle-sidebar {
            display: flex;
        }
    }
    </style>
</head>

<body>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h2><a href="javascript:history.back()" class="back-button">← Back</a>
                <?php echo "$name"; ?></h2>
        </div>
        <div class="sidebar-menu">
            <div class="menu-item" data-index="1">
                <div class="menu-item-text">
                    <div class="menu-item-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            viewBox="0 0 16 16">
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>
                    </div>
                    <span><a href="Textbook.php">Textbooks</a></span>
                </div>
                <i class="arrow"></i>
            </div>
            <div class="menu-item" data-index="2">
                <div class="menu-item-text">
                    <div class="menu-item-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            viewBox="0 0 16 16">
                            <path
                                d="M6.79 5.093a.5.5 0 0 1 .707-.093l4 3a.5.5 0 0 1 0 .8l-4 3A.5.5 0 0 1 6 11.5v-6a.5.5 0 0 1 .79-.407z" />
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4z" />
                        </svg>
                    </div>
                    <span><a href="Youtube.php">Video lessons</a></span>
                </div>
                <i class="arrow"></i>
            </div>

            <div class="menu-item" data-index="3">
                <div class="menu-item-text">
                    <div class="menu-item-icon">
                        <!-- Quiz SVG icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            viewBox="0 0 16 16">
                            <path
                                d="M10 1.5v1h3a.5.5 0 0 1 .5.5v11a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5v-11A.5.5 0 0 1 3 2.5h3v-1a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5zM4 4.5h8v1H4v-1zm0 2h8v1H4v-1zm0 2h5v1H4v-1z" />
                            <path fill-rule="evenodd"
                                d="M11.854 9.854a.5.5 0 0 0 0-.708l-1.646-1.646a.5.5 0 1 0-.708.708L10.293 9l-1.147 1.146a.5.5 0 0 0 .708.708l1.646-1.646z" />
                        </svg>
                    </div>
                    <span><a href="quiz/index.php">Quizzes</a></span>
                </div>
                <i class="arrow"></i>
            </div>

        </div>
    </div>

    <button class="toggle-sidebar" id="toggle-sidebar">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="3" y1="12" x2="21" y2="12"></line>
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <line x1="3" y1="18" x2="21" y2="18"></line>
        </svg>
    </button>

    <div class="main-content" id="dashboard-content">
        <div class="dashboard-header">
            <h1>Physics Dashboard</h1>
        </div>

        <div class="dashboard-content">
            <h1>📚 Learn Physics</h1>

            <h1 class="text-center">🔍 Introduction</h1>
            <p>
                Physics is the fundamental science that explores the laws governing the universe, from the tiniest
                particles to the vastness of space. It drives innovation in technology, energy, and medicine while
                helping us understand the nature of reality. Mastering physics means unlocking the secrets of
                motion, energy, and matter—equipping you with problem-solving skills that shape the future. 🚀
            </p>

            <p>
                Whether you're developing renewable energy, designing spacecraft, or studying quantum mechanics,
                physics is at the core. It's not just about equations—it's about discovering how the world works at its
                deepest level.
            </p>

            <h1 class="text-center">🌍 Fields Physics Can Open for You:</h1>

            <ul>
                <li>
                    🎓 <strong>Education & Research</strong> – Teach future scientists or pioneer breakthroughs in
                    labs!
                </li>
                <li>
                    💻 <strong>Engineering & Technology</strong> – Design cutting-edge gadgets, robotics, or
                    sustainable tech!
                </li>
                <li>
                    🌌 <strong>Astrophysics & Space Exploration</strong> – Study black holes or work with NASA to
                    reach Mars!
                </li>
                <li>
                    ⚛️ <strong>Quantum Computing & Nanotechnology</strong> – Revolutionize computing and materials
                    science!
                </li>
                <li>
                    🏥 <strong>Medical Physics & Biotech</strong> – Develop life-saving imaging tech or radiation
                    therapies!
                </li>
                <li>
                    🌍 <strong>Environmental Science & Renewable Energy</strong> – Tackle climate change with solar,
                    wind, or fusion power!
                </li>
            </ul>

            <p>
                Physics is the gateway to solving humanity's greatest challenges. Whether you're dreaming of
                unraveling cosmic mysteries, inventing sustainable energy solutions, or pushing the boundaries of
                technology,
                physics empowers you to make an impact.
                <span class="font-semibold text-blue-700">Keep exploring. Keep innovating. 🚀</span>
            </p>


        </div>
    </div>

    <!-- Dynamic Chapter Sections -->
    <section id="Arithmetic" style="display: none;">
        <?php include "Siyavula.pdf"; ?>
    </section>
    <section id="Functions" style="display: none;">
        <?php include "functions.php"; ?>
    </section>
    <section id="Trigonometry" style="display: none;">
        <p>Todo: Generate trig content again</p>
    </section>
    <section id="Calculus" style="display: none;">
        <?php include "calculus.php"; ?>
    </section>
    <section id="Analytical" style="display: none;">
        <?php include "Analytical Geometry.php"; ?>
    </section>
    <section id="Probability" style="display: none;">
        <?php include "probability.php"; ?>
    </section>

    <script>
    // Toggle menu items
    const menuItems = document.querySelectorAll('.menu-item');

    menuItems.forEach(item => {
        item.addEventListener('click', function() {
            const index = this.getAttribute('data-index');
            const content = document.getElementById(`content-${index}`);
            const arrow = this.querySelector('.arrow');

            if (content) {
                // Toggle content visibility
                content.classList.toggle('show');

                // Toggle arrow direction
                if (arrow) {
                    arrow.classList.toggle('up');
                }
            }

            // Toggle active state
            this.classList.toggle('active');
        });
    });

    // Handle responsive sidebar
    const toggleSidebarBtn = document.getElementById('toggle-sidebar');
    const sidebar = document.getElementById('sidebar');

    toggleSidebarBtn.addEventListener('click', function() {
        sidebar.classList.toggle('expanded');
    });

    function toggleDivs(showId, event) {
        if (event) event.preventDefault();
        let sections = ['dashboard-content', 'Arithmetic', 'Functions', 'Trigonometry', 'Calculus', 'Probability',
            'Analytical'
        ];
        sections.forEach(id => {
            const section = document.getElementById(id);
            if (section) section.style.display = 'none';
        });

        const toShow = document.getElementById(showId);
        if (toShow) toShow.style.display = 'block';

        // Scroll to top when switching sections
        window.scrollTo(0, 0);
    }
    </script>
</body>

</html>