<?php

class MedInstrChangeSessionDetails extends Controller{
  public function __construct(){
    $this->medInstrChangeSessionDetailsModel = $this->model('M_MedInstrChangeSessionDetails');
  }

  public function medInstrChangeSessionDetails()
  {
    $sessionDetail= $this->medInstrChangeSessionDetailsModel->getSessionDetails($_SESSION['MedInstr_id']);
   $data=[                      
     'sessionDetail'=> $sessionDetail,
     'search'=> ''
   ];
   $this->view('MedInstrChangeSessionDetails/v_MedInstrChangeSessionDetails',$data);


  }

  public function searchMedInstrChangeSessionDetails()
  {

   if($_SERVER['REQUEST_METHOD']=='GET'){
    $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        $search=trim($_GET['search']);
        $sessionDetail= $this->medInstrChangeSessionDetailsModel->searchSessionDetails($_SESSION['MedInstr_id'],$search);
       

        $data=[                      
          'sessionDetail'=> $sessionDetail,
          'search'=> $search
        ];
        $this->view('MedInstrChangeSessionDetails/v_MedInstrChangeSessionDetails',$data);
      
    
   }else{
        $data=[                      
          'sessionDetail'=>'',
          'search'=>''
        ];
        $this->view('MedInstrChangeSessionDetails/v_MedInstrChangeSessionDetails',$data);
    }

  }


  public function  medInstrDeleteSessionDetails($sessionId)
  {
    $deletesession= $this->medInstrChangeSessionDetailsModel->deleteSession($sessionId);
    $sessionDetail= $this->medInstrChangeSessionDetailsModel->getSessionDetails($_SESSION['MedInstr_id']);
    
    $data=[                      
     'sessionDetail'=> $sessionDetail,
     'search'=> ''
    ];

    if($deletesession==true){
        $this->view('MedInstrChangeSessionDetails/v_MedInstrChangeSessionDetails',$data);
    }

   

  }
  
  public function  newMedInstrSession()
  {
    $data=[                      
       ];
   
         $this->view('MedInstrChangeSessionDetails/v_medInstrAddNewSession',$data);
   }

   

 
  

  public function  addNewMedInstrSession()
  {
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
  
        $data = [
          'title'=>trim($_POST['title']),
          'date'=>trim($_POST['date']),      
          'starting_time'=>trim($_POST['starting_time']),
          'ending_time'=>trim($_POST['ending_time']),      
          'fee'=>trim($_POST['fee']),
          'address'=>trim($_POST['address']),      
          'description'=>trim($_POST['description']),      
        

          
          'title_err'=>'',
          'address_err'=>''
         ];      
         
        if(empty($data['title'])){
          $data['title_err']='Please select a title';
        }

        if(empty($data['addres'])){
           $data['addres_err']='Please enter a addres';
        } 
        
        
        if(empty($data['title_err']) && empty($data['address_err'])){
 
            $addnewSession=$this->medInstrChangeSessionDetailsModel->medInstraddNewSession($_SESSION['MedInstr_id'],$data);

         if($addnewSession){
            redirect('MedInstrChangeSessionDetails/medInstrChangeSessionDetails');       
             
           }
           else{
            $this->view('MedInstrChangeSessionDetails/v_medInstrAddNewSession',$data);    
           }   
        }else{
            $this->view('MedInstrChangeSessionDetails/v_medInstrAddNewSession',$data);    
        } 
      }else{

      $data = [
        'title'=>'',
        'date'=>'',      
        'starting_time'=>'',
        'ending_time'=>'',      
        'fee'=>'',
        'address'=>'',      
        'description'=>'',      
      

        
        'title_err'=>'',
        'address_err'=>''
    
      ];
       $this->view('MedInstrChangeSessionDetails/v_medInstrChangeSessionDetails',$data);     
    } 
 
 }

  
    public function  medInstrviewSessionDetails($sessionId)
    {
    $sessionDetail= $this->medInstrChangeSessionDetailsModel->viewSession($sessionId);
    $_SESSION['Med_SESSION_ID']=$sessionId;

    $data=[                      
    'title'=>$sessionDetail->title,
    'date'=>$sessionDetail->date,      
    'starting_time'=>$sessionDetail->starting_time,
    'ending_time'=>$sessionDetail->ending_time,       
    'fee'=>$sessionDetail->fee,
    'address'=>$sessionDetail->address,      
    'description'=>$sessionDetail->description,      
    'session_id'=>$_SESSION['Med_SESSION_ID']         
    
    ];

      $this->view('MedInstrChangeSessionDetails/v_medInstrUpdateSessionDetails',$data);
    
    

    }

    public function  medInstrupdateSessionDetails($sessionId)
    {
        if($_SERVER["REQUEST_METHOD"] == 'POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
      
            $data = [
              'title'=>trim($_POST['title']),
              'date'=>trim($_POST['date']),      
              'starting_time'=>trim($_POST['starting_time']),
              'ending_time'=>trim($_POST['ending_time']),      
              'fee'=>trim($_POST['fee']),
              'address'=>trim($_POST['address']),      
              'description'=>trim($_POST['description']),      
              'session_id'=>$_SESSION['Med_SESSION_ID'],
    
              
              'title_err'=>'',
              'address_err'=>''
             ];      
             
            if(empty($data['title'])){
              $data['title_err']='Please select a title';
            }
    
            if(empty($data['addres'])){
               $data['addres_err']='Please enter a addres';
            } 
            
            
            if(empty($data['title_err']) && empty($data['address_err'])){
     
                $updateSession=$this->medInstrChangeSessionDetailsModel->medInstrupdateSession($_SESSION['MedInstr_id'],$sessionId,$data);
    
               if($updateSession){
                  $this->view('MedInstrChangeSessionDetails/v_medInstrUpdateSessionDetails',$data);    
                   
               }
               else{
                   $this->view('MedInstrChangeSessionDetails/v_medInstrUpdateSessionDetails',$data);    
                }   
            }else{
                $this->view('MedInstrChangeSessionDetails/v_medInstrUpdateSessionDetails',$data);    
            } 
          }else{
    
          $data = [
            'title'=>'',
            'date'=>'',      
            'starting_time'=>'',
            'ending_time'=>'',      
            'fee'=>'',
            'address'=>'',      
            'description'=>'',      
          
    
            
            'title_err'=>'',
            'address_err'=>''
        
          ];
           $this->view('MedInstrChangeSessionDetails/v_medInstrChangeSessionDetails',$data);     
        } 
    
    

    }
   

  }

 ?>
