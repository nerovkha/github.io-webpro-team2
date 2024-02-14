<?php

$servername = "php24-db-1";
$username = "app1";
$password = "password";
$dbname = "app1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
