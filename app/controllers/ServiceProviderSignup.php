<?php

class ServiceProviderSignup extends Controller{
  private $serviceProviderSignupModel;
  private $adminUserMgmtModel;
  
  public function __construct(){
    $this->serviceProviderSignupModel = $this->model('M_ServiceProviderSignup');
    $this->adminUserMgmtModel = $this->model('M_AdminUserMgmt');
  }

    // Doctor Signup

    public function  signupDoctor()
    {
      
  
     if($_SERVER['REQUEST_METHOD']=='POST'){
        $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $_SESSION['signup_form_number'] = 1;
        $data=[
          'd_first_name'=>trim($_POST['first_name']),
          'd_last_name'=>trim($_POST['last_name']),
          'd_nic'=>trim($_POST['nic']),
          'd_contact_number'=>trim($_POST['contact_number']),
          'd_email'=>trim($_POST['email']),
          'd_password'=>trim($_POST['password']),
          'd_confirm_password'=>trim($_POST['confirm_password']),
          'd_city'=>trim($_POST['city']),
          'd_bank_name'=>trim($_POST['bank_name']),
          'd_account_holder_name'=>trim($_POST['account_holder_name']),
          'd_branch'=>trim($_POST['branch']),
          'd_account_number'=>trim($_POST['account_number']),
          'd_slmc_reg_number'=>trim($_POST['slmc']),
          'd_type'=>trim($_POST['type']),
          'd_specialization'=>trim($_POST['specialization']),
          'd_gender'=>trim($_POST['gender']),
          'd_qualification_file'=>$_FILES['qualification_file'],
          'd_qualification_file_name'=>trim($_POST['first_name']).' '.trim($_POST['last_name']).'_'.$_FILES['qualification_file']['name'],
          
      
          'd_first_name_err'=>'',
          'd_last_name_err'=>'',
          'd_nic_err'=>'',
          'd_contact_number_err'=>'',
          'd_email_err'=>'',
          'd_password_err'=>'',
          'd_confirm_password_err'=>'',
          'd_city_err'=>'',
          'd_bank_name_err'=>'',
          'd_account_holder_name_err'=>'',
          'd_branch_err'=>'',
          'd_account_number_err'=>'',
          'd_slmc_reg_number_err'=>'',
          'd_type_err'=>'',
          'd_specialization_err'=>'',
          'd_gender_err'=>'',
          'd_qualification_file_err'=>'',
          
       ];
    
       if(empty($data['d_qualification_file'])){
         $data['d_qualification_file_err']='qualification file can not be empty';
       }else{
           $fileExt=explode('.',$_FILES['qualification_file']['name']);
           $fileActualExt=strtolower(end($fileExt));
           $allowed=array('jpg','jpeg','png','pdf','zip','rar');

         
           if(!in_array($fileActualExt,$allowed)){
             $data['d_qualification_file_err']='You cannot upload files of this type';

           }
     

           if($data['d_qualification_file']['size']>0){
             if(uploadFile($data['d_qualification_file']['tmp_name'],$data['d_qualification_file_name'],'/upload/doctor_qualification/')){
                       
             }else{  
             $data['d_qualification_file_err']='Unsuccessful qualification_file uploading';
             
             }
           }else{
             $data[ 'd_qualification_file_err'] ="qualification file size is empty";
           
           }
 
       }
       if(empty($data['d_first_name'])){
          $data['d_first_name_err']='first name can not be empty';
       }else if(validateFirstName($data['d_first_name'])!="true"){
        $data['d_first_name_err']=validateFirstName($data['d_first_name']);
       }
      
       if(empty($data['d_last_name'])){
          $data['d_last_name_err']='last name can not be empty';
       }else if(validateLastName($data['d_last_name'])!="true"){
        $data['d_last_name_err']=validateLastName($data['d_last_name']);
       }
    
       if(empty($data['d_nic'])){
         $data['d_nic_err']='nic can not be empty';
      }else if(validateNIC($data['d_nic'])!="true"){
        $data['d_nic_err']=validateNIC($data['d_nic']);
       }
     
      if(empty($data['d_contact_number'])){
         $data['d_contact_number_err']='contact number can not be empty';
      }else if(validateContactNumber($data['d_contact_number'])!="true"){
        $data['d_contact_number_err']=validateContactNumber($data['d_contact_number']);
      }
       
       if(empty($data['d_email'])){
           $data['d_email_err']='email can not be empty';
       }else if(validateEmail($data['d_email'])!="true"){
        $data['d_email_err']=validateEmail($data['d_email']);
       }
       
       if(empty($data['d_password'])){
           $data['d_password_err']='password can not be empty';
       }else if(validatePassword($data['d_password'])!="true"){
        $data['d_password_err']=validatePassword($data['d_password']);
       }
     
       if(empty($data['d_confirm_password'])){
         $data['d_confirm_password_err']='confirm password  can not be empty';
       }else if(validatePassword($data['d_confirm_password'])!="true"){
        $data['d_confirm_password_err']=validatePassword($data['d_confirm_password']);
       }
     
       if(empty($data['d_city'])){
         $data['d_city_err']='city can not be empty';
       }else if(validateCity($data['d_city'])!="true"){
        $data['d_city_err']=validateCity($data['d_city']);
       }

       if(empty($data['d_bank_name'])){
           $data['d_bank_name_err']='bank name can not be empty';
       }else if(validateBankName($data['d_bank_name'])!="true"){
        $data['d_bank_name_err']=validateBankName($data['d_bank_name']);
       }
       
       if(empty($data['d_account_holder_name'])){
           $data['d_account_holder_name_err']='account holder name can not be empty';
       }else if(validateAccountHolderName($data['d_account_holder_name'])!="true"){
        $data['d_account_holder_name_err']=validateAccountHolderName($data['d_account_holder_name']);
       }
     
       if(empty($data['d_branch'])){
         $data['d_branch_err']='branch name can not be empty';
       }else if(validateBankBranch($data['d_branch'])!="true"){
        $data['d_branch_err']=validateBankBranch($data['d_branch']);
       }
     
       if(empty($data['d_account_number'])){
         $data['d_account_number_err']='account number can not be empty';
       }else if(validateAccountNumber($data['d_account_number'])!="true"){
        $data['d_account_number_err']=validateAccountNumber($data['d_account_number']);
       }
      

       if(empty($data['d_slmc_reg_number'])){
         $data['d_slmc_reg_number_err']='slmc reg number can not be empty';
      }else if(validateSlmcRegisterNumber($data['d_slmc_reg_number'])!="true"){
        $data['d_slmc_reg_number_err']=validateSlmcRegisterNumber($data['d_slmc_reg_number']);
       }
     
       if(empty($data['d_type'])){
           $data['d_type_err']='type can not be empty';
       }
     
       if(empty($data['d_specialization'])){
         $data['d_specialization_err']='specialization can not be empty';
       }else if(validateSpecialization($data['d_specialization'])!="true"){
        $data['d_specialization_err']=validateSpecialization($data['d_specialization']);
       }
       
       if(empty($data['d_gender'])){
         $data['d_gender_err']='gender can not be empty';
       }
       
    

       
       if($data['d_password']!=$data['d_confirm_password']){
        $data['d_confirm_password_err']='password not match';
       }

       if($this->adminUserMgmtModel->findDoctorByEmail($data['d_email'])){
         $data['d_email_err']='Email is already registered';

       } 
       else if($this->adminUserMgmtModel->findReqDoctorByEmail($data['d_email'])){
         $data['d_email_err']='Email is already registered';

       }
    


       if(empty($data['d_first_name_err']) && empty($data['d_last_name_err'])&& empty($data['d_nic_err'])&& empty($data['d_contact_number_err'])&& empty($data['d_email_err'])&& empty($data['d_password_err'])&& empty($data['d_confirm_password_err'])&& empty($data['d_city_err'])&& empty($data['d_bank_name_err'])&& empty($data['d_account_holder_name_err'])&& empty($data['d_branch_err'])&& empty($data['d_account_number_err'])&& empty($data['d_slmc_reg_number_err'])&& empty($data['d_type_err'])&& empty($data['d_specialization_err'])&& empty($data['d_gender_err'])&& empty($data['d_qualification_file_err'])){
            
         $data['d_password']=password_hash($data['d_password'],PASSWORD_DEFAULT);
          if($this->serviceProviderSignupModel->signupDoctor($data)){
              $doctorDetails=$this->serviceProviderSignupModel->getLatestReqDoctorID();
              sendMail($data['d_email'],$data['d_first_name'],2, 7,$doctorDetails->requested_doctor_id);

              redirect('Pages/verify_email');
              //    $this->view('inc/v_pending',$data); 
            }else{
                die('Error creating');
            }  
       
       }else{
           $this->view('patients/v_signup',$data);

       }
      
           
      }else{
              
             
 
        $data=[
 
         'd_first_name'=>'',
         'd_last_name'=>'',
         'd_nic'=>'',
         'd_contact_number'=>'',
         'd_email'=>'',
         'd_password'=>'',
         'd_confirm_password'=>'',
         'd_gender'=>'',
         'd_city'=>'',
         'd_bank_name'=>'',
         'd_account_holder_name'=>'',
         'd_branch'=>'',
         'd_account_number'=>'',
         'd_slmc_reg_number'=>'',
         'd_qualification_file'=>'',
         'd_type'=>'',
         'd_specialization'=>'',
 
          'd_first_name_err'=>'',
          'd_last_name_err'=>'',
          'd_nic_err'=>'',
          'd_contact_number_err'=>'',
          'd_email_err'=>'',
          'd_password_err'=>'',
          'd_confirm_password_err'=>'',
          'd_city_err'=>'',
          'd_bank_name_err'=>'',
          'd_account_holder_name_err'=>'',
          'd_branch_err'=>'',
          'd_account_number_err'=>'',
          'd_slmc_reg_number_err'=>'',
          'd_type_err'=>'',
          'd_specialization_err'=>'',
          'd_gender_err'=>'',
          'd_qualification_file_err'=>'',
        ];
 
       $this->view('patients/v_signup',$data);

  }
  
        
    }
    

          //Signup Counsellor

          public function  signupCounsellor()
          {

           if($_SERVER['REQUEST_METHOD']=='POST'){
              $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
              $_SESSION['signup_form_number'] = 2;
              $data=[
                'c_first_name'=>trim($_POST['first_name']),
                'c_last_name'=>trim($_POST['last_name']),
                'c_nic'=>trim($_POST['nic']),
                'c_contact_number'=>trim($_POST['contact_number']),
                'c_email'=>trim($_POST['email']),
                'c_password'=>trim($_POST['password']),
                'c_confirm_password'=>trim($_POST['confirm_password']),
                'c_city'=>trim($_POST['city']),
                'c_bank_name'=>trim($_POST['bank_name']),
                'c_account_holder_name'=>trim($_POST['account_holder_name']),
                'c_branch'=>trim($_POST['branch']),
                'c_account_number'=>trim($_POST['account_number']),
                'c_slmc_reg_number'=>trim($_POST['slmc']),
                'c_gender'=>trim($_POST['gender']),
                'c_qualification_file'=>$_FILES['qualification_file'],
                'c_qualification_file_name'=>trim($_POST['first_name']).' '.trim($_POST['last_name']).'_'.$_FILES['qualification_file']['name'],
                
            
                                    
                 'c_first_name_err'=>'',
                 'c_last_name_err'=>'',
                 'c_nic_err'=>'',
                 'c_contact_number_err'=>'',
                 'c_email_err'=>'',
                 'c_password_err'=>'',
                 'c_confirm_password_err'=>'',
                 'c_city_err'=>'',
                 'c_bank_name_err'=>'',
                 'c_account_holder_name_err'=>'',
                 'c_branch_err'=>'',
                 'c_account_number_err'=>'',
                 'c_slmc_reg_number_err'=>'',
                 'c_gender_err'=>'',
                 'c_qualification_file_err'=>'',
                     
         ];
             $fileExt=explode('.',$_FILES['qualification_file']['name']);
             $fileActualExt=strtolower(end($fileExt));
             $allowed=array('jpg','jpeg','png','pdf','zip','rar');
   
            
             if(!in_array($fileActualExt,$allowed)){
               $data['c_qualification_file_err']='You cannot upload files of this type';
   
             }
       
   
             if($data['c_qualification_file']['size']>0){
               if(uploadFile($data['c_qualification_file']['tmp_name'],$data['c_qualification_file_name'],'/upload/counsellor_qualification/')){
                          
               }else{  
                $data['c_qualification_file_err']='Unsuccessful qualification_file uploading';
                
               }
             }else{
                $data[ 'c_qualification_file_err'] ="qualification file size is empty";
              
             }
    
             if(empty($data['c_first_name'])){
               $data['c_first_name_err']='first name can not be empty';
            }else if(validateFirstName($data['c_first_name'])!="true"){
              $data['c_first_name_err']=validateFirstName($data['c_first_name']);
             }
           
            if(empty($data['c_last_name'])){
               $data['c_last_name_err']='last name can not be empty';
            }else if(validateLastName($data['c_last_name'])!="true"){
              $data['c_last_name_err']=validateLastName($data['c_last_name']);
             }
         
            if(empty($data['c_nic'])){
              $data['c_nic_err']='nic can not be empty';
           }else if(validateNIC($data['c_nic'])!="true"){
            $data['c_nic_err']=validateNIC($data['c_nic']);
           }
          
           if(empty($data['c_contact_number'])){
              $data['c_contact_number_err']='contact number can not be empty';
           }else if(validateContactNumber($data['c_contact_number'])!="true"){
            $data['c_contact_number_err']=validateContactNumber($data['c_contact_number']);
          }
            
            if(empty($data['c_email'])){
                $data['c_email_err']='email can not be empty';
            }else if(validateEmail($data['c_email'])!="true"){
              $data['c_email_err']=validateEmail($data['c_email']);
             }
            
            if(empty($data['c_password'])){
                $data['c_password_err']='password can not be empty';
            }else if(validatePassword($data['c_password'])!="true"){
              $data['c_password_err']=validatePassword($data['c_password']);
             }
          
            if(empty($data['c_confirm_password'])){
              $data['c_confirm_password_err']='confirm password  can not be empty';
            }else if(validatePassword($data['c_confirm_password'])!="true"){
              $data['c_confirm_password_err']=validatePassword($data['c_confirm_password']);
             }
          
            if(empty($data['c_city'])){
              $data['c_city_err']='city can not be empty';
            }else if(validateCity($data['c_city'])!="true"){
              $data['c_city_err']=validateCity($data['c_city']);
             }
  
            if(empty($data['c_bank_name'])){
                $data['c_bank_name_err']='bank name can not be empty';
            }else if(validateBankName($data['c_bank_name'])!="true"){
              $data['c_bank_name_err']=validateBankName($data['c_bank_name']);
             }
            
            if(empty($data['c_account_holder_name'])){
                $data['c_account_holder_name_err']='account_holder name can not be empty';
            }else if(validateAccountHolderName($data['c_account_holder_name'])!="true"){
              $data['c_account_holder_name_err']=validateAccountHolderName($data['c_account_holder_name']);
             }
            
          
            if(empty($data['c_branch'])){
              $data['c_branch_err']='branch name can not be empty';
            }else if(validateBankBranch($data['c_branch'])!="true"){
              $data['c_branch_err']=validateBankBranch($data['c_branch']);
             }
          
            if(empty($data['c_account_number'])){
              $data['c_account_number_err']='last name can not be empty';
            }else if(validateAccountNumber($data['c_account_number'])!="true"){
              $data['c_account_number_err']=validateAccountNumber($data['c_account_number']);
             }
            
  
            if(empty($data['c_slmc_reg_number'])){
              $data['c_slmc_reg_number_err']='slmc reg number can not be empty';
           }else if(validateSlmcRegisterNumber($data['c_slmc_reg_number'])!="true"){
            $data['c_slmc_reg_number_err']=validateSlmcRegisterNumber($data['c_slmc_reg_number']);
           }
          
            
            if(empty($data['c_gender'])){
              $data['c_gender_err']='gender can not be empty';
            }
            
            if(empty($data['c_qualification_file'])){
              $data['c_qualification_file_err']='qualification_file can not be empty';
            }
  
  

             if($data['c_password']!=$data['c_confirm_password']){
              $data['c_confirm_password_err']='password not match';
             }
   
             if($this->adminUserMgmtModel->findCounsellorByEmail($data['c_email'])){
               $data['c_email_err']='Email is already registered';
    
             } 
             else if($this->adminUserMgmtModel->findReqCounsellorByEmail($data['c_email'])){
               $data['c_email_err']='Email is already registered';
    
             }
          
      
      
             if(empty($data['c_first_name_err']) && empty($data['c_last_name_err'])&& empty($data['c_nic_err'])&& empty($data['c_contact_number_err'])&& empty($data['c_email_err'])&& empty($data['c_password_err'])&& empty($data['c_confirm_password_err'])&& empty($data['c_city_err'])&& empty($data['c_bank_name_err'])&& empty($data['c_account_holder_name_err'])&& empty($data['c_branch_err'])&& empty($data['c_account_number_err'])&& empty($data['c_slmc_reg_number_err'])&& empty($data['c_gender_err'])&& empty($data['c_qualification_file_err'])){
               
               $data['c_password']=password_hash($data['c_password'],PASSWORD_DEFAULT);
                if($this->serviceProviderSignupModel->signupCounsellor($data)){
                      $counsellorDetails=$this->serviceProviderSignupModel->getLatestReqCounsellorID();
                      sendMail($data['c_email'],$data['c_first_name'],3, 7,$counsellorDetails->requested_counsellor_id);
        
                      redirect('Pages/verify_email');
    
                  }else{
                      die('Error creating');
                  }  
             
             }else{
                  $this->view('patients/v_signup',$data);
      
             }
            
                 
            }else{
                    
                   
       
              $data=[
       
               'c_first_name'=>'',
               'c_last_name'=>'',
               'c_nic'=>'',
               'c_contact_number'=>'',
               'c_email'=>'',
               'c_password'=>'',
               'c_confirm_password'=>'',
               'c_gender'=>'',
               'c_city'=>'',
               'c_bank_name'=>'',
               'c_account_holder_name'=>'',
               'c_branch'=>'',
               'c_account_number'=>'',
               'c_slmc_reg_number'=>'',
               'c_qualification_file'=>'',
               
               'c_first_name_err'=>'',
               'c_last_name_err'=>'',
               'c_nic_err'=>'',
               'c_contact_number_err'=>'',
               'c_email_err'=>'',
               'c_password_err'=>'',
               'c_confirm_password_err'=>'',
               'c_city_err'=>'',
               'c_bank_name_err'=>'',
               'c_account_holder_name_err'=>'',
               'c_branch_err'=>'',
               'c_account_number_err'=>'',
               'c_slmc_reg_number_err'=>'',
               'c_gender_err'=>'',
               'c_qualification_file_err'=>'',
              ];
       
              $this->view('patients/v_signup',$data);
      
        }
  
              
 }

       //Signup Meditation Instructor

       public function  signupMeditationInstructor()
       {
  
        if($_SERVER['REQUEST_METHOD']=='POST'){
           $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
           $_SESSION['signup_form_number'] = 5;
           $data=[
             'm_first_name'=>trim($_POST['first_name']),
             'm_last_name'=>trim($_POST['last_name']),
             'm_nic'=>trim($_POST['nic']),
             'm_contact_number'=>trim($_POST['contact_number']),
             'm_email'=>trim($_POST['email']),
             'm_password'=>trim($_POST['password']),
             'm_confirm_password'=>trim($_POST['confirm_password']),
             'm_city'=>trim($_POST['city']),
             'm_bank_name'=>trim($_POST['bank_name']),
             'm_account_holder_name'=>trim($_POST['account_holder_name']),
             'm_branch'=>trim($_POST['branch']),
             'm_account_number'=>trim($_POST['account_number']),
             'm_address'=>trim($_POST['address']),
             'm_fee'=>trim($_POST['fee']),
             'm_gender'=>trim($_POST['gender']),
             'm_qualification_file'=>$_FILES['qualification_file'],
             'm_qualification_file_name'=>trim($_POST['first_name']).' '.trim($_POST['last_name']).'_'.$_FILES['qualification_file']['name'],
             
         
             'm_first_name_err'=>'',
             'm_last_name_err'=>'',
             'm_nic_err'=>'',
             'm_contact_number_err'=>'',
             'm_email_err'=>'',
             'm_password_err'=>'',
             'm_confirm_password_err'=>'',
             'm_city_err'=>'',
             'm_bank_name_err'=>'',
             'm_account_holder_name_err'=>'',
             'm_branch_err'=>'',
             'm_account_number_err'=>'',
             'm_address_err'=>'',
             'm_fee_err'=>'',
             'm_gender_err'=>'',
             'm_qualification_file_err'=>'',
          ];
          $fileExt=explode('.',$_FILES['qualification_file']['name']);
          $fileActualExt=strtolower(end($fileExt));
          $allowed=array('jpg','jpeg','png','pdf','zip','rar');

         
          if(!in_array($fileActualExt,$allowed)){
            $data['m_qualification_file_err']='You cannot upload files of this type';

          }
    

          if($data['m_qualification_file']['size']>0){
            if(uploadFile($data['m_qualification_file']['tmp_name'],$data['m_qualification_file_name'],'/upload/meditationInstructor_qualification/')){
                       
            }else{  
             $data['m_qualification_file_err']='Unsuccessful qualification_file uploading';
             
            }
          }else{
             $data[ 'm_qualification_file_err'] ="qualification file size is empty";
           
          }
 
          if(empty($data['m_first_name'])){
            $data['m_first_name_err']='first name can not be empty';
         }else if(validateFirstName($data['m_first_name'])!="true"){
          $data['m_first_name_err']=validateFirstName($data['m_first_name']);
         }
        
         if(empty($data['m_last_name'])){
            $data['m_last_name_err']='last name can not be empty';
         }else if(validateLastName($data['m_last_name'])!="true"){
          $data['m_last_name_err']=validateLastName($data['m_last_name']);
         }
      
         if(empty($data['m_nic'])){
           $data['m_nic_err']='nic can not be empty';
        }else if(validateNIC($data['m_nic'])!="true"){
          $data['m_nic_err']=validateNIC($data['m_nic']);
         }
       
        if(empty($data['m_contact_number'])){
           $data['m_contact_number_err']='contact number can not be empty';
        }else if(validateContactNumber($data['m_contact_number'])!="true"){
          $data['m_contact_number_err']=validateContactNumber($data['m_contact_number']);
        }
         
           if(empty($data['m_email'])){
             $data['m_email_err']='email can not be empty';
         }else if(validateEmail($data['m_email'])!="true"){
          $data['m_email_err']=validateEmail($data['m_email']);
         }
      
         
         if(empty($data['m_password'])){
             $data['m_password_err']='password can not be empty';
         }else if(validatePassword($data['m_password'])!="true"){
          $data['m_password_err']=validatePassword($data['m_password']);
         }
       
         if(empty($data['m_confirm_password'])){
           $data['m_confirm_password_err']='confirm password  can not be empty';
         }else if(validatePassword($data['m_confirm_password'])!="true"){
          $data['m_confirm_password_err']=validatePassword($data['m_confirm_password']);
         }
       
         if(empty($data['m_city'])){
           $data['m_city_err']='city can not be empty';
         }else if(validateCity($data['m_city'])!="true"){
          $data['m_city_err']=validateCity($data['m_city']);
         }

           if(empty($data['m_bank_name'])){
             $data['m_bank_name_err']='bank name can not be empty';
         }else if(validateBankName($data['m_bank_name'])!="true"){
          $data['m_bank_name_err']=validateBankName($data['m_bank_name']);
         }
         
         if(empty($data['m_account_holder_name'])){
             $data['m_account_holder_name_err']='account_holder name can not be empty';
         }else if(validateAccountHolderName($data['m_account_holder_name'])!="true"){
          $data['m_account_holder_name_err']=validateAccountHolderName($data['m_account_holder_name']);
         }
       
         if(empty($data['m_branch'])){
           $data['m_branch_err']='branch name can not be empty';
         }else if(validateBankBranch($data['m_branch'])!="true"){
          $data['m_branch_err']=validateBankBranch($data['m_branch']);
         }
       
         if(empty($data['m_account_number'])){
           $data['m_account_number_err']='account_number can not be empty';
         }else if(validateAccountNumber($data['m_account_number'])!="true"){
          $data['m_account_number_err']=validateAccountNumber($data['m_account_number']);
         }

         if(empty($data['m_address'])){
           $data['m_address_err']='address can not be empty';
        }else if(validateAddress($data['m_address'])!="true"){
          $data['m_address_err']=validateAddress($data['m_address']);
         }
       
         if(empty($data['m_fee'])){
             $data['m_fee_err']='fee can not be empty';
         }else if(validateFee($data['m_fee'])!="true"){
             $data['m_fee_err']=validateFee($data['m_fee']);
         }
       
        
         if(empty($data['m_gender'])){
           $data['m_gender_err']='gender can not be empty';
         }
         
         if(empty($data['m_qualification_file'])){
           $data['m_qualification_file_err']='qualification_file can not be empty';
         }




          if($data['m_password']!=$data['m_confirm_password']){
           $data['m_passwordnotmatch_err']='password not match';
          }

          if($this->adminUserMgmtModel->findMeditationInstructorByEmail($data['m_email'])){
            $data['m_email_err']='Email is already registered';
 
          } 
          else if($this->adminUserMgmtModel->findReqMeditationInstructorByEmail($data['m_email'])){
            $data['m_email_err']='Email is already registered';
 
          }
       
   
   
          
          if(empty($data['m_first_name_err']) && empty($data['m_last_name_err'])&& empty($data['m_nic_err'])&& empty($data['m_contact_number_err'])&& empty($data['m_email_err'])&& empty($data['m_password_err'])&& empty($data['m_confirm_password_err'])&& empty($data['m_city_err'])&& empty($data['m_bank_name_err'])&& empty($data['m_account_holder_name_err'])&& empty($data['m_branch_err'])&& empty($data['m_account_number_err'])&& empty($data['m_address_err'])&& empty($data['m_fee_err'])&& empty($data['m_gender_err'])&& empty($data['m_qualification_file_err'])){
               
        
               
            $data['m_password']=password_hash($data['m_password'],PASSWORD_DEFAULT);
             if($this->serviceProviderSignupModel->signupMeditationInstructor($data)){
                  $meditationInstructorDetails=$this->serviceProviderSignupModel->getLatestReqMeditationInstructorID();
                  sendMail($data['m_email'],$data['m_first_name'],4, 7,$meditationInstructorDetails->requested_meditation_instructor_id);

                  redirect('Pages/verify_email');
                  
               }else{
  //                 die('Error creating');
               }  
          
          }else{
                $this->view('patients/v_signup',$data);
          }
         
              
         }else{
                 
                
    
           $data=[
    
            'm_first_name'=>'',
            'm_last_name'=>'',
            'm_nic'=>'',
            'm_contact_number'=>'',
            'm_email'=>'',
            'm_password'=>'',
            'm_confirm_password'=>'',
            'm_gender'=>'',
            'm_city'=>'',
            'm_bank_name'=>'',
            'm_account_holder_name'=>'',
            'm_branch'=>'',
            'm_account_number'=>'',
            'm_qualification_file'=>'',
            'm_address'=>'',
            'm_fee'=>'',
    
            'm_first_name_err'=>'',
            'm_last_name_err'=>'',
            'm_nic_err'=>'',
            'm_contact_number_err'=>'',
            'm_email_err'=>'',
            'm_password_err'=>'',
            'm_confirm_password_err'=>'',
            'm_city_err'=>'',
            'm_bank_name_err'=>'',
            'm_account_holder_name_err'=>'',
            'm_branch_err'=>'',
            'm_account_number_err'=>'',
            'm_address_err'=>'',
            'm_fee_err'=>'',
            'm_gender_err'=>'',
            'm_qualification_file_err'=>'',
          ];
    
          $this->view('patients/v_signup',$data);
   
     }
   
           
       }


       //signup Pharmacist

       public function  signupPharmacist()
       {
       
        if($_SERVER['REQUEST_METHOD']=='POST'){
           $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
           $_SESSION['signup_form_number'] = 3;
           $data=[
             'p_first_name'=>trim($_POST['first_name']),
             'p_last_name'=>trim($_POST['last_name']),
             'p_nic'=>trim($_POST['nic']),
             'p_contact_number'=>trim($_POST['contact_number']),
             'p_email'=>trim($_POST['email']),
             'p_password'=>trim($_POST['password']),
             'p_confirm_password'=>trim($_POST['confirm_password']),
             'p_city'=>trim($_POST['city']),
             'p_bank_name'=>trim($_POST['bank_name']),
             'p_account_holder_name'=>trim($_POST['account_holder_name']),
             'p_branch'=>trim($_POST['branch']),
             'p_account_number'=>trim($_POST['account_number']),
             'p_slmc_reg_number'=>trim($_POST['slmc']),
             'p_pharmacy_name'=>trim($_POST['pharmacy_name']),
             'p_address'=>trim($_POST['address']),
             'p_gender'=>trim($_POST['gender']),
             'p_qualification_file'=>$_FILES['qualification_file'],
             'p_qualification_file_name'=>trim($_POST['first_name']).' '.trim($_POST['last_name']).'_'.$_FILES['qualification_file']['name'],
             
         
             'p_first_name_err'=>'',
             'p_last_name_err'=>'',
             'p_nic_err'=>'',
             'p_contact_number_err'=>'',
             'p_email_err'=>'',
             'p_password_err'=>'',
             'p_confirm_password_err'=>'',
             'p_city_err'=>'',
             'p_bank_name_err'=>'',
             'p_account_holder_name_err'=>'',
             'p_branch_err'=>'',
             'p_account_number_err'=>'',
             'p_slmc_reg_number_err'=>'',
             'p_pharmacy_name_err'=>'',
             'p_address_err'=>'',
             'p_gender_err'=>'',
             'p_qualification_file_err'=>''
          ];
          $fileExt=explode('.',$_FILES['qualification_file']['name']);
          $fileActualExt=strtolower(end($fileExt));
          $allowed=array('jpg','jpeg','png','pdf','zip','rar');

         
          if(!in_array($fileActualExt,$allowed)){
            $data['p_qualification_file_err']='You cannot upload files of this type';

          }
    

          if($data['p_qualification_file']['size']>0){
            if(uploadFile($data['p_qualification_file']['tmp_name'],$data['p_qualification_file_name'],'/upload/pharmacist_qualification/')){
                       
            }else{  
             $data['p_qualification_file_err']='Unsuccessful qualification_file uploading';
             
            }
          }else{
             $data[ 'p_qualification_file_err'] ="qualification file size is empty";
           
          }
 
          if(empty($data['p_first_name'])){
            $data['p_first_name_err']='first name can not be empty';
         }else if(validateFirstName($data['p_first_name'])!="true"){
          $data['p_first_name_err']=validateFirstName($data['p_first_name']);
         }
        
         if(empty($data['p_last_name'])){
            $data['p_last_name_err']='last name can not be empty';
         }else if(validateLastName($data['p_last_name'])!="true"){
          $data['p_last_name_err']=validateLastName($data['p_last_name']);
         }
      
         if(empty($data['p_nic'])){
           $data['p_nic_err']='nic can not be empty';
        }else if(validateNIC($data['p_nic'])!="true"){
          $data['p_nic_err']=validateNIC($data['p_nic']);
         }
  
       
        if(empty($data['p_contact_number'])){
           $data['p_contact_number_err']='contact number can not be empty';
        }else if(validateContactNumber($data['p_contact_number'])!="true"){
          $data['p_contact_number_err']=validateContactNumber($data['p_contact_number']);
        }
         
        if(empty($data['p_email'])){
             $data['p_email_err']='email can not be empty';
         }else if(validateEmail($data['p_email'])!="true"){
          $data['p_email_err']=validateEmail($data['p_email']);
         }
         
         if(empty($data['p_password'])){
             $data['p_password_err']='password can not be empty';
         }else if(validatePassword($data['p_password'])!="true"){
          $data['p_password_err']=validatePassword($data['p_password']);
         }
       
         if(empty($data['p_confirm_password'])){
           $data['p_confirm_password_err']='confirm password  can not be empty';
         }else if(validatePassword($data['p_confirm_password'])!="true"){
          $data['p_confirm_password_err']=validatePassword($data['p_confirm_password']);
         }
       
         if(empty($data['p_city'])){
           $data['p_city_err']='city can not be empty';
         }else if(validateCity($data['p_city'])!="true"){
          $data['p_city_err']=validateCity($data['p_city']);
         }

           if(empty($data['p_bank_name'])){
             $data['p_bank_name_err']='bank name can not be empty';
         }else if(validateBankName($data['p_bank_name'])!="true"){
          $data['p_bank_name_err']=validateBankName($data['p_bank_name']);
         }
         
         if(empty($data['p_account_holder_name'])){
             $data['p_account_holder_name_err']='account_holder name can not be empty';
         }else if(validateAccountHolderName($data['p_account_holder_name'])!="true"){
          $data['p_account_holder_name_err']=validateAccountHolderName($data['p_account_holder_name']);
         }
       
         if(empty($data['p_branch'])){
           $data['p_branch_err']='branch name can not be empty';
         }else if(validateBankBranch($data['p_branch'])!="true"){
          $data['p_branch_err']=validateBankBranch($data['p_branch']);
         }
        
       
         if(empty($data['p_account_number'])){
           $data['p_account_number_err']='last name can not be empty';
         }else if(validateAccountNumber($data['p_account_number'])!="true"){
          $data['p_account_number_err']=validateAccountNumber($data['p_account_number']);
         }

         if(empty($data['p_slmc_reg_number'])){
           $data['p_slmc_reg_number_err']='slmc reg number can not be empty';
        }else if(validateSlmcRegisterNumber($data['p_slmc_reg_number'])!="true"){
          $data['p_slmc_reg_number_err']=validateSlmcRegisterNumber($data['p_slmc_reg_number']);
         }
       
         if(empty($data['p_pharmacy_name'])){
             $data['p_pharmacy_name_err']='pharmacy name can not be empty';
         }else if(validatePharmacyName($data['p_pharmacy_name'])!="true"){
          $data['p_pharmacy_name_err']=validatePharmacyName($data['p_pharmacy_name']);
         }

       
         if(empty($data['p_address'])){
           $data['p_address_err']='address can not be empty';
         }else if(validateAddress($data['p_address'])!="true"){
          $data['p_address_err']=validateAddress($data['p_address']);
         }
        
         
         if(empty($data['p_gender'])){
           $data['p_gender_err']='gender can not be empty';
         }
         
         if(empty($data['p_qualification_file'])){
           $data['p_qualification_file_err']='qualification_file can not be empty';
         }

       
          if($data['p_password']!=$data['p_confirm_password']){
           $data['p_confirm_password_err']='password not match';
          }

          if($this->adminUserMgmtModel->findPharmacistByEmail($data['p_email'])){
            $data['p_email_err']='Email is already registered';
 
          } 
          else if($this->adminUserMgmtModel->findReqPharmacistByEmail($data['p_email'])){
            $data['p_email_err']='Email is already registered';
 
          }
       
             
          if(empty($data['p_first_name_err']) && empty($data['p_last_name_err'])&& empty($data['p_nic_err'])&& empty($data['p_contact_number_err'])&& empty($data['p_email_err'])&& empty($data['p_password_err'])&& empty($data['p_confirm_password_err'])&& empty($data['p_city_err'])&& empty($data['p_bank_name_err'])&& empty($data['p_account_holder_name_err'])&& empty($data['p_branch_err'])&& empty($data['p_account_number_err'])&& empty($data['p_slmc_reg_number_err'])&& empty($data['p_pharmacy_name_err'])&& empty($data['p_address_err'])&& empty($data['p_gender_err'])&& empty($data['p_qualification_file_err'])){
               
                 
            $data['p_password']=password_hash($data['p_password'],PASSWORD_DEFAULT);
             if($this->serviceProviderSignupModel->signupPharmacist($data)){
                  $pharmacistDetails=$this->serviceProviderSignupModel->getLatestReqPharmacistID();
                  sendMail($data['p_email'],$data['p_first_name'],6, 7,$pharmacistDetails->requested_pharmacist_id);

                  redirect('Pages/verify_email');
             
               }else{
                   die('Error creating');
               }  
          
          }else{
              $this->view('patients/v_signup',$data);

          }
         
              
         }else{
                 
                
    
           $data=[
    
            'p_first_name'=>'',
            'p_last_name'=>'',
            'p_nic'=>'',
            'p_contact_number'=>'',
            'p_email'=>'',
            'p_password'=>'',
            'p_confirm_password'=>'',
            'p_gender'=>'',
            'p_city'=>'',
            'p_bank_name'=>'',
            'p_account_holder_name'=>'',
            'p_branch'=>'',
            'p_account_number'=>'',
            'p_slmc_reg_number'=>'',
            'p_qualification_file'=>'',
            'p_pharmacy_name'=>'',
            'p_address'=>'',

            'p_first_name_err'=>'',
            'p_last_name_err'=>'',
            'p_nic_err'=>'',
            'p_contact_number_err'=>'',
            'p_email_err'=>'',
            'p_password_err'=>'',
            'p_confirm_password_err'=>'',
            'p_city_err'=>'',
            'p_bank_name_err'=>'',
            'p_account_holder_name_err'=>'',
            'p_branch_err'=>'',
            'p_account_number_err'=>'',
            'p_slmc_reg_number_err'=>'',
            'p_pharmacy_name_err'=>'',
            'p_address_err'=>'',
            'p_gender_err'=>'',
            'p_qualification_file_err'=>''
           ];
    
           $this->view('patients/v_signup',$data);

     }
    
   
       }


       //Signup Nutritionist

       public function  signupNutritionist()
       {
   
        if($_SERVER['REQUEST_METHOD']=='POST'){
           $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
           $_SESSION['signup_form_number'] = 4;
           $data=[
             'n_first_name'=>trim($_POST['first_name']),
             'n_last_name'=>trim($_POST['last_name']),
             'n_nic'=>trim($_POST['nic']),
             'n_contact_number'=>trim($_POST['contact_number']),
             'n_email'=>trim($_POST['email']),
             'n_password'=>trim($_POST['password']),
             'n_confirm_password'=>trim($_POST['confirm_password']),
             'n_bank_name'=>trim($_POST['bank_name']),
             'n_account_holder_name'=>trim($_POST['account_holder_name']),
             'n_branch'=>trim($_POST['branch']),
             'n_account_number'=>trim($_POST['account_number']),
             'n_slmc_reg_number'=>trim($_POST['slmc']),
             'n_fee'=>trim($_POST['fee']),
             'n_gender'=>trim($_POST['gender']),
             'n_qualification_file'=>$_FILES['qualification_file'],
             'n_qualification_file_name'=>trim($_POST['first_name']).' '.trim($_POST['last_name']).'_'.$_FILES['qualification_file']['name'],
             
         
            
             'n_first_name_err'=>'',
             'n_last_name_err'=>'',
             'n_nic_err'=>'',
             'n_contact_number_err'=>'',
             'n_email_err'=>'',
             'n_password_err'=>'',
             'n_confirm_password_err'=>'',
             'n_bank_name_err'=>'',
             'n_account_holder_name_err'=>'',
             'n_branch_err'=>'',
             'n_account_number_err'=>'',
             'n_slmc_reg_number_err'=>'',
             'n_fee_err'=>'',
             'n_gender_err'=>'',
             'n_qualification_file_err'=>''
          ];
          $fileExt=explode('.',$_FILES['qualification_file']['name']);
          $fileActualExt=strtolower(end($fileExt));
          $allowed=array('jpg','jpeg','png','pdf','zip','rar');

         
          if(!in_array($fileActualExt,$allowed)){
            $data['n_qualification_file_err']='You cannot upload files of this type';

          }
    

          if($data['n_qualification_file']['size']>0){
            if(uploadFile($data['n_qualification_file']['tmp_name'],$data['n_qualification_file_name'],'/upload/nutritionist_qualification/')){
                       
            }else{  
             $data['n_qualification_file_err']='Unsuccessful qualification_file uploading';
             
            }
          }else{
             $data[ 'n_qualification_file_err'] ="qualification file size is empty";
           
          }
 
          if(empty($data['n_first_name'])){
            $data['n_first_name_err']='first name can not be empty';
         }else if(validateFirstName($data['n_first_name'])!="true"){
          $data['n_first_name_err']=validateFirstName($data['n_first_name']);
         }
        
         if(empty($data['n_last_name'])){
            $data['n_last_name_err']='last name can not be empty';
         }else if(validateLastName($data['n_last_name'])!="true"){
          $data['n_last_name_err']=validateLastName($data['n_last_name']);
         }
      
         if(empty($data['n_nic'])){
           $data['n_nic_err']='nic can not be empty';
        }else if(validateNIC($data['n_nic'])!="true"){
          $data['n_nic_err']=validateNIC($data['n_nic']);
         }
       
        if(empty($data['n_contact_number'])){
           $data['n_contact_number_err']='contact number can not be empty';
        }else if(validateContactNumber($data['n_contact_number'])!="true"){
          $data['n_contact_number_err']=validateContactNumber($data['n_contact_number']);
        }
         
           if(empty($data['n_email'])){
             $data['n_email_err']='email can not be empty';
         }else if(validateEmail($data['n_email'])!="true"){
          $data['n_email_err']=validateEmail($data['n_email']);
         }
         
         if(empty($data['n_password'])){
             $data['n_password_err']='password can not be empty';
         }else if(validatePassword($data['n_password'])!="true"){
          $data['n_password_err']=validatePassword($data['n_password']);
         }
      
       
         if(empty($data['n_confirm_password'])){
           $data['n_confirm_password_err']='confirm password  can not be empty';
         }else if(validatePassword($data['n_confirm_password'])!="true"){
          $data['n_confirm_password_err']=validatePassword($data['n_confirm_password']);
         }
      
       
         if(empty($data['n_bank_name'])){
             $data['n_bank_name_err']='bank name can not be empty';
         }else if(validateBankName($data['n_bank_name'])!="true"){
          $data['n_bank_name_err']=validateBankName($data['n_bank_name']);
         }
         
         if(empty($data['n_account_holder_name'])){
             $data['n_account_holder_name_err']='account holder name can not be empty';
         }else if(validateAccountHolderName($data['n_account_holder_name'])!="true"){
          $data['n_account_holder_name_err']=validateAccountHolderName($data['n_account_holder_name']);
         }
       
         if(empty($data['n_branch'])){
           $data['n_branch_err']='branch name can not be empty';
         }else if(validateBankBranch($data['n_branch'])!="true"){
          $data['n_branch_err']=validateBankBranch($data['n_branch']);
         }
       
         if(empty($data['n_account_number'])){
           $data['n_account_number_err']='account number can not be empty';
         }else if(validateAccountNumber($data['n_account_number'])!="true"){
          $data['n_account_number_err']=validateAccountNumber($data['n_account_number']);
         }

         if(empty($data['n_slmc_reg_number'])){
           $data['n_slmc_reg_number_err']='slmc reg number can not be empty';
        }else if(validateSlmcRegisterNumber($data['n_slmc_reg_number'])!="true"){
          $data['n_slmc_reg_number_err']=validateSlmcRegisterNumber($data['n_slmc_reg_number']);
         }
       
         if(empty($data['n_fee'])){
             $data['n_fee_err']='fee can not be empty';
         }else if(validateFee($data['n_fee'])!="true"){
          $data['n_fee_err']=validateFee($data['n_fee']);
         }
       
         
         if(empty($data['n_gender'])){
           $data['n_gender_err']='gender can not be empty';
         }
         
         if(empty($data['n_qualification_file'])){
           $data['n_qualification_file_err']='qualification_file can not be empty';
         }

       
          if($data['n_password']!=$data['n_confirm_password']){
           $data['n_passwordnotmatch_err']='password not match';
          }

          if($this->adminUserMgmtModel->findNutritionistByEmail($data['n_email'])){
            $data['n_email_err']='Email is already registered';
 
          } 
          else if($this->adminUserMgmtModel->findReqNutritionistByEmail($data['n_email'])){
            $data['n_email_err']='Email is already registered';
 
          }
       
   
   
        
          if(empty($data['n_first_name_err']) && empty($data['n_last_name_err'])&& empty($data['n_nic_err'])&& empty($data['n_contact_number_err'])&& empty($data['n_email_err'])&& empty($data['n_password_err'])&& empty($data['n_confirm_password_err'])&& empty($data['n_bank_name_err'])&& empty($data['n_account_holder_name_err'])&& empty($data['n_branch_err'])&& empty($data['n_account_number_err'])&& empty($data['n_slmc_reg_number_err'])&& empty($data['n_fee_err'])&& empty($data['n_gender_err'])&& empty($data['n_qualification_file_err'])){
              
            $data['n_password']=password_hash($data['n_password'],PASSWORD_DEFAULT);
             if($this->serviceProviderSignupModel->signupNutritionist($data)){
                $nutritionistDetails=$this->serviceProviderSignupModel->getLatestReqNutritionistID();
                sendMail($data['n_email'],$data['n_first_name'],2, 7,$nutritionistDetails->requested_nutritionist_id);

                redirect('Pages/verify_email');
             
               }else{
                   die('Error creating');
               }  
          
          }else{
             $this->view('patients/v_signup',$data);

          }
         
              
         }else{
                 
                
    
           $data=[
    
            'n_first_name'=>'',
            'n_last_name'=>'',
            'n_nic'=>'',
            'n_contact_number'=>'',
            'n_email'=>'',
            'n_password'=>'',
            'n_confirm_password'=>'',
            'n_gender'=>'',
            'n_bank_name'=>'',
            'n_account_holder_name'=>'',
            'n_branch'=>'',
            'n_account_number'=>'',
            'n_slmc_reg_number'=>'',
            'n_qualification_file'=>'',
            'n_fee'=>'',
            

            'n_first_name_err'=>'',
            'n_last_name_err'=>'',
            'n_nic_err'=>'',
            'n_contact_number_err'=>'',
            'n_email_err'=>'',
            'n_password_err'=>'',
            'n_confirm_password_err'=>'',
            'n_bank_name_err'=>'',
            'n_account_holder_name_err'=>'',
            'n_branch_err'=>'',
            'n_account_number_err'=>'',
            'n_slmc_reg_number_err'=>'',
            'n_fee_err'=>'',
            'n_gender_err'=>'',
            'n_qualification_file_err'=>''
          ];
    
          $this->view('patients/v_signup',$data);

     }
    
           
       }



  


}

 ?>
