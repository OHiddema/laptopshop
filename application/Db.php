<?php

class Db{

    private static $instance;
    private $conn;

    private function __construct($credentials) {

        require($credentials); //contains servername, username and password

        if(!$this->conn = new PDO("mysql:host=$servername;dbname=myDBPDO", $username, $password)) {

            echo "Connection failed: " . $e->getMessage() . "<br>";

        }

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