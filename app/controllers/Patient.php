<?php

    class Patient extends Controller{
        private $patientModel;
        private $complaintModel;
        private $doctorModel;
        private $pharmacistModel;
        private $orderRequestModel;
        private $counsellorModel;
        private $nutritionistModel;
        private $requestDietPlanModel;
        private $doctorChannelModel;
        private $doctorTimeslotModel;
        public function __construct() {
            $this->patientModel = $this->model('M_Patient');
            $this->complaintModel = $this->model('M_Complaint');
            $this->doctorModel = $this->model('M_Doctor');
            $this->pharmacistModel = $this->model('M_Pharmacist');
            $this->orderRequestModel = $this->model('M_Order_Request');
            $this->counsellorModel = $this->model('M_Counsellor');
            $this->nutritionistModel = $this->model('M_Nutritionist');
            $this->requestDietPlanModel = $this->model('M_Request_Diet_Plan');
            $this->doctorChannelModel = $this->model('M_Doctor_Channel');
            $this->doctorTimeslotModel = $this->model('M_Doctor_Timeslot');
        }

        public function signup() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Form is submitting

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
                }
                if(empty($data['lname'])) {
                    $data['lname_err'] = 'Last name required';
                }

                // Validate nic
                if(empty($data['nic'])) {
                    $data['nic_err'] = 'NIC required';
                }

                // Validate contact number
                if(empty($data['cnumber'])) {
                    $data['cnumber_err'] = 'Contact number required';
                }

                // Validate gender
                if(empty($data['gender'])) {
                    $data['gender_err'] = 'Gender required';
                }

                // Validate email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Email required';
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
                }
                else if(empty($data['password_confirmation'])) {
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
                        redirect('Patient/login');
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

        public function login() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Form is submitting
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                // Inserted form
                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),

                    'email_err' => '',
                    'password_err' => ''
                ];

                // Validate email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Email required';
                }
                else {
                    //check for existing emails
                    if($this->patientModel->findPatientByEmail($data['email'])) {
                        // Patient found
                    }
                    else {
                        // Patient not found
                        $data['email_err'] = 'Invalid email';
                    }
                }

                // Validate password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Password required';
                }

                // Login patient after validation
                if(empty($data['email_err']) && empty($data['password_err'])) {
                    // Log the patient
                    $loggedPatient = $this->patientModel->login($data['email'], $data['password']);
                
                    if($loggedPatient) {
                        // Patient is authenticated
                        // Create patient session
                        $this->createPatientSession($loggedPatient);
                    }
                    else {
                        $data['password_err'] = 'Invalid password';
                    
                        // Load view
                        $this->view('patients/v_login', $data);
                    }
                }
                else {
                    // Load view
                    $this->view('patients/v_login', $data);
                }
            }
            else {
                // Initial form
                $data = [
                    'email' => '',
                    'password' => '',

                    'email_err' => '',
                    'password_err' => ''
                ];

                // Load view
                $this->view('patients/v_login', $data);
            }
        }

        public function createPatientSession($patient) {
            $_SESSION['patient_id'] = $patient->patient_id;
            $_SESSION['patient_email'] = $patient->email;
            $_SESSION['patient_name'] = $patient->first_name;
        
            redirect('Pages/index');
        }

        public function logout() {
            unset($_SESSION['patient_id']);
            unset($_SESSION['patient_email']);
            unset($_SESSION['patient_name']);
            session_destroy();

            redirect('Pages/index');
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
                    'nic' => trim($_POST['nic']),
                    'cnumber' => trim($_POST['cnumber']),
                    'gender' => trim($_POST['gender']),
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
                }
                if(empty($data['lname'])) {
                    $data['lname_err'] = 'Last name required';
                }

                // Validate nic
                if(empty($data['nic'])) {
                    $data['nic_err'] = 'NIC required';
                }

                // Validate contact number
                if(empty($data['cnumber'])) {
                    $data['cnumber_err'] = 'Contact number required';
                }

                // Validate gender
                if(empty($data['gender'])) {
                    $data['gender_err'] = 'Gender required';
                }

                // Update patient details after validation
                if(empty($data['fname_err']) && empty($data['lname_err']) && empty($data['nic_err']) && empty($data['cnumber_err']) && empty($data['gender_err'])) {
                    // Update patient
                    if($this->patientModel->update($data, $_SESSION['patient_id'])) {
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

        // View and search doctors
        public function findDoctor() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Search using the given keyword
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $doctors = $this->doctorModel->getDoctors(trim($_POST['search']));
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
            $data = [
                'timeslots' => $timeslots,
                'doctor_id' => $doctor_id
            ];

            // Load view
            $this->view('patients/v_doctor_timeslots', $data);
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
                // Redirect to login
                redirect('Patient/login');
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
                // Redirect to login
                redirect('Patient/login');
            }
        }

        // View and search counsellors
        public function findCounsellor() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Search using the given keyword
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $counsellors = $this->counsellorModel->getCounsellors(trim($_POST['search']));
            }
            else {
                // Show all doctors
                $counsellors = $this->counsellorModel->getAllCounsellors();
            }
            $data = [
                'counsellors' => $counsellors
            ];

            // Load view
            $this->view('patients/v_counsellors', $data);
        }

        // View and search nutritionists
        public function findNutritionist() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Search using the given keyword
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $nutritionists = $this->nutritionistModel->getNutritionists(trim($_POST['search']));
            }
            else {
                // Show all doctors
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

                // Pass the pharmacist id for order medicine
                $this->requestDietPlan($nutritionist_id, $fee);
            }
        }

        // Request diet plan
        public function requestDietPlan($nutritionist_id, $fee) {
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
                    }
    
                    // Validate age
                    if(empty($data['age'])) {
                        $data['age_err'] = 'Age required';
                    }

                    // Validate gender
                    if(empty($data['gender'])) {
                        $data['gender_err'] = 'Gender required';
                    }
    
                    // Validate contact number
                    if(empty($data['cnumber'])) {
                        $data['cnumber_err'] = 'Contact number required';
                    }
    
                    // Validate weight
                    if(empty($data['weight'])) {
                        $data['weight_err'] = 'Weight required';
                    }

                    // Validate height
                    if(empty($data['height'])) {
                        $data['height_err'] = 'Height required';
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
                    }

                    // Validate water_consumption_per_day
                    if(empty($data['water_consumption_per_day'])) {
                        $data['water_consumption_per_day_err'] = 'Water consumption required';
                    }

                    // Validate goal
                    if(empty($data['goal'])) {
                        $data['goal_err'] = 'Goal required';
                    }
    
                    // Create order after validation
                    if(empty($data['name_err']) && empty($data['age_err']) && empty($data['gender_err']) && empty($data['cnumber_err']) && empty($data['weight_err']) && empty($data['height_err']) && empty($data['marital_status_err']) && empty($data['medical_details_err']) && empty($data['allergies_err']) && empty($data['sleeping_hours_err']) && empty($data['water_consumption_per_day_err']) && empty($data['goal_err'])) {
                        // Create order
                        if($this->requestDietPlanModel->createDietPlanRequest($data, $_SESSION['patient_id'])) {
                            redirect('Pages/index');
                        }
                        else {
                            die('Something went wrong');
                        }
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
                // Redirect to login
                redirect('Patient/login');
            }
        }

        // View pharmacies
        public function findPharmacy() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Search using the given keyword
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $pharmacists = $this->pharmacistModel->getpharmacists(trim($_POST['search']));
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
                    }
    
                    // Validate address
                    if(empty($data['address'])) {
                        $data['address_err'] = 'Address required';
                    }
    
                    // Validate contact number
                    if(empty($data['cnumber'])) {
                        $data['cnumber_err'] = 'Contact number required';
                    }
    
                    // Validate prescription and upload
                    if(uploadImage($data['prescription']['tmp_name'], $data['prescription_name'], '/img/prescriptions/')) {
                        // Done
                    }
                    else {
                        $data['prescription_err'] = 'Prescription required';
                    }
    
                    // Create order after validation
                    if(empty($data['name_err']) && empty($data['address_err']) && empty($data['cnumber_err']) && empty($data['prescription_err'])) {
                        // Create order
                        if($this->orderRequestModel->createOrderRequest($data, $_SESSION['patient_id'])) {
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
                // Redirect to login
                redirect('Patient/login');
            }
        }

        // View order requests
        public function viewOrderRequests() {
            if(isset($_SESSION['patient_id'])) {
            // Show all order requests
            $orders = $this->orderRequestModel->getAllOrderRequests($_SESSION['patient_id']);
            $data = [
                'orders' => $orders
            ];

            // Load view
            $this->view('patients/v_order_requests', $data);
            }
            else {
                // Redirect to login
                redirect('Patient/login');
            }
        }

    }

?>