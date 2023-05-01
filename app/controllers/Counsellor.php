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
              // Show all counsellor timeslots
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
                      if($this->counsellorTimeslotModel->createTimeslot($data, $_SESSION['counsellor_id'])) {
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

      public function profile() {

        if(isset($_SESSION['counsellor_id'])) {  
       
        $counsellor= $this->counsellorModel->findCounsellorByID($_SESSION['counsellor_id']);
        $data=[ 
         'email' => $counsellor->email,                
         'first_name'=>$counsellor->first_name,
         'last_name'=>$counsellor->last_name,
         'nic'=>$counsellor->nic,
         'slmc_reg_number'=>$counsellor->slmc_reg_number,
         'qualification_file'=>$counsellor->qualification_file,
         'contact_number'=>$counsellor->contact_number,
         'bank_name'=>$counsellor->bank_name,
         'account_holder_name'=>$counsellor->account_holder_name,
         'branch'=>$counsellor->branch,
         'account_number'=>$counsellor->account_number,
         'gender'=>$counsellor->gender,
         'city'=>$counsellor->city,
         
       
         'first_name_err'=>'',
         'last_name_err'=>'',
         'nic_err'=>'',
         'qualification_file_err'=>'',
         'slmc_reg_number_err'=>'',
         'contact_number_err'=>'',
         'bank_name_err'=>'',
         'account_holder_name_err'=>'',
         'branch_err'=>'',
         'account_number_err'=>'',
         'gender_err'=>'',
         'city_err'=>'',
       
         
      
        ];
        $this->view('counsellor/v_profile',$data);
     
     }else{
        redirect('Login/login');
      }
     
       }
     
     
     
       public function edit_profile($userId){
       
         if(isset($_SESSION['counsellor_id'])) {  
        
         if($_SERVER['REQUEST_METHOD']=='POST'){

              $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      
              $data=[
                'email'=> $_SESSION['counsellor_email'],
                'counsellor_id'=>$userId,
                'first_name'=>trim($_POST['first_name']),
                'last_name'=>trim($_POST['last_name']),
                'nic'=>trim($_POST['nic']),
                'slmc_reg_number'=>trim($_POST['slmc']),
                'contact_number'=>trim($_POST['contact_number']),
                'bank_name'=>trim($_POST['bank_name']),
                'account_holder_name'=>trim($_POST['account_holder_name']),
                'branch'=>trim($_POST['branch']),
                'account_number'=>trim($_POST['account_number']),
                'gender'=>trim($_POST['gender']),
                'city'=>trim($_POST['city']),
                
                
                'first_name_err'=>'',
                'last_name_err'=>'',
                'nic_err'=>'',
                'slmc_reg_number_err'=>'',
                'contact_number_err'=>'',
                'bank_name_err'=>'',
                'account_holder_name_err'=>'',
                'branch_err'=>'',
                'account_number_err'=>'',
                'gender_err'=>'',
                'city_err'=>'',
                
               
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
      
            if(empty($data['gender'])){
                $data['gender_err']='gender can not be empty';
            }
      
             if(empty($data['account_number'])){
                $data['account_number_err']='account number can not be empty';
             }
      
             if(empty($data['city'])){
                $data['city_err']='city can not be empty';
             }
             
             if(empty($data['slmc_reg_number'])){
                 $data['slmc_reg_number_err']='slmc registration number can not be empty';
              }
     
             
      
            if(empty($data['first_name_err']) && empty($data['last_name_err'])&& empty($data['nic_err'])&& empty($data['contact_number_err'])&& empty($data['gender_err'])  && empty($data['city_err'])&& empty($data['address_err'])&& empty($data['fee_err'])&& empty($data['bank_err'])&& empty($data['account_holder_name_err'])&& empty($data['branch_err'])&& empty($data['account_number_err'])){
                  if($this->counsellorModel->editUser($data)){
                        $_SESSION['profile_update']="true";
                        $this->view('counsellor/v_profile',$data);    
                  }else{
                    $this->view('counsellor/v_profile',$data);    
                  }  
             
            }else{
              $this->view('counsellor/v_profile',$data);     
            }
      
      
      
          }else{
             $user= $this->counsellorModel->findCounsellorByID($userId);
      
             
            $data=[
              'email' => $user->email, 
              'first_name'=>$user->first_name,
              'last_name'=>$user->last_name,
              'nic'=>$user->nic,
              'slmc'=>$user->slmc_reg_number,
              'qualification_file'=>$user->qualification_file,
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
                'city_err'=>'',
               
            
             ];
      
             redirect('counsellor/profile'); 
          }}else{
            redirect('Login/login');  
          }
         
       }
     
       
       public function changePassword()
       {
        if(isset($_SESSION['counsellor_id'])) {  
       
       // $counsellor= $this->counsellorModel->changeUserPW($_SESSION['counsellor_id']);
        $data=[                      
         'current_password_err'=>'',
         'retype_new_password_err'=>'' ,
         'new_password_err'=>''
        ];
        $this->view('counsellor/v_changePassword',$data);
     
        }else{
        redirect('Login/login');  
      }
     
       }
     
       public function updatePassword($id){
       
         if(isset($_SESSION['counsellor_id'])) {  
        
         if($_SERVER["REQUEST_METHOD"] == 'POST'){
             $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
       
             $data = [
               'counsellor_id' => $id,  
               'current_password'=>trim($_POST['current_password']),
               'new_password'=>trim($_POST['new_password']),      
               'retype_new_password'=>trim($_POST['retype_new_password']),      
             
               'current_password_err'=>'',
               'retype_new_password_err'=>'' ,
               'new_password_err'=>'' ];      
              
      
             if(empty($data['current_password'])){
               $data['current_password_err']='Please enter a current password';
            
             }else{
                if($this->counsellorModel->findUserPWMatch($id,$data['current_password'])){
           
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
              $changeUserPW=$this->counsellorModel->changePW($data);
      
                if($changeUserPW){
                  redirect('counsellor/changePassword');    
                  
                }
                else{
                 $data['retype_new_password_err']='something wrong';
                 $this->view('counsellor/v_changePassword',$data);
                }   
             }else{
               $this->view('counsellor/v_changePassword',$data);
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
            $this->view('counsellor/v_changePassword',$data);     
         } 
      }else{
         redirect('Login/login');  
       }
      
      }
  }


?>