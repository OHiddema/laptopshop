<?php
   require_once('connect.php');

   $brand = $_POST['brand'];
   $name = $_POST['name'];
   $price =  $_POST['price'];
   $memory = $_POST['memory'];

   try {
      $sql = "INSERT INTO laptops (brand, name, price, memory) VALUES ('$brand', '$name', '$price', '$memory')";
      $conn->exec($sql);
      echo "New record created successfully<br>";
      }
  catch(PDOException $e)
      {
      echo $sql . "<br>" . $e->getMessage();
      }
  
  $conn = null;
?>

<br>
<a href="index.php">Back</a>