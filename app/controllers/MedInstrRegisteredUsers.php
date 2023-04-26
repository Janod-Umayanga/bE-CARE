<?php

class MedInstrRegisteredUsers extends Controller{
  private $medInstrRegisteredUsersModel;
 
  public function __construct(){
    $this->medInstrRegisteredUsersModel = $this->model('M_MedInstrRegisteredUsers');
  }

  //Med Instr RegisteredUsers
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
   $this->view('MedInstr/MedInstrRegisteredUsers/v_medInstrRegisteredUsers',$data);
  }else{
    redirect('Login/login');  
  }

  }

  //Monday Registered Users
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
   $this->view('MedInstr/MedInstrRegisteredUsers/Monday/v_medInstrRegisteredUsersMonday',$data);

  }else{
    redirect('Login/login');  
  }
  }
  
  //Tuesday Registered Users
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
   $this->view('MedInstr/MedInstrRegisteredUsers/Tuesday/v_medInstrRegisteredUsersTuesday',$data);
  }else{
    redirect('Login/login');  
  }

  }

  //Wednesday Registered Users
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
   $this->view('MedInstr/MedInstrRegisteredUsers/Wednesday/v_medInstrRegisteredUsersWednesday',$data);
  }else{
    redirect('Login/login');  
  }

  }

 //Thursday Registered Users
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
   $this->view('MedInstr/MedInstrRegisteredUsers/Thursday/v_medInstrRegisteredUsersThursday',$data);

  }else{
    redirect('Login/login');  
  }
  }

  //Friday Registered Users
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
   $this->view('MedInstr/MedInstrRegisteredUsers/Friday/v_medInstrRegisteredUsersFriday',$data);
  }else{
    redirect('Login/login');  
  }

 }

 //Saturday Registered Users
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
   $this->view('MedInstr/MedInstrRegisteredUsers/Saturday/v_medInstrRegisteredUsersSaturday',$data);

  }else{
    redirect('Login/login');  
  }
  }

 //Sunday Registered Users
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
   $this->view('MedInstr/MedInstrRegisteredUsers/Sunday/v_medInstrRegisteredUsersSunday',$data);
  }else{
    redirect('Login/login');  
  }

  }

  //Search MedInstr RegisteredUsers Monday
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
         $this->view('MedInstr/MedInstrRegisteredUsers/Monday/v_medInstrRegisteredUsersMonday',$data);
      
      
     }else{
          $data=[                      
            'monday'=>'',
            'medChannel'=>'',
            'search'=>''
          ];
          $this->view('MedInstr/MedInstrRegisteredUsers/Monday/v_medInstrRegisteredUsersMonday',$data);
  }
}else{
  redirect('Login/login');  
}
  }

 //Search MedInstr RegisteredUsers Tuesday
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
         $this->view('MedInstr/MedInstrRegisteredUsers/Tuesday/v_medInstrRegisteredUsersTuesday',$data);
      
      
     }else{
          $data=[                      
            'tuesday'=>'',
            'medChannel'=>'',
            'search'=>''
          ];
          $this->view('MedInstr/MedInstrRegisteredUsers/Tuesday/v_medInstrRegisteredUsersTuesday',$data);
  }
}else{
  redirect('Login/login');  
} 
  }

  //Search MedInstr RegisteredUsers Wednesday
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
         $this->view('MedInstr/MedInstrRegisteredUsers/Wedneasday/v_medInstrRegisteredUsersWedneasday',$data);
      
      
     }else{
          $data=[                      
            'wedneasday'=>'',
            'medChannel'=>'',
            'search'=>''
          ];
          $this->view('MedInstr/MedInstrRegisteredUsers/Wedneasday/v_medInstrRegisteredUsersWedneasday',$data);
  }
}else{
  redirect('Login/login');  
} 
  }

  //search MedInstr RegisteredUsers Thursday
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
         $this->view('MedInstr/MedInstrRegisteredUsers/Thursday/v_medInstrRegisteredUsersThursday',$data);
      
      
     }else{
          $data=[                      
            'thursday'=>'',
            'medChannel'=>'',
            'search'=>''
          ];
          $this->view('MedInstr/MedInstrRegisteredUsers/Thursday/v_medInstrRegisteredUsersThursday',$data);
  }
}else{
  redirect('Login/login');  
} 
  }

  //search MedInstr RegisteredUsers Friday
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
         $this->view('MedInstr/MedInstrRegisteredUsers/Friday/v_medInstrRegisteredUsersFriday',$data);
      
      
     }else{
          $data=[                      
            'friday'=>'',
            'medChannel'=>'',
            'search'=>''
          ];
          $this->view('MedInstr/MedInstrRegisteredUsers/Friday/v_medInstrRegisteredUsersFriday',$data);
  }
}else{
  redirect('Login/login');  
} 
  }

  //search MedInstr RegisteredUsers Saturday
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
         $this->view('MedInstr/MedInstrRegisteredUsers/Saturday/v_medInstrRegisteredUsersSaturday',$data);
      
      
     }else{
          $data=[                      
            'saturday'=>'',
            'medChannel'=>'',
            'search'=>''
          ];
          $this->view('MedInstr/MedInstrRegisteredUsers/Saturday/v_medInstrRegisteredUsersSaturday',$data);
  }
}else{
  redirect('Login/login');  
} 
  }

  //search MedInstr RegisteredUsers Sunday
  public function  searchMedInstrRegisteredUsersSunday()
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
  
          $search=trim($_GET['search']);
          
          $sunday= $this->medInstrRegisteredUsersModel->searchAllRegUsersSunday($search,$_SESSION['MedInstr_id']);
          $medChannel= $this->medInstrRegisteredUsersModel->findmedChannelDetails();
          $data=[                      
           'sunday'=>$sunday,
           'medChannel'=>$medChannel,
           'search'=>$search
         ];
         $this->view('MedInstr/MedInstrRegisteredUsers/Sunday/v_medInstrRegisteredUsersSunday',$data);
      
      
     }else{
          $data=[                      
            'sunday'=>'',
            'medChannel'=>'',
            'search'=>''
          ];
          $this->view('MedInstr/MedInstrRegisteredUsers/Sunday/v_medInstrRegisteredUsersSunday',$data);
  }
}else{
  redirect('Login/login');  
}  
  }

}

 ?>
