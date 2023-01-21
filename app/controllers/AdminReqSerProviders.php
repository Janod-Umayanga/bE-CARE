<?php


class AdminReqSerProviders extends Controller{
  
 
  public function __construct(){
    $this->adminReqSerProvidersModel = $this->model('M_AdminReqSerProviders');
  }

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
   $this->view('AdminReqSerProviders/v_reqSerProviders',$data);

  }else{
    redirect('Admin/login');  
  } 

  }

  public function adminReqDoctor()
  {
  
  if(isset($_SESSION['admin_id'])) {  
  
    
   $doctor= $this->adminReqSerProvidersModel->getReqDoctors();
   
   $data=[                      
     'doctor'=>$doctor,
     'search'=>''
   ];
   $this->view('AdminReqSerProviders/ReqDoctor/v_reqDoctor',$data);

  }else{
    redirect('Admin/login');  
  }
  }

  public function adminReqCounsellor()
  {
  
    if(isset($_SESSION['admin_id'])) {  
  
   $counsellor= $this->adminReqSerProvidersModel->getReqCounsellors();
   
   $data=[                      
     'counsellor'=>$counsellor,
     'search'=>''
   ];
   $this->view('AdminReqSerProviders/ReqCounsellor/v_reqCounsellor',$data);
  }else{
    redirect('Admin/login');  
  }

  }

  
  public function adminReqNutritionist()
  {
  
   if(isset($_SESSION['admin_id'])) {  
  
    $nutritionist= $this->adminReqSerProvidersModel->getReqNutritionists();
   
   $data=[                      
     'nutritionist'=>$nutritionist,
     'search'=>''
   ];
   $this->view('AdminReqSerProviders/ReqNutritionist/v_reqNutritionist',$data);
  }else{
    redirect('Admin/login');  
  }

  }
  
  public function adminReqMeditationInstructor()
  {
  
    if(isset($_SESSION['admin_id'])) {  
  
    $meditationInstructor= $this->adminReqSerProvidersModel->getReqMeditationInstructors();
                                                            
   $data=[                      
     'meditationInstructor'=>$meditationInstructor,
     'search'=>''
   ];
   $this->view('AdminReqSerProviders/ReqMeditationInstr/v_reqMeditationInstr',$data);
  }else{
    redirect('Admin/login');  
  }

  }
  

  public function adminReqPharmacist()
  {
    if(isset($_SESSION['admin_id'])) {  
  
    $pharmacist= $this->adminReqSerProvidersModel->getReqPharmacists();
   
   $data=[                      
     'pharmacist'=>$pharmacist,
     'search'=>''
   ];
   $this->view('AdminReqSerProviders/ReqPharmacist/v_reqPharmacist',$data);
  }else{
    redirect('Admin/login');  
  }

  }
  

  // Doctor


  public function  adminSearchReqDoctor()
  {
    if(isset($_SESSION['admin_id'])) {  
  
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

          $search=trim($_GET['search']);
          echo $search; 
          $doctor= $this->adminReqSerProvidersModel->getSearchReqDoctors($search);
          
          $data=[                      
            'doctor'=>$doctor,
            'search'=>$search
          ];
          $this->view('AdminReqSerProviders/ReqDoctor/v_reqDoctor',$data);
     }else{
          $data=[                      
            'doctor'=>'',
            'search'=>''
          ];
          $this->view('AdminReqSerProviders/ReqDoctor/v_reqDoctor',$data);
     }
    }else{
      redirect('Admin/login');  
    }
  }


  public function  adminViewMoreReqDoctor($doctor_id)
  {
    if(isset($_SESSION['admin_id'])) {  
  
    $doctor= $this->adminReqSerProvidersModel->getReqDoctorDetails($doctor_id);
   
   $data=[                      
     'doctor'=>$doctor
     
   ];
   $this->view('AdminReqSerProviders/ReqDoctor/v_reqDoctorViewMore',$data);
  }else{
    redirect('Admin/login');  
  }
  }

  
  public function  adminVerifyReqDoctor($doctor_id)
  {
    if(isset($_SESSION['admin_id'])) {  
  
    $verifydoctor= $this->adminReqSerProvidersModel->VerifyReqDoctor($doctor_id);
    $doctor= $this->adminReqSerProvidersModel->getReqDoctors();
   
    $data=[                      
      'doctor'=>$doctor,
      'search'=>'',
      'verifydoctor'=>verifydoctor
    ];
    $this->view('AdminReqSerProviders/ReqDoctor/v_reqDoctor',$data);
  }else{
    redirect('Admin/login');  
  }
  }


  public function  adminNotVerifyReqDoctor($doctor_id)
  {
  
    if(isset($_SESSION['admin_id'])) {  
  
    $notverifydoctor= $this->adminReqSerProvidersModel->NotVerifyReqDoctor($doctor_id);
    $doctor= $this->adminReqSerProvidersModel->getReqDoctors();
   
    $data=[                      
      'doctor'=>$doctor,
      'search'=>'',
      'notverifydoctor'=>notverifydoctor
    ];
    $this->view('AdminReqSerProviders/ReqDoctor/v_reqDoctor',$data);
  }else{
    redirect('Admin/login');  
  }
  }

//Pharmacist
  
public function  adminSearchReqPharmacist()
{
  if(isset($_SESSION['admin_id'])) {  
  
  if($_SERVER['REQUEST_METHOD']=='GET'){
    $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        $search=trim($_GET['search']);
        echo $search; 
        $pharmacist= $this->adminReqSerProvidersModel->getSearchReqPharmacists($search);
        
        $data=[                      
          'pharmacist'=>$pharmacist,
          'search'=>$search
        ];
        $this->view('AdminReqSerProviders/ReqPharmacist/v_reqPharmacist',$data);
   }else{
        $data=[                      
          'pharmacist'=>'',
          'search'=>''
        ];
        $this->view('AdminReqSerProviders/ReqPharmacist/v_reqPharmacist',$data);
   }
  }else{
    redirect('Admin/login');  
  }
}


public function  adminViewMoreReqPharmacist($pharmacist_id)
{
  if(isset($_SESSION['admin_id'])) {  
  
  $pharmacist= $this->adminReqSerProvidersModel->getReqPharmacistDetails($pharmacist_id);
 
 $data=[                      
   'pharmacist'=>$pharmacist
   
 ];
 $this->view('AdminReqSerProviders/ReqPharmacist/v_reqPharmacistViewMore',$data);
}else{
  redirect('Admin/login');  
}
}


public function  adminVerifyReqPharmacist($pharmacist_id)
{
  if(isset($_SESSION['admin_id'])) {  
  
  $verifypharmacist= $this->adminReqSerProvidersModel->VerifyReqPharmacist($pharmacist_id);
  $pharmacist= $this->adminReqSerProvidersModel->getReqPharmacists();
 
  $data=[                      
    'pharmacist'=>$pharmacist,
    'search'=>'',
    'verifypharmacist'=>verifypharmacist
  ];
  $this->view('AdminReqSerProviders/ReqPharmacist/v_reqPharmacist',$data);
}else{
  redirect('Admin/login');  
}
}


public function  adminNotVerifyReqPharmacist($pharmacist_id)
{
  if(isset($_SESSION['admin_id'])) {  
  
  $notverifypharmacist= $this->adminReqSerProvidersModel->NotVerifyReqPharmacist($pharmacist_id);
  $pharmacist= $this->adminReqSerProvidersModel->getReqPharmacists();
   
    $data=[                      
      'pharmacist'=>$pharmacist,
      'search'=>'',
      'notverifypharmacist'=>notverifypharmacist
    ];
    $this->view('AdminReqSerProviders/ReqPharmacist/v_reqPharmacist',$data);
  }else{
    redirect('Admin/login');  
  }
}


  

//Counsellor

public function  adminSearchReqCounsellor()
{
  if(isset($_SESSION['admin_id'])) {  
  
  if($_SERVER['REQUEST_METHOD']=='GET'){
    $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        $search=trim($_GET['search']);
        echo $search; 
        $counsellor= $this->adminReqSerProvidersModel->getSearchReqCounsellors($search);
        
        $data=[                      
          'counsellor'=>$counsellor,
          'search'=>$search
        ];
        $this->view('AdminReqSerProviders/ReqCounsellor/v_reqCounsellor',$data);
   }else{
        $data=[                      
          'counsellor'=>'',
          'search'=>''
        ];
        $this->view('AdminReqSerProviders/ReqCounsellor/v_reqCounsellor',$data);
   }
  }else{
    redirect('Admin/login');  
  }
}


public function  adminViewMoreReqCounsellor($counsellor_id)
{
  if(isset($_SESSION['admin_id'])) {  
  
  $counsellor= $this->adminReqSerProvidersModel->getReqCounsellorDetails($counsellor_id);
 
 $data=[                      
   'counsellor'=>$counsellor
   
 ];
 $this->view('AdminReqSerProviders/ReqCounsellor/v_reqCounsellorViewMore',$data);
}else{
  redirect('Admin/login');  
}
}


public function  adminVerifyReqCounsellor($counsellor_id)
{
  if(isset($_SESSION['admin_id'])) {  
  
  $verifycounsellor= $this->adminReqSerProvidersModel->VerifyReqCounsellor($counsellor_id);
  $counsellor= $this->adminReqSerProvidersModel->getReqCounsellors();
 
  $data=[                      
    'counsellor'=>$counsellor,
    'search'=>'',
    'verifycounsellor'=>verifycounsellor
  ];
  $this->view('AdminReqSerProviders/ReqCounsellor/v_reqCounsellor',$data);
}else{
  redirect('Admin/login');  
}
}


public function  adminNotVerifyReqCounsellor($counsellor_id)
{
  if(isset($_SESSION['admin_id'])) {  
  
  $notverifycounsellor= $this->adminReqSerProvidersModel->NotVerifyReqCounsellor($counsellor_id);
  $counsellor= $this->adminReqSerProvidersModel->getReqCounsellors();
   
    $data=[                      
      'counsellor'=>$counsellor,
      'search'=>'',
      'notverifycounsellor'=>notverifycounsellor
    ];
    $this->view('AdminReqSerProviders/ReqCounsellor/v_reqCounsellor',$data);
  }else{
    redirect('Admin/login');  
  }
}



//Nutritionist

public function  adminSearchReqNutritionist()
{
  if(isset($_SESSION['admin_id'])) {  
  
  if($_SERVER['REQUEST_METHOD']=='GET'){
    $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        $search=trim($_GET['search']);
        echo $search; 
        $nutritionist= $this->adminReqSerProvidersModel->getSearchReqNutritionists($search);
        
        $data=[                      
          'nutritionist'=>$nutritionist,
          'search'=>$search
        ];
        $this->view('AdminReqSerProviders/ReqNutritionist/v_reqNutritionist',$data);
   }else{
        $data=[                      
          'nutritionist'=>'',
          'search'=>''
        ];
        $this->view('AdminReqSerProviders/ReqNutritionist/v_reqNutritionist',$data);
   }
  }else{
    redirect('Admin/login');  
  }
}


public function  adminViewMoreReqNutritionist($nutritionist_id)
{
  if(isset($_SESSION['admin_id'])) {  
  
  $nutritionist= $this->adminReqSerProvidersModel->getReqNutritionistDetails($nutritionist_id);
 
 $data=[                      
   'nutritionist'=>$nutritionist
   
 ];
 $this->view('AdminReqSerProviders/ReqNutritionist/v_reqNutritionistViewMore',$data);
}else{
  redirect('Admin/login');  
}
}


public function  adminVerifyReqNutritionist($nutritionist_id)
{
  if(isset($_SESSION['admin_id'])) {  
  
  $verifynutritionist= $this->adminReqSerProvidersModel->VerifyReqNutritionist($nutritionist_id);
  $nutritionist= $this->adminReqSerProvidersModel->getReqNutritionists();
 
  $data=[                      
    'nutritionist'=>$nutritionist,
    'search'=>'',
    'verifynutritionist'=>verifynutritionist
  ];
  $this->view('AdminReqSerProviders/ReqNutritionist/v_reqNutritionist',$data);
}else{
  redirect('Admin/login');  
}
}


public function  adminNotVerifyReqNutritionist($nutritionist_id)
{
  if(isset($_SESSION['admin_id'])) {  
  
  $notverifynutritionist= $this->adminReqSerProvidersModel->NotVerifyReqNutritionist($nutritionist_id);
  $nutritionist= $this->adminReqSerProvidersModel->getReqNutritionists();
   
    $data=[                      
      'nutritionist'=>$nutritionist,
      'search'=>'',
      'notverifynutritionist'=>notverifynutritionist
    ];
    $this->view('AdminReqSerProviders/ReqNutritionist/v_reqNutritionist',$data);
  }else{
    redirect('Admin/login');  
  }
}



//Meditation Instructor

public function  adminSearchReqMeditationInstructor()
{
  if(isset($_SESSION['admin_id'])) {  
  
  if($_SERVER['REQUEST_METHOD']=='GET'){
    $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        $search=trim($_GET['search']);
        echo $search; 
        $meditationInstructor= $this->adminReqSerProvidersModel->getSearchReqMeditationInstructors($search);
        
        $data=[                      
          'meditationInstructor'=>$meditationInstructor,
          'search'=>$search
        ];
        $this->view('AdminReqSerProviders/ReqMeditationInstr/v_reqMeditationInstr',$data);
   }else{
        $data=[                      
          'meditationInstructor'=>'',
          'search'=>''
        ];
        $this->view('AdminReqSerProviders/ReqMeditation_Instr/v_reqMeditation_Instr',$data);
   }
  }else{
    redirect('Admin/login');  
  }
}

                
public function  adminViewMoreReqMeditationInstructor($meditationInstructor_id)
{
  if(isset($_SESSION['admin_id'])) {  
  
  $meditationInstructor= $this->adminReqSerProvidersModel->getReqMeditationInstructorDetails($meditationInstructor_id);
 
 $data=[                      
   'meditationInstructor'=>$meditationInstructor
   
 ];
 $this->view('AdminReqSerProviders/ReqMeditationInstr/v_reqMedInstrViewMore',$data);
}else{
  redirect('Admin/login');  
}
}


public function  adminVerifyReqMeditationInstructor($meditationInstructor_id)
{
  if(isset($_SESSION['admin_id'])) {  
  
  $verifymeditationInstructor= $this->adminReqSerProvidersModel->VerifyReqMeditationInstructor($meditationInstructor_id);
 
  $meditationInstructor= $this->adminReqSerProvidersModel->getReqmeditationInstructors();
 
  $data=[                      
    'meditationInstructor'=>$meditationInstructor,
    'search'=>'',
    'verifymeditationInstructor'=>$verifymeditationInstructor
  ];
  $this->view('AdminReqSerProviders/ReqMeditationInstr/v_reqmeditationInstr',$data);
}else{
  redirect('Admin/login');  
}
}


public function  adminNotVerifyReqMeditationInstructor($meditationInstructor_id)
{

  if(isset($_SESSION['admin_id'])) {  
  

  $notverifymeditationInstructor= $this->adminReqSerProvidersModel->NotVerifyReqMeditationInstructor($meditationInstructor_id);
  $meditationInstructor= $this->adminReqSerProvidersModel->getReqmeditationInstructors();
   
    $data=[                      
      'meditationInstructor'=>$meditationInstructor,
      'search'=>'',
      'notverifymeditationInstructor'=>notverifymeditationInstructor
    ];
    $this->view('AdminReqSerProviders/ReqmeditationInstr/v_reqmeditationInstr',$data);
  }else{
    redirect('Admin/login');  
  } 
}

  

}

 ?>
