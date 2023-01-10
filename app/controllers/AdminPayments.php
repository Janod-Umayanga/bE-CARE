<?php

class AdminPayments extends Controller{
  public function __construct(){
    $this->adminPaymentsModel = $this->model('M_AdminPayments');
  }

  public function adminPayments()
  {
//    $user= $this->userModel->findUserByID();
   $data=[                      
     'user'=>''
   ];
   $this->view('AdminPayments/v_adminPayments',$data);


  }

  
}

 ?>
