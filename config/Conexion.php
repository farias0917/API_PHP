<?php
 class Conexion {
    private static $host = "localhost";
    private static $user = "root";
    private static $pass = "Cocolo1717.";
    private static $db = "taskdb";
    private $conn;
    private static $instance = null;

    public function __construct() {
        $server = "mysql:host=".self::$host.";dbname=".self::$db;
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'",
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {
            $this->conn = new PDO($server, self::$user, self::$pass, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    public static function getInstance() {
        if(self::$instance == null){
            self::$instance = new Conexion();
        }

        return self::$instance->conn;
    }
 }
?>