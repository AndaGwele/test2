<?php
require 'Conn test.php'; // Ensure database connection is included

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data & trim whitespace
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password']; // Do not trim passwords
    $grade = trim($_POST['grade']);
    $faculty = trim($_POST['faculty']);
    $subjects = trim($_POST['subjects']);

    // Hash password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO users (Name, Grade, Faculty, email, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $grade, $faculty, $email, $hashedPassword);
    $stmt->execute();

    //query to get last id
    $result = $conn->query("SELECT LAST_INSERT_ID()");
    $row = $result->fetch_array();
    $last_id = $row[0];

    // Split the string into an array
    $subjectsArray = explode(',', $subjects);

    // Prepare SQL statement
    foreach ($subjectsArray as $subject) {
        $subject = trim($subject);  // Remove any leading or trailing spaces
        echo "Processing subject: $subject <br>";  // Debugging line

        // Prepare the SQL statement
        $stmt2 = $conn->prepare("INSERT INTO subjects (Name,user_id) VALUES (?,?)");
        $stmt2->bind_param("si", $subject, $last_id);  // 
        echo "$subject";
        // Execute the query
        if ($stmt2->execute()) {
            echo "$subjects <br>";
            echo "$subjectsArray[1] <br>";
            echo "Subject '$subject' inserted successfully.<br>";


        } else {
            echo "Error inserting subject '$subject': " . $stmt->error . "<br>";
        }
    }
    header("Location: SignUPLogin.html");
    exit();


    // Close statement and connection
    $stmt->close();
    $stmt2->close();
    $conn->close();
}
?>