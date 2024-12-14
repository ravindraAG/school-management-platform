<?php 

require BASE_PATH . '/core/Model.php';

class ScoreModel extends Model {
    protected $table = 'scores'; // Table name matches the database schema

    public function getAll()
    {
        try {
            $sql = "SELECT * FROM {$this->table} ORDER BY id ASC";
            $stmt = $this->connectDB()->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log($e->getMessage());
            return [];
        }
    }

    public function getGradeById($id)
    {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE id = ?";
            $stmt = $this->connectDB()->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log($e->getMessage());
            return [];
        }
    }

    public function insert($data = [])
    {
        try {
            $sql = "INSERT INTO {$this->table} (student_id, subject_id, term_id, score) VALUES (?, ?, ?, ?)";
            $stmt = $this->connectDB()->prepare($sql);
            return $stmt->execute([$data['student_id'], $data['subject_id'], $data['term_id'], $data['score']]);
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function update($data)
    {
        try {
            $sql = "UPDATE {$this->table} SET student_id=?, subject_id=?, term_id=?, score=? WHERE id = ?";
            $stmt = $this->connectDB()->prepare($sql);
            return $stmt->execute([
                $data['student_id'], $data['subject_id'], $data['term_id'], $data['score'], $data['id']
            ]);
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM {$this->table} WHERE id = ?";
            $stmt = $this->connectDB()->prepare($sql);
            return $stmt->execute([$id]);
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }
}
