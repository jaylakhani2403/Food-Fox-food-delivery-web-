<?php
// Menu page for nidhisa restorent

// Function to connect to database
function connectToDatabase() {
    $db_host = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "restaurant_db";

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
    <title>nidhisa restorent</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div id="menu-container">
        <header>
            <h1>Welcome to <?php echo "nidhisa restorent"; ?></h1>
        </header>

        <?php
        $menu_items = getMenuItemsFromDatabase("nidhisa");

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
