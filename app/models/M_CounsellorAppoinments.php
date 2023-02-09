<?php
   class M_counsellorAppoinments{
    private $db;

      public function __construct()
      {
        $this->db=new Database();
       

      }

      public function getCounsellorAppoinments($counsellor_id) {
        $this->db->query('SELECT * FROM counsellor_channel WHERE counsellor_id=:counsellor_id');
        $this->db->bind(':counsellor_id', $counsellor_id);

        $result=$this->db->resultSet();

        return $result;
    }
  }

      
      
?>