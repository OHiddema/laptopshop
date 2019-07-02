<h1>Homepage</h1>
<hr>

<?php
   // session_start();
   if(isset($_SESSION['logged_in_user_name'])) {
      echo '<a href="?page=viewall.php">Administrator</a><br><br>';
      echo '<a href="?page=customer.php">Customer</a><br><br>';     
   } else {
      echo '<a href="?page=register.php">Register</a><br><br>';
      echo '<a href="?page=login.php">Login</a><br><br>';
   }
?>

