<?php

class Admin extends Controller{
  private $userModel;

  public function __construct(){
    $this->userModel = $this->model('M_Admin');
  }

  // Admin Profile
  public function profile()
  {
   if(isset($_SESSION['admin_id'])) {
           
      $user= $this->userModel->findUserByID($_SESSION['admin_id']);
      $data=[                      
        'admin_id'=>$user->admin_id,
        'first_name'=>$user->first_name,
        'last_name'=>$user->last_name,
        'nic'=>$user->nic,
        'contact_number'=>$user->contact_number,
        'bank_name'=>$user->bank_name,
        'account_holder_name'=>$user->account_holder_name,
        'branch'=>$user->branch,
        'account_number'=>$user->account_number,
        'gender'=>$user->gender,
        'email'=>$user->email,

        'first_name_err'=>'',
        'last_name_err'=>'',
        'nic_err'=>'',
        'contact_number_err'=>'',
        'bank_name_err'=>'',
        'account_holder_name_err'=>'',
        'branch_err'=>'',
        'account_number_err'=>'',
        'gender_err'=>''

      ];
      $this->view('Admin/Admin/v_profile',$data);
  
    }else{
      redirect('Login/login');  
    }

  }


  // Admin Change Passsword
  public function changePW()
  {
    if(isset($_SESSION['admin_id'])) {
 
      $data=[                      
        'current_password_err'=>'',
        'retype_new_password_err'=>'' ,
        'new_password_err'=>''
      ];
      $this->view('Admin/Admin/v_changePW',$data);

  }else{
      redirect('Login/login');  
  }

  }

  //Admin Update Password
  public function updatePW($id){
  
    if(isset($_SESSION['admin_id'])) {
      if($_SERVER["REQUEST_METHOD"] == 'POST'){
       $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
 
       $data = [
          'admin_id' => $id,  
         'current_password'=>trim($_POST['current_password']),
         'new_password'=>trim($_POST['new_password']),      
         'retype_new_password'=>trim($_POST['retype_new_password']),      
       
         'current_password_err'=>'',
         'retype_new_password_err'=>'' ,
         'new_password_err'=>'' ];      
        

       if(empty($data['current_password'])){
         $data['current_password_err']='Please enter a current password';
       
       }else if(validatePassword($data['current_password'])!="true"){
        $data['current_password_err']=validatePassword($data['current_password']);
       }
       
       else{
         if($this->userModel->findUserPWMatch($id,$data['current_password'])){
     
         }else{
                $data['current_password_err']='Current password is incorrect';
          }  
        
       }
       if($data['new_password']!=$data['retype_new_password']){
        $data['new_password_err']='New password and retype new password is incorrect';
       } 

       if(empty($data['new_password'])){
          $data['new_password_err']='Please enter a new password';
       
       }else if(validatePassword($data['new_password'])!="true"){
        $data['new_password_err']=validatePassword($data['new_password']);
       } 
       
       if(empty($data['retype_new_password'])){
        $data['retype_new_password_err']='Please retype new password';
      }
      else if(validatePassword($data['retype_new_password'])!="true"){
       $data['retype_new_password_err']=validatePassword($data['retype_new_password']);
      }

       if(empty($data['current_password_err']) && empty($data['retype_new_password_err']) && empty($data['new_password_err'])){
     
        $data['password']=password_hash($data['new_password'],PASSWORD_DEFAULT);
        $changeUserPW=$this->userModel->changePWAdmin($data);

          if($changeUserPW){
            $_SESSION['profile_updatePasswordAdmin']="true";
            redirect('Admin/changePW');    
            
          }
          else{
           $data['retype_new_password_err']='something wrong';
           $this->view('Admin/Admin/v_changePW',$data);
          }   
       }else{
         $this->view('Admin/Admin/v_changePW',$data);
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
      $this->view('Admin/Admin/v_changePW',$data);     
   }
  }else{
    redirect('Login/login');  
  }

}

//  Check Admin logged in
  public function isLoggedIn(){
    if(isset($_SESSION['admin_id'])){
      return true;
    }else{
      return false;
    }
  }

  // Admin Edit profile
  public function editProfile($userId){
    if(isset($_SESSION['admin_id'])) {
  
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data=[
          'admin_id'=>$userId,
          'first_name'=>trim($_POST['first_name']),
          'last_name'=>trim($_POST['last_name']),
          'nic'=>trim($_POST['nic']),
          'contact_number'=>trim($_POST['contact_number']),
          'bank_name'=>trim($_POST['bank_name']),
          'account_holder_name'=>trim($_POST['account_holder_name']),
          'branch'=>trim($_POST['branch']),
          'account_number'=>trim($_POST['account_number']),
          'gender'=>trim($_POST['gender']),
          'email'=>$_SESSION['admin_email'],

          'first_name_err'=>'',
          'last_name_err'=>'',
          'nic_err'=>'',
          'contact_number_err'=>'',
          'bank_name_err'=>'',
          'account_holder_name_err'=>'',
          'branch_err'=>'',
          'account_number_err'=>'',
          'gender_err'=>''
          
         
       ];

      
       if(empty($data['first_name'])){
          $data['first_name_err']='first name can not be empty';
       
       }else if(validateFirstName($data['first_name'])!="true"){
        $data['first_name_err']=validateFirstName($data['first_name']);
       }

       if(empty($data['last_name'])){
          $data['last_name_err']='last name can not be empty';
       
        }else if(validateLastName($data['last_name'])!="true"){
        $data['last_name_err']=validateLastName($data['last_name']);
       }

       if(empty($data['nic'])){
        $data['nic_err']='nic can not be empty';
        }else if(validateNic($data['nic'])!="true"){
          $data['nic_err']=validateNic($data['nic']);
        }

        if(empty($data['contact_number'])){
             $data['contact_number_err']='contact_number can not be empty';
        
          }else if(validateContactNumber($data['contact_number'])!="true"){
             $data['contact_number_err']=validateContactNumber($data['contact_number']);
         }

        if(empty($data['bank_name'])){
          $data['bank_name_err']='bank name can not be empty';

      }else if(validateBankName($data['bank_name'])!="true"){
        $data['bank_name_err']=validateBankName($data['bank_name']);
       }

      if(empty($data['account_holder_name'])){
          $data['account_holder_name_err']='account_holder_name can not be empty';

        }else if(validateAccountHolderName($data['account_holder_name'])!="true"){
        $data['account_holder_name_err']=validateAccountHolderName($data['account_holder_name']);
       }


        if(empty($data['branch'])){
          $data['branch_err']='branch name can not be empty';
      
        }else if(validateBankBranch($data['branch'])!="true"){
        $data['branch_err']=validateBankBranch($data['branch']);
       }


      if(empty($data['account_number'])){
          $data['account_number_err']='account_number can not be empty';
      }else if(validateAccountNumber($data['account_number'])!="true"){
        $data['account_number_err']=validateAccountNumber($data['account_number']);
       }
     
      if(empty($data['gender'])){
        $data['gender_err']='Title can not be empty';
      }

      if($_SESSION['admin_contact_number']!=  trim($_POST['contact_number'])){
     
        if($this->userModel->findAdminByContactNumber($data['contact_number'])) {
          $data['contact_number_err'] = 'Contact number already in used';
         }
        
      }
     
      if($_SESSION['admin_nic']!=trim($_POST['nic'])){
     
        if($this->userModel->findAdminByNic($data['nic'])) {
          $data['nic_err'] = 'Nic already in used';
        }
      } 


      if($_SESSION['admin_account_number']!=trim(trim($_POST['account_number']))){
     
        if($this->userModel->findAdminByAccountNumber($data['account_number'])) {
          $data['account_number_err'] = 'Account Number already in used';
        }
      }

       if(empty($data['first_name_err']) && empty($data['last_name_err'])&& empty($data['nic_err'])&& empty($data['contact_number_err'])&& empty($data['bank_name_err'])&& empty($data['account_holder_name_err'])&& empty($data['branch_err'])&& empty($data['account_number_err'])&& empty($data['gender_err'])){
            if($this->userModel->editUser($data)){
                  $_SESSION['profile_updateAdmin']="true";
                  redirect('Admin/profile'); 
            }else{
                die('Error creating');
            }  
       
       }else{
        $this->view('Admin/Admin/v_profile',$data);  
       }



    }else{
       $user= $this->userModel->findUserByID($userId);

       
       if($user->admin_id != $_SESSION['admin_id']){
           redirect('Login/login'); 
       }
       

       $data=[

        'first_name'=>$user->first_name,
        'last_name'=>$user->last_name,
        'nic'=>$user->nic,
        'contact_number'=>$user->contact_number,
        'bank_name'=>$user->bank_name,
        'account_holder_name'=>$user->account_holder_name,
        'branch'=>$user->branch,
        'account_number'=>$user->account_number,
        'gender'=>$user->gender,


        'first_name_err'=>'',
        'last_name_err'=>'',
        'nic_err'=>'',
        'contact_number_err'=>'',
        'bank_name_err'=>'',
        'account_holder_name_err'=>'',
        'branch_err'=>'',
        'account_number_err'=>'',
        'gender_err'=>''
      
       ];

       redirect('Admin/profile'); 
    }
  
    }else{
      redirect('Login/login');  
    }
 }






}



 ?>
