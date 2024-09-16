<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
    $username = $_SESSION['username'];
}



// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$username = $_SESSION['username'];
$table_name = "orders_" . strtolower(str_replace(" ", "_", $username));

// Get the order ID and new status from the AJAX request
$order_id = $_POST['order_id'];
$status = $_POST['status'];

// Update the order status to "Delivered" temporarily
$sql = "UPDATE $table_name SET status = '$status' WHERE order_id = $order_id";
$result = $conn->query($sql);

if (!$result) {
    die("Update failed: " . $conn->error);
}

// Get the previous status from the database
$sql = "SELECT status FROM $table_name WHERE order_id = $order_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$previous_status = $row['status'];

// Update the order status back to the previous status
$sql = "UPDATE $table_name SET status = '$previous_status' WHERE order_id = $order_id";
$result = $conn->query($sql);

if (!$result) {
    die("Update failed: " . $conn->error);
}

// Close the database connection
$conn->close();

// Return a success message
echo "Order status updated successfully!";
?>
