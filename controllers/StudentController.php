<?php
    require BASE_PATH . '/core/Controller.php';
    require BASE_PATH . '/models/StudentModel.php';
    class SchoolStudentController extends Controller {
        private $studentModel;

        public function __construct(){
            $this->studentModel = new SchoolStudentModel();
        }

        public function index() {
            $students = $this->studentModel->getAll();
            $this->loadView('student.php', ['students'=> $students]);
        }

        public function load() {
            $students = $this->studentModel->getAll();
            $this->loadView('students_grid.php', ['students'=> $students]);
        }

        public function getStudent() {
            $response = [];
            $id = htmlspecialchars($_POST['id']);

            if (!empty($id)) {
                $response = $this->studentModel->getStudentById($id);
            }

            echo json_encode($response);
        }

        public function addStudent () {
            $response = ['success' => false];
            $data = [
                'student_name' => htmlspecialchars($_POST['student_name']),
                'grade_id' => htmlspecialchars($_POST['grade_id'])
            ];

            if(!empty($data['student_name']) && !empty($data['grade_id'])) {
                $response['success'] = $this->studentModel->insert($data);
            }

            echo json_encode($response);
        }

        public function editStudent ($id) { 
            $response = ['success' => false];
            $data = [
                'id' => htmlspecialchars($_POST['id']),
                'student_name' => htmlspecialchars($_POST['student_name']),
                'class_id' => htmlspecialchars($_POST['class_id'])
            ];

            if(!empty($data['id']) && !empty($data['student_name']) && !empty($data['class_id'])) {
                $response['success'] = $this->studentModel->update($data);
            }

            echo json_encode($response);
        }

        public function deleteStudent () {
            $response = array('success' => false);
            $id = htmlspecialchars($_POST['id']);
    
            if (!empty($id)) {
                $response['success'] = $this->studentModel->delete($id);
            }
    
            echo json_encode($response);
        }
    }
