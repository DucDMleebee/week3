<?php
session_start();
if(!isset($_SESSION['teacher']) || !$_SESSION['teacher']){
   header('Location: login.php');
}
//extract($_POST);
// $con5 = new mysqli("localhost","kali","kali","class");
// if ($con4->connect_error) {
//     die("Connection failed: " . $con5->connect_error);
// }
// $stmt = $con5->prepare("SELECT * FROM student WHERE username = ?");
if($_POST['pass'] != $_POST['cpass'] && !preg_match("/^[a-z\s][0-9]{30}$/",$_POST['pass'])){
    header('Location: addstu.php?status=false');
} else if(!preg_match("/^[a-zA-Z-' ]*$/",$_POST['fullname']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && preg_match("/^[0-9]{10}$/",$_POST['phonenum'])) {
    header('Location: addstu.php');
} else{
    echo "Success";
}
?>
