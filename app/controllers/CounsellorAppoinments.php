<?php

class CounsellorAppoinments extends Controller{
  private $CounsellorAppoinmentModel;
    
  public function __construct(){
    $this->CounsellorAppoinmentModel = $this->model('M_CounsellorAppoinments');
  }

  public function counsellorAppoinments() {

    if(isset($_SESSION['counsellor_id'])) {
        // Get current date and time
        date_default_timezone_set("Asia/Kolkata");
        $currentDate = date("Y-m-d");
        $currentTime = date("H:i:s");
        // Show all counsellor appointments
        $appoinments = $this->CounsellorAppoinmentModel->getcounsellorAppoinments($_SESSION['counsellor_id']);
        $data = [
            'appoinments' => $appoinments,
            'currentDate' => $currentDate,
            'currentTime' => $currentTime
        ];

        // Load view
        $this->view('counsellor/v_counsellorAppoinments', $data);
    }
    else {
        $_SESSION['need_login'] = true;
        // Redirect to login
        redirect('Login/login');
    }
}

  
}

 ?>