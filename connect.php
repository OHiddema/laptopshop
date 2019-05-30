<?php
require_once('secret.php'); //contains servername, username and password

try {
    $conn = new PDO("mysql:host=$servername;dbname=myDBPDO", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage() . "<br>";
    }
?> 