<?php
require_once('connect.php');

// var_dump($_GET);
// echo $_GET['id'];

try {
   $sql = "DELETE FROM laptops WHERE id=" . $_GET['id'];
   // use exec() because no results are returned
   $conn->exec($sql);
   echo "Record deleted successfully";
   }
catch(PDOException $e)
   {
   echo $sql . "<br>" . $e->getMessage();
   }
$conn = null;
?>

<br>
<a href="viewall.php">Back</a>