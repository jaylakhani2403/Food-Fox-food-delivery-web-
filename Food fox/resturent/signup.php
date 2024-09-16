<?php
session_start();
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['restaurant_name']) && isset($_POST['city'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $restaurant_name = $_POST['restaurant_name'];
    $city = $_POST['city'];

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

    // Query the database to insert user data
    $sql = "INSERT INTO users (username, password, restaurant_name, city) VALUES ('$username', '$password', '$restaurant_name', '$city')";
    $conn->query($sql);

    // Create a new table for the restaurant
    $table_name = "menu_" . strtolower(str_replace(" ", "_", $username));
    $sql = "CREATE TABLE $table_name (
      id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  price DECIMAL(10, 2) NOT NULL,
  image_url VARCHAR(255) NOT NULL,
  enabled TINYINT(1) NOT NULL DEFAULT 1

    )";
    $conn->query($sql);

    $table_name = "orders_" . strtolower(str_replace(" ", "_", $username));
    $sql = "CREATE TABLE $table_name (
        order_id INT AUTO_INCREMENT,
        username VARCHAR(255),
        dish_name VARCHAR(255),
        order_date DATE,
        status VARCHAR(255),
        PRIMARY KEY (order_id)
    )";
   
    $conn->query($sql);

    // Create a new directory for the restaurant
    // $restaurant_dir = strtolower(str_replace(" ", "_", $username));
    // mkdir($restaurant_dir, 0777, true);

    // Create the restaurant's PHP file
   // Create the restaurant's PHP file
$restaurant_file =  'resto'. '/' . $restaurant_name . '.php';
$file_content = '<?php
// Menu page for ' . $restaurant_name . '

// Function to connect to database
function connectToDatabase() {
    $db_host = "' . $servername . '";
    $db_username = "' . $username_db . '";
    $db_password = "' . $password_db . '";
    $db_name = "' . $dbname . '";

    $db = mysqli_connect($db_host, $db_username, $db_password, $db_name);

    if (!$db) {
        die("Could not connect to database");
    }

    return $db;
}

// Function to retrieve menu items from database
function getMenuItemsFromDatabase($username) {
    $db = connectToDatabase();

    $table_name = "menu_" . strtolower(str_replace(" ", "_", $username));
    $query = "SELECT * FROM $table_name WHERE enabled = 1";
    $result = mysqli_query($db, $query);

    $menu_items = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $menu_items[] = $row;
    }

    return $menu_items;
}

?>

<html>
<head>
    <title>' . $restaurant_name . '</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div id="menu-container">
        <header>
            <h1>Welcome to <?php echo "' . $restaurant_name . '"; ?></h1>
        </header>

        <?php
        $menu_items = getMenuItemsFromDatabase("' . $username . '");

        foreach ($menu_items as $item) {
            ?>
            <div class="menu-item">
                <h2><?= $item["name"] ?></h2>
                <p><?= $item["description"] ?></p>
                <p>Price: <?= $item["price"] ?></p>
                <img src="<?= "/resturent/menu/" . $item["image_url"] ?>" alt="<?= $item["name"] ?>">
                <button class="add-to-cart" data-item-id="<?= $item["id"] ?>">Add to Cart</button>
            </div>
            <?php
        }
        ?>
        <button class="order-now" data-item-id="<?= $item["id"] ?>">Order Now</button>
    </div>
</body>
</html>
';
file_put_contents($restaurant_file, $file_content);

    echo "Signup successful! You can now login.";
    header("Location: login.php");
    exit;

    // Close the database connection
    $conn->close();
}
?>
<body>
<link rel="stylesheet" href="styles.css">
<div id="container">
<form action="signup.php"  id="form"  method="post">
    <h2>Signup</h2>
    <label for="username">Username:</label>
    <input type="text" id="username" name="username"><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password"><br><br>
    <label for="restaurant_name">Restaurant Name:</label>
    <input type="text" id="restaurant_name" name="restaurant_name"><br><br>
    <label for="city">City:</label>
    <input type="text" id="city" name="city"><br><br>
    <input type="submit" value="Signup">
   <p>Don't have account?  <a  href="login.php">Login Now </a></p>
</form>
</div>
</body>