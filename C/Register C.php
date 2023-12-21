<?php
include_once '../M/Database.php';

class Register
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getCommunities()
    {
        $query = "SELECT community_id, community_name, description, location FROM communities";
        $result = $this->db->select($query);
        return $result;
    }

    // public function getEvents()
    // {
    //     $query = "SELECT date, Event_Name FROM football_events";
    //     $result = $this->db->select($query);
    //     return $result;
    // }

    public function addCommunity($data, $file ,$id)
    {
        $community_id = isset($data['community_id']) ? $data['community_id'] : null;
        // $event_id = isset($data['event_id']) ? $data['event_id'] : null;

        $activity_name = $data['activity_name'];
        $description = $data['description'];
        $date = $data['date'];
        //$community_id = $data['community_id'];
        // $event_id = $data['event_id'];


        $query = "INSERT INTO communityactivities (activity_name, description, date ,community_id) 
                  VALUES ('$activity_name', '$description', '$date' , '$id')";

        $result = $this->db->insert($query);

        if ($result) {
            $msg = "Community registration successful";
        } else {
            $msg = "Community registration failed";
        }

        return $msg;
    }

    public function deleteCommunity($communityId) {
        $query = "DELETE FROM communityactivities WHERE activity_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $communityId);
        $stmt->execute();
        return $stmt->affected_rows;
    }

    public function editCommunity($id, $data) {
        $activity_name = $data['activity_name'];
        $description = $data['description'];
        $date = $data['date'];
        $query = "UPDATE communityactivities SET activity_name = $activity_name, description = $description, date = $date  WHERE activity_id  = ".$id;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->affected_rows;
    }    

    public function searchCommunitysByName($name) {
        $query = "SELECT * FROM communityactivities WHERE activity_name LIKE ?";
        $name = "%" . $name . "%"; // สำหรับการค้นหาที่มีความยืดหยุ่น (like '%name%')
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC); // คืนค่าผลลัพธ์เป็น associative array
    }    

    public function getAllCommunitys()
    {
        $query = "SELECT * FROM communityactivities";
        return $this->db->selectAll($query);
    }

    public function getByIdCommunitys($id)
    {
        $query = "SELECT * FROM communityactivities WHERE community_id = ".$id;
        return $this->db->selectAll($query);
    }

    public function getByIdCommunitys2($id)
    {
        $query = "SELECT * FROM communityactivities WHERE activity_id = ".$id;
        return $this->db->selectAll($query);
    }
    
    // public function getTeamName($teamId)
    // {
    //     $query = "SELECT Team_Name FROM teams WHERE description = $teamId";
    //     $result = $this->db->select($query);

    //     return ($result && $row = mysqli_fetch_assoc($result)) ? $row['Team_Name'] : 'N/A';
    // }

    // public function getEventName($eventId)
    // {
    //     $query = "SELECT Event_Name FROM football_events WHERE date = $eventId";
    //     $result = $this->db->select($query);

    //     return ($result && $row = mysqli_fetch_assoc($result)) ? $row['Event_Name'] : 'N/A';
    // }
}
