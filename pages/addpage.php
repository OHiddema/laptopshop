<h1>Add laptop</h1>
<hr>
<form action = "?page=addrecord" method = "POST">
   Brand: <input type="text" name="brand"><br><br>
   Name: <input type="text" name="name"><br><br>
   Price: <input type = "number" name = "price"><br><br>
   Memory (GB): <input type="number" name="memory" min = "4" max = "32" step = "4"><br><br>
   <input type="submit" value = "add">
</form>
<br>
<a href="?page=viewall">Back</a>

