<?php
    include_once "config/Conexion.php";

    class category {
        private $conn;
        // private $name; 
        public function __construct() {
            $this->conn = Conexion::getInstance();
        }

        public function getCategories (){
            $query = "SELECT * FROM category";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }
    }
?>