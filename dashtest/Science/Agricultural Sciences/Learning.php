<?php
session_start();
include("../../../Conn test.php");
include("../../session_check.php");

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
    <title>Modern Agricultural Sciences Dashboard</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    :root {
        --primary-color: #4ade80;
        --primary-hover: #22c55e;
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

    .dashboard-content .text-green-700 {
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

    @media (max-width: 1024px) {
        .sidebar {
            width: 240px;
        }

        .main-content {
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

        .main-content {
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
            <h2><?php echo "$name"; ?></h2>
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
                    <span><a href="Youtube lessons.php">Video lessons</a></span>
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
                    <span><a href="Quizzes/index.php">Quizzes</a></span>
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
            <h1>Agricultural Sciences Dashboard</h1>
        </div>

        <div class="dashboard-content">
            <h1>🌾 Learn Agricultural Sciences</h1>

            <h1 class="text-center">🔍 Introduction</h1>
            <p>
                Agricultural Sciences is the study of the science, technology, and business behind food production,
                sustainability, and land use. It connects biology, ecology, economics, and innovation to feed the world
                and protect natural resources. 🌍
            </p>

            <p>
                From farm to table, Agricultural Sciences help improve crop yields, manage livestock, conserve the
                environment, and ensure food security. It's about more than farming—it's about shaping the future of
                global food systems.
            </p>

            <h1 class="text-center">🌱 Fields Agricultural Sciences Can Open for You:</h1>

            <ul>
                <li>
                    👩‍🌾 <strong>Agronomy & Crop Science</strong> – Improve soil health and grow better crops!
                </li>
                <li>
                    🐄 <strong>Animal Science</strong> – Care for livestock and enhance animal production!
                </li>
                <li>
                    🌾 <strong>Agri-Business</strong> – Manage agricultural enterprises and markets!
                </li>
                <li>
                    🚜 <strong>Agricultural Engineering</strong> – Design modern farming tools and systems!
                </li>
                <li>
                    🧪 <strong>Soil & Environmental Science</strong> – Protect land and support sustainable farming!
                </li>
                <li>
                    🍎 <strong>Food Science & Technology</strong> – Ensure food quality, safety, and innovation!
                </li>
            </ul>

            <p>
                Agricultural Sciences is essential to the survival and progress of humanity. Whether you're growing
                food,
                improving sustainability, or running a farm-based business, your work has a direct impact on the world.
                <span class="font-semibold text-green-700">Keep cultivating knowledge. Grow the future. 🌾</span>
            </p>


        </div>
    </div>

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