<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Select all laptops</title>
</head>
<body>
<h1>All laptops</h1>
<hr>

<?php
require_once('connect.php');
$sql = "SELECT * FROM laptops";
$query = $conn->query($sql);
?>

<table border ="2">
<tr>
<th>id</th>
<th>name</th>
</tr>


<?php while ($row = $query->fetch()) { ?>

<tr>
<td><?php echo $row['id'];?></td>
<td><?php echo $row['brand'];?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['price']; ?></td>
<td><?php echo $row['memory']; ?></td>
</tr>

<?php } ?>

</table>
</body>
</html>