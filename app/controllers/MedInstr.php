<?php

class MedInstr extends Controller{
  private $userModel; 
  public function __construct(){
    $this->userModel = $this->model('M_MedInstr');
  }
  public function profile()
  {
   if(isset($_SESSION['MedInstr_id'])) {  
  
   $user= $this->userModel->findUserByID($_SESSION['MedInstr_id']);
   $data=[ 
    'email' => $user->email,                
    'first_name'=>$user->first_name,
    'last_name'=>$user->last_name,
    'nic'=>$user->nic,
    'contact_number'=>$user->contact_number,
    'bank_name'=>$user->bank_name,
    'account_holder_name'=>$user->account_holder_name,
    'branch'=>$user->branch,
    'account_number'=>$user->account_number,
    'gender'=>$user->gender,
    'city'=>$user->city,
    'address'=>$user->address,
    'fee'=>$user->fee,
   ];
   $this->view('MedInstr/MedInstr/v_profile',$data);

}else{
   redirect('Login/login');  
 }

  }

  public function changePW()
  {
   if(isset($_SESSION['MedInstr_id'])) {  
  
   //  $user= $this->userModel->changeUserPW($_SESSION['MedInstr_id']);
   $data=[                      
    'current_password_err'=>'',
    'retype_new_password_err'=>'' ,
    'new_password_err'=>''
   ];
   $this->view('MedInstr/MedInstr/v_changePW',$data);

}else{
   redirect('Login/login');  
 }

  }

  public function updatePW($id){
  
   if(isset($_SESSION['MedInstr_id'])) {  
  
   if($_SERVER["REQUEST_METHOD"] == 'POST'){
       $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
 
       $data = [
         'meditation_instructor_id' => $id,  
         'current_password'=>trim($_POST['current_password']),
         'new_password'=>trim($_POST['new_password']),      
         'retype_new_password'=>trim($_POST['retype_new_password']),      
       
         'current_password_err'=>'',
         'retype_new_password_err'=>'' ,
         'new_password_err'=>'' ];      
        

       if(empty($data['current_password'])){
         $data['current_password_err']='Please enter a current password';
      
       }else{
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
       } 
       
       if(empty($data['retype_new_password'])){
        $data['retype_new_password_err']='Please retype new password';
     } 

       if(empty($data['current_password_err']) && empty($data['retype_new_password_err']) && empty($data['new_password_err'])){
     
        $data['password']=password_hash($data['new_password'],PASSWORD_DEFAULT);
        $changeUserPW=$this->userModel->changePW($data);

          if($changeUserPW){
            flash('reg_flash', 'You are succesfully changed Password!');
            redirect('MedInstr/changePW');    
            
          }
          else{
           $data['retype_new_password_err']='something wrong';
           $this->view('MedInstr/MedInstr/v_changePW',$data);
          }   
       }else{
         $this->view('MedInstr/MedInstr/v_changePW',$data);
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
      $this->view('MedInstr/MedInstr/v_changePW',$data);     
   } 
}else{
   redirect('Login/login');  
 }

}

  

  
  public function isLoggedIn(){
    if(isset($_SESSION['MedInstr_id'])){
      return true;
    }else{
      return false;
    }
  }
  
  public function editProfile($userId){
  
   if(isset($_SESSION['MedInstr_id'])) {  
  
   if($_SERVER['REQUEST_METHOD']=='POST'){
        $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data=[
          'email'=>$_POST['email'],
          'meditation_instructor_id'=>$userId,
          'first_name'=>trim($_POST['first_name']),
          'last_name'=>trim($_POST['last_name']),
          'nic'=>trim($_POST['nic']),
          'contact_number'=>trim($_POST['contact_number']),
          'bank_name'=>trim($_POST['bank_name']),
          'account_holder_name'=>trim($_POST['account_holder_name']),
          'branch'=>trim($_POST['branch']),
          'account_number'=>trim($_POST['account_number']),
          'gender'=>trim($_POST['gender']),
          'city'=>trim($_POST['city']),
          'address'=>trim($_POST['address']),
          'fee'=>trim($_POST['fee']),
           

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
          'address_err'=>'',
          'fee_err'=>''
         
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
        $data['bank_err']='bank name can not be empty';
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

       if(empty($data['address'])){
          $data['address_err']='address can not be empty';
       }

       if(empty($data['fee'])){
          $data['fee_err']='fee can not be empty';
       }

      if(empty($data['first_name_err']) && empty($data['last_name_err'])&& empty($data['nic_err'])&& empty($data['contact_number_err'])&& empty($data['gender_err'])  && empty($data['city_err'])&& empty($data['address_err'])&& empty($data['fee_err'])&& empty($data['bank_err'])&& empty($data['account_holder_name_err'])&& empty($data['branch_err'])&& empty($data['account_number_err'])){
            if($this->userModel->editUser($data)){
                flash('post_msg', 'User account is updated successfully');
                  $this->view('MedInstr/MedInstr/v_profile',$data);    
            }else{
              $this->view('MedInstr/MedInstr/v_profile',$data);    
            }  
       
      }else{
        $this->view('MedInstr/MedInstr/v_profile',$data);     
      }



    }else{
       $user= $this->userModel->findUserByID($userId);

       
      $data=[
        'email' => $user->email, 
        'first_name'=>$user->first_name,
        'last_name'=>$user->last_name,
        'nic'=>$user->nic,
        'contact_number'=>$user->contact_number,
        'bank_name'=>$user->bank_name,
        'account_holder_name'=>$user->account_holder_name,
        'branch'=>$user->branch,
        'account_number'=>$user->account_number,
        'gender'=>$user->gender,
        'city'=>$user->city,
        'address'=>$user->address,
        'fee'=>$user->fee,
        

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
          'address_err'=>'',
          'fee_err'=>''
         
      
       ];

       redirect('MedInstr/profile'); 
    }}else{
      redirect('Login/login');  
    }
   
 }






}



 ?>
