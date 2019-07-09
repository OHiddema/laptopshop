<h1>All laptops</h1>
<hr>

<?php
require_once('connect.php');
$sql = "SELECT * FROM laptops";
$query = $conn->query($sql);
?>

<a class="btn btn-primary" href="?page=addpage.php" role="button">Add new</a><br><br>

<table class="table table-sm table-striped table-nonfluid" border ="2">
<tr>
<th>id</th>
<th>brand</th>
<th>name</th>
<th>price</th>
<th>memory</th>
<th>active</th>
<th>category</th>
<th>delete</th>
<th>edit</th>
</tr>

<?php
$numberNames = array("id", "price", "memory", "blnactive");

while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>

<tr>
<?php foreach($row as $key => $field) {
   if (in_array($key, $numberNames)) {
      echo "<td class='number'>" . $field . "</td>";
   } else echo "<td>" . $field . "</td>";
}
?>
<td> <button><a href="delete.php?id=<?=$row['id']?>"><i class="fas fa-trash-alt"></i></a></button></td>
<td> <button><a href="?page=editpage.php&id=<?=$row['id']?>"><i class="fas fa-edit"></i></a></button></td>
</tr>

<?php } ?>

</table>

<!-- <br>
<a href="?page=homepage.php">Back to main page</a> -->