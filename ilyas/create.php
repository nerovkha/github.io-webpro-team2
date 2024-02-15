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
    $Description= $_POST["description"];
    $CategoryId= isset($_POST["category_id"]) ? $_POST["category_id"]:"0" ;
    $created_at= date("Y-m-d H:i:s");
    $barcode= isset($_POST["barcode"]) ? $_POST["barcode"]:"0";


    // Insert data into the database
    $sql = "INSERT INTO ilyas_Product (brand_name, sale_price, country_of_origin,category_name,product_name,brand_Id, description,category_id,created_at,barcode) VALUES ('$brandName', '$salePrice', '$countryOfOrigin',' $Category',' $productName','$brandId','$Description','$CategoryId','$created_at','$barcode')";
    if ($conn->query($sql) === TRUE) {
        echo " <h1>New record created successfully</h1>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
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
</div>

<div class="form-container">
<form method="post" name="Delete_form" class="rectangle-form">
    <h1>Update Data</h1>
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
        <input type="text" name="description" placeholder="Description">
        <br>
        <label>Category ID:</label>
        <input type="text" name="category_id" placeholder="Category ID">
        <br>
        <label>Barcode:</label>
        <input type="text" name="barcode" placeholder="Barcode">
        <br>
        <input type="submit" name="submit_delete" value="Delete">
    
</form>
</div>
</div>



<?php



// Check if form is submitted for deletion
if (isset($_POST['submit_delete'])) {
    // Retrieve form data
    $category_name = $_POST["category_name"];
    $sale_price = isset($_POST["sale_price"]) ? $_POST["sale_price"] : null;
    $country_of_origin = $_POST["country_of_origin"];
    $product_name = $_POST["product_name"];
    $brand_name = $_POST["brand_name"];
    $brand_Id = $_POST["brand_Id"];
    $description = $_POST["description"];
    $category_id = $_POST["category_id"];
    $barcode = $_POST["barcode"];

    // Construct the DELETE query
    $sql = "DELETE FROM ilyas_Product WHERE ";
    $conditions = array();

    // Build conditions based on provided form data
    if (!empty($category_name)) {
        $conditions[] = "category_name = '$category_name'";
    }
    if (!empty($sale_price)) {
        $conditions[] = "sale_price = '$sale_price'";
    }
    if (!empty($country_of_origin)) {
        $conditions[] = "country_of_origin = '$country_of_origin'";
    }
    if (!empty($product_name)) {
        $conditions[] = "product_name = '$product_name'";
    }
    if (!empty($brand_name)) {
        $conditions[] = "brand_name = '$brand_name'";
    }
    if (!empty($brand_Id)) {
        $conditions[] = "brand_Id = '$brand_Id'";
    }
    if (!empty($description)) {
        $conditions[] = "description = '$description'";
    }
    if (!empty($category_id)) {
        $conditions[] = "category_id = '$category_id'";
    }
    if (!empty($barcode)) {
        $conditions[] = "barcode = '$barcode'";
    }

    // Combine conditions with AND operator
    if (!empty($conditions)) {
        $sql .= implode(" AND ", $conditions);

        // Execute the DELETE query
        if ($conn->query($sql)) {
            echo "<h1>Records deleted successfully</h1>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "<h1>Please provide at least one condition for deletion</h1>";
    }
}


?>

<script>

</script>


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
