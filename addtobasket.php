<?php
   require_once('connect.php');
   session_start();

   $product_id = $_POST['id'];
   $amount = $_POST['amount'];
   $customer_id =  $_SESSION['logged_in_user_id'];

   try {
      $stmt = $conn->prepare('INSERT INTO basket (product_id, amount, customer_id) VALUES (:product_id, :amount, :customer_id)');
      $stmt->execute(['product_id' => $product_id, 'amount' => $amount, 'customer_id' => $customer_id]);
      echo "Basket filled successfully<br>";
      }
   catch(PDOException $e)
      {
      echo 'INSERT INTO' . "<br>" . $e->getMessage();
      }
  
   $conn = null;
?>

<br>
<a href="?page=customer.php">Back</a>