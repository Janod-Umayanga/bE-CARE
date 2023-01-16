<?php

class MedInstrSession extends Controller{
  
    public function __construct(){
    $this->medInstrSessionModel = $this->model('M_MedInstrSession');
  }

  public function medInstrSession()
  {
   $noOfoldSession= $this->medInstrSessionModel->findNoOfOldSession($_SESSION["MedInstr_id"]);
   $noOfnewSession= $this->medInstrSessionModel->findNoOfNewSession($_SESSION["MedInstr_id"]);
   
   $data=[                      
     'noOfoldSession'=>$noOfoldSession,
     'noOfnewSession'=>$noOfnewSession
     
   ];
   $this->view('MedInstrSession/v_medInstrSession',$data);


  }

  public function medInstrOldSession()
  {
   $oldSession= $this->medInstrSessionModel->findOldSession($_SESSION["MedInstr_id"]);
   
   $data=[                      
     'oldSession'=>$oldSession,
     'search'=>''
     
   ];
   $this->view('MedInstrSession/MedInstrCompletedSession/v_medInstrCompletedSession',$data);


  }

  
  public function searchMedInstrOldSession()
  {
        if($_SERVER['REQUEST_METHOD']=='GET'){
        $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
    
            $search=trim($_GET['search']);
            
            $oldSession= $this->medInstrSessionModel->searchOldSession($_SESSION["MedInstr_id"],$search);
   
            $data=[                      
              'oldSession'=>$oldSession,
              'search'=>$search
              
            ];
            $this->view('MedInstrSession/MedInstrCompletedSession/v_medInstrCompletedSession',$data);
              
        
       }else{
   
        $data=[                      
          'oldSession'=>'',
          'search'=>''
          
        ];
        $this->view('MedInstrSession/MedInstrCompletedSession/v_medInstrCompletedSession',$data);
        }
  }

  public function viewMoreMedInstrOldSession($session_id)
  {
   $oldSession= $this->medInstrSessionModel->viewMoreSession($session_id);
   
   $data=[                      
     'oldSession'=>$oldSession
     
     
   ];
   $this->view('MedInstrSession/MedInstrCompletedSession/v_medInstrCompletedSessionViewMore',$data);


  }

  
  public function viewRegUsersMedInstrOldSession($session_id)
  {
   $regUser= $this->medInstrSessionModel->viewRegUsersSession($session_id);
   $_SESSION['session_id']=$session_id;
   $data=[                      
     'regUser'=>$regUser
     
     
   ];
   $this->view('MedInstrSession/MedInstrCompletedSession/v_medInstrCompletedSessionRegUsers',$data);


  }

 
  public function searchMedInstrCompletedSessionRegUsers()
  {
  if($_SERVER['REQUEST_METHOD']=='GET'){
    $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        $search=trim($_GET['search']);
        $regUser= $this->medInstrSessionModel->searchMedInstrSessionRegUsers($_SESSION['session_id'],$search);
   
        $data=[                      
          'regUser'=>$regUser,
          'search'=>$search
          
        ];
        $this->view('MedInstrSession/MedInstrCompletedSession/v_medInstrCompletedSessionRegUsers',$data);
             
    
   }else{

    $data=[                      
      'regUser'=>'',
      'search'=>''
      
    ];
    $this->view('MedInstrSession/MedInstrCompletedSession/v_medInstrCompletedSessionRegUsers',$data);
    }
  }

// new


public function medInstrNewSession()
{
  $newSession= $this->medInstrSessionModel->findNewSession($_SESSION["MedInstr_id"]);
 
  $data=[                      
    'newSession'=>$newSession,
    'search'=>''
  ];
  $this->view('MedInstrSession/MedInstrNewSession/v_medInstrNewSession',$data);


}


  public function searchMedInstrNewSession()
  {
        if($_SERVER['REQUEST_METHOD']=='GET'){
        $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
    
            $search=trim($_GET['search']);
            
            $newSession= $this->medInstrSessionModel->searchNewSession($_SESSION["MedInstr_id"],$search);
   
            $data=[                      
              'newSession'=>$newSession,
              'search'=>$search
              
            ];
            $this->view('MedInstrSession/MedInstrNewSession/v_medInstrNewSession',$data);
              
        
       }else{
   
        $data=[                      
          'newSession'=>'',
          'search'=>''
          
        ];
        $this->view('MedInstrSession/MedInstrNewSession/v_medInstrNewSession',$data);
        }
  }

  public function viewMoreMedInstrNewSession($session_id)
  {
   $newSession= $this->medInstrSessionModel->viewMoreSession($session_id);
   
   $data=[                      
     'newSession'=>$newSession
     
     
   ];
   $this->view('MedInstrSession/MedInstrNewSession/v_medInstrNewSessionViewMore',$data);


  }

  
  public function viewRegUsersMedInstrNewSession($session_id)
  {
   $regUser= $this->medInstrSessionModel->viewRegUsersSession($session_id);
   $_SESSION['session_id']=$session_id;
   $data=[                      
     'regUser'=>$regUser,
     'search'=>''
     
     
   ];
   $this->view('MedInstrSession/MedInstrNewSession/v_medInstrNewSessionRegUsers',$data);


  }

 
  public function searchMedInstrNewSessionRegUsers()
  {
  if($_SERVER['REQUEST_METHOD']=='GET'){
    $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        $search=trim($_GET['search']);
        $regUser= $this->medInstrSessionModel->searchMedInstrSessionRegUsers($_SESSION['session_id'],$search);
   
        $data=[                      
          'regUser'=>$regUser,
          'search'=>$search
          
        ];
        $this->view('MedInstrSession/MedInstrNewSession/v_medInstrNewSessionRegUsers',$data);
             
    
   }else{

    $data=[                      
      'regUser'=>'',
      'search'=>''
      
    ];
    $this->view('MedInstrSession/MedInstrNewSession/v_medInstrNewSessionRegUsers',$data);
    }
  }



}

 ?>
