
<!-- <title>Select all laptops</title> -->

<h1>All laptops</h1>
<hr>

<a class="button" href="?page=addpage">Add record</a><br><br>

<table border ="2">
<tr>
<th>id</th>
<th>brand</th>
<th>name</th>
<th>price</th>
<th>memory</th>
</tr>

<?php foreach(allRecords() as $record):?>

<tr>
   <?php foreach($record as $field):?> 
   <td><?=$field;?></td>
   <?php endforeach;?>
   <td> <a class="button" href="?page=delete&amp;id=<?=$record['id']?>">Delete</a></td>
   <td> <a class="button" href="?page=editpage&amp;id=<?=$record['id']?>">Edit</a></td>
</tr>
        
<?php endforeach;?>

</table>

<br>
<a href="?page=homepage">Back to main page</a>