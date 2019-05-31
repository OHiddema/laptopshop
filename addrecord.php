<?php
   require_once('connect.php');

   $brand = $_POST['brand'];
   $name = $_POST['name'];
   $price =  $_POST['price'];
   $memory = $_POST['memory'];

   try {
      $stmt = $conn->prepare('INSERT INTO laptops (brand, name, price, memory) VALUES (:brand, :name, :price, :memory)');
      $stmt->execute(['brand' => $brand, 'name' => $name, 'price' => $price, 'memory' => $memory]);
      echo "New record created successfully<br>";
      }
   catch(PDOException $e)
      {
      echo 'INSERT INTO' . "<br>" . $e->getMessage();
      }
  
   $conn = null;
?>

<br>
<a href="index.php">Back</a>