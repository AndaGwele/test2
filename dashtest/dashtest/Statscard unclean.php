<?php
include("../Conn test.php");



if (!isset($_SESSION['id'])) { //check if logged in
    // Redirect to login page
    header("Location:../SignUPlogIN.html");
    exit(); // Stop further execution
}
$user_id = $_SESSION['id'];

//Query to get Faculty

$stmt1 = $conn->prepare("SELECT Faculty as 'Faculty' FROM users WHERE user_id = ?");
if ($stmt1) {
    // Bind parameters (assuming `id` is an integer)
    $stmt1->bind_param("i", $user_id);

    // Execute the statement
    $stmt1->execute();

    // Get the result
    $result1 = $stmt1->get_result();
    if ($result1->num_rows > 0) {

        $row = $result1->fetch_assoc();

        if ($row["Faculty"] == "Science") {
            $stmt = $conn->prepare("SELECT * FROM subjects WHERE user_id = ?");
            if ($stmt) {
                // Bind parameters (assuming `id` is an integer)
                $stmt->bind_param("i", $user_id);

                // Execute the statement
                $stmt->execute();

                // Get the result
                $result = $stmt->get_result();



                // Fetch data
                //while ($row = $result->fetch_assoc()) {
                // $name = $row["name"];
                //}
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Define specific file paths for each entry
                        $paths = [
                            "Mathematics" => "Science/Maths/Learning.php",
                            "Physical Sciences" => "Science/Physics/Physical_Sciences.php",
                            "Agricultural Sciences" => "Science/Agricultural Sciences/Learning.php",
                            "Life Sciences" => "Science/Life Sciences/Learning.php"

                        ];

                        // Get the name and assign a default path if not in the list
                        $name = $row['name'];
                        $filePath = isset($paths[$name]) ? $paths[$name] : "default_page.php";

                        echo "<a href='$filePath' style='text-decoration: none; color: inherit;'>";
                        echo "<div class='card'>";
                        echo "<img src='../images/Maths.jpg' alt='math image' style='height:200px; width:100%;'>";
                        echo "<h3 style='text-align:center;'>" . htmlspecialchars($name) . "</h3>";
                        echo "$name";
                        echo "</div>";
                        echo "</a>";
                    }
                } else {
                    echo "<div class='data-box'>No records found</div>";
                }

                // Close the statement
                $stmt->close();
            } else {
                echo "Error in preparing statement: " . $conn->error;
            }

        } else if ($row["Faculty"] == "Commerce") {
            $stmt = $conn->prepare("SELECT * FROM subjects WHERE user_id = ?");
            if ($stmt) {
                // Bind parameters (assuming `id` is an integer)
                $stmt->bind_param("i", $user_id);

                // Execute the statement
                $stmt->execute();

                // Get the result
                $result = $stmt->get_result();



                // Fetch data
                //while ($row = $result->fetch_assoc()) {
                // $name = $row["name"];
                //}
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Define specific file paths for each entry
                        $paths = [
                            "Business Studies" => "Commerce/BusinessStudies/Learning.php",
                            "Economics" => "Commerce/Economics/Learning.php",
                            "Accounting" => "Commerce/Accounting/Learning.php",
                            "Mathematical Literacy" => "Commerce/Mathematical Literacy/Learning.php"

                        ];

                        // Get the name and assign a default path if not in the list
                        $name = trim($row['name']);

                        $filePath = isset($paths[$name]) ? $paths[$name] : "default_page.php";

                        echo "<a href='$filePath' style='text-decoration: none; color: inherit;'>";

                        echo "<div class='card'>";
                        echo "<img src='../images/Maths.jpg' alt='math image' style='height:200px; width:100%;'>";
                        echo "<h3 style='text-align:center;'>" . htmlspecialchars($name) . "</h3>";
                        echo "Testing";
                        echo "</div>";
                        echo "</a>";
                    }
                } else {
                    echo "<div class='data-box'>No records found</div>";
                }

                // Close the statement
                $stmt->close();
            } else {
                echo "Error in preparing statement: " . $conn->error;
            }
        }

    } else {
        echo "<div class='data-box'>No records found</div>";
    }
} else {
    echo "Error in preparing statement: " . $conn1->error;
}
// Prepare a SELECT query for subjects


?>


<!--div class="card">
    <!--div class="card-icon">
        <i class="fas fa-receipt"></i>
    </div>
    <div class="card-content">
        <img src="../images/Maths.jpg" alt="" style=" height:200px; width:200px;">
        <h3>TOTAL SALES</h3>
    </div>
</div>

<div class="card">
    <div class="card-icon">
        <i class="fas fa-building"></i>
    </div>
    <div class="card-content">
        <h3>UNITS SOLD</h3>
        <p><?//php echo $dashboardData['unitsSold']; ?></p>
    </div>
</div>

<div class="card">
    <div class="card-icon">
        <i class="fas fa-tag"></i>
    </div>
    <div class="card-content">
        <h3>AVG PRICE PER SQ. FT</h3>
        <p><?//php echo $dashboardData['avgPricePerSqFt']; ?></p>
    </div>
</div-->