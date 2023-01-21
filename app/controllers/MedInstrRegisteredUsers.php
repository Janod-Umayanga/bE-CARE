<?php

class MedInstrRegisteredUsers extends Controller{
  public function __construct(){
    $this->medInstrRegisteredUsersModel = $this->model('M_MedInstrRegisteredUsers');
  }

  public function medInstrRegisteredUsers()
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
    $monday= $this->medInstrRegisteredUsersModel->findRegUsersMonday($_SESSION['MedInstr_id']);
    $tuesday= $this->medInstrRegisteredUsersModel->findRegUsersTuesday($_SESSION['MedInstr_id']);
    $wednesday= $this->medInstrRegisteredUsersModel->findRegUsersWednesday($_SESSION['MedInstr_id']);
    $thursday= $this->medInstrRegisteredUsersModel->findRegUsersThursday($_SESSION['MedInstr_id']);
    $friday= $this->medInstrRegisteredUsersModel->findRegUsersFriday($_SESSION['MedInstr_id']);
    $saturday= $this->medInstrRegisteredUsersModel->findRegUsersSaturday($_SESSION['MedInstr_id']);
    $sunday= $this->medInstrRegisteredUsersModel->findRegUsersSunday($_SESSION['MedInstr_id']);
   
  $data=[                      
     'monday'=>$monday,
     'tuesday'=>$tuesday,
     'wednesday'=>$wednesday,
     'thursday'=>$thursday,
     'friday'=>$friday,
     'saturday'=>$saturday,
     'sunday'=>$sunday

   ];
   $this->view('MedInstrRegisteredUsers/v_medInstrRegisteredUsers',$data);
  }else{
    redirect('MedInstr/login');  
  }

  }

  
  public function mondayRegisteredUsers()
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
    $monday= $this->medInstrRegisteredUsersModel->findAllRegUsersMonday($_SESSION['MedInstr_id']);
    $medChannel= $this->medInstrRegisteredUsersModel->findmedChannelDetails();
    $data=[                      
     'monday'=>$monday,
     'medChannel'=>$medChannel,
     'search'=>''
   ];
   $this->view('MedInstrRegisteredUsers/Monday/v_medInstrRegisteredUsersMonday',$data);

  }else{
    redirect('MedInstr/login');  
  }
  }
  
  public function tuesdayRegisteredUsers()
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
    $tuesday= $this->medInstrRegisteredUsersModel->findAllRegUsersTuesday($_SESSION['MedInstr_id']);
    $medChannel= $this->medInstrRegisteredUsersModel->findmedChannelDetails();
    $data=[                      
     'tuesday'=>$tuesday,
     'medChannel'=>$medChannel,
     'search'=>''
   ];
   $this->view('MedInstrRegisteredUsers/Tuesday/v_medInstrRegisteredUsersTuesday',$data);
  }else{
    redirect('MedInstr/login');  
  }

  }

  public function wednesdayRegisteredUsers()
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
    $wednesday= $this->medInstrRegisteredUsersModel->findAllRegUsersWednesday($_SESSION['MedInstr_id']);
    $medChannel= $this->medInstrRegisteredUsersModel->findmedChannelDetails();
    $data=[                      
     'wednesday'=>$wednesday,
     'medChannel'=>$medChannel,
     'search'=>''
   ];
   $this->view('MedInstrRegisteredUsers/Wednesday/v_medInstrRegisteredUsersWednesday',$data);
  }else{
    redirect('MedInstr/login');  
  }

  }


  public function thursdayRegisteredUsers()
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
    $thursday= $this->medInstrRegisteredUsersModel->findAllRegUsersThursday($_SESSION['MedInstr_id']);
    $medChannel= $this->medInstrRegisteredUsersModel->findmedChannelDetails();
    $data=[                      
     'thursday'=>$thursday,
     'medChannel'=>$medChannel,
     'search'=>''
   ];
   $this->view('MedInstrRegisteredUsers/Thursday/v_medInstrRegisteredUsersThursday',$data);

  }else{
    redirect('MedInstr/login');  
  }
  }

  public function fridayRegisteredUsers()
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
    $friday= $this->medInstrRegisteredUsersModel->findAllRegUsersFriday($_SESSION['MedInstr_id']);
    $medChannel= $this->medInstrRegisteredUsersModel->findmedChannelDetails();
    $data=[                      
     'friday'=>$friday,
     'medChannel'=>$medChannel,
     'search'=>''
   ];
   $this->view('MedInstrRegisteredUsers/Friday/v_medInstrRegisteredUsersFriday',$data);
  }else{
    redirect('MedInstr/login');  
  }

  }

  public function saturdayRegisteredUsers()
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
    $saturday= $this->medInstrRegisteredUsersModel->findAllRegUsersSaturday($_SESSION['MedInstr_id']);
    $medChannel= $this->medInstrRegisteredUsersModel->findmedChannelDetails();
    $data=[                      
     'saturday'=>$saturday,
     'medChannel'=>$medChannel,
     'search'=>''
   ];
   $this->view('MedInstrRegisteredUsers/Saturday/v_medInstrRegisteredUsersSaturday',$data);

  }else{
    redirect('MedInstr/login');  
  }
  }


  public function sundayRegisteredUsers()
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
    $sunday= $this->medInstrRegisteredUsersModel->findAllRegUsersSunday($_SESSION['MedInstr_id']);
    $medChannel= $this->medInstrRegisteredUsersModel->findmedChannelDetails();
    $data=[                      
     'sunday'=>$sunday,
     'medChannel'=>$medChannel,
     'search'=>''
   ];
   $this->view('MedInstrRegisteredUsers/Sunday/v_medInstrRegisteredUsersSunday',$data);
  }else{
    redirect('MedInstr/login');  
  }

  }

  public function  searchMedInstrRegisteredUsersMonday()
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
  
          $search=trim($_GET['search']);
          
          $monday= $this->medInstrRegisteredUsersModel->searchAllRegUsersMonday($search,$_SESSION['MedInstr_id']);
          $medChannel= $this->medInstrRegisteredUsersModel->findmedChannelDetails();
          $data=[                      
           'monday'=>$monday,
           'medChannel'=>$medChannel,
           'search'=>$search
         ];
         $this->view('MedInstrRegisteredUsers/Monday/v_medInstrRegisteredUsersMonday',$data);
      
      
     }else{
          $data=[                      
            'monday'=>'',
            'medChannel'=>'',
            'search'=>''
          ];
          $this->view('MedInstrRegisteredUsers/Monday/v_medInstrRegisteredUsersMonday',$data);
  }
}else{
  redirect('MedInstr/login');  
}
  }


  public function  searchMedInstrRegisteredUsersTuesday()
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
  
          $search=trim($_GET['search']);
          
          $tuesday= $this->medInstrRegisteredUsersModel->searchAllRegUsersTuesday($search,$_SESSION['MedInstr_id']);
          $medChannel= $this->medInstrRegisteredUsersModel->findmedChannelDetails();
          $data=[                      
           'tuesday'=>$tuesday,
           'medChannel'=>$medChannel,
           'search'=>$search
         ];
         $this->view('MedInstrRegisteredUsers/Tuesday/v_medInstrRegisteredUsersTuesday',$data);
      
      
     }else{
          $data=[                      
            'tuesday'=>'',
            'medChannel'=>'',
            'search'=>''
          ];
          $this->view('MedInstrRegisteredUsers/Tuesday/v_medInstrRegisteredUsersTuesday',$data);
  }
}else{
  redirect('MedInstr/login');  
} 
  }

  public function  searchMedInstrRegisteredUsersWedneasday()
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
  
          $search=trim($_GET['search']);
          
          $wedneasday= $this->medInstrRegisteredUsersModel->searchAllRegUsersWedneasday($search,$_SESSION['MedInstr_id']);
          $medChannel= $this->medInstrRegisteredUsersModel->findmedChannelDetails();
          $data=[                      
           'wedneasday'=>$wedneasday,
           'medChannel'=>$medChannel,
           'search'=>$search
         ];
         $this->view('MedInstrRegisteredUsers/Wedneasday/v_medInstrRegisteredUsersWedneasday',$data);
      
      
     }else{
          $data=[                      
            'wedneasday'=>'',
            'medChannel'=>'',
            'search'=>''
          ];
          $this->view('MedInstrRegisteredUsers/Wedneasday/v_medInstrRegisteredUsersWedneasday',$data);
  }
}else{
  redirect('MedInstr/login');  
} 
  }

  public function  searchMedInstrRegisteredUsersThursday()
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
  
          $search=trim($_GET['search']);
          
          $thursday= $this->medInstrRegisteredUsersModel->searchAllRegUsersThursday($search,$_SESSION['MedInstr_id']);
          $medChannel= $this->medInstrRegisteredUsersModel->findmedChannelDetails();
          $data=[                      
           'thursday'=>$thursday,
           'medChannel'=>$medChannel,
           'search'=>$search
         ];
         $this->view('MedInstrRegisteredUsers/Thursday/v_medInstrRegisteredUsersThursday',$data);
      
      
     }else{
          $data=[                      
            'thursday'=>'',
            'medChannel'=>'',
            'search'=>''
          ];
          $this->view('MedInstrRegisteredUsers/Thursday/v_medInstrRegisteredUsersThursday',$data);
  }
}else{
  redirect('MedInstr/login');  
} 
  }

  public function  searchMedInstrRegisteredUsersFriday()
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
  
          $search=trim($_GET['search']);
          
          $friday= $this->medInstrRegisteredUsersModel->searchAllRegUsersFriday($search,$_SESSION['MedInstr_id']);
          $medChannel= $this->medInstrRegisteredUsersModel->findmedChannelDetails();
          $data=[                      
           'friday'=>$friday,
           'medChannel'=>$medChannel,
           'search'=>$search
         ];
         $this->view('MedInstrRegisteredUsers/Friday/v_medInstrRegisteredUsersFriday',$data);
      
      
     }else{
          $data=[                      
            'friday'=>'',
            'medChannel'=>'',
            'search'=>''
          ];
          $this->view('MedInstrRegisteredUsers/Friday/v_medInstrRegisteredUsersFriday',$data);
  }
}else{
  redirect('MedInstr/login');  
} 
  }

  public function  searchMedInstrRegisteredUsersSaturday()
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
  
          $search=trim($_GET['search']);
          
          $saturday= $this->medInstrRegisteredUsersModel->searchAllRegUsersSaturday($search,$_SESSION['MedInstr_id']);
          $medChannel= $this->medInstrRegisteredUsersModel->findmedChannelDetails();
          $data=[                      
           'saturday'=>$saturday,
           'medChannel'=>$medChannel,
           'search'=>$search
         ];
         $this->view('MedInstrRegisteredUsers/Saturday/v_medInstrRegisteredUsersSaturday',$data);
      
      
     }else{
          $data=[                      
            'saturday'=>'',
            'medChannel'=>'',
            'search'=>''
          ];
          $this->view('MedInstrRegisteredUsers/Saturday/v_medInstrRegisteredUsersSaturday',$data);
  }
}else{
  redirect('MedInstr/login');  
} 
  }


  public function  searchMedInstrRegisteredUsersSunday()
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
  
          $search=trim($_GET['search']);
          
          $sunday= $this->medInstrRegisteredUserModels->searchAllRegUsersSunday($search,$_SESSION['MedInstr_id']);
          $medChannel= $this->medInstrRegisteredUsersModel->findmedChannelDetails();
          $data=[                      
           'sunday'=>$sunday,
           'medChannel'=>$medChannel,
           'search'=>$search
         ];
         $this->view('MedInstrRegisteredUsers/Sunday/v_medInstrRegisteredUsersSunday',$data);
      
      
     }else{
          $data=[                      
            'sunday'=>'',
            'medChannel'=>'',
            'search'=>''
          ];
          $this->view('MedInstrRegisteredUsers/Sunday/v_medInstrRegisteredUsersSunday',$data);
  }
}else{
  redirect('MedInstr/login');  
}  
  }

}

 ?>
