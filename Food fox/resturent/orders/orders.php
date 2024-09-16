<?php
session_start();
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>orders</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .shadow {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>

<body>
    <header>
        <h1>orders</h1>
    </header>
    <nav id="navbar">
        <ul id="navcontent">
            <li><a href="orders.php">Orders</a></li>
            <li><a href="/resturent/menu/index.php">Menu</a></li>
            <li><a href="/resturent/settings/settings.php">Settings</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <div id="container1">
        <h2>Orders</h2>
        <table id="orders-table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Dish Name</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Actions</th>
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
                $username = $_SESSION['username'];

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $table_name = "orders_" . strtolower(str_replace(" ", "_", $username));
                // Query the database to retrieve orders
                $sql = "SELECT order_id, username, dish_name, order_date, status 
                        FROM $table_name
                        -- JOIN dishes d ON o.dish_id = d.dish_id";
                $result = $conn->query($sql);

                if (!$result) {
                    die("Query failed: " . $conn->error);
                }

                // Display orders
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr id='order-" . $row['order_id'] . "' class='shadow'>";
                        echo "<td>" . $row['order_id'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['dish_name'] . "</td>";
                        echo "<td>" . $row['order_date'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "<td>";
                        if ($row['status'] == 'Pending') {
                            echo "<button onclick='changeStatus(" . $row['order_id'] . ", \"In Progress\")'>Change Status to In Progress</button>";
                        } elseif ($row['status'] == 'In Progress') {
                            echo "<button onclick='changeStatus(" . $row['order_id'] . ", \"Delivery in Way\")'>Change Status to Delivery in Way</button>";
                        } elseif ($row['status'] == 'Delivery in Way') {
                            echo "<button onclick='changeStatus(" . $row['order_id'] . ", \"Delivered\")'>Change Status to Delivered</button>";
                        }  else if($row['status']=='Delivered') {
                            echo "  successfully order ";
                            

                        }
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "No orders found";
                }

                // Close the database connection
                $conn->close();
                ?>
            </tbody>
        </table>
        <button id="clear-button" onclick="clearOrders()">Clear Delivered Orders</button>
    </div>

    <script>
        function changeStatus(orderId, status) {
            // Send an AJAX request to update the order status
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "update_status.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("order_id=" + orderId + "&status=" + status);

            // Update the order status in the table
            var tableRow = document.getElementById("order-" + orderId);
            tableRow.cells[4].innerHTML = status;

            // Refresh the page
            location.reload();
        }
           
          function clearOrders() {
    //Send an AJAX request to delete delivered orders
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "delete_delivered_orders.php", true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            // Refresh the page
            location.reload();
        }
    };
    xhr.send();
}
    </script>
</body>

</html>