<?php

    class M_Pharmacist {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Get All pharmacists
        public function getAllPharmacists() {
            $this->db->query('SELECT * FROM pharmacist WHERE delete_flag = 0');

            return $this->db->resultSet();
        }

        // Get pharmacists by a filter
        public function getPharmacists($name, $city) {
            $this->db->query("SELECT * FROM pharmacist WHERE CONCAT(pharmacy_name) LIKE '%$name%' AND city LIKE '%$city%' AND delete_flag = 0");

            return $this->db->resultSet();
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

        public function isDeactivateAccount($email){
            $this->db->query('SELECT delete_flag FROM pharmacist WHERE email=:email');
            $this->db->bind(':email',$email);
            
            $row= $this->db->single();
            
            if($this->db->rowCount() >0){
              return $row;
            }else{
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
        // get all orders details of Pharmacist
        public function getAllOrderDetailsOfPharmacist($pharmacist_id){
            $this->db->query('SELECT * FROM order_request  
            WHERE pharmacist_id= :pharmacist_id AND is_disabled = 0');
            $this->db->bind(':pharmacist_id',$pharmacist_id);  
    
           /* $row= $this->db->single();
    
            if($this->db->rowCount() >0){
                 return true;
            }else{
                 return false;
            }*/
            return $this->db->resultSet();
        }

        // get view more details about rquested orders
        public function getAllOrderDetailsMore($orderID){
            $this->db->query('SELECT * FROM order_request 
            WHERE  order_request_id = :order_request_id');
           // $this->db->bind(':pharmacist_id',$pharmacist_id); 
            $this->db->bind(':order_request_id',$orderID);
            
            return $this->db->single();

        }

        public function getAllPaidOrderDetails($pharmacist_id)
        {
            $this->db->query('SELECT * FROM accept_order
            WHERE pharmacist_id = :pharmacist_id AND  paid = 1');

            $this->db->bind(':pharmacist_id',$pharmacist_id);

            return $this->db->resultSet();
        }

        // View selling history
        public function getAllSellingHistory($pharmacist_id){

            $this->db->query('SELECT * FROM accept_order
            WHERE pharmacist_id = :pharmacist_id');
            $this->db->bind(':pharmacist_id',$pharmacist_id);  
    
            
            return $this->db->resultSet();

        }

        public function editUser($data) {
            $this->db->query('UPDATE pharmacist SET first_name = :first_name, last_name = :last_name,
            nic = :nic, contact_number = :contact_number, gender = :gender,
            pharmacy_name = :pharmacy_name,city= :city, address=:address,
            bank_name=:bank_name,account_holder_name=:account_holder_name,branch=:branch,
            account_number=:account_number WHERE pharmacist_id = :pharmacist_id');
            $this->db->bind(':first_name', $data['first_name']);
            $this->db->bind(':last_name', $data['last_name']);          
            $this->db->bind(':nic', $data['nic']);
            $this->db->bind(':contact_number', $data['contact_number']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':city', $data['city']);
            $this->db->bind(':pharmacy_name', $data['pharmacy_name']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':bank_name', $data['bank_name']);
            $this->db->bind(':account_holder_name', $data['account_holder_name']);
            $this->db->bind(':branch', $data['branch']);
            $this->db->bind(':account_number', $data['account_number']);
            $this->db->bind(':pharmacist_id',$data['pharmacist_id']);

            if($this->db->execute()) {
                $_SESSION['pharmacist_name'] = $data['first_name'];
                return true;
            }
            else {
                return false;
            }
        }
        
        public function sendAcceptOrderDetails($pharmacist_id,$data){
              $this->db->query('INSERT INTO accept_order (name,contact_number,delivery_address,
              prescription,ordered_date_and_time,pharmacist_note,charge,bill,
              pharmacist_id,patient_id,order_request_id) 
              VALUES (:name,:contact_number,:delivery_address,
              :prescription,:ordered_date_and_time,:pharmacist_note,:charge,:bill,
              :pharmacist_id,:patient_id,:order_request_id)');
  
              $this->db->bind(':name',$data['more']->name);
              $this->db->bind(':contact_number',$data['more']->contact_number);
              $this->db->bind(':delivery_address',$data['more']->delivery_address);
              $this->db->bind(':prescription',$data['more']->prescription);
              $this->db->bind(':ordered_date_and_time',$data['more']->ordered_date_and_time);
              $this->db->bind(':pharmacist_note',$data['pharmacist_note']);
              $this->db->bind(':charge',$data['charge']);
              $this->db->bind(':bill',$data['bill']);
              $this->db->bind(':pharmacist_id',$data['more']->pharmacist_id);
              $this->db->bind(':patient_id',$data['more']->patient_id);
              $this->db->bind(':order_request_id',$data['more']->order_request_id);
         //     $this->db->bind(':is_disabled',1);
  
              if($this->db->execute()) {
                  return true;
              }
              else {
                  return false;
              }
            
  
         }
       

         public function disableOrderUntilPaid($data)
         {

            $this->db->query('UPDATE order_request
            SET is_disabled = 1 WHERE order_request_id = :order_request_id');

            $this->db->bind(':order_request_id',$data['more']->order_request_id);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }


          }
    
          public function sendRejectOrderDetails($pharmacist_id,$data){
  
    /*          $this->db->query('INSERT INTO accept_order (name,contact_number,delivery_address,
              prescription,ordered_date_and_time,pharmacist_note,
              pharmacist_id,patient_id,order_request_id) 
              VALUES (:name,:contact_number,:delivery_address,
              :prescription,:ordered_date_and_time,:pharmacist_note,
              :pharmacist_id,:patient_id,:order_request_id)');
  
              $this->db->bind(':name',$data['more']->name);
              $this->db->bind(':contact_number',$data['more']->contact_number);
              $this->db->bind(':delivery_address',$data['more']->delivery_address);
              $this->db->bind(':prescription',$data['more']->prescription);
              $this->db->bind(':ordered_date_and_time',$data['more']->ordered_date_and_time);
              $this->db->bind(':pharmacist_note',$data['pharmacist_note']);
              $this->db->bind(':pharmacist_id',$data['more']->pharmacist_id);
              $this->db->bind(':patient_id',$data['more']->patient_id);
              $this->db->bind(':order_request_id',$data['more']->order_request_id);
  
              if($this->db->execute()) {
                  return true;
              }
              else {
                  return false;
              }
          */
          
          $this->db->query('DELETE FROM order_request WHERE order_request_id = :order_request_id');
          $this->db->bind(':order_request_id',$data['more']->order_request_id);

          if($this->db->execute())
          {
             return true;
          }
          else
          {
             return false;
          } 
  
         }
    
         // change password
         public function updatePW($data, $pharmacist_id) {
            $this->db->query('UPDATE pharmacist SET password = :password WHERE pharmacist_id = :pharmacist_id');
            $this->db->bind(':password', $data['newpw']);
            $this->db->bind(':pharmacist', $pharmacist_id);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function changePW($data){

       
            $this->db->query('UPDATE pharmacist set password = :password WHERE pharmacist_id = :id');
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':id', $data['user_id']);
                
    
            if($this->db->execute()){
               return true;
            }else{
                return false;
            } 
          }

        public function findUserPWMatch($id,$password){
            $this->db->query('SELECT password FROM pharmacist WHERE pharmacist_id=:id');
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
              $this->db->query('UPDATE pharmacist set verify_token=:token WHERE email = :email');
              $this->db->bind(':token',$token);
              $this->db->bind(':email',$email);
      
              if($this->db->execute()){
                 return true;
              }else{
                  return false;
              }    
          } 
      
          public function checkToken($email) {
            
            $this->db->query("SELECT verify_token FROM pharmacist WHERE email = :email");
            $this->db->bind(':email',$email);
            
            $result=$this->db->single();
    
            return $result ? $result : false; 
        }
  

        public function isDeactivateAccount($email){
            $this->db->query('SELECT delete_flag FROM pharmacist WHERE email=:email');
            $this->db->bind(':email',$email);
            
            $row= $this->db->single();
            
            if($this->db->rowCount() >0){
              return $row;
              
            }else{
                  return false;
            }  
        }    

    
    }
  

?>
