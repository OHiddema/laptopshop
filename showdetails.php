<?php
   require_once('connect.php');
   $product_id = $_GET['id'];
   $username = $_SESSION['logged_in_user_name'];

   try {
      $stmt = $conn->prepare('SELECT * FROM laptops WHERE id=:id');
      $stmt->execute(['id' => $product_id]);
      $res = $stmt->fetch();
      }
   catch(PDOException $e)
      {
      echo $sql . "<br>" . $e->getMessage();
      }
   $conn = null;
?>

<!-- show product details -->

<h1>Product details</h1>
<hr>

<table class="table table-sm table-nonfluid" border ="2">
   <tr>
      <td>Brand</td>
      <td><?= $res['brand'] ?></td>
   </tr>
   <tr>
      <td>Name</td>
      <td><?= $res['name'] ?></td>
   </tr>
   <tr>
      <td>Price</td>
      <td><?= $res['price'] ?></td>
   </tr>
   <tr>
      <td>Memory</td>
      <td><?= $res['memory'] ?></td>
   </tr>
</table>

<form action = "?page=addtobasket.php" method = "POST">
   <input type="hidden", name="id", value="<?= $res['id'] ?>">
   Quantity: <input type="number" name="amount" min="1", step="1", value="1"><br><br>
   <input type="submit" value = "Add to basket">
</form>

<br>
<a href="?page=customer.php">Back to shop</a>