<?php
    require BASE_PATH . '/core/Controller.php';
    require BASE_PATH . '/models/GradeModel.php';
    class GradeController extends Controller {
        private $gradeModel;

        public function __construct(){
            $this->gradeModel = new GradesModel();
        }

        public function index() {
            $grades = $this->gradeModel->getAll();
            $this->loadView('grades.php', ['grades'=> $grades]);
        }

        public function load() {
            $grades = $this->gradeModel->getAll();
            $this->loadView('grades_grid.php', ['grades'=> $grades]);
        }

        public function getGrade() {
            $response = [];
            $id = htmlspecialchars($_POST['id']);

            if (!empty($id)) {
                $response = $this->gradeModel->getGradeById($id);
            }

            echo json_encode($response);
        }

        public function addGrade () {
            $response = ['success' => false];
            $data = [
                'grade_name' => htmlspecialchars($_POST['grade_name'])
            ];

            if(!empty($data['grade_name'])) {
                $response['success'] = $this->gradeModel->insert($data);
            }

            echo json_encode($response);
        }

        public function editGrade ($id) { 
            $response = ['success' => false];
            $data = [
                'id' => htmlspecialchars($_POST['id']),
                'grade_name' => htmlspecialchars($_POST['grade_name'])
            ];

            if(!empty($data['id']) && !empty($data['grade_name'])) {
                $response['success'] = $this->gradeModel->update($data);
            }

            echo json_encode($response);
        }

        public function deleteGrade () {
            $response = array('success' => false);
            $id = htmlspecialchars($_POST['id']);
    
            if (!empty($id)) {
                $response['success'] = $this->gradeModel->delete($id);
            }
    
            echo json_encode($response);
        }
    }
