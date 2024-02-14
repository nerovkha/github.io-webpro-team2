<?php
include '../header.php';
include 'db_conex.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $brandName = $_POST["brand_name"];
    $productName= $_POST["product_name"];
    $salePrice = isset($_POST["sale_price"]) ? $_POST["sale_price"] : "0";
    $countryOfOrigin = $_POST["country_of_origin"];
    $Category = $_POST["category_name"];
    $brandId = $_POST["brand_Id"];


    // Insert data into the database
    $sql = "INSERT INTO ilyas_Product (brand_name, sale_price, country_of_origin,category_name,product_name,brand_Id) VALUES ('$brandName', '$salePrice', '$countryOfOrigin',' $Category',' $productName',$brandId)";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>
</head>
<body>
<form method="post" class="">
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
    <input type="number" name="sale_price" min="0">
    <br>
    <label>Country of Origin:</label>
    <input type="text" name="country_of_origin">
    <br>
    <label>Product Name:</label>
    <input type="text" name="product_name">
    <br>
    <label>Brand Name:</label>
    <input type="text" name="brand_name">
    <br>
    <label>Brand ID:</label>
    <input type="text" name="brand_Id">
    <br>
    <input type="submit" value="Filter">
</form>
</body>


<style>
        /* styling for the form */
        form {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 300px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        select {
            width: 100%;
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

</html>
<?php include '../footer.php'?>