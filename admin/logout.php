<?php
// logout and destroying session
   session_start();
   session_destroy();

   header("location:index.php");

?>