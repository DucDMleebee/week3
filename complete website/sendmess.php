<?php
   session_start();
   if (!$_SESSION['teacher'] || !$_SESSION['student'])
   {
      header('Location: list.php');  
   } else{
      echo $_SESSION['name'].' and '.$_SESSION['user'];
   }
?>