<?php
session_start();

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Dashboard</h1>
    </header>
    <nav id="navbar">
        <ul id="navcontent">
        <li><a href="orders/orders.php">Orders</a></li>
            <li><a href="menu/index.php">Menu</a></li>
            <li><a href="settings/settings.php">Settings</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <div id="container">
        <!-- Content will be displayed here -->
    </div>

    <script src="script.js"></script>
</body>
</html>