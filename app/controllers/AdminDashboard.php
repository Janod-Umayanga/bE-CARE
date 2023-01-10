<?php

class AdminDashboard extends Controller{
  public function __construct(){
    $this->adminDashboardModel = $this->model('M_AdminDashboard');
  }

  public function adminDashBoard()
  {
//    $user= $this->userModel->findUserByID();
   $data=[                      
     'user'=>''
   ];
   $this->view('AdminDashBoard/v_adminDashBoard',$data);


  }

  
}

 ?>
