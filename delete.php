<?php
require_once('connect.php');

$id = $_GET['id'];

try {
   $stmt = $conn->prepare('DELETE FROM laptops WHERE id=:id');
   $stmt->execute(['id' => $id]);
   echo "Record deleted successfully";
   }
catch(PDOException $e)
   {
   echo 'DELETE FROM query' . "<br>" . $e->getMessage();
   }
$conn = null;
?>

<br>
<a href="?page=viewall">Back</a>