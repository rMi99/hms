<?php


// Connect to your database (replace placeholders with your actual database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cpm_dmc_enc";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    // echo 'failed';
}

 echo 'failed';

?>