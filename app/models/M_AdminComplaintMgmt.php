<?php

   class M_AdminComplaintMgmt{
      private $db;

      public function __construct()
      {
        $this->db=new Database();
      }

      //Get All Complaint      
      public function getAllComplaint()
      {
        $this->db->query('SELECT * FROM complaint ORDER BY complaint_date DESC');
        return $this->db->resultSet();
      }

      //Get Patient Details
      public function getPatientDetails()
      {
        $this->db->query('SELECT * FROM patient');
        return $this->db->resultSet();
      }

      //Get Doctor Details
      public function getDoctorDetails()
      {
        $this->db->query('SELECT * FROM doctor');
        return $this->db->resultSet();
      }

      //Get Counsellor Details
      public function getCounsellorDetails()
      {
        $this->db->query('SELECT * FROM counsellor');
        return $this->db->resultSet();
      }
      
      //Get MeditationInstr Details
      public function getMeditationInstrDetails()
      {
        $this->db->query('SELECT * FROM meditation_instructor');
        return $this->db->resultSet();
      }

      //Get Nutritionist Details
      public function getNutritionistDetails()
      {
        $this->db->query('SELECT * FROM nutritionist');
        return $this->db->resultSet();
      }
      
      //Get Pharmacist Details
      public function getPharmacistDetails()
      {
        $this->db->query('SELECT * FROM pharmacist');
        return $this->db->resultSet();
      }

      //Get Complaint Details 
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


      //Get no Of Solved Complaint
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
      
      
      //Get no Of UnSolved Complaint
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

      //Get Solved Complaint
      public function getSolvedComplaint()
      {
        $this->db->query('SELECT * FROM complaint WHERE complaint_flag=1');
        return $this->db->resultSet();
      }

      //Get Unsolved Complaint
      public function  getUnsolvedComplaint()
      {
        $this->db->query('SELECT * FROM complaint WHERE complaint_flag=0');
        return $this->db->resultSet();
      }

      //Set Complaint to Solved
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
