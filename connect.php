<?php
$conn = new mysqli('localhost', 'root', '', 'bkap_test');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>