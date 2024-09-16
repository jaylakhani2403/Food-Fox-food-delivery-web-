<?php
// login.php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

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
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Invalid username or password";
    }

    // Close the database connection
    $conn->close();
}
?>
<body >

<link rel="stylesheet" href="styles.css">
<div id="container" >
<form action="login.php"  id="form" method="post">
  
<h2>Login</h2>
<label for="username">Username:</label>
    <input type="text" id="username" name="username"><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password"><br><br>
    <input type="submit" value="Login">

    <p>Don't have account? <a href="signup.php">Sign Up Now</a></p>
</form>
</div>
</body>