<?php
require_once('connect.php');

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

// redirect
$page = '?page=viewall.php';
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
echo "<script>window.location = 'http://$host$uri/$page' ;</script>";
exit;
?>