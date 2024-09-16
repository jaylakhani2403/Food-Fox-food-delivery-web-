<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
$username = $_SESSION['username'];

// Connect to database
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "restaurant_db";

$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update the user data
if (isset($_POST['restaurant_name']) && isset($_POST['cityname'])) {
    $restaurant_name = $_POST['restaurant_name'];
    $city = $_POST['cityname'];
    $sql = "UPDATE users SET restaurant_name = '$restaurant_name', city = '$city' WHERE username = '$username'";
    if ($conn->query($sql) === TRUE) {
        header("Location: settings.php");
        exit;
    } else {
        echo "Error updating user data: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>