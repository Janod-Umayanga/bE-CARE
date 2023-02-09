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
            $this->db->bind(':first_name',$data['d_first_name']);
            $this->db->bind(':last_name', $data['d_last_name']);
            $this->db->bind(':nic', $data['d_nic']);
            $this->db->bind(':contact_number',$data['d_contact_number']);
            $this->db->bind(':gender', $data['d_gender']);
            $this->db->bind(':email', $data['d_email']);
            $this->db->bind(':password',$data['d_password']);
            $this->db->bind(':city',$data['d_city']);
            $this->db->bind(':bank_name', $data['d_bank_name']);
            $this->db->bind(':account_holder_name', $data['d_account_holder_name']);
            $this->db->bind(':account_number',$data['d_account_number']);
            $this->db->bind(':branch', $data['d_branch']);
            $this->db->bind(':slmc_reg_number', $data['d_slmc_reg_number']);
            $this->db->bind(':type',$data['d_type']);
            $this->db->bind(':specialization', $data['d_specialization']);
            $this->db->bind(':qualification_file',$data['d_qualification_file_name']);
           

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
            $this->db->bind(':first_name',$data['c_first_name']);
            $this->db->bind(':last_name', $data['c_last_name']);
            $this->db->bind(':nic', $data['c_nic']);
            $this->db->bind(':contact_number',$data['c_contact_number']);
            $this->db->bind(':gender', $data['c_gender']);
            $this->db->bind(':email', $data['c_email']);
            $this->db->bind(':password',$data['c_password']);
            $this->db->bind(':city',$data['c_city']);
            $this->db->bind(':bank_name', $data['c_bank_name']);
            $this->db->bind(':account_holder_name', $data['c_account_holder_name']);
            $this->db->bind(':account_number',$data['c_account_number']);
            $this->db->bind(':branch', $data['c_branch']);
            $this->db->bind(':slmc_reg_number', $data['c_slmc_reg_number']);
            $this->db->bind(':qualification_file',$data['c_qualification_file_name']);
           

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
          $this->db->bind(':first_name',$data['m_first_name']);
          $this->db->bind(':last_name', $data['m_last_name']);
          $this->db->bind(':nic', $data['m_nic']);
          $this->db->bind(':contact_number',$data['m_contact_number']);
          $this->db->bind(':gender', $data['m_gender']);
          $this->db->bind(':email', $data['m_email']);
          $this->db->bind(':password',$data['m_password']);
          $this->db->bind(':city',$data['m_city']);
          $this->db->bind(':bank_name', $data['m_bank_name']);
          $this->db->bind(':account_holder_name', $data['m_account_holder_name']);
          $this->db->bind(':account_number',$data['m_account_number']);
          $this->db->bind(':branch', $data['m_branch']);
          $this->db->bind(':address',$data['m_address']);
          $this->db->bind(':fee', $data['m_fee']);
          $this->db->bind(':qualification_file',$data['m_qualification_file_name']);
         

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
          $this->db->bind(':first_name',$data['p_first_name']);
          $this->db->bind(':last_name', $data['p_last_name']);
          $this->db->bind(':nic', $data['p_nic']);
          $this->db->bind(':contact_number',$data['p_contact_number']);
          $this->db->bind(':gender', $data['p_gender']);
          $this->db->bind(':email', $data['p_email']);
          $this->db->bind(':password',$data['p_password']);
          $this->db->bind(':city',$data['p_city']);
          $this->db->bind(':bank_name', $data['p_bank_name']);
          $this->db->bind(':account_holder_name', $data['p_account_holder_name']);
          $this->db->bind(':account_number',$data['p_account_number']);
          $this->db->bind(':branch', $data['p_branch']);
          $this->db->bind(':slmc_reg_number', $data['p_slmc_reg_number']);
          $this->db->bind(':pharmacy_name',$data['p_pharmacy_name']);
          $this->db->bind(':address', $data['p_address']);
          $this->db->bind(':qualification_file',$data['p_qualification_file_name']);
         

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
            $this->db->bind(':first_name',$data['n_first_name']);
            $this->db->bind(':last_name', $data['n_last_name']);
            $this->db->bind(':nic', $data['n_nic']);
            $this->db->bind(':contact_number',$data['n_contact_number']);
            $this->db->bind(':gender', $data['n_gender']);
            $this->db->bind(':email', $data['n_email']);
            $this->db->bind(':password',$data['n_password']);
            $this->db->bind(':bank_name', $data['n_bank_name']);
            $this->db->bind(':account_holder_name', $data['n_account_holder_name']);
            $this->db->bind(':account_number',$data['n_account_number']);
            $this->db->bind(':branch', $data['n_branch']);
            $this->db->bind(':slmc_reg_number', $data['n_slmc_reg_number']);
            $this->db->bind(':fee',$data['n_fee']);
            $this->db->bind(':qualification_file',$data['n_qualification_file_name']);
           

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }    
      } 

     


   }


 ?>
