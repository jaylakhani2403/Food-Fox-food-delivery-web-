<?php
require_once 'menu_items.php'; // Include the PHP file that defines $menu_items_array

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Menu</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
        <h1>menu</h1>
    </header>
    <nav id="navbar">
        <ul id="navcontent">
            <li><a href="/resturent/orders/orders.php">Orders</a></li>
            <li><a href="/menu/index.php">Menu</a></li>
            <li><a href="/resturent/settings/settings.php">Settings</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <main>
    <ul id="menu-items">
    <?php foreach ($menu_items_array as $item) { ?>
        <li>
            <img src="<?php echo $item['image_url']; ?>" alt="<?php echo $item['name']; ?>">
            <h2><?php echo $item['name']; ?></h2>
            <p><?php echo $item['description']; ?></p>
            <p>Price: <?php echo $item['price']; ?></p>
            <div class="side-box">
                <input type="checkbox" id="enable-<?php echo $item['id']; ?>" <?php if ($item['enabled']) { echo 'checked'; } ?>>
                <label for="enable-<?php echo $item['id']; ?>">Enable</label>
            </div>
        </li>
    <?php } ?><br><br>
    <button type="button" id="save-changes-btn">Save Changes</button></ul>

    <form action="insert.php" method="POST" enctype="multipart/form-data">
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea><br><br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" required><br><br>

        <label for="image">Product Image:</label>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>

        <button type="submit" name="submit">Add Product</button>
    </form>

    </main>
    <script src="script.js"></script>
</body>
</html>