<?php 
session_start();
if (!isset($_SESSION['teacher']) || !isset($_SESSION['student']))
{
    header('Location: list.php');  
} 
else{
    // echo $_SESSION['id'].' and '.$_SESSION['user'].' and '.$_POST['message'];
    $con8 = new mysqli("localhost","kali","kali","class");
    if ($con8->connect_error) {
        die("Connection failed: " . $con8->connect_error);
    }
    $con9 = new mysqli("localhost","kali","kali","message");
    if ($con9->connect_error) {
        die("Connection failed: " . $con9->connect_error);
    }
    
}

?>
