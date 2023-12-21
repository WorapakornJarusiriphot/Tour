<?php

include_once 'config.php';

class Database
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
            $this->error = "Connection failed: ";
            return false;
        }
    }

    // insert
    public function insert($query)
    {
        $result = $this->link->query($query) or die($this->link->error . __LINE__);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    // select *
    public function select($query)
    {
        $result = $this->link->query($query) or die($this->link->error . __LINE__);
        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function selectAll($query)
    {
        $result = $this->link->query($query) or die($this->link->error . __LINE__);

        // Check if the result is not false
        if ($result !== false) {
            // Fetch all rows from the result set
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

            // Free the result set
            mysqli_free_result($result);

            // Return the fetched rows
            return $rows;
        } else {
            return false;
        }
    }

    public function prepare($query) {
        // ตัวอย่างการเตรียมคำสั่ง SQL
        $stmt = $this->link->prepare($query);
        return $stmt;
    }


}


?>