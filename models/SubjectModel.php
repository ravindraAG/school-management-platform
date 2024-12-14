<?php

require BASE_PATH . '/core/Model.php';

class SubjectModel {
    private $conn;
    protected $table = 'subjects';

    public $id;
    public $name;
    public $gradeId;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Add a new subject
    public function createSubject($data) {
        try {
            $query = "INSERT INTO {$this->table} (name, grade_id) 
                      VALUES (:name, :grade_id)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':name', $data['name'], PDO::PARAM_STR);
            $stmt->bindParam(':grade_id', $data['grade_id'], PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error creating subject: " . $e->getMessage());
            return false;
        }
    }

    // Get all subjects
    public function getAllSubjects() {
        try {
            $query = "SELECT s.*, g.name as grade_name 
                      FROM {$this->table} s
                      JOIN grades g ON s.grade_id = g.id
                      ORDER BY s.name ASC";
            $stmt = $this->conn->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching subjects: " . $e->getMessage());
            return [];
        }
    }

    // Get a subject by ID
    public function getSubjectById($id) {
        try {
            $query = "SELECT s.*, g.name as grade_name 
                      FROM {$this->table} s
                      JOIN grades g ON s.grade_id = g.id
                      WHERE s.id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching subject: " . $e->getMessage());
            return [];
        }
    }

    // Update an existing subject
    public function updateSubject($data) {
        try {
            $query = "UPDATE {$this->table} 
                      SET name = :name, grade_id = :grade_id 
                      WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':name', $data['name'], PDO::PARAM_STR);
            $stmt->bindParam(':grade_id', $data['grade_id'], PDO::PARAM_INT);
            $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error updating subject: " . $e->getMessage());
            return false;
        }
    }

    // Delete a subject
    public function deleteSubject($id) {
        try {
            $query = "DELETE FROM {$this->table} WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error deleting subject: " . $e->getMessage());
            return false;
        }
    }
}
?>
