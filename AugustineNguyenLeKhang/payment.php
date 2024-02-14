<?php
session_start();

include("../header.php");

$products = [
    ['name' => 'Heirloom Tomato', 'price' => 4.00, 'image' => 'images/a.jpg'],
];

function calculateTotal($quantity, $price)
{
    return $quantity * $price;
}

$totalPrice = 0;

?>

<div class="card mt-4">
    <div class="row">
        <div class="col-md-8 cart">
            <div class="title">
                <div class="row">
                    <div class="col">
                        <h4><b>Payment Summary</b></h4>
                    </div>
                </div>
            </div>

            <?php
            foreach ($_SESSION['cart'] as $index => $cartItem) {
                $product = $products[$cartItem['product']];
                echo '
                <div class="row border-top border-bottom main align-items-center product-item">
                    <div class="col-2">
                        <img class="img-fluid" src="' . $product['image'] . '" alt="Product Image">
                    </div>
                    <div class="col">
                        <div class="row text-muted">Vegetables</div>
                        <div class="row">' . $product['name'] . '</div>
                    </div>
                    <div class="col">' . $cartItem['quantity'] . '</div>
                    <div class="col">&euro; ' . number_format(calculateTotal($cartItem['quantity'], $product['price']), 2) . '</div>
                </div>';
                $totalPrice += calculateTotal($cartItem['quantity'], $product['price']);
            }
            ?>

            <div class="back-to-shop">
                <a href="shopping_cart.php">&leftarrow;</a><span class="text-muted">Back to Cart</span>
            </div>
        </div>

        <div class="col-md-4 summary">
            <div>
                <h5><b>Order Summary</b></h5>
            </div>
            <hr>
            <div class="row">
                <div class="col">TOTAL ITEMS</div>
                <div class="col text-right"><?php echo count($_SESSION['cart']); ?></div>
            </div>
            <div class="row">
                <div class="col">TOTAL PRICE</div>
                <div class="col text-right">&euro; <?php echo number_format($totalPrice, 2); ?></div>
            </div>

            <hr>
            <form action="confirm_payment.php" method="post">
                <button type="submit" class="btn btn-primary">Confirm Payment</button>
            </form>
        </div>
    </div>
</div>

<?php include('../footer.php'); ?>
