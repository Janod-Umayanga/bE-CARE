<?php

    class Login extends Controller {
        private $patientModel;
        private $adminModel;
        private $medInstrModel;
        private $doctorModel;
        private $counsellorModel;
        private $nutritionistModel;
        private $pharmacistModel;
        
        
        public function __construct(){
            $this->patientModel = $this->model('M_Patient');
            $this->adminModel = $this->model('M_Admin');
            $this->medInstrModel = $this->model('M_MedInstr');
            $this->doctorModel = $this->model('M_Doctor');
            $this->counsellorModel = $this->model('M_Counsellor');
            $this->nutritionistModel = $this->model('M_Nutritionist');
            $this->pharmacistModel = $this->model('M_Pharmacist');
            
        }

        public function login() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Form is submitting
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                // Inserted form
                //trim() whitespace characters removed from the beginning and end of the input string.

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
                    }else if(validateEmail($data['email'])!="true"){
                        $data['email_err']=validateEmail($data['email']);
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

                    $isDeactivated=$this->patientModel->isDeactivateAccount($data['email']);
                        
                    
                    if(!empty($isDeactivated)){
                        if($isDeactivated->delete_flag=='1') {
                            $data['email_err'] = 'Deactivated Account';
                        }
                        else {
                            
                        }
                    }
                                       

                    // Validate password
                    if(empty($data['password'])) {
                        $data['password_err'] = 'Password required';
                    }
                    // else if(validatePassword($data['password'])!="true"){
                    //     $data['password_err']=validatePassword($data['password']);
                    // }

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
                    }else if(validateEmail($data['email'])!="true"){
                        $data['email_err']=validateEmail($data['email']);
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

                    $isDeactivated=$this->adminModel->isDeactivateAccount($data['email']);
                    
                    if(!empty($isDeactivated)){
                        if($isDeactivated->delete_flag=='1') {
                            $data['email_err'] = 'Deactivated Account';
                        }
                        else {
                            
                        }
                    }
                    
                    // Validate password
                    if(empty($data['password'])) {
                        $data['password_err'] = 'Password required';
                    }
                    // else if(validatePassword($data['password'])!="true"){
                    //     $data['password_err']=validatePassword($data['password']);
                    //    }

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
                        }else if(validateEmail($data['email'])!="true"){
                            $data['email_err']=validateEmail($data['email']);
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
                        $isDeactivated=$this->medInstrModel->isDeactivateAccount($data['email']);
                     
                        if(!empty($isDeactivated)){

                            if($isDeactivated->delete_flag=='1') {
                                $data['email_err'] = 'Deactivated Account';
                            }
                            else {
                                
                            }

                       }
                        // Validate password
                        if(empty($data['password'])) {
                            $data['password_err'] = 'Password required';
                        }
                        // else if(validatePassword($data['password'])!="true"){
                        //     $data['password_err']=validatePassword($data['password']);
                        // }
    
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
                    }else if(validateEmail($data['email'])!="true"){
                        $data['email_err']=validateEmail($data['email']);
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

                    $isDeactivated=$this->doctorModel->isDeactivateAccount($data['email']);

                    if(!empty($isDeactivated)){
                        if($isDeactivated->delete_flag=='1') {
                            $data['email_err'] = 'Deactivated Account';
                        }
                        else {
                            
                        }
                    }    

                    // Validate password
                    if(empty($data['password'])) {
                        $data['password_err'] = 'Password required';
                    }
                    // else if(validatePassword($data['password'])!="true"){
                    //     $data['password_err']=validatePassword($data['password']);
                    // }

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
                    }else if(validateEmail($data['email'])!="true"){
                        $data['email_err']=validateEmail($data['email']);
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

                    $isDeactivated=$this->counsellorModel->isDeactivateAccount($data['email']);
                     
                    if(!empty($isDeactivated)){
                        if($isDeactivated->delete_flag=='1') {
                            $data['email_err'] = 'Deactivated Account';
                        }
                        else {
                            
                        }
                    }    

                    // Validate password
                    if(empty($data['password'])) {
                        $data['password_err'] = 'Password required';
                    }
                    // else if(validatePassword($data['password'])!="true"){
                    //     $data['password_err']=validatePassword($data['password']);
                    // }

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

                elseif($data['usertype'] == 'nutritionist') {
                    // Validate email
                    if(empty($data['email'])) {
                        $data['email_err'] = 'Email required';
                    }else if(validateEmail($data['email'])!="true"){
                        $data['email_err']=validateEmail($data['email']);
                    }
                    else {
                        //check for existing emails
                        if($this->nutritionistModel->findNutritionistByEmail($data['email'])) {
                            // Nutritionist found
                        }
                        else {
                            // Nutritionist not found
                            $data['email_err'] = 'Invalid email';
                        }
                    }

                    $isDeactivated=$this->nutritionistModel->isDeactivateAccount($data['email']);
                     
                    if(!empty($isDeactivated)){

                        if($isDeactivated->delete_flag=='1') {
                            $data['email_err'] = 'Deactivated Account';
                        }
                        else {
                            
                        }
                    }    

                    // Validate password
                    if(empty($data['password'])) {
                        $data['password_err'] = 'Password required';
                    }
                    // else if(validatePassword($data['password'])!="true"){
                    //     $data['password_err']=validatePassword($data['password']);
                    // }

                    // Login nutritionist after validation
                    if(empty($data['email_err']) && empty($data['password_err'])) {
                        // Log the Nutritionist
                        $loggedNutritionist = $this->nutritionistModel->login($data['email'], $data['password']);
                    
                        if($loggedNutritionist) {
                            // Doctor is authenticated
                            // Create doctor session
                            $this->createNutritionistSession($loggedNutritionist);
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


                elseif($data['usertype'] == 'pharmacist') {
                    // Validate email
                    if(empty($data['email'])) {
                        $data['email_err'] = 'Email required';
                    }else if(validateEmail($data['email'])!="true"){
                        $data['email_err']=validateEmail($data['email']);
                    }
                    else {
                        //check for existing emails
                        if($this->pharmacistModel->findPharmacistByEmail($data['email'])) {
                            // Pharmacist found
                        }
                        else {
                            // Pharmacist not found
                            $data['email_err'] = 'Invalid email';
                        }
                    }

                    $isDeactivated=$this->pharmacistModel->isDeactivateAccount($data['email']);
                    
                    if(!empty($isDeactivated)){

                        if($isDeactivated->delete_flag=='1') {
                            $data['email_err'] = 'Deactivated Account';
                        }
                        else {
                            
                        }
                    }
                        
                    // Validate password
                    if(empty($data['password'])) {
                        $data['password_err'] = 'Password required';
                    }
                    // else if(validatePassword($data['password'])!="true"){
                    //     $data['password_err']=validatePassword($data['password']);
                    // }
                    

                    // Login pharmacist after validation
                    if(empty($data['email_err']) && empty($data['password_err'])) {
                        // Log the patient
                        $loggedPharmacist = $this->pharmacistModel->login($data['email'], $data['password']);
                    
                        if($loggedPharmacist) {
                            // Doctor is authenticated
                            // Create doctor session
                            $this->createPharmacistSession($loggedPharmacist);
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
            $_SESSION['first_time_logged_Admin'] = true;
            $_SESSION['admin_gender']=$admin->gender;
            $_SESSION['admin_nic']=$admin->nic;
            $_SESSION['admin_contact_number']=$admin->contact_number;
            $_SESSION['admin_account_number']=$admin->account_number;
    
            redirect('AdminDashboard/adminDashBoard');
        }

        public function createmedInstrSession($medInstr) {
            $_SESSION['MedInstr_id']=$medInstr->meditation_instructor_id;
            $_SESSION['MedInstr_name']=$medInstr->first_name;
            $_SESSION['MedInstr_email']=$medInstr->email; 
            $_SESSION['MedInstr_address']=$medInstr->address;
            $_SESSION['MedInstr_fee']=$medInstr->fee;
            $_SESSION['first_time_logged_MedInstr'] = true; 
            $_SESSION['MedInstr_gender']=$medInstr->gender;
            $_SESSION['MedInstr_nic']=$medInstr->nic;
            $_SESSION['MedInstr_contact_number']=$medInstr->contact_number;
            $_SESSION['MedInstr_account_number']=$medInstr->account_number;
       
           
           redirect('MedInstrDashBoard/medInstrDashBoard');
          
        }

        public function createDoctorSession($doctor) {
            $_SESSION['doctor_id'] = $doctor->doctor_id;
            $_SESSION['doctor_email'] = $doctor->email;
            $_SESSION['doctor_name'] = $doctor->first_name;
            $_SESSION['doctor_contact_number'] = $doctor->contact_number;
            $_SESSION['doctor_nic'] = $doctor->nic;
            $_SESSION['doctor_slmc_reg_number'] = $doctor->slmc_reg_number;
            $_SESSION['doctor_account_number'] = $doctor->account_number;
            $_SESSION['first_time_logged'] = true;
        
            redirect('Doctor/dashboard');
        }

        public function createCounsellorSession($counsellor) {
            $_SESSION['counsellor_id'] = $counsellor->counsellor_id;
            $_SESSION['counsellor_email'] = $counsellor->email;
            $_SESSION['counsellor_name'] = $counsellor->first_name;
            $_SESSION['counsellor_contact_number'] = $counsellor->contact_number;
            $_SESSION['counsellor_nic'] = $counsellor->nic;
            $_SESSION['counsellor_slmc_reg_number'] = $counsellor->slmc_reg_number;
            $_SESSION['counsellor_account_number'] = $counsellor->account_number;

            $_SESSION['first_time_logged'] = true;
        
            redirect('Counsellor/dashboard');
        }

        public function createNutritionistSession($nutritionist) {
            $_SESSION['nutritionist_id'] = $nutritionist->nutritionist_id;
            $_SESSION['nutritionist_email'] = $nutritionist->email;
            $_SESSION['nutritionist_name'] = $nutritionist->first_name;
            $_SESSION['first_time_logged'] = true;
            $_SESSION['nutritionist_gender']=$nutritionist->gender;


            redirect('Nutritionist/nutritionistDashBoard');
        }

        public function createPharmacistSession($pharmacist) {
            $_SESSION['pharmacist_id'] = $pharmacist->pharmacist_id;
            $_SESSION['pharmacist_email'] = $pharmacist->email;
            $_SESSION['pharmacist_name'] = $pharmacist->first_name;
            $_SESSION['first_time_logged'] = true;
            $_SESSION['pharmacist_gender']=$pharmacist->gender;
            
                    
             redirect('Pharmacist/pharmacistDashBoard');
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
                unset($_SESSION['admin_nic']);
                unset($_SESSION['admin_contact_number']);
                unset($_SESSION['admin_account_number']);
        
               // session_destroy();
          
                $_SESSION['logout'] = true;
                redirect('Pages/index');  
            }
            elseif(isset($_SESSION['MedInstr_id'])){
                unset($_SESSION['MedInstr_id']);
                unset($_SESSION['MedInstr_name']);
                unset($_SESSION['MedInstr_email']);
                unset($_SESSION['MedInstr_gender']);
                unset($_SESSION['MedInstr_address']);
                unset($_SESSION['MedInstr_fee']);
                unset($_SESSION['medInstrsession_id']);
                
                unset($_SESSION['MedInstr_nic']);
                unset($_SESSION['MedInstr_contact_number']);
                unset($_SESSION['MedInstr_account_number']);
                //session_destroy();
              
                $_SESSION['logout'] = true;
                
                redirect('Pages/index');
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
            elseif(isset($_SESSION['nutritionist_id'])){  
                unset($_SESSION['nutritionist_id']);
                unset($_SESSION['nutritionist_email']);
                unset($_SESSION['nutritionist_name']);
                // session_destroy();

                $_SESSION['logout'] = true;
                 redirect('Pages/index');
            }
            elseif(isset($_SESSION['pharmacist_id'])){  
                unset($_SESSION['pharmacist_id']);
                unset($_SESSION['pharmacist_email']);
                unset($_SESSION['pharmacist_name']);
                // session_destroy();

                $_SESSION['logout'] = true;
                 redirect('Pages/index');
            }

        }    


        //forgot Password

        public function forgotPassword() {
          
          if($_SERVER['REQUEST_METHOD']=='POST'){
          
              $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                 
                $email = $_POST['forgot_email']; 
                       
                if(isset($_POST['usertype'])){
                    $_SESSION['usertype'] = $_POST['usertype'];
                }
                $userType=  $_SESSION['usertype'];

                if(isset(($_POST['forgot_email']))){
                    $_SESSION['email_reset_password'] = $_POST['forgot_email'];
                }

               

                if(empty($email)){
                    $data = [
                        'email_err' => 'please enter your email address',
                        'email'=>''
                     ];

                    $this->view('pages/v_forgotpassword', $data); 
               
                 }

                 $token = md5(rand());
                 
                 //Patient
                 if($userType=='patient'){
                    $row = $this->patientModel->findPatientByEmail($email);
          
                 //Doctor   
                 }else if($userType=='doctor'){
                    $row = $this->doctorModel->findDoctorByEmail($email);
                
                 //Counsellor    
                 }else if($userType=='counsellor'){
                    $row = $this->counsellorModel->findCounsellorByEmail($email);
                
                 //Pharmacist   
                 }else if($userType=='pharmacist'){
                    $row = $this->pharmacistModel->findPharmacistByEmail($email);
                
                //Nutritionist    
                 }else if($userType=='nutritionist'){
                    $row = $this->nutritionistModel->findNutritionistByEmail($email);
                
                //Meditation Instructor    
                 }else if($userType=='meditation_instructor'){
                    $row = $this->medInstrModel->findUserByEmail($email);
                
                //Admin    
                 }else if($userType=='admin'){
                    $row = $this->adminModel->findUserByEmail($email);
            
                 }

                if($row) {
                    $name = $row->first_name; 
                  
                     //Patient
                     if($userType=='patient'){
                        $updateResult= $this->patientModel->setToken($token,$email);
                    
                     //Doctor   
                     }else if($userType=='doctor'){
                        $updateResult= $this->doctorModel->setToken($token,$email);
                    
                    //Counsellor    
                     }else if($userType=='counsellor'){
                        $updateResult= $this->counsellorModel->setToken($token,$email);
                    
                    //Pharmacist  
                     }else if($userType=='pharmacist'){
                        $updateResult= $this->pharmacistModel->setToken($token,$email);
                    
                    //Nutritionist  
                     }else if($userType=='nutritionist'){
                        $updateResult= $this->nutritionistModel->setToken($token,$email);
                    
                    //Meditation Instructor    
                    }else if($userType=='meditation_instructor'){
                        $updateResult= $this->medInstrModel->setToken($token,$email);
           
                    //Admin    
                    }else if($userType=='admin'){
                        $updateResult= $this->adminModel->setToken($token,$email);
                
                     }
    
     
                     $flag=1;
                     if($updateResult) {
                         $val = sendMail($email,$name, $token, $flag, $userType);
          
                         if($val){
                             $data = [
                                 'email_err' => 'We emailed you a password reset link',
                                 'email'=>$email
                              ];
         
                             $this->view('pages/v_forgotpassword', $data); 
                         }else{
                             $data = [
                                 'email_err' => 'Oops... Something went wrong',
                                 'email'=>''
                             ];
             
                             $this->view('pages/v_forgotpassword', $data); 
                         }
                                         
                    } else {
                           $_SESSION['status'] = "Something went wrong.";
                          
                           $data = [
                                'email_err' => 'Something went wrong.',
                                'email'=>''     
                           ];
                 
                           $this->view('pages/v_forgotpassword', $data);                        }
                               
                     
                }else{
                
                      $data = [
                         
                         'email_err' => 'No Email Found',
                         'email'=>''
                     ];
     
                     $this->view('pages/v_forgotpassword', $data);  
                 }
               
     
          }else{
                     //initial form
                     $data = [
                         'email_err' => '',
                         'email'=>''
                     ];
     
                     //load view
                     $this->view('pages/v_forgotpassword', $data);
     
             }
       }

        //Reset password
       public function reset_password()
       {
          
           if($_SERVER['REQUEST_METHOD']=='POST'){
           
              $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                         
                        $email=$_SESSION['email_reset_password'];
                        $userType=$_SESSION['usertype'];
          
                    //patient    
                    if($userType=='patient'){
                        $userRow=$this->patientModel->findPatientByEmail($email);
                        $tokenExpire = $this->patientModel->checkToken($email);
                        $userId=$userRow -> patient_id;
                       
                     //doctor
                     }else if($userType=='doctor'){
                        $userRow=$this->doctorModel->findDoctorByEmail($email);
                        $tokenExpire = $this->doctorModel->checkToken($email);
                        $userId=$userRow -> doctor_id;
                     
                     //counsellor   
                     }else if($userType=='counsellor'){
                        $userRow=$this->counsellorModel->findCounsellorByEmail($email);
                        $tokenExpire = $this->counsellorModel->checkToken($email);
                        $userId=$userRow -> counsellor_id;
                     
                     //pharmacist   
                     }else if($userType=='pharmacist'){
                        $userRow=$this->pharmacistModel->findPharmacistByEmail($email);
                        $tokenExpire = $this->pharmacistModel->checkToken($email);
                        $userId=$userRow -> pharmacist_id;
                     
                     //nutritionist   
                     }else if($userType=='nutritionist'){
                        $userRow=$this->nutritionistModel->findNutritionistByEmail($email);
                        $tokenExpire = $this->nutritionistModel->checkToken($email);
                        $userId=$userRow -> nutritionist_id;
                     
                     //meditation_instructor   
                     }else if($userType=='meditation_instructor'){
                        $userRow=$this->medInstrModel->findUserByEmail($email);
                        $tokenExpire = $this->medInstrModel->checkToken($email);
                        $userId=$userRow -> meditation_instructor_id;
 
                     //admin   
                     }else if($userType=='admin'){
                        $userRow=$this->adminModel->findUserByEmail($email);
                        $tokenExpire = $this->adminModel->checkToken($email);
                        $userId=$userRow -> admin_id;
                     }
    
                      
                     $token=$_SESSION['password_Token'];
                    
                      $data = [
                          'new_pwd' => trim($_POST['new_pwd']),       
                          'password' => trim($_POST['password']),
                          'email' => trim($_POST['email']),
                          'pwd_token' => $_SESSION['password_Token'],
                          'user_id'=> $userId,
       
                          'new_pwd_err' => '',
                          'other_err' => '',
                      ];
                      
                     
                    if($data['new_pwd']!=$data['password']){
                         $data['other_err']='New password and confirm password is diffrent';
                    } 
                  
                    if(empty($data['new_pwd'])){
                            $data['new_pwd_err']='Please enter a new password';
                    }
                    else if(validatePassword($data['new_pwd'])!="true"){
                        $data['new_pwd_err']=validatePassword($data['new_pwd']);
                    }
                     
                        
                    if(empty($data['password'])){
                          $data['other_err']='Please retype your new password';
                    }
                    else if(validatePassword($data['password'])!="true"){
                        $data['other_err']=validatePassword($data['password']);
                       }
                     
  
                 
                    if($token != $tokenExpire->verify_token){
                             $data['other_err'] = 'Oops, it looks like your password reset link has expired. Please request a new password reset link and try again.';
                    }
  
                    
             
               if(empty($data['new_pwd_err']) && empty($data['other_err']) ){
               
                    $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
          
                    //patient
                    if($userType=='patient'){
                        $resetPW=$this->patientModel->changePW($data);
                        $token = md5(rand());
                        $this->patientModel->setToken($token,$email);
                    
                    //doctor    
                     }else if($userType=='doctor'){
                        $resetPW=$this->doctorModel->changePW($data);
                        $token = md5(rand());
                        $this->doctorModel->setToken($token,$email);
                    
                    //counsellor    
                     }else if($userType=='counsellor'){
                        $resetPW=$this->counsellorModel->changePW($data);
                        $token = md5(rand());
                        $this->counsellorModel->setToken($token,$email);
                    
                     //pharmacist
                     }else if($userType=='pharmacist'){
                        $resetPW=$this->pharmacistModel->changePW($data);
                        $token = md5(rand());
                        $this->pharmacistModel->setToken($token,$email);
                    
                      //nutritionist
                     }else if($userType=='nutritionist'){
                        $resetPW=$this->nutritionistModel->changePW($data);
                        $token = md5(rand());
                        $this->nutritionistModel->setToken($token,$email);
                    
                      //meditation_instructor  
                     }else if($userType=='meditation_instructor'){
                        $resetPW=$this->medInstrModel->changePW($data);
                        $token = md5(rand());
                        $this->medInstrModel->setToken($token,$email);
                    
                      //admin   
                     }else if($userType=='admin'){
                        $resetPW=$this->adminModel->changePW($data);
                        $token = md5(rand());
                        $this->adminModel->setToken($token,$email);
                    
                     }
                    

                    if($resetPW){
                         redirect('Login/login');      
                             
                    }else{
                         $data['other_err']='something wrong';
                         $this->view('pages/v_resetPassword', $data);
                    }   
               }else{
                       $this->view('pages/v_resetPassword', $data);
               }
              
             
              }else{
                  //initial form
                  $data = [
                      'new_pwd' => '',       
                      'password' => '',
                      'email' => '',
                      'pwd_token' => '',
   
                      'new_pwd_err' => '',
                      'other_err' => '',
                  ];
  
                  //load view
                  $this->view('pages/v_resetPassword', $data);
              }
    
      }


    }

?>
