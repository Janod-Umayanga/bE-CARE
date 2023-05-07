<?php

    class M_Nutritionist {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Get All nutritionists
        public function getAllNutritionists() {
            $this->db->query('SELECT * FROM nutritionist WHERE delete_flag = 0');

            return $this->db->resultSet();
        }

        // Get nutritionists by a filter
        public function getNutritionists($filter) {
            $this->db->query("SELECT * FROM nutritionist WHERE CONCAT(first_name,last_name) LIKE '%$filter%' AND delete_flag = 0");

            return $this->db->resultSet();
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
                return $row;
            }
            else {
                return false;
            }
        }

        // Get all requested diet plans of logged nutritionist
        public function getAllRequests($nutritionist_id){
            $this->db->query('SELECT * FROM request_diet_plan 
            WHERE nutritionist_id = :nutritionist_id AND is_issued = 0 
            ORDER BY requested_date_and_time ASC');
            $this->db->bind(':nutritionist_id',$nutritionist_id);  
     
            return $this->db->resultSet();
        }
       

         // Get all requested diet plans of logged nutritionist(more details)
         public function getAllRequestsMore($dietID) {
            $this->db->query('SELECT * FROM request_diet_plan 
            WHERE request_diet_plan_id = :request_diet_plan_id');
            $this->db->bind(':request_diet_plan_id', $dietID);
            return $this->db->single();
        }
       
        // get all issued diet plans history of nutritionist
        public function viewHistoryPage($nutritionist_id){
            $this->db->query('SELECT * FROM diet_plan 
            WHERE nutritionist_id = :nutritionist_id ORDER BY issued_date_and_time ASC ');
            $this->db->bind(':nutritionist_id',$nutritionist_id);  
     
            return $this->db->resultSet();
         }

         public function viewHistoryPageMore($diet_plan_id) {
            $this->db->query('SELECT * FROM diet_plan WHERE diet_plan_id = :diet_plan_id');
            $this->db->bind(':diet_plan_id', $diet_plan_id);
            return $this->db->single();
        }
        

        // insert data to diet_plan table(issue a diet plan)
        public function insertDietPlanDetails($nutritionist_id,$data){
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

        public function getRequestedDietPlanDetailsById($request_diet_plan_id){
            $this->db->query('SELECT * FROM request_diet_plan
            WHERE request_diet_plan_id = :request_diet_plan_id');
            $this->db->bind(':request_diet_plan_id', $request_diet_plan_id);
    
            return $this->db->resultSet();
        }

        public function isDeactivateAccount($email){
            $this->db->query('SELECT delete_flag FROM nutritionist WHERE email=:email');
            $this->db->bind(':email',$email);
            
            $row= $this->db->single();
            
            if($this->db->rowCount() >0){
              return $row;
            }else{
                  return false;
            }  
        }    

        public function issueDietPlansDetails($dietPlanID){
            $this->db->query('SELECT * FROM request_diet_plan 
            WHERE request_diet_plan_id = :request_diet_plan_id');
            $this->db->bind(':request_diet_plan_id', $dietPlanID);

        return $this->db->resultSet();
        }

        public function editUser($data) {
            $this->db->query('UPDATE nutritionist SET first_name = :first_name, last_name = :last_name,
            nic = :nic, contact_number = :contact_number, gender = :gender,
            bank_name=:bank_name,account_holder_name=:account_holder_name,branch=:branch,
            account_number=:account_number, fee=:fee WHERE nutritionist_id = :nutritionist_id');
            $this->db->bind(':first_name', $data['first_name']);
            $this->db->bind(':last_name', $data['last_name']);
        //   $this->db->bind(':slmc_reg_number', $data['slmc_reg_number']);           
            $this->db->bind(':nic', $data['nic']);
            $this->db->bind(':contact_number', $data['contact_number']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':bank_name', $data['bank_name']);
            $this->db->bind(':account_holder_name', $data['account_holder_name']);
            $this->db->bind(':branch', $data['branch']);
            $this->db->bind(':account_number', $data['account_number']);
            $this->db->bind(':fee', $data['fee']);
            $this->db->bind(':nutritionist_id',$data['nutritionist_id']);

            if($this->db->execute()) {
                $_SESSION['nutritionist_name'] = $data['first_name'];
                return true;
            }
            else {
                return false;
            }

            
        }

        // Find  Nutritionist by Contact Number
    
      public function findNutritionistByContactNumber($contact_number)
      {
        $this->db->query('SELECT * FROM nutritionist WHERE contact_number= :contact_number');
        $this->db->bind(':contact_number',$contact_number);  

        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return true;
        }else{
              return false;
        }
    }

       // Find Requested Nutritionist by Contact Number
    
      public function findReqNutritionistByContactNumber($contact_number)
      {
            $this->db->query('SELECT * FROM requested_nutritionist WHERE contact_number= :contact_number');
            $this->db->bind(':contact_number',$contact_number);  

            $row= $this->db->single();

            if($this->db->rowCount() >0){
                  return true;
            }else{
                  return false;
            }
      }


           

           // Find  Nutritionist by Account Number
            
            public function findNutritionistByAccountNumber($account_number)
            {
            $this->db->query('SELECT * FROM nutritionist WHERE account_number= :account_number');
            $this->db->bind(':account_number',$account_number);  

            $row= $this->db->single();

            if($this->db->rowCount() >0){
                  return true;
            }else{
                  return false;
            }
            }

            // Find Requested Nutritionist by Account Number

            public function findReqNutritionistByAccountNumber($account_number)
            {
                  $this->db->query('SELECT * FROM requested_nutritionist WHERE account_number= :account_number');
                  $this->db->bind(':account_number',$account_number);  

                  $row= $this->db->single();

                  if($this->db->rowCount() >0){
                        return true;
                  }else{
                        return false;
                  }
            }

        public function sendDietPlanDetails($nutritionist_id,$data)
        {
            $this->db->query('INSERT INTO diet_plan (description,diet_plan_file
            ,nutritionist_id,patient_id,request_diet_plan_id) 
            VALUES (:description,:diet_plan_file,:nutritionist_id,:patient_id, :request_diet_plan_id)');

            $this->db->bind(':description',$data['description']);
            $this->db->bind(':diet_plan_file',$data['diet_plan_file']); 
            $this->db->bind(':nutritionist_id',$nutritionist_id);
            $this->db->bind(':patient_id',$data['more']->patient_id);
            $this->db->bind(':request_diet_plan_id',$data['more']->request_diet_plan_id);
          //  $this->db->bind(':diet_plan_id',$data['more']->diet_plan_id); 
         //   $this->db->bind(':issued_date_and_time',GETDATE());

            if($this->db->execute()){
                return true;
             }else{
                 return false;
             } 

        
        }
        // After sent a diet plan Then delete requests from diet_plan_requets table
        public function removeRequest($data)
        {
            $this->db->query('UPDATE  request_diet_plan SET is_issued = 1 WHERE request_diet_plan_id=:request_diet_plan_id');
            $this->db->bind(':request_diet_plan_id', $data['more']->request_diet_plan_id);

            if($this->db->execute())
            {
               return true;
            }
            else
            {
               return false;
            } 
         }

         public function updatePW($data, $nutritionist_id) {
            $this->db->query('UPDATE nutritionist SET password = :password WHERE nutritionist_id = :nutritionist_id');
            $this->db->bind(':password', $data['newpw']);
            $this->db->bind(':nutritionist', $nutritionist_id);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function changePW($data){

       
            $this->db->query('UPDATE nutritionist set password = :password WHERE nutritionist_id = :id');
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':id', $data['user_id']);
                
    
            if($this->db->execute()){
               return true;
            }else{
                return false;
            } 
          }

          
          public function changePWNutritionist($data){

       
            $this->db->query('UPDATE nutritionist set password = :password WHERE nutritionist_id = :id');
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':id', $data['nutritionist_id']);
                
    
            if($this->db->execute()){
               return true;
            }else{
                return false;
            } 
        }



        public function findUserPWMatch($id,$password){
            $this->db->query('SELECT password FROM nutritionist WHERE nutritionist_id=:id');
            $this->db->bind(':id',$id);
            
            $row= $this->db->single();
            $hashed_password =$row->password;
            if(password_verify($password,$hashed_password)){
               return true;
            }else{
              return false;
            }  
    
          }

          public function setToken($token,$email)
          {
              $this->db->query('UPDATE nutritionist set verify_token=:token WHERE email = :email');
              $this->db->bind(':token',$token);
              $this->db->bind(':email',$email);
      
              if($this->db->execute()){
                 return true;
              }else{
                  return false;
              }    
          } 
      
          public function checkToken($email) {
            
            $this->db->query("SELECT verify_token FROM nutritionist WHERE email = :email");
            $this->db->bind(':email',$email);
            
            $result=$this->db->single();
    
            return $result ? $result : false; 
        }
  


    }

?>