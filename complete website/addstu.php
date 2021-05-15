<?php
   session_start();
   if(!isset($_SESSION['teacher']) || !$_SESSION['teacher']){
      header('Location: login.php');
   } else{
      echo 'Create a student (only for teacher)';
   }
?>
