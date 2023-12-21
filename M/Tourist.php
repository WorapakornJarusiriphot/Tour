<?php
class Tourist{
    private $ConDB;
    public function __construct(){
        $con = new ConDB();
        $con->connect();
        $this->ConDB = $con->conn;
    }

    // public function getTourist($year)
    // {
    //     $sql = "SELECT * FROM communityactivities where cs_year = ".$year;
    //     $query = $this->ConDB->prepare($sql);
    //     if( $query->execute()){
    //         $result = $query->fetchAll(PDO::FETCH_ASSOC);
    //         return $result;
    //     }else {
    //         return false;
    //     }
    // }

    public function getTourist()
    {
        $sql = "SELECT * FROM communityactivities";
        $query = $this->ConDB->prepare($sql);
        if( $query->execute()){
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }else {
            return false;
        }
    }

     public function getTouristDetail($activity_id)
    {
        $sql = "SELECT * FROM communityactivities where activity_id = ".$activity_id;
        $query = $this->ConDB->prepare($sql);
        if( $query->execute()){
            $result = $query->fetch(PDO::FETCH_ASSOC);
            return $result;
        }else {
            return false;
        }
    }

    public function getTouristYear($year)
    {
        $sql = "SELECT * FROM communityactivities where cs_year = ".$year;
        $query = $this->ConDB->prepare($sql);
        if( $query->execute()){
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }else {
            return false;
        }
    }




    // public function getTouristPro($pro_id)
    // {
    //     $sql = "SELECT * FROM agency WHERE `agency_pro_id` = '". $pro_id ."'";
    //     $query = $this->ConDB->prepare($sql);
    //     if( $query->execute()){
    //         $result = $query->fetchAll(PDO::FETCH_ASSOC);
    //         return $result;
    //     }else {
    //         return false;
    //     }
    // }

    // public function getAgencyID($a_id)
    // {
    //     $sql = "SELECT * FROM agency where agency_id=".$a_id;
    //     $query = $this->ConDB->prepare($sql);
    //     if( $query->execute()){
    //         $result = $query->fetch(PDO::FETCH_ASSOC);
    //         return $result;
    //     }else {
    //         return false;
    //     }
    // }

    public function addTourist($data_course)
    {
        $sql = "INSERT INTO `communityactivities` (`activity_id`, `activity_name`, `description`, `date`, `cs_wallet`, `cs_range_date`, `cs_fcourse`, 
        `cs_time`, `cs_location`, `cs_group`, `cs_detail`, `cs_perform`, `cs_reward`, `cs_schedule`, `cs_phone` , `cs_year`)";
        $sql .= " VALUES ('', :activity_name, :description, :date, :cs_wallet , :cs_range_date , :cs_fcourse
        , :cs_time , :cs_location, :cs_group, :cs_detail, :cs_perform , :cs_reward , :cs_schedule, :cs_phone , :cs_year);";
        $query = $this->ConDB->prepare($sql);
        if( $query->execute($data_course)){
            return true;
        }else {
            return false;
        }
    }

    // public function registerTourist($data_register_course)
    // {
    //     $sql = "INSERT INTO `sci_re` (`re_id`, `re_email`, `re_prefix`, `re_name`, `re_phonenumber`, `re_IDnumber`, `re_educational`)";
    //     $sql .= " VALUES ('', :re_email, :re_prefix, :re_name, :re_phonenumber , :re_IDnumber , :re_educational);";
    //     $query = $this->ConDB->prepare($sql);
    //     if( $query->execute($data_register_course)){
    //         return true;
    //     }else {
    //         return false;
    //     }
    // }

    public function delTourist($activity_id)
    {
        $sql = "DELETE FROM `communityactivities` WHERE `activity_id`='".$activity_id."'";
        $query = $this->ConDB->prepare($sql);
        if( $query->execute()){
            return true;
        }else {
            return false;
        }
    }

    public function editTouristeditTourist($activity_id, 
    $activity_name,
    $description,
    $date)
    {
        $sql = "UPDATE communityactivities SET activity_name='$activity_name',
        description='$description',
        date='$date'
        WHERE activity_id='$activity_id'";
        $query = $this->ConDB->prepare($sql);
        if( $query->execute()){
            return true;
        }else {
            return false;
        }
        mysqli_close($this->ConDB);
    }


/********* */
    
    public function getTouristJsonDB()
    {
        $sql = "SELECT * FROM communityactivities";
        $query = $this->ConDB->prepare($sql);
        if( $query->execute()){
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            $obj = json_encode($result);//แปลงค่า $result ให้เป็นค่า json แล้วเก็บไว้ในตัวแปร $obj
            return ($obj); //ส่งค่าข้อมูลในรูปแบบ json กลับคืน

        }else {
            return false;
        }
    }
}
/************** */
?>