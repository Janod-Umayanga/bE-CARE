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
          'first_name'=>trim($_POST['first_name']),
          'last_name'=>trim($_POST['last_name']),
          'nic'=>trim($_POST['nic']),
          'contact_number'=>trim($_POST['contact_number']),
          'email'=>trim($_POST['email']),
          'password'=>trim($_POST['password']),
          'confirm_password'=>trim($_POST['confirm_password']),
          'city'=>trim($_POST['city']),
          'bank_name'=>trim($_POST['bank_name']),
          'account_holder_name'=>trim($_POST['account_holder_name']),
          'branch'=>trim($_POST['branch']),
          'account_number'=>trim($_POST['account_number']),
          'slmc_reg_number'=>trim($_POST['slmc']),
          'type'=>trim($_POST['type']),
          'specialization'=>trim($_POST['specialization']),
          'gender'=>trim($_POST['gender']),
          'qualification_file'=>$_FILES['qualification_file'],
          'qualification_file_name'=>trim($_POST['first_name']).' '.trim($_POST['last_name']).'_'.$_FILES['qualification_file']['name'],
          
      
          'first_name_err'=>'',
          'last_name_err'=>'',
          'nic_err'=>'',
          'contact_number_err'=>'',
          'email_err'=>'',
          'password_err'=>'',
          'confirm_password_err'=>'',
          'city_err'=>'',
          'bank_name_err'=>'',
          'account_holder_name_err'=>'',
          'branch_err'=>'',
          'account_number_err'=>'',
          'slmc_reg_number_err'=>'',
          'type_err'=>'',
          'specialization_err'=>'',
          'gender_err'=>'',
          'qualification_file_err'=>'',
          
       ];
    
       if(empty($data['qualification_file'])){
         $data['qualification_file_err']='qualification file can not be empty';
       }else{
           $fileExt=explode('.',$_FILES['qualification_file']['name']);
           $fileActualExt=strtolower(end($fileExt));
           $allowed=array('jpg','jpeg','png','pdf','zip','rar');

         
           if(!in_array($fileActualExt,$allowed)){
             $data['qualification_file_err']='You cannot upload files of this type';

           }
     

           if($data['qualification_file']['size']>0){
             if(uploadFile($data['qualification_file']['tmp_name'],$data['qualification_file_name'],'/upload/doctor_qualification/')){
                       
             }else{  
             $data['qualification_file_err']='Unsuccessful qualification_file uploading';
             
             }
           }else{
             $data[ 'qualification_file_err'] ="qualification file size is empty";
           
           }
 
       }
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
       
         if(empty($data['email'])){
           $data['email_err']='email can not be empty';
       }
       
       if(empty($data['password'])){
           $data['password_err']='password can not be empty';
       }
     
       if(empty($data['confirm_password'])){
         $data['confirm_password_err']='confirm password  can not be empty';
       }
     
       if(empty($data['city'])){
         $data['city_err']='city can not be empty';
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

       if(empty($data['slmc_reg_number'])){
         $data['slmc_reg_number_err']='slmc reg number can not be empty';
      }
     
       if(empty($data['type'])){
           $data['type_err']='type can not be empty';
       }
     
       if(empty($data['specialization'])){
         $data['specialization_err']='specialization can not be empty';
       }
       
       if(empty($data['gender'])){
         $data['gender_err']='gender can not be empty';
       }
       
    

       
       if($data['password']!=$data['confirm_password']){
        $data['password_err']='password not match';
       }

       if($this->adminUserMgmtModel->findDoctorByEmail($data['email'])){
         $data['email_err']='Email is already registered';

       } 
       else if($this->adminUserMgmtModel->findReqDoctorByEmail($data['email'])){
         $data['email_err']='Email is already registered';

       }
    


       if(empty($data['first_name_err']) && empty($data['last_name_err'])&& empty($data['nic_err'])&& empty($data['contact_number_err'])&& empty($data['email_err'])&& empty($data['password_err'])&& empty($data['confirm_password_err'])&& empty($data['city_err'])&& empty($data['bank_name_err'])&& empty($data['account_holder_name_err'])&& empty($data['branch_err'])&& empty($data['account_number_err'])&& empty($data['slmc_reg_number_err'])&& empty($data['type_err'])&& empty($data['specialization_err'])&& empty($data['gender_err'])&& empty($data['qualification_file_err'])){
            
         $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
          if($this->serviceProviderSignupModel->signupDoctor($data)){
                  $this->view('inc/v_pending',$data); 
            }else{
                die('Error creating');
            }  
       
       }else{
           $this->view('patients/v_signup',$data);

       }
      
           
      }else{
              
             
 
        $data=[
 
         'first_name'=>'',
         'last_name'=>'',
         'nic'=>'',
         'contact_number'=>'',
         'email'=>'',
         'password'=>'',
         'confirm_password'=>'',
         'gender'=>'',
         'city'=>'',
         'bank_name'=>'',
         'account_holder_name'=>'',
         'branch'=>'',
         'account_number'=>'',
         'slmc_reg_number'=>'',
         'qualification_file'=>'',
         'type'=>'',
         'specialization'=>'',
 
          'first_name_err'=>'',
          'last_name_err'=>'',
          'nic_err'=>'',
          'contact_number_err'=>'',
          'email_err'=>'',
          'password_err'=>'',
          'confirm_password_err'=>'',
          'city_err'=>'',
          'bank_name_err'=>'',
          'account_holder_name_err'=>'',
          'branch_err'=>'',
          'account_number_err'=>'',
          'slmc_reg_number_err'=>'',
          'type_err'=>'',
          'specialization_err'=>'',
          'gender_err'=>'',
          'qualification_file_err'=>'',
        ];
 
    //    $this->view('AdminUserMgmt/Doctor/v_doctorAddNew',$data);
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
                'first_name'=>trim($_POST['first_name']),
                'last_name'=>trim($_POST['last_name']),
                'nic'=>trim($_POST['nic']),
                'contact_number'=>trim($_POST['contact_number']),
                'email'=>trim($_POST['email']),
                'password'=>trim($_POST['password']),
                'confirm_password'=>trim($_POST['confirm_password']),
                'city'=>trim($_POST['city']),
                'bank_name'=>trim($_POST['bank_name']),
                'account_holder_name'=>trim($_POST['account_holder_name']),
                'branch'=>trim($_POST['branch']),
                'account_number'=>trim($_POST['account_number']),
                'slmc_reg_number'=>trim($_POST['slmc']),
                'gender'=>trim($_POST['gender']),
                'qualification_file'=>$_FILES['qualification_file'],
                'qualification_file_name'=>trim($_POST['first_name']).' '.trim($_POST['last_name']).'_'.$_FILES['qualification_file']['name'],
                
            
                                    
                 'first_name_err'=>'',
                 'last_name_err'=>'',
                 'nic_err'=>'',
                 'contact_number_err'=>'',
                 'email_err'=>'',
                 'password_err'=>'',
                 'confirm_password_err'=>'',
                 'city_err'=>'',
                 'bank_name_err'=>'',
                 'account_holder_name_err'=>'',
                 'branch_err'=>'',
                 'account_number_err'=>'',
                 'slmc_reg_number_err'=>'',
                 'gender_err'=>'',
                 'qualification_file_err'=>'',
                     
         ];
             $fileExt=explode('.',$_FILES['qualification_file']['name']);
             $fileActualExt=strtolower(end($fileExt));
             $allowed=array('jpg','jpeg','png','pdf','zip','rar');
   
            
             if(!in_array($fileActualExt,$allowed)){
               $data['qualification_file_err']='You cannot upload files of this type';
   
             }
       
   
             if($data['qualification_file']['size']>0){
               if(uploadFile($data['qualification_file']['tmp_name'],$data['qualification_file_name'],'/upload/counsellor_qualification/')){
                          
               }else{  
                $data['qualification_file_err']='Unsuccessful qualification_file uploading';
                
               }
             }else{
                $data[ 'qualification_file_err'] ="qualification file size is empty";
              
             }
    
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
            
              if(empty($data['email'])){
                $data['email_err']='email can not be empty';
            }
            
            if(empty($data['password'])){
                $data['password_err']='password can not be empty';
            }
          
            if(empty($data['confirm_password'])){
              $data['confirm_password_err']='confirm password  can not be empty';
            }
          
            if(empty($data['city'])){
              $data['city_err']='city can not be empty';
            }
  
              if(empty($data['bank_name'])){
                $data['bank_name_err']='bank name can not be empty';
            }
            
            if(empty($data['account_holder_name'])){
                $data['account_holder_name_err']='account_holder name can not be empty';
            }
          
            if(empty($data['branch'])){
              $data['branch_err']='branch name can not be empty';
            }
          
            if(empty($data['account_number'])){
              $data['account_number_err']='last name can not be empty';
            }
  
            if(empty($data['slmc_reg_number'])){
              $data['slmc_reg_number_err']='slmc reg number can not be empty';
           }
          
            
            if(empty($data['gender'])){
              $data['gender_err']='gender can not be empty';
            }
            
            if(empty($data['qualification_file'])){
              $data['qualification_file_err']='qualification_file can not be empty';
            }
  
  

             if($data['password']!=$data['confirm_password']){
              $data['passwordnotmatch_err']='password not match';
             }
   
             if($this->adminUserMgmtModel->findCounsellorByEmail($data['email'])){
               $data['email_err']='Email is already registered';
    
             } 
             else if($this->adminUserMgmtModel->findReqCounsellorByEmail($data['email'])){
               $data['email_err']='Email is already registered';
    
             }
          
      
      
             if(empty($data['first_name_err']) && empty($data['last_name_err'])&& empty($data['nic_err'])&& empty($data['contact_number_err'])&& empty($data['email_err'])&& empty($data['password_err'])&& empty($data['confirm_password_err'])&& empty($data['city_err'])&& empty($data['bank_name_err'])&& empty($data['account_holder_name_err'])&& empty($data['branch_err'])&& empty($data['account_number_err'])&& empty($data['slmc_reg_number_err'])&& empty($data['gender_err'])&& empty($data['qualification_file_err'])){
               
               $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
                if($this->serviceProviderSignupModel->signupCounsellor($data)){
                        $this->view('inc/v_pending',$data); 
                  }else{
                      die('Error creating');
                  }  
             
             }else{
                  $this->view('patients/v_signup',$data);
      
             }
            
                 
            }else{
                    
                   
       
              $data=[
       
               'first_name'=>'',
               'last_name'=>'',
               'nic'=>'',
               'contact_number'=>'',
               'email'=>'',
               'password'=>'',
               'confirm_password'=>'',
               'gender'=>'',
               'city'=>'',
               'bank_name'=>'',
               'account_holder_name'=>'',
               'branch'=>'',
               'account_number'=>'',
               'slmc_reg_number'=>'',
               'qualification_file'=>'',
               
               'first_name_err'=>'',
               'last_name_err'=>'',
               'nic_err'=>'',
               'contact_number_err'=>'',
               'email_err'=>'',
               'password_err'=>'',
               'confirm_password_err'=>'',
               'city_err'=>'',
               'bank_name_err'=>'',
               'account_holder_name_err'=>'',
               'branch_err'=>'',
               'account_number_err'=>'',
               'slmc_reg_number_err'=>'',
               'gender_err'=>'',
               'qualification_file_err'=>'',
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
             'first_name'=>trim($_POST['first_name']),
             'last_name'=>trim($_POST['last_name']),
             'nic'=>trim($_POST['nic']),
             'contact_number'=>trim($_POST['contact_number']),
             'email'=>trim($_POST['email']),
             'password'=>trim($_POST['password']),
             'confirm_password'=>trim($_POST['confirm_password']),
             'city'=>trim($_POST['city']),
             'bank_name'=>trim($_POST['bank_name']),
             'account_holder_name'=>trim($_POST['account_holder_name']),
             'branch'=>trim($_POST['branch']),
             'account_number'=>trim($_POST['account_number']),
             'address'=>trim($_POST['address']),
             'fee'=>trim($_POST['fee']),
             'gender'=>trim($_POST['gender']),
             'qualification_file'=>$_FILES['qualification_file'],
             'qualification_file_name'=>trim($_POST['first_name']).' '.trim($_POST['last_name']).'_'.$_FILES['qualification_file']['name'],
             
         
             'first_name_err'=>'',
             'last_name_err'=>'',
             'nic_err'=>'',
             'contact_number_err'=>'',
             'email_err'=>'',
             'password_err'=>'',
             'confirm_password_err'=>'',
             'city_err'=>'',
             'bank_name_err'=>'',
             'account_holder_name_err'=>'',
             'branch_err'=>'',
             'account_number_err'=>'',
             'address_err'=>'',
             'fee_err'=>'',
             'gender_err'=>'',
             'qualification_file_err'=>'',
          ];
          $fileExt=explode('.',$_FILES['qualification_file']['name']);
          $fileActualExt=strtolower(end($fileExt));
          $allowed=array('jpg','jpeg','png','pdf','zip','rar');

         
          if(!in_array($fileActualExt,$allowed)){
            $data['qualification_file_err']='You cannot upload files of this type';

          }
    

          if($data['qualification_file']['size']>0){
            if(uploadFile($data['qualification_file']['tmp_name'],$data['qualification_file_name'],'/upload/meditation_instructor_qualification/')){
                       
            }else{  
             $data['qualification_file_err']='Unsuccessful qualification_file uploading';
             
            }
          }else{
             $data[ 'qualification_file_err'] ="qualification file size is empty";
           
          }
 
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
         
           if(empty($data['email'])){
             $data['email_err']='email can not be empty';
         }
         
         if(empty($data['password'])){
             $data['password_err']='password can not be empty';
         }
       
         if(empty($data['confirm_password'])){
           $data['confirm_password_err']='confirm password  can not be empty';
         }
       
         if(empty($data['city'])){
           $data['city_err']='city can not be empty';
         }

           if(empty($data['bank_name'])){
             $data['bank_name_err']='bank name can not be empty';
         }
         
         if(empty($data['account_holder_name'])){
             $data['account_holder_name_err']='account_holder name can not be empty';
         }
       
         if(empty($data['branch'])){
           $data['branch_err']='branch name can not be empty';
         }
       
         if(empty($data['account_number'])){
           $data['account_number_err']='account_number can not be empty';
         }

         if(empty($data['address'])){
           $data['address_err']='address can not be empty';
        }
       
         if(empty($data['fee'])){
             $data['fee_err']='fee can not be empty';
         }
       
        
         if(empty($data['gender'])){
           $data['gender_err']='gender can not be empty';
         }
         
         if(empty($data['qualification_file'])){
           $data['qualification_file_err']='qualification_file can not be empty';
         }




          if($data['password']!=$data['confirm_password']){
           $data['passwordnotmatch_err']='password not match';
          }

          if($this->adminUserMgmtModel->findMeditationInstructorByEmail($data['email'])){
            $data['email_err']='Email is already registered';
 
          } 
          else if($this->adminUserMgmtModel->findReqMeditationInstructorByEmail($data['email'])){
            $data['email_err']='Email is already registered';
 
          }
       
   
   
          
          if(empty($data['first_name_err']) && empty($data['last_name_err'])&& empty($data['nic_err'])&& empty($data['contact_number_err'])&& empty($data['email_err'])&& empty($data['password_err'])&& empty($data['confirm_password_err'])&& empty($data['city_err'])&& empty($data['bank_name_err'])&& empty($data['account_holder_name_err'])&& empty($data['branch_err'])&& empty($data['account_number_err'])&& empty($data['address_err'])&& empty($data['fee_err'])&& empty($data['gender_err'])&& empty($data['qualification_file_err'])){
               
        
               
            $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
             if($this->serviceProviderSignupModel->signupMeditationInstructor($data)){
                     $this->view('inc/v_pending',$data);  
               }else{
  //                 die('Error creating');
               }  
          
          }else{
                $this->view('patients/v_signup',$data);
          }
         
              
         }else{
                 
                
    
           $data=[
    
            'first_name'=>'',
            'last_name'=>'',
            'nic'=>'',
            'contact_number'=>'',
            'email'=>'',
            'password'=>'',
            'confirm_password'=>'',
            'gender'=>'',
            'city'=>'',
            'bank_name'=>'',
            'account_holder_name'=>'',
            'branch'=>'',
            'account_number'=>'',
            'qualification_file'=>'',
            'address'=>'',
            'fee'=>'',
    
            'first_name_err'=>'',
            'last_name_err'=>'',
            'nic_err'=>'',
            'contact_number_err'=>'',
            'email_err'=>'',
            'password_err'=>'',
            'confirm_password_err'=>'',
            'city_err'=>'',
            'bank_name_err'=>'',
            'account_holder_name_err'=>'',
            'branch_err'=>'',
            'account_number_err'=>'',
            'address_err'=>'',
            'fee_err'=>'',
            'gender_err'=>'',
            'qualification_file_err'=>'',
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
             'first_name'=>trim($_POST['first_name']),
             'last_name'=>trim($_POST['last_name']),
             'nic'=>trim($_POST['nic']),
             'contact_number'=>trim($_POST['contact_number']),
             'email'=>trim($_POST['email']),
             'password'=>trim($_POST['password']),
             'confirm_password'=>trim($_POST['confirm_password']),
             'city'=>trim($_POST['city']),
             'bank_name'=>trim($_POST['bank_name']),
             'account_holder_name'=>trim($_POST['account_holder_name']),
             'branch'=>trim($_POST['branch']),
             'account_number'=>trim($_POST['account_number']),
             'slmc_reg_number'=>trim($_POST['slmc']),
             'pharmacy_name'=>trim($_POST['pharmacy_name']),
             'address'=>trim($_POST['address']),
             'gender'=>trim($_POST['gender']),
             'qualification_file'=>$_FILES['qualification_file'],
             'qualification_file_name'=>trim($_POST['first_name']).' '.trim($_POST['last_name']).'_'.$_FILES['qualification_file']['name'],
             
         
             'first_name_err'=>'',
             'last_name_err'=>'',
             'nic_err'=>'',
             'contact_number_err'=>'',
             'email_err'=>'',
             'password_err'=>'',
             'confirm_password_err'=>'',
             'city_err'=>'',
             'bank_name_err'=>'',
             'account_holder_name_err'=>'',
             'branch_err'=>'',
             'account_number_err'=>'',
             'slmc_reg_number_err'=>'',
             'pharmacy_name_err'=>'',
             'address_err'=>'',
             'gender_err'=>'',
             'qualification_file_err'=>''
          ];
          $fileExt=explode('.',$_FILES['qualification_file']['name']);
          $fileActualExt=strtolower(end($fileExt));
          $allowed=array('jpg','jpeg','png','pdf','zip','rar');

         
          if(!in_array($fileActualExt,$allowed)){
            $data['qualification_file_err']='You cannot upload files of this type';

          }
    

          if($data['qualification_file']['size']>0){
            if(uploadFile($data['qualification_file']['tmp_name'],$data['qualification_file_name'],'/upload/pharmacist_qualification/')){
                       
            }else{  
             $data['qualification_file_err']='Unsuccessful qualification_file uploading';
             
            }
          }else{
             $data[ 'qualification_file_err'] ="qualification file size is empty";
           
          }
 
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
         
           if(empty($data['email'])){
             $data['email_err']='email can not be empty';
         }
         
         if(empty($data['password'])){
             $data['password_err']='password can not be empty';
         }
       
         if(empty($data['confirm_password'])){
           $data['confirm_password_err']='confirm password  can not be empty';
         }
       
         if(empty($data['city'])){
           $data['city_err']='city can not be empty';
         }

           if(empty($data['bank_name'])){
             $data['bank_name_err']='bank name can not be empty';
         }
         
         if(empty($data['account_holder_name'])){
             $data['account_holder_name_err']='account_holder name can not be empty';
         }
       
         if(empty($data['branch'])){
           $data['branch_err']='branch name can not be empty';
         }
       
         if(empty($data['account_number'])){
           $data['account_number_err']='last name can not be empty';
         }

         if(empty($data['slmc_reg_number'])){
           $data['slmc_reg_number_err']='slmc reg number can not be empty';
        }
       
         if(empty($data['pharmacy_name'])){
             $data['pharmacy_name_err']='pharmacy name can not be empty';
         }
       
         if(empty($data['address'])){
           $data['address_err']='address can not be empty';
         }
         
         if(empty($data['gender'])){
           $data['gender_err']='gender can not be empty';
         }
         
         if(empty($data['qualification_file'])){
           $data['qualification_file_err']='qualification_file can not be empty';
         }

       
          if($data['password']!=$data['confirm_password']){
           $data['passwordnotmatch_err']='password not match';
          }

          if($this->adminUserMgmtModel->findPharmacistByEmail($data['email'])){
            $data['email_err']='Email is already registered';
 
          } 
          else if($this->adminUserMgmtModel->findReqPharmacistByEmail($data['email'])){
            $data['email_err']='Email is already registered';
 
          }
       
             
          if(empty($data['first_name_err']) && empty($data['last_name_err'])&& empty($data['nic_err'])&& empty($data['contact_number_err'])&& empty($data['email_err'])&& empty($data['password_err'])&& empty($data['confirm_password_err'])&& empty($data['city_err'])&& empty($data['bank_name_err'])&& empty($data['account_holder_name_err'])&& empty($data['branch_err'])&& empty($data['account_number_err'])&& empty($data['slmc_reg_number_err'])&& empty($data['pharmacy_name_err'])&& empty($data['address_err'])&& empty($data['gender_err'])&& empty($data['qualification_file_err'])){
               
                 
            $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
             if($this->serviceProviderSignupModel->signupPharmacist($data)){
                  $this->view('inc/v_pending',$data);
               }else{
                   die('Error creating');
               }  
          
          }else{
              $this->view('patients/v_signup',$data);

          }
         
              
         }else{
                 
                
    
           $data=[
    
            'first_name'=>'',
            'last_name'=>'',
            'nic'=>'',
            'contact_number'=>'',
            'email'=>'',
            'password'=>'',
            'confirm_password'=>'',
            'gender'=>'',
            'city'=>'',
            'bank_name'=>'',
            'account_holder_name'=>'',
            'branch'=>'',
            'account_number'=>'',
            'slmc_reg_number'=>'',
            'qualification_file'=>'',
            'pharmacy_name'=>'',
            'address'=>'',

            'first_name_err'=>'',
            'last_name_err'=>'',
            'nic_err'=>'',
            'contact_number_err'=>'',
            'email_err'=>'',
            'password_err'=>'',
            'confirm_password_err'=>'',
            'city_err'=>'',
            'bank_name_err'=>'',
            'account_holder_name_err'=>'',
            'branch_err'=>'',
            'account_number_err'=>'',
            'slmc_reg_number_err'=>'',
            'pharmacy_name_err'=>'',
            'address_err'=>'',
            'gender_err'=>'',
            'qualification_file_err'=>''
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
             'first_name'=>trim($_POST['first_name']),
             'last_name'=>trim($_POST['last_name']),
             'nic'=>trim($_POST['nic']),
             'contact_number'=>trim($_POST['contact_number']),
             'email'=>trim($_POST['email']),
             'password'=>trim($_POST['password']),
             'confirm_password'=>trim($_POST['confirm_password']),
             'bank_name'=>trim($_POST['bank_name']),
             'account_holder_name'=>trim($_POST['account_holder_name']),
             'branch'=>trim($_POST['branch']),
             'account_number'=>trim($_POST['account_number']),
             'slmc_reg_number'=>trim($_POST['slmc']),
             'fee'=>trim($_POST['fee']),
             'gender'=>trim($_POST['gender']),
             'qualification_file'=>$_FILES['qualification_file'],
             'qualification_file_name'=>trim($_POST['first_name']).' '.trim($_POST['last_name']).'_'.$_FILES['qualification_file']['name'],
             
         
            
             'first_name_err'=>'',
             'last_name_err'=>'',
             'nic_err'=>'',
             'contact_number_err'=>'',
             'email_err'=>'',
             'password_err'=>'',
             'confirm_password_err'=>'',
             'bank_name_err'=>'',
             'account_holder_name_err'=>'',
             'branch_err'=>'',
             'account_number_err'=>'',
             'slmc_reg_number_err'=>'',
             'fee_err'=>'',
             'gender_err'=>'',
             'qualification_file_err'=>''
          ];
          $fileExt=explode('.',$_FILES['qualification_file']['name']);
          $fileActualExt=strtolower(end($fileExt));
          $allowed=array('jpg','jpeg','png','pdf','zip','rar');

         
          if(!in_array($fileActualExt,$allowed)){
            $data['qualification_file_err']='You cannot upload files of this type';

          }
    

          if($data['qualification_file']['size']>0){
            if(uploadFile($data['qualification_file']['tmp_name'],$data['qualification_file_name'],'/upload/nutritionist_qualification/')){
                       
            }else{  
             $data['qualification_file_err']='Unsuccessful qualification_file uploading';
             
            }
          }else{
             $data[ 'qualification_file_err'] ="qualification file size is empty";
           
          }
 
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
         
           if(empty($data['email'])){
             $data['email_err']='email can not be empty';
         }
         
         if(empty($data['password'])){
             $data['password_err']='password can not be empty';
         }
       
         if(empty($data['confirm_password'])){
           $data['confirm_password_err']='confirm password  can not be empty';
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

         if(empty($data['slmc_reg_number'])){
           $data['slmc_reg_number_err']='slmc reg number can not be empty';
        }
       
         if(empty($data['fee'])){
             $data['fee_err']='fee can not be empty';
         }
       
         
         if(empty($data['gender'])){
           $data['gender_err']='gender can not be empty';
         }
         
         if(empty($data['qualification_file'])){
           $data['qualification_file_err']='qualification_file can not be empty';
         }

       
          if($data['password']!=$data['confirm_password']){
           $data['passwordnotmatch_err']='password not match';
          }

          if($this->adminUserMgmtModel->findNutritionistByEmail($data['email'])){
            $data['email_err']='Email is already registered';
 
          } 
          else if($this->adminUserMgmtModel->findReqNutritionistByEmail($data['email'])){
            $data['email_err']='Email is already registered';
 
          }
       
   
   
        
          if(empty($data['first_name_err']) && empty($data['last_name_err'])&& empty($data['nic_err'])&& empty($data['contact_number_err'])&& empty($data['email_err'])&& empty($data['password_err'])&& empty($data['confirm_password_err'])&& empty($data['bank_name_err'])&& empty($data['account_holder_name_err'])&& empty($data['branch_err'])&& empty($data['account_number_err'])&& empty($data['slmc_reg_number_err'])&& empty($data['fee_err'])&& empty($data['gender_err'])&& empty($data['qualification_file_err'])){
              
            $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
             if($this->serviceProviderSignupModel->signupNutritionist($data)){
                   $this->view('inc/v_pending',$data);  
               }else{
                   die('Error creating');
               }  
          
          }else{
             $this->view('patients/v_signup',$data);

          }
         
              
         }else{
                 
                
    
           $data=[
    
            'first_name'=>'',
            'last_name'=>'',
            'nic'=>'',
            'contact_number'=>'',
            'email'=>'',
            'password'=>'',
            'confirm_password'=>'',
            'gender'=>'',
            'bank_name'=>'',
            'account_holder_name'=>'',
            'branch'=>'',
            'account_number'=>'',
            'slmc_reg_number'=>'',
            'qualification_file'=>'',
            'fee'=>'',
            

            'first_name_err'=>'',
            'last_name_err'=>'',
            'nic_err'=>'',
            'contact_number_err'=>'',
            'email_err'=>'',
            'password_err'=>'',
            'confirm_password_err'=>'',
            'bank_name_err'=>'',
            'account_holder_name_err'=>'',
            'branch_err'=>'',
            'account_number_err'=>'',
            'slmc_reg_number_err'=>'',
            'fee_err'=>'',
            'gender_err'=>'',
            'qualification_file_err'=>''
          ];
    
          $this->view('patients/v_signup',$data);

     }
    
           
       }



  


}

 ?>
