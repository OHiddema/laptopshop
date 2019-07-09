<?php
   require_once('mod_functions.php');
   session_start();
   session_destroy();
   redirect('?page=homepage.php');
?>