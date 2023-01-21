<?php

class MedInstrRegisteredUsersHistory extends Controller{
  public function __construct(){
    $this->medInstrRegisteredUsersHistoryModel = $this->model('M_MedInstrRegisteredUsersHistory');
  }

  
  public function medInstrRegisteredUsersHistory()
  {
    if(isset($_SESSION['MedInstr_id'])) {  
   
    $medChannel= $this->medInstrRegisteredUsersHistoryModel->findmedInstrRegisteredUsersHistory($_SESSION['MedInstr_id']);

    $data=[                      
     
     'medChannel'=>$medChannel,
     'search'=>''
   ];
   $this->view('MedInstrRegisteredUsersHistory/v_medInstrRegisteredUsersHistory',$data);
  
  }else{
    redirect('MedInstr/login');  
  }

  }
  
 public function  searchMedInstrRegisteredUsersHistory()
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
  
          $search=trim($_GET['search']);
          
          $medChannel= $this->medInstrRegisteredUsersHistoryModel->searchmedInstrRegisteredUsersHistory($search,$_SESSION['MedInstr_id']);
          
          $data=[                      
           'medChannel'=>$medChannel,
           'search'=>$search
         ];
         $this->view('MedInstrRegisteredUsersHistory/v_medInstrRegisteredUsersHistory',$data);
      
      
     }else{
          $data=[                      
            'medChannel'=>'',
            'search'=>''
          ];
          $this->view('MedInstrRegisteredUsersHistory/v_medInstrRegisteredUsersHistory',$data);
  }
    
}else{
  redirect('MedInstr/login');  
}
  }



  public function viewMoreMedInstrRegisteredUsersHistory($med_timeslot_id)
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
    $medChannel= $this->medInstrRegisteredUsersHistoryModel->viewMoremedInstrRegisteredUserHistory($med_timeslot_id);

    $data=[                      
     
     'medChannel'=>$medChannel
     
   ];
   $this->view('MedInstrRegisteredUsersHistory/v_medInstrRegisteredUsersHistoryViewMore',$data);
  
  }else{
    redirect('MedInstr/login');  
  }

  }


}

 ?>
