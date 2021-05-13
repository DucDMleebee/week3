<?php
$servername = "localhost";
$username = "kali";
$password = "kali";
$dbname = "class";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>