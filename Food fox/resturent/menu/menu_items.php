<?php
require_once 'connect.php'; // assuming this file defines the $conn variable
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
$conn = new mysqli($servername, $username, $password, $dbname);
$username = $_SESSION['username'];
$table_name = "menu_" . strtolower(str_replace(" ", "_", $username));

// Retrieve menu items
 // replace with your connection details
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare('SELECT * FROM ' . $table_name);
if (!$stmt) {
    echo "Prepare failed: " . $conn->error;
    exit;
}

$stmt->execute();
$menu_items = $stmt->get_result();

$menu_items_array = array();
while ($row = $menu_items->fetch_assoc()) {
    $menu_items_array[] = $row;
}

$stmt->close();
$conn->close();
?>