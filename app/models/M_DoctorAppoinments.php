<?php
   class M_DoctorAppoinments{
    private $db;

      public function __construct()
      {
        $this->db=new Database();
       

      }

      public function getDoctorAppoinments($doctor_id) {
        $this->db->query('SELECT * FROM doctor_channel WHERE doctor_id=:doctor_id');
        $this->db->bind(':doctor_id', $doctor_id);

        $result = $this->db->resultSet();

        return $result;
    }
  }

      
      
?>