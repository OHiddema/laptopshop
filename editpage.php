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
   <!-- id not displayed, but necessary to put in form, for POST -->
   <input type="text", name="id", value="<?= $res['id'] ?>" style="display:none">

   <div class="form-group row">
      <label for="brand" class="col-sm-2 col-form-label">Brand:</label>
      <div class="col-sm-6">
         <input type="text" class="form-control form-control-sm" id="brand" name="brand" value="<?= $res['brand'] ?>">
      </div>
   </div>

   <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label">Name:</label>
      <div class="col-sm-6">
         <input type="text" class="form-control form-control-sm" id="name" name="name" value="<?= $res['name'] ?>">
      </div>
   </div>

   <div class="form-group row">
      <label for="price" class="col-sm-2 col-form-label">Price:</label>
      <div class="col-sm-6">
         <input type="number" class="form-control form-control-sm" id="price" name="price" value="<?= $res['price'] ?>">
      </div>
   </div>

   <div class="form-group row">
      <label for="memory" class="col-sm-2 col-form-label">Memory (GB):</label>
      <div class="col-sm-6">
         <input type="number" class="form-control form-control-sm" id="memory" name="memory" min = "4" max = "32" step = "4" value="<?= $res['memory'] ?>">
      </div>
   </div>
   
   <?php
   $checked = ($res['blnactive']==1) ? 'checked' : '';
   ?>

   <div class="form-group row">
      <label for="blnactive" class="col-sm-2 col-form-label">Active:</label>
      <div class="col-sm-1">
         <input type="checkbox" class="form-control form-control-sm" id="blnactive" name="blnactive" value="1" <?= $checked ?>>
      </div>
   </div>

   <?php
   $b = ($res['category']=='B') ? 'selected' : '';
   $a = ($res['category']=='A') ? 'selected' : '';
   $p = ($res['category']=='P') ? 'selected' : '';
   ?>
   
   <div class="form-group row">
      <label for="sel1" class="col-sm-2 col-form-label">Category:</label>
      <div class="col-sm-6">
         <select class="form-control form-control-sm" id="category" name="category">
               <option value="B" <?=$b?>>Budget</option>
               <option value="A" <?=$a?>>Allround</option>
               <option value="P" <?=$p?>>Professional</option>
            </select>
         </div>
   </div> 

   <input type="submit" value = "update">
</form>
<br>
<a href="?page=viewall.php">Back</a>