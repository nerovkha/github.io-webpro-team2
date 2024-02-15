<?php
session_start();

include("../header.php");
include("db_connect.php");

// Ensure that the cart is not empty
if (empty($_SESSION['cart'])) {
    header("Location: shopping_cart.php");
    exit();
}

$products = [
    ['name' => 'Heirloom Tomato', 'price' => 4.00, 'image' => 'images/a.jpg'],
];

// Function to calculate the total price based on quantity
function calculateTotal($quantity, $price)
{
    return $quantity * $price;
}

// Process payment
if (isset($_POST['confirm_payment'])) {
    // Get user input
    $name = $_POST['name'];
    $address = $_POST['address'];
    $payment_method = $_POST['payment_method'];

    // Insert payment details into the database
    $stmt = $conn->prepare("INSERT INTO payments (name, address, payment_method, total_price, date) VALUES (?, ?, ?, ?, NOW())");
    $totalPrice = 0;
    foreach ($_SESSION['cart'] as $index => $cartItem) {
        $totalPrice += calculateTotal($cartItem['quantity'], $products[$cartItem['product']]['price']);
    }
    $stmt->bind_param("sssd", $name, $address, $payment_method, $totalPrice);
    $stmt->execute();
    $stmt->close();

    // You can perform further validation and processing here

    // For demonstration, let's just redirect to a success page
    header("Location: payment_success.php");
    exit();
}
?>

<div class="container mt-4">
    <h4>Payment Details</h4>
    <hr>
    <form method="post" action="">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="payment_method">Payment Method:</label>
            <select class="form-control" id="payment_method" name="payment_method" required>
                <option value="Credit Card">Credit Card</option>
                <option value="PayPal">PayPal</option>
                <!-- Add more payment methods if needed -->
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="confirm_payment">Confirm Payment</button>
    </form>
</div>

<?php include("../footer.php"); ?>
