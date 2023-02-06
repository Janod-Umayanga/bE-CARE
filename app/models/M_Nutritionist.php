<?php

    class M_Nutritionist {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Get All nutritionists
        public function getAllNutritionists() {
            $this->db->query('SELECT * FROM nutritionist');

            return $this->db->resultSet();
        }

        // Get nutritionists by a filter
        public function getNutritionists($filter) {
            $this->db->query("SELECT * FROM nutritionist WHERE CONCAT(first_name,last_name) LIKE '%$filter%'");

            return $this->db->resultSet();
        }

        // Get doctor by id
        public function getNutritionistbyId($nutritionist_id) {
            $this->db->query("SELECT * FROM nutritionist WHERE nutritionist_id = :nutritionist_id");
            $this->db->bind(':nutritionist_id', $nutritionist_id);
            
            return $this->db->single();
        }
        
          // Find nutritionist by email
        public function findNutritionistByEmail($email) {
            $this->db->query('SELECT * FROM nutritionist WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            if($this->db->rowCount() > 0) {
                return true;
            }
            else {
                return false;
            }
        }
        
        // Get all requested diet plans of logged nutritionist
        public function getAllRequestedDietPlanDetails($nutritionist_id){
        $this->db->query('SELECT * FROM request_diet_plan inner join nutritionist on 
        nutritionist.nutritionist_id =request_diet_plan.nutritionist_id
        WHERE nutritionist.nutritionist_id = :nutritionist_id');
        $this->db->bind(':nutritionist_id',$nutritionist_id);  

        return $this->db->resultSet();
        }
        
         // Get all requested diet plans of logged nutritionist(more details)
         public function getAllRequestedDietPlanMoreDetails($nutritionist_id){
            $this->db->query('SELECT * FROM request_diet_plan inner join nutritionist on 
            nutritionist.nutritionist_id =request_diet_plan.nutritionist_id
            WHERE nutritionist.nutritionist_id = :nutritionist_id');
            $this->db->bind(':nutritionist_id',$nutritionist_id);  
    
            return $this->db->resultSet();
            }

        // get all issued diet plans history of nutritionist
        public function viewHistoryPage($nutritionist_id){
            $this->db->query('SELECT * FROM diet_plan
            WHERE nutritionist_id = :nutritionist_id');
            $this->db->bind(':nutritionist_id',$nutritionist_id);  
    
            return $this->db->single();
         }
             
        // Login nutritionist
        public function login($email, $password) {
            $this->db->query('SELECT * FROM nutritionist WHERE email = :email');
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
        
        
        

        
    }

?>
