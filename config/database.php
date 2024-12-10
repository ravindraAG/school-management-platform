<?php 
    class Database {
        private $dsn ="mysql:host=localhost;dbname=School_Management_Platform;"
        private $dbusername = "root";
        private $dbpassword = "";
        public $conn;

        public function dbconnect() {
            $this->conn = null;
            try {
                $this->conn = new PDO($dsn,$dbusername,$dbpassword);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION)
            } catch(PDOException $e) {
                echo "connection failed". $e->getMessage();
            }
            return $this->conn;
        }
        
    }
?>