<?php
class Nutritionist extends Controller
{
  private $nutritionistViewHistoryModel;
  private $nutritionistModel;
  private $nutritionistViewRequestsModel;
  private $nutritionistViewRequestsMoreModel;
  private $nutritionistIssueDietPlansModel;
//  private $requestedDietPlanModel;
  private $nutritionistremoverequestModel;
  private $userModel;

  public function __construct()
  {
    $this->nutritionistModel = $this->model('M_Nutritionist');
    $this->userModel=$this->model('M_Nutritionist');
    $this->nutritionistViewHistoryModel = $this->model('M_Nutritionist');
    $this->nutritionistViewRequestsModel = $this->model('M_Nutritionist');
    $this->nutritionistViewRequestsMoreModel = $this->model('M_Nutritionist');
    $this->nutritionistIssueDietPlansModel = $this->model('M_Nutritionist');
    $this->nutritionistremoverequestModel = $this->model('M_Nutritionist');
  }

  public function nutritionistDashBoard()
  {
    if (isset($_SESSION['nutritionist_id'])) {

      $user = $this->nutritionistModel->findNutritionistByEmail($_SESSION['nutritionist_id']);
      $data = [
        'user' => $user
      ];
      $this->view('Nutritionist/v_NutritionistDashboard', $data);

    } else {
      redirect('Login/login');
    }
  }

  public function getAllRequests()
  {

    if (isset($_SESSION['nutritionist_id'])) {
      $req = $this->nutritionistViewRequestsModel->getAllRequests($_SESSION['nutritionist_id']);

      $data = [
        'req' => $req
      ];
      $this->view('Nutritionist/v_NutritionistViewRequests', $data);
    } else {
      redirect('Login/login');
    }

  }

  public function getAllRequestsMore()
{
  if (isset($_SESSION['nutritionist_id'])) {
    if (isset($_POST['submit'])) {
      $dietID = $_POST['request_diet_plan_id'];     
      $more = $this->nutritionistViewRequestsMoreModel->getAllRequestsMore($dietID);

      $data = [
        'more' => $more
      ];
      $this->view('Nutritionist/v_NutritionistViewRequestsMore', $data);
   
    }else{
      redirect('Nutritionist/getAllRequests');
    }
    // rest of the code
  } else {
    redirect('Login/login');
  }
}


public function nutritionistViewHistory()
{

  if (isset($_SESSION['nutritionist_id'])) {
    $his = $this->nutritionistViewHistoryModel->viewHistoryPage($_SESSION['nutritionist_id']);

    $data = [
      'his' => $his
    ];
    $this->view('Nutritionist/v_NutritionistViewHistory', $data);
  } else {
    redirect('Login/login');
  }

}


  public function nutritionistViewHistoryMore()
{
  if (isset($_SESSION['nutritionist_id'])) {
    if (isset($_POST['submit'])) {
      $diet_plan_id = $_POST['diet_plan_id'];     
      $his = $this->nutritionistViewHistoryModel->viewHistoryPageMore($diet_plan_id);

      $data = [
        'his' => $his
      ];
      $this->view('Nutritionist/v_NutritionistViewHistoryMore', $data);
   
    }else{
      redirect('Nutritionist/nutritionistViewHistory');
    }
    // rest of the code
  } else {
    redirect('Login/login');
  }
}
 
//
public function viewissueDietPlans()
{
         
   if (isset($_SESSION['nutritionist_id'])) {

    if(isset($_POST['submit']))
    {
      $dietPlanID = $_POST['request_diet_plan_id']; 
      $more = $this->nutritionistViewRequestsMoreModel->getAllRequestsMore($dietPlanID);

      $data = [
        'more' => $more,
        'description' => '',
        'diet_plan_file' => '',
       

        'description_err' => '',
        'diet_plan_file_err' => '',
        
      ];
      $this->view('Nutritionist/v_NutritionistIssueDietPlans',$data);
  
    }else{
         redirect('Login/login');  
    }   
  }
}

//send diet plan and email to patient
public function sendDietPlan()
{
    /*Send diet plan*/
  if(isset($_SESSION['nutritionist_id'])){
    

      if($_SERVER["REQUEST_METHOD"] == 'POST')
      { // form is submitting
        
      $dietPlanID = $_POST['request_diet_plan_id']; 
      $more = $this->nutritionistViewRequestsMoreModel->getAllRequestsMore($dietPlanID);
      $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

        // inserted form
        $data = [
        'more' => $more,
        'description' => trim($_POST['description']),
        'diet_plan_file' => trim($_POST['diet_plan_file']),
          
          
        'description_err' => '',
        'diet_plan_file_err' => ''

        ];
        //validate each input
        //validate name
        if (empty($data['description'])) {
          $data['description_err'] = 'Please enter any description';
        }
        // validate diet
        if (empty($data['diet_plan_file'])) {
          $data['diet_plan_file_err'] = 'Please enter diet plan';
        }

        if (empty($data['description_err']) && empty($data['diet_plan_file_err'])) 
      {

        $this->nutritionistIssueDietPlansModel->sendDietPlanDetails($_SESSION['nutritionist_id'], $data);
        $this->view('Nutritionist/v_NutritionistDashboard', $data);
        $this->nutritionistremoverequestModel->removeRequest( $dietPlanID);
       } 
  }
  
}    
else 
{
redirect('Login/login');
}   

 /*Send an email to patient*/
 /*if (isset($_POST['submit'])){
     
     $name=$ 
     $email =  $_SESSION['nutritionist_email'];
     $subject = 'Your requested Diet Plan';
     $message = $_POST['description'];
     $dietFile = $_POST['diet_plan_file'];

     $to = 'danamaduwije98@gmail.com';
     $mail_subject = 
     
 }*/

}

// Nutritionist View Profile
public function profile(){

  if(isset($_SESSION['nutritionist_id'])){
   
    $loggedNutritionist = $this->nutritionistModel->getNutritionistById($_SESSION['nutritionist_id']);
    $data=[
                  
    'first_name'=> $loggedNutritionist->first_name,
    'last_name'=> $loggedNutritionist->last_name,
    'nic'=> $loggedNutritionist->nic,
    'contact_number'=> $loggedNutritionist->contact_number,
    'bank_name'=> $loggedNutritionist->bank_name,
    'account_holder_name'=> $loggedNutritionist->account_holder_name,
    'branch'=> $loggedNutritionist->branch,
    'account_number'=> $loggedNutritionist->account_number,
    'gender'=> $loggedNutritionist->gender,
    'fee'=>$loggedNutritionist->fee,

    'email' =>  $loggedNutritionist->email,   
    'slmc_reg_number'=> $loggedNutritionist->slmc_reg_number,

    'first_name_err'=>'',
    'last_name_err'=>'',
    'nic_err'=>'',
    'contact_number_err'=>'',
    'bank_name_err'=>'',
    'account_holder_name_err'=>'',
    'branch_err'=>'',
    'account_number_err'=>'',
    'gender_err'=>'',   
    'fee_err' =>'' 
    ];
    $this->view('Nutritionist/v_NutritionistDetails', $data);

  }else{
    redirect('Login/login');
  }
}

    
public function editProfile($userId){
       
  if(isset($_SESSION['nutritionist_id'])) {  
 
  if($_SERVER['REQUEST_METHOD']=='POST'){

       $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

       $data=[
         'email'=> $_SESSION['nutritionist_email'],
         'nutritionist_id'=>$userId,
         'first_name'=>trim($_POST['first_name']),
         'last_name'=>trim($_POST['last_name']),
         'nic'=>trim($_POST['nic']),
         'slmc_reg_number'=>trim($_POST['slmc_reg_number']),
         'contact_number'=>trim($_POST['contact_number']),
         'bank_name'=>trim($_POST['bank_name']),
         'account_holder_name'=>trim($_POST['account_holder_name']),
         'branch'=>trim($_POST['branch']),
         'account_number'=>trim($_POST['account_number']),
         'gender'=>trim($_POST['gender']),
         'fee' => trim($_POST['fee']),
        // 'city'=>trim($_POST['city']),
         
         
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
         'fee_err'=>'',
         
        
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

      if(empty($data['fee'])){
         $data['fee_err']='city can not be empty';
      }
      
      if(empty($data['slmc_reg_number'])){
          $data['slmc_reg_number_err']='slmc registration number can not be empty';
       }

      

     if(empty($data['first_name_err']) && empty($data['last_name_err'])&& empty($data['nic_err'])&& empty($data['contact_number_err'])&& empty($data['gender_err']) && empty($data['fee_err'])&& empty($data['bank_name_err'])&& empty($data['account_holder_name_err'])&& empty($data['branch_err'])&& empty($data['account_number_err'])){
           if($this->userModel->editUser($data)){
                 $_SESSION['profile_update']="true";
                 $this->view('Nutritionist/v_NutritionistDetails',$data);    
           }else{
             $this->view('Nutritionist/v_NutritionistDetails',$data);    
           }  
      
     }else{
       $this->view('Nutritionist/v_NutritionistDetails',$data);     
     }



   }else{
      $user= $this->nutritionistModel->getNutritionistById($userId);

      
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
         'fee_err'=>'',
        
     
      ];

      redirect('Nutritionist/profile'); 
   }}else{
     redirect('Login/login');  
   }
  
}

// change and update password


public function changePassword()
{
 if(isset($_SESSION['nutritionist_id'])) {  

 $data=[                      
  'current_password_err'=>'',
  'retype_new_password_err'=>'' ,
  'new_password_err'=>''
 ];
 $this->view('Nutritionist/v_changePassword',$data);

 }else{
 redirect('Login/login');  
}
 
}

public function updatePassword($id){

  if(isset($_SESSION['nutritionist_id'])) {  
 
  if($_SERVER["REQUEST_METHOD"] == 'POST'){
      $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

      $data = [
        'nutritionist_id' => $id,  
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
           redirect('Nutritionist/changePassword');    
           
         }
         else{
          $data['retype_new_password_err']='something wrong';
          $this->view('Nutritionist/v_changePassword',$data);
         }   
      }else{
        $this->view('Nutritionist/v_changePassword',$data);
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
     $this->view('Nutritionist/v_changePassword',$data);     
  } 
}else{
  redirect('Login/login');  
}

}



}
?>



   

