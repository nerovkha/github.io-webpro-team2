<?php
session_start();

include("../header.php");
include("db_connect.php"); // Assuming you have a database connection file

// Retrieve user information from session
$firstname = $_SESSION["user_info"]["firstname"];
$lastname = $_SESSION["user_info"]["lastname"];
$email = $_SESSION["user_info"]["email"];
$phone = $_SESSION["user_info"]["phone"];
$address = $_SESSION["user_info"]["address"];
$payment_method = $_SESSION["user_info"]["payment_method"];

// Retrieve the total price from the session
$totalPrice = isset($_SESSION["totalPrice"]) ? $_SESSION["totalPrice"] : 0;

?>

<div class="container">
    <h2>Bill</h2>
    <div>
        <p><strong>Name:</strong> <?php echo $firstname . ' ' . $lastname; ?></p>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <p><strong>Phone:</strong> <?php echo $phone; ?></p>
        <p><strong>Address:</strong> <?php echo $address; ?></p>
        <p><strong>Payment Method:</strong> <?php echo $payment_method; ?></p>
        <p><strong>Total Price:</strong> &euro; <?php echo number_format($totalPrice, 2); ?></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</div>


<?php include('../footer.php'); ?>
