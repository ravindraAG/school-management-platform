<?php
    require BASE_PATH . '/core/Controller.php';
    require BASE_PATH . '/models/ClassModel.php';
    require BASE_PATH . '/models/GradeModel.php';
    class SchoolClassController extends Controller {
        private $classModel;

        public function __construct(){
            $this->classModel = new SchoolClassModel();
        }

        public function index() {
            $classes = $this->classModel->getAll();
            $this->loadView('classes.php', ['classes'=> $classes]);
        }

        public function load() {
            $classes = $this->classModel->getAll();
            $this->loadView('classes_grid.php', ['classes'=> $classes]);
        }

        public function getClass() {
            $response = [];
            $id = htmlspecialchars($_POST['id']);

            if (!empty($id)) {
                $response = $this->classModel->getClassById($id);
            }

            echo json_encode($response);
        }

        public function addClass () {
            $response = ['success' => false];
            $data = [
                'class_name' => htmlspecialchars($_POST['class_name']),
                'grade_id' => htmlspecialchars($_POST['grade_id'])
            ];

            if(!empty($data['class_name']) && !empty($data['grade_id'])) {
                $response['success'] = $this->classModel->insert($data);
            }

            echo json_encode($response);
        }

        public function editClass ($id) { 
            $response = ['success' => false];
            $data = [
                'id' => htmlspecialchars($_POST['id']),
                'class_name' => htmlspecialchars($_POST['class_name']),
                'grade_id' => htmlspecialchars($_POST['grade_id'])
            ];

            if(!empty($data['id']) && !empty($data['class_name']) && !empty($data['grade_id'])) {
                $response['success'] = $this->classModel->update($data);
            }

            echo json_encode($response);
        }

        public function deleteClass () {
            $response = array('success' => false);
            $id = htmlspecialchars($_POST['id']);
    
            if (!empty($id)) {
                $response['success'] = $this->classModel->delete($id);
            }
    
            echo json_encode($response);
        }
    }
