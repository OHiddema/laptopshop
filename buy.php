<?php
   require_once('connect.php');
   session_start();
   $product_id = $_GET['id'];
   $user_id = $_SESSION['logged_in_user_id'];

   var_dump($product_id);
   var_dump($user_id);   
?>