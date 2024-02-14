if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["checkout"])) {
    // Process form submission
    $quantity = $_POST["quantity"];

    // Insert data into the database (modify this query based on your table structure)
    $stmt = $db->prepare("INSERT INTO orders (product_id, quantity) VALUES (:product_id, :quantity)");

    // Assuming your cart item has a product ID
    $product_id = $_SESSION['cart'][0]['product'];

    $stmt->bindParam(':product_id', $product_id);
    $stmt->bindParam(':quantity', $quantity);

    $result = $stmt->execute();

    if ($result) {
        echo "<p>Order successfully placed!</p>";
    } else {
        echo "<p>Error placing order.</p>";
    }
}
