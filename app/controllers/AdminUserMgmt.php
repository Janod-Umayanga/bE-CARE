
<?php

class AdminUserMgmt extends Controller{
  public function __construct(){
    $this->adminUserMgmtModel = $this->model('M_AdminUserMgmt');
  }

  public function adminUserMgmt()
  {
   if(isset($_SESSION['admin_id'])) {  
   
   $doctor= $this->adminUserMgmtModel->getNoOfDoctors();
   $counsellor= $this->adminUserMgmtModel->getNoOfCounsellors();
   $nutritionist= $this->adminUserMgmtModel->getNoOfNutritionist();
   $meditationInstr= $this->adminUserMgmtModel->getNoOfMeditationInstr();
   $pharmacist= $this->adminUserMgmtModel->getNoOfPharmacist();
   $patient= $this->adminUserMgmtModel->getNoOfPatient();
   $admin= $this->adminUserMgmtModel->getNoOfAdmin();

   $data=[                      
     'doctor'=>$doctor,
     'counsellor'=>$counsellor,
     'nutritionist'=>$nutritionist,
     'meditationInstr'=>$meditationInstr,
     'pharmacist'=>$pharmacist,
     'patient'=>$patient,
     'admin'=>$admin,
   
   ];
   $this->view('AdminUserMgmt/v_userMgmt',$data);

   
  }else{
    redirect('Admin/login');  
  }

  }

  public function Patient()
  {
    if(isset($_SESSION['admin_id'])) {  
  
    $patient= $this->adminUserMgmtModel->getPatients();
   
   $data=[                      
     'patient'=>$patient,
     'search'=>''
   ];
   $this->view('AdminUserMgmt/Patient/v_patientUserMgmt',$data);


  }else{
    redirect('Admin/login');  
  }
  }


  public function Doctor()
  {
    if(isset($_SESSION['admin_id'])) {  
  
    $doctor= $this->adminUserMgmtModel->getDoctors();
   
   $data=[                      
     'doctor'=>$doctor,
     'search'=>''
   ];
   $this->view('AdminUserMgmt/Doctor/v_doctorUserMgmt',$data);

  }else{
    redirect('Admin/login');  
  }

  }

  public function Counsellor()
  {
    if(isset($_SESSION['admin_id'])) {  
  
    $counsellor= $this->adminUserMgmtModel->getCounsellors();
   
   $data=[                      
     'counsellor'=>$counsellor,
     'search'=>''
   ];
   $this->view('AdminUserMgmt/Counsellor/v_counsellorUserMgmt',$data);


  }else{
    redirect('Admin/login');  
  }
  }

  
  public function Nutritionist()
  {
    if(isset($_SESSION['admin_id'])) {  
  
    $nutritionist= $this->adminUserMgmtModel->getNutritionists();
   
   $data=[                      
     'nutritionist'=>$nutritionist,
     'search'=>''
   ];
   $this->view('AdminUserMgmt/Nutritionist/v_nutritionistUserMgmt',$data);


  }else{
    redirect('Admin/login');  
  }
  }
  
  public function MeditationInstructor()
  {
    if(isset($_SESSION['admin_id'])) {  
  
    $meditationInstructor= $this->adminUserMgmtModel->getMeditationInstructors();
                                                            
   $data=[                      
     'meditationInstructor'=>$meditationInstructor,
     'search'=>''
   ];
   $this->view('AdminUserMgmt/MeditationInstructor/v_medInstrUserMgmt',$data);


  }else{
    redirect('Admin/login');  
  }
  }
  

  public function Pharmacist()
  {
    if(isset($_SESSION['admin_id'])) {  
  
    $pharmacist= $this->adminUserMgmtModel->getPharmacists();
   
   $data=[                      
     'pharmacist'=>$pharmacist,
     'search'=>''
   ];
   $this->view('adminUserMgmt/Pharmacist/v_pharmacistUserMgmt',$data);

  }else{
    redirect('Admin/login');  
  }

  }

  public function Admin()
  {
    if(isset($_SESSION['admin_id'])) {  
  
    $admin= $this->adminUserMgmtModel->getAdmins();
   
   $data=[                      
     'admin'=>$admin,
     'search'=>''
   ];
   $this->view('adminUserMgmt/Admin/v_adminUserMgmt',$data);


  }else{
    redirect('Admin/login');  
  }
  }


  // Doctor


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
          $this->view('AdminUserMgmt/Doctor/v_doctorUserMgmt',$data);
     }else{
          $data=[                      
            'doctor'=>'',
            'search'=>''
          ];
          $this->view('AdminUserMgmt/Doctor/v_doctorUserMgmt',$data);
     }

    }else{
      redirect('Admin/login');  
    }
  }


  public function  adminViewMoreDoctor($doctor_id)
  {
    if(isset($_SESSION['admin_id'])) {  
  
    $doctor= $this->adminUserMgmtModel->getDoctorDetails($doctor_id);
   
   $data=[                      
     'doctor'=>$doctor
     
   ];
   $this->view('AdminUserMgmt/Doctor/v_doctorViewMore',$data);

  }else{
    redirect('Admin/login');  
  }
  }

  

//Pharmacist
  
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
        $this->view('AdminUserMgmt/Pharmacist/v_pharmacistUserMgmt',$data);
   }else{
        $data=[                      
          'pharmacist'=>'',
          'search'=>''
        ];
        $this->view('AdminUserMgmt/Pharmacist/v_pharmacistUserMgmt',$data);
   }

  }else{
    redirect('Admin/login');  
  }
}


public function  adminViewMorePharmacist($pharmacist_id)
{
  if(isset($_SESSION['admin_id'])) {  
  
  $pharmacist= $this->adminUserMgmtModel->getPharmacistDetails($pharmacist_id);
 
 $data=[                      
   'pharmacist'=>$pharmacist
   
 ];
 $this->view('AdminUserMgmt/Pharmacist/v_pharmacistViewMore',$data);

}else{
  redirect('Admin/login');  
}
}

  

//Counsellor

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
        $this->view('AdminUserMgmt/Counsellor/v_counsellorUserMgmt',$data);
   }else{
        $data=[                      
          'counsellor'=>'',
          'search'=>''
        ];
        $this->view('AdminUserMgmt/Counsellor/v_counsellorUserMgmt',$data);
   }

  }else{
    redirect('Admin/login');  
  }
}


public function  adminViewMoreCounsellor($counsellor_id)
{
  if(isset($_SESSION['admin_id'])) {  
  
  $counsellor= $this->adminUserMgmtModel->getCounsellorDetails($counsellor_id);
   
 $data=[                      
   'counsellor'=>$counsellor
   
 ];
 $this->view('AdminUserMgmt/Counsellor/v_counsellorViewMore',$data);

}else{
  redirect('Admin/login');  
}
}



//Nutritionist

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
        $this->view('AdminUserMgmt/Nutritionist/v_nutritionistUserMgmt',$data);
   }else{
        $data=[                      
          'nutritionist'=>'',
          'search'=>''
        ];
        $this->view('AdminUserMgmt/Nutritionist/v_nutritionistUserMgmt',$data);
   }

  }else{
    redirect('Admin/login');  
  }
}


public function  adminViewMoreNutritionist($nutritionist_id)
{
  if(isset($_SESSION['admin_id'])) {  
  
  $nutritionist= $this->adminUserMgmtModel->getNutritionistDetails($nutritionist_id);
 
 $data=[                      
   'nutritionist'=>$nutritionist
   
 ];
 $this->view('AdminUserMgmt/Nutritionist/v_nutritionistViewMore',$data);

}else{
  redirect('Admin/login');  
}
}





//Meditation Instructor

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
        $this->view('AdminUserMgmt/MeditationInstructor/v_medInstrUserMgmt',$data);
   }else{
        $data=[                      
          'meditationInstructor'=>'',
          'search'=>''
        ];
        $this->view('AdminUserMgmt/MeditationInstructor/v_medInstrUserMgmt',$data);
   }

  }else{
    redirect('Admin/login');  
  }
}

                
public function  adminViewMoreMeditationInstructor($meditationInstructor_id)
{
  if(isset($_SESSION['admin_id'])) {  
  
  $meditationInstructor= $this->adminUserMgmtModel->getMeditationInstructorDetails($meditationInstructor_id);
 
 $data=[                      
   'meditationInstructor'=>$meditationInstructor
   
 ];
 $this->view('AdminUserMgmt/MeditationInstructor/v_medInstrViewMore',$data);

}else{
  redirect('Admin/login');  
}
}

  



  // Patient


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
          $this->view('AdminUserMgmt/Patient/v_patientUserMgmt',$data);
     }else{
          $data=[                      
            'patient'=>'',
            'search'=>''
          ];
          $this->view('AdminUserMgmt/patient/v_patientUserMgmt',$data);
     }

    }else{
      redirect('Admin/login');  
    }
  }


  public function  adminViewMorePatient($patient_id)
  {
    if(isset($_SESSION['admin_id'])) {  
  
    $patient= $this->adminUserMgmtModel->getpatientDetails($patient_id);
   
   $data=[                      
     'patient'=>$patient
     
   ];
   $this->view('AdminUserMgmt/Patient/v_patientViewMore',$data);

  }else{
    redirect('Admin/login');  
  }
  }




  // Admin


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
          $this->view('AdminUserMgmt/Admin/v_adminUserMgmt',$data);
     }else{
          $data=[                      
            'admin'=>'',
            'search'=>''
          ];
          $this->view('AdminUserMgmt/Admin/v_adminUserMgmt',$data);
     }

    }else{
      redirect('Admin/login');  
    }
  }


  public function  adminViewMoreAdmin($admin_id)
  {
    if(isset($_SESSION['admin_id'])) {  
  
    $admin= $this->adminUserMgmtModel->getadminDetails($admin_id);
   
   $data=[                      
     'admin'=>$admin
     
   ];
   $this->view('AdminUserMgmt/Admin/v_adminViewMore',$data);

  }else{
    redirect('Admin/login');  
  }
  }


  // Delete Patient

  public function  adminDeletePatient($patient_id)
  {
    if(isset($_SESSION['admin_id'])) {  
  
    $deleteStatus= $this->adminUserMgmtModel->deletePatient($patient_id);
    $patient= $this->adminUserMgmtModel->getPatients();
   
   $data=[                      
     'patient'=>$patient,
     'deleteStatus'=>$deleteStatus,
     'search'=>''
  
    ];
   $this->view('AdminUserMgmt/Patient/v_patientUserMgmt',$data);

  }else{
    redirect('Admin/login');  
  }
  }

  
  // Delete Doctor

  public function  adminDeleteDoctor($doctor_id)
  {
    if(isset($_SESSION['admin_id'])) {  
  
    $deleteStatus= $this->adminUserMgmtModel->deleteDoctor($doctor_id);
    $doctor= $this->adminUserMgmtModel->getDoctors();
   
   $data=[                      
     'doctor'=>$doctor,
     'deleteStatus'=>$deleteStatus,
     'search'=>''
  
    ];
   $this->view('AdminUserMgmt/Doctor/v_DoctorUserMgmt',$data);

  }else{
    redirect('Admin/login');  
  }
  }


  // Delete Counsellor

  public function  adminDeleteCounsellor($counsellor_id)
  {
    if(isset($_SESSION['admin_id'])) {  
  
    $deleteStatus= $this->adminUserMgmtModel->deleteCounsellor($counsellor_id);
    $counsellor= $this->adminUserMgmtModel->getCounsellors();
   
   $data=[                      
     'counsellor'=>$counsellor,
     'deleteStatus'=>$deleteStatus,
     'search'=>''
  
    ];
   $this->view('AdminUserMgmt/Counsellor/v_CounsellorUserMgmt',$data);

  }else{
    redirect('Admin/login');  
  }
  }


    // Delete Admin

    public function  adminDeleteAdmin($admin_id)
    {
      if(isset($_SESSION['admin_id'])) {  
  
      $deleteStatus= $this->adminUserMgmtModel->deleteAdmin($admin_id);
      $admin= $this->adminUserMgmtModel->getAdmins();
     
     $data=[                      
       'admin'=>$admin,
       'deleteStatus'=>$deleteStatus,
       'search'=>''
    
      ];
     $this->view('AdminUserMgmt/Admin/v_AdminUserMgmt',$data);
  
    }else{
      redirect('Admin/login');  
    }
    }
  

  // Delete Meditation instructor

  public function  adminDeleteMeditationInstructor($meditationInstructor_id)
  {
    if(isset($_SESSION['admin_id'])) {  
  
    $deleteStatus= $this->adminUserMgmtModel->deleteMeditationInstructor($meditationInstructor_id);
    $meditationInstructor= $this->adminUserMgmtModel->getMeditationInstructors();
   
   $data=[                      
     'meditationInstructor'=>$meditationInstructor,
     'deleteStatus'=>$deleteStatus,
     'search'=>''
  
    ];
   $this->view('AdminUserMgmt/MeditationInstructor/v_MedInstrUserMgmt',$data);

  }else{
    redirect('Admin/login');  
  }
  }


    // Delete Pharmacist

    public function  adminDeletePharmacist($pharmacist_id)
    {
      if(isset($_SESSION['admin_id'])) {  
  
      $deleteStatus= $this->adminUserMgmtModel->deletePharmacist($pharmacist_id);
      $pharmacist= $this->adminUserMgmtModel->getPharmacists();
     
     $data=[                      
       'pharmacist'=>$pharmacist,
       'deleteStatus'=>$deleteStatus,
       'search'=>''
    
      ];
     $this->view('AdminUserMgmt/Pharmacist/v_PharmacistUserMgmt',$data);
  
    }else{
      redirect('Admin/login');  
    }
    }

    
      // Delete Nutritionist

  public function  adminDeleteNutritionist($nutritionist_id)
  {
    if(isset($_SESSION['admin_id'])) {  
  
    $deleteStatus= $this->adminUserMgmtModel->deleteNutritionist($nutritionist_id);
    $nutritionist= $this->adminUserMgmtModel->getNutritionists();
   
   $data=[                      
     'nutritionist'=>$nutritionist,
     'deleteStatus'=>$deleteStatus,
     'search'=>''
  
    ];
   $this->view('AdminUserMgmt/Nutritionist/v_NutritionistUserMgmt',$data);

  }else{
    redirect('Admin/login');  
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
       }
      
       if(empty($data['last_name'])){
          $data['last_name_err']='last name can not be empty';
       }
    
       if(empty($data['nic'])){
        $data['nic_err']='nic can not be empty';
       }
    
        if(empty($data['contact_number'])){
          $data['contact_number_err']='contact number can not be empty';
        }
    
        if(empty($data['email'])){
          $data['email_err']='email can not be empty';
      }
      
      if(empty($data['password'])){
          $data['password_err']='password can not be empty';
      }
    
      if(empty($data['confirm_password'])){
        $data['confirm_password_err']='confirm password can not be empty';
      }
    
      if(empty($data['gender'])){
        $data['gender_err']='gender can not be empty';
      }


       if(empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['nic_err'])&& empty($data['contact_number_err'])&& empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])&& empty($data['gender_err'])){
            if($this->adminUserMgmtModel->addPatient($data)){
                flash('post_msg', 'add new patient successfully');
                     redirect('AdminUserMgmt/patient'); 
            }else{
              $this->view('AdminUserMgmt/Patient/v_patientAddNew',$data);
            }  
       
       }else{
            $this->view('AdminUserMgmt/Patient/v_patientAddNew',$data);

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
 
        $this->view('AdminUserMgmt/Patient/v_patientAddNew',$data);

  }
}else{
  redirect('Admin/login');  
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
          }
         
          if(empty($data['last_name'])){
             $data['last_name_err']='last name can not be empty';
          }
       
          if(empty($data['nic'])){
            $data['nic_err']='nic can not be empty';
         }
        
         if(empty($data['contact_number'])){
            $data['contact_number_err']='contact number can not be empty';
         }
          
            if(empty($data['email'])){
              $data['email_err']='email can not be empty';
          }
          
          if(empty($data['password'])){
              $data['password_err']='password can not be empty';
          }
        
          if(empty($data['confirm_password'])){
            $data['confirm_password_err']='confirm password  can not be empty';
          }
        
          if(empty($data['city'])){
            $data['city_err']='city can not be empty';
          }

            if(empty($data['bank_name'])){
              $data['bank_name_err']='bank name can not be empty';
          }
          
          if(empty($data['acount_holder_name'])){
              $data['account_holder_name_err']='acount holder name can not be empty';
          }
        
          if(empty($data['branch'])){
            $data['branch_err']='branch name can not be empty';
          }
        
          if(empty($data['account_number'])){
            $data['account_number_err']='account number can not be empty';
          }

          if(empty($data['slmc_reg_number'])){
            $data['slmc_reg_number_err']='slmc reg number can not be empty';
         }
        
          if(empty($data['type'])){
              $data['type_err']='type can not be empty';
          }
        
          if(empty($data['specialization'])){
            $data['specialization_err']='specialization can not be empty';
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
               
            $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
             if($this->adminUserMgmtModel->addDoctor($data)){
                   flash('post_msg', 'add new doctor successfully');
                        redirect('AdminUserMgmt/doctor'); 
               }else{
                   die('Error creating');
               }  
          
          }else{
              $this->view('AdminUserMgmt/Doctor/v_doctorAddNew',$data);
   
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
    
           $this->view('AdminUserMgmt/Doctor/v_doctorAddNew',$data);
       
     }
     
     }else{
        redirect('Admin/login');  
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
               }
              
               if(empty($data['last_name'])){
                  $data['last_name_err']='last name can not be empty';
               }
            
               if(empty($data['nic'])){
                 $data['nic_err']='nic can not be empty';
              }
             
              if(empty($data['contact_number'])){
                 $data['contact_number_err']='contact number can not be empty';
              }
               
                 if(empty($data['email'])){
                   $data['email_err']='email can not be empty';
               }
               
               if(empty($data['password'])){
                   $data['password_err']='password can not be empty';
               }
             
               if(empty($data['confirm_password'])){
                 $data['confirm_password_err']='confirm password  can not be empty';
               }
             
               if(empty($data['city'])){
                 $data['city_err']='city can not be empty';
               }
     
                 if(empty($data['bank_name'])){
                   $data['bank_name_err']='bank name can not be empty';
               }
               
               if(empty($data['acount_holder_name'])){
                   $data['acount_holder_name_err']='acount_holder name can not be empty';
               }
             
               if(empty($data['branch'])){
                 $data['branch_err']='branch name can not be empty';
               }
             
               if(empty($data['account_number'])){
                 $data['account_number_err']='last name can not be empty';
               }
     
               if(empty($data['slmc_reg_number'])){
                 $data['slmc_reg_number_err']='slmc reg number can not be empty';
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
               
                  
                  $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
                   if($this->adminUserMgmtModel->addCounsellor($data)){
                         flash('post_msg', 'add new counsellor successfully');
                              redirect('AdminUserMgmt/counsellor'); 
                     }else{
                         die('Error creating');
                     }  
                
                }else{
                    $this->view('AdminUserMgmt/Counsellor/v_counsellorAddNew',$data);
         
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
          
                 $this->view('AdminUserMgmt/Counsellor/v_counsellorAddNew',$data);
         
           }
     
  }else{
    redirect('Admin/login');  
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
         }
        
         if(empty($data['last_name'])){
            $data['last_name_err']='last name can not be empty';
         }
      
         if(empty($data['nic'])){
           $data['nic_err']='nic can not be empty';
        }
       
        if(empty($data['contact_number'])){
           $data['contact_number_err']='contact number can not be empty';
        }
         
           if(empty($data['email'])){
             $data['email_err']='email can not be empty';
         }
         
         if(empty($data['password'])){
             $data['password_err']='password can not be empty';
         }
       
         if(empty($data['confirm_password'])){
           $data['confirm_password_err']='confirm password  can not be empty';
         }
       
         if(empty($data['bank_name'])){
             $data['bank_name_err']='bank name can not be empty';
         }
         
         if(empty($data['acount_holder_name'])){
             $data['acount_holder_name_err']='acount_holder name can not be empty';
         }
       
         if(empty($data['branch'])){
           $data['branch_err']='branch name can not be empty';
         }
       
         if(empty($data['account_number'])){
           $data['account_number_err']='account_number can not be empty';
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
     
            
            $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
             if($this->adminUserMgmtModel->addAdmin($data)){
                   flash('post_msg', 'add new admin successfully');
                        redirect('AdminUserMgmt/admin'); 
               }else{
                   die('Error creating');
               }  
          
          }else{
              $this->view('AdminUserMgmt/Admin/v_adminAddNew',$data);
   
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
    
           $this->view('AdminUserMgmt/Admin/v_adminAddNew',$data);
   
     }
   
  }else{
    redirect('Admin/login');  
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
            if(uploadFile($data['qualification_file']['tmp_name'],$data['qualification_file_name'],'/upload/meditation_instructor_qualification/')){
                       
            }else{  
             $data['qualification_file_err']='Unsuccessful qualification_file uploading';
             
            }
          }else{
             $data[ 'qualification_file_err'] ="qualification file size is empty";
           
          }
 
          if(empty($data['first_name'])){
            $data['first_name_err']='first name can not be empty';
         }
        
         if(empty($data['last_name'])){
            $data['last_name_err']='last name can not be empty';
         }
      
         if(empty($data['nic'])){
           $data['nic_err']='nic can not be empty';
        }
       
        if(empty($data['contact_number'])){
           $data['contact_number_err']='contact number can not be empty';
        }
         
           if(empty($data['email'])){
             $data['email_err']='email can not be empty';
         }
         
         if(empty($data['password'])){
             $data['password_err']='password can not be empty';
         }
       
         if(empty($data['confirm_password'])){
           $data['confirm_password_err']='confirm password  can not be empty';
         }
       
         if(empty($data['city'])){
           $data['city_err']='city can not be empty';
         }

           if(empty($data['bank_name'])){
             $data['bank_name_err']='bank name can not be empty';
         }
         
         if(empty($data['acount_holder_name'])){
             $data['acount_holder_name_err']='acount_holder name can not be empty';
         }
       
         if(empty($data['branch'])){
           $data['branch_err']='branch name can not be empty';
         }
       
         if(empty($data['account_number'])){
           $data['account_number_err']='account_number can not be empty';
         }

         if(empty($data['address'])){
           $data['address_err']='address can not be empty';
        }
       
         if(empty($data['fee'])){
             $data['fee_err']='fee can not be empty';
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
               
        
               
            $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
             if($this->adminUserMgmtModel->addMeditationInstructor($data)){
                   flash('post_msg', 'add new meditationInstructor successfully');
                        redirect('AdminUserMgmt/meditationInstructor'); 
               }else{
                   die('Error creating');
               }  
          
          }else{
              $this->view('AdminUserMgmt/MeditationInstructor/v_medInstrAddNew',$data);
   
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
    
           $this->view('AdminUserMgmt/MeditationInstructor/v_medInstrAddNew',$data);
   
     }
   
  }else{
    redirect('Admin/login');  
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
         }
        
         if(empty($data['last_name'])){
            $data['last_name_err']='last name can not be empty';
         }
      
         if(empty($data['nic'])){
           $data['nic_err']='nic can not be empty';
        }
       
        if(empty($data['contact_number'])){
           $data['contact_number_err']='contact number can not be empty';
        }
         
           if(empty($data['email'])){
             $data['email_err']='email can not be empty';
         }
         
         if(empty($data['password'])){
             $data['password_err']='password can not be empty';
         }
       
         if(empty($data['confirm_password'])){
           $data['confirm_password_err']='confirm password  can not be empty';
         }
       
         if(empty($data['city'])){
           $data['city_err']='city can not be empty';
         }

           if(empty($data['bank_name'])){
             $data['bank_name_err']='bank name can not be empty';
         }
         
         if(empty($data['acount_holder_name'])){
             $data['acount_holder_name_err']='acount_holder name can not be empty';
         }
       
         if(empty($data['branch'])){
           $data['branch_err']='branch name can not be empty';
         }
       
         if(empty($data['account_number'])){
           $data['account_number_err']='last name can not be empty';
         }

         if(empty($data['slmc_reg_number'])){
           $data['slmc_reg_number_err']='slmc reg number can not be empty';
        }
       
         if(empty($data['pharmacy_name'])){
             $data['pharmacy_name_err']='pharmacy name can not be empty';
         }
       
         if(empty($data['address'])){
           $data['address_err']='address can not be empty';
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
               
                 
            $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
             if($this->adminUserMgmtModel->addPharmacist($data)){
                   flash('post_msg', 'add new pharmacist successfully');
                        redirect('AdminUserMgmt/pharmacist'); 
               }else{
                   die('Error creating');
               }  
          
          }else{
              $this->view('AdminUserMgmt/Pharmacist/v_pharmacistAddNew',$data);
   
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
    
           $this->view('AdminUserMgmt/Pharmacist/v_pharmacistAddNew',$data);
   
     }
    
   
  }else{
    redirect('Admin/login');  
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
         }
        
         if(empty($data['last_name'])){
            $data['last_name_err']='last name can not be empty';
         }
      
         if(empty($data['nic'])){
           $data['nic_err']='nic can not be empty';
        }
       
        if(empty($data['contact_number'])){
           $data['contact_number_err']='contact number can not be empty';
        }
         
           if(empty($data['email'])){
             $data['email_err']='email can not be empty';
         }
         
         if(empty($data['password'])){
             $data['password_err']='password can not be empty';
         }
       
         if(empty($data['confirm_password'])){
           $data['confirm_password_err']='confirm password  can not be empty';
         }
       
         if(empty($data['bank_name'])){
             $data['bank_name_err']='bank name can not be empty';
         }
         
         if(empty($data['acount_holder_name'])){
             $data['account_holder_name_err']='acount holder name can not be empty';
         }
       
         if(empty($data['branch'])){
           $data['branch_err']='branch name can not be empty';
         }
       
         if(empty($data['account_number'])){
           $data['account_number_err']='last name can not be empty';
         }

         if(empty($data['slmc_reg_number'])){
           $data['slmc_reg_number_err']='slmc reg number can not be empty';
        }
       
         if(empty($data['fee'])){
             $data['fee_err']='fee can not be empty';
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
              
            $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
             if($this->adminUserMgmtModel->addNutritionist($data)){
                   flash('post_msg', 'add new nutritionist successfully');
                        redirect('AdminUserMgmt/nutritionist'); 
               }else{
                   die('Error creating');
               }  
          
          }else{
              $this->view('AdminUserMgmt/Nutritionist/v_nutritionistAddNew',$data);
   
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
    
           $this->view('AdminUserMgmt/Nutritionist/v_nutritionistAddNew',$data);
             
     }
    
  }else{
    redirect('Admin/login');  
  }
           
       }
}



 ?>
