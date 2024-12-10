<?php
    class SchoolYear {
        public $id;
        public $year;
        
        public function create($data) {
            
        }

        public function getYear () {

        }
        
    }

    class Term {
        public $id;
        public $name;
        public $schoolYearId;

        public function create($data) {

        }

        public function getTermByYear ($yearId) {

        }
    }
?>