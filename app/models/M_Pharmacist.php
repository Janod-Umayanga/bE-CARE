<?php

    class M_Pharmacist {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }


        // Get pharmacist by id
        public function getPharmacistbyId($pharmacist_id) {
            $this->db->query("SELECT * FROM pharmacist WHERE pharmacist_id = :pharmacist_id");
            $this->db->bind(':pharmacist_id', $pharmacist_id);
            
            return $this->db->single();
        }

        public function findPharmacistByEmail($email) {
            $this->db->query('SELECT * FROM pharmacist WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            if($this->db->rowCount() > 0) {
                return true;
            }
            else {
                return false;
            }
        }

        // Login pharmacist
        public function login($email, $password) {
            $this->db->query('SELECT * FROM pharmacist WHERE email = :email');
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

        // get all orders details of Pharmacist
        public function getAllOrderDetails($pharmacist_id){
            $this->db->query('SELECT * FROM  WHERE pharmacist_id= :pharmacist_id');
            $this->db->bind(':pharmacist_id',$pharmacist_id);  
    
            $row= $this->db->single();
    
            if($this->db->rowCount() >0){
                 return true;
            }else{
                 return false;
            }
        }
    }

?>