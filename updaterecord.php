<?php
   require_once('connect.php');
   require_once('mod_functions.php');

   $id = $_POST['id'];
   $brand = htmlspecialchars($_POST['brand']);
   $name = htmlspecialchars($_POST['name']);
   $price =  htmlspecialchars($_POST['price']);
   $memory = htmlspecialchars($_POST['memory']);

   // Set blnactive to zero (false) is checkbox is unchecked
   $blnactive = (isset($_POST['blnactive'])) ? $_POST['blnactive'] : 0;

   $category = $_POST['category'];

   try {
      $stmt = $conn->prepare("UPDATE laptops SET brand=:brand, name=:name, price=:price, memory=:memory, blnactive=:blnactive, category=:category WHERE id=:id");
      $stmt->execute(['brand' => $brand, 'name' => $name, 'price' => $price, 'memory' => $memory, 'blnactive' => $blnactive, 'category' => $category, 'id' => $id]);
      }
   catch(PDOException $e)
      {
      echo $sql . "<br>" . $e->getMessage();
      }
  
   $conn = null;

   redirect('?page=viewall.php');
?>