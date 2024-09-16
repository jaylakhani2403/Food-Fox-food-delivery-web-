<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
    $username = $_SESSION['username'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Menu</h1>
    </header>
    <nav id="navbar">
        <ul id="navcontent">
            <li><a href="/orders/orders.php">Orders</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="/settings/settings.php">Settings</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <div id="container1">
        <h2>Menu</h2>
        <form id="menu-form">
            <table id="menu-table">
                <thead>
                    <tr>
                        <th>Food Item</th>
                        <th>Enabled</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
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

                    $table_name = "menu_" . strtolower(str_replace(" ", "_", $username));
                    // Query the database to retrieve menu items
                    $sql = "SELECT * FROM $table_name";
                    $result = $conn->query($sql);

                    // Check if the query was successful
                    if ($result === false) {
                        echo "Error: " . $conn->error;
                    } else {
                        // Display menu items
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['menu_item'] . "</td>";
                                echo "<td><input type='checkbox' name='enabled[]' value='" . $row['id'] . "'" . ($row['enabled'] == 1 ? ' checked' : '') . "></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "No menu items found";
                        }
                    }

                    // Close the database connection
                    $conn->close();
                    ?>
                </tbody>
            </table>
            <button type="submit">Save Changes</button>
        </form>
        <button id="add-item-button">Add Item</button>
        <div id="add-item-form" style="display: none;">
            <input type="text" id="new-item-input" placeholder="Enter new menu item">
            <button id="add-item-submit">Add</button>
        </div>
    </div>

    <script>
        document.getElementById("menu-form").addEventListener("submit", function(event) {
            event.preventDefault();
            var enabledItems = [];
            var checkboxes = document.getElementsByName("enabled[]");
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    enabledItems.push(checkboxes[i].value);
                }
            }
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "update_menu.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("enabled_items=" + enabledItems.join(","));
            location.reload();
        });

        document.getElementById("add-item-button").addEventListener("click", function() {
            document.getElementById("add-item-form").style.display = "block";
        });

        document.getElementById("add-item-submit").addEventListener("click", function() {
            var newItemInput = document.getElementById("new-item-input");
            var newItemValue = newItemInput.value.trim();
            if (newItemValue !== "") {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "add_menu_item.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send("new_item=" + newItemValue);
                location.reload();
            }
        });
    </script>
</body>
