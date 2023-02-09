<?php

    class M_Nutritionist {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }


        // Get nutritionist by id
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
            $this->db->query('SELECT * FROM diet_plan INNER JOIN nutritionist ON
            nutritionist.nutritionist_id = diet_plan.nutritionist_id
            WHERE nutritionist.nutritionist_id = :nutritionist_id');
            $this->db->bind(':nutritionist_id',$nutritionist_id);  
    
            return $this->db->resultSet();
         }

        // insert data to diet_plan table(issue a diet plan)
        public function issueDietPlans($nutritionist_id,$data){
        $this->db->query('INSERT INTO diet_plan (diet_plan_id,description,diet_plan_file,issued_date_and_time,
        nutritionist_id,request_diet_plan_id) 
        VALUES( :diet_plan_id, :description,:diet_plan_file,:issued_date_and_time,
        :nutritionist_id,:request_diet_plan_id)');
        
        $this->db->bind(':diet_plan_id',$data['diet_plan_id']);
        $this->db->bind(':description',$data['description']);
        $this->db->bind(':diet_plan_file',$data['diet_plan_file']);      
        $this->db->bind(':issued_date_and_time',$data['issued_date_and_time']);
        $this->db->bind(':nutritionist_id',$data['nutritionist_id']);
        $this->db->bind(':request_diet_plan_id',$data['request_diet_plan_id']);

        

    
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

        public function update($data, $nutritionist_id) {
            $this->db->query('UPDATE nutritionist SET first_name = :first_name, last_name = :last_name, nic = :nic, contact_number = :contact_number, gender = :gender WHERE patient_id = :patient_id');
            $this->db->bind(':first_name', $data['fname']);
            $this->db->bind(':last_name', $data['lname']);
            $this->db->bind(':nic', $data['nic']);
            $this->db->bind(':contact_number', $data['cnumber']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':patient_id', $nutritionist_id);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

    }

?>