<?php
   class M_DoctorAppoinments{
    private $db;

      public function __construct()
      {
        $this->db=new Database();
       

      }

      
      public function getDoctorAppoinments($doctor_id) {

        $this->db->query('SELECT doctor_channel.*,doctor_timeslot.*,doctor_channel_day.* FROM doctor_timeslot INNER JOIN doctor_channel_day ON doctor_timeslot.doctor_timeslot_id = doctor_channel_day.doctor_timeslot_id Inner JOIN doctor_channel ON doctor_channel.doctor_id = doctor_timeslot.doctor_id  WHERE doctor_channel.doctor_id = :doctor_id');
        $this->db->bind(':doctor_id', $doctor_id);

        return $this->db->resultSet();
    }
        

        
    
  }

      
      
?>