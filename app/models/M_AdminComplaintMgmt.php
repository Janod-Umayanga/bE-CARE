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



      public function getnoOfSolvedComplaint()
      
      {
        $this->db->query('SELECT count(complaint_id) as solvedComplaint_count FROM complaint WHERE complaint_flag=1');
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      }
      public function getnoOfUnsolvedComplaint()
      
      
      {
        $this->db->query('SELECT count(complaint_id) as unsolvedComplaint_count FROM complaint WHERE complaint_flag=0');
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      }

      public function getSolvedComplaint()

      {
        $this->db->query('SELECT * FROM complaint WHERE complaint_flag=1');
        return $this->db->resultSet();
      }

      public function  getUnsolvedComplaint()
      {
        $this->db->query('SELECT * FROM complaint WHERE complaint_flag=0');
        return $this->db->resultSet();
      }

      
      public function  setSolved($id)
 
      {
          $this->db->query('UPDATE complaint set complaint_flag=1 WHERE complaint_id = :id');
          $this->db->bind(':id',$id);
  
          if($this->db->execute()){
             return true;
          }else{
              return false;
          } 
      } 

   }


 ?>
