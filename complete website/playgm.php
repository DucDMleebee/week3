<?php
session_start();
if(isset($_SESSION['teacher']) || isset($_SESSION['student'])){
    if(!$_SESSION['student']){   // only student can access.
        // Redirect them to the  page
        header("Location: creategm.php");  
    }
    else{
        echo 'Playing game (only for student)';
    }
} else{
    header("Location: login.php");
} 
?>