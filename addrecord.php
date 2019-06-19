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
      echo "New record created successfully<br>";
      }
   catch(PDOException $e)
      {
      echo 'INSERT INTO' . "<br>" . $e->getMessage();
      }
  
   $conn = null;
?>

<br>
<a href="?page=viewall.php">Back</a>