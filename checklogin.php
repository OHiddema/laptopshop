<?php
   session_start();
   require_once('connect.php');
   require_once('mod_functions.php');

   $username = htmlspecialchars($_POST['username']);
   $password = $_POST['password'];

   try {
      $stmt = $conn->prepare('SELECT * FROM customers WHERE username=:username');
      $stmt->execute(['username' => $username]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
   }
   catch(PDOException $e)
      {
      echo 'Error fetching username' . "<br>" . $e->getMessage();
      }
   $conn = null;

   if (!$row) {
      // username not found
      session_destroy();
      $page = '?page=login.php&message=Invalid username or password';

   } else {
      if (password_verify($password, $row['password'])) {
      $_SESSION['logged_in_user_id'] = $row['id'];
      $_SESSION['logged_in_user_name'] = $row['username'];
      $page = '?page=homepage.php';
      } else {
         // invalid password
         session_destroy();
         $page = '?page=login.php&message=Invalid username or password';
      }
   }

   redirect($page);
?>