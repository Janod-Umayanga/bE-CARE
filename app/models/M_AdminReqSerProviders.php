<?php

   class M_AdminReqSerProviders{
      private $db;

      public function __construct()
      {
        $this->db=new Database();
       

      }

      //Get No Of Req Doctors
      public function getNoOfReqDoctors()
      {
        $this->db->query('SELECT COUNT(requested_doctor_id) as doctor_count FROM requested_doctor WHERE email_verified_flag=:email_verified_flag');
        $this->db->bind(':email_verified_flag',1);
        
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 

      //Get No Of Req Counsellors
      public function getNoOfReqCounsellors()
      {
        $this->db->query('SELECT COUNT(requested_counsellor_id) as counsellor_count FROM requested_counsellor WHERE email_verified_flag=:email_verified_flag');
        $this->db->bind(':email_verified_flag',1);
      
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 

      //get No Of Req Nutritionist
      public function getNoOfReqNutritionist()
      {
        $this->db->query('SELECT COUNT(requested_nutritionist_id) as nutritionist_count FROM requested_nutritionist WHERE email_verified_flag=:email_verified_flag');
        $this->db->bind(':email_verified_flag',1);
       
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 


      //get No Of Req MeditationInstr
      public function getNoOfReqMeditationInstr()
      {
        $this->db->query('SELECT COUNT(requested_meditation_instructor_id) as meditation_instructor_count FROM requested_meditation_instructor WHERE email_verified_flag=:email_verified_flag');
        $this->db->bind(':email_verified_flag',1);
       
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 

      //get No Of Req Pharmacist
      public function getNoOfReqPharmacist()
      {
        $this->db->query('SELECT COUNT(requested_pharmacist_id) as pharmacist_count FROM requested_pharmacist WHERE email_verified_flag=:email_verified_flag');
        $this->db->bind(':email_verified_flag',1);
      
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 

// Requested Doctors

      //get Req Doctors
      public function getReqDoctors()
      {
        $this->db->query('SELECT *  FROM requested_doctor WHERE email_verified_flag=:email_verified_flag');
        $this->db->bind(':email_verified_flag',1);
      
        $result=$this->db->resultSet();
         return $result;
      } 

      //get Search Req Doctors
      public function getSearchReqDoctors($search)
      {
        $this->db->query("SELECT * FROM requested_doctor WHERE CONCAT(first_name,last_name,city,type,specialization) LIKE '%$search%' AND email_verified_flag=:email_verified_flag");
        $this->db->bind(':email_verified_flag',1);
      
        $result=$this->db->resultSet();
         return $result;
      } 
    
      
      //get Req Doctor Details
      public function getReqDoctorDetails($doctor_id)
      {
        $this->db->query('SELECT * FROM requested_doctor WHERE requested_doctor_id =:doctor_id');
        $this->db->bind(':doctor_id',$doctor_id);  


        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 

      //Verify Requested Doctor
      public function VerifyReqDoctor($doctor_id)
      {
            $data=$this->getReqDoctorDetails($doctor_id);
            $this->db->query('INSERT INTO doctor(first_name,last_name,nic,contact_number,gender,email,password,slmc_reg_number,type,city,specialization,bank_name,account_holder_name,branch,account_number,qualification_file) VALUES (:first_name,:last_name,:nic,:contact_number,:gender,:email,:password,:slmc_reg_number,:type,:city,:specialization,:bank_name,:account_holder_name,:branch,:account_number,:qualification_file)');
            $this->db->bind(':first_name',$data->first_name);
            $this->db->bind(':last_name', $data->last_name);
            $this->db->bind(':nic', $data->nic);
            $this->db->bind(':contact_number',$data->contact_number);
            $this->db->bind(':gender', $data->gender);
            $this->db->bind(':email', $data->email);
            $this->db->bind(':password',$data->password);
            $this->db->bind(':slmc_reg_number', $data->slmc_reg_number);
            $this->db->bind(':type', $data->type);
            $this->db->bind(':city',$data->city);
            $this->db->bind(':specialization', $data->specialization);
            $this->db->bind(':bank_name', $data->bank_name);
            $this->db->bind(':account_holder_name',$data->account_holder_name);
            $this->db->bind(':account_number', $data->account_number);
            $this->db->bind(':branch', $data->branch);
            $this->db->bind(':qualification_file', $data->qualification_file);
    

            if($this->db->execute()){
                return $this->NotVerifyReqDoctor($doctor_id);
            }else{
                return false;
            } 


      } 

      //Not Verify Req Doctor
      public function NotVerifyReqDoctor($doctor_id)
      {
            $this->db->query('DELETE FROM requested_doctor WHERE requested_doctor_id=:id');
            $this->db->bind(':id',$doctor_id);
    
            if($this->db->execute()){
               return true;
            }else{
                return false;
            } 
      } 


// Requested Counsellors

      //get Req Counsellors 
      public function getReqCounsellors()
      {
        $this->db->query('SELECT *  FROM requested_counsellor WHERE email_verified_flag=:email_verified_flag');
        $this->db->bind(':email_verified_flag',1);
      
        $result=$this->db->resultSet();
         return $result;
      } 

      //get Search Req Counsellors
      public function getSearchReqCounsellors($search)
      {
        $this->db->query("SELECT * FROM requested_counsellor WHERE CONCAT(first_name,last_name,city) LIKE '%$search%' AND email_verified_flag=:email_verified_flag");
        $this->db->bind(':email_verified_flag',1);
      
        $result=$this->db->resultSet();
         return $result;
      } 
    
      
      
      //get Req Counsellor Details  
      public function getReqCounsellorDetails($counsellor_id)
      {
        $this->db->query('SELECT * FROM requested_counsellor WHERE requested_counsellor_id =:counsellor_id');
        $this->db->bind(':counsellor_id',$counsellor_id);  


        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 

      //Verify Req Counsellor
      public function VerifyReqCounsellor($counsellor_id)
      {
            $data=$this->getReqCounsellorDetails($counsellor_id);
            $this->db->query('INSERT INTO counsellor(first_name,last_name,nic,contact_number,gender,email,password,slmc_reg_number,city,bank_name,account_holder_name,branch,account_number,qualification_file) VALUES (:first_name,:last_name,:nic,:contact_number,:gender,:email,:password,:slmc_reg_number,:city,:bank_name,:account_holder_name,:branch,:account_number,:qualification_file)');
            $this->db->bind(':first_name',$data->first_name);
            $this->db->bind(':last_name', $data->last_name);
            $this->db->bind(':nic', $data->nic);
            $this->db->bind(':contact_number',$data->contact_number);
            $this->db->bind(':gender', $data->gender);
            $this->db->bind(':email', $data->email);
            $this->db->bind(':password',$data->password);
            $this->db->bind(':slmc_reg_number', $data->slmc_reg_number);
            $this->db->bind(':city',$data->city);
            $this->db->bind(':bank_name', $data->bank_name);
            $this->db->bind(':account_holder_name',$data->account_holder_name);
            $this->db->bind(':account_number', $data->account_number);
            $this->db->bind(':branch', $data->branch);
            $this->db->bind(':qualification_file', $data->qualification_file);
    

            if($this->db->execute()){
                return $this->NotVerifyReqCounsellor($counsellor_id);
            }else{
                return false;
            } 
      } 

      //Not Verify Req Counsellor
      public function NotVerifyReqCounsellor($counsellor_id)
      {
            $this->db->query('DELETE FROM requested_counsellor WHERE requested_counsellor_id=:id');
            $this->db->bind(':id',$counsellor_id);
    
            if($this->db->execute()){
               return true;
            }else{
                return false;
            } 
      } 



// Requested Nutritionists

      //Get Req Nutritionists  
      public function getReqNutritionists()
      {
        $this->db->query('SELECT *  FROM requested_nutritionist WHERE email_verified_flag=:email_verified_flag');
        $this->db->bind(':email_verified_flag',1);
       
        $result=$this->db->resultSet();
         return $result;
      } 

      //Get Search Req Nutritionist
      public function getSearchReqNutritionist($search)
      {
        $this->db->query("SELECT * FROM requested_nutritionist WHERE CONCAT(first_name,last_name) LIKE '%$search%' AND email_verified_flag=:email_verified_flag");
        $this->db->bind(':email_verified_flag',1);
      
        $result=$this->db->resultSet();
         return $result;
      } 
    
      
      //get Req Nutritionist Details
      public function getReqNutritionistDetails($nutritionist_id)
      {
        $this->db->query('SELECT * FROM requested_nutritionist WHERE requested_nutritionist_id =:nutritionist_id');
        $this->db->bind(':nutritionist_id',$nutritionist_id);  


        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 

      //Verify Req Nutritionist
      public function VerifyReqNutritionist($nutritionist_id)
      {
            $data=$this->getReqNutritionistDetails($nutritionist_id);
            $this->db->query('INSERT INTO nutritionist(first_name,last_name,
            nic,contact_number,gender,email,password,slmc_reg_number,fee,bank_name,
            account_holder_name,branch,account_number,qualification_file)
             VALUES (:first_name,:last_name,:nic,:contact_number,:gender,:email,
             :password,:slmc_reg_number,:fee,:bank_name,:account_holder_name,:branch,
             :account_number,:qualification_file)');
            
            $this->db->bind(':first_name',$data->first_name);
            $this->db->bind(':last_name', $data->last_name);
            $this->db->bind(':nic', $data->nic);
            $this->db->bind(':contact_number',$data->contact_number);
            $this->db->bind(':gender', $data->gender);
            $this->db->bind(':email', $data->email);
            $this->db->bind(':password',$data->password);
            $this->db->bind(':slmc_reg_number', $data->slmc_reg_number);
            $this->db->bind(':fee', $data->fee);
            $this->db->bind(':bank_name', $data->bank_name);
            $this->db->bind(':account_holder_name',$data->account_holder_name);
            $this->db->bind(':branch', $data->branch);
            $this->db->bind(':account_number', $data->account_number);
            $this->db->bind(':qualification_file', $data->qualification_file);
    

            if($this->db->execute()){
                return $this->NotVerifyReqNutritionist($nutritionist_id);
            }else{
                return false;
            }     
      } 

      //Not Verify Req Nutritionist
      public function NotVerifyReqNutritionist($nutritionist_id)
      {
            $this->db->query('DELETE FROM requested_nutritionist WHERE requested_nutritionist_id=:id');
            $this->db->bind(':id',$nutritionist_id);
    
            if($this->db->execute()){
               return true;
            }else{
                return false;
            } 
      } 

      

//requested Meditation Instructors
      
      //get Req Meditation Instructors
      public function getReqMeditationInstructors()
      {
        $this->db->query('SELECT *  FROM requested_meditation_instructor WHERE email_verified_flag=:email_verified_flag');
        $this->db->bind(':email_verified_flag',1);
      
        $result=$this->db->resultSet();
         return $result;
      } 

      //get Search Req Meditation Instructors
      public function getSearchReqMeditationInstructors($search)
      {
        $this->db->query("SELECT * FROM requested_meditation_instructor WHERE CONCAT(first_name,last_name,city,address) LIKE '%$search%' AND email_verified_flag=:email_verified_flag");
        $this->db->bind(':email_verified_flag',1);
      
        $result=$this->db->resultSet();
         return $result;
      } 
    
      
      //get Req Meditation Instructor Details
      public function getReqMeditationInstructorDetails($meditation_instructor_id)
      {
        $this->db->query('SELECT * FROM requested_meditation_instructor WHERE requested_meditation_instructor_id =:meditation_instructor_id');
        $this->db->bind(':meditation_instructor_id',$meditation_instructor_id);  


        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 

      //Verify Req Meditation Instructor
      public function VerifyReqMeditationInstructor($meditation_instructor_id)
      {
            $data=$this->getReqMeditationInstructorDetails($meditation_instructor_id);
            $this->db->query('INSERT INTO meditation_instructor(first_name,last_name,nic,contact_number,gender,email,password,city,address,fee,bank_name,account_holder_name,branch,account_number,qualification_file) VALUES (:first_name,:last_name,:nic,:contact_number,:gender,:email,:password,:city,:address,:fee,:bank_name,:account_holder_name,:branch,:account_number,:qualification_file)');
            $this->db->bind(':first_name',$data->first_name);
            $this->db->bind(':last_name', $data->last_name);
            $this->db->bind(':nic', $data->nic);
            $this->db->bind(':contact_number',$data->contact_number);
            $this->db->bind(':gender', $data->gender);
            $this->db->bind(':email', $data->email);
            $this->db->bind(':password',$data->password);
            $this->db->bind(':city',$data->city);
            $this->db->bind(':address', $data->address);
            $this->db->bind(':fee', $data->fee);
            $this->db->bind(':bank_name', $data->bank_name);
            $this->db->bind(':account_holder_name',$data->account_holder_name);
            $this->db->bind(':account_number', $data->account_number);
            $this->db->bind(':branch', $data->branch);
            $this->db->bind(':qualification_file', $data->qualification_file);
    

            if($this->db->execute()){
                return $this->NotVerifyReqMeditationInstructor($meditation_instructor_id);
            }else{
                return false;
            }    
      } 

      //Not Verify Req Meditation Instructor
      public function NotVerifyReqMeditationInstructor($meditation_instructor_id)
      {
            $this->db->query('DELETE FROM requested_meditation_instructor WHERE requested_meditation_instructor_id=:id');
            $this->db->bind(':id',$meditation_instructor_id);
    
            if($this->db->execute()){
               return true;
            }else{
                return false;
            }   
      } 

      
//requested pharmacist

      //Get Req Pharmacists      
      public function getReqPharmacists()
      {
        $this->db->query('SELECT *  FROM requested_pharmacist WHERE email_verified_flag=:email_verified_flag');
        $this->db->bind(':email_verified_flag',1);
         
        $result=$this->db->resultSet();
         return $result;
      } 

      //Get Search Req Pharmacists  
      public function getSearchReqPharmacists($search)
      {
        $this->db->query("SELECT * FROM requested_doctor WHERE CONCAT(first_name,last_name,city,type,specialization) LIKE '%$search%' AND email_verified_flag=:email_verified_flag");
        $this->db->bind(':email_verified_flag',1);
      
        $result=$this->db->resultSet();
         return $result;
      } 
    
      //Get Req Pharmacist Details
      public function getReqPharmacistDetails($pharmacist_id)
      {
        $this->db->query('SELECT * FROM requested_pharmacist WHERE requested_pharmacist_id =:pharmacist_id');
        $this->db->bind(':pharmacist_id',$pharmacist_id);  


        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 

      //Verify Req Pharmacist
      public function VerifyReqPharmacist($pharmacist_id)
      {
            $data=$this->getReqPharmacistDetails($pharmacist_id);
            $this->db->query('INSERT INTO pharmacist(first_name,last_name,nic,contact_number,gender,email,password,slmc_reg_number,pharmacy_name,city,address,bank_name,account_holder_name,branch,account_number,qualification_file) VALUES (:first_name,:last_name,:nic,:contact_number,:gender,:email,:password,:slmc_reg_number,:pharmacy_name,:city,:address,:bank_name,:account_holder_name,:branch,:account_number,:qualification_file)');

            $this->db->bind(':first_name',$data->first_name);
            $this->db->bind(':last_name', $data->last_name);
            $this->db->bind(':nic', $data->nic);
            $this->db->bind(':contact_number',$data->contact_number);
            $this->db->bind(':gender', $data->gender);
            $this->db->bind(':email', $data->email);
            $this->db->bind(':password',$data->password);
            $this->db->bind(':slmc_reg_number', $data->slmc_reg_number);
            $this->db->bind(':pharmacy_name', $data->pharmacy_name);
            $this->db->bind(':city',$data->city);
            $this->db->bind(':address', $data->address);
            $this->db->bind(':bank_name', $data->bank_name);
            $this->db->bind(':account_holder_name',$data->account_holder_name);
            $this->db->bind(':account_number', $data->account_number);
            $this->db->bind(':branch', $data->branch);
            $this->db->bind(':qualification_file', $data->qualification_file);
    

            if($this->db->execute()){
                return $this->NotVerifyReqPharmacist($pharmacist_id);
            }else{
                return false;
            }    
      } 

      //Not Verify Req Pharmacist
      public function NotVerifyReqPharmacist($pharmacist_id)
      {
            $this->db->query('DELETE FROM requested_pharmacist WHERE requested_pharmacist_id=:id');
            $this->db->bind(':id',$pharmacist_id);
    
            if($this->db->execute()){
               return true;
            }else{
                return false;
            } 
      } 


   }


 ?>
