<?php

    class M_Counsellor {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Get All counsellors
        public function getAllCounsellors() {
            $this->db->query('SELECT * FROM counsellor');

            return $this->db->resultSet();
        }

        // Get counsellors by a filter
        public function getCounsellors($filter) {
            $this->db->query("SELECT * FROM counsellor WHERE CONCAT(first_name,last_name) LIKE '%$filter%'");

            return $this->db->resultSet();
        }

        // Get counsellor by id
        public function getCounsellorbyId($counsellor_id) {
            $this->db->query("SELECT * FROM counsellor WHERE counsellor_id = :counsellor_id");
            $this->db->bind(':counsellor_id', $counsellor_id);
            
            return $this->db->single();
        }

        // Find counsellor by email
        public function findCounsellorByEmail($email) {
            $this->db->query('SELECT * FROM counsellor WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            if($this->db->rowCount() > 0) {
                return true;
            }
            else {
                return false;
            }
        }

        // Login counsellor
        public function login($email, $password) {
            $this->db->query('SELECT * FROM counsellor WHERE email = :email');
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
            $this->db->query('SELECT delete_flag FROM counsellor WHERE email=:email');
            $this->db->bind(':email',$email);
            
            $row= $this->db->single();
            
            if($this->db->rowCount() >0){
              return $row;
            }else{
                  return false;
            }  
        }    

        public function updatePW($data, $counsellor_id) {
            $this->db->query('UPDATE counsellor SET password = :password WHERE counsellor_id = :counsellor_id');
            $this->db->bind(':password', $data['newpw']);
            $this->db->bind(':counsellor_id', $counsellor_id);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function changePW($data){

       
            $this->db->query('UPDATE counsellor set password = :password WHERE counsellor_id = :id');
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':id', $data['counsellor_id']);
                
    
            if($this->db->execute()){
               return true;
            }else{
                return false;
            } 
          }

        public function findUserPWMatch($id,$password){
            $this->db->query('SELECT password FROM counsellor WHERE counsellor_id=:id');
            $this->db->bind(':id',$id);
            
            $row= $this->db->single();
            $hashed_password =$row->password;
            if(password_verify($password,$hashed_password)){
               return true;
            }else{
              return false;
            }  
    
          }

        public function findCounsellorByID($id)
      {
        $this->db->query('SELECT * FROM counsellor WHERE counsellor_id= :id');
        $this->db->bind(':id',$id);  

        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
       }

       public function editUser($data){
        $this->db->query('UPDATE counsellor set first_name=:first_name, last_name = :last_name, nic = :nic,slmc_reg_number = :slmc_reg_number,contact_number=:contact_number, bank_name = :bank_name, account_holder_name = :account_holder_name, branch=:branch, account_number = :account_number, gender = :gender, city=:city WHERE counsellor_id = :id');
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name',$data['last_name']);
        $this->db->bind(':nic', $data['nic']);
        $this->db->bind(':slmc_reg_number', $data['slmc_reg_number']);
        $this->db->bind(':contact_number', $data['contact_number']);
        $this->db->bind(':bank_name', $data['bank_name']);
        $this->db->bind(':account_holder_name', $data['account_holder_name']);
        $this->db->bind(':branch', $data['branch']);
        $this->db->bind(':account_number', $data['account_number']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':id', $data['counsellor_id']);
        $this->db->bind(':city', $data['city']);
        
             
       
        
        if($this->db->execute()){
           $_SESSION['counsellor_name']=$data['first_name'];
           return true;
        }else{
            return false;
        } 
      }

    }

?>