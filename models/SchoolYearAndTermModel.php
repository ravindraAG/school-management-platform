<?php

require BASE_PATH . '/core/Model.php';

class SchoolYearAndTermModel {
    private $conn;
    protected $schoolYearTable = 'school_year';
    protected $termTable = 'terms';

    public function __construct($db) {
        $this->conn = $db;
    }

    // School Year Functions

    // Add a new school year
    public function createSchoolYear($data) {
        try {
            $query = "INSERT INTO {$this->schoolYearTable} (year) VALUES (:year)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':year', $data['year'], PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error creating school year: " . $e->getMessage());
            return false;
        }
    }

    // Get all school years
    public function getAllSchoolYears() {
        try {
            $query = "SELECT * FROM {$this->schoolYearTable} ORDER BY year ASC";
            $stmt = $this->conn->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching school years: " . $e->getMessage());
            return [];
        }
    }

    // Update an existing school year
    public function updateSchoolYear($data) {
        try {
            $query = "UPDATE {$this->schoolYearTable} SET year = :year WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':year', $data['year'], PDO::PARAM_INT);
            $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error updating school year: " . $e->getMessage());
            return false;
        }
    }

    // Delete a school year
    public function deleteSchoolYear($id) {
        try {
            $query = "DELETE FROM {$this->schoolYearTable} WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error deleting school year: " . $e->getMessage());
            return false;
        }
    }

    // Term Functions

    // Add a new term
    public function createTerm($data) {
        try {
            $query = "INSERT INTO {$this->termTable} (name, school_year_id) VALUES (:name, :school_year_id)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':name', $data['name'], PDO::PARAM_STR);
            $stmt->bindParam(':school_year_id', $data['school_year_id'], PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error creating term: " . $e->getMessage());
            return false;
        }
    }

    // Get terms by school year ID
    public function getTermsBySchoolYear($yearId) {
        try {
            $query = "SELECT * FROM {$this->termTable} WHERE school_year_id = :school_year_id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':school_year_id', $yearId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching terms: " . $e->getMessage());
            return [];
        }
    }

    // Update an existing term
    public function updateTerm($data) {
        try {
            $query = "UPDATE {$this->termTable} SET name = :name, school_year_id = :school_year_id WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':name', $data['name'], PDO::PARAM_STR);
            $stmt->bindParam(':school_year_id', $data['school_year_id'], PDO::PARAM_INT);
            $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error updating term: " . $e->getMessage());
            return false;
        }
    }

    // Delete a term
    public function deleteTerm($id) {
        try {
            $query = "DELETE FROM {$this->termTable} WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error deleting term: " . $e->getMessage());
            return false;
        }
    }
}
?>
