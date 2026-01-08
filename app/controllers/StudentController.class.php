<?php 

class StudentController extends Controller{

    private Student $student;
    public function __construct(Request $request, Response $response)
    {
        parent::__construct($request, $response);
        $this->student = new Student($this->pdo,$this->request,$this->response);
    }

    public function index(){
        $total_data = $this->student->countData();
        $total_page = ceil($total_data/10);
        $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 10;
        $offset = ($page-1) * $limit;
        $data = $this->student->read($offset,10);
        
        $this->view($this->request->getUri(),$data,$total_page,$page);
    }

    //Store Data to the Database
    public function store(){
        if($this->request->getMethod() === 'POST'){
            $data = $this->request->getBody();
        
            $error = Validate::validateInput($data);
            
            if(!empty($error)){
                Session::set('error',$error[0]);
                Session::set('type','red');        
                header('Location: /');
                exit();
            }
            
            $result = $this->student->create($data);
            $this->getResult($result);
        }
    }

    public function show(){
        $id = $this->request->get('student_id');
        $data = $this->student->showData($id);
        $this->view($this->request->getUri(),$data);
    }

    public function current(){
        $id = $this->request->get('student_id');
        $data = $this->student->showData2($id);
        $this->view($this->request->getUri(),$data);
    }

    public function update($id){
        $id = is_array($id) ? $id[0] : $id;
        if($this->request->getMethod() === 'POST'){
            $data = $this->request->getBody();
            $error = Validate::validateInput($data);
            var_dump($id);    
            if(!empty($error)){
                Session::set('error',$error[0]);
                Session::set('type','red');        
                header("Location: /update?student_id={$id}");
                exit();
            }

            $result = $this->student->change($id,$data);
            if(!$result){
                Session::set('message','Not Successfull');
                Session::set('type','red');
                header("Location: /update?student_id={$id}");
                exit();
            }

            Session::set('message','Successfull');
            Session::set('type','green');
            header("Location: /update?student_id={$id}");
            exit();
        }    
    }

    public function destroy($id){
        $this->student->delete($id);
        header('Location: /');
        exit();
    }    

    //get result of the operation
    private function getResult($result){
        if(!$result){
            Session::set('message','Not Successfull');
            Session::set('type','red');
            header('Location: /add');
            exit();
        }

        Session::set('message','Successfull');
        Session::set('type','green');
        header('Location: /add');
        exit();
    }
}