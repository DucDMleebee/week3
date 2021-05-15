<?php
   session_start();
   if (!isset($_SESSION['teacher']) || !isset($_SESSION['student']))
   {
      header('Location: list.php');  
   } else{
      echo $_SESSION['name'].' and '.$_SESSION['user'];
   }
?>
