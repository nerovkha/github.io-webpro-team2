<?php
include '../header.php';
include 'db_conex.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $brandName = isset($_POST["brand_name"]) ? $_POST["brand_name"] : "";
    $productName = isset($_POST["product_name"]) ? $_POST["product_name"] : "";
    $salePrice = isset($_POST["sale_price"]) ? $_POST["sale_price"] : "0";
    $countryOfOrigin = isset($_POST["country_of_origin"]) ? $_POST["country_of_origin"] : "";
    $Category = isset($_POST["category_name"]) ? $_POST["category_name"] : "";
    $brandId = isset($_POST["brand_Id"]) ? $_POST["brand_Id"] : "0"; // Set a default value if not provided
    $Description = isset($_POST["description"]) ? $_POST["description"] : "";
    $CategoryId = isset($_POST["category_id"]) ? $_POST["category_id"] : "0";
    $created_at = date("Y-m-d H:i:s");
    $barcode = isset($_POST["barcode"]) ? $_POST["barcode"] : "0";

    // Insert data into the database
    $sql = "INSERT INTO ilyas_Product (brand_name, sale_price, country_of_origin, category_name, product_name, brand_Id, description, category_id, created_at, barcode) VALUES ('$brandName', '$salePrice', '$countryOfOrigin', '$Category', '$productName', '$brandId', '$Description', '$CategoryId', '$created_at', '$barcode')";
    if ($conn->query($sql) === TRUE) {
        echo "<h1>New record created successfully</h1>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


?>
<div class="container">   
<div class="form-container">   
<form method="post" name="Add_form" class="rectangle-form">
    <h1>ADD Data</h1>
    <label>Category:</label>
    <select name="category_name">
        <option value="">All</option>
        <option value="Vegetables">Vegetables</option>
        <option value="Baked Goods">Baked Goods</option>
        <option value="Drinks">Drinks</option>
        <option value="Eggs and Diary">Eggs and Diary</option>
    </select>
    <br>
    <label>Price:</label>
    <input type="number" name="sale_price" min="0" placeholder="Price">
    <br>
    <label>Country of Origin:</label>
    <input type="text" name="country_of_origin" placeholder="Country of Origin">
    <br>
    <label>Product Name:</label>
    <input type="text" name="product_name" placeholder="Product Name">
    <br>
    <label>Brand Name:</label>
    <input type="text" name="brand_name" placeholder="Brand Name">
    <br>
    <label>Brand ID:</label>
    <input type="text" name="brand_Id" placeholder="Brand ID">
    <br>
    <label>Description:</label>
    <input type="text" name="description" placeholder="Desciption">
    <br>
    <label>Category ID:</label>
    <input type="text" name="category_id" placeholder="Category ID">
    <br>
    <label>Barcode:</label>
    <input type="text" name="barcode" placeholder="Barcode">
    <br>
    <input type="submit" value="ADD">
</form>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var addForm = document.forms["Add_form"];

    addForm.addEventListener("submit", function(event) {
        var category = addForm.elements["category_name"].value;
        var price = addForm.elements["sale_price"].value;
        var country = addForm.elements["country_of_origin"].value;
        var productName = addForm.elements["product_name"].value;
        var brandName = addForm.elements["brand_name"].value;
        var brandId = addForm.elements["brand_Id"].value;
        var description = addForm.elements["description"].value;

        if (category === "") {
            alert("Please select a category.");
            event.preventDefault();
            return;
        }

        if (price === "" || isNaN(price)) {
            alert("Please enter a valid price.");
            event.preventDefault();
            return;
        }

        if (country === "") {
            alert("Please enter the country of origin.");
            event.preventDefault();
            return;
        }

        if (productName === "") {
            alert("Please enter the product name.");
            event.preventDefault();
            return;
        }

        if (brandName === "") {
            alert("Please enter the brand name.");
            event.preventDefault();
            return;
        }

        if (brandId === "") {
            alert("Please enter the brand ID.");
            event.preventDefault();
            return;
        }

        if (description === "") {
            alert("Please enter a description.");
            event.preventDefault();
            return;
        }
    });
});
</script>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</div>
</div>








<style>
     .form-container {
        margin: 20px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        width: 300px;
        display: inline-block;
    }

    input[type="text"],
    input[type="number"],
    select {
        width: calc(100% - 20px);
        margin-bottom: 10px;
    }

    input[type="submit"] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
    </style>

<?php include '../footer.php'?>
</html>
