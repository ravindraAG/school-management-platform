<?php 
class ScoreModel {
    private $conn;
    protected $table = 'scores';

    public $id;
    public $score;
    public $subjectId;
    public $termId;
    public $studentId;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Record a new score
    public function recordScore($subjectId, $score, $termId, $studentId) {
        try {
            $query = "INSERT INTO {$this->table} (student_id, subject_id, term_id, score) 
                      VALUES (:student_id, :subject_id, :term_id, :score)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':student_id', $studentId, PDO::PARAM_INT);
            $stmt->bindParam(':subject_id', $subjectId, PDO::PARAM_INT);
            $stmt->bindParam(':term_id', $termId, PDO::PARAM_INT);
            $stmt->bindParam(':score', $score, PDO::PARAM_STR);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error recording score: " . $e->getMessage());
            return false;
        }
    }

    // Update an existing score
    public function updateScore($id, $subjectId, $score, $termId, $studentId) {
        try {
            $query = "UPDATE {$this->table} 
                      SET student_id = :student_id, subject_id = :subject_id, 
                          term_id = :term_id, score = :score 
                      WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':student_id', $studentId, PDO::PARAM_INT);
            $stmt->bindParam(':subject_id', $subjectId, PDO::PARAM_INT);
            $stmt->bindParam(':term_id', $termId, PDO::PARAM_INT);
            $stmt->bindParam(':score', $score, PDO::PARAM_STR);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error updating score: " . $e->getMessage());
            return false;
        }
    }

    // Delete a score
    public function deleteScore($id) {
        try {
            $query = "DELETE FROM {$this->table} WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error deleting score: " . $e->getMessage());
            return false;
        }
    }

    // Get all scores for a specific student
    public function getScoreByStudent($studentId) {
        try {
            $query = "SELECT * FROM {$this->table} WHERE student_id = :student_id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':student_id', $studentId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching scores for student: " . $e->getMessage());
            return [];
        }
    }

    // OPTIONAL: Get scores for a specific term (if needed)
    public function getScoresByTerm($termId) {
        try {
            $query = "SELECT * FROM {$this->table} WHERE term_id = :term_id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':term_id', $termId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching scores by term: " . $e->getMessage());
            return [];
        }
    }
}
?>
