<?php

require BASE_PATH . '/core/Model.php';

class StudentModel {
    private $conn;
    protected $table = 'students';

    public $id;
    public $firstName;
    public $lastName;
    public $classId;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Add a new student
    public function createStudent($data) {
        try {
            $query = "INSERT INTO {$this->table} (first_name, last_name, class_id) 
                      VALUES (:first_name, :last_name, :class_id)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':first_name', $data['first_name'], PDO::PARAM_STR);
            $stmt->bindParam(':last_name', $data['last_name'], PDO::PARAM_STR);
            $stmt->bindParam(':class_id', $data['class_id'], PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error creating student: " . $e->getMessage());
            return false;
        }
    }

    // Get all students
    public function getAllStudents() {
        try {
            $query = "SELECT s.*, c.name as class_name 
                      FROM {$this->table} s
                      JOIN classes c ON s.class_id = c.id
                      ORDER BY s.last_name ASC";
            $stmt = $this->conn->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching students: " . $e->getMessage());
            return [];
        }
    }

    // Get a student by ID
    public function getStudentById($id) {
        try {
            $query = "SELECT s.*, c.name as class_name 
                      FROM {$this->table} s
                      JOIN classes c ON s.class_id = c.id
                      WHERE s.id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching student: " . $e->getMessage());
            return [];
        }
    }

    // Update an existing student
    public function updateStudent($data) {
        try {
            $query = "UPDATE {$this->table} 
                      SET first_name = :first_name, last_name = :last_name, class_id = :class_id 
                      WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':first_name', $data['first_name'], PDO::PARAM_STR);
            $stmt->bindParam(':last_name', $data['last_name'], PDO::PARAM_STR);
            $stmt->bindParam(':class_id', $data['class_id'], PDO::PARAM_INT);
            $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error updating student: " . $e->getMessage());
            return false;
        }
    }

    // Delete a student
    public function deleteStudent($id) {
        try {
            $query = "DELETE FROM {$this->table} WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error deleting student: " . $e->getMessage());
            return false;
        }
    }
}
?>
