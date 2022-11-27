<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "projek";

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
}
// echo "Connected successfully";