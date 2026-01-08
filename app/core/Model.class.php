<?php

class Model {

    protected string $table='';
    public function __construct(protected Database $pdo, protected Request $request, protected Response $response){}

    public function create($data)
    {   
        $column = implode(',',array_keys($data));
        $row = implode(',',array_fill(0,count($data),'?'));
        $sql = "INSERT INTO {$this->table} ({$column}) VALUES ({$row});";

        $stmt = $this->pdo->prepare($sql);
        
        $counter = 1;
        foreach($data as $key=>$value){
            $stmt->bindValue($counter,$value);
            $counter++;
        }
        
        return $stmt->execute();
    }

    public function read($offset,$limit)
    {
        $sql = "SELECT * FROM $this->table LIMIT $offset,$limit;";
        $stmt = $this->pdo->query($sql);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function change($id,$data)
    {
        $cols = explode(',',implode(',',array_keys($data)));
        $holder = [];
        foreach($cols as $col){
            array_push($holder,"{$col}=?");
        }   

        $temp = implode(',',$holder);
       
        
        $sql = "UPDATE {$this->table} SET {$temp} WHERE student_id = ?;";
        $stmt = $this->pdo->prepare($sql);
        $counter =1;
        foreach($data as $key =>$value){
            $stmt->bindValue($counter,$value);
            $counter++;
        }
        $stmt->bindValue($counter,$id);
        $stmt->execute();
        
        if($stmt->rowCount() === 0){
            return false;
        }

        return true;  
    }

    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE student_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1,$id[0]);
        return $stmt->execute();
    }

    public function countData(){
        $sql = "SELECT COUNT(*) FROM $this->table";
        $total = $this->pdo->query($sql);
        return $total->fetch()[0];
    }

    public function showData($id){
        $sql = "SELECT student_id, CONCAT(first_name,' ',last_name) AS full_name, email,course FROM $this->table WHERE student_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function showData2($id){
        $sql = "SELECT * FROM $this->table WHERE student_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}