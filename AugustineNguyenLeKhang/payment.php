<?php
ob_start(); // Start output buffering
session_start();

include("../header.php");
include("db_connect.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form fields (You can add more validation as needed)
    $errors = [];

    if (empty($_POST["firstname"])) {
        $errors[] = "First name is required";
    } else {
        $firstname = $_POST["firstname"];
    }

    if (empty($_POST["lastname"])) {
        $errors[] = "Last name is required";
    } else {
        $lastname = $_POST["lastname"];
    }

    if (empty($_POST["email"])) {
        $errors[] = "Email is required";
    } else {
        $email = $_POST["email"];
    }

    if (empty($_POST["phone"])) {
        $errors[] = "Phone number is required";
    } else {
        $phone = $_POST["phone"];
    }

    if (empty($_POST["address"])) {
        $errors[] = "Address is required";
    } else {
        $address = $_POST["address"];
    }

    if (empty($_POST["payment_method"])) {
        $errors[] = "Payment method is required";
    } else {
        $payment_method = $_POST["payment_method"];
    }

    // If no errors, proceed to process.php
    if (empty($errors)) {
        // Store user information in session
        $_SESSION["user_info"] = [
            "firstname" => $firstname,
            "lastname" => $lastname,
            "email" => $email,
            "phone" => $phone,
            "address" => $address,
            "payment_method" => $payment_method
        ];

        // Redirect to bill.php
        header("Location: bill.php");
        exit();
    }
}
?>


<div class="container">
    <h2>Payment Information</h2>
    <form method="post" action="payment.php">
        <div class="form-group">
            <label for="firstname">First Name:</label>
            <input type="text" class="form-control" id="firstname" name="firstname" required>
        </div>
        <div class="form-group">
            <label for="lastname">Last Name:</label>
            <input type="text" class="form-control" id="lastname" name="lastname" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="payment_method">Payment Method:</label>
            <select class="form-control" id="payment_method" name="payment_method" required>
                <option value="">Select Payment Method</option>
                <option value="credit_card">Credit Card</option>
                <option value="paypal">PayPal</option>
                <!-- Add more payment methods as needed -->
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <?php
    // Display validation errors, if any
    if (!empty($errors)) {
        echo "<div class='alert alert-danger mt-3'>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
        echo "</div>";
    }
    ?>
</div>

<?php include('../footer.php'); ?>
