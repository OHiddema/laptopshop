<h1>Login</h1>
<hr>
<form method="POST" action="checklogin.php">
   Username: <input type="text" name="username" id="username"><br><br>
   Password: <input type="password" name="password" id="password"><br><br>
   <button type="submit">Login</button>
</form>

<div id='loginresult'>
   <?php
      // session_start();
      if (isset($_SESSION['logged_in_user_name'])) {
         echo "Logged in user: ".$_SESSION['logged_in_user_name']."<br><br>";
         // Only enable going to the sore on successfull login
         echo "<a href='?page=customer.php'>Go to store</a>";
      } else {
         echo "No user is logged in.";
      }
   ?>
</div>