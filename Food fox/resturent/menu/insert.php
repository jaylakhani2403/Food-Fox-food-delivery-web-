<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant_db"; // Replace with your database name
session_start();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    // Get form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    // Handle image upload
    $image = $_FILES['image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image);


    $username = $_SESSION['username'];

    $table_name = "menu_" . strtolower(str_replace(" ", "_", $username));

    // Move uploaded file to server
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        // Prepare SQL statement
        $sql = "INSERT INTO $table_name (name, description, price, image_url) VALUES ('$name', '$description', '$price', '$target_file')";

        // Execute query
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error uploading the image.";
    }
}

$conn->close();
?>
