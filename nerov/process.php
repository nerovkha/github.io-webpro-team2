<?php
// Check if the 'submit' button in the form was clicked
if (isset($_POST['submit'])) {
    // Retrieve data from the form and store it in variables
    // $fname = $_POST['fname'];     // First name
    // $lname = $_POST['lname'];     // Last name
    // $city = $_POST['city'];       // City
    // $groupid = $_POST['groupid']; // Group ID

 $promotionID = $_POST['promotion_id'];


    // Include the database connection file
    include 'db.php';

    // Define an SQL query to insert data into the 'studentsinfo' table
    $sql = "insert into Nerov_Promotions(promotion_id)
            values('$promotionID')";
  
    // Execute the SQL query using the database connection
    if ($conn->query($sql) === TRUE) {
        // If the query was successful, display a success message
        echo "promotions update has been sent to your email";
    } else {
        // If there was an error in the query, display an error message
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>