<?php
   require_once('connect.php');

   $id = $_POST['id'];
   $brand = $_POST['brand'];
   $name = $_POST['name'];
   $price =  $_POST['price'];
   $memory = $_POST['memory'];

   // Set blnzactive to zero (false) is checkbox is unchecked
   $blnactive = (isset($_POST['blnactive'])) ? $_POST['blnactive'] : 0;

   try {
      $stmt = $conn->prepare("UPDATE laptops SET brand=:brand, name=:name, price=:price, memory=:memory, blnactive=:blnactive WHERE id=:id");
      $stmt->execute(['brand' => $brand, 'name' => $name, 'price' => $price, 'memory' => $memory, 'blnactive' => $blnactive, 'id' => $id]);

      echo "Record updated successfully<br>";
      }
   catch(PDOException $e)
      {
      echo $sql . "<br>" . $e->getMessage();
      }
  
   $conn = null;
?>

<br>
<a href="?page=viewall.php">Back</a>