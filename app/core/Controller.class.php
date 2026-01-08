<?php 
class Controller {
    protected Database $pdo;
    protected Request $request;
    protected Response $response;
    public function __construct(Request $request, Response $response){
        $this->pdo = Database::getInstance();
        $this->pdo->getConnection();
        $this->request = $request;
        $this->response = $response;
    }

    public function view($path='/',$data=[],$total=0,$page=1){
        if($path === '/'){
           include_once "../app/views/read.php";
           return;
        }
        include_once "../app/views/{$path}.php";
    }
}