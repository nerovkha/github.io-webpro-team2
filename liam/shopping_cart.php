<?php
// Initialize session before any output
session_start();

include("../header.php");

// Sample product data
$products = [
    ['name' => 'Heirloom Tomato', 'price' => 4.00, 'image' => 'images/a.jpg'],
];

// Function to calculate total price based on quantity
function calculateTotal($quantity, $price)
{
    return $quantity * $price;
}

// Function to display product items
function displayProduct($index, $product)
{
    echo '
    <div class="row border-top border-bottom main align-items-center product-item">
        <div class="col-2">
            <img class="img-fluid" src="' . $product['image'] . '" alt="Product Image">
        </div>
        <div class="col">
            <div class="row text-muted">Vegetables</div>
            <div class="row">' . $product['name'] . '</div>
        </div>
        <div class="col">
            <form method="post">
                <input type="hidden" name="index" value="' . $index . '">
                <button type="submit" name="decrement">-</button>
                <input type="text" name="quantity" value="' . $_SESSION['cart'][$index]['quantity'] . '" class="border">
                <button type="submit" name="increment">+</button>
            </form>
        </div>
        <div class="col">&euro; ' . number_format(calculateTotal($_SESSION['cart'][$index]['quantity'], $product['price']), 2) . ' <span class="close">&#10005;</span></div>
    </div>';
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
?>

    <!-- Shopping Cart -->
    <div class="card mt-4">
        <div class="row">
            <div class="col-md-8 cart">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4><b>Shopping Cart</b></h4>
                        </div>
                        <div class="col align-self-center text-right text-muted"><?php echo count($_SESSION['cart']); ?> items</div>
                    </div>
                </div>

                <?php
                // Display each product in the cart
                foreach ($_SESSION['cart'] as $index => $cartItem) {
                    displayProduct($index, $products[$cartItem['product']]);
                }
                ?>

                <div class="back-to-shop">
                    <a href="index.html">&leftarrow;</a><span class="text-muted">Back to shop</span>
                </div>
            </div>

            <div class="col-md-4 summary">
                <!-- Summary Section -->
                <div>
                    <h5><b>Summary</b></h5>
                </div>
                <hr>
                <div class="row">
                    <div class="col" style="padding-left:0;">ITEMS <?php echo count($_SESSION['cart']); ?></div>
                    <div class="col text-right">&euro; <?php
                        $totalPrice = 0;
                        foreach ($_SESSION['cart'] as $index => $cartItem) {
                            $totalPrice += calculateTotal($cartItem['quantity'], $products[$cartItem['product']]['price']);
                        }
                        echo number_format($totalPrice, 2);
                    ?></div>
                </div>

                <form>
                    <p>SHIPPING</p>
                    <select>
                        <option class="text-muted">Standard-Delivery- &euro;5.00</option>
                    </select>

                    <p>PROMO CODE</p>
                    <input id="code" placeholder="Enter your code">
                </form>

                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <div class="col">TOTAL PRICE</div>
                    <div class="col text-right">&euro; <?php echo number_format($totalPrice + 5.00, 2); ?></div>
                </div>

                <button class="btn">CHECKOUT</button>
            </div>
        </div>
    </div>

<?php include('../footer.php'); ?>
