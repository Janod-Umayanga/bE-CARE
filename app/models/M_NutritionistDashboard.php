<?php

   class M_NutritionistDashboard{
      private $db;

      public function __construct()
      {
        $this->db=new Database();
      }
    // login
      public function login($email,$password){
        $this->db->query('SELECT * FROM nutritionist WHERE email=:nutritionist_email');
        $this->db->bind(':nutritionist_email',$email);
        
        $row= $this->db->single();
        $hashed_password = $row->password;
        if(password_verify($password,$hashed_password)){
           return $row;
        }else{
          return false;
        }  
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

      // Get nutritionist by id
      public function getNutritionistbyId($nutritionist_id) {
          $this->db->query("SELECT * FROM nutritionist WHERE nutritionist_id = :nutritionist_id");
          $this->db->bind(':nutritionist_id', $nutritionist_id);
          
          return $this->db->single();
      }

      //find nutritionist by Email 
      public function findNutritionistByEmail($nutritionist_email){
        
          $this->db->query('SELECT * FROM nutritionist WHERE email= :nutritionist_email');
          $this->db->bind(':email',$nutritionist_email);  

          $row= $this->db->single();

          if($this->db->rowCount() >0){
               return true;
          }else{
               return false;
          }
     }

     // Get all requested diet plans details
     public function getAllRequestedDietPlanDetails($nutritionist_id){

         // $viewReq = 'viewReq';

        $this->db->query('SELECT * FROM request_diet_plan WHERE nutritionist_id= :nutritionist_id');
        $this->db->bind(':nutritionist_id',$nutritionist_id);  

        $row= $this->db->single();

        if($this->db->rowCount() >0){
             return true;
        }else{
             return false;
        }
     }

      // Get history from diet_plan table
     /* public function getHistory($nutritionist_id){

          // $viewReq = 'viewReq';
 
         $this->db->query('SELECT * FROM diet_plan WHERE nutritionist_id= :nutritionist_id');
         $this->db->bind(':nutritionist_id',$nutritionist_id);  
 
         $row= $this->db->single();
 
         if($this->db->rowCount() >0){
              return true;
         }else{
              return false;
         }
      }*/

    
}

 ?>
