<?php
session_start();

$username = $_SESSION['username'];
?>

<?php
$enabledItems = explode(",", $_POST['enabled_items']);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$username = $_SESSION['username'];
$table_name = "orders_" . strtolower(str_replace(" ", "_", $username));

// Update the menu items
foreach ($enabledItems as $id) {
    $sql = "UPDATE $tabel_name SET enabled = 1 WHERE id = $id";
    $conn->query($sql);
}

// Disable all other menu items
$sql = "UPDATE $tabel_name SET enabled = 0 WHERE id NOT IN (" . implode(", ", $enabledItems) . ")";
$conn->query($sql);

// Close the database connection
$conn->close();
?>