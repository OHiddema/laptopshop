<form method="POST" action="checklogin.php">
   Username: <input type="text" name="username" id="username"><br><br>
   Password: <input type="password" name="password" id="password"><br><br>
   <button type="submit">Login</button>
</form>

<div id='loginresult'>
   <?php
      session_start();
      if (isset($_SESSION['logged_in_user_name'])) {
         echo "Logged in user: ".$_SESSION['logged_in_user_name'];
      } else {
         echo "No user is logged in.";
      }
   ?>
</div>