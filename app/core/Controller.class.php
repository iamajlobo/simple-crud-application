<?php 
class Controller {
    public function __construct(protected Request $request,protected Response $response){}

    public function view($path='/',$data=[]){
        if($path === '/'){
           include_once "../app/views/read.php";
           return;
        }
        include_once "../app/views/{$path}.php";
    }
}