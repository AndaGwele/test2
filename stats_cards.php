<?php
include("../Conn test.php");

if (!isset($_SESSION['id'])) {
    // Redirect to login page if user is not logged in
    header("Location:../SignUPlogIN.html");
    exit();
}

$user_id = $_SESSION['id'];

// Query to get Faculty of logged-in user
$stmt1 = $conn->prepare("SELECT Faculty FROM users WHERE user_id = ?");
if ($stmt1) {
    $stmt1->bind_param("i", $user_id);
    $stmt1->execute();
    $result1 = $stmt1->get_result();

    if ($result1->num_rows > 0) {
        $row = $result1->fetch_assoc();

        // Check if Faculty is Science
        if ($row["Faculty"] == "Science") {
            $stmt = $conn->prepare("SELECT * FROM subjects WHERE user_id = ?");
            if ($stmt) {
                $stmt->bind_param("i", $user_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Define paths for Science subjects
                        $paths = [
                            "Mathematics" => "Science/Maths/Learning.php",
                            "Physical Sciences" => "Science/Physics/Physical_Sciences.php",
                            "Agricultural Sciences" => "Science/Agricultural Sciences/Learning.php",
                            "Life Sciences" => "Science/Life Sciences/Learning.php"
                        ];

                        $name = trim($row['name']);
                        $filePath = isset($paths[$name]) ? $paths[$name] : "default_page.php";

                        $image = "";
                        $alt = "";

                        switch ($name) {
                            case "Mathematics":
                                $image = "../images/Maths.jpg";
                                $alt = "Math image";
                                break;
                            case "Physical Sciences":
                                $image = "../images/Physics.jpg";
                                $alt = "Physics";
                                break;
                            case "Agricultural Sciences":
                                $image = "../images/Agricultural.jpg";
                                $alt = "Agricultural Sciences";
                                break;
                            case "Life Sciences":
                                $image = "../images/Life.jpg";
                                $alt = "Life Sciences";
                                break;
                            default:
                                $image = "../images/default.jpg";
                                $alt = "default";
                        }

                        echo "<a href='$filePath' style='text-decoration: none; color: inherit;'>";
                        echo "<div class='card'>";
                        echo "<img src='$image' alt='$alt' style='height:200px; width:250px;'>";
                        echo "<h3 style='text-align:center; '>" . htmlspecialchars($name) . "</h3>";
                        echo "</div>";
                        echo "</a>";

                    }
                } else {
                    echo "<div class='data-box'>No records found</div>";
                }
                $stmt->close();
            } else {
                echo "Error in preparing statement: " . $conn->error;
            }

            // Check if Faculty is Commerce
        } else if ($row["Faculty"] == "Commerce") {
            $stmt = $conn->prepare("SELECT * FROM subjects WHERE user_id = ?");
            if ($stmt) {
                $stmt->bind_param("i", $user_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Define paths for Commerce subjects
                        $paths = [
                            "Business Studies" => "Commerce/BusinessStudies/Learning.php",
                            "Economics" => "Commerce/Economics/Learning.php",
                            "Accounting" => "Commerce/Accounting/Learning.php",
                            "Mathematical Literacy" => "Commerce/Mathematical Literacy/Learning.php"
                        ];

                        $name = trim($row['name']);
                        $filePath = isset($paths[$name]) ? $paths[$name] : "default_page.php";

                        $image = "";
                        $alt = "";

                        switch ($name) {
                            case "Business Studies":
                                $image = "../images/Business Studies.jpg";
                                $alt = "Business Studies";
                                break;
                            case "Economics":
                                $image = "../images/Economics.jpg";
                                $alt = "Economics";
                                break;
                            case "Accounting":
                                $image = "../images/Accounting.jpg";
                                $alt = "Accounting";
                                break;
                            case "Mathematical Literacy":
                                $image = "../images/Maths Lit.jpg";
                                $alt = "MATHS LIT";
                                break;
                            default:
                                $image = "../images/class1.jpg";
                                $alt = "default";
                        }

                        echo "<a href='$filePath' style='text-decoration: none; color: inherit;'>";
                        echo "<div class='card'>";
                        echo "<img src='$image' alt='$alt' style='height:200px; width:250px;'>";
                        echo "<h3 style='text-align:center; '>" . htmlspecialchars($name) . "</h3>";
                        echo "</div>";
                        echo "</a>";


                    }
                } else {
                    echo "<div class='data-box'>No records found</div>";
                }
                $stmt->close();
            } else {
                echo "Error in preparing statement: " . $conn->error;
            }
        }
    } else {
        echo "<div class='data-box'>No records found</div>";
    }
    $stmt1->close();
} else {
    echo "Error in preparing statement: " . $conn->error;
}
?>