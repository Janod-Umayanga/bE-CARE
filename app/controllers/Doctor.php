<?php

    class Doctor extends Controller{
        private $doctorModel;
        private $doctorTimeslotModel;
        public function __construct() {
            $this->doctorModel = $this->model('M_Doctor');
            $this->doctorTimeslotModel = $this->model('M_Doctor_Timeslot');
        }

        public function dashboard() {
            $data = [];

            if(isset($_SESSION['doctor_id'])){
                // Load view
                $this->view('doctor/v_dashboard');
            }
            else{
                redirect('Login/login');
            }
            
        }

        // View doctor timeslots
        public function timeslots() {
            if(isset($_SESSION['doctor_id'])) {
                // Get current date and time
                date_default_timezone_set("Asia/Kolkata");
                $currentDate = date("Y-m-d");
                $currentTime = date("H:i:s");
                // Show all doctor timeslots
                $timeslots = $this->doctorTimeslotModel->getTimeslotByDoctorId($_SESSION['doctor_id']);
                $data = [
                    'timeslots' => $timeslots,
                    'currentDate' => $currentDate,
                    'currentTime' => $currentTime
                ];

                // Load view
                $this->view('doctor/v_timeslots', $data);
            }
            else {
                // Redirect to login
                redirect('Login/login');
            }
        }

        // Create timeslot
        public function addTimeslot() {
            if(isset($_SESSION['doctor_id'])) {

                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Form is submitting
    
                    // Data validation
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                    // Inserted form
                    $data = [
                        'day' => trim($_POST['day']),
                        'starting_time' => trim($_POST['starting_time']),
                        'ending_time' => trim($_POST['ending_time']),
                        'duration' => trim($_POST['duration']),
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
                    }else if(validateFee($data['fee'])!="true"){
                      $data['fee_err']=validateFee($data['fee']);
                     }

                    // Validate address
                    if(empty($data['address'])) {
                        $data['address_err'] = 'Address required';
                    }else if(validateAddress($data['address'])!="true"){
                      $data['address_err']=validateAddress($data['address']);
                     }
    
                    // Create timeslot after validation
                    if(empty($data['day_err']) && empty($data['starting_time_err']) && empty($data['ending_time_err']) && empty($data['fee_err']) && empty($data['address_err'])) {
                        // Create timeslot
                        if($this->doctorTimeslotModel->createTimeslot($data, $_SESSION['doctor_id'])) {
                            $_SESSION['timeslot_added'] = true;
                            redirect('Doctor/dashboard');
                        }
                        else {
                            die('Something went wrong');
                        }
                    }
                    else {
                        // Load view
                         $this->view('doctor/v_add_timeslot', $data);
                    }
                }
                else {
                    $data = [
                        'day' => '',
                        'starting_time' => '',
                        'ending_time' => '',
                        'duration' => '',
                        'fee' => '',
                        'address' => '',
    
                        'day_err' => '',
                        'starting_time_err' => '',
                        'ending_time_err' => '',
                        'fee_err' => '',
                        'address_err' => ''
                    ];
    
                    // Load view
                    $this->view('doctor/v_add_timeslot', $data);
                }
                $data = [];
            }
            else {
                // Redirect to login
                redirect('Login/login');
            }
        }


public function profile() {

   if(isset($_SESSION['doctor_id'])) {  
  
   $doctor= $this->doctorModel->findDoctorByID($_SESSION['doctor_id']);
   $data=[ 
    'email' => $doctor->email,                
    'first_name'=>$doctor->first_name,
    'last_name'=>$doctor->last_name,
    'nic'=>$doctor->nic,
    'slmc_reg_number'=>$doctor->slmc_reg_number,
    'specialization'=>$doctor->specialization,
    'qualification_file'=>$doctor->qualification_file,
    'type'=>$doctor->type,
    'contact_number'=>$doctor->contact_number,
    'bank_name'=>$doctor->bank_name,
    'account_holder_name'=>$doctor->account_holder_name,
    'branch'=>$doctor->branch,
    'account_number'=>$doctor->account_number,
    'gender'=>$doctor->gender,
    'city'=>$doctor->city,
    
  
    'first_name_err'=>'',
    'last_name_err'=>'',
    'nic_err'=>'',
    'specialization_err'=>'',
    'qualification_file_err'=>'',
    'slmc_reg_number_err'=>'',
    'contact_number_err'=>'',
    'bank_name_err'=>'',
    'account_holder_name_err'=>'',
    'branch_err'=>'',
    'account_number_err'=>'',
    'gender_err'=>'',
    'city_err'=>'',
    'type_err'=>''
    
 
   ];
   $this->view('doctor/v_profile',$data);

}else{
   redirect('Login/login');
 }

  }



  public function edit_profile($userId){
  
    if(isset($_SESSION['doctor_id'])) {  
   
    if($_SERVER['REQUEST_METHOD']=='POST'){
         $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
 
         $data=[
           'email'=> $_SESSION['doctor_email'],
           'doctor_id'=>$userId,
           'first_name'=>trim($_POST['first_name']),
           'last_name'=>trim($_POST['last_name']),
           'nic'=>trim($_POST['nic']),
           'contact_number'=>trim($_POST['contact_number']),
           'bank_name'=>trim($_POST['bank_name']),
           'account_holder_name'=>trim($_POST['account_holder_name']),
           'branch'=>trim($_POST['branch']),
           'account_number'=>trim($_POST['account_number']),
           
           
           
           'first_name_err'=>'',
           'last_name_err'=>'',
           'nic_err'=>'',
           'contact_number_err'=>'',
           'bank_err'=>'',
           'account_holder_name_err'=>'',
           'branch_err'=>'',
           'account_number_err'=>'',
           'gender_err'=>'',
           'city_err'=>''
           
           
          
        ];
 
       
        if(empty($data['first_name'])){
           $data['first_name_err']='first name can not be empty';
        }
 
        if(empty($data['last_name'])){
           $data['last_name_err']='last name can not be empty';
        }
 
        if(empty($data['nic'])){
           $data['nic_err']='nic can not be empty';
        }
 
        if(empty($data['contact_number'])){
           $data['contact_number_err']='contact number can not be empty';
        }
 
        if(empty($data['bank_name'])){
         $data['bank_name_err']='bank name can not be empty';
      }
 
       if(empty($data['account_holder_name'])){
           $data['account_holder_name_err']='account holder name can not be empty';
       }
 
       if(empty($data['branch'])){
           $data['branch_err']='branch name can not be empty';
       }
 
       
 
        if(empty($data['account_number'])){
           $data['account_number_err']='account number can not be empty';
        }
 
        
       if(empty($data['first_name_err']) && empty($data['last_name_err'])&& empty($data['nic_err'])&& empty($data['contact_number_err'])&& empty($data['address_err'])&& empty($data['fee_err'])&& empty($data['bank_err'])&& empty($data['account_holder_name_err'])&& empty($data['branch_err'])&& empty($data['account_number_err'])){
             if($this->doctorModel->editUser($data)){
                   $_SESSION['profile_update']="true";
                   $this->view('doctor/v_profile',$data);    
             }else{
               $this->view('doctor/v_profile',$data);    
             }  
        
       }else{
         $this->view('doctor/v_profile',$data);     
       }
 
 
 
     }else{
        $user= $this->doctorModel->findDoctorByID($userId);
 
        
       $data=[
         'email' => $user->email, 
         'first_name'=>$user->first_name,
         'last_name'=>$user->last_name,
         'nic'=>$user->nic,
         'slmc'=>$user->slmc_reg_number,
         'specialization'=>$user->specialization,
         'qualification_file'=>$user->qualification_file,
         'type'=>$user->type,
         'contact_number'=>$user->contact_number,
         'bank_name'=>$user->bank_name,
         'account_holder_name'=>$user->account_holder_name,
         'branch'=>$user->branch,
         'account_number'=>$user->account_number,
         'gender'=>$user->gender,
         'city'=>$user->city,

 
           'first_name_err'=>'',
           'last_name_err'=>'',
           'nic_err'=>'',
           'contact_number_err'=>'',
           'bank_err'=>'',
           'account_holder_name_err'=>'',
           'branch_err'=>'',
           'account_number_err'=>'',
           'gender_err'=>'',
           'city_err'=>''
          
       
        ];
 
        redirect('Doctor/profile'); 
     }}else{
       redirect('Login/login');  
     }
    
  }

  
  public function changePassword()
  {
   if(isset($_SESSION['doctor_id'])) {  
  
  // $doctor= $this->doctorModel->changeUserPW($_SESSION['doctor_id']);
   $data=[                      
    'current_password_err'=>'',
    'retype_new_password_err'=>'' ,
    'new_password_err'=>''
   ];
   $this->view('doctor/v_changePassword',$data);

}else{
   redirect('Login/login');  
 }

  }

  public function updatePassword($id){
  
    if(isset($_SESSION['doctor_id'])) {  
   
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
  
        $data = [
          'doctor_id' => $id,  
          'current_password'=>trim($_POST['current_password']),
          'new_password'=>trim($_POST['new_password']),      
          'retype_new_password'=>trim($_POST['retype_new_password']),      
        
          'current_password_err'=>'',
          'retype_new_password_err'=>'' ,
          'new_password_err'=>'' ];      
         
 
        if(empty($data['current_password'])){
          $data['current_password_err']='Please enter a current password';
       
        }else{
           if($this->doctorModel->findUserPWMatch($id,$data['current_password'])){
      
          }else{
                 $data['current_password_err']='Current password is incorrect';
           }  
         
        }
        if($data['new_password']!=$data['retype_new_password']){
         $data['new_password_err']='New password and retype new password is incorrect';
        } 
 
        if(empty($data['new_password'])){
           $data['new_password_err']='Please enter a new password';
        } 
        
        if(empty($data['retype_new_password'])){
         $data['retype_new_password_err']='Please retype new password';
      } 
 
        if(empty($data['current_password_err']) && empty($data['retype_new_password_err']) && empty($data['new_password_err'])){
      
         $data['password']=password_hash($data['new_password'],PASSWORD_DEFAULT);
         $changeUserPW=$this->doctorModel->changePW($data);
 
           if($changeUserPW){
              redirect('Doctor/changePassword');    
             
           }
           else{
            $data['retype_new_password_err']='something wrong';
            $this->view('doctor/v_changePassword',$data);
           }   
        }else{
          $this->view('doctor/v_changePassword',$data);
        } 
      }else{
      $data = [
       'current_password'=>'',
       'new_password'=>'',      
       'retype_new_password'=>'',      
     
       'current_password_err'=>'',
       'retype_new_password_err'=>'' ,
       'new_password_err'=>''    
      ];
       $this->view('doctor/v_changePassword',$data);     
    } 
 }else{
    redirect('Login/login');  
  }
 
 }

 public function enableTimeslot($channel_day_id) {

    if(isset($_SESSION['doctor_id'])) {
        if ($this->doctorTimeslotModel->enableDoctorChannelDay($channel_day_id)) {
          redirect('DoctorAppoinments/DoctorAppoinments');
        }
    }
    else {
        $_SESSION['need_login'] = true;
        // Redirect to login
        redirect('Login/login');
    }
  }

  public function disableTimeslot($channel_day_id) {

    if(isset($_SESSION['doctor_id'])) {
        if ($this->doctorTimeslotModel->disableDoctorChannelDay($channel_day_id)) {
          redirect('DoctorAppoinments/DoctorAppoinments');
        }
    }
    else {
        $_SESSION['need_login'] = true;
        // Redirect to login
        redirect('Login/login');
    }
  }

  public function continueTimeslot($timeslot_id) {

    if(isset($_SESSION['doctor_id'])) {
        if ($this->doctorTimeslotModel->continueDoctorChannelDay($timeslot_id)) {
          redirect('Doctor/Timeslots');
        }
    }
    else {
        $_SESSION['need_login'] = true;
        // Redirect to login
        redirect('Login/login');
    }
  }

  public function discontinueTimeslot($timeslot_id) {

    if(isset($_SESSION['doctor_id'])) {
        if ($this->doctorTimeslotModel->discontinueDoctorChannelDay($timeslot_id)) {
          redirect('Doctor/Timeslots');
        }
    }
    else {
        $_SESSION['need_login'] = true;
        // Redirect to login
        redirect('Login/login');
    }
  }
 


    }

?>