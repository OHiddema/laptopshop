<?php
   require_once('connect.php');

   $username = $_POST['username'];
   $password = $_POST['password'];

   try {
      $stmt = $conn->prepare('SELECT COUNT(*) FROM customers WHERE username=:username AND password=:password');
      $stmt->execute(['username' => $username, 'password' => $password]);
      if ($stmt->fetchColumn()>0) {
         echo "Successfully logged in";
      } else {
         echo "User not found";
      }
   }
   catch(PDOException $e)
      {
      echo 'Error fetching username and password' . "<br>" . $e->getMessage();
      }
  
   $conn = null;
?>