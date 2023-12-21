<?php
interface Iregister {
    public function getRegisterTourist(string $activity_id):array;
    public function registerTourist(array $data_register):bool;

}

Class Register implements Iregister {
  private $ConDB;
    public function __construct(){
        $con = new ConDB();
        $con->connect();
        $this->ConDB = $con->conn;
    }
  // public function getRegisterTourist(string $activity_id)
   public function getRegisterTourist(string $activity_id):array
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
  public function registerTourist(array $data_register):bool
  {
      $sql = "INSERT INTO `sci_re` (`re_id`, `re_email`, `re_prefix`, `re_name`, `re_phonenumber`, `re_IDnumber`, `re_educational`)";
      $sql .= " VALUES ('', :re_email, :re_prefix, :re_name, :re_phonenumber , :re_IDnumber , :re_educational);";
      $query = $this->ConDB->prepare($sql);
      if( $query->execute($data_register)){
          return true;
      }else {
          return false;
      }
  }

//     private $isOn = false;
  
//     public function activate() {
//       $this->isOn = true;
//     }
    
//     public function deactivate() {
//       $this->isOn = false;
//     }
    
//     public function isActive() {
//       return $this->isOn;
//     }
//   }
  
//   $machine = new Kettle();
  
//   $machine->activate();
//   if($machine->isActive()) {
//     echo "The machine is on";
//   } else {
//     echo "The machine is off";
//   }
  
//   echo "<br>";
//   $machine->deactivate();
//   if($machine->isActive()) {
//     echo "The machine is on";
//   } else {
//     echo "The machine is off";
  }
?>
  