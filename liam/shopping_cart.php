<?php
session_start();

// Sample product data (you can replace this with your actual product data)
$products = [
    'heirloom_tomato' => ['name' => 'Heirloom Tomato', 'price' => 4.00],
    'banana' => ['name' => 'Banana', 'price' => 5.00]
];

// Initialize the cart if not already set in the session
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle add to cart requests
if (isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];

    // Add the product to the cart
    if (isset($products[$productId])) {
        if (!isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] = [
                'name' => $products[$productId]['name'],
                'price' => $products[$productId]['price'],
                'quantity' => 1
            ];
        } else {
            $_SESSION['cart'][$productId]['quantity']++;
        }
    }
}

// Handle remove from cart requests
if (isset($_POST['remove_from_cart'])) {
    $productId = $_POST['product_id'];

    // Remove the product from the cart
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity']--;

        if ($_SESSION['cart'][$productId]['quantity'] <= 0) {
            unset($_SESSION['cart'][$productId]);
        }
    }
}

// Calculate total price
$totalPrice = 0;
foreach ($_SESSION['cart'] as $item) {
    $totalPrice += $item['quantity'] * $item['price'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Navbar -->
    <div class="container-fluid main-container">
        <div class="row nav-container">
            <div class="col-12 col-md-6">
                <header class="h1 text-white"><a class="Home-page text-white" href="index.html">Joo-marketti</a></header>
            </div>
            <div class="col-6">
                <nav class="navbar navbar-expand-md bg-body-tertiary">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active text-white" aria-current="page" href="index.html">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Shop
                                </a>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="drinks.html">Drinks</a></li>
                                  <li><a class="dropdown-item" href="bakedgoods.html">Baked Goods</a></li>
                                  <li><a class="dropdown-item" href="eggsndairy.html">Eggs and Diary </a></li>
                                  <li><a class="dropdown-item" href="vegetables.html">Vegetables</a></li>
                                </ul>
                              </li>
                            <!-- Drop down bar for latter -->
                            <li class="nav-item">
                                <a class="nav-link text-white" href="liam.html">Shopping Cart</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="contact.html">Contact Us</a>
                            </li>
                        </ul>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <!-- Shopping Cart -->
    <div class="card mt-4">
        <div class="row">
            <div class="col-md-8 cart">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4><b>Shopping Cart</b></h4>
                        </div>
                        <div class="col align-self-center text-right text-muted">2 items</div>
                    </div>
                </div>

                <!-- Product 1 -->
                <?php foreach ($_SESSION['cart'] as $productId => $item): ?>
                    <div class="row border-top border-bottom main align-items-center product-item">
                        <div class="col-2">
                            <img class="img-fluid" src="images/<?php echo $productId; ?>.jpg" alt="Product Image">
                        </div>
                        <div class="col">
                            <div class="row text-muted"><?php echo $item['name']; ?></div>
                            <div class="row"><?php echo $productId; ?></div>
                        </div>
                        <div class="col">
                            <form method="post">
                                <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                                <button type="submit" name="remove_from_cart">-</button>
                                <span class="border"><?php echo $item['quantity']; ?> kg</span>
                                <button type="submit" name="add_to_cart">+</button>
                            </form>
                        </div>
                        <div class="col">&euro; <?php echo number_format($item['price'] * $item['quantity'], 2); ?> <span class="close">&#10005;</span></div>
                    </div>
                <?php endforeach; ?>

                <div class="back-to-shop">
                    <a href="index.html">&leftarrow;</a><span class="text-muted">Back to shop</span>
                </div>
            </div>

            <div class="col-md-4 summary">
                <div>
                    <h5><b>Summary</b></h5>
                </div>
                <hr>
                <div class="row">
                    <div class="col" style="padding-left:0;">ITEMS <?php echo count($_SESSION['cart']); ?></div>
                    <div class="col text-right">&euro; <?php echo number_format($totalPrice, 2); ?></div>
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
    </div>
    <div class="copyright-box">
        <div class="container container-fluid text-center copyright">
            © Joo-Marketti
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
