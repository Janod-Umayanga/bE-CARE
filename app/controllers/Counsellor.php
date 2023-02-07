<?php

    class Counsellor  extends Controller{
        private $counsellorModel;
        private $counsellorTimeslotModel;
        
        public function __construct() {
            $this->counsellorModel = $this->model('M_counsellor');
            $this->counsellorTimeslotModel = $this->model('M_counsellor_Timeslot');
        }

        public function dashboard() {
            $data = [];

           if(isset($_SESSION['counsellor_id'])){
                // Load view
                $this->view('counsellor/v_dashboard');
         }
            else{
             redirect('Login/login');
         }
            
        }

        public function timeslots() {
          if(isset($_SESSION['counsellor_id'])) {
              // Get current date and time
              date_default_timezone_set("Asia/Kolkata");
              $currentDate = date("Y-m-d");
              $currentTime = date("H:i:s");
              // Show all doctor timeslots
              $timeslots = $this->counsellorTimeslotModel->getTimeslotByCounsellorId($_SESSION['counsellor_id']);
              $data = [
                  'timeslots' => $timeslots,
                  'currentDate' => $currentDate,
                  'currentTime' => $currentTime
              ];

              // Load view
              $this->view('counsellor/v_timeslots', $data);
          }
          else {
              // Redirect to login
              redirect('Login/login');
          }
      }

      // Create timeslot
      public function addTimeslot() {
          if(isset($_SESSION['counsellor_id'])) {

              if($_SERVER['REQUEST_METHOD'] == 'POST') {
                  // Form is submitting
  
                  // Data validation
                  $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
                  // Inserted form
                  $data = [
                      'day' => trim($_POST['day']),
                      'starting_time' => trim($_POST['starting_time']),
                      'ending_time' => trim($_POST['ending_time']),
                      'fee' => trim($_POST['fee']),
                      'address' => trim($_POST['address']),
  
                      'day_err' => '',
                      'starting_time_err' => '',
                      'ending_time_err' => '',
                      'fee_err' => '',
                      'address_err' => ''
                  ];
  
                  // Validate each input
  
                  // Validate day
                  if(empty($data['day'])) {
                      $data['day_err'] = 'Day required';
                  }
  
                  // Validate starting time
                  if(empty($data['starting_time'])) {
                      $data['starting_time_err'] = 'Starting time required';
                  }
  
                  // Validate ending time
                  if(empty($data['ending_time'])) {
                      $data['ending_time_err'] = 'Ending time required';
                  }
  
                  // Validate fee
                  if(empty($data['fee'])) {
                      $data['fee_err'] = 'Fee required';
                  }

                  // Validate address
                  if(empty($data['address'])) {
                      $data['address_err'] = 'Address required';
                  }
  
                  // Create timeslot after validation
                  if(empty($data['day_err']) && empty($data['starting_time_err']) && empty($data['ending_time_err']) && empty($data['fee_err']) && empty($data['address_err'])) {
                      // Create timeslot
                      if($this->doctorTimeslotModel->createTimeslot($data, $_SESSION['doctor_id'])) {
                          $_SESSION['timeslot_added'] = true;
                          redirect('Counsellor/dashboard');
                      }
                      else {
                          die('Something went wrong');
                      }
                  }
                  else {
                      // Load view
                       $this->view('counsellor/v_add_timeslot', $data);
                  }
              }
              else {
                  $data = [
                      'day' => '',
                      'starting_time' => '',
                      'ending_time' => '',
                      'fee' => '',
                      'address' => '',
  
                      'day_err' => '',
                      'starting_time_err' => '',
                      'ending_time_err' => '',
                      'fee_err' => '',
                      'address_err' => ''
                  ];
  
                  // Load view
                  $this->view('counsellor/v_add_timeslot', $data);
              }
              $data = [];
          }
          else {
              // Redirect to login
              redirect('Login/login');
          }
      }
  }


?>