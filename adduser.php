<?php
   require_once('connect.php');

   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['pass1'];

   try {
      $stmt = $conn->prepare('INSERT INTO customers (username, email, password) VALUES (:username, :email, :password)');
      $stmt->execute(['username' => $username, 'email' => $email, 'password' => $password]);
      echo "New record created successfully<br>";
      }
   catch(PDOException $e)
      {
      echo 'INSERT INTO customers' . "<br>" . $e->getMessage();
      }
  
   $conn = null;
?>