<?php
session_start();

include("../header.php");
include("db.php");

$products = [
    ['name' => 'Heirloom Tomato', 'price' => 4.00, 'image' => 'images/a.jpg'],
];

// Function to calculate the total price based on quantity
function calculateTotal($quantity, $price)
{
    return $quantity * $price;
}

// Add a product to the cart
if (empty($_SESSION['cart'])) {
    $_SESSION['cart'][] = ['product' => 0, 'quantity' => 1];
}

// Handle quantity changes
if (isset($_POST['index'])) {
    $index = $_POST['index'];
    $quantity = isset($_SESSION['cart'][$index]['quantity']) ? $_SESSION['cart'][$index]['quantity'] : 1;

    if (isset($_POST['decrement']) && $quantity > 1) {
        $quantity--;
    } elseif (isset($_POST['increment'])) {
        $quantity++;
    }

    $_SESSION['cart'][$index]['quantity'] = $quantity;
}

// Checking
if (isset($_POST['checkout'])) {
    // Calculate the total price
    $totalPrice = 0;
    foreach ($_SESSION['cart'] as $index => $cartItem) {
        $totalPrice += calculateTotal($cartItem['quantity'], $products[$cartItem['product']]['price']);
    }

    // Add shipping cost
    $totalPrice += 5.00;

    // Insert the order into the database
    $userId = 1;

    // Ensure that $conn is defined
    if (!isset($conn)) {
        die("Error: \$conn is not defined. Check your database connection.");
    }

    // Use a prepared statement
    $query = "INSERT INTO orders (user_id, total_price, date_placed) VALUES (?, ?, NOW())";
    $stmt = $conn->prepare($query);

    // Check if the prepared statement was successful
    if (!$stmt) {
        die("Error: " . $conn->error);
    }

    $stmt->bind_param("id", $userId, $totalPrice);
    $stmt->execute();
    $orderId = $stmt->insert_id;
    $stmt->close();

    // Clear the shopping cart
    $_SESSION['cart'] = [];

    // Display the success message with Bootstrap alert centered
    echo '<div class="container d-flex justify-content-center align-items-center vh-100">';
    echo '<div class="alert alert-success text-center" role="alert">';
    echo "Your order has been placed successfully. <br> Order ID: $orderId <br> <a href='payment.php' class='alert-link'>Go to payment</a>";
    echo '</div>';
    echo '</div>';
}

// footer
include('../footer.php');
?>
