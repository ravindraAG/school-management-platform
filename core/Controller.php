<?php
    class Controller {
        function __construct() {

        }

        public function loadView($name = '', $arg = []) {
            $path = BASE_PATH . "/views/{$name}";
            $data = [];

            foreach($arg as $key => $value) {
                $data[$key] = $value;
            }

            ob_start();
            include $path;
            $content = ob_get_contents();
            ob_end_clean();
            echo $content;
        }
    }