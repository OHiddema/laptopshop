<?php

class Db{

    private static $instance;
    private $conn;

    private function __construct($credentials) {

        require($credentials); //contains servername, username and password

        try {
            $conn = new PDO("mysql:host=$servername;dbname=myDBPDO", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        catch(PDOException $e)
            {
            echo "Connection failed: " . $e->getMessage() . "<br>";
            }
            
        $this->conn = $conn;

    }

    public static function connect($credentials) {
       
        if(isset(self::$instance)) {

            return true;

        } else if(self::$instance = new Db($credentials)) {
            
            return true;

        }

    }

    public static function instance() {

        return self::$instance->conn;

    }

}




?> 