<?php

class MedInstrSession extends Controller{
    private $medInstrSessionModel;
 
    public function __construct(){
    $this->medInstrSessionModel = $this->model('M_MedInstrSession');
  }

  public function medInstrSession()
  {
    if(isset($_SESSION['MedInstr_id'])) {  
   
   $noOfoldSession= $this->medInstrSessionModel->findNoOfOldSession($_SESSION["MedInstr_id"]);
   $noOfnewSession= $this->medInstrSessionModel->findNoOfNewSession($_SESSION["MedInstr_id"]);
   
   $data=[                      
     'noOfoldSession'=>$noOfoldSession,
     'noOfnewSession'=>$noOfnewSession
     
   ];
   $this->view('MedInstr/MedInstrSession/v_medInstrSession',$data);
  }else{
    redirect('Login/login');  
  }

  }

  public function medInstrOldSession()
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
    $oldSession= $this->medInstrSessionModel->findOldSession($_SESSION["MedInstr_id"]);
   
   $data=[                      
     'oldSession'=>$oldSession,
     'search'=>''
     
   ];
   $this->view('MedInstr/MedInstrSession/MedInstrCompletedSession/v_medInstrCompletedSession',$data);

  }else{
    redirect('Login/login');  
  }
  }

  
  public function searchMedInstrOldSession()
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
    if($_SERVER['REQUEST_METHOD']=='GET'){
        $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
    
            $search=trim($_GET['search']);
            
            $oldSession= $this->medInstrSessionModel->searchOldSession($_SESSION["MedInstr_id"],$search);
   
            $data=[                      
              'oldSession'=>$oldSession,
              'search'=>$search
              
            ];
            $this->view('MedInstr/MedInstrSession/MedInstrCompletedSession/v_medInstrCompletedSession',$data);
              
        
       }else{
   
        $data=[                      
          'oldSession'=>'',
          'search'=>''
          
        ];
        $this->view('MedInstr/MedInstrSession/MedInstrCompletedSession/v_medInstrCompletedSession',$data);
        }
      }else{
        redirect('Login/login');  
      }
  }

  public function viewMoreMedInstrOldSession($session_id)
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
    $oldSession= $this->medInstrSessionModel->viewMoreSession($session_id);
   
   $data=[                      
     'oldSession'=>$oldSession
     
     
   ];
   $this->view('MedInstr/MedInstrSession/MedInstrCompletedSession/v_medInstrCompletedSessionViewMore',$data);

  }else{
    redirect('Login/login');  
  }
  }

  
  public function viewRegUsersMedInstrOldSession($session_id)
  {
    if(isset($_SESSION['MedInstr_id'])) {  
    
        $regUser= $this->medInstrSessionModel->viewRegUsersSession($session_id);
       
        if(isset($_POST['regusersSession'])){
          $_SESSION['medInstrsession_id'] = $_POST['regusersSession'];
        }

   $data=[                      
     'regUser'=>$regUser,
     'search'=>''
     
     
   ];
   $this->view('MedInstr/MedInstrSession/MedInstrCompletedSession/v_medInstrCompletedSessionRegUsers',$data);
  }else{
    redirect('Login/login');  
  }



  }

 
  public function searchMedInstrCompletedSessionRegUsers()
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
      
        $search=trim($_GET['search']);
        $regUser= $this->medInstrSessionModel->searchMedInstrSessionRegUsers($_SESSION['medInstrsession_id'],$search);
      
        $data=[                      
          'regUser'=>$regUser,
          'search'=>$search
          
        ];
        $this->view('MedInstr/MedInstrSession/MedInstrCompletedSession/v_medInstrCompletedSessionRegUsers',$data);
             
    
   }else{

    $data=[                      
      'regUser'=>'',
      'search'=>''
      
    ];
    $this->view('MedInstr/MedInstrSession/MedInstrCompletedSession/v_medInstrCompletedSessionRegUsers',$data);
    
    }
  }else{
    redirect('Login/login');  
  }
  }

// new


public function medInstrNewSession()
{
  if(isset($_SESSION['MedInstr_id'])) {  
  
  $newSession= $this->medInstrSessionModel->findNewSession($_SESSION["MedInstr_id"]);
 
  $data=[                      
    'newSession'=>$newSession,
    'search'=>''
  ];
  $this->view('MedInstr/MedInstrSession/MedInstrNewSession/v_medInstrNewSession',$data);
}else{
  redirect('Login/login');  
}

}


  public function searchMedInstrNewSession()
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
    if($_SERVER['REQUEST_METHOD']=='GET'){
        $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
    
            $search=trim($_GET['search']);
            
            $newSession= $this->medInstrSessionModel->searchNewSession($_SESSION["MedInstr_id"],$search);
   
            $data=[                      
              'newSession'=>$newSession,
              'search'=>$search
              
            ];
            $this->view('MedInstr/MedInstrSession/MedInstrNewSession/v_medInstrNewSession',$data);
              
        
       }else{
   
        $data=[                      
          'newSession'=>'',
          'search'=>''
          
        ];
        $this->view('MedInstr/MedInstrSession/MedInstrNewSession/v_medInstrNewSession',$data);
        }
      }else{
        redirect('Login/login');  
      }
  }

  public function viewMoreMedInstrNewSession($session_id)
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
    $newSession= $this->medInstrSessionModel->viewMoreSession($session_id);
   
   $data=[                      
     'newSession'=>$newSession
     
     
   ];
   $this->view('MedInstr/MedInstrSession/MedInstrNewSession/v_medInstrNewSessionViewMore',$data);
   if(isset($_POST['regusersSession'])){
    $_SESSION['medInstrsession_id'] = $_POST['regusersSession'];
   }

  }else{
    redirect('Login/login');  
  }
  }

  
  public function viewRegUsersMedInstrNewSession($session_id)
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
    $regUser= $this->medInstrSessionModel->viewRegUsersSession($session_id);
    
    if(isset($_POST['regusersSession'])){
      $_SESSION['medInstrsession_id'] = $_POST['regusersSession'];
    }


   $data=[                      
     'regUser'=>$regUser,
     'search'=>''
     
     
   ];
   $this->view('MedInstr/MedInstrSession/MedInstrNewSession/v_medInstrNewSessionRegUsers',$data);
  }else{
    redirect('Login/login');  
  }

  }

 
  public function searchMedInstrNewSessionRegUsers()
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
    if($_SERVER['REQUEST_METHOD']=='GET'){
    $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        $search=trim($_GET['search']);
        $regUser= $this->medInstrSessionModel->searchMedInstrSessionRegUsers($_SESSION['medInstrsession_id'],$search);
   
        $data=[                      
          'regUser'=>$regUser,
          'search'=>$search
          
        ];
        $this->view('MedInstr/MedInstrSession/MedInstrNewSession/v_medInstrNewSessionRegUsers',$data);
             
    
   }else{

    $data=[                      
      'regUser'=>'',
      'search'=>''
      
    ];
    $this->view('MedInstr/MedInstrSession/MedInstrNewSession/v_medInstrNewSessionRegUsers',$data);
    }
  }else{
    redirect('Login/login');  
  }
 
}



}

 ?>
