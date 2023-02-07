<?php

   class M_AdminReqSerProviders{
      private $db;

      public function __construct()
      {
        $this->db=new Database();
       

      }

      public function getNoOfReqDoctors()
      {
        $this->db->query('SELECT COUNT(requested_doctor_id) as doctor_count FROM requested_doctor');
       
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 

      
      public function getNoOfReqCounsellors()
      {
        $this->db->query('SELECT COUNT(requested_counsellor_id) as counsellor_count FROM requested_counsellor');
       
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 

      
      public function getNoOfReqNutritionist()
      {
        $this->db->query('SELECT COUNT(requested_nutritionist_id) as nutritionist_count FROM requested_nutritionist');
       
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 


      
      public function getNoOfReqMeditationInstr()
      {
        $this->db->query('SELECT COUNT(requested_meditation_instructor_id) as meditation_instructor_count FROM requested_meditation_instructor');
       
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 

      
      public function getNoOfReqPharmacist()
      {
        $this->db->query('SELECT COUNT(requested_pharmacist_id) as pharmacist_count FROM requested_pharmacist');
       
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 

// Requested Doctors

      public function getReqDoctors()
      {
        $this->db->query('SELECT *  FROM requested_doctor');
       
        $result=$this->db->resultSet();
         return $result;
      } 

      public function getSearchReqDoctors($search)
      {
        $this->db->query("SELECT * FROM requested_doctor WHERE CONCAT(first_name,last_name,city,type,specialization) LIKE '%$search%'");
        $result=$this->db->resultSet();
         return $result;
      } 
    
      
      

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

      public function getReqCounsellors()
      {
        $this->db->query('SELECT *  FROM requested_counsellor');
       
        $result=$this->db->resultSet();
         return $result;
      } 

      public function getSearchReqCounsellors($search)
      {
        $this->db->query("SELECT * FROM requested_counsellor WHERE CONCAT(first_name,last_name,city) LIKE '%$search%'");
        $result=$this->db->resultSet();
         return $result;
      } 
    
      
      

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

      public function getReqNutritionists()
      {
        $this->db->query('SELECT *  FROM requested_nutritionist');
       
        $result=$this->db->resultSet();
         return $result;
      } 

      public function getSearchReqNutritionist($search)
      {
        $this->db->query("SELECT * FROM requested_nutritionist WHERE CONCAT(first_name,last_name) LIKE '%$search%'");
        $result=$this->db->resultSet();
         return $result;
      } 
    
      
      

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
      
      public function getReqMeditationInstructors()
      {
        $this->db->query('SELECT *  FROM requested_meditation_instructor');
       
        $result=$this->db->resultSet();
         return $result;
      } 

      public function getSearchReqMeditationInstructors($search)
      {
        $this->db->query("SELECT * FROM requested_meditation_instructor WHERE CONCAT(first_name,last_name,city,address) LIKE '%$search%'");
        $result=$this->db->resultSet();
         return $result;
      } 
    
      
      

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
      
      public function getReqPharmacists()
      {
        $this->db->query('SELECT *  FROM requested_pharmacist');
       
        $result=$this->db->resultSet();
         return $result;
      } 


      public function getSearchReqPharmacists($search)
      {
        $this->db->query("SELECT * FROM requested_doctor WHERE CONCAT(first_name,last_name,city,type,specialization) LIKE '%$search%'");
        $result=$this->db->resultSet();
         return $result;
      } 
    
      
      

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
