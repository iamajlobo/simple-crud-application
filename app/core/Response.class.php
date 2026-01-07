<?php

class Response {
    public function setStatusCode($code){
        return http_response_code($code);
    }

    public function json($data=[]){
        return json_encode($data);
    }

    public function redirect($path='/'){
        header("Location: $path");
    }
}