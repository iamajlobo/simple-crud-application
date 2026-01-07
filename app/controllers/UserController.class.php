<?php 

class UserController extends Controller{
    public function index(){
        $this->view($this->request->getUri());
    }

    public function store(){
        
    }
}