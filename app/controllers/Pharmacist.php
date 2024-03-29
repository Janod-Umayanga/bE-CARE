 <?php

   class Pharmacist extends Controller {
    
    private $pharmacistModel;
    private $pharmacistViewOrdersModel; 
    private $userModel;

    public function __construct()
    {
      
       $this->pharmacistModel = $this->model('M_Pharmacist');
       $this->pharmacistViewOrdersModel = $this->model('M_Pharmacist');
       $this->userModel=$this->model('M_Pharmacist');
    }

    public function pharmacistDashBoard()
    {
     if(isset($_SESSION['pharmacist_id'])) {  
   
     $user= $this->pharmacistModel->findPharmacistByEmail($_SESSION['pharmacist_id']); 
     $data=[                      
       'user'=>''
      ]; 
     $this->view('Pharmacist/v_PharmacistDashboard',$data);

     }else{
        redirect('Login/login');  
     } 
    }

    /*view count of orders...pending, accepted,rejected and paid details*/
    public function pharmacistViewOrders()
    {
      if(isset($_SESSION['pharmacist_id'])){

      // get type of orders count seperately
      $noOfPendingOrders = $this->pharmacistModel->pharmacistPendingOrdersCount($_SESSION["pharmacist_id"]);
      $noOfAcceptedOrders = $this->pharmacistModel->pharmacistAcceptedOrdersCount($_SESSION["pharmacist_id"]);
      $noOfRejectedOrders = $this->pharmacistModel->pharmacistRejectedOrdersCount($_SESSION["pharmacist_id"]);

      $data=[   
      
        'noOfPendingOrders' => $noOfPendingOrders,
        'noOfAcceptedOrders' => $noOfAcceptedOrders,
        'noOfRejectedOrders' => $noOfRejectedOrders
       ];

      $this->view('Pharmacist/v_PharmacistViewAllOrderDetails',$data);  
      }else{
        //  $_SESSION['need_login'] = true;
        //  redirect('Login/login');
        redirect('Login/login');  
      }

      }   


    /*view all pending orders details*/
    public function pharmacistViewPendingOrders()
    {
      if(isset($_SESSION['pharmacist_id']))
      {
        $Pendingorders = $this->pharmacistModel->getAllPendingOrderDetailsOfPharmacist($_SESSION['pharmacist_id']);
        
        $data=[      
           'Pendingorders' => $Pendingorders
        ];

      $this->view('Pharmacist/v_PharmacistViewPendingOrders',$data);  
       }else{
      redirect('Login/login');  
       }
      }
    
    /*view all pending orders details*/
    public function pharmacistViewAcceptedOrders()
    {
      if(isset($_SESSION['pharmacist_id']))
      {
        $Acceptedorders = $this->pharmacistModel->getAllAcceptedOrderDetailsOfPharmacist($_SESSION['pharmacist_id']);
    $data=[      
       'Acceptedorders' => $Acceptedorders
     ];

        $this->view('Pharmacist/v_PharmacistViewAcceptedOrders',$data);  
       }else{
      
      redirect('Login/login');  
       }
      }
    
    /*view all rejected orders details*/
    public function pharmacistViewRejectedOrders()
    {
      if(isset($_SESSION['pharmacist_id']))
      {
        $Rejectedorders = $this->pharmacistModel->getAllRejectedOrderDetailsOfPharmacist($_SESSION['pharmacist_id']);
    $data=[      
       'Rejectedorders' => $Rejectedorders
     ];

        $this->view('Pharmacist/v_PharmacistViewRejectedOrders',$data);  
       }else{
      
      redirect('Login/login');  
       }
      }
    
    
      public function pharmacistViewPendingOrdersMore()
    {
        if (isset($_SESSION['pharmacist_id'])) {
            if (isset($_POST['submit'])) {
              $orderID = $_POST['order_request_id'];     
              $PendingOrdersMore = $this->pharmacistModel->getAllViewPendingOrderDetailsMore($orderID);
        
              $data = [
                'PendingOrdersMore' => $PendingOrdersMore
              ];
              $this->view('Pharmacist/v_PharmacistViewPendingOrdersMore', $data);
           
            }else{
              redirect('Pharmacist/pharmacistViewPendingOrders');
            }
            // rest of the code
          } else {
            redirect('Login/login');
          }
         
    }


    public function pharmacistViewAcceptedOrdersMore()
    {
        if (isset($_SESSION['pharmacist_id'])) {
            if (isset($_POST['submit'])) {
              $orderID = $_POST['order_request_id'];     
              $AcceptedOrdersMore = $this->pharmacistModel->getAllAcceptedOrderDetailsMore($orderID);
        
              $data = [
                'AcceptedOrdersMore' => $AcceptedOrdersMore
              ];
              $this->view('Pharmacist/v_PharmacistViewAcceptOrdersMore', $data);
           
            }else{
              redirect('Pharmacist/pharmacistViewAcceptedOrders');
            }
            // rest of the code
          } else {
            redirect('Login/login');
          }
         
    }


    public function pharmacistViewRejectedOrdersMore()
    {
        if (isset($_SESSION['pharmacist_id'])) {
            if (isset($_POST['submit'])) {
              $orderID = $_POST['order_request_id'];     
              $RejectedOrdersMore = $this->pharmacistModel->getAllRejectedOrderDetailsMore($orderID);
        
              $data = [
                'RejectedOrdersMore' => $RejectedOrdersMore
              ];
              $this->view('Pharmacist/v_PharmacistViewRejectedOrdersMore', $data);
           
            }else{
              redirect('Pharmacist/pharmacistViewRejectedOrders');
            }
            // rest of the code
          } else {
            redirect('Login/login');
          }
         
    }

    // view selling history 
    public function pharmacistSellingHistory(){

        if(isset($_SESSION['pharmacist_id'])){
            $history = $this->pharmacistModel->getAllSellingHistory($_SESSION['pharmacist_id']);
        
            $data=[                      
              'history'=>$history
            ]; 
            $this->view('Pharmacist/v_PharmacistViewSellingHistory',$data);  
            }else{
              redirect('Login/login');
          }   

    }

     // view selling history More details
     public function pharmacistSellingHistoryMore(){

      if(isset($_SESSION['pharmacist_id'])) {
        if(isset($_POST['submit'])) {

          $order_Id = $_POST['order_id'];
          $historymore = $this->pharmacistModel->getAllSellingHistoryMore($order_Id);
        
          $data=[                      
            'historymore'=>$historymore
          ]; 
          $this->view('Pharmacist/v_PharmacistViewSellingHistoryMore',$data); 
       
        }else{
          redirect('Pharmacist/pharmacistSellingHistory');
        }
        // rest of the code
      } else {
        redirect('Login/login');
      }

      

  }


 

// Get rder details and 
public function acceptOrders($orderedDateAndTime, $orderID){
  if (isset($_SESSION['pharmacist_id'])) {
      if (isset($_POST['submit'])) { 
        $more = $this->pharmacistModel->getAllOrderDetailsMore($orderID);
  
        $data = [
          'more' => $more,
          'pharmacist_note'=>'',
          'charge'=> '',

          'pharmacist_note_err'=>'',
          'charge_err' => ''
        ];

        // get today's date time
        date_default_timezone_set("Asia/Kolkata");
        $today = date("Y-m-d H:i:s");

        // check if the accepted date time is less than 48 hours
        $diff = abs(strtotime($today) - strtotime($orderedDateAndTime));
        $hours = floor($diff / (60*60));
        if($hours > 24) {
            $this->view('Pharmacist/v_Pharmacist_Accept_order_expired', $data);
        }
        else {
            // Load view
            $this->view('Pharmacist/v_PharmacistAcceptOrder', $data);
        }
        
      }
      // rest of the code
    } else {
      $_SESSION['need_login'] = true;
      // Redirect to login
       redirect('Login/login');
    }
}


// submit form and send an email to pharmacist
public function acceptOrderSubmit() 
{
if(isset($_SESSION['pharmacist_id'])){
  
if($_SERVER["REQUEST_METHOD"] == 'POST')
{ // form is submitting
  $orderID = $_POST['order_request_id'];     
  $more = $this->pharmacistModel->getAllOrderDetailsMore($orderID);
  $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

  
  // inserted form
  $data = [
    'more' => $more,
    'pharmacist_note'=> trim($_POST['pharmacist_note']),
    'charge'=> trim($_POST['charge']),  

    'pharmacist_note_err'=>'',
    'charge_err' => ''

  ];

  //validate Pharmacist Note
  if (empty($data['pharmacist_note'])) {
    $data['pharmacist_note_err'] = 'Please enter Note';
  }
  else if(validatePharmacistNote($data['pharmacist_note']) != "true") {
    $data['pharmacist_note_err'] = 'Note cannot contains invalid characters.';
}

  //validate charge
  if (empty($data['charge'])) {
    $data['charge_err'] = 'Please enter charge';
  }
  else if(validatePostitiveNumber($data['charge']) != "true") {
    $data['charge_err'] = 'Charge must be a positive number';
}

  //after validation 

  if(empty($data['pharmacist_note_err']) && empty($data['charge_err']))
  {
   if($this->pharmacistModel->sendAcceptOrderDetails($_SESSION['pharmacist_id'], $data))
   {
    if($this->pharmacistModel->acceptedOrderDetails($data))
    {
      $patientDetails = $this->pharmacistModel->getPatientDetails($more->patient_id);
      sendMail( $patientDetails->email, $patientDetails->first_name,'', 10,'');
      $this->view('Pharmacist/v_PharmacistDashBoard', $data);
    }
   }   
  }
  else {
    $this->view('Pharmacist/v_PharmacistAcceptOrder', $data);
  }
}

}    
else 
{   redirect('Login/login');
}   


}


// Pharmacist reject orders
public function rejectOrders($orderedDateAndTime, $orderID){
  if (isset($_SESSION['pharmacist_id'])) {
      if (isset($_POST['submit'])) {
      //  $orderID = $_POST['order_request_id'];     
        $more = $this->pharmacistViewOrdersModel->getAllOrderDetailsMore($orderID);
  
        $data = [
          'more' => $more,
          'pharmacist_note'=>'',

          'pharmacist_note_err'=>'',
        ];

          // get today's date time
          date_default_timezone_set("Asia/Kolkata");
          $today = date("Y-m-d H:i:s");
  
          // check if the accepted date time is less than 48 hours
          $diff = abs(strtotime($today) - strtotime($orderedDateAndTime));
          $hours = floor($diff / (60*60));
          if($hours > 24) {
              $this->view('Pharmacist/v_Pharmacist_Rejected_order_expired', $data);
          }
          else {
              // Load view
              $this->view('Pharmacist/v_PharmacistRejectOrder', $data);
          }    
      }
      // rest of the code
    } else {
      $_SESSION['need_login'] = true;
      // Redirect to login
       redirect('Login/login');
    }
}


public function rejectOrderSubmit()
{

if(isset($_SESSION['pharmacist_id'])){
  
if($_SERVER["REQUEST_METHOD"] == 'POST')
{ // form is submitting
  $orderID = $_POST['order_request_id'];     
  $more = $this->pharmacistViewOrdersModel->getAllOrderDetailsMore($orderID);
  $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

  // inserted form
  $data = [
    'more' => $more,
    'pharmacist_note'=> trim($_POST['pharmacist_note']),
  
    'pharmacist_note_err'=>'',
  ];
  
  
  //validate Pharmacist Note
  if (empty($data['pharmacist_note'])) {
    $data['pharmacist_note_err'] = 'Please enter Note';
  }
  else if(validatePharmacistNote($data['pharmacist_note']) != "true") {
    $data['pharmacist_note_err'] = 'Note cannot contains invalid characters.';
  }

  if(empty($data['pharmacist_note_err']))
  {
    if($this->pharmacistModel->rejectOrderDetails($_SESSION['pharmacist_id'],$data))
    { 
      $patientDetails = $this->pharmacistModel->getPatientDetails($more->patient_id);
      sendMail( $patientDetails->email, $patientDetails->first_name,'', 9,'');
      $this->view('Pharmacist/v_PharmacistDashBoard', $data);  
    }
  } 
  else{
    $this->view('Pharmacist/v_PharmacistRejectOrder', $data);

   }

  
}   
else 
{   
  redirect('Login/login');
}   
}}


// Pharmacist send order view details
public function sendOrder(){
  if (isset($_SESSION['pharmacist_id'])) {
      if (isset($_POST['submit'])) {
        $orderID = $_POST['order_request_id'];     
        $more = $this->pharmacistModel->getAllOrderDetailsMore($orderID);
  
        $data = [
          'more' => $more,
          'pharmacist_note'=>'',

          'pharmacist_note_err'=>'',
        ];
       $this->view('Pharmacist/v_PharmacistSendOrder', $data);    
      }
      // rest of the code
    } else {
      redirect('Login/login');
    }
}

// Pharmacist send order submit
public function sendOrderSubmit(){
  if (isset($_SESSION['pharmacist_id'])) {
      if (isset($_POST['submit'])) {
        $orderID = $_POST['order_request_id'];     
        $more = $this->pharmacistModel->getAllOrderDetailsMore($orderID);
  
        $data = [
          'more' => $more,
          'pharmacist_note'=> trim($_POST['pharmacist_note']),

          'pharmacist_note_err'=>'',
        ];

        // validate pharmacist_note
        if (empty($data['pharmacist_note'])) {
          $data['pharmacist_note_err'] = 'Please enter Note';
        }
      
        // after validate send order
        if(empty($data['pharmacist_note_err']))
        { 
          $this->pharmacistModel->sendOrderforCustomer( $orderID,$data);
          $this->view('Pharmacist/v_PharmacistDashBoard', $data);   
       }

       else{
        $this->view('Pharmacist/v_PharmacistSendOrder', $data);
       }
      
      }
      // rest of the code
    } else {
      redirect('Login/login');
    }
}




// profile update and change password

public function profile(){

  if(isset($_SESSION['pharmacist_id'])){
   
    $loggedPharmacist = $this->pharmacistModel-> getPharmacistById($_SESSION['pharmacist_id']);
    $data=[
                  
    'first_name'=> $loggedPharmacist->first_name,
    'last_name'=> $loggedPharmacist->last_name,
    'nic'=> $loggedPharmacist->nic,
    'contact_number'=>$loggedPharmacist->contact_number,
    'bank_name'=> $loggedPharmacist->bank_name,
    'account_holder_name'=> $loggedPharmacist->account_holder_name,
    'branch'=> $loggedPharmacist->branch,
    'account_number'=> $loggedPharmacist->account_number,
    'gender'=> $loggedPharmacist->gender,
    'city'=>$loggedPharmacist->city,
    'pharmacy_name'=>$loggedPharmacist->pharmacy_name,
    'address'=>$loggedPharmacist->address,

    'email' =>  $loggedPharmacist->email,   
    'slmc_reg_number'=> $loggedPharmacist->slmc_reg_number,

    'first_name_err'=>'',
    'last_name_err'=>'',
    'nic_err'=>'',
    'contact_number_err'=>'',
    'bank_name_err'=>'',
    'account_holder_name_err'=>'',
    'branch_err'=>'',
    'account_number_err'=>'',
    'gender_err'=>'',   
    'city_err' =>'',
    'address_err'=>'',
    'pharmacy_name_err' =>''
    ];
    $this->view('Pharmacist/v_PharmacistDetails', $data);

  }else{
    redirect('Login/login');
  }
}

    
public function editProfile($userId){
       
  if(isset($_SESSION['pharmacist_id'])) {  
 
  if($_SERVER['REQUEST_METHOD']=='POST'){

       $user = $this->pharmacistModel-> getPharmacistById($_SESSION['pharmacist_id']);
       
       $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

       $data=[
         'email'=> $_SESSION['pharmacist_email'],
         'pharmacist_id'=>$userId,
         'first_name'=>trim($_POST['first_name']),
         'last_name'=>trim($_POST['last_name']),
         'nic'=>$_SESSION['pharmacist_nic'],
         'slmc_reg_number'=>$_SESSION['pharmacist_slmc_reg_number'],
         'contact_number'=>trim($_POST['contact_number']),
         'bank_name'=>trim($_POST['bank_name']),
         'account_holder_name'=>trim($_POST['account_holder_name']),
         'branch'=>trim($_POST['branch']),
         'account_number'=>trim($_POST['account_number']),
         'gender'=>$user->gender,
         'pharmacy_name' => trim($_POST['pharmacy_name']),
         'city'=>$user->city,
         'address'=>trim($_POST['address']),
         
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
         'address_err'=>'',
         'pharmacy_name_err'=>''
               
      ];

     
      if(empty($data['first_name'])){
         $data['first_name_err']='first name cannot be empty';
      }
      else if(validateFirstName($data['first_name'])!="true"){
        $data['first_name_err']=validateFirstName($data['first_name']);
       }


      if(empty($data['last_name'])){
         $data['last_name_err']='last name cannot be empty';
      }else if(validateLastName($data['last_name'])!="true"){
        $data['last_name_err']=validateLastName($data['last_name']);
       }


      if(empty($data['nic'])){
         $data['nic_err']='nic cannot be empty';
      }


      if(empty($data['contact_number'])){
         $data['contact_number_err']='contact number cannot be empty';
      }else if(validateContactNumber($data['contact_number'])!="true"){
        $data['contact_number_err']=validateContactNumber($data['contact_number']);
      }


      if(empty($data['bank_name'])){
       $data['bank_name_err']='bank name cannot be empty';
      } else if(validateBankName($data['bank_name'])!="true"){
        $data['bank_name_err']=validateBankName($data['bank_name']);
       }


     if(empty($data['account_holder_name'])){
         $data['account_holder_name_err']='account holder name cannot be empty';
     }else if(validateAccountHolderName($data['account_holder_name'])!="true"){
      $data['account_holder_name_err']=validateAccountHolderName($data['account_holder_name']);
     }


     if(empty($data['branch'])){
         $data['branch_err']='branch name cannot be empty';
     }else if(validateBankBranch($data['branch'])!="true"){
      $data['branch_err']=validateBankBranch($data['branch']);
     }


     if(empty($data['gender'])){
         $data['gender_err']='Title cannot be empty';
     }


      if(empty($data['account_number'])){
         $data['account_number_err']='account number cannot be empty';
      } else if(validateAccountNumber($data['account_number'])!="true"){
        $data['account_number_err']=validateAccountNumber($data['account_number']);
       }


      if(empty($data['city'])){
         $data['city_err']='city cannot be empty';
      }else if( validateCityOfPharmacy($data['city'])!="true"){
        $data['city_err']= validateCityOfPharmacy($data['city']);
       }


      if(empty($data['pharmacy_name'])){
        $data['pharmacy_name_err']='Pharmacy Name cannot be empty';
     }else if(validatePharmacyName($data['pharmacy_name'])!="true"){
      $data['pharmacy_name_err']=validatePharmacyName($data['pharmacy_name']);
     }


     if(empty($data['address'])){
      $data['address_err']='Address cannot be empty';
     }else if(validateAddress($data['address'])!="true"){
      $data['address_err']=validateAddress($data['address']);
     }
     
    if(empty($data['slmc_reg_number'])){
          $data['slmc_reg_number_err']='slmc registration number cannot be empty';
    }


    if($_SESSION['pharmacist_contact_number']!=  trim($_POST['contact_number'])){
     
      if($this->userModel->findPharmacistByContactNumber($data['contact_number'])){
        $data['contact_number_err']='Contact Number is already used';

      } 
      else if($this->userModel->findReqPharmacistByContactNumber($data['contact_number'])){
        $data['contact_number_err']='Contact Number is already used';
      }    
    }


    if($_SESSION['pharmacist_account_number']!=trim(trim($_POST['account_number']))){
     
      if($this->userModel->findPharmacistByAccountNumber($data['account_number'])){
        $data['account_number_err']='Account Number is already used';
      } 
      else if($this->userModel->findReqPharmacistByAccountNumber($data['account_number'])){
        $data['account_number_err']='Account Number is already used';
      }
    }



     if(empty($data['first_name_err']) && empty($data['last_name_err'])&& empty($data['nic_err'])&& 
     empty($data['contact_number_err'])&& empty($data['gender_err']) &&  
     empty($data['bank_name_err'])&& empty($data['account_holder_name_err'])&& empty($data['branch_err'])&& 
     empty($data['account_number_err']) && empty($data['city_err']) && empty($data['address_err']) && empty($data['pharmacy_name_err'])){
           if($this->userModel->editUser($data)){
                 $_SESSION['profile_update']="true";
                 $this->view('Pharmacist/v_PharmacistDetails',$data);    
           }else{
             $this->view('Pharmacist/v_PharmacistDetails',$data);    
           }  
      
     }else{
       $this->view('Pharmacist/v_PharmacistDetails',$data);     
     }



   }else{
      $user= $this->pharmacistModel-> getPharmacistById($userId);

      
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
       'pharmacy_name'=>$user->pharmacy_name,
       'address'=>$user->address,


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
         'pharmacy_name_err'=>''
        
     
      ];

      redirect('Pharmacist/profile'); 
   }}else{
     redirect('Login/login');  
   }
  
}

// change and update password


public function changePassword()
{
 if(isset($_SESSION['pharmacist_id'])) {  

 $data=[                      
  'current_password_err'=>'',
  'retype_new_password_err'=>'' ,
  'new_password_err'=>''
 ];
 $this->view('Pharmacist/v_changePassword',$data);

 }else{
 redirect('Login/login');  
}
 
}

public function updatePassword($id){

  if(isset($_SESSION['pharmacist_id'])) {  
 
  if($_SERVER["REQUEST_METHOD"] == 'POST'){
      $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

      $data = [
        'pharmacist_id' => $id,  
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
       $data['new_password_err']='New password and retype new password does not match';
      } 

      if(empty($data['new_password'])){
         $data['new_password_err']='Please enter a new password';
      } else if(validatePassword($data['new_password'])!="true"){
        $data['new_password_err']=validatePassword($data['new_password']);
       }

      
      if(empty($data['retype_new_password'])){
       $data['retype_new_password_err']='Please retype new password';
      }  else if(validatePassword($data['retype_new_password'])!="true"){
        $data['retype_new_password_err']=validatePassword($data['retype_new_password']);
      }


      if(empty($data['current_password_err']) && empty($data['retype_new_password_err']) && empty($data['new_password_err'])){
    
       $data['password']=password_hash($data['new_password'],PASSWORD_DEFAULT);
       $changeUserPW=$this->userModel->changePWPharmacist($data);

         if($changeUserPW){
          $_SESSION['profile_updatePasswordPharmacist']='true';
          redirect('Pharmacist/changePassword');    
           
         }
         else{
          $data['retype_new_password_err']='something wrong';
          $this->view('Pharmacist/v_changePassword',$data);
         }   
      }else{
        $this->view('Pharmacist/v_changePassword',$data);
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
     $this->view('Pharmacist/v_changePassword',$data);     
  } 
}else{
  redirect('Login/login');  
}

}



/*end*/
}
?>