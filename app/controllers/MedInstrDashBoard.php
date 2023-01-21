<?php

class MedInstrDashBoard extends Controller{
  public function __construct(){
    $this->medInstrDashBoardModel = $this->model('M_MedInstrDashBoard');
  }

  public function medInstrDashBoard()
  {
    if(isset($_SESSION['MedInstr_id'])) {  
   
//    $user= $this->userModel->findUserByID();
   $data=[                      
     'user'=>''
   ];
   $this->view('MedInstrDashBoard/v_medInstrDashBoard',$data);

  }else{
    redirect('MedInstr/login');  
  }  
  }

  
}

 ?>
