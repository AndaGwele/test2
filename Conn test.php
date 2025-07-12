<?php
$servername = "sql109.infinityfree.com";
$username = "if0_39431375"; // Default XAMPP username
$password = "AR18Hx0rRM2"; // Default XAMPP password (empty)
$database = "if0_39431375_bubble_academy"; // Replace with your DB name
//auath plugin :UFg9XNxhU2MVbOFv

//BubbleAcademy_1
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>