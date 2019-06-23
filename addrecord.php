<?php
   require_once('connect.php');

   $brand = $_POST['brand'];
   $name = $_POST['name'];
   $price =  $_POST['price'];
   $memory = $_POST['memory'];

   // Set blnzactive to zero (false) is checkbox is unchecked
   $blnactive = (isset($_POST['blnactive'])) ? $_POST['blnactive'] : 0;

   $category = $_POST['category'];

   try {
      $stmt = $conn->prepare('INSERT INTO laptops (brand, name, price, memory, blnactive, category) VALUES (:brand, :name, :price, :memory, :blnactive, :category)');
      $stmt->execute(['brand' => $brand, 'name' => $name, 'price' => $price, 'memory' => $memory, 'blnactive' => $blnactive, 'category' => $category]);
      }
   catch(PDOException $e)
      {
      echo 'INSERT INTO' . "<br>" . $e->getMessage();
      }
  
   $conn = null;

   // redirect
   $page = '?page=viewall.php';
   $host  = $_SERVER['HTTP_HOST'];
   $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
   header("Location: http://$host$uri/$page");
   exit;
?>