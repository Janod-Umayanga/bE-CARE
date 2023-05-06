<?php

class CounsellorAppoinments extends Controller{
  private $CounsellorAppoinmentModel;
  private $counsellorTimeslotModel;
    
  public function __construct(){
    $this->CounsellorAppoinmentModel = $this->model('M_CounsellorAppoinments');
    $this->counsellorTimeslotModel = $this->model('M_Counsellor_Timeslot');

  }

  public function counsellorAppoinments() {

    if(isset($_SESSION['counsellor_id'])) {
        // Get current date and time
        date_default_timezone_set("Asia/Kolkata");
        $currentDate = date("Y-m-d");
        $currentTime = date("H:i:s");

        $timeslots = $this->counsellorTimeslotModel->getAllCounsellorTimeslots($_SESSION['counsellor_id']);
            
            // Check if all timeslots have 4 days or else need to add upto 4 days
            foreach($timeslots as $timeslot) {
                $channeling_days = $this->counsellorTimeslotModel->getChannelingDays($timeslot->counsellor_timeslot_id, $timeslot->counsellor_id, $timeslot->channeling_day, $timeslot->starting_time);
                
            }
        // Show all counsellor appointments
        $appoinments = $this->CounsellorAppoinmentModel->getCounsellorTimeslots($_SESSION['counsellor_id']);
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

public function viewPatients($channel_day_id) {

  if(isset($_SESSION['counsellor_id'])) {
      // Show all counsellor appointments
      $patients = $this->CounsellorAppoinmentModel->getRegisteredPatients($channel_day_id);
      $data = [
          'patients' => $patients
      ];

      // Load view
      $this->view('counsellor/v_registered_patients', $data);
  }
  else {
      $_SESSION['need_login'] = true;
      // Redirect to login
      redirect('Login/login');
  }
}



public function viewPatientsHistory ($channel_day_id) {

  if(isset($_SESSION['counsellor_id'])) {
      // Show all counsellor appointments
      $patients = $this->CounsellorAppoinmentModel->getRegisteredPatientsHistory($channel_day_id);
      $data = [
          'patients' => $patients
      ];

      // Load view
      $this->view('counsellor/v_registered_patientsHistory', $data);
  }
  else {
      $_SESSION['need_login'] = true;
      // Redirect to login
      redirect('Login/login');
  }
}


public function AppoinmentsHistory() {

  if(isset($_SESSION['counsellor_id'])) {

     // Get current date and time
     date_default_timezone_set("Asia/Kolkata");
     $currentDate = date("Y-m-d");
     $currentTime = date("H:i:s");

      // Show all counsellor appointments
      $appoinments = $this->CounsellorAppoinmentModel->getCounsellorTimeslotsHistory($_SESSION['counsellor_id']); 
      $data = [
          'appoinments' => $appoinments,
          'currentDate' => $currentDate,
          'currentTime' => $currentTime
      ];

      // Load view
      $this->view('counsellor/v_counsellorAppoinmentsHistory', $data);
  }
  else {
      $_SESSION['need_login'] = true;
      // Redirect to login
      redirect('Login/login');
  }
}

  
}

 ?>