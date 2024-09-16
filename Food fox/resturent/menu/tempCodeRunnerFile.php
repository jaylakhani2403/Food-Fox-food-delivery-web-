<?php
$sql = "INSERT INTO menu_items (food_item, enabled) VALUES ('$newItem', 1)";

if ($conn->query($sql) === TRUE) {
    echo "New menu item added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}