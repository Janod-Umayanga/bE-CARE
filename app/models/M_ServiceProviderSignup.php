<?php

   class M_ServiceProviderSignup{
      private $db;

      public function __construct()
      {
        $this->db=new Database();
      }

      
      // signup Doctor

      public function  signupDoctor($data)
      {
            $this->db->query('INSERT INTO requested_doctor(first_name,last_name,nic,contact_number,gender,email,password,city,bank_name,account_holder_name,branch,account_number,slmc_reg_number,type,specialization,qualification_file) VALUES (:first_name,:last_name,:nic,:contact_number,:gender,:email,:password,:city,:bank_name,:account_holder_name,:branch,:account_number,:slmc_reg_number,:type,:specialization,:qualification_file)');
            $this->db->bind(':first_name',$data['first_name']);
            $this->db->bind(':last_name', $data['last_name']);
            $this->db->bind(':nic', $data['nic']);
            $this->db->bind(':contact_number',$data['contact_number']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password',$data['password']);
            $this->db->bind(':city',$data['city']);
            $this->db->bind(':bank_name', $data['bank_name']);
            $this->db->bind(':account_holder_name', $data['account_holder_name']);
            $this->db->bind(':account_number',$data['account_number']);
            $this->db->bind(':branch', $data['branch']);
            $this->db->bind(':slmc_reg_number', $data['slmc_reg_number']);
            $this->db->bind(':type',$data['type']);
            $this->db->bind(':specialization', $data['specialization']);
            $this->db->bind(':qualification_file',$data['qualification_file_name']);
           

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }    
      } 

      // signup  Counsellor

      public function  signupCounsellor($data)
      {
            $this->db->query('INSERT INTO requested_counsellor(first_name,last_name,nic,contact_number,gender,email,password,city,bank_name,account_holder_name,branch,account_number,slmc_reg_number,qualification_file) VALUES (:first_name,:last_name,:nic,:contact_number,:gender,:email,:password,:city,:bank_name,:account_holder_name,:branch,:account_number,:slmc_reg_number,:qualification_file)');
            $this->db->bind(':first_name',$data['first_name']);
            $this->db->bind(':last_name', $data['last_name']);
            $this->db->bind(':nic', $data['nic']);
            $this->db->bind(':contact_number',$data['contact_number']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password',$data['password']);
            $this->db->bind(':city',$data['city']);
            $this->db->bind(':bank_name', $data['bank_name']);
            $this->db->bind(':account_holder_name', $data['account_holder_name']);
            $this->db->bind(':account_number',$data['account_number']);
            $this->db->bind(':branch', $data['branch']);
            $this->db->bind(':slmc_reg_number', $data['slmc_reg_number']);
            $this->db->bind(':qualification_file',$data['qualification_file_name']);
           

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }    
      } 


    
    // signup Meditation Instructor

    public function  signupMeditationInstructor($data)
    {
          $this->db->query('INSERT INTO requested_meditation_instructor(first_name,last_name,nic,contact_number,gender,email,password,city,bank_name,account_holder_name,branch,account_number,address,fee,qualification_file) VALUES (:first_name,:last_name,:nic,:contact_number,:gender,:email,:password,:city,:bank_name,:account_holder_name,:branch,:account_number,:address,:fee,:qualification_file)');
          $this->db->bind(':first_name',$data['first_name']);
          $this->db->bind(':last_name', $data['last_name']);
          $this->db->bind(':nic', $data['nic']);
          $this->db->bind(':contact_number',$data['contact_number']);
          $this->db->bind(':gender', $data['gender']);
          $this->db->bind(':email', $data['email']);
          $this->db->bind(':password',$data['password']);
          $this->db->bind(':city',$data['city']);
          $this->db->bind(':bank_name', $data['bank_name']);
          $this->db->bind(':account_holder_name', $data['account_holder_name']);
          $this->db->bind(':account_number',$data['account_number']);
          $this->db->bind(':branch', $data['branch']);
          $this->db->bind(':address',$data['address']);
          $this->db->bind(':fee', $data['fee']);
          $this->db->bind(':qualification_file',$data['qualification_file_name']);
         

          if($this->db->execute()){
              return true;
          }else{
              return false; 
          }    
    } 

    
    // signup Pharmacist

    public function  signupPharmacist($data)
    {
          $this->db->query('INSERT INTO requested_pharmacist(first_name,last_name,nic,contact_number,gender,email,password,city,bank_name,account_holder_name,branch,account_number,slmc_reg_number,address,pharmacy_name,qualification_file) VALUES (:first_name,:last_name,:nic,:contact_number,:gender,:email,:password,:city,:bank_name,:account_holder_name,:branch,:account_number,:slmc_reg_number,:address,:pharmacy_name,:qualification_file)');
          $this->db->bind(':first_name',$data['first_name']);
          $this->db->bind(':last_name', $data['last_name']);
          $this->db->bind(':nic', $data['nic']);
          $this->db->bind(':contact_number',$data['contact_number']);
          $this->db->bind(':gender', $data['gender']);
          $this->db->bind(':email', $data['email']);
          $this->db->bind(':password',$data['password']);
          $this->db->bind(':city',$data['city']);
          $this->db->bind(':bank_name', $data['bank_name']);
          $this->db->bind(':account_holder_name', $data['account_holder_name']);
          $this->db->bind(':account_number',$data['account_number']);
          $this->db->bind(':branch', $data['branch']);
          $this->db->bind(':slmc_reg_number', $data['slmc_reg_number']);
          $this->db->bind(':pharmacy_name',$data['pharmacy_name']);
          $this->db->bind(':address', $data['address']);
          $this->db->bind(':qualification_file',$data['qualification_file_name']);
         

          if($this->db->execute()){
              return true;
          }else{
              return false;
          }    
    } 

      // signup Nutritionist

      public function  signupNutritionist($data)
      {
            $this->db->query('INSERT INTO requested_nutritionist(first_name,last_name,nic,contact_number,gender,email,password,bank_name,account_holder_name,branch,account_number,slmc_reg_number,fee,qualification_file) VALUES (:first_name,:last_name,:nic,:contact_number,:gender,:email,:password,:bank_name,:account_holder_name,:branch,:account_number,:slmc_reg_number,:fee,:qualification_file)');
            $this->db->bind(':first_name',$data['first_name']);
            $this->db->bind(':last_name', $data['last_name']);
            $this->db->bind(':nic', $data['nic']);
            $this->db->bind(':contact_number',$data['contact_number']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password',$data['password']);
            $this->db->bind(':bank_name', $data['bank_name']);
            $this->db->bind(':account_holder_name', $data['account_holder_name']);
            $this->db->bind(':account_number',$data['account_number']);
            $this->db->bind(':branch', $data['branch']);
            $this->db->bind(':slmc_reg_number', $data['slmc_reg_number']);
            $this->db->bind(':fee',$data['fee']);
            $this->db->bind(':qualification_file',$data['qualification_file_name']);
           

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }    
      } 

     


   }


 ?>
