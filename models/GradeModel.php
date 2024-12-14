<?php 

require BASE_PATH . '/core/Model.php';

class GradesModel extends Model
{
    protected $table = 'grades'; // Table name matches the database schema

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
            $sql = "INSERT INTO {$this->table} (name) VALUES (?)";
            $stmt = $this->connectDB()->prepare($sql);
            return $stmt->execute([$data['name']]);
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function update($data)
    {
        try {
            $sql = "UPDATE {$this->table} SET name = ? WHERE id = ?";
            $stmt = $this->connectDB()->prepare($sql);
            return $stmt->execute([
                $data['name'], $data['id']
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
