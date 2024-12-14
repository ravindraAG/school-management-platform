<?php
    require BASE_PATH . '/core/Controller.php';
    require BASE_PATH . '/models/UserModel.php';
    class SchoolUserController extends Controller {
        private $userModel;

        public function __construct(){
            $this->userModel = new SchoolUserModel();
        }

        public function index() {
            $users = $this->userModel->getAll();
            $this->loadView('users.php', ['users'=> $users]);
        }

        public function load() {
            $users = $this->userModel->getAll();
            $this->loadView('users_grid.php', ['users'=> $users]);
        }

        public function getUser() {
            $response = [];
            $id = htmlspecialchars($_POST['id']);

            if (!empty($id)) {
                $response = $this->userModel->getUserById($id);
            }

            echo json_encode($response);
        }

        public function addUser () {
            $response = ['success' => false];
            $data = [
                'user_name' => htmlspecialchars($_POST['user_name']),
                'role_id' => htmlspecialchars($_POST['role_id'])
            ];

            if(!empty($data['user_name']) && !empty($data['role_id'])) {
                $response['success'] = $this->userModel->insert($data);
            }

            echo json_encode($response);
        }

        public function editClass ($id) { 
            $response = ['success' => false];
            $data = [
                'id' => htmlspecialchars($_POST['id']),
                'user_name' => htmlspecialchars($_POST['user_name']),
                'role_id' => htmlspecialchars($_POST['role_id'])
            ];

            if(!empty($data['id']) && !empty($data['user_name']) && !empty($data['role_id'])) {
                $response['success'] = $this->userModel->update($data);
            }

            echo json_encode($response);
        }

        public function deleteUser () {
            $response = array('success' => false);
            $id = htmlspecialchars($_POST['id']);
    
            if (!empty($id)) {
                $response['success'] = $this->userModel->delete($id);
            }
    
            echo json_encode($response);
        }
    }
