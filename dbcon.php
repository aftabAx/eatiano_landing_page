<?php
$servername = "localhost"; // Change this to your MySQL server's hostname or IP address
$username = "root"; // Replace with your MySQL username
$password = "Achievex@2023"; // Replace with your MySQL password
$database = "eatiano"; // Replace with your MySQL database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>