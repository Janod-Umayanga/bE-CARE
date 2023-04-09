<?php

    class M_Patient {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Register patient
        public function register($data) {
            $this->db->query('INSERT INTO patient(first_name, last_name, nic, contact_number, gender, email, password)
            VALUES(:first_name, :last_name, :nic, :contact_number, :gender, :email, :password)');
            $this->db->bind(':first_name', $data['fname']);
            $this->db->bind(':last_name', $data['lname']);
            $this->db->bind(':nic', $data['nic']);
            $this->db->bind(':contact_number', $data['cnumber']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        // Find patient by email
        public function findPatientByEmail($email) {
            $this->db->query('SELECT * FROM patient WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            if($this->db->rowCount() > 0) {
                return $row;
            }
            else {
                return false;
            }
        }

        // Login patient
        public function login($email, $password) {
            $this->db->query('SELECT * FROM patient WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            // Verify password
            $hashed_pw = $row->password;
            if(password_verify($password, $hashed_pw)) {
                return $row;
            }
            else {
                return false;
            }
        }

        public function isDeactivateAccount($email){
            $this->db->query('SELECT delete_flag FROM patient WHERE email=:email');
            $this->db->bind(':email',$email);
            
            $row= $this->db->single();
            
            if($this->db->rowCount() >0){
              return $row;
              
            }else{
                  return false;
            }  
        }    

        // Get patient by id
        public function getPatientById($patient_id) {
            $this->db->query('SELECT * FROM patient WHERE patient_id = :patient_id');
            $this->db->bind(':patient_id', $patient_id);

            $row = $this->db->single();

            if($this->db->rowCount() > 0) {
                return $row;
            }
            else {
                return false;
            }
        }

        // Update patient details
        public function update($data, $patient_id) {
            $this->db->query('UPDATE patient SET first_name = :first_name, last_name = :last_name, nic = :nic, contact_number = :contact_number, gender = :gender WHERE patient_id = :patient_id');
            $this->db->bind(':first_name', $data['fname']);
            $this->db->bind(':last_name', $data['lname']);
            $this->db->bind(':nic', $data['nic']);
            $this->db->bind(':contact_number', $data['cnumber']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':patient_id', $patient_id);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        // Update patient password
        public function updatePW($data, $patient_id) {
            $this->db->query('UPDATE patient SET password = :password WHERE patient_id = :patient_id');
            $this->db->bind(':password', $data['newpw']);
            $this->db->bind(':patient_id', $patient_id);

            

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        // verify current password of patient
        public function verifyPW($patient_id, $password) {
            $this->db->query('SELECT * FROM patient WHERE patient_id = :patient_id');
            $this->db->bind(':patient_id', $patient_id);

            $row = $this->db->single();

            // Verify password
            $hashed_pw = $row->password;
            if(password_verify($password, $hashed_pw)) {
                return true;
            }
            else {
                return false;
            }
        }


        public function setToken($token,$email)
        {
            $this->db->query('UPDATE patient set verify_token=:token WHERE email = :email');
            $this->db->bind(':token',$token);
            $this->db->bind(':email',$email);
    
            if($this->db->execute()){
               return true;
            }else{
                return false;
            }    
        } 
    
        public function checkToken($email) {
          
          $this->db->query("SELECT verify_token FROM patient WHERE email = :email");
          $this->db->bind(':email',$email);
          
          $result=$this->db->single();
  
          return $result ? $result : false; 
      }

      public function changePW($data){

       
        $this->db->query('UPDATE patient set password = :password WHERE patient_id = :id');
        $this->db->bind(':password', $data['password']);
        
        $this->db->bind(':id', $data['user_id']);
          

        if($this->db->execute()){
           return true;
        }else{
            return false;
        } 
      }
      

    }

?>