<?php
   // session_start();
   session_destroy();

   // redirect
   $page = '?page=homepage.php';
   $host  = $_SERVER['HTTP_HOST'];
   $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
   header("Location: http://$host$uri/$page");
   exit;

?>