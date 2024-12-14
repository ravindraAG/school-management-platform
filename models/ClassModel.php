<?php 

    require BASE_PATH . '/core/Model.php';
    class SchoolClassModel extends Model {

        function __construct($table = 'classes') {
            $this->table = $table;
        }

        public function getAll() {
            $conn = $this->connectDB();
            $result = null;

            if ($conn) {
                $sql = "SELECT * FROM {$this->table} ORDER BY id ASC";
                $resource = $conn->query($sql);
                if ($conn) {
                    $result = $resource->fetchAll(PDO::FETCH_ASSOC);
                }
            }

            return $result;
        }

        public function getClassById($id) {
            $conn = $this->connectDB();
            $result = [];

            if ($conn) {
                $sql = "SELECT * FROM {$this->table} WHERE id = {$id}";
                $resource = $conn->query($sql);
                $result = $resource->fetchAll(PDO::FETCH_ASSOC);    
            }

            return $result ? $result[0] : [];
        }

        public function insert($data = []) {
            $conn = $this->connectDB();
            $result = false;

            if ($conn) {
                $sql = "INSERT INTO {$this->table} (class_name, grade_id) VALUES (?, ?)";
                $result = $conn->prepare($sql)->execute([
                    $data['class_name'], $data['grade_id']
                ]);
            }
            return $result;
        }

        public function update($data) {
            $conn = $this->connectDB();
            $result = false;

            if ($conn) {
                $sql = "UPDATE {$this->table} SET class_name=?, grade_id=? WHERE id=?";
                $result = $conn->prepare($sql)->execute([
                    $data['class_name'], $data['grade_id'], $data['id']
                ]);
            }
            return $result;
        }
        
        public function delete($data) {
            $conn = $this->connectDB();
            $result = false;
            if ($conn) {
                $sql = "DELETE FROM {$this->table} WHERE id=?";
                $result = $conn->prepare($sql)->execute([
                    $data["id"]
                ]);
            }
            return $result;
        }
    }