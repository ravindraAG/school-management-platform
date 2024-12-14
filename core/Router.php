<?php

    class Router {
        public static function route() {
            require BASE_PATH . '/config/routes.php';
            $request = trim($_SERVER['REQUEST_URI']);

            if(array_key_exists($request, $routes)) {
                $controller = $routes[$request][0];
                $method = $routes[$request][1];
                if (file_exists(BASE_PATH . '/controllers/' . $controller . '.php')) {
                    require BASE_PATH . '/controllers/' . $controller . '.php';
                    if (method_exists($controller, $method)) {
                        $class->$method();
                        exit;
                    }
                }
            }

            http_response_code(404);
            include BASE_PATH . '/views/404.php';
        }
    }

