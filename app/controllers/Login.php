<?php

    class Login extends Controller {
        private $patientModel;
        private $adminModel;
        private $medInstrModel;
        private $doctorModel;
        private $counsellorModel;
        
        public function __construct(){
            $this->patientModel = $this->model('M_Patient');
            $this->adminModel = $this->model('M_Admin');
            $this->medInstrModel = $this->model('M_MedInstr');
            $this->doctorModel = $this->model('M_Doctor');
            $this->counsellorModel = $this->model('M_Counsellor');
            
        }

        public function login() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Form is submitting
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                // Inserted form
                $data = [
                    'usertype' => trim($_POST['usertype']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),

                    'email_err' => '',
                    'password_err' => ''
                ];

                if($data['usertype'] == 'patient') {
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
                            $this->view('pages/v_login', $data);
                        }
                    }
                    else {
                        // Load view
                        $this->view('pages/v_login', $data);
                    }
                }
                elseif($data['usertype'] == 'admin'){
                    // Validate email
                    if(empty($data['email'])) {
                        $data['email_err'] = 'Email required';
                    }
                    else {
                        //check for existing emails
                        if($this->adminModel->findUserByEmail($data['email'])) {
                            // Admin found
                        }
                        else {
                            // Admin not found
                            $data['email_err'] = 'Invalid email';
                        }
                    }

                    // Validate password
                    if(empty($data['password'])) {
                        $data['password_err'] = 'Password required';
                    }

                    // Login Admin after validation
                    if(empty($data['email_err']) && empty($data['password_err'])) {
                        // Log the admin
                        $loggedAdmin = $this->adminModel->login($data['email'], $data['password']);
                    
                        if($loggedAdmin) {
                            // Admin is authenticated
                            // Create Admin session
                            $this->createAdminSession($loggedAdmin);
                        }
                        else {
                            $data['password_err'] = 'Invalid password';
                        
                            // Load view
                            $this->view('pages/v_login', $data);
                        }
                    }else {
                        // Load view
                        $this->view('pages/v_login', $data);
                    }
                }
               
                elseif($data['usertype'] == 'meditation_instructor'){
                        // Validate email
                        if(empty($data['email'])) {
                            $data['email_err'] = 'Email required';
                        }
                        else {
                            //check for existing emails
                            if($this->medInstrModel->findUserByEmail($data['email'])) {
                                // medInstr found
                            }
                            else {
                                // medInstr not found
                                $data['email_err'] = 'Invalid email';
                            }
                        }
    
                        // Validate password
                        if(empty($data['password'])) {
                            $data['password_err'] = 'Password required';
                        }
    
                        // Login medInstr after validation
                        if(empty($data['email_err']) && empty($data['password_err'])) {
                            // Log the medInstr
                            $loggedmedInstr = $this->medInstrModel->login($data['email'], $data['password']);
                        
                            if($loggedmedInstr) {
                                // medInstr is authenticated
                                // Create medInstr session
                                $this->createmedInstrSession($loggedmedInstr);
                            }
                            else {
                                $data['password_err'] = 'Invalid password';
                            
                                // Load view
                                $this->view('pages/v_login', $data);
                            }
                        }
                  
                    else {
                        // Load view
                        $this->view('pages/v_login', $data);
                    }
                }
                elseif($data['usertype'] == 'doctor') {
                    // Validate email
                    if(empty($data['email'])) {
                        $data['email_err'] = 'Email required';
                    }
                    else {
                        //check for existing emails
                        if($this->doctorModel->findDoctorByEmail($data['email'])) {
                            // Doctor found
                        }
                        else {
                            // Doctor not found
                            $data['email_err'] = 'Invalid email';
                        }
                    }

                    // Validate password
                    if(empty($data['password'])) {
                        $data['password_err'] = 'Password required';
                    }

                    // Login doctor after validation
                    if(empty($data['email_err']) && empty($data['password_err'])) {
                        // Log the patient
                        $loggedDoctor = $this->doctorModel->login($data['email'], $data['password']);
                    
                        if($loggedDoctor) {
                            // Doctor is authenticated
                            // Create doctor session
                            $this->createDoctorSession($loggedDoctor);
                        }
                        else {
                            $data['password_err'] = 'Invalid password';
                        
                            // Load view
                            $this->view('pages/v_login', $data);
                        }
                    }
                    else {
                        // Load view
                        $this->view('pages/v_login', $data);
                    }
                }
                elseif($data['usertype'] == 'counsellor') {
                    // Validate email
                    if(empty($data['email'])) {
                        $data['email_err'] = 'Email required';
                    }
                    else {
                        //check for existing emails
                        if($this->counsellorModel->findCounsellorByEmail($data['email'])) {
                            // Counsellor found
                        }
                        else {
                            // Counsellor not found
                            $data['email_err'] = 'Invalid email';
                        }
                    }

                    // Validate password
                    if(empty($data['password'])) {
                        $data['password_err'] = 'Password required';
                    }

                    // Login counsellor after validation
                    if(empty($data['email_err']) && empty($data['password_err'])) {
                        // Log the patient
                        $loggedCounsellor = $this->counsellorModel->login($data['email'], $data['password']);
                    
                        if($loggedCounsellor) {
                            // Doctor is authenticated
                            // Create doctor session
                            $this->createCounsellorSession($loggedCounsellor);
                        }
                        else {
                            $data['password_err'] = 'Invalid password';
                        
                            // Load view
                            $this->view('pages/v_login', $data);
                        }
                    }
                    else {
                        // Load view
                        $this->view('pages/v_login', $data);
                    }
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
                $this->view('pages/v_login', $data);
            }
        }

        public function createPatientSession($patient) {
            $_SESSION['patient_id'] = $patient->patient_id;
            $_SESSION['patient_email'] = $patient->email;
            $_SESSION['patient_name'] = $patient->first_name;
            $_SESSION['first_time_logged'] = true;
        
            redirect('Pages/index');
        }

        public function createAdminSession($admin) {
            $_SESSION['admin_id'] = $admin->admin_id;
            $_SESSION['admin_email'] = $admin->email;
            $_SESSION['admin_name'] = $admin->first_name;
        
            if($admin->gender=='Male'){
                $_SESSION['admin_gender']='Mr.';
            }else if($admin->gender=='Female'){
                 $_SESSION['admin_gender']='Ms.';
            }  

            redirect('AdminDashboard/adminDashBoard');
        }

        public function createmedInstrSession($medInstr) {
            $_SESSION['MedInstr_id']=$medInstr->meditation_instructor_id;
            $_SESSION['MedInstr_name']=$medInstr->first_name;
            $_SESSION['MedInstr_email']=$medInstr->email; 
            $_SESSION['MedInstr_address']=$medInstr->address;
            $_SESSION['MedInstr_fee']=$medInstr->fee; 
            
            if($medInstr->gender=='Male'){
               $_SESSION['MedInstr_gender']='Mr.';
            }else if($medInstr->gender=='Female'){
                $_SESSION['MedInstr_gender']='Ms.';
            }  
           
           redirect('MedInstrDashBoard/medInstrDashBoard');
          
        }

        public function createDoctorSession($doctor) {
            $_SESSION['doctor_id'] = $doctor->doctor_id;
            $_SESSION['doctor_email'] = $doctor->email;
            $_SESSION['doctor_name'] = $doctor->first_name;
            $_SESSION['first_time_logged'] = true;
        
            redirect('Doctor/dashboard');
        }

        public function createCounsellorSession($counsellor) {
            $_SESSION['counsellor_id'] = $counsellor->counsellor_id;
            $_SESSION['counsellor_email'] = $counsellor->email;
            $_SESSION['counsellor_name'] = $counsellor->first_name;
            $_SESSION['first_time_logged'] = true;
        
            redirect('Pages/index');
        }

        public function logout() {
           if(isset($_SESSION['patient_id'])){  
                unset($_SESSION['patient_id']);
                unset($_SESSION['patient_email']);
                unset($_SESSION['patient_name']);
                // session_destroy();

                $_SESSION['logout'] = true;
                redirect('Pages/index');
            }
            elseif(isset($_SESSION['admin_id'])){
                unset($_SESSION['admin_id']);
                unset($_SESSION['admin_name']);
                unset($_SESSION['admin_email']);
                unset($_SESSION['admin_gender']);
                session_destroy();
                
                redirect('pages/v_login');  
            }
            elseif(isset($_SESSION['MedInstr_id'])){
                unset($_SESSION['MedInstr_id']);
                unset($_SESSION['MedInstr_name']);
                unset($_SESSION['MedInstr_email']);
                unset($_SESSION['MedInstr_gender']);
                unset($_SESSION['MedInstr_address']);
                unset($_SESSION['MedInstr_fee']);
                session_destroy();
                
                redirect('pages/v_login');
            }
            elseif(isset($_SESSION['doctor_id'])){  
                unset($_SESSION['doctor_id']);
                unset($_SESSION['doctor_email']);
                unset($_SESSION['doctor_name']);
                // session_destroy();

                $_SESSION['logout'] = true;
                redirect('Pages/index');
            }
            elseif(isset($_SESSION['counsellor_id'])){  
                unset($_SESSION['counsellor_id']);
                unset($_SESSION['counsellor_email']);
                unset($_SESSION['counsellor_name']);
                // session_destroy();

                $_SESSION['logout'] = true;
                redirect('Pages/index');
            }

        }    
    }

?>