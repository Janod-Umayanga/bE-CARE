<?php

   class M_AdminUserMgmt{
      private $db;

      public function __construct()
      {
        $this->db=new Database();
      }

      public function getNoOfDoctors()
      {
        $this->db->query('SELECT COUNT(doctor_id) as doctor_count FROM doctor ');
       
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 

      
      public function getNoOfCounsellors()
      {
        $this->db->query('SELECT COUNT(counsellor_id) as counsellor_count FROM counsellor ');
       
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 

      
      public function getNoOfNutritionist()
      {
        $this->db->query('SELECT COUNT(nutritionist_id) as nutritionist_count FROM nutritionist ');
       
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 


      
      public function getNoOfMeditationInstr()
      {
        $this->db->query('SELECT COUNT(meditation_instructor_id) as meditation_instructor_count FROM meditation_instructor ');
       
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 

      
      public function getNoOfPharmacist()
      {
        $this->db->query('SELECT COUNT(pharmacist_id) as pharmacist_count FROM pharmacist ');
       
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 


      public function getNoOfPatient()
      {
        $this->db->query('SELECT COUNT(patient_id) as patient_count FROM patient ');
       
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 

      
      public function getNoOfActivePatient()
      {
        $this->db->query('SELECT COUNT(patient_id) as patient_active_count FROM patient WHERE delete_flag=0');
       
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 

      public function getNoOfDeactivePatient()
      {
        $this->db->query('SELECT COUNT(patient_id) as patient_deactive_count FROM patient WHERE delete_flag=1');
       
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 


      public function getNoOfActiveDoctor()
      {
        $this->db->query('SELECT COUNT(doctor_id) as doctor_active_count FROM doctor WHERE delete_flag=0');
       
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 

      public function getNoOfDeactiveDoctor()
      {
        $this->db->query('SELECT COUNT(doctor_id) as doctor_deactive_count FROM doctor WHERE delete_flag=1');
       
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 


      public function getNoOfActiveCounsellor()
      {
        $this->db->query('SELECT COUNT(counsellor_id) as counsellor_active_count FROM counsellor WHERE delete_flag=0');
       
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 

      public function getNoOfDeactiveCounsellor()
      {
        $this->db->query('SELECT COUNT(counsellor_id) as counsellor_deactive_count FROM counsellor WHERE delete_flag=1');
       
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 


      public function getNoOfActivePharmacist()
      {
        $this->db->query('SELECT COUNT(pharmacist_id) as pharmacist_active_count FROM pharmacist WHERE delete_flag=0');
       
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 

      public function getNoOfDeactivePharmacist()
      {
        $this->db->query('SELECT COUNT(pharmacist_id) as pharmacist_deactive_count FROM pharmacist WHERE delete_flag=1');
       
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 

      public function getNoOfActiveNutritionist()
      {
        $this->db->query('SELECT COUNT(nutritionist_id) as nutritionist_active_count FROM nutritionist WHERE delete_flag=0');
       
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 

      public function getNoOfDeactiveNutritionist()
      {
        $this->db->query('SELECT COUNT(nutritionist_id) as nutritionist_deactive_count FROM nutritionist WHERE delete_flag=1');
       
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 

      public function getNoOfActiveAdmin()
      {
        $this->db->query('SELECT COUNT(admin_id) as admin_active_count FROM admin WHERE delete_flag=0');
       
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 

      public function getNoOfDeactiveAdmin()
      {
        $this->db->query('SELECT COUNT(admin_id) as admin_deactive_count FROM admin WHERE delete_flag=1');
       
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 

      
      public function getNoOfActiveMeditationInstr()
      {
        $this->db->query('SELECT COUNT(meditation_instructor_id) as meditationInstructor_active_count FROM meditation_instructor WHERE delete_flag=0');
       
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 

      public function getNoOfDeactiveMeditationInstr()
      {
        $this->db->query('SELECT COUNT(meditation_instructor_id) as meditationInstructor_deactive_count FROM meditation_instructor WHERE delete_flag=1');
       
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 
      
      public function getNoOfAdmin()
      {
        $this->db->query('SELECT COUNT(admin_id) as admin_count FROM admin ');
       
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 



      //Patient

      public function getPatients()
      {
        $this->db->query('SELECT *  FROM patient ');
       
        $result=$this->db->resultSet();
         return $result;
      } 

      public function getSearchPatients($search)
      {
        $this->db->query("SELECT * FROM patient WHERE CONCAT(first_name,last_name) LIKE '%$search%' ");
        $result=$this->db->resultSet();
         return $result;
      } 
    
      
      

      public function getPatientDetails($patient_id)
      {
        $this->db->query('SELECT * FROM patient WHERE patient_id =:patient_id');
        $this->db->bind(':patient_id',$patient_id);  


        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 
      
      //Doctor

      public function getDoctors()
      {
        $this->db->query('SELECT *  FROM doctor ');
       
        $result=$this->db->resultSet();
         return $result;
      } 

      public function getSearchDoctors($search)
      {
        $this->db->query("SELECT * FROM doctor WHERE CONCAT(first_name,last_name,city,type,specialization) LIKE '%$search%' ");
        $result=$this->db->resultSet();
         return $result;
      } 
    
      
      

      public function getDoctorDetails($doctor_id)
      {
        $this->db->query('SELECT * FROM doctor WHERE doctor_id =:doctor_id');
        $this->db->bind(':doctor_id',$doctor_id);  


        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 

      //Counsellor

      public function getCounsellors()
      {
        $this->db->query('SELECT *  FROM counsellor ');
       
        $result=$this->db->resultSet();
         return $result;
      } 

      public function getSearchCounsellors($search)
      {
        $this->db->query("SELECT * FROM counsellor WHERE CONCAT(first_name,last_name,city) LIKE '%$search%' ");
        $result=$this->db->resultSet();
         return $result;
      } 
    
      
      

      public function getCounsellorDetails($counsellor_id)
      {
        $this->db->query('SELECT * FROM counsellor WHERE counsellor_id =:counsellor_id');
        $this->db->bind(':counsellor_id',$counsellor_id);  


        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 
      
      //Admin

      public function getAdmins()
      {
        $this->db->query('SELECT *  FROM admin ');
       
        $result=$this->db->resultSet();
         return $result;
      } 

      public function getSearchAdmins($search)
      {
        $this->db->query("SELECT * FROM admin WHERE CONCAT(first_name,last_name) LIKE '%$search%' ");
        $result=$this->db->resultSet();
         return $result;
      } 
    
      
      

      public function getAdminDetails($admin_id)
      {
        $this->db->query('SELECT * FROM admin WHERE admin_id =:admin_id');
        $this->db->bind(':admin_id',$admin_id);  


        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 
      
      //Meditation Instructor

      public function getMeditationInstructors()
      {
        $this->db->query('SELECT *  FROM meditation_instructor ');
       
        $result=$this->db->resultSet();
         return $result;
      } 

      public function getSearchMeditationInstructors($search)
      {
        $this->db->query("SELECT * FROM meditation_instructor WHERE CONCAT(first_name,last_name,city,address) LIKE '%$search%' ");
        $result=$this->db->resultSet();
         return $result;
      } 
    
      
      

      public function getMeditationInstructorDetails($meditationInstructor_id)
      {
        $this->db->query('SELECT * FROM meditation_instructor WHERE meditation_instructor_id =:meditation_instructor_id');
        $this->db->bind(':meditation_instructor_id',$meditationInstructor_id);  


        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 
      
      //Pharmacist

      public function getPharmacists()
      {
        $this->db->query('SELECT *  FROM pharmacist ');
       
        $result=$this->db->resultSet();
         return $result;
      } 

      public function getSearchPharmacists($search)
      {
        $this->db->query("SELECT * FROM pharmacist WHERE CONCAT(first_name,last_name,city,pharmacy_name,address) LIKE '%$search%' ");
        $result=$this->db->resultSet();
         return $result;
      } 
    
      
      

      public function getPharmacistDetails($pharmacist_id)
      {
        $this->db->query('SELECT * FROM pharmacist WHERE pharmacist_id =:pharmacist_id');
        $this->db->bind(':pharmacist_id',$pharmacist_id);  


        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 
      
      
      //Nutritionist

      public function getNutritionists()
      { 
        $this->db->query('SELECT *  FROM nutritionist ');
       
        $result=$this->db->resultSet();
         return $result;
      } 

      public function getSearchNutritionists($search)
      {
        $this->db->query("SELECT * FROM nutritionist WHERE CONCAT(first_name,last_name) LIKE '%$search%' ");
        $result=$this->db->resultSet();
         return $result;
      } 
    
      
      

      public function getNutritionistDetails($nutritionist_id)
      {
        $this->db->query('SELECT * FROM nutritionist WHERE nutritionist_id =:nutritionist_id');
        $this->db->bind(':nutritionist_id',$nutritionist_id);  


        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 


        // Deactivated a Patient

       
        public function  deactivatedPatient($id)
        {
            $this->db->query('UPDATE patient set delete_flag=1 WHERE patient_id = :id');
            $this->db->bind(':id',$id);
    
            if($this->db->execute()){
               return true;
            }else{
                return false;
            } 
        } 
        
            // Activated a Patient

                  
            public function  activatedPatient($id)
            {
            $this->db->query('UPDATE patient set delete_flag=0 WHERE patient_id = :id');
            $this->db->bind(':id',$id);

            if($this->db->execute()){
                  return true;
            }else{
                  return false;
            } 
            } 


              // Deactivated a Doctor

       
        public function  deactivatedDoctor($id)
        {
            $this->db->query('UPDATE doctor set delete_flag=1 WHERE doctor_id = :id');
            $this->db->bind(':id',$id);
    
            if($this->db->execute()){
               return true;
            }else{
                return false;
            } 
        } 
        
            // Activated a Doctor

                  
            public function  activatedDoctor($id)
            {
            $this->db->query('UPDATE doctor set delete_flag=0 WHERE doctor_id = :id');
            $this->db->bind(':id',$id);

            if($this->db->execute()){
                  return true;
            }else{
                  return false;
            } 
            } 


              // Deactivated a Counsellor

       
        public function  deactivatedCounsellor($id)
        {
            $this->db->query('UPDATE counsellor set delete_flag=1 WHERE counsellor_id = :id');
            $this->db->bind(':id',$id);
    
            if($this->db->execute()){
               return true;
            }else{
                return false;
            } 
        } 
        
            // Activated a Counsellor

                  
            public function  activatedCounsellor($id)
            {
            $this->db->query('UPDATE counsellor set delete_flag=0 WHERE counsellor_id = :id');
            $this->db->bind(':id',$id);

            if($this->db->execute()){
                  return true;
            }else{
                  return false;
            } 
            } 

              // Deactivated a Nutritionist

       
        public function  deactivatedNutritionist($id)
        {
            $this->db->query('UPDATE nutritionist set delete_flag=1 WHERE nutritionist_id = :id');
            $this->db->bind(':id',$id);
    
            if($this->db->execute()){
               return true;
            }else{
                return false;
            } 
        } 
        
            // Activated a Nutritionist

                  
            public function  activatedNutritionist($id)
            {
            $this->db->query('UPDATE nutritionist set delete_flag=0 WHERE nutritionist_id = :id');
            $this->db->bind(':id',$id);

            if($this->db->execute()){
                  return true;
            }else{
                  return false;
            } 
            } 

        
              // Deactivated a Pharmacist

       
        public function  deactivatedPharmacist($id)
        {
            $this->db->query('UPDATE pharmacist set delete_flag=1 WHERE pharmacist_id = :id');
            $this->db->bind(':id',$id);
    
            if($this->db->execute()){
               return true;
            }else{
                return false;
            } 
        } 
        
            // Activated a Pharmacist

                  
            public function  activatedPharmacist($id)
            {
            $this->db->query('UPDATE pharmacist set delete_flag=0 WHERE pharmacist_id = :id');
            $this->db->bind(':id',$id);

            if($this->db->execute()){
                  return true;
            }else{
                  return false;
            } 
            } 


              // Deactivated a Admin

       
              public function  deactivatedAdmin($id)
              {
                  $this->db->query('UPDATE admin set delete_flag=1 WHERE admin_id = :id');
                  $this->db->bind(':id',$id);
          
                  if($this->db->execute()){
                     return true;
                  }else{
                      return false;
                  } 
              } 
              
                  // Activated a Admin
      
                        
                  public function  activatedAdmin($id)
                  {
                  $this->db->query('UPDATE admin set delete_flag=0 WHERE admin_id = :id');
                  $this->db->bind(':id',$id);
      
                  if($this->db->execute()){
                        return true;
                  }else{
                        return false;
                  } 
                  } 
      

          // Deactivated a meditation_instructor

       
          public function  deactivatedMeditationInstructor($id)
          {
              $this->db->query('UPDATE meditation_instructor set delete_flag=1 WHERE meditation_instructor_id = :id');
              $this->db->bind(':id',$id);
      
              if($this->db->execute()){
                 return true;
              }else{
                  return false;
              } 
          } 
          
              // Activated a meditation_instructor
  
                    
              public function  activatedMeditationInstructor($id)
              {
              $this->db->query('UPDATE meditation_instructor set delete_flag=0 WHERE meditation_instructor_id = :id');
              $this->db->bind(':id',$id);
  
              if($this->db->execute()){
                    return true;
              }else{
                    return false;
              } 
              } 
  
  

       // Delete a Doctor

       
        public function  deleteDoctor($doctor_id)
        {
            $this->db->query('UPDATE doctor set delete_flag=1 WHERE doctor_id = :id');
            $this->db->bind(':id',$doctor_id);
    
            if($this->db->execute()){
               return true;
            }else{
                return false;
            } 
        } 

         // Delete a Counsellor

       
         public function  deleteCounsellor($counsellor_id)
         {
             $this->db->query('UPDATE counsellor set delete_flag=1 WHERE counsellor_id = :id');
             $this->db->bind(':id',$counsellor_id);
     
             if($this->db->execute()){
                return true;
             }else{
                 return false;
             } 
         } 

         
          // Delete a Admin

       
        public function  deleteAdmin($admin_id)
        {
            $this->db->query('UPDATE admin set delete_flag=1 WHERE admin_id = :id');
            $this->db->bind(':id',$admin_id);
    
            if($this->db->execute()){
               return true;
            }else{
                return false;
            } 
        } 


         // Delete a MeditationInstructor

       
         public function  deleteMeditationInstructor($meditationInstructor_id)
         {
             $this->db->query('UPDATE meditation_instructor set delete_flag=1 WHERE meditation_instructor_id = :id');
             $this->db->bind(':id',$meditationInstructor_id);
     
             if($this->db->execute()){
                return true;
             }else{
                 return false;
             } 
         } 

         
          // Delete a Pharmacist

       
        public function  deletePharmacist($pharmacist_id)
        {
            $this->db->query('UPDATE pharmacist set delete_flag=1 WHERE pharmacist_id = :id');
            $this->db->bind(':id',$pharmacist_id);
    
            if($this->db->execute()){
               return true;
            }else{
                return false;
            } 
        } 


         // Delete a Nutritionist

       
         public function  deleteNutritionist($nutritionist_id)
         {
             $this->db->query('UPDATE nutritionist set delete_flag=1 WHERE nutritionist_id = :id');
             $this->db->bind(':id',$nutritionist_id);
     
             if($this->db->execute()){
                return true;
             }else{
                 return false;
             } 
         } 
 

      //    Add Patient
              
         public function  addPatient($data)
      {
            $this->db->query('INSERT INTO patient(first_name,last_name,nic,contact_number,gender,email,password) VALUES (:first_name,:last_name,:nic,:contact_number,:gender,:email,:password)');
            $this->db->bind(':first_name',$data['first_name']);
            $this->db->bind(':last_name', $data['last_name']);
            $this->db->bind(':nic', $data['nic']);
            $this->db->bind(':contact_number',$data['contact_number']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password',$data['password']);
           

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }    
      } 

      // Add Doctor

      public function  addDoctor($data)
      {
            $this->db->query('INSERT INTO doctor(first_name,last_name,nic,contact_number,gender,email,password,city,bank_name,account_holder_name,branch,account_number,slmc_reg_number,type,specialization,qualification_file) VALUES (:first_name,:last_name,:nic,:contact_number,:gender,:email,:password,:city,:bank_name,:account_holder_name,:branch,:account_number,:slmc_reg_number,:type,:specialization,:qualification_file)');
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

      // Add  Counsellor

      public function  addCounsellor($data)
      {
            $this->db->query('INSERT INTO counsellor(first_name,last_name,nic,contact_number,gender,email,password,city,bank_name,account_holder_name,branch,account_number,slmc_reg_number,qualification_file) VALUES (:first_name,:last_name,:nic,:contact_number,:gender,:email,:password,:city,:bank_name,:account_holder_name,:branch,:account_number,:slmc_reg_number,:qualification_file)');
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


  //    Add Admin
              
  public function  addAdmin($data)
      {
            $this->db->query('INSERT INTO admin(first_name,last_name,nic,contact_number,gender,email,password,bank_name,account_holder_name,branch,account_number) VALUES (:first_name,:last_name,:nic,:contact_number,:gender,:email,:password,:bank_name,:account_holder_name,:branch,:account_number)');
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
           

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }    
      } 
    
    
    // Add Meditation Instructor

    public function  addMeditationInstructor($data)
    {
          $this->db->query('INSERT INTO meditation_instructor(first_name,last_name,nic,contact_number,gender,email,password,city,bank_name,account_holder_name,branch,account_number,address,fee,qualification_file) VALUES (:first_name,:last_name,:nic,:contact_number,:gender,:email,:password,:city,:bank_name,:account_holder_name,:branch,:account_number,:address,:fee,:qualification_file)');
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

    
    // Add Pharmacist

    public function  addPharmacist($data)
    {
          $this->db->query('INSERT INTO pharmacist(first_name,last_name,nic,contact_number,gender,email,password,city,bank_name,account_holder_name,branch,account_number,slmc_reg_number,address,pharmacy_name,qualification_file) VALUES (:first_name,:last_name,:nic,:contact_number,:gender,:email,:password,:city,:bank_name,:account_holder_name,:branch,:account_number,:slmc_reg_number,:address,:pharmacy_name,:qualification_file)');
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

      // Add Nutritionist

      public function  addNutritionist($data)
      {
            $this->db->query('INSERT INTO nutritionist(first_name,last_name,nic,contact_number,gender,email,password,bank_name,account_holder_name,branch,account_number,slmc_reg_number,fee,qualification_file) VALUES (:first_name,:last_name,:nic,:contact_number,:gender,:email,:password,:bank_name,:account_holder_name,:branch,:account_number,:slmc_reg_number,:fee,:qualification_file)');
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

      // Find Doctor by Email 
      
      public function findDoctorByEmail($email)
      {
        $this->db->query('SELECT * FROM doctor WHERE email= :email');
        $this->db->bind(':email',$email);  

        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return true;
        }else{
              return false;
        }
    }

       // Find Requested Doctor by Email
    
    public function findReqDoctorByEmail($email)
    {
      $this->db->query('SELECT * FROM requested_doctor WHERE email= :email');
      $this->db->bind(':email',$email);  

      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return true;
      }else{
            return false;
      }
    }


      // Find Counsellor by Email 
      
      public function findCounsellorByEmail($email)
      {
        $this->db->query('SELECT * FROM counsellor WHERE email= :email');
        $this->db->bind(':email',$email);  

        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return true;
        }else{
              return false;
        }
    }

       // Find Requested Counsellor by Email
    
    public function findReqCounsellorByEmail($email)
    {
      $this->db->query('SELECT * FROM requested_counsellor WHERE email= :email');
      $this->db->bind(':email',$email);  

      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return true;
      }else{
            return false;
      }
    }


    // Find MeditationInstructor by Email 
      
    public function findMeditationInstructorByEmail($email)
    {
      $this->db->query('SELECT * FROM meditation_instructor WHERE email= :email');
      $this->db->bind(':email',$email);  

      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return true;
      }else{
            return false;
      }
  }

     // Find Requested MeditationInstructor by Email
  
  public function findReqMeditationInstructorByEmail($email)
  {
    $this->db->query('SELECT * FROM requested_meditation_instructor WHERE email= :email');
    $this->db->bind(':email',$email);  

    $row= $this->db->single();

    if($this->db->rowCount() >0){
          return true;
    }else{
          return false;
    }
  }

  // Find Pharmacist by Email 
      
  public function findPharmacistByEmail($email)
  {
    $this->db->query('SELECT * FROM pharmacist WHERE email= :email');
    $this->db->bind(':email',$email);  

    $row= $this->db->single();

    if($this->db->rowCount() >0){
          return true;
    }else{
          return false;
    }
}

   // Find Requested Pharmacist by Email

public function findReqPharmacistByEmail($email)
{
  $this->db->query('SELECT * FROM requested_pharmacist WHERE email= :email');
  $this->db->bind(':email',$email);  

  $row= $this->db->single();

  if($this->db->rowCount() >0){
        return true;
  }else{
        return false;
  }
}
// Find Nutritionist by Email 
      
public function findNutritionistByEmail($email)
{
  $this->db->query('SELECT * FROM nutritionist WHERE email= :email');
  $this->db->bind(':email',$email);  

  $row= $this->db->single();

  if($this->db->rowCount() >0){
        return true;
  }else{
        return false;
  }
}

 // Find Requested Nutritionist by Email

public function findReqNutritionistByEmail($email)
{
$this->db->query('SELECT * FROM requested_nutritionist WHERE email= :email');
$this->db->bind(':email',$email);  

$row= $this->db->single();

if($this->db->rowCount() >0){
      return true;
}else{
      return false;
}
}


       // Find Patient by Email
    
    public function findPatientByEmail($email)
    {
      $this->db->query('SELECT * FROM patient WHERE email= :email');
      $this->db->bind(':email',$email);  

      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return true;
      }else{
            return false;
      }
    }


      // Find Admin by Email 
      
      public function findAdminByEmail($email)
      {
        $this->db->query('SELECT * FROM Admin WHERE email= :email');
        $this->db->bind(':email',$email);  

        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return true;
        }else{
              return false;
        }
      }

     


   }


 ?>
