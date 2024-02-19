<?php
include '../header.php';
include 'db_conex.php';

// Fetch all records from the database
$sql = "SELECT * FROM ilyas_Product";
$result = $conn->query($sql);
?>

<div class="container">
    <h1>Delete Data</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Brand Name</th>
                <th>Sale Price</th>
                <th>Country of Origin</th>
                <th>Category</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Display each record in a table row
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["brand_name"] . "</td>";
                    echo "<td>" . $row["sale_price"] . "</td>";
                    echo "<td>" . $row["country_of_origin"] . "</td>";
                    echo "<td>" . $row["category_name"] . "</td>";
                    echo "<td>" . $row["product_name"] . "</td>";
                    echo "<td>" . $row["description"] . "</td>";
                    echo "<td><form method='post'><input type='hidden' name='product_Id' value='" . $row["product_Id"] . "'><input type='submit' name='submit_delete' value='Delete' class='btn btn-danger'></form></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
// Check if form is submitted for deletion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_delete'])) {
    // Retrieve the product_ID of the record to delete
    $product_Id = $_POST['product_Id'];

    // Construct the DELETE query
    $sql = "DELETE FROM ilyas_Product WHERE product_Id='$product_Id'";

    // Execute the DELETE query
    if ($conn->query($sql)) {
        echo "<h1>Record deleted successfully</h1>";
        // Refresh the page to reflect the changes
        echo "<meta http-equiv='refresh' content='0'>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php include '../footer.php'; ?>
