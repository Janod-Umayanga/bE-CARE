<?php
   class M_counsellorAppoinments{
    private $db;

      public function __construct()
      {
        $this->db=new Database();
       

      }

      public function getCounsellorAppoinments($counsellor_timeslot_id) {
        $this->db->query('SELECT * FROM counsellor_channel WHERE counsellor_timeslot_id=:counsellor_timeslot_id');
        $this->db->bind(':counsellor_timeslot_id', $counsellor_timeslot_id);

        $result=$this->db->resultSet();

        return $result;
    }
  }

      
      
?>