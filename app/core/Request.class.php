<?php 

class Request {
    public function getMethod(){
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getUri(){
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public function getBody(){
        #return json_decode(file_get_contents('php://input'),true);   
        return $_POST;     
    }

    public function get($key){
        return $_GET[$key] ?? null;
    }
}