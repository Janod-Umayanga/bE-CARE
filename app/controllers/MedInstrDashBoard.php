<?php

class MedInstrDashBoard extends Controller{
  public function __construct(){
    $this->medInstrDashBoardModel = $this->model('M_MedInstrDashBoard');
  }

  public function medInstrDashBoard()
  {
//    $user= $this->userModel->findUserByID();
   $data=[                      
     'user'=>''
   ];
   $this->view('MedInstrDashBoard/v_medInstrDashBoard',$data);


  }

  
}

 ?>
