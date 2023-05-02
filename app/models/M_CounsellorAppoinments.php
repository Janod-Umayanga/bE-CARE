<?php
   class M_counsellorAppoinments{
    private $db;

      public function __construct()
      {
        $this->db=new Database();
       

      }

      public function getCounsellorAppoinments($counsellor_id) {

        $this->db->query('SELECT counsellor_channel.*,counsellor_timeslot.*,counsellor_channel_day.* FROM counsellor_timeslot INNER JOIN counsellor_channel_day ON counsellor_timeslot.counsellor_timeslot_id = counsellor_channel_day.counsellor_timeslot_id Inner JOIN counsellor_channel ON counsellor_channel.counsellor_id = counsellor_timeslot.counsellor_id  WHERE counsellor_channel.counsellor_id = :counsellor_id');
        $this->db->bind(':counsellor_id', $counsellor_id);

        return $this->db->resultSet();
    }
  }

      
      
?>