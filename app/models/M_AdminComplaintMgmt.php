<?php

   class M_AdminComplaintMgmt{
      private $db;

      public function __construct()
      {
        $this->db=new Database();
      }

            
      public function getAllComplaint()
      {
        $this->db->query('SELECT * FROM complaint ORDER BY complaint_date DESC');
        return $this->db->resultSet();
      }


      public function getPatientDetails()
      {
        $this->db->query('SELECT * FROM patient');
        return $this->db->resultSet();
      }

      public function getDoctorDetails()
      {
        $this->db->query('SELECT * FROM doctor');
        return $this->db->resultSet();
      }

      public function getCounsellorDetails()
      {
        $this->db->query('SELECT * FROM counsellor');
        return $this->db->resultSet();
      }

      public function getMeditationInstrDetails()
      {
        $this->db->query('SELECT * FROM meditation_instructor');
        return $this->db->resultSet();
      }

      public function getNutritionistDetails()
      {
        $this->db->query('SELECT * FROM nutritionist');
        return $this->db->resultSet();
      }

      public function getPharmacistDetails()
      {
        $this->db->query('SELECT * FROM pharmacist');
        return $this->db->resultSet();
      }

      public function getComplaint($complaintId)
      {
        $this->db->query('SELECT * FROM complaint WHERE complaint_id= :complaint_id');
        $this->db->bind(':complaint_id',$complaintId);  

        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      }

   }


 ?>
