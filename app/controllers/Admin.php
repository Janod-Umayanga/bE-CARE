<?php

class Admin extends Controller{
  private $userModel;

  public function __construct(){
    $this->userModel = $this->model('M_Admin');
  }

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
      $this->view('Admin/v_profile',$data);
  
    }else{
      redirect('Admin/login');  
    }

  }

  public function changePW()
  {
  
    if(isset($_SESSION['admin_id'])) {
  
     //  $user= $this->userModel->changeUserPW($_SESSION['admin_id']);
      $data=[                      
        'current_password_err'=>'',
        'retype_new_password_err'=>'' ,
        'new_password_err'=>''
      ];
      $this->view('Admin/v_changePW',$data);

  }else{
      redirect('Admin/login');  
  }


  }

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
            redirect('Admin/changePW');    
            
          }
          else{
           $data['retype_new_password_err']='something wrong';
           $this->view('Admin/v_changePW',$data);
          }   
       }else{
         $this->view('Admin/v_changePW',$data);
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
      $this->view('Admin/v_changePW',$data);     
   }
  }else{
    redirect('Admin/login');  
  }

}

  

//   public function register(){
//     if($_SERVER['REQUEST_METHOD']=='POST'){
        
//       $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
  
//       $data = [
//         'profile_image' =>$_FILES['profile_image'],
//         'profile_image_name' =>time().'_'.$_FILES['profile_image']['name'],  
//         'name'=>trim($_POST['name']),
//         'email'=>trim($_POST['email']),
//         'password'=>trim($_POST['password']),      
//         'confirm_password'=>trim($_POST['confirm_password']),
        
//         'profile_image_err'=>'', 
//         'name_err'=>'',
//         'email_err'=>'',
//         'password_err'=>'',
//         'confirm_password_err'=>''

//       ];

       
//       if(uploadImage($data['profile_image']['tmp_name'],$data['profile_image_name'],'/img/profileImgs/')){

//       } else{
//            $data['profile_image_err']='profile picture uploaded unsuccessfully';
           
//       }


//       if(empty($data['name'])){
//         $data['name_err']='Please enter a name';
//       }

//       if(empty($data['email'])){
//         $data['email_err']='Please enter a email';

//       }else{
//          if($this->userModel->findUserByEmail($data['email'])){
//            $data['email_err']='Email is already registered';

//          } 
//       }
  
//       if(empty($data['password'])){
//         $data['password_err']='Please enter a password';
    
//       }else if(empty($data['confirm_password']))
//       {
//         $data['confirm_password_err']='Please confirm the password';
        
//       }     
      
//       else{
//         if($data['password']!=$data['confirm_password']){
//           $data['confirm_password_err']='Passwords are not matching';
          
//         }
//       }
      
//       if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['profile_image_err']))
//       {
//          $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
//          if($this->userModel->register($data))
//          {
//             flash('reg_flash', 'You are succesfully registered!');
//             redirect('Admin/login');
//          }else{
//             die('Something went wrong');
//          }
    
//       }else{
//         $this->view('Admin/v_register',$data);
//       }  
       
  
//     }else{
       
//       $data =[
//         'profile_image' =>'',
//         'profile_image_name' =>'',
//         'name'=>'',
//         'email'=>'',
//         'password'=>'',
//         'confirm_password'=>'',
        
//         'profile_image_err'=>'',
//         'name_err'=>'',
//         'email_err'=>'',
//         'password_err'=>'',
//         'confirm_password_err'=>''

//       ];
       
//       $this->view('Admin/v_register',$data);
//     }

//   }


  public function createAdminSession($user){
     $_SESSION['admin_id']=$user->admin_id;
     $_SESSION['admin_name']=$user->first_name;
     $_SESSION['admin_email']=$user->email; 
     if($user->gender=='Male'){
        $_SESSION['admin_gender']='Mr.';
     }else if($user->gender=='Female'){
         $_SESSION['admin_gender']='Ms.';
     }  
    
    redirect('AdminDashboard/index');
      
  }

  public function logout(){
     unset($_SESSION['admin_id']);
     unset($_SESSION['admin_name']);
     unset($_SESSION['admin_email']);
     unset($_SESSION['admin_gender']);
     session_destroy();
     redirect('Admin/login');
     
     
  }  
  
  public function isLoggedIn(){
    if(isset($_SESSION['admin_id'])){
      return true;
    }else{
      return false;
    }
  }
  
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
       }

       if(empty($data['last_name'])){
          $data['last_name_err']='last name can not be empty';
       }

       if(empty($data['nic'])){
        $data['nic_err']='nic can not be empty';
        }

        if(empty($data['contact_number'])){
            $data['contact_number_err']='contact_number can not be empty';
        }

        if(empty($data['bank_name'])){
          $data['bank_name_err']='bank name can not be empty';
      }

      if(empty($data['account_holder_name'])){
          $data['account_holder_name_err']='account_holder_name can not be empty';
      }

        if(empty($data['branch'])){
          $data['branch_err']='branch name can not be empty';
      }

      if(empty($data['account_number'])){
          $data['account_number_err']='account_number can not be empty';
      }
     
      if(empty($data['gender'])){
        $data['gender_err']='gender can not be empty';
      }

       if(empty($data['first_name_err']) && empty($data['last_name_err'])&& empty($data['nic_err'])&& empty($data['contact_number_err'])&& empty($data['bank_name_err'])&& empty($data['account_holder_name_err'])&& empty($data['branch_err'])&& empty($data['account_number_err'])&& empty($data['gender_err'])){
            if($this->userModel->editUser($data)){
                flash('post_msg', 'User account is updated successfully');
                     redirect('Admin/profile'); 
            }else{
                die('Error creating');
            }  
       
       }else{
           redirect('Admin/profile'); 
       }



    }else{
       $user= $this->userModel->findUserByID($userId);

       
       if($user->admin_id != $_SESSION['admin_id']){
           redirect('Admin/login'); 
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
      redirect('Admin/login');  
    }
 }






}



 ?>
