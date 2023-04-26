
<?php

class AdminUserMgmt extends Controller{
  private $adminUserMgmtModel; 

  public function __construct(){
    $this->adminUserMgmtModel = $this->model('M_AdminUserMgmt');
  }

  public function adminUserMgmt()
  {
   if(isset($_SESSION['admin_id'])) {  
   
  //Get number of Doctors
   $doctor= $this->adminUserMgmtModel->getNoOfDoctors();
  
   //Get number of Counsellors
   $counsellor= $this->adminUserMgmtModel->getNoOfCounsellors();

   //Get number of Nutritionist
   $nutritionist= $this->adminUserMgmtModel->getNoOfNutritionist();
  
   //Get number of Meditatin Instructor
   $meditationInstr= $this->adminUserMgmtModel->getNoOfMeditationInstr();
   
   //Get number of pharmacist
   $pharmacist= $this->adminUserMgmtModel->getNoOfPharmacist();

   //Get number of patient
   $patient= $this->adminUserMgmtModel->getNoOfPatient();

   //Get number Of Admin 
   $admin= $this->adminUserMgmtModel->getNoOfAdmin();

   //Get No Of Active Patient
   $patient_active= $this->adminUserMgmtModel->getNoOfActivePatient();

   //Get No Of Deactive Patient
   $patient_deactive=$this->adminUserMgmtModel->getNoOfDeactivePatient();
   
   //Get No Of Active Doctor
   $doctor_active= $this->adminUserMgmtModel->getNoOfActiveDoctor();

   //Get No Of Deactive Doctor
   $doctor_deactive=$this->adminUserMgmtModel->getNoOfDeactiveDoctor();
   
  //Get No Of Active Counsellor
   $counsellor_active= $this->adminUserMgmtModel->getNoOfActiveCounsellor();

  //Get No Of Deactive Counsellor
   $counsellor_deactive=$this->adminUserMgmtModel->getNoOfDeactiveCounsellor();
   
  //Get No Of Active Nutritionist
   $nutritionist_active= $this->adminUserMgmtModel->getNoOfActiveNutritionist();
  
   //Get No Of Deactive Nutritionist
   $nutritionist_deactive=$this->adminUserMgmtModel->getNoOfDeactiveNutritionist();
  
   //Get No Of Active Meditation Instructors
   $meditationInstr_active= $this->adminUserMgmtModel->getNoOfActiveMeditationInstr();
  
   //Get No Of Deactive Meditation Instructors
   $meditationInstr_deactive=$this->adminUserMgmtModel->getNoOfDeactiveMeditationInstr();
  
  //Get No Of Active Pharmacist
  $pharmacist_active= $this->adminUserMgmtModel->getNoOfActivePharmacist();
 
  //Get No Of Deactive Pharmacist
   $pharmacist_deactive=$this->adminUserMgmtModel->getNoOfDeactivePharmacist();
  
  //Get No Of Active Admin
   $admin_active= $this->adminUserMgmtModel->getNoOfActiveAdmin();

  //Get No Of Deactive Admin
   $admin_deactive=$this->adminUserMgmtModel->getNoOfDeactiveAdmin();
   
   $data=[                      
     'doctor'=>$doctor,
     'counsellor'=>$counsellor,
     'nutritionist'=>$nutritionist,
     'meditationInstructor'=>$meditationInstr,
     'pharmacist'=>$pharmacist,
     'patient'=>$patient,
     'admin'=>$admin,
     'patient_active'=>$patient_active,
     'patient_deactive'=>$patient_deactive,
   
     'doctor_active'=>$doctor_active,
     'doctor_deactive'=>$doctor_deactive,
     'counsellor_active'=>$counsellor_active,
     'counsellor_deactive'=>$counsellor_deactive,
     'nutritionist_active'=>$nutritionist_active,
     'nutritionist_deactive'=>$nutritionist_deactive,
     'meditationInstructor_active'=>$meditationInstr_active,
     'meditationInstructor_deactive'=>$meditationInstr_deactive,
     'pharmacist_active'=>$pharmacist_active,
     'pharmacist_deactive'=>$pharmacist_deactive,
     'admin_active'=>$admin_active,
     'admin_deactive'=>$admin_deactive,
   
   
   ];
   $this->view('Admin/AdminUserMgmt/v_userMgmt',$data);

   
  }else{
    redirect('Login/login');  
  }

  }


  //Admin UserMgmt Patient
  public function Patient()
  {
    if(isset($_SESSION['admin_id'])) {  
  
    $patient= $this->adminUserMgmtModel->getPatients();
   
   $data=[                      
     'patient'=>$patient,
     'search'=>''
   ];
   $this->view('Admin/AdminUserMgmt/Patient/v_patientUserMgmt',$data);


  }else{
    redirect('Login/login');  
  }
  }


  //Admin UserMgmt Doctor
  public function Doctor()
  {
    if(isset($_SESSION['admin_id'])) {  
  
    $doctor= $this->adminUserMgmtModel->getDoctors();
   
   $data=[                      
     'doctor'=>$doctor,
     'search'=>''
   ];
   $this->view('Admin/AdminUserMgmt/Doctor/v_doctorUserMgmt',$data);

  }else{
    redirect('Login/login');  
  }

  }

  //Admin UserMgmt Counsellor
  public function Counsellor()
  {
    if(isset($_SESSION['admin_id'])) {  
  
    $counsellor= $this->adminUserMgmtModel->getCounsellors();
   
   $data=[                      
     'counsellor'=>$counsellor,
     'search'=>''
   ];
   $this->view('Admin/AdminUserMgmt/Counsellor/v_counsellorUserMgmt',$data);


  }else{
    redirect('Login/login');  
  }
  }

  //Admin UserMgmt Nutritionist
  public function Nutritionist()
  {
    if(isset($_SESSION['admin_id'])) {  
  
    $nutritionist= $this->adminUserMgmtModel->getNutritionists();
   
   $data=[                      
     'nutritionist'=>$nutritionist,
     'search'=>''
   ];
   $this->view('Admin/AdminUserMgmt/Nutritionist/v_nutritionistUserMgmt',$data);


  }else{
    redirect('Login/login');  
  }
  }
  
  //Admin UserMgmt Meditation Instructor
  public function MeditationInstructor()
  {
    if(isset($_SESSION['admin_id'])) {  
  
    $meditationInstructor= $this->adminUserMgmtModel->getMeditationInstructors();
                                                            
   $data=[                      
     'meditationInstructor'=>$meditationInstructor,
     'search'=>''
   ];
   $this->view('Admin/AdminUserMgmt/MeditationInstructor/v_medInstrUserMgmt',$data);


  }else{
    redirect('Login/login');  
  }
  }
  
//Admin UserMgmt Pharmacist
  public function Pharmacist()
  {
    if(isset($_SESSION['admin_id'])) {  
  
    $pharmacist= $this->adminUserMgmtModel->getPharmacists();
   
   $data=[                      
     'pharmacist'=>$pharmacist,
     'search'=>''
   ];
   $this->view('Admin/adminUserMgmt/Pharmacist/v_pharmacistUserMgmt',$data);

  }else{
    redirect('Login/login');  
  }

  }

  //Admin UserMgmt Admin
  public function Admin()
  {
    if(isset($_SESSION['admin_id'])) {  
  
    $admin= $this->adminUserMgmtModel->getAdmins();
   
   $data=[                      
     'admin'=>$admin,
     'search'=>''
   ];
   $this->view('Admin/adminUserMgmt/Admin/v_adminUserMgmt',$data);


  }else{
    redirect('Login/login');  
  }
  }


  // Doctor

  //Admin Search Doctor
  public function  adminSearchDoctor()
  {
    if(isset($_SESSION['admin_id'])) {  
  
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

          $search=trim($_GET['search']);
           
          $doctor= $this->adminUserMgmtModel->getSearchDoctors($search);
          
          $data=[                      
            'doctor'=>$doctor,
            'search'=>$search
          ];
          $this->view('Admin/AdminUserMgmt/Doctor/v_doctorUserMgmt',$data);
     }else{
          $data=[                      
            'doctor'=>'',
            'search'=>''
          ];
          $this->view('Admin/AdminUserMgmt/Doctor/v_doctorUserMgmt',$data);
     }

    }else{
      redirect('Login/login');  
    }
  }

 //Admin View More Doctor
  public function  adminViewMoreDoctor($doctor_id)
  {
    if(isset($_SESSION['admin_id'])) {  
  
    $doctor= $this->adminUserMgmtModel->getDoctorDetails($doctor_id);
   
   $data=[                      
     'doctor'=>$doctor
     
   ];
   $this->view('Admin/AdminUserMgmt/Doctor/v_doctorViewMore',$data);

  }else{
    redirect('Login/login');  
  }
  }

  

//Pharmacist
 
//Admin Search Pharmacist
public function  adminSearchPharmacist()
{
  if(isset($_SESSION['admin_id'])) {  
  
  if($_SERVER['REQUEST_METHOD']=='GET'){
    $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        $search=trim($_GET['search']);
        
        $pharmacist= $this->adminUserMgmtModel->getSearchPharmacists($search);
        
        $data=[                      
          'pharmacist'=>$pharmacist,
          'search'=>$search
        ];
        $this->view('Admin/AdminUserMgmt/Pharmacist/v_pharmacistUserMgmt',$data);
   }else{
        $data=[                      
          'pharmacist'=>'',
          'search'=>''
        ];
        $this->view('Admin/AdminUserMgmt/Pharmacist/v_pharmacistUserMgmt',$data);
   }

  }else{
    redirect('Login/login');  
  }
}

//Admin View More Pharmacist
public function  adminViewMorePharmacist($pharmacist_id)
{
  if(isset($_SESSION['admin_id'])) {  
  
  $pharmacist= $this->adminUserMgmtModel->getPharmacistDetails($pharmacist_id);
 
 $data=[                      
   'pharmacist'=>$pharmacist
   
 ];
 $this->view('Admin/AdminUserMgmt/Pharmacist/v_pharmacistViewMore',$data);

}else{
  redirect('Login/login');  
}
}

  

//Counsellor

//Admin Search Counsellor
public function  adminSearchCounsellor()
{
  if(isset($_SESSION['admin_id'])) {  
  
  if($_SERVER['REQUEST_METHOD']=='GET'){
    $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        $search=trim($_GET['search']);
         
        $counsellor= $this->adminUserMgmtModel->getSearchCounsellors($search);
        
        $data=[                      
          'counsellor'=>$counsellor,
          'search'=>$search
        ];
        $this->view('Admin/AdminUserMgmt/Counsellor/v_counsellorUserMgmt',$data);
   }else{
        $data=[                      
          'counsellor'=>'',
          'search'=>''
        ];
        $this->view('Admin/AdminUserMgmt/Counsellor/v_counsellorUserMgmt',$data);
   }

  }else{
    redirect('Login/login');  
  }
}

//Admin View More Counsellor
public function  adminViewMoreCounsellor($counsellor_id)
{
  if(isset($_SESSION['admin_id'])) {  
  
  $counsellor= $this->adminUserMgmtModel->getCounsellorDetails($counsellor_id);
   
 $data=[                      
   'counsellor'=>$counsellor
   
 ];
 $this->view('Admin/AdminUserMgmt/Counsellor/v_counsellorViewMore',$data);

}else{
  redirect('Login/login');  
}
}



//Nutritionist

//Admin Search Nutritionist
public function  adminSearchNutritionist()
{
  if(isset($_SESSION['admin_id'])) {  
  
  if($_SERVER['REQUEST_METHOD']=='GET'){
    $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        $search=trim($_GET['search']);
        
        $nutritionist= $this->adminUserMgmtModel->getSearchNutritionists($search);
        
        $data=[                      
          'nutritionist'=>$nutritionist,
          'search'=>$search
        ];
        $this->view('Admin/AdminUserMgmt/Nutritionist/v_nutritionistUserMgmt',$data);
   }else{
        $data=[                      
          'nutritionist'=>'',
          'search'=>''
        ];
        $this->view('Admin/AdminUserMgmt/Nutritionist/v_nutritionistUserMgmt',$data);
   }

  }else{
    redirect('Login/login');  
  }
}

// Admin View More Nutritionist
public function  adminViewMoreNutritionist($nutritionist_id)
{
  if(isset($_SESSION['admin_id'])) {  
  
  $nutritionist= $this->adminUserMgmtModel->getNutritionistDetails($nutritionist_id);
 
 $data=[                      
   'nutritionist'=>$nutritionist
   
 ];
 $this->view('Admin/AdminUserMgmt/Nutritionist/v_nutritionistViewMore',$data);

}else{
  redirect('Login/login');  
}
}


//Meditation Instructor

//Admin Search Meditation Instructor
public function  adminSearchMeditationInstructor()
{
  if(isset($_SESSION['admin_id'])) {  
  
  if($_SERVER['REQUEST_METHOD']=='GET'){
    $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        $search=trim($_GET['search']);
        
        $meditationInstructor= $this->adminUserMgmtModel->getSearchMeditationInstructors($search);
        
        $data=[                      
          'meditationInstructor'=>$meditationInstructor,
          'search'=>$search
        ];
        $this->view('Admin/AdminUserMgmt/MeditationInstructor/v_medInstrUserMgmt',$data);
   }else{
        $data=[                      
          'meditationInstructor'=>'',
          'search'=>''
        ];
        $this->view('Admin/AdminUserMgmt/MeditationInstructor/v_medInstrUserMgmt',$data);
   }

  }else{
    redirect('Login/login');  
  }
}

 //Admin View More MeditationInstructor               
public function  adminViewMoreMeditationInstructor($meditationInstructor_id)
{
  if(isset($_SESSION['admin_id'])) {  
  
  $meditationInstructor= $this->adminUserMgmtModel->getMeditationInstructorDetails($meditationInstructor_id);
 
 $data=[                      
   'meditationInstructor'=>$meditationInstructor
   
 ];
 $this->view('Admin/AdminUserMgmt/MeditationInstructor/v_medInstrViewMore',$data);

}else{
  redirect('Login/login');  
}
}

  



  // Patient

//Admin Search Patient
  public function  adminSearchPatient()
  {
    if(isset($_SESSION['admin_id'])) {  
  
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

          $search=trim($_GET['search']);
           
          $patient= $this->adminUserMgmtModel->getSearchPatients($search);
          
          $data=[                      
            'patient'=>$patient,
            'search'=>$search
          ];
          $this->view('Admin/AdminUserMgmt/Patient/v_patientUserMgmt',$data);
     }else{
          $data=[                      
            'patient'=>'',
            'search'=>''
          ];
          $this->view('Admin/AdminUserMgmt/patient/v_patientUserMgmt',$data);
     }

    }else{
      redirect('Login/login');  
    }
  }

//Admin View More Patient
  public function  adminViewMorePatient($patient_id)
  {
    if(isset($_SESSION['admin_id'])) {  
  
    $patient= $this->adminUserMgmtModel->getpatientDetails($patient_id);
   
   $data=[                      
     'patient'=>$patient
     
   ];
   $this->view('Admin/AdminUserMgmt/Patient/v_patientViewMore',$data);

  }else{
    redirect('Login/login');  
  }
  }




  // Admin

//Admin Search Admin
  public function  adminSearchAdmin()
  {
    if(isset($_SESSION['admin_id'])) {  
  
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

          $search=trim($_GET['search']);
           
          $admin= $this->adminUserMgmtModel->getSearchAdmins($search);
          
          $data=[                      
            'admin'=>$admin,
            'search'=>$search
          ];
          $this->view('Admin/AdminUserMgmt/Admin/v_adminUserMgmt',$data);
     }else{
          $data=[                      
            'admin'=>'',
            'search'=>''
          ];
          $this->view('Admin/AdminUserMgmt/Admin/v_adminUserMgmt',$data);
     }

    }else{
      redirect('Login/login');  
    }
  }

//Admin View More Admin
  public function  adminViewMoreAdmin($admin_id)
  {
    if(isset($_SESSION['admin_id'])) {  
  
    $admin= $this->adminUserMgmtModel->getadminDetails($admin_id);
   
   $data=[                      
     'admin'=>$admin
     
   ];
   $this->view('Admin/AdminUserMgmt/Admin/v_adminViewMore',$data);

  }else{
    redirect('Login/login');  
  }
  }



    //Add new Patient

     public function  addnewPatient()
    {
      if(isset($_SESSION['admin_id'])) {  
  
      if($_SERVER['REQUEST_METHOD']=='POST'){
        $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      
        $data=[
          'first_name'=>trim($_POST['first_name']),
          'last_name'=>trim($_POST['last_name']),
          'nic'=>trim($_POST['nic']),
          'contact_number'=>trim($_POST['contact_number']),
          'email'=>trim($_POST['email']),
          'password'=>trim($_POST['password']),
          'confirm_password'=>trim($_POST['confirm_password']),
          'gender'=>trim($_POST['gender']),
      
      
          'first_name_err'=>'',
          'last_name_err'=>'',
          'nic_err'=>'',
          'contact_number_err'=>'',
          'email_err'=>'',
          'password_err'=>'',
          'confirm_password_err'=>'',
          'gender_err'=>''
      

        ];
      
       if($this->adminUserMgmtModel->findPatientByEmail($data['email'])){
        $data['email_err']='Email is already registered';

      } 
       if(empty($data['first_name'])){
          $data['first_name_err']='first name can not be empty';
       }else if(validateFirstName($data['first_name'])!="true"){
        $data['first_name_err']=validateFirstName($data['first_name']);
       }
      
       if(empty($data['last_name'])){
          $data['last_name_err']='last name can not be empty';
       }else if(validateLastName($data['last_name'])!="true"){
        $data['last_name_err']=validateLastName($data['last_name']);
       }
    

       if(empty($data['nic'])){
        $data['nic_err']='nic can not be empty';
       }else if(validateNIC($data['nic'])!="true"){
        $data['nic_err']=validateNIC($data['nic']);
       }

    
        if(empty($data['contact_number'])){
          $data['contact_number_err']='contact number can not be empty';
        }else if(validateContactNumber($data['contact_number'])!="true"){
          $data['contact_number_err']=validateContactNumber($data['contact_number']);
        }
    
        if(empty($data['email'])){
          $data['email_err']='email can not be empty';
        }else if(validateEmail($data['email'])!="true"){
          $data['email_err']=validateEmail($data['email']);
         }
      
      if(empty($data['password'])){
          $data['password_err']='password can not be empty';
      }else if(validatePassword($data['password'])!="true"){
        $data['password_err']=validatePassword($data['password']);
       }
    
      if(empty($data['confirm_password'])){
        $data['confirm_password_err']='confirm password can not be empty';
      }else if(validatePassword($data['confirm_password'])!="true"){
        $data['confirm_password_err']=validatePassword($data['confirm_password']);
       }
    
    
      if(empty($data['gender'])){
        $data['gender_err']='gender can not be empty';
      }


       if(empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['nic_err'])&& empty($data['contact_number_err'])&& empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])&& empty($data['gender_err'])){
           $password=$data['password'];
           $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
         
           if($this->adminUserMgmtModel->addPatient($data)){
                sendMail($data['email'],$data['first_name'],'', 2,$password);
                redirect('AdminUserMgmt/patient'); 
            }else{
              $this->view('Admin/AdminUserMgmt/Patient/v_patientAddNew',$data);
            }  
       
       }else{
            $this->view('Admin/AdminUserMgmt/Patient/v_patientAddNew',$data);

        }
      
           
      }else{
              
             
 
        $data=[
 
         

          'first_name'=>'',
          'last_name'=>'',
          'nic'=>'',
          'contact_number'=>'',
          'email'=>'',
          'password'=>'',
          'confirm_password'=>'',
          'gender'=>'',
  
          

         'first_name_err'=>'',
         'last_name_err'=>'',
         'nic_err'=>'',
         'contact_number_err'=>'',
         'email_err'=>'',
         'password_err'=>'',
         'confirm_password_err'=>'',
         'gender_err'=>'',
 

       
        ];
 
        $this->view('Admin/AdminUserMgmt/Patient/v_patientAddNew',$data);

  }
}else{
  redirect('Login/login');  
}
 
        
    }


      //Add new Doctor

       public function  addnewDoctor()
       {
        if(isset($_SESSION['admin_id'])) {  
  
        if($_SERVER['REQUEST_METHOD']=='POST'){
           $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
         
           $data=[
             'first_name'=>trim($_POST['first_name']),
             'last_name'=>trim($_POST['last_name']),
             'nic'=>trim($_POST['nic']),
             'contact_number'=>trim($_POST['contact_number']),
             'email'=>trim($_POST['email']),
             'password'=>trim($_POST['password']),
             'confirm_password'=>trim($_POST['confirm_password']),
             'city'=>trim($_POST['city']),
             'bank_name'=>trim($_POST['bank_name']),
             'account_holder_name'=>trim($_POST['account_holder_name']),
             'branch'=>trim($_POST['branch']),
             'account_number'=>trim($_POST['account_number']),
             'slmc_reg_number'=>trim($_POST['slmc']),
             'type'=>trim($_POST['type']),
             'specialization'=>trim($_POST['specialization']),
             'gender'=>trim($_POST['gender']),
             'qualification_file'=>$_FILES['qualification_file'],
             'qualification_file_name'=>trim($_POST['first_name']).' '.trim($_POST['last_name']).'_'.$_FILES['qualification_file']['name'],
             
          
             'first_name_err'=>'',
             'last_name_err'=>'',
             'nic_err'=>'',
             'contact_number_err'=>'',
             'email_err'=>'',
             'password_err'=>'',
             'confirm_password_err'=>'',
             'city_err'=>'',
             'bank_name_err'=>'',
             'account_holder_name_err'=>'',
             'branch_err'=>'',
             'account_number_err'=>'',
             'slmc_reg_number_err'=>'',
             'type_err'=>'',
             'specialization_err'=>'',
             'gender_err'=>'',
             'qualification_file_err'=>'',
             
          ];
       
          if(empty($data['qualification_file'])){
            $data['qualification_file_err']='qualification file can not be empty';
          }else{
              $fileExt=explode('.',$_FILES['qualification_file']['name']);
              $fileActualExt=strtolower(end($fileExt));
              $allowed=array('jpg','jpeg','png','pdf','zip','rar');

            
              if(!in_array($fileActualExt,$allowed)){
                $data['qualification_file_err']='You cannot upload files of this type';

              }
        

              if($data['qualification_file']['size']>0){
                if(uploadFile($data['qualification_file']['tmp_name'],$data['qualification_file_name'],'/upload/doctor_qualification/')){
                          
                }else{  
                $data['qualification_file_err']='Unsuccessful qualification_file uploading';
                
                }
              }else{
                $data[ 'qualification_file_err'] ="qualification file size is empty";
              
              }
    
          }
          if(empty($data['first_name'])){
             $data['first_name_err']='first name can not be empty';
          }else if(validateFirstName($data['first_name'])!="true"){
            $data['first_name_err']=validateFirstName($data['first_name']);
           }
         
          if(empty($data['last_name'])){
             $data['last_name_err']='last name can not be empty';
          }else if(validateLastName($data['last_name'])!="true"){
            $data['last_name_err']=validateLastName($data['last_name']);
           }
       
          if(empty($data['nic'])){
            $data['nic_err']='nic can not be empty';
         }else if(validateNIC($data['nic'])!="true"){
          $data['nic_err']=validateNIC($data['nic']);
         }
        
         if(empty($data['contact_number'])){
            $data['contact_number_err']='contact number can not be empty';
         }else if(validateContactNumber($data['contact_number'])!="true"){
          $data['contact_number_err']=validateContactNumber($data['contact_number']);
        }
    
          
          if(empty($data['email'])){
              $data['email_err']='email can not be empty';
          }else if(validateEmail($data['email'])!="true"){
            $data['email_err']=validateEmail($data['email']);
           }
          
          if(empty($data['password'])){
              $data['password_err']='password can not be empty';
          }else if(validatePassword($data['password'])!="true"){
            $data['password_err']=validatePassword($data['password']);
           }
        
          if(empty($data['confirm_password'])){
            $data['confirm_password_err']='confirm password  can not be empty';
          }else if(validatePassword($data['confirm_password'])!="true"){
            $data['confirm_password_err']=validatePassword($data['confirm_password']);
           }
        
          if(empty($data['city'])){
            $data['city_err']='city can not be empty';
          }else if(validateCity($data['city'])!="true"){
            $data['city_err']=validateCity($data['city']);
           }

          if(empty($data['bank_name'])){
              $data['bank_name_err']='bank name can not be empty';
          }else if(validateBankName($data['bank_name'])!="true"){
            $data['bank_name_err']=validateBankName($data['bank_name']);
           }
          
          if(empty($data['account_holder_name'])){
              $data['account_holder_name_err']='account holder name can not be empty';
          }else if(validateAccountHolderName($data['account_holder_name'])!="true"){
            $data['account_holder_name_err']=validateAccountHolderName($data['account_holder_name']);
           }
          
        
          if(empty($data['branch'])){
            $data['branch_err']='branch name can not be empty';
          }else if(validateBankBranch($data['branch'])!="true"){
            $data['branch_err']=validateBankBranch($data['branch']);
           }
          
        
          if(empty($data['account_number'])){
            $data['account_number_err']='account number can not be empty';
          }else if(validateAccountNumber($data['account_number'])!="true"){
            $data['account_number_err']=validateAccountNumber($data['account_number']);
           }
          

          if(empty($data['slmc_reg_number'])){
            $data['slmc_reg_number_err']='slmc reg number can not be empty';
         }else if(validateSlmcRegisterNumber($data['slmc_reg_number'])!="true"){
          $data['slmc_reg_number_err']=validateSlmcRegisterNumber($data['slmc_reg_number']);
         }
        
        
          if(empty($data['type'])){
              $data['type_err']='type can not be empty';
          }
        
          if(empty($data['specialization'])){
            $data['specialization_err']='specialization can not be empty';
          }else if(validateSpecialization($data['specialization'])!="true"){
            $data['specialization_err']=validateSpecialization($data['specialization']);
           }
          
          

          if(empty($data['gender'])){
            $data['gender_err']='gender can not be empty';
          }
          
       

          
          if($data['password']!=$data['confirm_password']){
           $data['password_err']='password not match';
          }

          if($this->adminUserMgmtModel->findDoctorByEmail($data['email'])){
            $data['email_err']='Email is already registered';
 
          } 
          else if($this->adminUserMgmtModel->findReqDoctorByEmail($data['email'])){
            $data['email_err']='Email is already registered';
 
          }
       
   
   
          if(empty($data['first_name_err']) && empty($data['last_name_err'])&& empty($data['nic_err'])&& empty($data['contact_number_err'])&& empty($data['email_err'])&& empty($data['password_err'])&& empty($data['confirm_password_err'])&& empty($data['city_err'])&& empty($data['bank_name_err'])&& empty($data['account_holder_name_err'])&& empty($data['branch_err'])&& empty($data['account_number_err'])&& empty($data['slmc_reg_number_err'])&& empty($data['type_err'])&& empty($data['specialization_err'])&& empty($data['gender_err'])&& empty($data['qualification_file_err'])){
            $password=$data['password'];
      
            $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
             if($this->adminUserMgmtModel->addDoctor($data)){
          
                        sendMail($data['email'],$data['first_name'],'', 2, $password);
                        redirect('AdminUserMgmt/doctor'); 
               }else{
                   die('Error creating');
               }  
          
          }else{
              $this->view('Admin/AdminUserMgmt/Doctor/v_doctorAddNew',$data);
   
          }
         
              
         }else{
                 
                
    
           $data=[
    
            'first_name'=>'',
            'last_name'=>'',
            'nic'=>'',
            'contact_number'=>'',
            'email'=>'',
            'password'=>'',
            'confirm_password'=>'',
            'gender'=>'',
            'city'=>'',
            'bank_name'=>'',
            'account_holder_name'=>'',
            'branch'=>'',
            'account_number'=>'',
            'slmc_reg_number'=>'',
            'qualification_file'=>'',
            'type'=>'',
            'specialization'=>'',
    
             'first_name_err'=>'',
             'last_name_err'=>'',
             'nic_err'=>'',
             'contact_number_err'=>'',
             'email_err'=>'',
             'password_err'=>'',
             'confirm_password_err'=>'',
             'city_err'=>'',
             'bank_name_err'=>'',
             'account_holder_name_err'=>'',
             'branch_err'=>'',
             'account_number_err'=>'',
             'slmc_reg_number_err'=>'',
             'type_err'=>'',
             'specialization_err'=>'',
             'gender_err'=>'',
             'qualification_file_err'=>'',
           ];
    
           $this->view('Admin/AdminUserMgmt/Doctor/v_doctorAddNew',$data);
       
     }
     
     }else{
        redirect('Login/login');  
     }
           
       }
       

             //Add new Counsellor

             public function  addnewCounsellor()
             {
              if(isset($_SESSION['admin_id'])) {  
  
              if($_SERVER['REQUEST_METHOD']=='POST'){
                 $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
               
                 $data=[
                   'first_name'=>trim($_POST['first_name']),
                   'last_name'=>trim($_POST['last_name']),
                   'nic'=>trim($_POST['nic']),
                   'contact_number'=>trim($_POST['contact_number']),
                   'email'=>trim($_POST['email']),
                   'password'=>trim($_POST['password']),
                   'confirm_password'=>trim($_POST['confirm_password']),
                   'city'=>trim($_POST['city']),
                   'bank_name'=>trim($_POST['bank_name']),
                   'account_holder_name'=>trim($_POST['account_holder_name']),
                   'branch'=>trim($_POST['branch']),
                   'account_number'=>trim($_POST['account_number']),
                   'slmc_reg_number'=>trim($_POST['slmc']),
                   'gender'=>trim($_POST['gender']),
                   'qualification_file'=>$_FILES['qualification_file'],
                   'qualification_file_name'=>trim($_POST['first_name']).' '.trim($_POST['last_name']).'_'.$_FILES['qualification_file']['name'],
                   
               
                                       
                    'first_name_err'=>'',
                    'last_name_err'=>'',
                    'nic_err'=>'',
                    'contact_number_err'=>'',
                    'email_err'=>'',
                    'password_err'=>'',
                    'confirm_password_err'=>'',
                    'city_err'=>'',
                    'bank_name_err'=>'',
                    'account_holder_name_err'=>'',
                    'branch_err'=>'',
                    'account_number_err'=>'',
                    'slmc_reg_number_err'=>'',
                    'gender_err'=>'',
                    'qualification_file_err'=>'',
                        
            ];
                $fileExt=explode('.',$_FILES['qualification_file']['name']);
                $fileActualExt=strtolower(end($fileExt));
                $allowed=array('jpg','jpeg','png','pdf','zip','rar');
      
               
                if(!in_array($fileActualExt,$allowed)){
                  $data['qualification_file_err']='You cannot upload files of this type';
      
                }
          
      
                if($data['qualification_file']['size']>0){
                  if(uploadFile($data['qualification_file']['tmp_name'],$data['qualification_file_name'],'/upload/counsellor_qualification/')){
                             
                  }else{  
                   $data['qualification_file_err']='Unsuccessful qualification_file uploading';
                   
                  }
                }else{
                   $data[ 'qualification_file_err'] ="qualification file size is empty";
                 
                }
       
                if(empty($data['first_name'])){
                  $data['first_name_err']='first name can not be empty';
               }else if(validateFirstName($data['first_name'])!="true"){
                $data['first_name_err']=validateFirstName($data['first_name']);
               }
              
               if(empty($data['last_name'])){
                  $data['last_name_err']='last name can not be empty';
               }else if(validateLastName($data['last_name'])!="true"){
                $data['last_name_err']=validateLastName($data['last_name']);
               }
            
               if(empty($data['nic'])){
                 $data['nic_err']='nic can not be empty';
              }else if(validateNIC($data['nic'])!="true"){
                $data['nic_err']=validateNIC($data['nic']);
               }
             
              if(empty($data['contact_number'])){
                 $data['contact_number_err']='contact number can not be empty';
              }else if(validateContactNumber($data['contact_number'])!="true"){
                $data['contact_number_err']=validateContactNumber($data['contact_number']);
              }
               
               if(empty($data['email'])){
                   $data['email_err']='email can not be empty';
               }else if(validateEmail($data['email'])!="true"){
                $data['email_err']=validateEmail($data['email']);
               }
               
               if(empty($data['password'])){
                   $data['password_err']='password can not be empty';
               }else if(validatePassword($data['password'])!="true"){
                $data['password_err']=validatePassword($data['password']);
               }
             
               if(empty($data['confirm_password'])){
                 $data['confirm_password_err']='confirm password  can not be empty';
               }else if(validatePassword($data['confirm_password'])!="true"){
                $data['confirm_password_err']=validatePassword($data['confirm_password']);
               }
             
               if(empty($data['city'])){
                 $data['city_err']='city can not be empty';
               }else if(validateCity($data['city'])!="true"){
                $data['city_err']=validateCity($data['city']);
               }
     
                 if(empty($data['bank_name'])){
                   $data['bank_name_err']='bank name can not be empty';
               }else if(validateBankName($data['bank_name'])!="true"){
                $data['bank_name_err']=validateBankName($data['bank_name']);
               }
               
               if(empty($data['account_holder_name'])){
                   $data['account_holder_name_err']='account_holder name can not be empty';
               }else if(validateAccountHolderName($data['account_holder_name'])!="true"){
                $data['account_holder_name_err']=validateAccountHolderName($data['account_holder_name']);
               }
             
               if(empty($data['branch'])){
                 $data['branch_err']='branch name can not be empty';
               }else if(validateBankBranch($data['branch'])!="true"){
                $data['branch_err']=validateBankBranch($data['branch']);
               }
              
             
               if(empty($data['account_number'])){
                 $data['account_number_err']='last name can not be empty';
               }else if(validateAccountNumber($data['account_number'])!="true"){
                $data['account_number_err']=validateAccountNumber($data['account_number']);
               }
     
               if(empty($data['slmc_reg_number'])){
                 $data['slmc_reg_number_err']='slmc reg number can not be empty';
              }else if(validateSlmcRegisterNumber($data['slmc_reg_number'])!="true"){
                $data['slmc_reg_number_err']=validateSlmcRegisterNumber($data['slmc_reg_number']);
               }
              
             
               
               if(empty($data['gender'])){
                 $data['gender_err']='gender can not be empty';
               }
               
               if(empty($data['qualification_file'])){
                 $data['qualification_file_err']='qualification_file can not be empty';
               }
     
     

                if($data['password']!=$data['confirm_password']){
                 $data['passwordnotmatch_err']='password not match';
                }
      
                if($this->adminUserMgmtModel->findCounsellorByEmail($data['email'])){
                  $data['email_err']='Email is already registered';
       
                } 
                else if($this->adminUserMgmtModel->findReqCounsellorByEmail($data['email'])){
                  $data['email_err']='Email is already registered';
       
                }
             
         
         
                if(empty($data['first_name_err']) && empty($data['last_name_err'])&& empty($data['nic_err'])&& empty($data['contact_number_err'])&& empty($data['email_err'])&& empty($data['password_err'])&& empty($data['confirm_password_err'])&& empty($data['city_err'])&& empty($data['bank_name_err'])&& empty($data['account_holder_name_err'])&& empty($data['branch_err'])&& empty($data['account_number_err'])&& empty($data['slmc_reg_number_err'])&& empty($data['gender_err'])&& empty($data['qualification_file_err'])){
               
                  $password=$data['password'];
                  $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
                   if($this->adminUserMgmtModel->addCounsellor($data)){
                    sendMail($data['email'],$data['first_name'],'', 2,$password);
                    redirect('AdminUserMgmt/counsellor'); 
                     }else{
                         die('Error creating');
                     }  
                
                }else{
                    $this->view('Admin/AdminUserMgmt/Counsellor/v_counsellorAddNew',$data);
         
                }
               
                    
               }else{
                       
                      
          
                 $data=[
          
                  'first_name'=>'',
                  'last_name'=>'',
                  'nic'=>'',
                  'contact_number'=>'',
                  'email'=>'',
                  'password'=>'',
                  'confirm_password'=>'',
                  'gender'=>'',
                  'city'=>'',
                  'bank_name'=>'',
                  'account_holder_name'=>'',
                  'branch'=>'',
                  'account_number'=>'',
                  'slmc_reg_number'=>'',
                  'qualification_file'=>'',
                  
                  'first_name_err'=>'',
                  'last_name_err'=>'',
                  'nic_err'=>'',
                  'contact_number_err'=>'',
                  'email_err'=>'',
                  'password_err'=>'',
                  'confirm_password_err'=>'',
                  'city_err'=>'',
                  'bank_name_err'=>'',
                  'account_holder_name_err'=>'',
                  'branch_err'=>'',
                  'account_number_err'=>'',
                  'slmc_reg_number_err'=>'',
                  'gender_err'=>'',
                  'qualification_file_err'=>'',
                 ];
          
                 $this->view('Admin/AdminUserMgmt/Counsellor/v_counsellorAddNew',$data);
         
           }
     
  }else{
    redirect('Login/login');  
  }     
                 
             }

             
             //Add new Admin

       public function  addnewAdmin()
       {
        if(isset($_SESSION['admin_id'])) {  
  
        if($_SERVER['REQUEST_METHOD']=='POST'){
           $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
         
           $data=[
             'first_name'=>trim($_POST['first_name']),
             'last_name'=>trim($_POST['last_name']),
             'nic'=>trim($_POST['nic']),
             'contact_number'=>trim($_POST['contact_number']),
             'email'=>trim($_POST['email']),
             'password'=>trim($_POST['password']),
             'confirm_password'=>trim($_POST['confirm_password']),
             'bank_name'=>trim($_POST['bank_name']),
             'account_holder_name'=>trim($_POST['account_holder_name']),
             'branch'=>trim($_POST['branch']),
             'account_number'=>trim($_POST['account_number']),
             'gender'=>trim($_POST['gender']),
             
         
             'first_name_err'=>'',
             'last_name_err'=>'',
             'nic_err'=>'',
             'contact_number_err'=>'',
             'email_err'=>'',
             'password_err'=>'',
             'confirm_password_err'=>'',
             'bank_name_err'=>'',
             'account_holder_name_err'=>'',
             'branch_err'=>'',
             'account_number_err'=>'',
             'gender_err'=>'',
            
          ];
         
          if(empty($data['first_name'])){
            $data['first_name_err']='first name can not be empty';
         }else if(validateFirstName($data['first_name'])!="true"){
          $data['first_name_err']=validateFirstName($data['first_name']);
         }
        
         if(empty($data['last_name'])){
            $data['last_name_err']='last name can not be empty';
         }else if(validateLastName($data['last_name'])!="true"){
          $data['last_name_err']=validateLastName($data['last_name']);
         }
      
         if(empty($data['nic'])){
           $data['nic_err']='nic can not be empty';
        }else if(validateNIC($data['nic'])!="true"){
          $data['nic_err']=validateNIC($data['nic']);
         }
  
       
        if(empty($data['contact_number'])){
           $data['contact_number_err']='contact number can not be empty';
        }else if(validateContactNumber($data['contact_number'])!="true"){
          $data['contact_number_err']=validateContactNumber($data['contact_number']);
        }
         
         if(empty($data['email'])){
             $data['email_err']='email can not be empty';
         }else if(validateEmail($data['email'])!="true"){
          $data['email_err']=validateEmail($data['email']);
         }
         
         if(empty($data['password'])){
             $data['password_err']='password can not be empty';
         }else if(validatePassword($data['password'])!="true"){
          $data['password_err']=validatePassword($data['password']);
         }
       
         if(empty($data['confirm_password'])){
           $data['confirm_password_err']='confirm password  can not be empty';
         }else if(validatePassword($data['confirm_password'])!="true"){
          $data['confirm_password_err']=validatePassword($data['confirm_password']);
         }
      
       
         if(empty($data['bank_name'])){
             $data['bank_name_err']='bank name can not be empty';
         }else if(validateBankName($data['bank_name'])!="true"){
          $data['bank_name_err']=validateBankName($data['bank_name']);
         }
         
         if(empty($data['account_holder_name'])){
             $data['account_holder_name_err']='account_holder name can not be empty';
         }else if(validateAccountHolderName($data['account_holder_name'])!="true"){
          $data['account_holder_name_err']=validateAccountHolderName($data['account_holder_name']);
         }
       
         if(empty($data['branch'])){
           $data['branch_err']='branch name can not be empty';
         }else if(validateBankBranch($data['branch'])!="true"){
          $data['branch_err']=validateBankBranch($data['branch']);
         }
       
         if(empty($data['account_number'])){
           $data['account_number_err']='account_number can not be empty';
         }else if(validateAccountNumber($data['account_number'])!="true"){
          $data['account_number_err']=validateAccountNumber($data['account_number']);
         }
        

         if(empty($data['gender'])){
           $data['gender_err']='gender can not be empty';
         }
         
      
       
          if($data['password']!=$data['confirm_password']){
           $data['passwordnotmatch_err']='password not match';
          }

          if($this->adminUserMgmtModel->findAdminByEmail($data['email'])){
            $data['email_err']='Email is already registered';
 
          } 
          
       
   
          if(empty($data['first_name_err']) && empty($data['last_name_err'])&& empty($data['nic_err'])&& empty($data['contact_number_err'])&& empty($data['email_err'])&& empty($data['password_err'])&& empty($data['confirm_password_err'])&& empty($data['bank_name_err'])&& empty($data['account_holder_name_err'])&& empty($data['branch_err'])&& empty($data['account_number_err']) && empty($data['gender_err'])){
     
            $password=$data['password'];
            $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
             if($this->adminUserMgmtModel->addAdmin($data)){
                    sendMail($data['email'],$data['first_name'],'', 2,$password);
                    redirect('AdminUserMgmt/admin'); 
               }else{
                   die('Error creating');
               }  
          
          }else{
              $this->view('Admin/AdminUserMgmt/Admin/v_adminAddNew',$data);
   
          }
         
              
         }else{
                 
                
    
           $data=[
    
            'first_name'=>'',
            'last_name'=>'',
            'nic'=>'',
            'contact_number'=>'',
            'email'=>'',
            'password'=>'',
            'confirm_password'=>'',
            'gender'=>'',
            'bank_name'=>'',
            'account_holder_name'=>'',
            'branch'=>'',
            'account_number'=>'',
    
            
            'first_name_err'=>'',
            'last_name_err'=>'',
            'nic_err'=>'',
            'contact_number_err'=>'',
            'email_err'=>'',
            'password_err'=>'',
            'confirm_password_err'=>'',
            'bank_name_err'=>'',
            'account_holder_name_err'=>'',
            'branch_err'=>'',
            'account_number_err'=>'',
            'gender_err'=>'',
            ];
    
           $this->view('Admin/AdminUserMgmt/Admin/v_adminAddNew',$data);
   
     }
   
  }else{
    redirect('Login/login');  
  } 
           
       }



       //Add new Meditation Instructor

       public function  addnewMeditationInstructor()
       {
        if(isset($_SESSION['admin_id'])) {  
  
        if($_SERVER['REQUEST_METHOD']=='POST'){
           $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
         
           $data=[
             'first_name'=>trim($_POST['first_name']),
             'last_name'=>trim($_POST['last_name']),
             'nic'=>trim($_POST['nic']),
             'contact_number'=>trim($_POST['contact_number']),
             'email'=>trim($_POST['email']),
             'password'=>trim($_POST['password']),
             'confirm_password'=>trim($_POST['confirm_password']),
             'city'=>trim($_POST['city']),
             'bank_name'=>trim($_POST['bank_name']),
             'account_holder_name'=>trim($_POST['account_holder_name']),
             'branch'=>trim($_POST['branch']),
             'account_number'=>trim($_POST['account_number']),
             'address'=>trim($_POST['address']),
             'fee'=>trim($_POST['fee']),
             'gender'=>trim($_POST['gender']),
             'qualification_file'=>$_FILES['qualification_file'],
             'qualification_file_name'=>trim($_POST['first_name']).' '.trim($_POST['last_name']).'_'.$_FILES['qualification_file']['name'],
             
         
             'first_name_err'=>'',
             'last_name_err'=>'',
             'nic_err'=>'',
             'contact_number_err'=>'',
             'email_err'=>'',
             'password_err'=>'',
             'confirm_password_err'=>'',
             'city_err'=>'',
             'bank_name_err'=>'',
             'account_holder_name_err'=>'',
             'branch_err'=>'',
             'account_number_err'=>'',
             'address_err'=>'',
             'fee_err'=>'',
             'gender_err'=>'',
             'qualification_file_err'=>'',
          ];
          $fileExt=explode('.',$_FILES['qualification_file']['name']);
          $fileActualExt=strtolower(end($fileExt));
          $allowed=array('jpg','jpeg','png','pdf','zip','rar');

         
          if(!in_array($fileActualExt,$allowed)){
            $data['qualification_file_err']='You cannot upload files of this type';

          }
    

          if($data['qualification_file']['size']>0){
            if(uploadFile($data['qualification_file']['tmp_name'],$data['qualification_file_name'],'/upload/meditationInstructor_qualification/')){
                       
            }else{  
             $data['qualification_file_err']='Unsuccessful qualification_file uploading';
             
            }
          }else{
             $data[ 'qualification_file_err'] ="qualification file size is empty";
           
          }
 
          if(empty($data['first_name'])){
            $data['first_name_err']='first name can not be empty';
         }else if(validateFirstName($data['first_name'])!="true"){
          $data['first_name_err']=validateFirstName($data['first_name']);
         }
        
        
         if(empty($data['last_name'])){
            $data['last_name_err']='last name can not be empty';
         }else if(validateLastName($data['last_name'])!="true"){
          $data['last_name_err']=validateLastName($data['last_name']);
         }
      
         if(empty($data['nic'])){
           $data['nic_err']='nic can not be empty';
        }else if(validateNIC($data['nic'])!="true"){
          $data['nic_err']=validateNIC($data['nic']);
         }
       
        if(empty($data['contact_number'])){
           $data['contact_number_err']='contact number can not be empty';
        }else if(validateContactNumber($data['contact_number'])!="true"){
          $data['contact_number_err']=validateContactNumber($data['contact_number']);
        }
         
         if(empty($data['email'])){
             $data['email_err']='email can not be empty';
         }else if(validateEmail($data['email'])!="true"){
          $data['email_err']=validateEmail($data['email']);
         }
         
         if(empty($data['password'])){
             $data['password_err']='password can not be empty';
         }else if(validatePassword($data['password'])!="true"){
          $data['password_err']=validatePassword($data['password']);
         }
       
         if(empty($data['confirm_password'])){
           $data['confirm_password_err']='confirm password  can not be empty';
         }else if(validatePassword($data['confirm_password'])!="true"){
          $data['confirm_password_err']=validatePassword($data['confirm_password']);
         }
       
         if(empty($data['city'])){
           $data['city_err']='city can not be empty';
         }else if(validateCity($data['city'])!="true"){
          $data['city_err']=validateCity($data['city']);
         }

         if(empty($data['bank_name'])){
             $data['bank_name_err']='bank name can not be empty';
         }else if(validateBankName($data['bank_name'])!="true"){
          $data['bank_name_err']=validateBankName($data['bank_name']);
         }
         
         if(empty($data['account_holder_name'])){
             $data['account_holder_name_err']='account_holder name can not be empty';
         }else if(validateAccountHolderName($data['account_holder_name'])!="true"){
          $data['account_holder_name_err']=validateAccountHolderName($data['account_holder_name']);
         }
        
       
         if(empty($data['branch'])){
           $data['branch_err']='branch name can not be empty';
         }else if(validateBankBranch($data['branch'])!="true"){
          $data['branch_err']=validateBankBranch($data['branch']);
         }
       
         if(empty($data['account_number'])){
           $data['account_number_err']='account_number can not be empty';
         }else if(validateAccountNumber($data['account_number'])!="true"){
          $data['account_number_err']=validateAccountNumber($data['account_number']);
         }
        

         if(empty($data['address'])){
           $data['address_err']='address can not be empty';
        }else if(validateAddress($data['address'])!="true"){
          $data['address_err']=validateAddress($data['address']);
         }
        
       
         if(empty($data['fee'])){
             $data['fee_err']='fee can not be empty';
         }else if(validateFee($data['fee'])!="true"){
          $data['fee_err']=validateFee($data['fee']);
         }
       
        
         if(empty($data['gender'])){
           $data['gender_err']='gender can not be empty';
         }
         
         if(empty($data['qualification_file'])){
           $data['qualification_file_err']='qualification_file can not be empty';
         }




          if($data['password']!=$data['confirm_password']){
           $data['passwordnotmatch_err']='password not match';
          }

          if($this->adminUserMgmtModel->findMeditationInstructorByEmail($data['email'])){
            $data['email_err']='Email is already registered';
 
          } 
          else if($this->adminUserMgmtModel->findReqMeditationInstructorByEmail($data['email'])){
            $data['email_err']='Email is already registered';
 
          }
       
   
   
          
          if(empty($data['first_name_err']) && empty($data['last_name_err'])&& empty($data['nic_err'])&& empty($data['contact_number_err'])&& empty($data['email_err'])&& empty($data['password_err'])&& empty($data['confirm_password_err'])&& empty($data['city_err'])&& empty($data['bank_name_err'])&& empty($data['account_holder_name_err'])&& empty($data['branch_err'])&& empty($data['account_number_err'])&& empty($data['address_err'])&& empty($data['fee_err'])&& empty($data['gender_err'])&& empty($data['qualification_file_err'])){
               
            $password=$data['password'];
            $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
         
            if($this->adminUserMgmtModel->addMeditationInstructor($data)){
                  sendMail($data['email'],$data['first_name'],'', 2,$password);
                  redirect('AdminUserMgmt/meditationInstructor'); 
            }else{
                  die('Error creating');
            }  
          
          }else{
              $this->view('Admin/AdminUserMgmt/MeditationInstructor/v_medInstrAddNew',$data);
   
          }
         
              
         }else{
                 
                
    
           $data=[
    
            'first_name'=>'',
            'last_name'=>'',
            'nic'=>'',
            'contact_number'=>'',
            'email'=>'',
            'password'=>'',
            'confirm_password'=>'',
            'gender'=>'',
            'city'=>'',
            'bank_name'=>'',
            'account_holder_name'=>'',
            'branch'=>'',
            'account_number'=>'',
            'qualification_file'=>'',
            'address'=>'',
            'fee'=>'',
    
            'first_name_err'=>'',
            'last_name_err'=>'',
            'nic_err'=>'',
            'contact_number_err'=>'',
            'email_err'=>'',
            'password_err'=>'',
            'confirm_password_err'=>'',
            'city_err'=>'',
            'bank_name_err'=>'',
            'account_holder_name_err'=>'',
            'branch_err'=>'',
            'account_number_err'=>'',
            'address_err'=>'',
            'fee_err'=>'',
            'gender_err'=>'',
            'qualification_file_err'=>'',
          ];
    
           $this->view('Admin/AdminUserMgmt/MeditationInstructor/v_medInstrAddNew',$data);
   
     }
   
  }else{
    redirect('Login/login');  
  } 
           
       }

       //Add new Pharmacist

       public function  addnewPharmacist()
       {
        if(isset($_SESSION['admin_id'])) {  
  
        if($_SERVER['REQUEST_METHOD']=='POST'){
           $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
         
           $data=[
             'first_name'=>trim($_POST['first_name']),
             'last_name'=>trim($_POST['last_name']),
             'nic'=>trim($_POST['nic']),
             'contact_number'=>trim($_POST['contact_number']),
             'email'=>trim($_POST['email']),
             'password'=>trim($_POST['password']),
             'confirm_password'=>trim($_POST['confirm_password']),
             'city'=>trim($_POST['city']),
             'bank_name'=>trim($_POST['bank_name']),
             'account_holder_name'=>trim($_POST['account_holder_name']),
             'branch'=>trim($_POST['branch']),
             'account_number'=>trim($_POST['account_number']),
             'slmc_reg_number'=>trim($_POST['slmc']),
             'pharmacy_name'=>trim($_POST['pharmacy_name']),
             'address'=>trim($_POST['address']),
             'gender'=>trim($_POST['gender']),
             'qualification_file'=>$_FILES['qualification_file'],
             'qualification_file_name'=>trim($_POST['first_name']).' '.trim($_POST['last_name']).'_'.$_FILES['qualification_file']['name'],
             
         
             'first_name_err'=>'',
             'last_name_err'=>'',
             'nic_err'=>'',
             'contact_number_err'=>'',
             'email_err'=>'',
             'password_err'=>'',
             'confirm_password_err'=>'',
             'city_err'=>'',
             'bank_name_err'=>'',
             'account_holder_name_err'=>'',
             'branch_err'=>'',
             'account_number_err'=>'',
             'slmc_reg_number_err'=>'',
             'pharmacy_name_err'=>'',
             'address_err'=>'',
             'gender_err'=>'',
             'qualification_file_err'=>''
          ];
          $fileExt=explode('.',$_FILES['qualification_file']['name']);
          $fileActualExt=strtolower(end($fileExt));
          $allowed=array('jpg','jpeg','png','pdf','zip','rar');

         
          if(!in_array($fileActualExt,$allowed)){
            $data['qualification_file_err']='You cannot upload files of this type';

          }
    

          if($data['qualification_file']['size']>0){
            if(uploadFile($data['qualification_file']['tmp_name'],$data['qualification_file_name'],'/upload/pharmacist_qualification/')){
                       
            }else{  
             $data['qualification_file_err']='Unsuccessful qualification_file uploading';
             
            }
          }else{
             $data[ 'qualification_file_err'] ="qualification file size is empty";
           
          }
 
          if(empty($data['first_name'])){
            $data['first_name_err']='first name can not be empty';
         }else if(validateFirstName($data['first_name'])!="true"){
          $data['first_name_err']=validateFirstName($data['first_name']);
         }
        
         if(empty($data['last_name'])){
            $data['last_name_err']='last name can not be empty';
         }else if(validateLastName($data['last_name'])!="true"){
          $data['last_name_err']=validateLastName($data['last_name']);
         }
      
         if(empty($data['nic'])){
           $data['nic_err']='nic can not be empty';
        }else if(validateNIC($data['nic'])!="true"){
          $data['nic_err']=validateNIC($data['nic']);
         }
       
        if(empty($data['contact_number'])){
           $data['contact_number_err']='contact number can not be empty';
        }else if(validateContactNumber($data['contact_number'])!="true"){
          $data['contact_number_err']=validateContactNumber($data['contact_number']);
        }
         
           if(empty($data['email'])){
             $data['email_err']='email can not be empty';
         }else if(validateEmail($data['email'])!="true"){
          $data['email_err']=validateEmail($data['email']);
         }
         
         if(empty($data['password'])){
             $data['password_err']='password can not be empty';
         }else if(validatePassword($data['password'])!="true"){
          $data['password_err']=validatePassword($data['password']);
         }
       
         if(empty($data['confirm_password'])){
           $data['confirm_password_err']='confirm password  can not be empty';
         }else if(validatePassword($data['confirm_password'])!="true"){
          $data['confirm_password_err']=validatePassword($data['confirm_password']);
         }
       
         if(empty($data['city'])){
           $data['city_err']='city can not be empty';
         }else if(validateCity($data['city'])!="true"){
          $data['city_err']=validateCity($data['city']);
         }

           if(empty($data['bank_name'])){
             $data['bank_name_err']='bank name can not be empty';
         }else if(validateBankName($data['bank_name'])!="true"){
          $data['bank_name_err']=validateBankName($data['bank_name']);
         }
         
         if(empty($data['account_holder_name'])){
             $data['account_holder_name_err']='account_holder name can not be empty';
         }else if(validateAccountHolderName($data['account_holder_name'])!="true"){
          $data['account_holder_name_err']=validateAccountHolderName($data['account_holder_name']);
         }
       
         if(empty($data['branch'])){
           $data['branch_err']='branch name can not be empty';
         }else if(validateBankBranch($data['branch'])!="true"){
          $data['branch_err']=validateBankBranch($data['branch']);
         }
        
       
         if(empty($data['account_number'])){
           $data['account_number_err']='last name can not be empty';
         }else if(validateAccountNumber($data['account_number'])!="true"){
          $data['account_number_err']=validateAccountNumber($data['account_number']);
         }
        


         if(empty($data['slmc_reg_number'])){
           $data['slmc_reg_number_err']='slmc reg number can not be empty';
        }else if(validateSlmcRegisterNumber($data['slmc_reg_number'])!="true"){
          $data['slmc_reg_number_err']=validateSlmcRegisterNumber($data['slmc_reg_number']);
         }
        
       
         if(empty($data['pharmacy_name'])){
             $data['pharmacy_name_err']='pharmacy name can not be empty';
         }else if(validatePharmacyName($data['pharmacy_name'])!="true"){
          $data['pharmacy_name_err']=validatePharmacyName($data['pharmacy_name']);
         }
        
       
         if(empty($data['address'])){
           $data['address_err']='address can not be empty';
         }else if(validateAddress($data['address'])!="true"){
          $data['address_err']=validateAddress($data['address']);
         }
         
         if(empty($data['gender'])){
           $data['gender_err']='gender can not be empty';
         }
         
         if(empty($data['qualification_file'])){
           $data['qualification_file_err']='qualification_file can not be empty';
         }

       
          if($data['password']!=$data['confirm_password']){
           $data['passwordnotmatch_err']='password not match';
          }

          if($this->adminUserMgmtModel->findPharmacistByEmail($data['email'])){
            $data['email_err']='Email is already registered';
 
          } 
          else if($this->adminUserMgmtModel->findReqPharmacistByEmail($data['email'])){
            $data['email_err']='Email is already registered';
 
          }
       
             
          if(empty($data['first_name_err']) && empty($data['last_name_err'])&& empty($data['nic_err'])&& empty($data['contact_number_err'])&& empty($data['email_err'])&& empty($data['password_err'])&& empty($data['confirm_password_err'])&& empty($data['city_err'])&& empty($data['bank_name_err'])&& empty($data['account_holder_name_err'])&& empty($data['branch_err'])&& empty($data['account_number_err'])&& empty($data['slmc_reg_number_err'])&& empty($data['pharmacy_name_err'])&& empty($data['address_err'])&& empty($data['gender_err'])&& empty($data['qualification_file_err'])){
               
            $password=$data['password'];
            $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
             if($this->adminUserMgmtModel->addPharmacist($data)){
                  sendMail($data['email'],$data['first_name'],'', 2,$password);
                  redirect('AdminUserMgmt/pharmacist'); 
               }else{
                   die('Error creating');
               }  
          
          }else{
              $this->view('Admin/AdminUserMgmt/Pharmacist/v_pharmacistAddNew',$data);
   
          }
         
              
         }else{
                 
                
    
           $data=[
    
            'first_name'=>'',
            'last_name'=>'',
            'nic'=>'',
            'contact_number'=>'',
            'email'=>'',
            'password'=>'',
            'confirm_password'=>'',
            'gender'=>'',
            'city'=>'',
            'bank_name'=>'',
            'account_holder_name'=>'',
            'branch'=>'',
            'account_number'=>'',
            'slmc_reg_number'=>'',
            'qualification_file'=>'',
            'pharmacy_name'=>'',
            'address'=>'',

            'first_name_err'=>'',
            'last_name_err'=>'',
            'nic_err'=>'',
            'contact_number_err'=>'',
            'email_err'=>'',
            'password_err'=>'',
            'confirm_password_err'=>'',
            'city_err'=>'',
            'bank_name_err'=>'',
            'account_holder_name_err'=>'',
            'branch_err'=>'',
            'account_number_err'=>'',
            'slmc_reg_number_err'=>'',
            'pharmacy_name_err'=>'',
            'address_err'=>'',
            'gender_err'=>'',
            'qualification_file_err'=>''
           ];
    
           $this->view('Admin/AdminUserMgmt/Pharmacist/v_pharmacistAddNew',$data);
   
     }
    
   
  }else{
    redirect('Login/login');  
  }        
       }


       //Add new Nutritionist

       public function  addnewNutritionist()
       {
        if(isset($_SESSION['admin_id'])) {  
  
        if($_SERVER['REQUEST_METHOD']=='POST'){
           $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
         
           $data=[
             'first_name'=>trim($_POST['first_name']),
             'last_name'=>trim($_POST['last_name']),
             'nic'=>trim($_POST['nic']),
             'contact_number'=>trim($_POST['contact_number']),
             'email'=>trim($_POST['email']),
             'password'=>trim($_POST['password']),
             'confirm_password'=>trim($_POST['confirm_password']),
             'bank_name'=>trim($_POST['bank_name']),
             'account_holder_name'=>trim($_POST['account_holder_name']),
             'branch'=>trim($_POST['branch']),
             'account_number'=>trim($_POST['account_number']),
             'slmc_reg_number'=>trim($_POST['slmc']),
             'fee'=>trim($_POST['fee']),
             'gender'=>trim($_POST['gender']),
             'qualification_file'=>$_FILES['qualification_file'],
             'qualification_file_name'=>trim($_POST['first_name']).' '.trim($_POST['last_name']).'_'.$_FILES['qualification_file']['name'],
             
         
            
             'first_name_err'=>'',
             'last_name_err'=>'',
             'nic_err'=>'',
             'contact_number_err'=>'',
             'email_err'=>'',
             'password_err'=>'',
             'confirm_password_err'=>'',
             'bank_name_err'=>'',
             'account_holder_name_err'=>'',
             'branch_err'=>'',
             'account_number_err'=>'',
             'slmc_reg_number_err'=>'',
             'fee_err'=>'',
             'gender_err'=>'',
             'qualification_file_err'=>''
          ];
          $fileExt=explode('.',$_FILES['qualification_file']['name']);
          $fileActualExt=strtolower(end($fileExt));
          $allowed=array('jpg','jpeg','png','pdf','zip','rar');

         
          if(!in_array($fileActualExt,$allowed)){
            $data['qualification_file_err']='You cannot upload files of this type';

          }
    

          if($data['qualification_file']['size']>0){
            if(uploadFile($data['qualification_file']['tmp_name'],$data['qualification_file_name'],'/upload/nutritionist_qualification/')){
                       
            }else{  
             $data['qualification_file_err']='Unsuccessful qualification_file uploading';
             
            }
          }else{
             $data[ 'qualification_file_err'] ="qualification file size is empty";
           
          }
 
          if(empty($data['first_name'])){
            $data['first_name_err']='first name can not be empty';
         }else if(validateFirstName($data['first_name'])!="true"){
          $data['first_name_err']=validateFirstName($data['first_name']);
         }
        
         if(empty($data['last_name'])){
            $data['last_name_err']='last name can not be empty';
         }else if(validateLastName($data['last_name'])!="true"){
          $data['last_name_err']=validateLastName($data['last_name']);
         }
      
  
      
         if(empty($data['nic'])){
           $data['nic_err']='nic can not be empty';
        }else if(validateNIC($data['nic'])!="true"){
          $data['nic_err']=validateNIC($data['nic']);
         }
       
        if(empty($data['contact_number'])){
           $data['contact_number_err']='contact number can not be empty';
        }else if(validateContactNumber($data['contact_number'])!="true"){
          $data['contact_number_err']=validateContactNumber($data['contact_number']);
        }
         
           if(empty($data['email'])){
             $data['email_err']='email can not be empty';
         }else if(validateEmail($data['email'])!="true"){
          $data['email_err']=validateEmail($data['email']);
         }
         
         if(empty($data['password'])){
             $data['password_err']='password can not be empty';
         }else if(validatePassword($data['password'])!="true"){
          $data['password_err']=validatePassword($data['password']);
         }
      
       
         if(empty($data['confirm_password'])){
           $data['confirm_password_err']='confirm password  can not be empty';
         }else if(validatePassword($data['confirm_password'])!="true"){
          $data['confirm_password_err']=validatePassword($data['confirm_password']);
         }
       
         if(empty($data['bank_name'])){
             $data['bank_name_err']='bank name can not be empty';
         }else if(validateBankName($data['bank_name'])!="true"){
          $data['bank_name_err']=validateBankName($data['bank_name']);
         }
         
         if(empty($data['account_holder_name'])){
             $data['account_holder_name_err']='account holder name can not be empty';
         }else if(validateAccountHolderName($data['account_holder_name'])!="true"){
          $data['account_holder_name_err']=validateAccountHolderName($data['account_holder_name']);
         }
       
         if(empty($data['branch'])){
           $data['branch_err']='branch name can not be empty';
         }else if(validateBankBranch($data['branch'])!="true"){
          $data['branch_err']=validateBankBranch($data['branch']);
         }
       
         if(empty($data['account_number'])){
           $data['account_number_err']='account number can not be empty';
         }else if(validateAccountNumber($data['account_number'])!="true"){
          $data['account_number_err']=validateAccountNumber($data['account_number']);
         }

         if(empty($data['slmc_reg_number'])){
           $data['slmc_reg_number_err']='slmc reg number can not be empty';
        }else if(validateSlmcRegisterNumber($data['slmc_reg_number'])!="true"){
          $data['slmc_reg_number_err']=validateSlmcRegisterNumber($data['slmc_reg_number']);
         }
       
         if(empty($data['fee'])){
             $data['fee_err']='fee can not be empty';
         }else if(validateFee($data['fee'])!="true"){
          $data['fee_err']=validateFee($data['fee']);
         }
       
         
         if(empty($data['gender'])){
           $data['gender_err']='gender can not be empty';
         }
         
         if(empty($data['qualification_file'])){
           $data['qualification_file_err']='qualification_file can not be empty';
         }

       
          if($data['password']!=$data['confirm_password']){
           $data['passwordnotmatch_err']='password not match';
          }

          if($this->adminUserMgmtModel->findNutritionistByEmail($data['email'])){
            $data['email_err']='Email is already registered';
 
          } 
          else if($this->adminUserMgmtModel->findReqNutritionistByEmail($data['email'])){
            $data['email_err']='Email is already registered';
 
          }
       
   
   
        
          if(empty($data['first_name_err']) && empty($data['last_name_err'])&& empty($data['nic_err'])&& empty($data['contact_number_err'])&& empty($data['email_err'])&& empty($data['password_err'])&& empty($data['confirm_password_err'])&& empty($data['bank_name_err'])&& empty($data['account_holder_name_err'])&& empty($data['branch_err'])&& empty($data['account_number_err'])&& empty($data['slmc_reg_number_err'])&& empty($data['fee_err'])&& empty($data['gender_err'])&& empty($data['qualification_file_err'])){
           
            $password=$data['password'];
            $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
             if($this->adminUserMgmtModel->addNutritionist($data)){
                    sendMail($data['email'],$data['first_name'],'', 2,$password);
                    redirect('AdminUserMgmt/nutritionist'); 
               }else{
                   die('Error creating');
               }  
          
          }else{
              $this->view('Admin/AdminUserMgmt/Nutritionist/v_nutritionistAddNew',$data);
   
          }
         
              
         }else{
                 
                
    
           $data=[
    
            'first_name'=>'',
            'last_name'=>'',
            'nic'=>'',
            'contact_number'=>'',
            'email'=>'',
            'password'=>'',
            'confirm_password'=>'',
            'gender'=>'',
            'bank_name'=>'',
            'account_holder_name'=>'',
            'branch'=>'',
            'account_number'=>'',
            'slmc_reg_number'=>'',
            'qualification_file'=>'',
            'fee'=>'',
            

            'first_name_err'=>'',
            'last_name_err'=>'',
            'nic_err'=>'',
            'contact_number_err'=>'',
            'email_err'=>'',
            'password_err'=>'',
            'confirm_password_err'=>'',
            'bank_name_err'=>'',
            'account_holder_name_err'=>'',
            'branch_err'=>'',
            'account_number_err'=>'',
            'slmc_reg_number_err'=>'',
            'fee_err'=>'',
            'gender_err'=>'',
            'qualification_file_err'=>''
          ];
    
           $this->view('Admin/AdminUserMgmt/Nutritionist/v_nutritionistAddNew',$data);
             
     }
    
  }else{
    redirect('Login/login');  
  }
           
       }


       //admin Deactivated Patient

       public function adminDeactivatedPatient($id)
        {
           if(isset($_SESSION['admin_id'])) {  
  
                if($_SERVER['REQUEST_METHOD']=='GET'){
                  $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
            
                      $patientDetails=$this->adminUserMgmtModel->getPatientDetails($id);
                      $patient= $this->adminUserMgmtModel->deactivatedPatient($id);
                      sendMail($patientDetails->email,$patientDetails->first_name,'', 6,'');
      
                      $data=[                      
                        
                      ];
                     
                      if($patient==true){
                           redirect('AdminUserMgmt/Patient');
                      }
                } 
            
                }else{
                  redirect('Login/login');  
                }
        }

  
     //admin Activated Patient
     

       public function adminActivatedPatient($id)
       {

        if(isset($_SESSION['admin_id'])) {  
  
              if($_SERVER['REQUEST_METHOD']=='GET'){
                $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
          
                $patientDetails=$this->adminUserMgmtModel->getPatientDetails($id);
                $patient= $this->adminUserMgmtModel->activatedPatient($id);
                sendMail($patientDetails->email,$patientDetails->first_name,'', 5,'');

                    $data=[                      
                      
                    ];
                   
                    if($patient==true){
                         redirect('AdminUserMgmt/Patient');
                    }
              } 
          
        }else{
             redirect('Login/login');  
        }



       }



        //admin Deactivated Admin

        public function adminDeactivatedAdmin($id)
        {
           if(isset($_SESSION['admin_id'])) {  
  
                if($_SERVER['REQUEST_METHOD']=='GET'){
                  $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
            
          
                      $adminDetails=$this->adminUserMgmtModel->getAdminDetails($id);
                      $admin= $this->adminUserMgmtModel->deactivatedAdmin($id);
                      sendMail($adminDetails->email,$adminDetails->first_name,'', 6,'');
      
                      $data=[                      
                        
                      ];
                     
                      if($admin==true){
                           redirect('AdminUserMgmt/admin');
                      }
                } 
            
                }else{
                  redirect('Login/login');  
                }
        }

  
     //admin Activated Admin
     

       public function adminActivatedAdmin($id)
       {

        if(isset($_SESSION['admin_id'])) {  
  
              if($_SERVER['REQUEST_METHOD']=='GET'){
                $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
          
                   
                $adminDetails=$this->adminUserMgmtModel->getAdminDetails($id);
                $admin= $this->adminUserMgmtModel->activatedAdmin($id);
                sendMail($adminDetails->email,$adminDetails->first_name,'', 5,'');

            
                    $data=[                      
                      
                    ];
                   
                    if($admin==true){
                         redirect('AdminUserMgmt/admin');
                    }
              } 
          
        }else{
             redirect('Login/login');  
        }



       }





       //admin Deactivated Doctor

       public function adminDeactivatedDoctor($id)
        {
           if(isset($_SESSION['admin_id'])) {  
  
                if($_SERVER['REQUEST_METHOD']=='GET'){
                  $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
            
                     
                      $doctorDetails=$this->adminUserMgmtModel->getDoctorDetails($id);
                      $doctor= $this->adminUserMgmtModel->deactivatedDoctor($id);
                      sendMail($doctorDetails->email,$doctorDetails->first_name,'', 6,'');
      

                      $data=[                      
                        
                      ];
                     
                      if($doctor==true){
                           redirect('AdminUserMgmt/doctor');
                      }
                } 
            
                }else{
                  redirect('Login/login');  
                }
        }

  
     //admin Activated Doctor
     

       public function adminActivatedDoctor($id)
       {

        if(isset($_SESSION['admin_id'])) {  
  
              if($_SERVER['REQUEST_METHOD']=='GET'){
                $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
          
                 
                $doctorDetails=$this->adminUserMgmtModel->getDoctorDetails($id);
                $doctor= $this->adminUserMgmtModel->activatedDoctor($id);
                sendMail($doctorDetails->email,$doctorDetails->first_name,'', 5,'');
  
               
                    $data=[                      
                      
                    ];
                   
                    if($doctor==true){
                         redirect('AdminUserMgmt/doctor');
                    }
              } 
          
        }else{
             redirect('Login/login');  
        }



       }


       //admin Deactivated Counsellor

       public function adminDeactivatedCounsellor($id)
        {
           if(isset($_SESSION['admin_id'])) {  
  
                if($_SERVER['REQUEST_METHOD']=='GET'){
                  $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
            
                      $counsellorDetails=$this->adminUserMgmtModel->getCounsellorDetails($id);
                      $counsellor= $this->adminUserMgmtModel->deactivatedCounsellor($id);
                      sendMail($counsellorDetails->email,$counsellorDetails->first_name,'', 6,'');
      
                      $data=[                      
                        
                      ];
                     
                      if($counsellor==true){
                           redirect('AdminUserMgmt/counsellor');
                      }
                } 
            
                }else{
                  redirect('Login/login');  
                }
        }

  
     //admin Activated Counsellor
     

       public function adminActivatedCounsellor($id)
       {

        if(isset($_SESSION['admin_id'])) {  
  
              if($_SERVER['REQUEST_METHOD']=='GET'){
                $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
          
               
                $counsellorDetails=$this->adminUserMgmtModel->getCounsellorDetails($id);
                $counsellor= $this->adminUserMgmtModel->activatedCounsellor($id);
                sendMail($counsellorDetails->email,$counsellorDetails->first_name,'', 5,'');

                    $data=[                      
                      
                    ];
                   
                    if($counsellor==true){
                         redirect('AdminUserMgmt/counsellor');
                    }
              } 
          
        }else{
             redirect('Login/login');  
        }



       }


         //admin Deactivated Nutritionist

       public function adminDeactivatedNutritionist($id)
       {
          if(isset($_SESSION['admin_id'])) {  
 
               if($_SERVER['REQUEST_METHOD']=='GET'){
                 $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
           
           
                     $nutritionistDetails=$this->adminUserMgmtModel->getNutritionistDetails($id);
                     $nutritionist= $this->adminUserMgmtModel->deactivatedNutritionist($id);
                     sendMail($nutritionistDetails->email,$nutritionistDetails->first_name,'', 6,'');
     
                     $data=[                      
                       
                     ];
                    
                     if($nutritionist==true){
                          redirect('AdminUserMgmt/nutritionist');
                     }
               } 
           
               }else{
                 redirect('Login/login');  
               }
       }

 
    //admin Activated Nutritionist
    

      public function adminActivatedNutritionist($id)
      {

       if(isset($_SESSION['admin_id'])) {  
 
             if($_SERVER['REQUEST_METHOD']=='GET'){
               $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
         
                  
                $nutritionistDetails=$this->adminUserMgmtModel->getNutritionistDetails($id);
                $nutritionist= $this->adminUserMgmtModel->activatedNutritionist($id);
                sendMail($nutritionistDetails->email,$nutritionistDetails->first_name,'', 5,'');

             
                   $data=[                      
                     
                   ];
                  
                   if($nutritionist==true){
                        redirect('AdminUserMgmt/nutritionist');
                   }
             } 
         
       }else{
            redirect('Login/login');  
       }



      }


       //admin Deactivated Pharmacist

       public function adminDeactivatedPharmacist($id)
        {
           if(isset($_SESSION['admin_id'])) {  
  
                if($_SERVER['REQUEST_METHOD']=='GET'){
                  $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
            
                      $pharmacistDetails=$this->adminUserMgmtModel->getPharmacistDetails($id);
                      $pharmacist= $this->adminUserMgmtModel->deactivatedPharmacist($id);
                      sendMail($pharmacistDetails->email,$pharmacistDetails->first_name,'', 6,'');
      
                      $data=[                      
                        
                      ];
                     
                      if($pharmacist==true){
                           redirect('AdminUserMgmt/pharmacist');
                      }
                } 
            
                }else{
                  redirect('Login/login');  
                }
        }

  
     //admin Activated Pharmacist
     

       public function adminActivatedPharmacist($id)
       {

        if(isset($_SESSION['admin_id'])) {  
  
              if($_SERVER['REQUEST_METHOD']=='GET'){
                $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
          
                   
                $pharmacistDetails=$this->adminUserMgmtModel->getPharmacistDetails($id);
                $pharmacist= $this->adminUserMgmtModel->activatedPharmacist($id);
                sendMail($pharmacistDetails->email,$pharmacistDetails->first_name,'', 5,'');

                    $data=[                      
                      
                    ];
                   
                    if($pharmacist==true){
                         redirect('AdminUserMgmt/pharmacist');
                    }
              } 
          
        }else{
             redirect('Login/login');  
        }



       }


        //admin Deactivated MeditationInstructor

        public function adminDeactivatedMeditationInstructor($id)
        {
           if(isset($_SESSION['admin_id'])) {  
  
                if($_SERVER['REQUEST_METHOD']=='GET'){
                  $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
            
                     
                      $meditationInstructorDetails=$this->adminUserMgmtModel-> getMeditationInstructorDetails($id);
                      $meditationInstructor= $this->adminUserMgmtModel->deactivatedMeditationInstructor($id);
                      sendMail($meditationInstructorDetails->email,$meditationInstructorDetails->first_name,'', 6,'');
     

                      $data=[                      
                        
                      ];
                     
                      if($meditationInstructor==true){
                           redirect('AdminUserMgmt/meditationInstructor');
                      }
                } 
            
                }else{
                  redirect('Login/login');  
                }
        }

  
     //admin Activated MeditationInstructor
     

       public function adminActivatedMeditationInstructor($id)
       {

        if(isset($_SESSION['admin_id'])) {  
  
              if($_SERVER['REQUEST_METHOD']=='GET'){
                $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
          
                
                $meditationInstructorDetails=$this->adminUserMgmtModel->getMeditationInstructorDetails($id);
                $meditationInstructor= $this->adminUserMgmtModel->activatedMeditationInstructor($id);
                sendMail($meditationInstructorDetails->email,$meditationInstructorDetails->first_name,'', 5,'');
   
     
                    $data=[                      
                      
                    ];
                   
                    if($meditationInstructor==true){
                         redirect('AdminUserMgmt/meditationInstructor');
                    }
              } 
          
        }else{
             redirect('Login/login');  
        }



       }

}



 ?>
