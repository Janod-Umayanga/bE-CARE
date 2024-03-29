  <?php

    class Patient extends Controller{
        private $patientModel;
        private $complaintModel;
        private $feedbackModel;
        private $doctorModel;
        private $pharmacistModel;
        private $orderRequestModel;
        private $counsellorModel;
        private $counsellorTimeslotModel;
        private $nutritionistModel;
        private $requestDietPlanModel;
        private $doctorChannelModel;
        private $doctorTimeslotModel;
        private $sessionModel;
        private $meditationInstructorModel;
        private $meditationInstructorTimeslotModel;
        private $meditationInstructorAppointmentModel;
        public function __construct() {
            $this->patientModel = $this->model('M_Patient');
            $this->complaintModel = $this->model('M_Complaint');
            $this->feedbackModel = $this->model('M_Feedback');
            $this->doctorModel = $this->model('M_Doctor');
            $this->pharmacistModel = $this->model('M_Pharmacist');
            $this->orderRequestModel = $this->model('M_Order_Request');
            $this->counsellorModel = $this->model('M_Counsellor');
            $this->counsellorTimeslotModel = $this->model('M_Counsellor_Timeslot');
            $this->nutritionistModel = $this->model('M_Nutritionist');
            $this->requestDietPlanModel = $this->model('M_Request_Diet_Plan');
            $this->doctorChannelModel = $this->model('M_Doctor_Channel');
            $this->doctorTimeslotModel = $this->model('M_Doctor_Timeslot');
            $this->sessionModel = $this->model('M_Session');
            $this->meditationInstructorModel = $this->model('M_Meditation_Instructor');
            $this->meditationInstructorTimeslotModel = $this->model('M_Meditation_Instructor_Timeslot');
            $this->meditationInstructorAppointmentModel = $this->model('M_Meditation_Instructor_Appointment');
        }

        public function signup() {
            $_SESSION['signup_form_number'] = 0;
            
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Form is submitting
                $_SESSION['signup_form_number'] = 0;
                // Data validation
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Inserted form
                $data = [
                    'fname' => trim($_POST['fname']),
                    'lname' => trim($_POST['lname']),
                    'nic' => trim($_POST['nic']),
                    'cnumber' => trim($_POST['cnumber']),
                    'gender' => trim($_POST['gender']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'password_confirmation' => trim($_POST['password_confirmation']),

                    'fname_err' => '',
                    'lname_err' => '',
                    'nic_err' => '',
                    'cnumber_err' => '',
                    'gender_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'password_confirmation_err' => ''
                ];

                // Validate each input

                // Validate name
                if(empty($data['fname'])) {
                    $data['fname_err'] = 'First name required';
                }else if(validateFirstName($data['fname'])!="true"){
                    $data['fname_err']=validateFirstName($data['fname']);
                }

                if(empty($data['lname'])) {
                    $data['lname_err'] = 'Last name required';
                }else if(validateLastName($data['lname'])!="true"){
                    $data['lname_err']=validateLastName($data['lname']);
                   }

                // Validate nic
                if(empty($data['nic'])) {
                    $data['nic_err'] = 'NIC required';
                }else if(validateNIC($data['nic'])!="true"){
                    $data['nic_err']=validateNIC($data['nic']);
                }
                else {
                    //check for existing nic
                    if($this->patientModel->findPatientByNic($data['nic'])) {
                        $data['nic_err'] = 'Nic already in use';
                    }
                }


                // Validate contact number
                if(empty($data['cnumber'])) {
                    $data['cnumber_err'] = 'Contact number required';
                }else if(validateContactNumber($data['cnumber'])!="true"){
                    $data['cnumber_err']=validateContactNumber($data['cnumber']);
                } else {
                    //check for existing contact number
                    if($this->patientModel->findPatientByContactNumber($data['cnumber'])) {
                        $data['cnumber_err'] = 'Contact number already in use';
                    }
                }

                // Validate gender
                if(empty($data['gender'])) {
                    $data['gender_err'] = 'Title required';
                }

                // Validate email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Email required';
                }else if(validateEmail($data['email'])!="true"){
                    $data['email_err']=validateEmail($data['email']);
                }
                
                else {
                    //check for existing emails
                    if($this->patientModel->findPatientByEmail($data['email'])) {
                        $data['email_err'] = 'Email already in use';
                    }
                }

                // Validate password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Password required';
                }else if(validatePassword($data['password'])!="true"){
                    $data['password_err']=validatePassword($data['password']);
                }
                if(empty($data['password_confirmation'])) {
                    $data['password_confirmation_err'] = 'Password confirmation required';
                }
                else {
                    if($data['password'] != $data['password_confirmation']) {
                        $data['password_confirmation_err'] = 'Password did not match';
                    }
                }

                // Signup patient after validation
                if(empty($data['fname_err']) && empty($data['lname_err']) && empty($data['nic_err']) && empty($data['cnumber_err']) && empty($data['gender_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['password_confirmation_err'])) {
                    // Hashing password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Register patient
                    if($this->patientModel->register($data)) {
                        $_SESSION['signed_up'] = true;
                        $patientDetails=$this->patientModel->getLatestPatientID();
                        sendMail($data['email'],$data['fname'],1, 7,$patientDetails->patient_id);
       
                        redirect('Pages/verify_email');
                    }
                    else {
                        die('Something went wrong');
                    }
                }
                else {
                    // Load view
                     $this->view('patients/v_signup', $data);
                }
            }
            else {
                // Initial form
                $data = [
                    'fname' => '',
                    'lname' => '',
                    'nic' => '',
                    'cnumber' => '',
                    'gender' => '',
                    'email' => '',
                    'password' => '',
                    'password_confirmation' => '',

                    'fname_err' => '',
                    'lname_err' => '',
                    'nic_err' => '',
                    'cnumber_err' => '',
                    'gender_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'password_confirmation_err' => ''
                ];

                // Load view
                $this->view('patients/v_signup', $data);
            }

        }

        

        public function isPatientLoggedIn() {
            if(isset($_SESSION['patient_id'])) {
                return true;
            }
            else {
                return false;
            }
        }

        // View and update profile details
        public function details() {
            $loggedPatient = $this->patientModel->getPatientById($_SESSION['patient_id']);

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Form is submitting

                // Data validation
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Inserted form
                $data = [
                    'fname' => trim($_POST['fname']),
                    'lname' => trim($_POST['lname']),
                    'nic' => $loggedPatient->nic,
                    'cnumber' => trim($_POST['cnumber']),
                    'gender' => $loggedPatient->gender,
                    'email' => $loggedPatient->email,
                    'rdate' => $loggedPatient->registered_date,

                    'fname_err' => '',
                    'lname_err' => '',
                    'nic_err' => '',
                    'cnumber_err' => '',
                    'gender_err' => ''
                ];

                // Validate each input

                // Validate name
                if(empty($data['fname'])) {
                    $data['fname_err'] = 'First name required';
                } else if(validateFirstName($data['fname'])!="true"){
                    $data['fname_err']=validateFirstName($data['fname']);
                }
                if(empty($data['lname'])) {
                    $data['lname_err'] = 'Last name required';
                } else if(validateLastName($data['lname'])!="true"){
                    $data['lname_err']=validateLastName($data['lname']);
                }

                // Validate nic
                if(empty($data['nic'])) {
                    $data['nic_err'] = 'NIC required';
                } else if(validateNIC($data['nic'])!="true"){
                    $data['nic_err']=validateNIC($data['nic']);
                }

                // Validate contact number
                if(empty($data['cnumber'])) {
                    $data['cnumber_err'] = 'Contact number required';
                } else if(validateContactNumber($data['cnumber'])!="true"){
                    $data['cnumber_err']=validateContactNumber($data['cnumber']);
                }

                // Validate gender
                if(empty($data['gender'])) {
                    $data['gender_err'] = 'Title required';
                }

                // Update patient details after validation
                if(empty($data['fname_err']) && empty($data['lname_err']) && empty($data['nic_err']) && empty($data['cnumber_err']) && empty($data['gender_err'])) {
                    // Update patient
                    if($this->patientModel->update($data, $_SESSION['patient_id'])) {
                        $_SESSION['details_updated'] = true;
                        redirect('Pages/index');
                    }
                    else {
                        die('Something went wrong');
                    }
                }
                else {
                    // Load view
                     $this->view('patients/v_details', $data);
                }
            }
            else {
                $data = [
                    'fname' => $loggedPatient->first_name,
                    'lname' => $loggedPatient->last_name,
                    'nic' => $loggedPatient->nic,
                    'cnumber' => $loggedPatient->contact_number,
                    'gender' => $loggedPatient->gender,
                    'email' => $loggedPatient->email,
                    'rdate' => $loggedPatient->registered_date,

                    'fname_err' => '',
                    'lname_err' => '',
                    'nic_err' => '',
                    'cnumber_err' => '',
                    'gender_err' => ''
                ];

                // Load view
                $this->view('patients/v_details', $data);
            }
        }

        // Update password
        public function changePW() {
            $loggedPatient = $this->patientModel->getPatientById($_SESSION['patient_id']);
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Form is submitting

                // Data validation
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Inserted form
                $data = [
                    'expw' => trim($_POST['expw']),
                    'newpw' => trim($_POST['newpw']),
                    'password_confirmation' => trim($_POST['password_confirmation']),

                    'expw_err' => '',
                    'newpw_err' => '',
                    'password_confirmation_err' => ''
                ];

                // Validate each input

                // Validate password
                if(empty($data['expw'])) {
                    $data['expw_err'] = 'Current password required';
                }
                elseif(!$this->patientModel->verifyPW($_SESSION['patient_id'], $data['expw'])){
                    $data['expw_err'] = 'Invalid password';
                }
                if(empty($data['newpw'])) {
                    $data['newpw_err'] = 'Enter a new password';
                } else if(validatePassword($data['newpw'])!="true"){
                    $data['newpw_err']=validatePassword($data['newpw']);
                }
                else if(empty($data['password_confirmation'])) {
                    $data['password_confirmation_err'] = 'Password confirmation required';
                }
                else {
                    if($data['newpw'] != $data['password_confirmation']) {
                        $data['password_confirmation_err'] = 'Password did not match';
                    }
                }

                // Update patient password after validation
                if(empty($data['expw_err']) && empty($data['newpw_err']) && empty($data['password_confirmation_err'])) {
                    // Hashing new password
                    $data['newpw'] = password_hash($data['newpw'], PASSWORD_DEFAULT);
                    // Update patient
                    if($this->patientModel->updatePW($data, $_SESSION['patient_id'])) {
                        $_SESSION['pw_updated'] = true;
                        redirect('Pages/index');
                    }
                    else {
                        die('Something went wrong');
                    }
                }
                else {
                    // Load view
                     $this->view('patients/v_change_password', $data);
                }
            }
            else {
                $data = [
                    'expw' => '',
                    'newpw' => '',
                    'password_confirmation' => '',

                    'expw_err' => '',
                    'newpw_err' => '',
                    'password_confirmation_err' => ''
                ];

                // Load view
                $this->view('patients/v_change_password', $data);
            }
        }

        // Report complaints
        public function complaints() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Form is submitting
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Inserted form
                $data = [
                    'subject' => trim($_POST['subject']),
                    'description' => trim($_POST['description']),

                    'subject_err' => '',
                    'description_err' => ''
                ];

                // Validate subject
                if(empty($data['subject'])) {
                    $data['subject_err'] = 'Subject required';
                }

                // Validate description
                if(empty($data['description'])) {
                    $data['description_err'] = 'description required';
                }

                // Report the complaint after validation
                if(empty($data['subject_err']) && empty($data['description_err'])) {
                    // Update patient
                    if($this->complaintModel->createComplaint($data, $_SESSION['patient_id'])) {
                        redirect('Pages/index');
                    }
                    else {
                        die('Something went wrong');
                    }
                }
                else {
                    // Load view
                     $this->view('patients/v_complaints', $data);
                }
            }
            else {
                // Initial form
                $data = [
                    'subject' => '',
                    'description' => '',

                    'subject_err' => '',
                    'description_err' => ''
                ];

                // Load view
                $this->view('patients/v_complaints', $data);
            }
        }

        // add feedback
        public function addFeedback() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Form is submitting
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Inserted form
                $data = [
                    'feedback' => trim($_POST['feedback']),

                    'feedback_err' => ''
                ];

                // Validate feedback
                if(empty($data['feedback'])) {
                    $data['feedback_err'] = 'feedback required';
                }

                // Add the feedback after validation
                if(empty($data['feedback_err'])) {
                    // Add feedback
                    if($this->feedbackModel->createFeedback($data, $_SESSION['patient_id'])) {
                        redirect('Pages/index');
                    }
                    else {
                        die('Something went wrong');
                    }
                }
                else {
                    // Load view
                     $this->view('patients/v_add_feedback', $data);
                }
            }
            else {
                // Initial form
                $data = [
                    'feedback' => '',

                    'feedback_err' => ''
                ];

                // Load view
                $this->view('patients/v_add_feedback', $data);
            }
        }

        // View all feedbacks
        public function viewFeedbacks() {
            $feedbacks = $this->feedbackModel->getAllFeedbacks();

            $data = [
                'feedbacks' => $feedbacks
            ];

            // Load view
            $this->view('patients/v_feedbacks', $data);
        }

        // View and search doctors
        public function findDoctor() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Search using the given keyword
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $doctors = $this->doctorModel->getDoctors(trim($_POST['search']), trim($_POST['specialization']), trim($_POST['city']), trim($_POST['day']));

                // echo json_encode($doctors);
            }
            else {
                // Show all doctors
                $doctors = $this->doctorModel->getAllDoctors();
            }
            $data = [
                'doctors' => $doctors
            ];

            // Load view
            $this->view('patients/v_doctors', $data);
        }

        // Get doctor id needed for viewing doctor timeslots
        public function getDoctorId(){
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $doctor_id = trim($_POST['doctor_id']);
                $_SERVER['REQUEST_METHOD'] = '';

                // Pass the pharmacist id for order medicine
                $this->viewDoctorTimeslots($doctor_id);
            }
        }

        // View doctor timeslots
        public function viewDoctorTimeslots($doctor_id) {
            $timeslots = $this->doctorTimeslotModel->getAllDoctorTimeslots($doctor_id);
            
            // Check if all timeslots have 4 days or else need to add upto 4 days
            foreach($timeslots as $timeslot) {
                $channeling_days = $this->doctorTimeslotModel->getChannelingDays($timeslot->doctor_timeslot_id, $timeslot->doctor_id, $timeslot->channeling_day, $timeslot->starting_time);
                
            }

            $timeslots = $this->doctorTimeslotModel->getAllDoctorChannelingTimeslots($doctor_id);

            $data = [
                'timeslots' => $timeslots,
                'doctor_id' => $doctor_id
            ];

            // Load view
            $this->view('patients/v_doctor_timeslots', $data);
        }

        // View doctor profile
        public function viewDoctorProfile($doctor_id) {
            $doctor = $this->doctorModel->getDoctorById($doctor_id);
            $data = [
                'doctor' => $doctor
            ];

            // Load view
            $this->view('patients/v_doctor_profile', $data);
        }

        // Channel doctor
        public function channelDoctor($doctor_id, $channel_day_id, $date, $starting_time, $time, $duration, $ending_time, $fee) {
            if(isset($_SESSION['patient_id'])) {
                $loggedPatient = $this->patientModel->getPatientById($_SESSION['patient_id']);

                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Form is submitting
    
                    // Data validation
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                    // Inserted form
                    $data = [
                        'name' => trim($_POST['name']),
                        'age' => trim($_POST['age']),
                        'cnumber' => trim($_POST['cnumber']),
                        'gender' => trim($_POST['gender']),
                        'doctor_id' => $doctor_id,
                        'channel_day_id' => $channel_day_id,
                        'date' => $date,
                        'starting_time' => $starting_time,
                        'time' => $time,
                        'duration' => $duration,
                        'ending_time' => $ending_time,
                        'fee' => $fee,
    
                        'name_err' => '',
                        'age_err' => '',
                        'cnumber_err' => '',
                        'gender_err' => ''
                    ];
    
                    // Validate each input
    
                    // Validate name
                    if(empty($data['name'])) {
                        $data['name_err'] = 'Name required';
                    }else if(validateName($data['name']) != "true") {
                        $data['name_err'] = validateName($data['name']);
                    }
    
                    // Validate address
                    if(empty($data['age'])) {
                        $data['age_err'] = 'Age required';
                    }else if(validatePostitiveNumber($data['age']) != "true") {
                        $data['age_err'] = 'Age must be a positive number';
                    }
    
                    // Validate contact number
                    if(empty($data['cnumber'])) {
                        $data['cnumber_err'] = 'Contact number required';
                    }else if(validateContactNumber($data['cnumber']) != "true") {
                        $data['cnumber_err'] = validateContactNumber($data['cnumber']);
                    }
    
                    // Validate gneder
                    if(empty($data['gender'])) {
                        $data['gender_err'] = 'Title required';
                    }
    
                    // Create order after validation
                    if(empty($data['name_err']) && empty($data['age_err']) && empty($data['cnumber_err']) && empty($data['gender_err'])) {
                        // Load invoice view
                        $this->view('patients/v_channel_doctor_invoice', $data);
                        // // Create order
                        // if($this->doctorChannelModel->createDoctorChannel($data, $_SESSION['patient_id'])) {
                        //     $_SESSION['channel_created'] = true;
                        //     redirect('Pages/index');
                        // }
                        // else {
                        //     die('Something went wrong');
                        // }
                    }
                    else {
                        // Load view
                         $this->view('patients/v_channel_doctor', $data);
                    }
                }
                else {
                    $data = [
                        'name' => $loggedPatient->first_name,
                        'age' => '',
                        'cnumber' => $loggedPatient->contact_number,
                        'gender' => '',
                        'doctor_id' => $doctor_id,
                        'channel_day_id' => $channel_day_id,
                        'date' => $date,
                        'starting_time' => $starting_time,
                        'time' => $time,
                        'duration' => $duration,
                        'ending_time' => $ending_time,
                        'fee' => $fee,
    
                        'name_err' => '',
                        'age_err' => '',
                        'cnumber_err' => '',
                        'gender_err' => ''
                    ];
    
                    // Load view
                    $this->view('patients/v_channel_doctor', $data);
                }
                $data = [];
            }
            else {
                $_SESSION['need_login'] = true;
                // Redirect to login
                redirect('Login/login');
            }
        }

        // View doctor appointments
        public function viewDoctorAppointments() {
            if(isset($_SESSION['patient_id'])) {
                // Get current date and time
                date_default_timezone_set("Asia/Kolkata");
                $currentDate = date("Y-m-d");
                $currentTime = date("H:i:s");
                // Show all doctor appointments
                $appointments = $this->doctorChannelModel->getAllDoctorChannels($_SESSION['patient_id']);
                $data = [
                    'appointments' => $appointments,
                    'currentDate' => $currentDate,
                    'currentTime' => $currentTime
                ];

                // Load view
                $this->view('patients/v_doctor_appointments', $data);
            }
            else {
                $_SESSION['need_login'] = true;
                // Redirect to login
                redirect('Login/login');
            }
        }

        // View doctor channeling history
        public function viewDoctorChannelingHistory() {
            if(isset($_SESSION['patient_id'])) {
                // Get current date and time
                date_default_timezone_set("Asia/Kolkata");
                $currentDate = date("Y-m-d");
                $currentTime = date("H:i:s");
                // Show all doctor appointments
                $appointments = $this->doctorChannelModel->getAllDoctorChannels($_SESSION['patient_id']);
                $data = [
                    'appointments' => $appointments,
                    'currentDate' => $currentDate,
                    'currentTime' => $currentTime
                ];

                // Load view
                $this->view('patients/v_doctor_channeling_history', $data);
            }
            else {
                $_SESSION['need_login'] = true;
                // Redirect to login
                redirect('Login/login');
            }
        }

        // View and search counsellors
        public function findCounsellor() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Search using the given keyword
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $counsellors = $this->counsellorModel->getCounsellors(trim($_POST['search']), trim($_POST['city']));
            }
            else {
                // Show all counsellors
                $counsellors = $this->counsellorModel->getAllCounsellors();
            }
            $data = [
                'counsellors' => $counsellors
            ];

            // Load view
            $this->view('patients/v_counsellors', $data);
        }

        // Get counsellor id needed for viewing counsellor timeslots
        public function getCounsellorId(){
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $counsellor_id = trim($_POST['counsellor_id']);
                $_SERVER['REQUEST_METHOD'] = '';

                // Pass the pharmacist id for order medicine
                $this->viewCounsellorTimeslots($counsellor_id);
            }
        }

        // View counsellor timeslots
        public function viewCounsellorTimeslots($counsellor_id) {
            $timeslots = $this->counsellorTimeslotModel->getAllCounsellorTimeslots($counsellor_id);

            // Check if all timeslots have 4 days or else need to add upto 4 days
            foreach($timeslots as $timeslot) {
                $channeling_days = $this->counsellorTimeslotModel->getChannelingDays($timeslot->counsellor_timeslot_id, $timeslot->counsellor_id, $timeslot->channeling_day, $timeslot->starting_time);
                
            }

            $timeslots = $this->counsellorTimeslotModel->getAllCounsellorChannelingTimeslots($counsellor_id);
            
            $data = [
                'timeslots' => $timeslots,
                'counsellor_id' => $counsellor_id
            ];

            // Load view
            $this->view('patients/v_counsellor_timeslots', $data);
        }

        // View counsellor profile
        public function viewCounsellorProfile($counsellor_id) {
            $counsellor = $this->counsellorModel->getCounsellorById($counsellor_id);
            $data = [
                'counsellor' => $counsellor
            ];

            // Load view
            $this->view('patients/v_counsellor_profile', $data);
        }

        // Channel counsellor
        public function channelCounsellor($counsellor_id, $channel_day_id, $date, $starting_time, $time, $duration, $ending_time, $fee) {
            if(isset($_SESSION['patient_id'])) {
                $loggedPatient = $this->patientModel->getPatientById($_SESSION['patient_id']);

                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Form is submitting
    
                    // Data validation
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                    // Inserted form
                    $data = [
                        'name' => trim($_POST['name']),
                        'age' => trim($_POST['age']),
                        'cnumber' => trim($_POST['cnumber']),
                        'gender' => trim($_POST['gender']),
                        'counsellor_id' => $counsellor_id,
                        'channel_day_id' => $channel_day_id,
                        'date' => $date,
                        'starting_time' => $starting_time,
                        'time' => $time,
                        'duration' => $duration,
                        'ending_time' => $ending_time,
                        'fee' => $fee,
    
                        'name_err' => '',
                        'age_err' => '',
                        'cnumber_err' => '',
                        'gender_err' => ''
                    ];
    
                    // Validate each input
    
                    // Validate name
                    if(empty($data['name'])) {
                        $data['name_err'] = 'Name required';
                    } else if(validateName($data['name']) != "true") {
                        $data['name_err'] = validateName($data['name']);
                    }
    
                    // Validate address
                    if(empty($data['age'])) {
                        $data['age_err'] = 'Age required';
                    }else if(validatePostitiveNumber($data['age']) != "true") {
                        $data['age_err'] = 'Age must be a positive number';
                    }
    
                    // Validate contact number
                    if(empty($data['cnumber'])) {
                        $data['cnumber_err'] = 'Contact number required';
                    } else if(validateContactNumber($data['cnumber']) != "true") {
                        $data['cnumber_err'] = validateContactNumber($data['cnumber']);
                    }
    
                    // Validate gneder
                    if(empty($data['gender'])) {
                        $data['gender_err'] = 'Title required';
                    }
    
                    // Create order after validation
                    if(empty($data['name_err']) && empty($data['age_err']) && empty($data['cnumber_err']) && empty($data['gender_err'])) {
                        // Load invoice view
                        $this->view('patients/v_channel_counsellor_invoice', $data);
                        // // Create order
                        // if($this->doctorChannelModel->createDoctorChannel($data, $_SESSION['patient_id'])) {
                        //     $_SESSION['channel_created'] = true;
                        //     redirect('Pages/index');
                        // }
                        // else {
                        //     die('Something went wrong');
                        // }
                    }
                    else {
                        // Load view
                         $this->view('patients/v_channel_counsellor', $data);
                    }
                }
                else {
                    $data = [
                        'name' => $loggedPatient->first_name,
                        'age' => '',
                        'cnumber' => $loggedPatient->contact_number,
                        'gender' => '',
                        'counsellor_id' => $counsellor_id,
                        'channel_day_id' => $channel_day_id,
                        'date' => $date,
                        'starting_time' => $starting_time,
                        'time' => $time,
                        'duration' => $duration,
                        'ending_time' => $ending_time,
                        'fee' => $fee,
    
                        'name_err' => '',
                        'age_err' => '',
                        'cnumber_err' => '',
                        'gender_err' => ''
                    ];
    
                    // Load view
                    $this->view('patients/v_channel_counsellor', $data);
                }
                $data = [];
            }
            else {
                $_SESSION['need_login'] = true;
                // Redirect to login
                redirect('Login/login');
            }
        }

        // View counsellor appointments
        public function viewCounsellorAppointments() {
            if(isset($_SESSION['patient_id'])) {
                // Get current date and time
                date_default_timezone_set("Asia/Kolkata");
                $currentDate = date("Y-m-d");
                $currentTime = date("H:i:s");
                // Show all doctor appointments
                $appointments = $this->doctorChannelModel->getAllCounsellorChannels($_SESSION['patient_id']);
                $data = [
                    'appointments' => $appointments,
                    'currentDate' => $currentDate,
                    'currentTime' => $currentTime
                ];

                // Load view
                $this->view('patients/v_counsellor_appointments', $data);
            }
            else {
                $_SESSION['need_login'] = true;
                // Redirect to login
                redirect('Login/login');
            }
        }

        // View counsellor channeling history
        public function viewCounsellorChannelingHistory() {
            if(isset($_SESSION['patient_id'])) {
                // Get current date and time
                date_default_timezone_set("Asia/Kolkata");
                $currentDate = date("Y-m-d");
                $currentTime = date("H:i:s");
                // Show all counsellor appointments
                $appointments = $this->doctorChannelModel->getAllCounsellorChannels($_SESSION['patient_id']);
                $data = [
                    'appointments' => $appointments,
                    'currentDate' => $currentDate,
                    'currentTime' => $currentTime
                ];

                // Load view
                $this->view('patients/v_counsellor_channeling_history', $data);
            }
            else {
                $_SESSION['need_login'] = true;
                // Redirect to login
                redirect('Login/login');
            }
        }

        // View and search nutritionists
        public function findNutritionist() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Search using the given keyword
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $nutritionists = $this->nutritionistModel->getNutritionists(trim($_POST['search']));
            }
            else {
                // Show all nutritionists
                $nutritionists = $this->nutritionistModel->getAllNutritionists();
            }
            $data = [
                'nutritionists' => $nutritionists
            ];

            // Load view
            $this->view('patients/v_nutritionists', $data);
        }

        // Get nutritionist id needed for the order medicine
        public function getNutritionistId(){
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $nutritionist_id = trim($_POST['nutritionist_id']);
                $fee = trim($_POST['fee']);
                $_SERVER['REQUEST_METHOD'] = '';

                // Pass the nutritionist id for order medicine
                $this->requestDietPlan($nutritionist_id, $fee);
            }
        }

        // Request diet plan
        public function requestDietPlan($nutritionist_id, $fee) {
            if(isset($_SESSION['patient_id'])) {
                $loggedPatient = $this->patientModel->getPatientById($_SESSION['patient_id']);

                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Form is submitting
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                    // Inserted form
                    $data = [
                        'name' => trim($_POST['name']),
                        'age' => trim($_POST['age']),
                        'gender' => trim($_POST['gender']),
                        'cnumber' => trim($_POST['cnumber']),
                        'weight' => trim($_POST['weight']),
                        'height' => trim($_POST['height']),
                        'marital_status' => trim($_POST['marital_status']),
                        'medical_details' => trim($_POST['medical_details']),
                        'allergies' => trim($_POST['allergies']),
                        'sleeping_hours' => trim($_POST['sleeping_hours']),
                        'water_consumption_per_day' => trim($_POST['water_consumption_per_day']),
                        'goal' => trim($_POST['goal']),
                        'nutritionist_id' => $nutritionist_id,
                        'fee' => $fee,
    
                        'name_err' => '',
                        'age_err' => '',
                        'gender_err' => '',
                        'cnumber_err' => '',
                        'weight_err' => '',
                        'height_err' => '',
                        'marital_status_err' => '',
                        'medical_details_err' => '',
                        'allergies_err' => '',
                        'sleeping_hours_err' => '',
                        'water_consumption_per_day_err' => '',
                        'goal_err' => ''
                    ];
    
                    // Validate each input
    
                    // Validate name
                    if(empty($data['name'])) {
                        $data['name_err'] = 'Name required';
                    } else if(validateName($data['name']) != "true") {
                        $data['name_err'] = validateName($data['name']);
                    }
    
                    // Validate age
                    if(empty($data['age'])) {
                        $data['age_err'] = 'Age required';
                    }else if(validatePostitiveNumber($data['age']) != "true") {
                        $data['age_err'] = 'Age must be a positive number';
                    }

                    // Validate gender
                    if(empty($data['gender'])) {
                        $data['gender_err'] = 'Title required';
                    }
    
                    // Validate contact number
                    if(empty($data['cnumber'])) {
                        $data['cnumber_err'] = 'Contact number required';
                    } else if(validateContactNumber($data['cnumber']) != "true") {
                        $data['cnumber_err'] = validateContactNumber($data['cnumber']);
                    }
    
                    // Validate weight
                    if(empty($data['weight'])) {
                        $data['weight_err'] = 'Weight required';
                    }else if(validatePostitiveNumber($data['weight']) != "true") {
                        $data['weight_err'] = 'Weight must be a positive number';
                    }

                    // Validate height
                    if(empty($data['height'])) {
                        $data['height_err'] = 'Height required';
                    }else if(validatePostitiveNumber($data['height']) != "true") {
                        $data['height_err'] = 'Height must be a positive number';
                    }

                    // Validate marital_status
                    if(empty($data['marital_status'])) {
                        $data['marital_status_err'] = 'Marital status required';
                    }

                    // Validate medical_details
                    if(empty($data['medical_details'])) {
                        $data['medical_details_err'] = 'Medical details required';
                    }

                    // Validate allergies
                    if(empty($data['allergies'])) {
                        $data['allergies_err'] = 'Allergies required';
                    }

                    // Validate sleeping_hours
                    if(empty($data['sleeping_hours'])) {
                        $data['sleeping_hours_err'] = 'Sleeping hours required';
                    }else if(validatePostitiveNumber($data['sleeping_hours']) != "true") {
                        $data['sleeping_hours_err'] = 'Sleeping hours must be a positive number';
                    }

                    // Validate water_consumption_per_day
                    if(empty($data['water_consumption_per_day'])) {
                        $data['water_consumption_per_day_err'] = 'Water consumption required';
                    }else if(validatePostitiveNumber($data['water_consumption_per_day']) != "true") {
                        $data['water_consumption_per_day_err'] = 'Water consumption must be a positive number';
                    }

                    // Validate goal
                    if(empty($data['goal'])) {
                        $data['goal_err'] = 'Goal required';
                    }
    
                    // Create order after validation
                    if(empty($data['name_err']) && empty($data['age_err']) && empty($data['gender_err']) && empty($data['cnumber_err']) && empty($data['weight_err']) && empty($data['height_err']) && empty($data['marital_status_err']) && empty($data['medical_details_err']) && empty($data['allergies_err']) && empty($data['sleeping_hours_err']) && empty($data['water_consumption_per_day_err']) && empty($data['goal_err'])) {
                        
                        

                        // Load payment information view
                        $this->view('patients/v_diet_plan_invoice', $data);
                        // // Create order
                        // if($this->requestDietPlanModel->createDietPlanRequest($data, $_SESSION['patient_id'])) {
                        //     redirect('Pages/index');
                        // }
                        // else {
                        //     die('Something went wrong');
                        // }
                    }
                    else {
                        // Load view
                         $this->view('patients/v_request_diet_plan', $data);
                    }
                }
                else {
                    $data = [
                        'name' => $loggedPatient->first_name,
                        'age' => '',
                        'gender' => $loggedPatient->gender,
                        'cnumber' => $loggedPatient->contact_number,
                        'weight' => '',
                        'height' => '',
                        'marital_status' => '',
                        'medical_details' => '',
                        'allergies' => '',
                        'sleeping_hours' => '',
                        'water_consumption_per_day' => '',
                        'goal' => '',
                        'nutritionist_id' => $nutritionist_id,
                        'fee' => $fee,
    
                        'name_err' => '',
                        'age_err' => '',
                        'gender_err' => '',
                        'cnumber_err' => '',
                        'weight_err' => '',
                        'height_err' => '',
                        'marital_status_err' => '',
                        'medical_details_err' => '',
                        'allergies_err' => '',
                        'sleeping_hours_err' => '',
                        'water_consumption_per_day_err' => '',
                        'goal_err' => ''
                    ];
    
                    // Load view
                    $this->view('patients/v_request_diet_plan', $data);
                }
                $data = [];
            }
            else {
                $_SESSION['need_login'] = true;
                // Redirect to login
                redirect('Login/login');
            }
        }

        // View nutritionist profile
        public function viewNutritionistProfile($nutritionist_id) {
            $nutritionist = $this->nutritionistModel->getNutritionistById($nutritionist_id);
            $data = [
                'nutritionist' => $nutritionist
            ];

            // Load view
            $this->view('patients/v_nutritionist_profile', $data);
        }

        // View diet plans
        public function viewDietPlans() {
            if(isset($_SESSION['patient_id'])) {
                $requests = $this->requestDietPlanModel->getAllDietPlanRequests($_SESSION['patient_id']);
                $dietplans = $this->requestDietPlanModel->getAllDietPlans($_SESSION['patient_id']);
                $data = [
                    'requests' => $requests,
                    'dietplans' => $dietplans
                ];

                // Load view
                $this->view('patients/v_diet_plans', $data);
            }
            else {
                $_SESSION['need_login'] = true;
                // Redirect to login
                redirect('Login/login');
            }
        }

        // View diet plan details
        public function viewDietPlanDetails($diet_plan_id) {
            if(isset($_SESSION['patient_id'])) {
            $request = $this->requestDietPlanModel->getDietPlanRequestById($diet_plan_id);
            $data = [
                'request' => $request
            ];

            // Load view
            $this->view('patients/v_diet_plan_details', $data);
            }
            else {
                $_SESSION['need_login'] = true;
                // Redirect to login
                redirect('Login/login');
            }
        }

        // View pharmacies
        public function findPharmacy() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Search using the given keyword
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $pharmacists = $this->pharmacistModel->getpharmacists(trim($_POST['search']), trim($_POST['city']));
            }
            else {
                // Show all pharmacies
                $pharmacists = $this->pharmacistModel->getAllPharmacists();
            }
            $data = [
                'pharmacists' => $pharmacists
            ];

            // Load view
            $this->view('patients/v_pharmacies', $data);
        }

        // Get pharmacist id needed for the order medicine
        public function getPharmacistId(){
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $pharmacist_id = trim($_POST['pharmacist_id']);
                $_SERVER['REQUEST_METHOD'] = '';

                // Pass the pharmacist id for order medicine
                $this->orderMedicine($pharmacist_id);
            }
        }

        // Order medicine
        public function orderMedicine($pharmacist_id) {
            if(isset($_SESSION['patient_id'])) {
                $loggedPatient = $this->patientModel->getPatientById($_SESSION['patient_id']);

                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Form is submitting
    
                    // Data validation
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                    // Inserted form
                    $data = [
                        'name' => trim($_POST['name']),
                        'address' => trim($_POST['address']),
                        'cnumber' => trim($_POST['cnumber']),
                        'prescription' => $_FILES['prescription'],
                        'prescription_name' => time().'_'.$_FILES['prescription']['name'],
                        'pharmacist_id' => $pharmacist_id,
    
                        'name_err' => '',
                        'address_err' => '',
                        'cnumber_err' => '',
                        'prescription_err' => ''
                    ];
    
                    // Validate each input
    
                    // Validate name
                    if(empty($data['name'])) {
                        $data['name_err'] = 'Name required';
                    } else if(validateName($data['name']) != "true") {
                        $data['name_err'] = validateName($data['name']);
                    }
    
                    // Validate address
                    if(empty($data['address'])) {
                        $data['address_err'] = 'Address required';
                    } else if(validateAddress($data['address']) != "true") {
                        $data['address_err'] = validateAddress($data['address']);
                    }
    
                    // Validate contact number
                    if(empty($data['cnumber'])) {
                        $data['cnumber_err'] = 'Contact number required';
                    } else if(validateContactNumber($data['cnumber']) != "true") {
                        $data['cnumber_err'] = validateContactNumber($data['cnumber']);
                    }
    
                    // // Validate prescription and upload
                    // if(uploadImage($data['prescription']['tmp_name'], $data['prescription_name'], '/img/prescriptions/')) {
                    //     // Done
                    // }
                    // else {
                    //     $data['prescription_err'] = 'Prescription required';
                    // }
                    // Validate prescription and upload
                    if(empty($data['prescription'])){
                        $data['prescription_err']='Prescription required';
                    } else {
                          $fileExt=explode('.',$_FILES['prescription']['name']);
                          $fileActualExt=strtolower(end($fileExt));
                          $allowed=array('jpg','jpeg','png','pdf');
               
                        
                          if(!in_array($fileActualExt,$allowed)){
                            $data['prescription_err']='Prescription required (should be in jpg,jpeg,png or pdf format)';
               
                          } else if($data['prescription']['size']>0 ){
                            if(uploadFile($data['prescription']['tmp_name'],$data['prescription_name'],'/img/prescriptions/')){
                                //Done
                            } else {  
                                $data['prescription_err']='Unsuccessful prescription upload';
                            }
                          } else {
                                $data[ 'prescription_err'] ="Prescription required (size should be less than 5MB)";                       
                          }
                
                      }
    
                    // Create order after validation
                    if(empty($data['name_err']) && empty($data['address_err']) && empty($data['cnumber_err']) && empty($data['prescription_err'])) {
                        // Create order
                        if($this->orderRequestModel->createOrderRequest($data, $_SESSION['patient_id'])) {
                            $_SESSION['order_sent'] = true;

                            $pharmacist = $this->pharmacistModel->getPharmacistbyId($pharmacist_id);

                            $other = [
                                'patient_name' => $_SESSION['patient_name'],
                                'patient_title' => $_SESSION['patient_title'],
                            ];

                            $name = $pharmacist->first_name;
                            $email = $pharmacist->email;
                            $bodyFlag = 16;

                            // Send email notification to the pharmacist
                            sendMail($email,$name,"",$bodyFlag,$other);
                            redirect('Pages/index');
                        }
                        else {
                            die('Something went wrong');
                        }
                    }
                    else {
                        // Load view
                         $this->view('patients/v_order_medicine', $data);
                    }
                }
                else {
                    $data = [
                        'name' => $loggedPatient->first_name,
                        'address' => '',
                        'cnumber' => $loggedPatient->contact_number,
                        'prescription' => '',
                        'pharmacist_id' => $pharmacist_id,
    
                        'name_err' => '',
                        'address_err' => '',
                        'cnumber_err' => '',
                        'prescription_err' => ''
                    ];
    
                    // Load view
                    $this->view('patients/v_order_medicine', $data);
                }
                $data = [];
            }
            else {
                $_SESSION['need_login'] = true;
                // Redirect to login
                redirect('Login/login');
            }
        }

        // View order requests
        public function viewOrderRequests() {
            if(isset($_SESSION['patient_id'])) {
            // Show all order requests
            $orders = $this->orderRequestModel->getAllOrderRequests($_SESSION['patient_id']);
            $accepted_orders = $this->orderRequestModel->getAllAcceptedOrders($_SESSION['patient_id']);
            $rejected_orders = $this->orderRequestModel->getAllRejectedOrders($_SESSION['patient_id']);
            $data = [
                'orders' => $orders,
                'acccepted_orders' => $accepted_orders,
                'rejected_orders' => $rejected_orders
            ];

            // Load view
            $this->view('patients/v_order_requests', $data);
            }
            else {
                $_SESSION['need_login'] = true;
                // Redirect to login
                redirect('Login/login');
            }
        }

        // pay for order
        public function payForOrder($order_id, $fee, $email, $accepted_datetime, $pharmacist_id) {
            if(isset($_SESSION['patient_id'])) {
                

                $data = [
                    'order_id' => $order_id,
                    'fee' => $fee,
                    'email' => $email,
                    'pharmacist_id' => $pharmacist_id,
                ];

                // get today's date time
                date_default_timezone_set("Asia/Kolkata");
                $today = date("Y-m-d H:i:s");

                // check if the accepted date time is less than 48 hours
                $diff = abs(strtotime($today) - strtotime($accepted_datetime));
                $hours = floor($diff / (60*60));
                if($hours > 24) {
                    $this->view('patients/v_pay_order_expired', $data);
                }
                else {
                    // Load view
                    $this->view('patients/v_pay_order_invoice', $data);
                }
            }
            else {
                $_SESSION['need_login'] = true;
                // Redirect to login
                redirect('Login/login');
            }
        }

         // View and search meditation instructors
         public function findMeditationInstructor() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Search using the given keyword
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $meditation_instructors = $this->meditationInstructorModel->getMeditationInstructors(trim($_POST['search']), trim($_POST['city']));
            }
            else {
                // Show all meditation instructors
                $meditation_instructors = $this->meditationInstructorModel->getAllMeditationInstructors();
            }
            $data = [
                'meditation_instructors' => $meditation_instructors
            ];

            // Load view
            $this->view('patients/v_meditation_instructors', $data);
        }

        // Get meditation instructor id needed for viewing meditaion instructor timeslots
        public function getMeditationInstructorId(){
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $meditation_instructor_id = trim($_POST['meditation_instructor_id']);
                $_SERVER['REQUEST_METHOD'] = '';

                // Pass the pharmacist id for order medicine
                $this->viewMeditationInstructorTimeslots($meditation_instructor_id);
            }
        }

        // View doctor timeslots
        public function viewMeditationInstructorTimeslots($meditation_instructor_id) {
            $timeslots = $this->meditationInstructorTimeslotModel->getAllMeditationInstructorTimeslots($meditation_instructor_id);

            // Check if all timeslots have 4 days or else need to add upto 4 days
            foreach($timeslots as $timeslot) {
                $channeling_days = $this->meditationInstructorTimeslotModel->getChannelingDays($timeslot->med_timeslot_id, $timeslot->meditation_instructor_id, $timeslot->appointment_day, $timeslot->starting_time, $timeslot->ending_time, $timeslot->fee, $timeslot->address, $timeslot->noOfParticipants);
                
            }

            $timeslots = $this->meditationInstructorTimeslotModel->getAllMeditationInstructorAppointmentTimeslots($meditation_instructor_id);

            $data = [
                'timeslots' => $timeslots,
                'meditation_instructor_id' => $meditation_instructor_id
            ];

            // Load view
            $this->view('patients/v_meditation_instructor_timeslots', $data);
        }

        // View doctor profile
        public function viewMeditationInstructorProfile($meditation_instructor_id) {
            $meditation_instructor = $this->meditationInstructorModel->getMeditationInstructorById($meditation_instructor_id);
            $data = [
                'meditation_instructor' => $meditation_instructor
            ];

            // Load view
            $this->view('patients/v_meditation_instructor_profile', $data);
        }

        // Register for meditation instructor
        public function registerForMeditationInstructor($meditation_instructor_id, $appointment_day_id, $noOfParticipants, $current_participants, $fee) {
            if(isset($_SESSION['patient_id'])) {
                $loggedPatient = $this->patientModel->getPatientById($_SESSION['patient_id']);

                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Form is submitting
    
                    // Data validation
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                    // Inserted form
                    $data = [
                        'name' => trim($_POST['name']),
                        'age' => trim($_POST['age']),
                        'cnumber' => trim($_POST['cnumber']),
                        'gender' => trim($_POST['gender']),
                        'meditation_instructor_id' => $meditation_instructor_id,
                        'appointment_day_id' => $appointment_day_id,
                        'noOfParticipants' => $noOfParticipants,
                        'current_participants' => $current_participants,
                        'fee' => $fee,
    
                        'name_err' => '',
                        'age_err' => '',
                        'cnumber_err' => '',
                        'gender_err' => ''
                    ];
    
                    // Validate each input
    
                    // Validate name
                    if(empty($data['name'])) {
                        $data['name_err'] = 'Name required';
                    }else if(validateName($data['name']) != "true") {
                        $data['name_err'] = validateName($data['name']);
                    }
    
                    // Validate address
                    if(empty($data['age'])) {
                        $data['age_err'] = 'Age required';
                    }else if(validatePostitiveNumber($data['age']) != "true") {
                        $data['age_err'] = 'Age must be a positive number';
                    }
    
                    // Validate contact number
                    if(empty($data['cnumber'])) {
                        $data['cnumber_err'] = 'Contact number required';
                    }else if(validateContactNumber($data['cnumber']) != "true") {
                        $data['cnumber_err'] = validateContactNumber($data['cnumber']);
                    }
    
                    // Validate gneder
                    if(empty($data['gender'])) {
                        $data['gender_err'] = 'Title required';
                    }
    
                    // Create order after validation
                    if(empty($data['name_err']) && empty($data['age_err']) && empty($data['cnumber_err']) && empty($data['gender_err'])) {
                        // Load invoice view
                        $this->view('patients/v_register_for_meditation_instructor_invoice', $data);
                        // // Create order
                        // if($this->doctorChannelModel->createDoctorChannel($data, $_SESSION['patient_id'])) {
                        //     $_SESSION['channel_created'] = true;
                        //     redirect('Pages/index');
                        // }
                        // else {
                        //     die('Something went wrong');
                        // }
                    }
                    else {
                        // Load view
                         $this->view('patients/v_register_for_meditation_instructor', $data);
                    }
                }
                else {
                    $data = [
                        'name' => $loggedPatient->first_name,
                        'age' => '',
                        'cnumber' => $loggedPatient->contact_number,
                        'gender' => '',
                        'meditation_instructor_id' => $meditation_instructor_id,
                        'appointment_day_id' => $appointment_day_id,
                        'noOfParticipants' => $noOfParticipants,
                        'current_participants' => $current_participants,
                        'fee' => $fee,
    
                        'name_err' => '',
                        'age_err' => '',
                        'cnumber_err' => '',
                        'gender_err' => ''
                    ];
    
                    // Load view
                    $this->view('patients/v_register_for_meditation_instructor', $data);
                }
                $data = [];
            }
            else {
                $_SESSION['need_login'] = true;
                // Redirect to login
                redirect('Login/login');
            }
        }

        // View doctor appointments
        public function viewMeditationInstructorAppointments() {
            if(isset($_SESSION['patient_id'])) {
                // Get current date and time
                date_default_timezone_set("Asia/Kolkata");
                $currentDate = date("Y-m-d");
                $currentTime = date("H:i:s");
                // Show all doctor appointments
                $appointments = $this->meditationInstructorAppointmentModel->getAllMeditationInstructorAppointments($_SESSION['patient_id']);
                $data = [
                    'appointments' => $appointments,
                    'currentDate' => $currentDate,
                    'currentTime' => $currentTime
                ];

                // Load view
                $this->view('patients/v_meditation_instructor_appointments', $data);
            }
            else {
                $_SESSION['need_login'] = true;
                // Redirect to login
                redirect('Login/login');
            }
        }

        // View doctor channeling history
        public function viewMeditationInstructorHistory() {
            if(isset($_SESSION['patient_id'])) {
                // Get current date and time
                date_default_timezone_set("Asia/Kolkata");
                $currentDate = date("Y-m-d");
                $currentTime = date("H:i:s");
                // Show all doctor appointments
                $appointments = $this->meditationInstructorAppointmentModel->getAllMeditationInstructorAppointments($_SESSION['patient_id']);
                $data = [
                    'appointments' => $appointments,
                    'currentDate' => $currentDate,
                    'currentTime' => $currentTime
                ];

                // Load view
                $this->view('patients/v_meditation_instructing_history', $data);
            }
            else {
                $_SESSION['need_login'] = true;
                // Redirect to login
                redirect('Login/login');
            }
        }

        // View sessions
        public function findSession() {
            // Show all sessions
            $counsellor_sessions = $this->sessionModel->getAllSessionsByCounsellor();
            $nutritionist_sessions = $this->sessionModel->getAllSessionsByNutritionist();
            $meditation_instructor_sessions = $this->sessionModel->getAllSessionsByMeditationInstructor();

            // Get current date and time
            date_default_timezone_set("Asia/Kolkata");
            $currentDate = date("Y-m-d");
            $currentTime = date("H:i:s");
            
            $data = [
                'counsellor_sessions' => $counsellor_sessions,
                'nutritionist_sessions' => $nutritionist_sessions,
                'meditation_instructor_sessions' => $meditation_instructor_sessions,
                'currentDate' => $currentDate,
                'currentTime' => $currentTime
            ];

            // Load view
            $this->view('patients/v_sessions', $data);
        }

        // Register for a session
        public function registerSession($session_id, $fee, $noOfParticipants, $current_participants) {
                if(isset($_SESSION['patient_id'])) {
                    $loggedPatient = $this->patientModel->getPatientById($_SESSION['patient_id']);
                }
                
                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Form is submitting
    
                    // Data validation
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                    // Inserted form
                    $data = [
                        'name' => trim($_POST['name']),
                        'age' => trim($_POST['age']),
                        'cnumber' => trim($_POST['cnumber']),
                        'gender' => trim($_POST['gender']),
                        'session_id' => $session_id,
                        'fee' => $fee,
                        'noOfParticipants' => $noOfParticipants,
                        'current_participants' => $current_participants,
    
                        'name_err' => '',
                        'age_err' => '',
                        'cnumber_err' => '',
                        'gender_err' => ''
                    ];
    
                    // Validate each input
    
                    // Validate name
                    if(empty($data['name'])) {
                        $data['name_err'] = 'Name required';
                    } else if(validateName($data['name']) != "true") {
                        $data['name_err'] = validateName($data['name']);
                    }
    
                    // Validate address
                    if(empty($data['age'])) {
                        $data['age_err'] = 'Age required';
                    } else if(validatePostitiveNumber($data['age']) != "true") {
                        $data['age_err'] = validatePostitiveNumber($data['age']);
                    }
    
                    // Validate contact number
                    if(empty($data['cnumber'])) {
                        $data['cnumber_err'] = 'Contact number required';
                    } else if(validateContactNumber($data['cnumber']) != "true") {
                        $data['cnumber_err'] = validateContactNumber($data['cnumber']);
                    }
    
                    // Validate gneder
                    if(empty($data['gender'])) {
                        $data['gender_err'] = 'Title required';
                    }
    
                    // Create order after validation
                    if(empty($data['name_err']) && empty($data['age_err']) && empty($data['cnumber_err']) && empty($data['gender_err'])) {
                        // Load invoice view
                        $this->view('patients/v_register_session_invoice', $data);
                    }
                    else {
                        // Load view
                         $this->view('patients/v_register_session', $data);
                    }
                }
                else {
                    // check if there is a logged patient
                    if(isset($_SESSION['patient_id'])) {
                        $data = [
                            'name' => $loggedPatient->first_name,
                            'age' => '',
                            'cnumber' => $loggedPatient->contact_number,
                            'gender' => '',
                            'session_id' => $session_id,
                            'fee' => $fee,
                            'noOfParticipants' => $noOfParticipants,
                            'current_participants' => $current_participants,
        
                            'name_err' => '',
                            'age_err' => '',
                            'cnumber_err' => '',
                            'gender_err' => ''
                        ];
                    }
                    else{
                        $data = [
                            'name' => '',
                            'age' => '',
                            'cnumber' => '',
                            'gender' => '',
                            'session_id' => $session_id,
                            'fee' => $fee,
                            'noOfParticipants' => $noOfParticipants,
                            'current_participants' => $current_participants,
        
                            'name_err' => '',
                            'age_err' => '',
                            'cnumber_err' => '',
                            'gender_err' => ''
                        ];
                    }
    
                    // Load view
                    $this->view('patients/v_register_session', $data);
                }
        }

        // View registered sessions
        public function viewRegisteredSessions() {
            if(isset($_SESSION['patient_id'])) {
                $registered_sessions = $this->sessionModel->getRegisteredSessions($_SESSION['patient_id']);

                // Get current date and time
                date_default_timezone_set("Asia/Kolkata");
                $currentDate = date("Y-m-d");
                $currentTime = date("H:i:s");
                $data = [
                    'registered_sessions' => $registered_sessions,
                    'currentDate' => $currentDate,
                    'currentTime' => $currentTime
                ];
    
                // Load view
                $this->view('patients/v_registered_sessions', $data);
            }
            else {
                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Form is submitting
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                    // Inserted form
                    $data = [
                        'cnumber' => trim($_POST['cnumber']),
    
                        'cnumber_err' => '',
                    ];

                    // Validate contact number
                    if(empty($data['cnumber'])) {
                        $data['cnumber_err'] = 'Contact number for given session required';
                    }
                    else {
                        //check for existing emails
                        if(!($this->sessionModel->findByNumber($data['cnumber']))) {
                            $data['cnumber_err'] = 'No such contact number given for a session';
                        }
                    }

                    // Get sessions after validation
                    if(empty($data['cnumber_err'])) {
                        $registered_sessions = $this->sessionModel->getRegisteredSessionsByNumber($data['cnumber']);

                        // Get current date and time
                        date_default_timezone_set("Asia/Kolkata");
                        $currentDate = date("Y-m-d");
                        $currentTime = date("H:i:s");
                        $data = [
                            'registered_sessions' => $registered_sessions,
                            'currentDate' => $currentDate,
                            'currentTime' => $currentTime
                        ];
    
                        // Load view
                        $this->view('patients/v_registered_sessions', $data);
                    }
                    else {
                        // Load view
                        $this->view('patients/v_registered_sessions_visitor', $data);
                    }

                    // Get current date and time
                    date_default_timezone_set("Asia/Kolkata");
                    $currentDate = date("Y-m-d");
                    $currentTime = date("H:i:s");

                    
                }
                else {
                    $data = [
                        'cnumber' => '',
    
                        'cnumber_err' => '',
                    ];

                    // Load view
                    $this->view('patients/v_registered_sessions_visitor', $data);
                }
            }
        }

        // View session details
        public function viewSessionDetails($session_id) {
            $session = $this->sessionModel->getSessionById($session_id);
            $data = [
                'session' => $session
            ];

            // Load view
            $this->view('patients/v_session_details', $data);
        }

    }

?>