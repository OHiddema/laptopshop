<?php
   require_once('connect.php');

   $id = $_POST['id'];
   $brand = $_POST['brand'];
   $name = $_POST['name'];
   $price =  $_POST['price'];
   $memory = $_POST['memory'];

   try {
      $sql = "UPDATE laptops SET brand='" . $brand . "', name='" . $name . 
      "',price='" . $price . "',memory='" . $memory. "' WHERE id='" .  $id . "'";
      $conn->exec($sql);
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