<?php

class Response {
    public function setStatusCode($code){
        return http_response_code($code);
    }

    public function json($data=[]){
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }

    public function decode($data){
        return json_decode($data,true);
    }

    public function redirect($path='/'){
        header("Location: /$path");
        exit;
    }

}