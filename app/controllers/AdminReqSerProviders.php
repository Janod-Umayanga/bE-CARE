<?php


class AdminReqSerProviders extends Controller{
  private $adminReqSerProvidersModel;
 
  public function __construct(){
    $this->adminReqSerProvidersModel = $this->model('M_AdminReqSerProviders');
  }

  // Admin Requested Service Providers
  public function adminReqSerProviders()
  {
  if(isset($_SESSION['admin_id'])) {  
   
   $doctor= $this->adminReqSerProvidersModel->getNoOfReqDoctors();
   $counsellor= $this->adminReqSerProvidersModel->getNoOfReqCounsellors();
   $nutritionist= $this->adminReqSerProvidersModel->getNoOfReqNutritionist();
   $meditationInstr= $this->adminReqSerProvidersModel->getNoOfReqMeditationInstr();
   $pharmacist= $this->adminReqSerProvidersModel->getNoOfReqPharmacist();

   $data=[                      
     'doctor'=>$doctor,
     'counsellor'=>$counsellor,
     'nutritionist'=>$nutritionist,
     'meditationInstr'=>$meditationInstr,
     'pharmacist'=>$pharmacist,
   ];
   $this->view('Admin/AdminReqSerProviders/v_reqSerProviders',$data);

  }else{
    redirect('Login/login');  
  } 

  }

  //Admin Requested Doctor
  public function adminReqDoctor()
  {

  if(isset($_SESSION['admin_id'])) {  
  
   $doctor= $this->adminReqSerProvidersModel->getReqDoctors();
   
   $data=[                      
     'doctor'=>$doctor,
     'search'=>''
   ];
   $this->view('Admin/AdminReqSerProviders/ReqDoctor/v_reqDoctor',$data);

  }else{
    redirect('Login/login');  
  }
  }

  //Admin Requested Counsellor
  public function adminReqCounsellor()
  {
  
  if(isset($_SESSION['admin_id'])) {  
  
   $counsellor= $this->adminReqSerProvidersModel->getReqCounsellors();
   
   $data=[                      
     'counsellor'=>$counsellor,
     'search'=>''
   ];
   $this->view('Admin/AdminReqSerProviders/ReqCounsellor/v_reqCounsellor',$data);
  }else{
    redirect('Login/login');  
  }

  }

  //Admin Requested Nutritionist
  public function adminReqNutritionist()
  {
  
   if(isset($_SESSION['admin_id'])) {  
  
    $nutritionist= $this->adminReqSerProvidersModel->getReqNutritionists();
   
   $data=[                      
     'nutritionist'=>$nutritionist,
     'search'=>''
   ];
   $this->view('Admin/AdminReqSerProviders/ReqNutritionist/v_reqNutritionist',$data);
  }else{
    redirect('Login/login');  
  }

  }
  
  //Admin Requested MeditationInstructor
  public function adminReqMeditationInstructor()
  {
  
    if(isset($_SESSION['admin_id'])) {  
  
    $meditationInstructor= $this->adminReqSerProvidersModel->getReqMeditationInstructors();
                                                            
   $data=[                      
     'meditationInstructor'=>$meditationInstructor,
     'search'=>''
   ];
   $this->view('Admin/AdminReqSerProviders/ReqMeditationInstr/v_reqMeditationInstr',$data);
  }else{
    redirect('Login/login');  
  }

  }
  
 //Admin Requested Pharmacist
  public function adminReqPharmacist()
  {
    if(isset($_SESSION['admin_id'])) {  
  
    $pharmacist= $this->adminReqSerProvidersModel->getReqPharmacists();
   
   $data=[                      
     'pharmacist'=>$pharmacist,
     'search'=>''
   ];
   $this->view('Admin/AdminReqSerProviders/ReqPharmacist/v_reqPharmacist',$data);
  }else{
    redirect('Login/login');  
  }

  }
  

  //Search Requested Doctor

  public function  adminSearchReqDoctor()
  {
    if(isset($_SESSION['admin_id'])) {  
  
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

          $search=trim($_GET['search']);
         
          $doctor= $this->adminReqSerProvidersModel->getSearchReqDoctors($search);
          
          $data=[                      
            'doctor'=>$doctor,
            'search'=>$search
          ];
          $this->view('Admin/AdminReqSerProviders/ReqDoctor/v_reqDoctor',$data);
     }else{
          $data=[                      
            'doctor'=>'',
            'search'=>''
          ];
          $this->view('Admin/AdminReqSerProviders/ReqDoctor/v_reqDoctor',$data);
     }
    }else{
      redirect('Login/login');  
    }
  }

  //View More Requested Doctor

  public function  adminViewMoreReqDoctor($doctor_id)
  {
    if(isset($_SESSION['admin_id'])) {  
  
    $doctor= $this->adminReqSerProvidersModel->getReqDoctorDetails($doctor_id);
   
   $data=[                      
     'doctor'=>$doctor
     
   ];
   $this->view('Admin/AdminReqSerProviders/ReqDoctor/v_reqDoctorViewMore',$data);
  }else{
    redirect('Login/login');  
  }
  }

  //Verify requested Doctor
  
  public function  adminVerifyReqDoctor($doctor_id)
  {
    if(isset($_SESSION['admin_id'])) {  
  
    $doctorDetails=$this->adminReqSerProvidersModel->getReqDoctorDetails($doctor_id);
    $verifydoctor= $this->adminReqSerProvidersModel->VerifyReqDoctor($doctor_id);
    $doctor= $this->adminReqSerProvidersModel->getReqDoctors();
    sendMail($doctorDetails->email,$doctorDetails->first_name,'', 3,''); // 3 means email template number

    $data=[                      
      'doctor'=>$doctor,
      'search'=>'',
      'verifydoctor'=>$verifydoctor
    ];
    $this->view('Admin/AdminReqSerProviders/ReqDoctor/v_reqDoctor',$data);
  }else{
    redirect('Login/login');  
  }
  }

  //Not Verified ReqDoctor
  public function  adminNotVerifyReqDoctor($doctor_id)
  {
  
    if(isset($_SESSION['admin_id'])) {  

    $doctorDetails=$this->adminReqSerProvidersModel->getReqDoctorDetails($doctor_id);
    $notverifydoctor= $this->adminReqSerProvidersModel->NotVerifyReqDoctor($doctor_id);
    $doctor= $this->adminReqSerProvidersModel->getReqDoctors();
    sendMail($doctorDetails->email,$doctorDetails->first_name,'', 4,''); // 4 means email template number
  
    $data=[                      
      'doctor'=>$doctor,
      'search'=>'',
      'notverifydoctor'=>$notverifydoctor
    ];
    $this->view('Admin/AdminReqSerProviders/ReqDoctor/v_reqDoctor',$data);
  }else{
    redirect('Login/login');  
  }
  }

   //Pharmacist


 //admin Search Requested Pharmacist
 public function  adminSearchReqPharmacist()
 {
  if(isset($_SESSION['admin_id'])) {  
  
  if($_SERVER['REQUEST_METHOD']=='GET'){
    $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        $search=trim($_GET['search']);
        $pharmacist= $this->adminReqSerProvidersModel->getSearchReqPharmacists($search);
        
        $data=[                      
          'pharmacist'=>$pharmacist,
          'search'=>$search
        ];
        $this->view('Admin/AdminReqSerProviders/ReqPharmacist/v_reqPharmacist',$data);
   }else{
        $data=[                      
          'pharmacist'=>'',
          'search'=>''
        ];
        $this->view('Admin/AdminReqSerProviders/ReqPharmacist/v_reqPharmacist',$data);
   }
  }else{
    redirect('Login/login');  
  }
}

//Admin View More Requested Pharmacist
public function  adminViewMoreReqPharmacist($pharmacist_id)
{
  if(isset($_SESSION['admin_id'])) {  
  
  $pharmacist= $this->adminReqSerProvidersModel->getReqPharmacistDetails($pharmacist_id);
 
 $data=[                      
   'pharmacist'=>$pharmacist
   
 ];
 $this->view('Admin/AdminReqSerProviders/ReqPharmacist/v_reqPharmacistViewMore',$data);
}else{
  redirect('Login/login');  
}
}

//Admin Verify Requested Pharmacist
public function  adminVerifyReqPharmacist($pharmacist_id)
{
  if(isset($_SESSION['admin_id'])) {  

  $pharmacistDetails=$this->adminReqSerProvidersModel->getReqPharmacistDetails($pharmacist_id);
  $verifypharmacist= $this->adminReqSerProvidersModel->VerifyReqPharmacist($pharmacist_id);
  $pharmacist= $this->adminReqSerProvidersModel->getReqPharmacists();
  sendMail($pharmacistDetails->email,$pharmacistDetails->first_name,'', 3,''); // 3 means email template number


  $data=[                      
    'pharmacist'=>$pharmacist,
    'search'=>'',
    'verifypharmacist'=>$verifypharmacist
  ];
  $this->view('Admin/AdminReqSerProviders/ReqPharmacist/v_reqPharmacist',$data);
}else{
  redirect('Login/login');  
}
}


public function  adminNotVerifyReqPharmacist($pharmacist_id)
{
  if(isset($_SESSION['admin_id'])) {  
  
  $pharmacistDetails=$this->adminReqSerProvidersModel->getReqPharmacistDetails($pharmacist_id);
  $notverifypharmacist= $this->adminReqSerProvidersModel->NotVerifyReqPharmacist($pharmacist_id);
  $pharmacist= $this->adminReqSerProvidersModel->getReqPharmacists();
  sendMail($pharmacistDetails->email,$pharmacistDetails->first_name,'', 4,'');  //4 means email template number

   

    $data=[                      
      'pharmacist'=>$pharmacist,
      'search'=>'',
      'notverifypharmacist'=>$notverifypharmacist
    ];
    $this->view('Admin/AdminReqSerProviders/ReqPharmacist/v_reqPharmacist',$data);
  }else{
    redirect('Login/login');  
  }
}


  

//Counsellor

//Admin Search Requested Counsellor
public function  adminSearchReqCounsellor()
{
  if(isset($_SESSION['admin_id'])) {  
  
  if($_SERVER['REQUEST_METHOD']=='GET'){
    $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        $search=trim($_GET['search']);
        $counsellor= $this->adminReqSerProvidersModel->getSearchReqCounsellors($search);
        
        $data=[                      
          'counsellor'=>$counsellor,
          'search'=>$search
        ];
        $this->view('Admin/AdminReqSerProviders/ReqCounsellor/v_reqCounsellor',$data);
   }else{
        $data=[                      
          'counsellor'=>'',
          'search'=>''
        ];
        $this->view('Admin/AdminReqSerProviders/ReqCounsellor/v_reqCounsellor',$data);
   }
  }else{
    redirect('Login/login');  
  }
}

//Admin View More Requested Counsellor
public function  adminViewMoreReqCounsellor($counsellor_id)
{
  if(isset($_SESSION['admin_id'])) {  
  
  $counsellor= $this->adminReqSerProvidersModel->getReqCounsellorDetails($counsellor_id);
 
 $data=[                      
   'counsellor'=>$counsellor
   
 ];
 $this->view('Admin/AdminReqSerProviders/ReqCounsellor/v_reqCounsellorViewMore',$data);
}else{
  redirect('Login/login');  
}
}

//Admin Verify Requested Counsellor
public function  adminVerifyReqCounsellor($counsellor_id)
{
  if(isset($_SESSION['admin_id'])) {  
  
  $counsellorDetails=$this->adminReqSerProvidersModel->getReqCounsellorDetails($counsellor_id);
  $verifycounsellor= $this->adminReqSerProvidersModel->VerifyReqCounsellor($counsellor_id);
  $counsellor= $this->adminReqSerProvidersModel->getReqCounsellors();
  sendMail($counsellorDetails->email,$counsellorDetails->first_name,'', 3,''); // 3 means email template number

 
  $data=[                      
    'counsellor'=>$counsellor,
    'search'=>''
  ];
  $this->view('Admin/AdminReqSerProviders/ReqCounsellor/v_reqCounsellor',$data);
}else{
  redirect('Login/login');  
}
}

//Admin Not Verify Requested Counsellor
public function  adminNotVerifyReqCounsellor($counsellor_id)
{
  if(isset($_SESSION['admin_id'])) {  
  
  $counsellorDetails=$this->adminReqSerProvidersModel->getReqCounsellorDetails($counsellor_id);
  $notverifycounsellor= $this->adminReqSerProvidersModel->NotVerifyReqCounsellor($counsellor_id);
  $counsellor= $this->adminReqSerProvidersModel->getReqCounsellors();
  sendMail($counsellorDetails->email,$counsellorDetails->first_name,'', 4,''); // 4 means email template number
 
  
    $data=[                      
      'counsellor'=>$counsellor,
      'search'=>'',
      
    ];
    $this->view('Admin/AdminReqSerProviders/ReqCounsellor/v_reqCounsellor',$data);
  }else{
    redirect('Login/login');  
  }
}



//Nutritionist

//Admin Search Requested Nutritionist
public function  adminSearchReqNutritionist()
{
  if(isset($_SESSION['admin_id'])) {  
  
  if($_SERVER['REQUEST_METHOD']=='GET'){
    $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        $search=trim($_GET['search']);
        $nutritionist= $this->adminReqSerProvidersModel->getSearchReqNutritionists($search);
        
        $data=[                      
          'nutritionist'=>$nutritionist,
          'search'=>$search
        ];
        $this->view('Admin/AdminReqSerProviders/ReqNutritionist/v_reqNutritionist',$data);
   }else{
        $data=[                      
          'nutritionist'=>'',
          'search'=>''
        ];
        $this->view('Admin/AdminReqSerProviders/ReqNutritionist/v_reqNutritionist',$data);
   }
  }else{
    redirect('Login/login');  
  }
}

//Admin View More Requested Nutritionist
public function  adminViewMoreReqNutritionist($nutritionist_id)
{
  if(isset($_SESSION['admin_id'])) {  
  
  $nutritionist= $this->adminReqSerProvidersModel->getReqNutritionistDetails($nutritionist_id);
 
 $data=[                      
   'nutritionist'=>$nutritionist
   
 ];
 $this->view('Admin/AdminReqSerProviders/ReqNutritionist/v_reqNutritionistViewMore',$data);
}else{
  redirect('Login/login');  
}
}

//Admin Verify Requested Nutritionist
public function  adminVerifyReqNutritionist($nutritionist_id)
{
  if(isset($_SESSION['admin_id'])) {  
  
  $nutritionistDetails=$this->adminReqSerProvidersModel->getReqNutritionistDetails($nutritionist_id);
  $verifynutritionist= $this->adminReqSerProvidersModel->VerifyReqNutritionist($nutritionist_id);
  $nutritionist= $this->adminReqSerProvidersModel->getReqNutritionists();
  sendMail($nutritionistDetails->email,$nutritionistDetails->first_name,'', 3,''); // 3 means email template number


  $data=[                      
    'nutritionist'=>$nutritionist,
    'search'=>'',
    
  ];
  $this->view('Admin/AdminReqSerProviders/ReqNutritionist/v_reqNutritionist',$data);
}else{
  redirect('Login/login');  
}
}

//Admin Not Verify Requested Nutritionist
public function  adminNotVerifyReqNutritionist($nutritionist_id)
{
  if(isset($_SESSION['admin_id'])) {  

  $nutritionistDetails=$this->adminReqSerProvidersModel->getReqNutritionistDetails($nutritionist_id);
  $notverifynutritionist= $this->adminReqSerProvidersModel->NotVerifyReqNutritionist($nutritionist_id);
  $nutritionist= $this->adminReqSerProvidersModel->getReqNutritionists();
  sendMail($nutritionistDetails->email,$nutritionistDetails->first_name,'', 4,''); // 4 means email template num
    
    $data=[                      
      'nutritionist'=>$nutritionist,
      'search'=>'',
     
    ];
    $this->view('Admin/AdminReqSerProviders/ReqNutritionist/v_reqNutritionist',$data);
  }else{
    redirect('Login/login');  
  }
}



//Meditation Instructor

//Admin Search Requested MeditationInstructor
public function  adminSearchReqMeditationInstructor()
{
  if(isset($_SESSION['admin_id'])) {  
  
  if($_SERVER['REQUEST_METHOD']=='GET'){
    $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        $search=trim($_GET['search']);
       
        $meditationInstructor= $this->adminReqSerProvidersModel->getSearchReqMeditationInstructors($search);
        
        $data=[                      
          'meditationInstructor'=>$meditationInstructor,
          'search'=>$search
        ];
        $this->view('Admin/AdminReqSerProviders/ReqMeditationInstr/v_reqMeditationInstr',$data);
   }else{
        $data=[                      
          'meditationInstructor'=>'',
          'search'=>''
        ];
        $this->view('Admin/AdminReqSerProviders/ReqMeditation_Instr/v_reqMeditation_Instr',$data);
   }
  }else{
    redirect('Login/login');  
  }
}

//Admin View More Requested MeditationInstructor                
public function  adminViewMoreReqMeditationInstructor($meditationInstructor_id)
{
  if(isset($_SESSION['admin_id'])) {  
  
  $meditationInstructor= $this->adminReqSerProvidersModel->getReqMeditationInstructorDetails($meditationInstructor_id);
 
 $data=[                      
   'meditationInstructor'=>$meditationInstructor
   
 ];
 $this->view('Admin/AdminReqSerProviders/ReqMeditationInstr/v_reqMedInstrViewMore',$data);
}else{
  redirect('Login/login');  
}
}

//Admin Verify Requested MeditationInstructor
public function  adminVerifyReqMeditationInstructor($meditationInstructor_id)
{
  if(isset($_SESSION['admin_id'])) {  

  $meditationInstructorDetails=$this->adminReqSerProvidersModel->getReqMeditationInstructorDetails($meditationInstructor_id);
  $verifymeditationInstructor= $this->adminReqSerProvidersModel->VerifyReqMeditationInstructor($meditationInstructor_id);
  $meditationInstructor= $this->adminReqSerProvidersModel->getReqmeditationInstructors();
  sendMail($meditationInstructorDetails->email,$meditationInstructorDetails->first_name,'', 3,''); // 3 means email template number

  $data=[                      
    'meditationInstructor'=>$meditationInstructor,
    'search'=>'',
    
  ];
  $this->view('Admin/AdminReqSerProviders/ReqMeditationInstr/v_reqmeditationInstr',$data);
}else{
  redirect('Login/login');  
}
}

//Admin Not Verify Requested Meditation Instructor
public function  adminNotVerifyReqMeditationInstructor($meditationInstructor_id)
{

  if(isset($_SESSION['admin_id'])) {  
  
  $meditationInstructorDetails=$this->adminReqSerProvidersModel->getReqMeditationInstructorDetails($meditationInstructor_id);
  $notverifymeditationInstructor= $this->adminReqSerProvidersModel->NotVerifyReqMeditationInstructor($meditationInstructor_id);
  $meditationInstructor= $this->adminReqSerProvidersModel->getReqmeditationInstructors();
  sendMail($meditationInstructorDetails->email,$meditationInstructorDetails->first_name,'', 4,''); // 4 means email template number
   
    $data=[                      
      'meditationInstructor'=>$meditationInstructor,
      'search'=>'',
      'notverifymeditationInstructor'=>$notverifymeditationInstructor
    ];
    $this->view('Admin/AdminReqSerProviders/ReqmeditationInstr/v_reqmeditationInstr',$data);
  }else{
    redirect('Login/login');  
  } 
}

  

}

 ?>
