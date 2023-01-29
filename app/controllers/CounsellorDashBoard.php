<?php

class CounsellorDashBoard extends Controller{
  private $DoctorDashBoardModel;
    
  public function __construct(){
    $this->DoctorDashBoardModel = $this->model('M_CounsellorDashBoard');
  }

  public function counsellorDashBoard()
  {
    if(isset($_SESSION['counsellor_id'])) {  
   
//    $user= $this->userModel->findUserByID();
   $data=[                      
     'user'=>''
   ];
   $this->view('Counsellor/v_CounsellorDashBoard',$data);

  }else{
   // redirect('Doctor/v_login');  
  }  
  }

  
}

 ?>