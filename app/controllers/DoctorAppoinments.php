<?php

class DoctorAppoinments extends Controller{
  private $DoctorAppoinmentModel;
    
  public function __construct(){
    $this->$DoctorAppoinmentModel = $this->model('M_DoctorAppoinments');
  }

  public function DoctorAppoinments()
  {
    //if(isset($_SESSION['doctor_id'])) {  
   
//    $user= $this->userModel->findUserByID();
   $data=[                      
     'user'=>''
   ];
   $this->view('Doctor/v_doctorAppoinments',$data);

  //}else{
   // redirect('Login/login'); }  
  }

  
}

 ?>