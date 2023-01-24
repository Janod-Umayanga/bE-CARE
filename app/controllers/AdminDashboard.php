<?php

class AdminDashboard extends Controller{
  private $adminDashboardModel;
  public function __construct(){
    $this->adminDashboardModel = $this->model('M_AdminDashboard');
  }

  public function adminDashBoard()
  {
//    $user= $this->userModel->findUserByID();
  if(isset($_SESSION['admin_id'])) {  
  
   
   $data=[                      
     'user'=>''
   ];
   $this->view('AdminDashBoard/v_adminDashBoard',$data);

  }else{
    redirect('Admin/login');  
  }
  
  }

  
}

 ?>
