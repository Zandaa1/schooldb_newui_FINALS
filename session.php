<?php
   // Start the session
   session_start();

   if(!isset($_SESSION['login_user'])){
      header("location: ui-login.php");
      die();
   }
   $login_session = $_SESSION['login_user'];
   $id = $_SESSION['id'];
   $isStudent = $_SESSION['isStudent'];
   $nickname = $_SESSION['nickname'];
   
?>