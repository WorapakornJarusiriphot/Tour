<?php
class ConDB{
    private $host,$db,$user,$pass;
    public $conn;

    public function ConDB(){
        $this->host = 'localhost';
        $this->user = 'root'; 
        $this->pass = ''; 
        $this->db = 'tourist'; 
    }

    public function connect(){
        try{
            $this->conn = new PDO("mysql:host=localhost;dbname=tourist","root","");
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
} 
?>