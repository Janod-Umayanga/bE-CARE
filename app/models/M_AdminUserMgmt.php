<?php

   class M_AdminUserMgmt{
      private $db;

      public function __construct()
      {
        $this->db=new Database();
      }

      //get No Of Doctors
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

      //get No Of Counsellors
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

      //get No Of Nutritionist
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


      //get No Of MeditationInstructor      
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

      //get No Of Pharmacist
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

      //get No Of Patient 
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

      //get No Of Active Patient
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

      //get No Of Deactive Patient
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

      //get No Of Active Doctor
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
      
      //get No Of Deactive Doctor
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

      //get No Of Active Counsellor
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
      
      //get No Of Deactive Counsellor
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

      //get No Of Active Pharmacist
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

      //get No Of Deactive Pharmacist
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

      //get No Of Active Nutritionist
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

      //get No Of Deactive Nutritionist
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

      //get No Of Active Admin
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

      //get No Of Deactive Admin
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

      //get No Of Active MeditationInstr
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

      //get No Of Deactive MeditationInstr
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
      
      //get No Of Admin
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

      //get Patients
      public function getPatients()
      {
        $this->db->query('SELECT *  FROM patient ');
       
        $result=$this->db->resultSet();
         return $result;
      } 

      //get Search Patients
      public function getSearchPatients($search)
      {
        $this->db->query("SELECT * FROM patient WHERE CONCAT(first_name,last_name) LIKE '%$search%' ");
        $result=$this->db->resultSet();
         return $result;
      } 
    
      
      
      //get Patient Details
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

      //get Doctors
      public function getDoctors()
      {
        $this->db->query('SELECT *  FROM doctor ');
       
        $result=$this->db->resultSet();
         return $result;
      } 

      //get Search Doctors
      public function getSearchDoctors($search)
      {
        $this->db->query("SELECT * FROM doctor WHERE CONCAT(first_name,last_name,city,type,specialization) LIKE '%$search%' ");
        $result=$this->db->resultSet();
         return $result;
      } 
    
      
      // get Doctor Details

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

      //get Counsellors
      public function getCounsellors()
      {
        $this->db->query('SELECT *  FROM counsellor ');
       
        $result=$this->db->resultSet();
         return $result;
      } 

      //get Search Counsellors
      public function getSearchCounsellors($search)
      {
        $this->db->query("SELECT * FROM counsellor WHERE CONCAT(first_name,last_name,city) LIKE '%$search%' ");
        $result=$this->db->resultSet();
         return $result;
      } 
    
      
      
      //get Counsellor Details
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

      //get Admins
      public function getAdmins()
      {
        $this->db->query('SELECT *  FROM admin ');
       
        $result=$this->db->resultSet();
         return $result;
      } 

      //get Search Admins
      public function getSearchAdmins($search)
      {
        $this->db->query("SELECT * FROM admin WHERE CONCAT(first_name,last_name) LIKE '%$search%' ");
        $result=$this->db->resultSet();
         return $result;
      } 
    
      
      //get Admin Details
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

      //get Meditation Instructors
      public function getMeditationInstructors()
      {
        $this->db->query('SELECT *  FROM meditation_instructor ');
       
        $result=$this->db->resultSet();
         return $result;
      } 

      //get Search Meditation Instructors
      public function getSearchMeditationInstructors($search)
      {
        $this->db->query("SELECT * FROM meditation_instructor WHERE CONCAT(first_name,last_name,city,address) LIKE '%$search%' ");
        $result=$this->db->resultSet();
         return $result;
      } 
    
      
      
      //get Meditation Instructor Details
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

      //get Pharmacists
      public function getPharmacists()
      {
        $this->db->query('SELECT *  FROM pharmacist ');
       
        $result=$this->db->resultSet();
         return $result;
      } 

      //get Search Pharmacists
      public function getSearchPharmacists($search)
      {
        $this->db->query("SELECT * FROM pharmacist WHERE CONCAT(first_name,last_name,city,pharmacy_name,address) LIKE '%$search%' ");
        $result=$this->db->resultSet();
         return $result;
      } 
    
      
      
      //get Pharmacist Details
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

      //get Nutritionists
      public function getNutritionists()
      { 
        $this->db->query('SELECT *  FROM nutritionist ');
       
        $result=$this->db->resultSet();
         return $result;
      } 

      //get Search Nutritionists
      public function getSearchNutritionists($search)
      {
        $this->db->query("SELECT * FROM nutritionist WHERE CONCAT(first_name,last_name) LIKE '%$search%' ");
        $result=$this->db->resultSet();
         return $result;
      } 
    
      
      
      //get Nutritionist Details
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

      // Find Doctor by Nic
      public function findDoctorByNic($nic)
      {
        $this->db->query('SELECT * FROM doctor WHERE nic= :nic');
        $this->db->bind(':nic',$nic);  

        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return true;
        }else{
              return false;
        }
    }

       // Find Requested Doctor by Nic
    
      public function findReqDoctorByNic($nic)
      {
            $this->db->query('SELECT * FROM requested_doctor WHERE nic= :nic');
            $this->db->bind(':nic',$nic);  

            $row= $this->db->single();

            if($this->db->rowCount() >0){
                  return true;
            }else{
                  return false;
            }
      }


      
       // Find  Doctor by Contact Number
    
      public function findDoctorByContactNumber($contact_number)
      {
        $this->db->query('SELECT * FROM doctor WHERE contact_number= :contact_number');
        $this->db->bind(':contact_number',$contact_number);  

        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return true;
        }else{
              return false;
        }
    }

       // Find Requested Doctor by Contact Number
    
      public function findReqDoctorByContactNumber($contact_number)
      {
            $this->db->query('SELECT * FROM requested_doctor WHERE contact_number= :contact_number');
            $this->db->bind(':contact_number',$contact_number);  

            $row= $this->db->single();

            if($this->db->rowCount() >0){
                  return true;
            }else{
                  return false;
            }
      }

            // Find  Doctor by Slmc
            
            public function findDoctorBySlmc($slmc_reg_number)
            {
            $this->db->query('SELECT * FROM doctor WHERE slmc_reg_number= :slmc_reg_number');
            $this->db->bind(':slmc_reg_number',$slmc_reg_number);  

            $row= $this->db->single();

            if($this->db->rowCount() >0){
                  return true;
            }else{
                  return false;
            }
            }

            // Find Requested Doctor by Slmc

            public function findReqDoctorBySlmc($slmc_reg_number)
            {
                  $this->db->query('SELECT * FROM requested_doctor WHERE slmc_reg_number= :slmc_reg_number');
                  $this->db->bind(':slmc_reg_number',$slmc_reg_number);  

                  $row= $this->db->single();

                  if($this->db->rowCount() >0){
                        return true;
                  }else{
                        return false;
                  }
            }


           // Find  Doctor by Account Number
            
            public function findDoctorByAccountNumber($account_number)
            {
            $this->db->query('SELECT * FROM doctor WHERE account_number= :account_number');
            $this->db->bind(':account_number',$account_number);  

            $row= $this->db->single();

            if($this->db->rowCount() >0){
                  return true;
            }else{
                  return false;
            }
            }

            // Find Requested Doctor by Account Number

            public function findReqDoctorByAccountNumber($account_number)
            {
                  $this->db->query('SELECT * FROM requested_doctor WHERE account_number= :account_number');
                  $this->db->bind(':account_number',$account_number);  

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



      // Find Counsellor by Nic
      public function findCounsellorByNic($nic)
      {
        $this->db->query('SELECT * FROM counsellor WHERE nic= :nic');
        $this->db->bind(':nic',$nic);  

        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return true;
        }else{
              return false;
        }
    }

       // Find Requested Counsellor by Nic
    
      public function findReqCounsellorByNic($nic)
      {
            $this->db->query('SELECT * FROM requested_counsellor WHERE nic= :nic');
            $this->db->bind(':nic',$nic);  

            $row= $this->db->single();

            if($this->db->rowCount() >0){
                  return true;
            }else{
                  return false;
            }
      }


      
       // Find  Counsellor by Contact Number
    
      public function findCounsellorByContactNumber($contact_number)
      {
        $this->db->query('SELECT * FROM counsellor WHERE contact_number= :contact_number');
        $this->db->bind(':contact_number',$contact_number);  

        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return true;
        }else{
              return false;
        }
    }

       // Find Requested Counsellor by Contact Number
    
      public function findReqCounsellorByContactNumber($contact_number)
      {
            $this->db->query('SELECT * FROM requested_counsellor WHERE contact_number= :contact_number');
            $this->db->bind(':contact_number',$contact_number);  

            $row= $this->db->single();

            if($this->db->rowCount() >0){
                  return true;
            }else{
                  return false;
            }
      }

            // Find  Counsellor by Slmc
            
            public function findCounsellorBySlmc($slmc_reg_number)
            {
            $this->db->query('SELECT * FROM counsellor WHERE slmc_reg_number= :slmc_reg_number');
            $this->db->bind(':slmc_reg_number',$slmc_reg_number);  

            $row= $this->db->single();

            if($this->db->rowCount() >0){
                  return true;
            }else{
                  return false;
            }
            }

            // Find Requested Counsellor by Slmc

            public function findReqCounsellorBySlmc($slmc_reg_number)
            {
                  $this->db->query('SELECT * FROM requested_counsellor WHERE slmc_reg_number= :slmc_reg_number');
                  $this->db->bind(':slmc_reg_number',$slmc_reg_number);  

                  $row= $this->db->single();

                  if($this->db->rowCount() >0){
                        return true;
                  }else{
                        return false;
                  }
            }


           // Find  Counsellor by Account Number
            
            public function findCounsellorByAccountNumber($account_number)
            {
            $this->db->query('SELECT * FROM counsellor WHERE account_number= :account_number');
            $this->db->bind(':account_number',$account_number);  

            $row= $this->db->single();

            if($this->db->rowCount() >0){
                  return true;
            }else{
                  return false;
            }
            }

            // Find Requested Counsellor by Account Number

            public function findReqCounsellorByAccountNumber($account_number)
            {
                  $this->db->query('SELECT * FROM requested_counsellor WHERE account_number= :account_number');
                  $this->db->bind(':account_number',$account_number);  

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



  
      // Find MeditationInstructor by Nic
      public function findMeditationInstructorByNic($nic)
      {
        $this->db->query('SELECT * FROM meditation_instructor WHERE nic= :nic');
        $this->db->bind(':nic',$nic);  

        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return true;
        }else{
              return false;
        }
    }

       // Find Requested MeditationInstructor by Nic
    
      public function findReqMeditationInstructorByNic($nic)
      {
            $this->db->query('SELECT * FROM requested_meditation_instructor WHERE nic= :nic');
            $this->db->bind(':nic',$nic);  

            $row= $this->db->single();

            if($this->db->rowCount() >0){
                  return true;
            }else{
                  return false;
            }
      }


      
       // Find  MeditationInstructor by Contact Number
    
      public function findMeditationInstructorByContactNumber($contact_number)
      {
        $this->db->query('SELECT * FROM meditation_instructor WHERE contact_number= :contact_number');
        $this->db->bind(':contact_number',$contact_number);  

        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return true;
        }else{
              return false;
        }
    }

       // Find Requested MeditationInstructor by Contact Number
    
      public function findReqMeditationInstructorByContactNumber($contact_number)
      {
            $this->db->query('SELECT * FROM requested_meditation_instructor WHERE contact_number= :contact_number');
            $this->db->bind(':contact_number',$contact_number);  

            $row= $this->db->single();

            if($this->db->rowCount() >0){
                  return true;
            }else{
                  return false;
            }
      }


           

           // Find  MeditationInstructor by Account Number
            
            public function findMeditationInstructorByAccountNumber($account_number)
            {
            $this->db->query('SELECT * FROM meditation_instructor WHERE account_number= :account_number');
            $this->db->bind(':account_number',$account_number);  

            $row= $this->db->single();

            if($this->db->rowCount() >0){
                  return true;
            }else{
                  return false;
            }
            }

            // Find Requested MeditationInstructor by Account Number

            public function findReqMeditationInstructorByAccountNumber($account_number)
            {
                  $this->db->query('SELECT * FROM requested_meditation_instructor WHERE account_number= :account_number');
                  $this->db->bind(':account_number',$account_number);  

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



            // Find Pharmacist by Nic
      public function findPharmacistByNic($nic)
      {
        $this->db->query('SELECT * FROM pharmacist WHERE nic= :nic');
        $this->db->bind(':nic',$nic);  

        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return true;
        }else{
              return false;
        }
    }

       // Find Requested Pharmacist by Nic
    
      public function findReqPharmacistByNic($nic)
      {
            $this->db->query('SELECT * FROM requested_pharmacist WHERE nic= :nic');
            $this->db->bind(':nic',$nic);  

            $row= $this->db->single();

            if($this->db->rowCount() >0){
                  return true;
            }else{
                  return false;
            }
      }


      
       // Find  Pharmacist by Contact Number
    
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

       // Find Requested Pharmacist by Contact Number
    
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

            // Find  Pharmacist by Slmc
            
            public function findPharmacistBySlmc($slmc_reg_number)
            {
            $this->db->query('SELECT * FROM pharmacist WHERE slmc_reg_number= :slmc_reg_number');
            $this->db->bind(':slmc_reg_number',$slmc_reg_number);  

            $row= $this->db->single();

            if($this->db->rowCount() >0){
                  return true;
            }else{
                  return false;
            }
            }

            // Find Requested Pharmacist by Slmc

            public function findReqPharmacistBySlmc($slmc_reg_number)
            {
                  $this->db->query('SELECT * FROM requested_pharmacist WHERE slmc_reg_number= :slmc_reg_number');
                  $this->db->bind(':slmc_reg_number',$slmc_reg_number);  

                  $row= $this->db->single();

                  if($this->db->rowCount() >0){
                        return true;
                  }else{
                        return false;
                  }
            }


           // Find  Pharmacist by Account Number
            
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

            // Find Requested Pharmacist by Account Number

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



      // Find Nutritionist by Nic
      public function findNutritionistByNic($nic)
      {
        $this->db->query('SELECT * FROM nutritionist WHERE nic= :nic');
        $this->db->bind(':nic',$nic);  

        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return true;
        }else{
              return false;
        }
    }

       // Find Requested Nutritionist by Nic
    
      public function findReqNutritionistByNic($nic)
      {
            $this->db->query('SELECT * FROM requested_nutritionist WHERE nic= :nic');
            $this->db->bind(':nic',$nic);  

            $row= $this->db->single();

            if($this->db->rowCount() >0){
                  return true;
            }else{
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

            // Find  Nutritionist by Slmc
            
            public function findNutritionistBySlmc($slmc_reg_number)
            {
            $this->db->query('SELECT * FROM nutritionist WHERE slmc_reg_number= :slmc_reg_number');
            $this->db->bind(':slmc_reg_number',$slmc_reg_number);  

            $row= $this->db->single();

            if($this->db->rowCount() >0){
                  return true;
            }else{
                  return false;
            }
            }

            // Find Requested Nutritionist by Slmc

            public function findReqNutritionistBySlmc($slmc_reg_number)
            {
                  $this->db->query('SELECT * FROM requested_nutritionist WHERE slmc_reg_number= :slmc_reg_number');
                  $this->db->bind(':slmc_reg_number',$slmc_reg_number);  

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

      // Find patient by nic
      public function  findPatientByNic($nic) {
            $this->db->query('SELECT * FROM patient WHERE nic = :nic');
            $this->db->bind(':nic', $nic);

            $row = $this->db->single();

            if($this->db->rowCount() > 0) {
            return $row;
            }
            else {
            return false;
            }
      }

      //findPatientByContactNumber

      public function findPatientByContactNumber($contactnumber) {
            $this->db->query('SELECT * FROM patient WHERE contact_number = :contactnumber');
            $this->db->bind(':contactnumber', $contactnumber);

            $row = $this->db->single();

            if($this->db->rowCount() > 0) {
            return $row;
            }
            else {
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


      // Find Admin by Account Number

      public function  findAdminByAccountNumber($account_number)
      {
            $this->db->query('SELECT * FROM admin WHERE account_number= :account_number');
            $this->db->bind(':account_number',$account_number);  

            $row= $this->db->single();

            if($this->db->rowCount() >0){
                  return true;
            }else{
                  return false;
            }
      }




      // Find admin by nic
      public function  findAdminByNic($nic) {
            $this->db->query('SELECT * FROM admin WHERE nic = :nic');
            $this->db->bind(':nic', $nic);

            $row = $this->db->single();

            if($this->db->rowCount() > 0) {
            return $row;
            }
            else {
            return false;
            }
      }

      //findAdminByContactNumber

      public function findAdminByContactNumber($contactnumber) {
            $this->db->query('SELECT * FROM admin WHERE contact_number = :contactnumber');
            $this->db->bind(':contactnumber', $contactnumber);

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
