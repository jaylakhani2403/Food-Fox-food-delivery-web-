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

// Query the database to retrieve user data
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $restaurant_name = $row['restaurant_name'];
    $cityname = $row['city'];
} else {
    echo "Error retrieving user data";
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>settings</title>
    <link rel="stylesheet" href="style.css">
</head><header>
        <h1>settings</h1>
    </header>
    <nav id="navbar">
        <ul id="navcontent">
            <li><a href="/orders/orders.php">Orders</a></li>
            <li><a href="/menu/index.php">Menu</a></li>
            <li><a href="/settings/settings.php">Settings</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
<form action="update_settings.php" method="POST">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" value="<?php echo $username ?>" readonly><br><br>
    <label for="restaurant_name">Restaurant Name:</label>
    <input type="text" id="restaurant_name" name="restaurant_name" value="<?php echo $restaurant_name ?>"><br><br>
    <label for="cityname">City Name:</label>
    <input type="text" id="cityname" name="cityname" value="<?php echo $cityname ?>"><br><br>
    <input type="submit" onclick="savechange()" value="Save Changes">
</form>
</html>