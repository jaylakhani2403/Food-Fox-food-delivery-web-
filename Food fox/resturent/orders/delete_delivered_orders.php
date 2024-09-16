<?php
// Start the session
session_start();

// Check if the username is set in the session
if (!isset($_SESSION['username'])) {
    die("Username not set in session");
}

// Get the username from the session
$username = $_SESSION['username'];

// Connect to the database
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "restaurant_db";

$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the table name
$table_name = "orders_" . strtolower(str_replace(" ", "_", $username));

// Delete delivered orders
$sql = "DELETE FROM $table_name WHERE status = 'Delivered'";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
} else {
    echo "Delivered orders deleted successfully";
}

// Close the database connection
$conn->close();
?>