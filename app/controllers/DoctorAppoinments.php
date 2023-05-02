<?php

class DoctorAppoinments extends Controller{
  private $DoctorAppoinmentModel;
    
  public function __construct(){
    $this->DoctorAppoinmentModel = $this->model('M_DoctorAppoinments');
  }

  public function DoctorAppoinments() {

    if(isset($_SESSION['doctor_id'])) {
        // Get current date and time
        date_default_timezone_set("Asia/Kolkata");
        $currentDate = date("Y-m-d");
        $currentTime = date("H:i:s");
        // Show all doctor appointments
        $appoinments = $this->DoctorAppoinmentModel->getDoctorAppoinments($_SESSION['doctor_id']);
        $data = [
            'appoinments' => $appoinments,
            'currentDate' => $currentDate,
            'currentTime' => $currentTime
        ];

        // Load view
        $this->view('doctor/v_doctorAppoinments', $data);
    }
    else {
        $_SESSION['need_login'] = true;
        // Redirect to login
        redirect('Login/login');
    }
}

  
}

 ?>