<?php

class CounsellorSession extends Controller{
    private $counsellorSessionModel;
 
    public function __construct(){
    $this->counsellorSessionModel = $this->model('M_CounsellorSession');
  }


// Counsellor  Session


  public function counsellorSession()
  {
    if(isset($_SESSION['counsellor_id'])) {  

   $noOfnewCounsellorSession= $this->counsellorSessionModel->findNoOfNewCounsellorSession($_SESSION["counsellor_id"]);
   $noOfoldCounsellorSession= $this->counsellorSessionModel->findNoOfOldCounsellorSession($_SESSION["counsellor_id"]);
   
   $data=[                      
     'noOfoldCounsellorSession'=>$noOfoldCounsellorSession,
     'noOfnewCounsellorSession'=>$noOfnewCounsellorSession
     ];
     
   $this->view('counsellor/v_counsellorSession',$data);
  }else{
    redirect('Login/login');  
  }

  }


// Counsellor New Session


public function counsellorNewSession()
{
  if(isset($_SESSION['counsellor_id'])) {  
  
  $counsellorNewSession= $this->counsellorSessionModel->findCounsellorNewSession($_SESSION["counsellor_id"]);
 
  $data=[                      
    'counsellorNewSession'=>$counsellorNewSession,
    'search'=>''
  ];
  $this->view('counsellor/v_counsellorNewSession',$data);
}else{
  redirect('Login/login');  
}

}


// Counsellor New Session View More


  public function viewMoreCounsellorNewSession($session_id)
  {
    if(isset($_SESSION['counsellor_id'])) {  
  
    $counsellorNewSession= $this->counsellorSessionModel->viewMoreCounsellorSession($session_id);
   
   $data=[                      
     'counsellorNewSession'=>$counsellorNewSession
     
     
   ];
   $this->view('counsellor/v_counsellorNewSessionViewMore',$data);
   if(isset($_POST['regusersSession'])){
    $_SESSION['counsellorsession_id'] = $_POST['regusersSession'];
   }

  }else{
    redirect('Login/login');  
  }
  }



// Counsellor New Session Registered Users

  
  public function viewRegUsersCounsellorNewSession($session_id)
  {
    if(isset($_SESSION['counsellor_id'])) {  
  
    $sessionRegUser= $this->counsellorSessionModel->viewRegUsersCounsellorSession($session_id);
    
    if(isset($_POST['regusersSession'])){
      $_SESSION['counsellorsession_id'] = $_POST['regusersSession'];
    }


   $data=[                      
     'sessionRegUser'=>$sessionRegUser,
     'search'=>''
     
     
   ];
   $this->view('counsellor/v_counsellorNewSessionRegUsers',$data);
  }else{
    redirect('Login/login');  
  }

  }

  // Counsellor New Session search

  public function searchCounsellorNewSession()
  {
    if(isset($_SESSION['counsellor_id'])) {  
  
    if($_SERVER['REQUEST_METHOD']=='GET'){
        $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
    
            $search=trim($_GET['search']);
            
            $counsellorNewSession= $this->counsellorSessionModel->searchCounsellorNewSession($_SESSION["counsellor_id"],$search);
   
            $data=[                      
              'counsellorNewSession'=>$counsellorNewSession,
              'search'=>$search
              
            ];
            $this->view('counsellor/v_counsellorNewSession',$data);
              
        
       }else{
   
        $data=[                      
          'counsellorNewSession'=>'',
          'search'=>''
          
        ];
        $this->view('counsellor/v_counsellorNewSession',$data);
        }
      }else{
        redirect('Login/login');  
      }
  }

  // Counsellor New Session Search Registered Users
 
  public function searchCounsellorNewSessionRegUsers()
  {
    if(isset($_SESSION['counsellor_id'])) {  
  
    if($_SERVER['REQUEST_METHOD']=='GET'){
    $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        $search=trim($_GET['search']);
        $sessionRegUser= $this->counsellorSessionModel->searchCounsellorSessionRegUsers($_SESSION['counsellorsession_id'],$search);
   
        $data=[                      
          'sessionRegUser'=>$sessionRegUser,
          'search'=>$search
          
        ];
        $this->view('counsellor/v_counsellorNewSessionRegUsers',$data);
             
    
   }else{

    $data=[                      
      'sessionregUser'=>'',
      'search'=>''
      
    ];
    $this->view('counsellor/v_counsellorNewSessionRegUsers',$data);
    }
  }else{
    redirect('Login/login');  
  }
 
}

// Counsellor Old Session 

public function counsellorOldSession()
{
  if(isset($_SESSION['counsellor_id'])) {  

  $counsellorOldSession= $this->counsellorSessionModel->findCounsellorOldSession($_SESSION["counsellor_id"]);
 
 $data=[                      
   'counsellorOldSession'=>$counsellorOldSession,
   'search'=>''
   
 ];
 $this->view('counsellor/v_counsellorCompletedSession',$data);

}else{
  redirect('Login/login');  
}
}

// Counsellor Old Session  View More


public function viewMoreCounsellorOldSession($session_id)
{
  if(isset($_SESSION['counsellor_id'])) {  

  $counsellorOldSession= $this->counsellorSessionModel->viewMoreCounsellorSession($session_id);
 
 $data=[                      
   'counsellorOldSession'=>$counsellorOldSession
   
   
 ];
 $this->view('counsellor/v_counsellorCompletedSessionViewMore',$data);

}else{
  redirect('Login/login');  
}
}

// Counsellor Old Session Reg users


public function viewRegUsersCounsellorOldSession($session_id)
{
  if(isset($_SESSION['counsellor_id'])) {  
  
      $sessionregUser= $this->counsellorSessionModel->viewRegUsersCounsellorSession($session_id);
     
      if(isset($_POST['regusersSession'])){
        $_SESSION['counsellorsession_id'] = $_POST['regusersSession'];
      }

 $data=[                      
   'sessionregUser'=>$sessionregUser,
   'search'=>''
   
   
 ];
 $this->view('counsellor/v_counsellorCompletedSessionRegUsers',$data);
}else{
  redirect('Login/login');  
}



}

// Counsellor Old Session Search


public function searchCounsellorOldSession()
{
  if(isset($_SESSION['counsellor_id'])) {  

  if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
  
          $search=trim($_GET['search']);
          
          $counsellorOldSession= $this->counsellorSessionModel->searchCounsellorOldSession($_SESSION["counsellor_id"],$search);
 
          $data=[                      
            'counsellorOldSession'=>$counsellorOldSession,
            'search'=>$search
            
          ];
          $this->view('counsellor/v_counsellorCompletedSession',$data);
            
      
     }else{
 
      $data=[                      
        'counsellorOldSession'=>'',
        'search'=>''
        
      ];
      $this->view('counsellor/v_counsellorCompletedSession',$data);
      }
    }else{
      redirect('Login/login');  
    }
}

// Counsellor Old Session Regusers search 


public function searchcounsellorCompletedSessionRegUsers()
{
  if(isset($_SESSION['counsellor_id'])) {  

  if($_SERVER['REQUEST_METHOD']=='GET'){
    $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
    
      $search=trim($_GET['search']);
      $sessionregUser= $this->counsellorSessionModel->searchCounsellorSessionRegUsers($_SESSION['counsellorsession_id'],$search);
    
      $data=[                      
        'sessionregUser'=>$sessionregUser,
        'search'=>$search
        
      ];
      $this->view('counsellor/v_counsellorCompletedSessionRegUsers',$data);
           
  
 }else{

  $data=[                      
    'sessionregUser'=>'',
    'search'=>''
    
  ];
  $this->view('counsellor/v_counsellorCompletedSessionRegUsers',$data);
  
  }
}else{
  redirect('Login/login');  
}
}



}

 ?>
