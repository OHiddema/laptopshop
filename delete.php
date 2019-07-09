<?php
require_once('connect.php');
require_once('mod_functions.php');

$id = $_GET['id'];

try {
   // check if laptop is in basket table, if so prevent deleting it.
   $stmt = $conn->prepare('SELECT * FROM basket WHERE product_id=:id');
   $stmt->execute(['id' => $id]);
   if ($stmt->rowCount()>0) {
      echo alert('Product found in basket. Deletion not allowed!');
   } else {
      $stmt = $conn->prepare('DELETE FROM laptops WHERE id=:id');
      $stmt->execute(['id' => $id]);   
   }
   }
catch(PDOException $e)
   {
   echo $e->getMessage();
   }
$conn = null;

redirect('?page=viewall.php');
?>