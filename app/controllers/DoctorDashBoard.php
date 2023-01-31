<?php

class DoctorDashBoard extends Controller{
  private $DoctorDashBoardModel;
    
  public function __construct(){
    $this->DoctorDashBoardModel = $this->model('M_DoctorDashBoard');
  }

  public function doctorDashBoard()
  {
    //if(isset($_SESSION['doctor_id'])) {  
   
//    $user= $this->userModel->findUserByID();
   $data=[                      
     'user'=>''
   ];
   $this->view('Doctor/v_doctorDashBoard',$data);

  //}else{
   // redirect('Login/login'); }  
  }

  
}

 ?>