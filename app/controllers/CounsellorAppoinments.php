<?php

class CounsellorAppoinments extends Controller{
  private $CounsellorAppoinmentModel;
    
  public function __construct(){
    $this->CounsellorAppoinmentModel = $this->model('M_CounsellorAppoinments');
  }

  public function CounsellorAppoinments() {
    if(isset($_SESSION['counsellor_id'])) {

        //get all Counsellor appoinments        
        $appoinments = $this->CounsellorAppoinmentModel->getCounsellorAppoinments($_SESSION['counsellor_id']);

        $data = [
            'appoinments' => $appoinments
        ];

        // Load view
        $this->view('counsellor/v_counsellorAppoinments', $data);
    }
    else {
        // Redirect to login
        redirect('Login/login');
    }
}

  
}

 ?>