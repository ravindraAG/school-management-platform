<?php
    require BASE_PATH . '/core/Controller.php';
    require BASE_PATH . '/models/SubjectModel.php';
    class SchoolSubjectController extends Controller {
        private $subjectModel;

        public function __construct(){
            $this->subjectModel = new SchoolSubjectModel();
        }

        public function index() {
            $subjects = $this->subjectModel->getAll();
            $this->loadView('subject.php', ['subjects'=> $subjects]);
        }

        public function load() {
            $subjects = $this->subjectModel->getAll();
            $this->loadView('subjects_grid.php', ['subjects'=> $subjects]);
        }

        public function getSubject() {
            $response = [];
            $id = htmlspecialchars($_POST['id']);

            if (!empty($id)) {
                $response = $this->subjectModel->getSubjectById($id);
            }

            echo json_encode($response);
        }

        public function addSubject () {
            $response = ['success' => false];
            $data = [
                'subject_name' => htmlspecialchars($_POST['subject_name']),
                'grade_id' => htmlspecialchars($_POST['grade_id'])
            ];

            if(!empty($data['subject_name']) && !empty($data['grade_id'])) {
                $response['success'] = $this->subjectModel->insert($data);
            }

            echo json_encode($response);
        }

        public function editSubject ($id) { 
            $response = ['success' => false];
            $data = [
                'id' => htmlspecialchars($_POST['id']),
                'subject_name' => htmlspecialchars($_POST['subject_name']),
                'grade_id' => htmlspecialchars($_POST['grade_id'])
            ];

            if(!empty($data['id']) && !empty($data['suject_name']) && !empty($data['grade_id'])) {
                $response['success'] = $this->subjectModel->update($data);
            }

            echo json_encode($response);
        }

        public function deleteSubject () {
            $response = array('success' => false);
            $id = htmlspecialchars($_POST['id']);
    
            if (!empty($id)) {
                $response['success'] = $this->subjectModel->delete($id);
            }
    
            echo json_encode($response);
        }
    }
