<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Add record</title>
</head>
<body>
<h1>Add laptop</h1>
<hr>
<form action = "?page=addrecord.php" method = "POST">
   Brand: <input type="text" name="brand"><br><br>
   Name: <input type="text" name="name"><br><br>
   Price: <input type = "number" name = "price"><br><br>
   Memory (GB): <input type="number" name="memory" min = "4" max = "32" step = "4"><br><br>
   <input type="submit" value = "add">
</form>
<br>
<a href="?page=viewall.php">Back</a>
</body>
</html>
