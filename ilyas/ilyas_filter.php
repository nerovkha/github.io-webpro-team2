<?php 
include '../header.php';
include 'db_conex.php';
if(isset($_POST['submit'])) {
   

    $category = $_POST['category'];
    $min_price = $_POST['min_price'];
    $max_price = $_POST['max_price'];
    $country_of_origin = $_POST['country_of_origin'];
    $product_name = $_POST['product_name'];
    $brand_name = $_POST['brand_name'];

    // Build the SQL query based on the user's input
    $sql = "SELECT * FROM ilyas_Product WHERE 1=1";
    if (!empty($category)) {
        $sql .= " AND category_name = '$category'";
    }
    if (!empty($min_price)) {
        $sql .= " AND sale_price >= $min_price";
    }
    if (!empty($max_price)) {
        $sql .= " AND sale_price <= $max_price";
    }
    if (!empty($country_of_origin)) {
        $sql .= " AND country_of_origin = '$country_of_origin'";
    }
    if (!empty($product_name)) {
        $sql .= " AND product_name LIKE '%$product_name%'";
    }
    if (!empty($brand_name)) {
        $sql .= " AND brand_name = '$brand_name'";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table table-bordered'>";
        echo "<thead class='thead-dark'><tr><th>Brand Name</th><th>Price</th><th>Country of Origin</th><th>Product Name</th><th>Category Name</th></tr></thead>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["brand_name"] . "</td>";
            echo "<td>" . $row["sale_price"] . "</td>";
            echo "<td>" . $row["country_of_origin"] . "</td>";
            echo "<td>". $row["product_name"] . "</td>";
            echo "<td>". $row["category_name"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<h1>0 results</h1>";
    }

    $conn->close();
}

?>





<style>
    #table-container {
        float: right;
        width: 50%;
    }

    h1 {
            text-align: center; /* Center align the <h1> element */
        }
</style>




<h1>Enter what you are looking for.</h1>
<form method="post" name="filter_form" class="" action="">
    <label>Category:</label>
    <select name="category">
        <option value="">All</option>
        <option value="Vegetables">Vegetables</option>
        <option value="Baked Goods">Baked Goods</option>
        <option value="Drinks">Drinks</option>
        <option value="Eggs and Diary">Eggs and Diary</option>
    </select>
    <br>
    <label>Min Price:</label>
    <input type="number" name="min_price" minlength="0">
    <br>
    <label>Max Price:</label>
    <input type="number" name="max_price" maxlength="999">
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
    <input type="submit" name="submit" value="Filter">
</form>

<script>
        function validateForm() {
            var category = document.forms["filter_form"]["category"].value;
            var minPrice = document.forms["filter_form"]["min_price"].value;
            var maxPrice = document.forms["filter_form"]["max_price"].value;

            // Validate category
            if (category === "") {
                alert("Please select a category.");
                return false;
            }

            // Validate minPrice
            if (minPrice !== "" && isNaN(minPrice)) {
                alert("Min Price must be a number.");
                return false;
            }

            // Validate maxPrice
            if (maxPrice !== "" && isNaN(maxPrice)) {
                alert("Max Price must be a number.");
                return false;
            }

            // Additional validation can be added for other fields if needed

            return true;
        }
    </script>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
    h1{
        color: #FF3F00;
        content: 10px;
        
    }
    .table {
        float: right;
        width: 50%;
        length: 50%;
        height: 10;
        

    }


</style>


<?php  include '../footer.php' ?>