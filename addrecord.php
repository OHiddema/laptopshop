<?php
   require_once('connect.php');

   $brand = htmlspecialchars($_POST['brand']);
   $name = htmlspecialchars($_POST['name']);
   $price =  htmlspecialchars($_POST['price']);
   $memory = htmlspecialchars($_POST['memory']);

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
   echo "<script>window.location = 'http://$host$uri/$page' ;</script>";
   exit;
?>