<?php
   require_once('connect.php');
   require_once('mod_functions.php');

   $username = $_POST['username'];
   // Don't allow special characters in username to prevent javascript injections
   if ($username !== htmlspecialchars($username)) {
      redirect('?page=register.php&message=Special characters not allowed in username!');
   }
   
   $email = $_POST['email'];
   $password = password_hash($_POST['pass1'], PASSWORD_DEFAULT);

   try {
      $stmt = $conn->prepare('SELECT * FROM customers WHERE username=:username OR email=:email');
      $stmt->execute(['username' => $username, 'email' => $email]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      if (!$row) {
         // both username and email are new
         $stmt = $conn->prepare('INSERT INTO customers (username, email, password) VALUES (:username, :email, :password)');
         $stmt->execute(['username' => $username, 'email' => $email, 'password' => $password]);
         redirect('?page=login.php');
      } else {
         redirect('?page=register.php&message=Username or email-address already exists!');
      }

      }
   catch(PDOException $e)
      {
      echo 'INSERT INTO customers' . "<br>" . $e->getMessage();
      }
  
   $conn = null;
?>