<?php 
session_start();
if(isset($_SESSION['teacher']) || isset($_SESSION['student'])){
    if(!$_SESSION['teacher']){   // only student can access.
        // Redirect them to the  page
        header("Location: playgm.php");  
    }
    else{
        echo 'Creating game (only for teacher)'; 
    }
} else{
    header("Location: login.php");
}
?>