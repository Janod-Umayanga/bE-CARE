<?php

   class M_Pages{
      private $db;

      public function __construct()
      {
        $this->db=new Database();
      }

      public function getUsers()
      {
        $this->db->query('SELECT * FROM Users');
        return $this->db->resultSet();
      }


            
      public function getAllfeedBack()
      {
        $this->db->query('SELECT * FROM feedback ORDER BY feedback_date DESC');
        return $this->db->resultSet();
      }


      public function getPatientDetails()
      {
        $this->db->query('SELECT * FROM patient');
        return $this->db->resultSet();
      }


   }


 ?>
