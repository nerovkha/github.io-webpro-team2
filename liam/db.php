<?php
session_start();

include("../header.php");

// Your database connection code
$servername = "php25-db-1";
$username = "aopp1";
$password = "password";
$dbname = "a0pp1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form submission
    $quantity = $_POST["quantity"];

    // Insert data into the database (modify this query based on your database structure)
    $sql = "INSERT INTO orders (product_id, quantity) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    // Assuming your cart item has a product ID
    $product_id = $_SESSION['cart'][0]['product'];
    
    $stmt->bind_param("ii", $product_id, $quantity);
    $stmt->execute();
    
    $stmt->close();
}

$conn->close();

// Your HTML output after processing the form
include("../footer.php");
?>
