<h1>All laptops</h1>
<hr>

<?php
require_once('connect.php');
$sql = "SELECT * FROM laptops";
$query = $conn->query($sql);
?>

<button><a href="?page=addpage.php">Add record</a></button><br><br>

<table border ="2">
<tr>
<th>id</th>
<th>brand</th>
<th>name</th>
<th>price</th>
<th>memory</th>
<th>active</th>
<th>category</th>
</tr>


<?php while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>

<tr>
<?php foreach($row as $field) {
   echo "<td>" . $field . "</td>";
}
?>
<td> <button><a href="?page=delete.php&id=<?=$row['id']?>">Delete</a></button></td>
<td> <button><a href="?page=editpage.php&id=<?=$row['id']?>">Edit</a></button></td>
</tr>

<?php } ?>

</table>

<!-- <br>
<a href="?page=homepage.php">Back to main page</a> -->