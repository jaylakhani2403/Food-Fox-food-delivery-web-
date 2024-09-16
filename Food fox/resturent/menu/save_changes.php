<?php
require_once 'menu_items.php';
require_once 'connect.php'; // Include your database configuration file

// Update enabled items
$enabledItems = explode(",", $_POST["enabled_items"]);
foreach ($menu_items_array as &$item) {
    $item["enabled"] = in_array($item["id"], $enabledItems);

    $username = $_SESSION['username'];

    $table_name = "menu_" . strtolower(str_replace(" ", "_", $username));

    // Update database
    $sql = "UPDATE $table_name SET enabled = " . ($item["enabled"] ? 1 : 0) . " WHERE id = " . $item["id"];
    $conn = new mysqli("localhost", "root", "", "restaurant_db");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $conn->query($sql);
    $conn->close();
}

echo "Changes saved successfully!";
?>