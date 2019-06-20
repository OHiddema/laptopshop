<?php
   require_once('connect.php');

   $username = $_POST['username'];
   $password = $_POST['password'];

   try {
      $stmt = $conn->prepare('SELECT * FROM customers WHERE username=:username AND password=:password');
      $stmt->execute(['username' => $username, 'password' => $password]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      if (!$row) {
         echo "User not found";
      } else {
         session_start();
         $_SESSION['logged_in_user_id'] = $row['id'];
         $_SESSION['logged_in_user_name'] = $row['username'];
         echo "Successfully logged in";
      }
   }
   catch(PDOException $e)
      {
      echo 'Error fetching username and password' . "<br>" . $e->getMessage();
      }
  
   $conn = null;
?>