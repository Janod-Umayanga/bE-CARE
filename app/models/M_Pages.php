<?php

   class M_Pages{
      private $db;

      public function __construct()
      {
        $this->db=new Database();
      }

      //Get Users
      public function getUsers()
      {
        $this->db->query('SELECT * FROM Users');
        return $this->db->resultSet();
      }

      //Get All feedBack
      public function getAllfeedBack()
      {
        $this->db->query('SELECT * FROM feedback ORDER BY feedback_date DESC');
        return $this->db->resultSet();
      }

      //Get Patient Details
      public function getPatientDetails()
      {
        $this->db->query('SELECT * FROM patient');
        return $this->db->resultSet();
      }


     //verify Patient Email
      public function  verifyPatientEmail($id)
      {
        $this->db->query('UPDATE patient set delete_flag = :delete_flag WHERE patient_id = :id');
        $this->db->bind(':delete_flag', 0);  
        $this->db->bind(':id', $id);
          

        if($this->db->execute()){
           return true;
        }else{
            return false;
        } 
      }

      //verify Doctor Email
      public function verifyDoctorEmail($id)

      {
        $this->db->query('UPDATE requested_doctor set email_verified_flag = :email_verified_flag WHERE requested_doctor_id = :requested_doctor_id');
        $this->db->bind(':email_verified_flag', 1);  
        $this->db->bind(':requested_doctor_id', $id);
          

        if($this->db->execute()){
           return true;
        }else{
            return false;
        } 
      }

      //verify Counsellor Email
      public function verifyCounsellorEmail($id)

      {
        $this->db->query('UPDATE requested_counsellor set email_verified_flag = :email_verified_flag WHERE requested_counsellor_id = :requested_counsellor_id');
        $this->db->bind(':email_verified_flag', 1);  
        $this->db->bind(':requested_counsellor_id', $id);
          

        if($this->db->execute()){
           return true;
        }else{
            return false;
        } 
      }
     
      //verify Meditation Instructor Email
      public function verifyMeditationInstructorEmail($id)

      {
        $this->db->query('UPDATE requested_meditation_instructor set email_verified_flag = :email_verified_flag WHERE requested_meditation_instructor_id = :requested_meditation_instructor_id');
        $this->db->bind(':email_verified_flag', 1);  
        $this->db->bind(':requested_meditation_instructor_id', $id);
          

        if($this->db->execute()){
           return true;
        }else{
            return false;
        } 
      }

      //verify Nutritionist Email
      public function verifyNutritionistEmail($id)

      {
        $this->db->query('UPDATE requested_nutritionist set email_verified_flag = :email_verified_flag WHERE requested_nutritionist_id = :requested_nutritionist_id');
        $this->db->bind(':email_verified_flag', 1);  
        $this->db->bind(':requested_nutritionist_id', $id);
          

        if($this->db->execute()){
           return true;
        }else{
            return false;
        } 
      }

      //verify Pharmacist Email
      public function verifyPharmacistEmail($id)

      {
        $this->db->query('UPDATE requested_pharmacist set email_verified_flag = :email_verified_flag WHERE requested_pharmacist_id = :requested_pharmacist_id');
        $this->db->bind(':email_verified_flag', 1);  
        $this->db->bind(':requested_pharmacist_id', $id);
          

        if($this->db->execute()){
           return true;
        }else{
            return false;
        } 
      }



   }


 ?>
