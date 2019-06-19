<?php
   require_once('connect.php');

   $brand = $_POST['brand'];
   $name = $_POST['name'];
   $price =  $_POST['price'];
   $memory = $_POST['memory'];

   // Set blnzactive to zero (false) is checkbox is unchecked
   $blnactive = (isset($_POST['blnactive'])) ? $_POST['blnactive'] : 0;


   try {
      $stmt = $conn->prepare('INSERT INTO laptops (brand, name, price, memory, blnactive) VALUES (:brand, :name, :price, :memory, :blnactive)');
      $stmt->execute(['brand' => $brand, 'name' => $name, 'price' => $price, 'memory' => $memory, 'blnactive' => $blnactive]);
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