<h1>Add laptop</h1>
<hr>
<form action = "?page=addrecord.php" method = "POST">
   Brand: <input type="text" name="brand"><br><br>
   Name: <input type="text" name="name"><br><br>
   Price: <input type = "number" name = "price"><br><br>
   Memory (GB): <input type="number" name="memory" min = "4" max = "32" step = "4"><br><br>
   <!-- Active is true by default -->
   Active: <input type = "checkbox" name = "blnactive" value="1" checked><br><br>

   <!-- Add select element for laptop category, Budget is default -->
   <select name='category'>
      <option value="B" selected>Budget</option>
      <option value="A">Allround</option>
      <option value="P">Professional</option>
   </select>
   <br><br>
   <!-- Add select element for laptop category -->

   <input type="submit" value = "add">
</form>
<br>
<a href="?page=viewall.php">Back</a>