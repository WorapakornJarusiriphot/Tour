<?php
include_once 'config.php';

class ConDB
{
    public $host = HOST;
    public $user = USER;
    public $password = PASSWORD;
    public $database = DATABASE;

    public $link;
    public $error;

    public function __construct()
    {
        $this->dbconnect();
    }

    public function dbconnect()
    {
        $this->link = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if (!$this->link) {
            $this->error = "Connection failed: " . mysqli_connect_error();
            return false;
        }
    }

    public function getAllTour()
    {
        $sql = "select * from communities";
        $this->dbconnect();
        $query = $this->link->query($sql);
        
        if($query){
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            $data = json_encode($result);
            return $data;
        } else {
            return false;
        }
    }
}
?>
