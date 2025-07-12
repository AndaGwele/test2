<?php

session_start();
include 'Conn test.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['email']) || !isset($_POST['password'])) {
        die("Missing required fields.");
    }
    $username = $_POST['email'];
    $password = $_POST['password'];


    // Prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        // Verify password (assuming it's hashed)
        if (password_verify($password, $user['password'])) {
            $_SESSION['logged_in'] = True;
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $user["user_id"];
            header("Location:dashtest/index.php"); // Redirect to dashboard
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "User not found!";
        echo "$username";
    }

    $stmt->close();
    $conn->close();
}
?>