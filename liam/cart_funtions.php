<?php
session_start();

// Check if 'cart' session variable exists; if not, initialize it as an empty array
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Function to add a product to the cart
function addToCart($productId) {
    $cart = $_SESSION['cart'];

    // Check if the product is already in the cart
    $key = array_search($productId, array_column($cart, 'id'));

    if ($key !== false) {
        // If the product is already in the cart, increment its quantity
        $cart[$key]['quantity']++;
    } else {
        // If the product is not in the cart, add it with quantity 1
        $cart[] = array('id' => $productId, 'quantity' => 1);
    }

    $_SESSION['cart'] = $cart;
}

// Function to update or remove items from the cart
function updateQuantity($productId, $operation) {
    $cart = $_SESSION['cart'];

    // Find the product in the cart
    $key = array_search($productId, array_column($cart, 'id'));

    if ($key !== false) {
        // Update the quantity based on the operation
        if ($operation === 'increment') {
            $cart[$key]['quantity']++;
        } elseif ($operation === 'decrement' && $cart[$key]['quantity'] > 1) {
            $cart[$key]['quantity']--;
        }

        $_SESSION['cart'] = $cart;
    }
}

// Function to remove item from the cart
function removeFromCart($productId) {
    $cart = $_SESSION['cart'];

    // Remove the item from the cart
    $cart = array_filter($cart, function ($item) use ($productId) {
        return $item['id'] !== $productId;
    });

    $_SESSION['cart'] = $cart;
}
?>
