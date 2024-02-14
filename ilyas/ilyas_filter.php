<?php 
include '../header.php';
?>
<form method="post" class="">
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
    <input type="number" name="min_price" min="0">
    <br>
    <label>Max Price:</label>
    <input type="number" name="max_price" min="0">
    <br>
    <label>Country of Origin:</label>
    <input type="text" name="country_of_origin">
    <br>
    <label>Brand Name:</label>
    <input type="text" name="country_of_origin">
    <br>
    <input type="submit" value="Filter">
</form>

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



  

<?php
include 'db_conex.php';

$sql = "SELECT * FROM ilyas_Product";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Brand Name</th><th>Price</th><th>Country of Origin</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["brand_name"] . "</td>";
        echo "<td>" . $row["sale_price"] . "</td>";
        echo "<td>" . $row["country_of_origin"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>





    <?php include '../footer.php'; ?>
    