<?php
   require_once('connect.php');
   require_once('mod_functions.php');

   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['pass1'];

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