<?php

class AdminDashboard extends Controller{
  private $adminDashboardModel;
  public function __construct(){
    $this->adminDashboardModel = $this->model('M_AdminDashboard');
  }

  //Admin DashBoard
  public function adminDashBoard()
  {

  if(isset($_SESSION['admin_id'])) {  
  
   $data=[                      
     'user'=>''
   ];
   $this->view('Admin/AdminDashBoard/v_adminDashBoard',$data);

  }else{
    redirect('Login/login');  
  }
  
  }

  
}

 ?>
