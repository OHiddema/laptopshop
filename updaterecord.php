<?php
   require_once('connect.php');

   $id = $_POST['id'];
   $brand = $_POST['brand'];
   $name = $_POST['name'];
   $price =  $_POST['price'];
   $memory = $_POST['memory'];

   try {
      $stmt = $conn->prepare("UPDATE laptops SET brand=:brand, name=:name, price=:price, memory=:memory WHERE id=:id");

      $stmt->bindParam(':brand', $brand);
      $stmt->bindParam(':name', $name);
      $stmt->bindParam(':price', $price);
      $stmt->bindParam(':memory', $memory);
      $stmt->bindParam(':id', $id);
      $stmt->execute();

      echo "Record updated successfully<br>";
      }
   catch(PDOException $e)
      {
      echo $sql . "<br>" . $e->getMessage();
      }
  
   $conn = null;
?>

<br>
<a href="viewall.php">Back</a>