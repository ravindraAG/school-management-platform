<?php 

    require BASE_PATH . '/core/Model.php';
    class SchoolUserModel extends Model {

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

        public function getUserById($id) {
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
                $sql = "INSERT INTO {$this->table} (name, email, password, role_id) VALUES (?, ?, ?, ?)";
                $result = $conn->prepare($sql)->execute([
                    $data['name'], $data['email'], $data['password'], $data['role_id']
                ]);
            }
            return $result;
        }

        public function update($data) {
            $conn = $this->connectDB();
            $result = false;

            if ($conn) {
                $sql = "UPDATE {$this->table} SET name=?, email=?, password=? role_id=? WHERE id=?";
                $result = $conn->prepare($sql)->execute([
                    $data['name'], $data['email'], $data['password'] $data['role_id'], $data['id']
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