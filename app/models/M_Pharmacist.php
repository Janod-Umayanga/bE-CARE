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

        // get number of pending orders of pharmacist
        public function pharmacistPendingOrdersCount($pharmacist_id)
        {
          $this->db->query('SELECT COUNT(order_request_id) 
          AS pending_orders_count FROM order_request 
          WHERE status= :status 
          AND pharmacist_id=:pharmacist_id ');
          $this->db->bind(':pharmacist_id', $pharmacist_id);
          $this->db->bind(':status', "p");  
                        
          $row=$this->db->single();
          return $row;                 
        } 

        // get number of accepted orders of pharmacist
        public function pharmacistAcceptedOrdersCount($pharmacist_id){
        /*  $this->db->query('SELECT COUNT(order_request_id)
          AS accpted_orders_count FROM order_request
          WHERE status = :status
          AND pharmacist_id=:pharmacist_id '); */
          $this->db->query('SELECT COUNT(order_id) AS 
          accpted_orders_count FROM accept_order 
          WHERE pharmacist_id=:pharmacist_id AND 
          paid_amount = 0');
          $this->db->bind(':pharmacist_id', $pharmacist_id);
        //  $this->db->bind(':pharmacist_id', $pharmacist_id);
        //  $this->db->bind(':status', "a");  
                       
          return $this->db->single();
         // return $row;                 
        } 

        // get number of rejected orders of pharmacist
        public function pharmacistRejectedOrdersCount($pharmacist_id)
        {
          $this->db->query('SELECT COUNT(order_request_id) 
          AS rejected_orders_count FROM order_request 
          WHERE status= :status 
          AND pharmacist_id=:pharmacist_id ');
          $this->db->bind(':pharmacist_id', $pharmacist_id);
          $this->db->bind(':status', "r");  
                        
          $row=$this->db->single();
          return $row;                 
        } 

         // get number of rejected orders of pharmacist
         public function pharmacistPaidOrdersCount($pharmacist_id)
         {
           $this->db->query('SELECT COUNT(order_id) 
           AS paid_orders_count FROM accept_order 
           WHERE paid_amount > 0 
           AND pharmacist_id=:pharmacist_id ');
           $this->db->bind(':pharmacist_id', $pharmacist_id); 
                         
           $row=$this->db->single();
           return $row;              
           
         } 


        // get all pending details of Pharmacist
        public function getAllPendingOrderDetailsOfPharmacist($pharmacist_id){
            $this->db->query('SELECT * FROM order_request  
            WHERE pharmacist_id= :pharmacist_id AND status = :status');
            $this->db->bind(':pharmacist_id',$pharmacist_id);
            $this->db->bind(':status', "p");

            return $this->db->resultSet();
        }

        // get all accepted details of Pharmacist
        public function getAllAcceptedOrderDetailsOfPharmacist($pharmacist_id){
        /*    $this->db->query('SELECT * FROM order_request  
            WHERE pharmacist_id= :pharmacist_id AND status = :status');
            $this->db->bind(':pharmacist_id',$pharmacist_id);
            $this->db->bind(':status', "a");
            $this->db->execute(); */

            $this->db->query('SELECT * FROM accept_order  
            WHERE pharmacist_id= :pharmacist_id AND paid_amount=:paid_amount');
            $this->db->bind(':pharmacist_id',$pharmacist_id);
            $this->db->bind(':paid_amount',0);

            return $this->db->resultSet();

           }

      

        public function deleteAcceptedOrderIfNotPaidWithin5Days($pharmacist_id)
        {
            $this->db->query('DELETE FROM accept_order WHERE pharmacist_id= :pharmacist_id AND 
            AND accepted_date_and_time <= DATE_SUB(NOW(), INTERVAL 3 DAY )' );
            $this->db->bind(':pharmacist_id',$pharmacist_id);
          //  $this->db->query(':paid_amount', 0);

            
        //    $this->db->execute();

             // Check if the delete query was successful
         //  if ($this->db->rowCount() > 0){

        /*    $this->db->query('UPDATE order_request SET status = :status WHERE 
            pharmacist_id= :pharmacist_id');
            $this->db->bind(':pharmacist_id',$pharmacist_id);
            $this->db->bind(':status', "r");
            $this->db->execute(); 

        */

         //  }
           
           return $this->db->resultSet();

        }

        // get all rejected details of Pharmacist
        public function getAllRejectedOrderDetailsOfPharmacist($pharmacist_id){
            $this->db->query('SELECT * FROM order_request  
            WHERE pharmacist_id= :pharmacist_id AND status = :status');
            $this->db->bind(':pharmacist_id',$pharmacist_id);
            $this->db->bind(':status', "r");
            
            return $this->db->resultSet();
        }
       
        // get all rejected details of Pharmacist
        public function  getAllPaidOrderDetailsOfPharmacist($pharmacist_id){
            $this->db->query('SELECT * FROM accept_order  
            WHERE pharmacist_id= :pharmacist_id AND paid_amount > 0 ');
            $this->db->bind(':pharmacist_id',$pharmacist_id);
            
            return $this->db->resultSet();
        }

        // get all orders details of Pharmacist
        public function getAllOrderDetails($pharmacist_id){
            $this->db->query('SELECT * FROM  WHERE pharmacist_id= :pharmacist_id ');
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
            WHERE pharmacist_id= :pharmacist_id AND status = :status');
            $this->db->bind(':pharmacist_id',$pharmacist_id);
            $this->db->bind(':status', "p");
    
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

        // get all accepted order details for reject after 3 days(after accepting order by pharmacist)
        public function getAllAcceptedOrderDetails($pharmacist_id)
        {
            $this->db->query('SELECT * FROM accept_order  
            WHERE pharmacist_id= :pharmacist_id AND paid_amount=:paid_amount');
            $this->db->bind(':pharmacist_id',$pharmacist_id);
            $this->db->bind(':paid_amount',0);
           
    
           /* $row= $this->db->single();
    
            if($this->db->rowCount() >0){
                 return true;
            }else{
                 return false;
            }*/
            return $this->db->resultSet();
        }

        public function getAllAcceptedOrderDetailsMore($orderID)
        {
            $this->db->query('SELECT * FROM accept_order 
            WHERE order_request_id= :order_request_id AND paid_amount= :paid_amount');
            $this->db->bind(':order_request_id',$orderID);
            $this->db->bind(':paid_amount',0);

          /*  $row= $this->db->single();
    
            if($this->db->rowCount() >0){
                 return true;
            }else{
                 return false;
            } */

           // return $this->db->resultSet();
            return $this->db->single();

        }

        // View selling history
        public function getAllSellingHistory($pharmacist_id){

            $this->db->query('SELECT * FROM accept_order
            WHERE pharmacist_id = :pharmacist_id AND paid_amount > 0' );
            $this->db->bind(':pharmacist_id',$pharmacist_id);  

    
            
            return $this->db->resultSet();

        }

        public function getAllSellingHistoryMore($order_Id){

            $this->db->query('SELECT * FROM accept_order
            WHERE order_id = :order_id' );
            $this->db->bind(':order_id', $order_Id);
    
            return $this->db->single();
           // return $this->db->resultSet();

        }

        public function editUser($data) {
            $this->db->query('UPDATE pharmacist SET first_name = :first_name, last_name = :last_name,
            contact_number = :contact_number, gender = :gender,
            pharmacy_name = :pharmacy_name,city= :city, address=:address,
            bank_name=:bank_name,account_holder_name=:account_holder_name,branch=:branch,
            account_number=:account_number WHERE pharmacist_id = :pharmacist_id');
            $this->db->bind(':first_name', $data['first_name']);
            $this->db->bind(':last_name', $data['last_name']);          
        //    $this->db->bind(':nic', $data['nic']);
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

            // Find  Nutritionist by Contact Number
    
      public function findPharmacistByContactNumber($contact_number)
      {
        $this->db->query('SELECT * FROM pharmacist WHERE contact_number= :contact_number');
        $this->db->bind(':contact_number',$contact_number);  

        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return true;
        }else{
              return false;
        }
    }

       // Find Requested Nutritionist by Contact Number
    
      public function findReqPharmacistByContactNumber($contact_number)
      {
            $this->db->query('SELECT * FROM requested_pharmacist WHERE contact_number= :contact_number');
            $this->db->bind(':contact_number',$contact_number);  

            $row= $this->db->single();

            if($this->db->rowCount() >0){
                  return true;
            }else{
                  return false;
            }
      }


         // Find  Nutritionist by Account Number
            
         public function findPharmacistByAccountNumber($account_number)
         {
         $this->db->query('SELECT * FROM pharmacist WHERE account_number= :account_number');
         $this->db->bind(':account_number',$account_number);  

         $row= $this->db->single();

         if($this->db->rowCount() >0){
               return true;
         }else{
               return false;
         }
         }

         // Find Requested Nutritionist by Account Number

         public function findReqPharmacistByAccountNumber($account_number)
         {
               $this->db->query('SELECT * FROM requested_pharmacist WHERE account_number= :account_number');
               $this->db->bind(':account_number',$account_number);  

               $row= $this->db->single();

               if($this->db->rowCount() >0){
                     return true;
               }else{
                     return false;
               }
         }
        



        public function sendAcceptOrderDetails($pharmacist_id,$data){
              $this->db->query('INSERT INTO accept_order (name,contact_number,delivery_address,
              prescription,ordered_date_and_time,pharmacist_note,charge,
              pharmacist_id,patient_id,order_request_id,paid_amount) 
              VALUES (:name,:contact_number,:delivery_address,
              :prescription,:ordered_date_and_time,:pharmacist_note,:charge,
              :pharmacist_id,:patient_id,:order_request_id,:paid_amount)');
  
              $this->db->bind(':name',$data['more']->name);
              $this->db->bind(':contact_number',$data['more']->contact_number);
              $this->db->bind(':delivery_address',$data['more']->delivery_address);
              $this->db->bind(':prescription',$data['more']->prescription);
              $this->db->bind(':ordered_date_and_time',$data['more']->ordered_date_and_time);
              $this->db->bind(':pharmacist_note',$data['pharmacist_note']);
              $this->db->bind(':charge',$data['charge']);
              $this->db->bind(':pharmacist_id',$data['more']->pharmacist_id);
              $this->db->bind(':patient_id',$data['more']->patient_id);
              $this->db->bind(':order_request_id',$data['more']->order_request_id);
              $this->db->bind(':paid_amount',0);
         //    
  
              if($this->db->execute()) {
                  return true;
              }
              else {
                  return false;
              }
            
  
         }
       

         public function acceptedOrderDetails($data)
         {
            $this->db->query('UPDATE order_request
            SET status= "a" WHERE order_request_id = :order_request_id');

          //  $this->db->bind(':status', "a");
            $this->db->bind(':order_request_id',$data['more']->order_request_id);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
          }
    
          public function rejectOrderDetails($pharmacist_id,$data){ 
          
          $this->db->query('UPDATE order_request 
          SET status = "r" WHERE order_request_id = :order_request_id');
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



         public function sendOrderforCustomer($orderID,$data)
         {
            $this->db->query('UPDATE accept_order SET is_send=1
            AND pharmacist_note=:pharmacist_note where order_request_id=:order_request_id');
           
           
            $this->db->bind(':pharmacist_note',$data['pharmacist_note']);
            $this->db->bind(':order_request_id',$orderID);

            if($this->db->execute()) {
                return true;
            }
            else {
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

        public function changePWPharmacist($data){

       
            $this->db->query('UPDATE pharmacist set password = :password WHERE pharmacist_id = :id');
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':id', $data['pharmacist_id']);
                
    
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


        public function getPatientDetailsById($patient_id) {
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


        public function getPatientDetails($patient_id) {
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


  

       
       
  

    
    }
  

?>
