<?php
   session_start();
   require_once('connect.php');

   $product_id = $_POST['id'];
   $amount = $_POST['amount'];
   $customer_id =  $_SESSION['logged_in_user_id'];

   try {

      // First, check if product_id already exists
      $stmt = $conn->prepare('SELECT * FROM basket WHERE customer_id=:customer_id AND product_id=:product_id');
      $stmt->execute(['customer_id' => $customer_id, 'product_id' => $product_id]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      if (!$row) {
         // product_id does not exist => INSERT
         $stmt = $conn->prepare('INSERT INTO basket (product_id, amount, customer_id) VALUES (:product_id, :amount, :customer_id)');
         $stmt->execute(['product_id' => $product_id, 'amount' => $amount, 'customer_id' => $customer_id]);
         //echo "Insert successfully<br>";
      } else {
         // product_id does exist => UPDATE
         $amount += $row['amount'];
         $stmt = $conn->prepare("UPDATE basket SET amount=:amount WHERE product_id=:product_id AND customer_id=:customer_id");
         $stmt->execute(['amount' => $amount, 'product_id' => $product_id, 'customer_id' => $customer_id]);
         //echo "Update successfully<br>";
      }
      }
   catch(PDOException $e)
      {
      echo 'INSERT INTO' . "<br>" . $e->getMessage();
      }
  
   $conn = null;

   // Redirect to shop
   $page = '?page=customer.php';
   $host  = $_SERVER['HTTP_HOST'];
   $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
   header("Location: http://$host$uri/$page");
   exit;
?>