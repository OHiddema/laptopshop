
<!-- <title>Select all laptops</title> -->

<h1>All laptops</h1>
<hr>

<?php

$sql = "SELECT * FROM laptops";
$query = $conn->query($sql);
?>

<button><a href="?page=addpage">Add record</a></button><br><br>

<table border ="2">
<tr>
<th>id</th>
<th>brand</th>
<th>name</th>
<th>price</th>
<th>memory</th>
</tr>


<?php while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>

<tr>
<?php foreach($row as $field) {
   echo "<td>" . $field . "</td>";
}
?>
<td> <button><a href="?page=delete&amp;id=<?=$row['id']?>">Delete</a></button></td>
<td> <button><a href="?page=editpage&amp;id=<?=$row['id']?>">Edit</a></button></td>
</tr>

<?php } ?>

</table>

<br>
<a href="?page=homepage">Back to main page</a>
