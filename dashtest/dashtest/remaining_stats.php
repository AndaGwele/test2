<?php
include("../Conn test.php");



if (!isset($_SESSION['id'])) { //check if logged in
    // Redirect to login page
    header("Location:../SignUPlogIN.html");
    exit(); // Stop further execution
}
$user_id = $_SESSION['id'];
// Prepare a SELECT query
$stmt = $conn->prepare("SELECT Count(Subject_id) as 'Num' FROM subjects WHERE user_id = ?");
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
            $number_Subjects = $row["Num"];
        }
    } else {
        echo "<div class='data-box'>No records found</div>";
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Error in preparing statement: " . $conn->error;
}


?>

<div class="remaining-stats-card">
    <div class="stat-item">
        <h3>Enrolled Subjects</h3>
        <p><?php echo $number_Subjects; ?></p>
    </div>

    <div class="stat-item">
        <h3>Chapters Completed </h3>
        <p><?php echo $dashboardData['totalAmount']; ?></p>
    </div>

    <div class="stat-item">
        <h3>AVG PRICE PER SQ. FT</h3>
        <p><?php echo $dashboardData['avgPricePerSqFtSmall']; ?></p>
    </div>
</div>