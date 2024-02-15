<?php
$servername = "php25-db-1";
$username = "aopp1";
$password = "password";
$dbname = "aopp1";

//create database connection
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection
if ($conn->connect_error) {
    die("Connection Failed:". $conn->connect_error);
    }

?>