<?php
   class M_DoctorAppoinments{
    private $db;

      public function __construct()
      {
        $this->db=new Database();
       

      }

      public function getDoctorAppoinments($doctor_timeslot_id) {
        $this->db->query('SELECT * FROM doctor_channel WHERE doctor_timeslot_id=:doctor_timeslot_id');
        $this->db->bind(':doctor_timeslot_id', $doctor_timeslot_id);

        $result = $this->db->resultSet();

        return $result;
    }
  }

      
      
?>