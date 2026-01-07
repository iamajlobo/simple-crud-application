<?php

class Router {
    private array $routes = [];
    private Request $request;
    private Response $response;
    
    public function __construct(){
        $this->request = new Request();
        $this->response = new Response();
    }

    private function addRoutes($method='GET',$path = '/',$handler=null){
        $this->routes[] = [
                        'method'=>$method,
                        'path'=>$path,
                        'handler'=>$handler
                    ];
    }

    public function get($path = '/',$handler=null){
        $this->addRoutes('GET',$path,$handler);
    }

    public function post($path = '/',$handler=null){
        $this->addRoutes('POST',$path, $handler);
    }

    public function dispatch(){
        $current_method = $this->request->getMethod();
        $uri = $this->request->getUri();

        foreach($this->routes as $route){
            $pattern = preg_replace('#\{[\w]+}#','([\w-]+)',$route['path']);
            $pattern = "#^{$pattern}$#";
    
            if($route['method'] === $current_method && preg_match($pattern,$uri,$matches)){
                
                array_shift($matches);
                $this->call($route['handler'],$matches);
                return;
            }
        }

        $this->response->setStatusCode(404);
        $this->response->json([
            'error' => 'Route not found!'
        ]);
        return;
    }

    private function call($handler,$params){
        [$controller,$action] = explode('|',$handler);

        $instance = new $controller($this->request, $this->response);
        call_user_func([$instance,$action],$params);
    }

}