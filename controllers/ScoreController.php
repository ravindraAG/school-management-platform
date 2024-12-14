<?php
    require BASE_PATH . '/core/Controller.php';
    require BASE_PATH . '/models/ScoreModel.php';
    class SchoolScoreController extends Controller {
        private $scoreModel;

        public function __construct(){
            $this->scoreModel = new SchoolScoreModel();
        }

        public function index() {
            $scores = $this->scoreModel->getAll();
            $this->loadView('scores.php', ['scores'=> $scores]);
        }

        public function load() {
            $scores = $this->socreModel->getAll();
            $this->loadView('scores_grid.php', ['scores'=> $scores]);
        }

        public function getScore() {
            $response = [];
            $id = htmlspecialchars($_POST['id']);

            if (!empty($id)) {
                $response = $this->scoreModel->getScoreById($id);
            }

            echo json_encode($response);
        }

        public function addScore () {
            $response = ['success' => false];
            $data = [
                'score' => htmlspecialchars($_POST['score']),
                'student_id' => htmlspecialchars($_POST['student_id']),
                'subject_id' => htmlspecialchars($_POST['subject_id']),
                'term_id' => htmlspecialchars($_POST['term_id'])
            ];

            if(!empty($data['score']) && !empty($data['student_id']) && !empty($data['subject_id']) && !empty($data['term_id'])) {
                $response['success'] = $this->scoreModel->insert($data);
            }

            echo json_encode($response);
        }

        public function editScore ($id) { 
            $response = ['success' => false];
            $data = [
                'student_id' => htmlspecialchars($_POST['student_id']),
                'score' => htmlspecialchars($_POST['score']),
                'subject_id' => htmlspecialchars($_POST['subject_id']),
                'term_id' => htmlspecialchars($_POST['term_id'])
            ];

            if(!empty($data['student_id']) && !empty($data['score']) && !empty($data['subject_id']) && !empty($data['term_id'])) {
                $response['success'] = $this->scoreModel->update($data);
            }

            echo json_encode($response);
        }

        public function deleteScore () {
            $response = array('success' => false);
            $id = htmlspecialchars($_POST['id']);
    
            if (!empty($id)) {
                $response['success'] = $this->scoreModel->delete($id);
            }
    
            echo json_encode($response);
        }
    }
