<?php

class DoctorAppoinments extends Controller{
  private $DoctorAppoinmentModel;
  private $doctorTimeslotModel;
    
  public function __construct(){
    $this->DoctorAppoinmentModel = $this->model('M_DoctorAppoinments');
    $this->doctorTimeslotModel = $this->model('M_Doctor_Timeslot');
  }

  public function DoctorAppoinments() {

    if(isset($_SESSION['doctor_id'])) {
        // Get current date and time
        date_default_timezone_set("Asia/Kolkata");
        $currentDate = date("Y-m-d");
        $currentTime = date("H:i:s");

        $timeslots = $this->doctorTimeslotModel->getAllDoctorTimeslots($_SESSION['doctor_id']);
            
            // Check if all timeslots have 4 days or else need to add upto 4 days
            foreach($timeslots as $timeslot) {
                $channeling_days = $this->doctorTimeslotModel->getChannelingDays($timeslot->doctor_timeslot_id, $timeslot->doctor_id, $timeslot->channeling_day, $timeslot->starting_time);
                
            }

        // Show all doctor appointments
        $appoinments = $this->DoctorAppoinmentModel->getDoctorTimeslots($_SESSION['doctor_id']);
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

public function viewPatients($channel_day_id) {

  if(isset($_SESSION['doctor_id'])) {
      // Show all doctor appointments
      $patients = $this->DoctorAppoinmentModel->getRegisteredPatients($channel_day_id);
      $data = [
          'patients' => $patients
      ];

      // Load view
      $this->view('doctor/v_registered_patients', $data);
  }
  else {
      $_SESSION['need_login'] = true;
      // Redirect to login
      redirect('Login/login');
  }
}

  
}

 ?>