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

<h1>Update laptop</h1>
<hr>
<form action = "?page=updaterecord.php" method = "POST">
   <input type="text", name="id", value="<?= $res['id'] ?>" style="display:none">
   Brand: <input type="text" name="brand" value="<?= $res['brand'] ?>"><br><br>

   Name: <input type="text" name="name" value="<?= $res['name'] ?>"><br><br>
   Price: <input type = "number" name = "price" value="<?= $res['price'] ?>"><br><br>
   Memory (GB): <input type="number" name="memory" min = "4" max = "32" step = "4" value="<?= $res['memory'] ?>"><br><br>
   
   <?php
   $checked = ($res['blnactive']==1) ? 'checked' : '';
   ?>

   Active: <input type = "checkbox" name = "blnactive" value="1" <?= $checked ?>><br><br>

   <?php
   $b = ($res['category']=='B') ? 'selected' : '';
   $a = ($res['category']=='A') ? 'selected' : '';
   $p = ($res['category']=='P') ? 'selected' : '';
   ?>
   
   Category: <select name="category">
   <option value='B' <?=$b?>>Budget</option>
   <option value='A' <?=$a?>>Allround</option>
   <option value='P' <?=$p?>>Professional</option>
   </select><br><br>

   
   <input type="submit" value = "update">
</form>
<br>
<a href="?page=viewall.php">Back</a>