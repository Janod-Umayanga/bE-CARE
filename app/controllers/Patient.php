<?php

    class Patient extends Controller{
        private $patientModel;
        public function __construct() {
            $this->patientModel = $this->model('M_Patient');
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

    }

?>