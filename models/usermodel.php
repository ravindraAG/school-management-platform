<?php
    include '../config/database.php'
//tables can be role table (rolename and role id )and user table (name,email,password,role id)
    class User {
        private $conn;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function createUser($name,$email,$password,$role_id,$db) {
            try {
                $query = "INSERT INTO users (name, email, password, role_id) VALUES (:name, :email, :password ,:role_id)";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $password);
                $stmt->bindParam(':role_id', $role_id);
                $stmt->execute();
                echo "User Create!";
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        public function deletUser($userId) {
            try {
                $query = "DELETE FROM users WHERE id = :id";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParm(':id', $userId, PDO::PARAM_INT);
                $stmt->execute();

                if ($stmt->rowCount()>0) {
                    echo "User deleted successfully!";
                } else {
                    echo "No user found with the given ID.";
                }
            } catch (PDOExeption $e) {
                echo " Error deleting user: " . $e->getMessage();
            }
        }

        public function getUser($eail, $password) {
            try {
                //fetch user by email
                $query = "SELECT * FROM users WHERE email = :email";
                $stmt =$this->conn->prepare($query);
                $stmt->bindParam(':email', $email);
                $stmt->execute();

                //user existence check
                if ($stmt->rowCount()>0) {
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                    if (pasword_verify($password, user['password'])) {
                        return $user;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                echo "Error: ". $e->getMessage();
                return false;
            }

        }


    }
?>