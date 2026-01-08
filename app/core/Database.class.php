<?php

class Database {
    
    private $pdo;
    private static $instances = null;
    public function __construct()
    {
        try{
            $this->pdo = new PDO("mysql:host=localhost;dbname=crud_db",'root','',[
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_STRINGIFY_FETCHES => false
        ]);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die('Connection Failed! ' . $e->getMessage());
        }
    }

    public static function getInstance(){
        if(self::$instances === null){
            self::$instances = new Database();
        }
        return self::$instances;
    }

    public function getConnection(){
        return $this->pdo;
    }

    public function prepare($sql){
        return $this->pdo->prepare($sql);
    }

    public function query($sql){
        return $this->pdo->query($sql);
    }
}