<?php
$servername = "localhost";
$username = "kali";
$password = "kali";
$dbname = "class";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>