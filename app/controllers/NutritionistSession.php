<?php

class NutritionistSession extends Controller{
    private $nutritionistSessionModel;
 
    public function __construct(){
    $this->nutritionistSessionModel = $this->model('M_NutritionistSession');
  }


// Nutritionist  Session


  public function nutritionistSession()
  {
    if(isset($_SESSION['nutritionist_id'])) {  

   $noOfnewNutritionistSession= $this->nutritionistSessionModel->findNoOfNewNutritionistSession($_SESSION["nutritionist_id"]);
   $noOfoldNutritionistSession= $this->nutritionistSessionModel->findNoOfOldNutritionistSession($_SESSION["nutritionist_id"]);
   
   $data=[                      
     'noOfoldNutritionistSession'=>$noOfoldNutritionistSession,
     'noOfnewNutritionistSession'=>$noOfnewNutritionistSession
     
   ];
   $this->view('Nutritionist/v_nutritionistSession',$data);
  }else{
    redirect('Login/login');  
  }

  }


// Nutritionist New Session


public function nutritionistNewSession()
{
  if(isset($_SESSION['nutritionist_id'])) {  
  
  $nutritionistNewSession= $this->nutritionistSessionModel->findNutritionistNewSession($_SESSION["nutritionist_id"]);
 
  $data=[                      
    'nutritionistNewSession'=>$nutritionistNewSession,
    'search'=>''
  ];
  $this->view('Nutritionist/v_nutritionistNewSession',$data);
}else{
  redirect('Login/login');  
}

}


// Nutritionist New Session View More


  public function viewMoreNutritionistNewSession($session_id)
  {
    if(isset($_SESSION['nutritionist_id'])) {  
  
    $nutritionistNewSession= $this->nutritionistSessionModel->viewMoreNutritionistSession($session_id);
   
   $data=[                      
     'nutritionistNewSession'=>$nutritionistNewSession
     
     
   ];
   $this->view('nutritionist/v_nutritionistNewSessionViewMore',$data);
   if(isset($_POST['regusersSession'])){
    $_SESSION['Nutritionistsession_id'] = $_POST['regusersSession'];
   }

  }else{
    redirect('Login/login');  
  }
  }



// Nutritionist New Session Registered Users

  
  public function viewRegUsersNutritionistNewSession($session_id)
  {
    if(isset($_SESSION['nutritionist_id'])) {  
  
    $sessionRegUser= $this->nutritionistSessionModel->viewRegUsersNutritionistSession($session_id);
    
    if(isset($_POST['regusersSession'])){
      $_SESSION['nutritionistsession_id'] = $_POST['regusersSession'];
    }


   $data=[                      
     'sessionRegUser'=>$sessionRegUser,
     'search'=>''
     
     
   ];
   $this->view('Nutritionist/v_nutritionistNewSessionRegUsers',$data);
  }else{
    redirect('Login/login');  
  }

  }

  // Nutritionist New Session search

  public function searchNutritionistNewSession()
  {
    if(isset($_SESSION['nutritionist_id'])) {  
  
    if($_SERVER['REQUEST_METHOD']=='GET'){
        $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
    
            $search=trim($_GET['search']);
            
            $nutritionistNewSession= $this->nutritionistSessionModel->searchNutritionistNewSession($_SESSION["nutritionist_id"],$search);
   
            $data=[                      
              'nutritionistNewSession'=>$nutritionistNewSession,
              'search'=>$search
              
            ];
            $this->view('Nutritionist/v_nutritionistNewSession',$data);
              
        
       }else{
   
        $data=[                      
          'nutritionistNewSession'=>'',
          'search'=>''
          
        ];
        $this->view('Nutritionist/v_nutritionistNewSession',$data);
        }
      }else{
        redirect('Login/login');  
      }
  }

  // Nutritionist New Session Search Registered Users
 
  public function searchNutritionistNewSessionRegUsers()
  {
    if(isset($_SESSION['nutritionist_id'])) {  
  
    if($_SERVER['REQUEST_METHOD']=='GET'){
    $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        $search=trim($_GET['search']);
        $sessionRegUser= $this->nutritionistSessionModel->searchNutritionistSessionRegUsers($_SESSION['nutritionistsession_id'],$search);
   
        $data=[                      
          'sessionRegUser'=>$sessionRegUser,
          'search'=>$search
          
        ];
        $this->view('Nutritionist/v_nutritionistNewSessionRegUsers',$data);
             
    
   }else{

    $data=[                      
      'sessionregUser'=>'',
      'search'=>''
      
    ];
    $this->view('Nutritionist/v_nutritionistNewSessionRegUsers',$data);
    }
  }else{
    redirect('Login/login');  
  }
 
}

// Nutritionist Old Session 

public function nutritionistOldSession()
{
  if(isset($_SESSION['nutritionist_id'])) {  

  $nutritionistOldSession= $this->nutritionistSessionModel->findNutritionistOldSession($_SESSION["nutritionist_id"]);
 
 $data=[                      
   'nutritionistOldSession'=>$nutritionistOldSession,
   'search'=>''
   
 ];
 $this->view('Nutritionist/v_nutritionistCompletedSession',$data);

}else{
  redirect('Login/login');  
}
}

// Nutritionist Old Session  View More


public function viewMoreNutritionistOldSession($session_id)
{
  if(isset($_SESSION['nutritionist_id'])) {  

  $nutritionistOldSession= $this->nutritionistSessionModel->viewMoreNutritionistSession($session_id);
 
 $data=[                      
   'nutritionistOldSession'=>$nutritionistOldSession
   
   
 ];
 $this->view('Nutritionist/v_nutritionistCompletedSessionViewMore',$data);

}else{
  redirect('Login/login');  
}
}

// Nutritionist Old Session Reg users


public function viewRegUsersNutritionistOldSession($session_id)
{
  if(isset($_SESSION['nutritionist_id'])) {  
  
      $sessionregUser= $this->nutritionistSessionModel->viewRegUsersNutritionistSession($session_id);
     
      if(isset($_POST['regusersSession'])){
        $_SESSION['nutritionistsession_id'] = $_POST['regusersSession'];
      }

 $data=[                      
   'sessionregUser'=>$sessionregUser,
   'search'=>''
   
   
 ];
 $this->view('Nutritionist/v_nutritionistCompletedSessionRegUsers',$data);
}else{
  redirect('Login/login');  
}



}

// Nutritionist Old Session Search


public function searchNutritionistOldSession()
{
  if(isset($_SESSION['nutritionist_id'])) {  

  if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
  
          $search=trim($_GET['search']);
          
          $nutritionistOldSession= $this->nutritionistSessionModel->searchNutritionistOldSession($_SESSION["nutritionist_id"],$search);
 
          $data=[                      
            'nutritionistOldSession'=>$nutritionistOldSession,
            'search'=>$search
            
          ];
          $this->view('Nutritionist/v_nutritionistCompletedSession',$data);
            
      
     }else{
 
      $data=[                      
        'nutritionistOldSession'=>'',
        'search'=>''
        
      ];
      $this->view('Nutritionist/v_nutritionistCompletedSession',$data);
      }
    }else{
      redirect('Login/login');  
    }
}

// Nutritionist Old Session Regusers search 


public function searchnutritionistCompletedSessionRegUsers()
{
  if(isset($_SESSION['nutritionist_id'])) {  

  if($_SERVER['REQUEST_METHOD']=='GET'){
    $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
    
      $search=trim($_GET['search']);
      $sessionregUser= $this->nutritionistSessionModel->searchNutritionistSessionRegUsers($_SESSION['nutritionistsession_id'],$search);
    
      $data=[                      
        'sessionregUser'=>$sessionregUser,
        'search'=>$search
        
      ];
      $this->view('Nutritionist/v_nutritionistCompletedSessionRegUsers',$data);
           
  
 }else{

  $data=[                      
    'sessionregUser'=>'',
    'search'=>''
    
  ];
  $this->view('Nutritionist/v_nutritionistCompletedSessionRegUsers',$data);
  
  }
}else{
  redirect('Login/login');  
}
}



}

 ?>
