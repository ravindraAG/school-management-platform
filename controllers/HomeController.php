<?php
    require BASE_PATH . '/core/Controller.php';
    class HomeController extends Controller {

        public function __construct(){}

        public function index() {
            $this->loadView('dashboard.php');
        }

    }
