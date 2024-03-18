<?php
    class Router {
        protected $routes = [];

        public function registerRoute($method, $uri, $controller){
            $this -> routes[] = [
                'method' => $method,
                'uri' => $uri,
                'controller' => $controller,
            ];
        }

        //Adding a GET route
        public function get($uri, $controller) {
            $this -> registerRoute('GET', $uri, $controller);
        }

        //Adding a POST route
        public function post($uri, $controller) {
            $this -> registerRoute('POST', $uri, $controller);
        }

        //Adding a PUT route
        public function put($uri, $controller) {
            $this -> registerRoute('PUT', $uri, $controller);
        }

        //Adding a DELETE route
        public function delete($uri, $controller) {
            $this -> registerRoute('DELETE', $uri, $controller);
        }

        //Load error page
        public function error($httpCode = 404){
            http_response_code($httpCode);
            loadView("error/{$httpCode}");
            exit;
        }


        //Routing the request
        public function route($uri, $method){
            foreach($this->routes as $route){
                if($route['uri'] === $uri && $route['method'] === $method){
                    require basePath($route['controller']);
                    return;
                }
            }
            $this -> error();
        }
    }
?>