<?php
   session_start();

   if(session_destroy()) {
      header("Location: ui-login.php");
   }
?>