<?php

    class Patient extends Controller{
        private $patientModel;
        private $complaintModel;
        private $doctorModel;
        private $pharmacistModel;
        private $orderRequestModel;
        public function __construct() {
            $this->patientModel = $this->model('M_Patient');
            $this->complaintModel = $this->model('M_Complaint');
            $this->doctorModel = $this->model('M_Doctor');
            $this->pharmacistModel = $this->model('M_Pharmacist');
            $this->orderRequestModel = $this->model('M_Order_Request');
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

    }

?>