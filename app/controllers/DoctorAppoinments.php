<?php

class DoctorAppoinments extends Controller{
  private $DoctorAppoinmentModel;
    
  public function __construct(){
    $this->DoctorAppoinmentModel = $this->model('M_DoctorAppoinments');
  }

  public function doctorAppoinments() {
    if(isset($_SESSION['doctor_id'])) {

        //get all doctor appoinments        
        $appoinments = $this->DoctorAppoinmentModel->getDoctorAppoinments($_SESSION['doctor_timeslot_id']);

        $data = [
            'appoinments' => $appoinments
        ];

        // Load view
        $this->view('doctor/v_doctorAppoinments', $data);
    }
    else {
        // Redirect to login
        redirect('Login/login');
    }
}

  
}

 ?>