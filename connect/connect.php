<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tim_nha_tro";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
date_default_timezone_set('Asia/Bangkok');
?>