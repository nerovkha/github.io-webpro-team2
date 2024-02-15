<?php

$servername = "php24-db-1";
$username = "root";
$password = "password";
$dbname = "app1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
