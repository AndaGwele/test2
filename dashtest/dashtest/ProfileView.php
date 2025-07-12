<?php
session_start();
include('../Conn test.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {
    $user_id = $_SESSION['id'];
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Validation
    $errors = [];

    // Validate name
    if (empty($name) || strlen($name) < 2) {
        $errors[] = "Name must be at least 2 characters long";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
        $errors[] = "Name can only contain letters and spaces";
    }

    // Validate email
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address";
    } else {
        // Check if email already exists for another user
        $email_check = "SELECT user_id FROM users WHERE email = ? AND user_id != ?";
        $stmt = $conn->prepare($email_check);
        $stmt->bind_param("si", $email, $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $errors[] = "Email address is already in use";
        }
        $stmt->close();
    }

    // Validate password (if provided)
    if (!empty($password) && strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters long";
    }

    if (empty($errors)) {
        try {
            // Update user information
            if (!empty($password)) {
                // Update with new password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $update_query = "UPDATE users SET Name = ?, email = ?, password = ? WHERE user_id = ?";
                $stmt = $conn->prepare($update_query);
                $stmt->bind_param("sssi", $name, $email, $hashed_password, $user_id);
            } else {
                // Update without changing password
                $update_query = "UPDATE users SET Name = ?, email = ? WHERE user_id = ?";
                $stmt = $conn->prepare($update_query);
                $stmt->bind_param("ssi", $name, $email, $user_id);
            }

            if ($stmt->execute()) {
                $_SESSION['message'] = "Profile updated successfully!";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Error updating profile. Please try again.";
                $_SESSION['message_type'] = "error";
            }
            $stmt->close();

        } catch (Exception $e) {
            $_SESSION['message'] = "Database error occurred. Please try again.";
            $_SESSION['message_type'] = "error";
        }
    } else {
        $_SESSION['message'] = implode(", ", $errors);
        $_SESSION['message_type'] = "error";
    }

    // Redirect back to profile page
    header("Location: profile.php");
    exit();
} else {
    // If accessed directly, redirect to profile
    header("Location: profile.php");
    exit();
}
?>