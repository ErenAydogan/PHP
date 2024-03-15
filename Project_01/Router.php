<?php

class Router {
    protected $routes = [];

    public function registerRoute($method, $uri, $controller) {
        $this -> routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
        ];
    }
    //Adding a GET route

    public function get($uri, $controller){
        $this -> registerRoute('GET', $uri, $controller);
    }

    //adding a post route
    public function post($uri, $controller){
        $this -> registerRoute('POST', $uri, $controller);
    }

    //adding a put route
    public function put($uri, $controller){
        $this -> registerRoute('PUT', $uri, $controller);
    }

    //adding a delete route
    public function delete($uri, $controller){
        $this -> registerRoute('DELETE', $uri, $controller);
    }


    //Route the request
    public function route($uri, $method) {
        foreach($this->routes as $route){
            if($route['uri'] === $uri && $route['method'] === $method){
                require basePath($route['controller']);
                return;
            }
        }

        http_response_code(404);
        loadView('error/404');
        exit;
    }
}
?>