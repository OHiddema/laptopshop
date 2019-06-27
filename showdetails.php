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

   // show product details
   echo "<h3>Product details:</h3>";
   echo 'Brand: ' . $res['brand'] . '<br>';
   echo 'Name: ' . $res['name'] . '<br>';
   echo 'Price: ' . $res['price'] . '<br>';
   echo 'Memory: ' . $res['memory'] . '<br>';
?>
<form action = "?page=addtobasket.php" method = "POST">
   <?php
      echo '<input type="hidden", name="id", value="' . $res['id'] . '">';
      echo 'Quantity: <input type="number" name="amount" min="1", step="1", value="1"><br><br>';
   ?>
   <input type="submit" value = "Add to basket">
</form>