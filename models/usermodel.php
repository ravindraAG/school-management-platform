<?php
include '../config/database.php';

class User {
    private $conn;

    public $id;
    public $name;
    public $email;
    public $role;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create a new user
    public function createUser($name, $email, $password, $role_id) {
        try {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Hash the password
            $query = "INSERT INTO users (name, email, password, role_id) VALUES (:name, :email, :password, :role_id)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':role_id', $role_id);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error creating user: " . $e->getMessage());
            return false;
        }
    }

    // Delete a user by ID
    public function deleteUser($userId) {
        try {
            $query = "DELETE FROM users WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->rowCount() > 0; // Return true if a row was deleted
        } catch (PDOException $e) {
            error_log("Error deleting user: " . $e->getMessage());
            return false;
        }
    }

    // Authenticate a user by email and password
    public function getUser($email, $password) {
        try {
            $query = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if (password_verify($password, $user['password'])) {
                    return $user;
                } else {
                    return false; // Invalid password
                }
            } else {
                return false; // User not found
            }
        } catch (PDOException $e) {
            error_log("Error fetching user: " . $e->getMessage());
            return false;
        }
    }
}
?>
