<?php

class AdminPayments extends Controller{
  private $adminPaymentsModel;
  
  public function __construct(){
    $this->adminPaymentsModel = $this->model('M_AdminPayments');
  }

  public function adminPayments()
  {
      if(isset($_SESSION['admin_id'])) {  
    
  //    $user= $this->userModel->findUserByID();
    $data=[                      
      'user'=>''
    ];
    $this->view('Admin/AdminPayments/v_adminPayments',$data);

    }else{
      redirect('Login/login');  
    }
  }

  
}

 ?>
