<?php
require_once('connect.php');

$id = $_GET['id'];

try {
   $stmt = $conn->prepare('SELECT * FROM laptops WHERE id=:id');
   $stmt->execute(['id' => $id]);
   $res = $stmt->fetch();
   }
catch(PDOException $e)
   {
   echo $sql . "<br>" . $e->getMessage();
   }
$conn = null;
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Add record</title>
</head>
<body> -->
<h1>Update laptop</h1>
<hr>
<form action = "?page=updaterecord.php" method = "POST">
   <?php
   echo 'ID: <input type="text", name="id", value="' . $res['id'] . '" readonly> (read-only)<br><br>';
   echo 'Brand: <input type="text" name="brand" value="' . $res['brand'] . '"><br><br>';
   echo 'Name: <input type="text" name="name" value="' . $res['name'] . '"><br><br>';
   echo 'Price: <input type = "number" name = "price" value="' . $res['price'] . '"><br><br>';
   echo 'Memory (GB): <input type="number" name="memory" min = "4" max = "32" step = "4" value="' . $res['memory'] . '"><br><br>';
   ?>
   <input type="submit" value = "update">
</form>
<br>
<a href="?page=viewall.php">Back</a>
<!-- </body>
</html> -->