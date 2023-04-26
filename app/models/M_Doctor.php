<?php

    class M_Doctor {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Get All doctors
        public function getAllDoctors() {
            $this->db->query('SELECT * FROM doctor');

            return $this->db->resultSet();
        }

        // Get doctors by a filter
        public function getDoctors($name, $specialization, $city, $day) {
            $this->db->query("SELECT * FROM doctor WHERE CONCAT(first_name,last_name) LIKE '%$name%' AND specialization LIKE '%$specialization%' AND city LIKE '%$city%'");

            $today = date("Y-m-d");
            $tommorow = date("Y-m-d", strtotime('tomorrow'));

            if($day == 'Today') {
                $this->db->query("SELECT doctor_channel_day.doctor_id, doctor.* FROM doctor_channel_day INNER JOIN doctor ON doctor_channel_day.doctor_id = doctor.doctor_id WHERE day = '$today'");
            }
            else if($day == 'Tommorow') {
                $this->db->query("SELECT doctor_channel_day.doctor_id, doctor.* FROM doctor_channel_day INNER JOIN doctor ON doctor_channel_day.doctor_id = doctor.doctor_id WHERE day = '$tommorow'");
            }

            return $this->db->resultSet();
        }

        // Get doctor by id
        public function getDoctorbyId($doctor_id) {
            $this->db->query("SELECT * FROM doctor WHERE doctor_id = :doctor_id");
            $this->db->bind(':doctor_id', $doctor_id);
            
            return $this->db->single();
        }

        // // Get doctors for today
        // public function getDoctorsForToday() {
        //     $today = date("Y-m-d");
        // }

        // // Get doctors for Tommorow
        // public function getDoctorsForTommorow() {
        //     $tommorow = date("Y-m-d", strtotime('tomorrow'));
        // }

        // Find doctor by email
        public function findDoctorByEmail($email) {
            $this->db->query('SELECT * FROM doctor WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            if($this->db->rowCount() > 0) {
                return $row;
            }
            else {
                return false;
            }
        }

        // Login doctor
        public function login($email, $password) {
            $this->db->query('SELECT * FROM doctor WHERE email = :email');
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
            $this->db->query('SELECT delete_flag FROM doctor WHERE email=:email');
            $this->db->bind(':email',$email);
            
            $row= $this->db->single();
            
            if($this->db->rowCount() >0){
              return $row;
            }else{
                  return false;
            }  
        }    

        public function updatePW($data, $doctor_id) {
            $this->db->query('UPDATE doctor SET password = :password WHERE doctor_id = :doctor_id');
            $this->db->bind(':password', $data['newpw']);
            $this->db->bind(':doctor_id', $doctor_id);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function changePW($data){

       
            $this->db->query('UPDATE doctor set password = :password WHERE doctor_id = :id');
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':id', $data['user_id']);
                
    
            if($this->db->execute()){
               return true;
            }else{
                return false;
            } 
          }

        public function findUserPWMatch($id,$password){
            $this->db->query('SELECT password FROM doctor WHERE doctor_id=:id');
            $this->db->bind(':id',$id);
            
            $row= $this->db->single();
            $hashed_password =$row->password;
            if(password_verify($password,$hashed_password)){
               return true;
            }else{
              return false;
            }  
    
          }

        public function findDoctorByID($id)
      {
        $this->db->query('SELECT * FROM doctor WHERE doctor_id= :id');
        $this->db->bind(':id',$id);  

        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
       }

       public function editUser($data){
        $this->db->query('UPDATE doctor set first_name=:first_name, last_name = :last_name, nic = :nic,slmc_reg_number = :slmc_reg_number,specialization=:specialization, type = :type ,contact_number=:contact_number, bank_name = :bank_name, account_holder_name = :account_holder_name, branch=:branch, account_number = :account_number, gender = :gender, city=:city WHERE doctor_id = :id');
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name',$data['last_name']);
        $this->db->bind(':nic', $data['nic']);
        $this->db->bind(':slmc_reg_number', $data['slmc_reg_number']);
        $this->db->bind(':specialization', $data['specialization']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':contact_number', $data['contact_number']);
        $this->db->bind(':bank_name', $data['bank_name']);
        $this->db->bind(':account_holder_name', $data['account_holder_name']);
        $this->db->bind(':branch', $data['branch']);
        $this->db->bind(':account_number', $data['account_number']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':id', $data['doctor_id']);
        $this->db->bind(':city', $data['city']);
        
             
       
        
        if($this->db->execute()){
           $_SESSION['doctor_name']=$data['first_name'];
           return true;
        }else{
            return false;
        } 
      }


      public function setToken($token,$email)
      {
          $this->db->query('UPDATE doctor set verify_token=:token WHERE email = :email');
          $this->db->bind(':token',$token);
          $this->db->bind(':email',$email);
  
          if($this->db->execute()){
             return true;
          }else{
              return false;
          }    
      } 
  
      public function checkToken($email) {
        
        $this->db->query("SELECT verify_token FROM doctor WHERE email = :email");
        $this->db->bind(':email',$email);
        
        $result=$this->db->single();

        return $result ? $result : false; 
    }

   


    }

?>