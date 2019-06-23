<?php
   session_start();
   require_once('connect.php');

   $username = $_POST['username'];
   $password = $_POST['password'];

   try {
      $stmt = $conn->prepare('SELECT * FROM customers WHERE username=:username AND password=:password');
      $stmt->execute(['username' => $username, 'password' => $password]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
   }
   catch(PDOException $e)
      {
      echo 'Error fetching username and password' . "<br>" . $e->getMessage();
      }
   $conn = null;

   if (!$row) {
      session_destroy();
      // redirection page
      $page = '?page=login.php';

   } else {
      $_SESSION['logged_in_user_id'] = $row['id'];
      $_SESSION['logged_in_user_name'] = $row['username'];
      // redirection page
      $page = '?page=customer.php';
   }

   // redirect
   $host  = $_SERVER['HTTP_HOST'];
   $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
   header("Location: http://$host$uri/$page");
   exit;
?>