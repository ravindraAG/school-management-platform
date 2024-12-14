<?php

    require BASE_PATH . '/config/config.php';

    class Model {
        protected $table;

        function __construct() {}

        protected function connectDB() {
            try {
                $pdo = new PDO(
                    'mysql:host=' . DB_HOST . ':dbname=' . DB_NAME,
                    DB_USER,
                    DB_PASS
                );

                return $pdo;
            } catch (PDOException $e) { 
                echo $e->getMessage();
            }
        }
    }