<?php
   session_start();
   require_once('connect.php');

   $username = $_POST['username'];
   $password = $_POST['password'];

   try {
      $stmt = $conn->prepare('SELECT * FROM customers WHERE username=:username AND password=:password');
      $stmt->execute(['username' => $username, 'password' => $password]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      if (!$row) {
         session_destroy();
      } else {
         $_SESSION['logged_in_user_id'] = $row['id'];
         $_SESSION['logged_in_user_name'] = $row['username'];
      }
      
      /* Redirect to a different page in the current directory that was requested */
      $host  = $_SERVER['HTTP_HOST'];
      $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
      $extra = '?page=login.php';
      header("Location: http://$host$uri/$extra");
      exit;

   }
   catch(PDOException $e)
      {
      echo 'Error fetching username and password' . "<br>" . $e->getMessage();
      }
  
   $conn = null;
?>