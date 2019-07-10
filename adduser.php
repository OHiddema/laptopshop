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
      $stmt = $conn->prepare('INSERT INTO customers (username, email, password) VALUES (:username, :email, :password)');
      $stmt->execute(['username' => $username, 'email' => $email, 'password' => $password]);

      //New user is alaways accepted.
      //To do: check if usename or email already exists in customer table
      //If so: redirect to register page

      redirect('?page=login.php');
      }
   catch(PDOException $e)
      {
      echo 'INSERT INTO customers' . "<br>" . $e->getMessage();
      }
  
   $conn = null;
?>