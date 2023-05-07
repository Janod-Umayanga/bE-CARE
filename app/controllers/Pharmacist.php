 <?php

   class Pharmacist extends Controller {
    
    private $pharmacistModel;
    private $pharmacistViewOrdersModel;

    private $pharmacistViewOrdersMoreModel;
    private  $pharmacistViewSellingHistoryModel;
    private $pharamacistAcceptOrderModel;
    private $pharmacistSendAcceptOrderDetailsModel;
    private $pharmacistremoveOrderModel;
    private $pharmacistPaidOrderViewModel;
    private $userModel;



    public function __construct()
    {
      
       $this->pharmacistModel = $this->model('M_Pharmacist');
       $this->pharmacistViewOrdersModel = $this->model('M_Pharmacist');
       $this->pharmacistViewOrdersMoreModel = $this->model('M_Pharmacist');
       $this->pharmacistViewSellingHistoryModel = $this->model('M_pharmacist');
       $this->pharamacistAcceptOrderModel = $this->model("M_Pharmacist");
       $this->pharmacistremoveOrderModel=$this->model('M_Pharmacist');
       $this->pharmacistSendAcceptOrderDetailsModel = $this->model('M_Pharmacist');
       $this->pharmacistPaidOrderViewModel=$this->model('M_Pharmacist');
       $this->userModel=$this->model('M_Nutritionist');
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

    public function pharmacistViewOrders()
    {
      if(isset($_SESSION['pharmacist_id'])){
        $orders = $this->pharmacistViewOrdersModel->getAllOrderDetailsOfPharmacist($_SESSION['pharmacist_id']);
        $paidOrders = $this->pharmacistPaidOrderViewModel->getAllPaidOrderDetails($_SESSION['pharmacist_id']);

        $data=[                      
          'orders'=>$orders,
          'paidOrders'=>$paidOrders
        ]; 
        $this->view('Pharmacist/v_PharmacistViewOrders',$data);  
        }else{
          $_SESSION['need_login'] = true;
          redirect('Login/login');
      }   
    }

    public function pharmacistViewOrdersMore()
    {
        if (isset($_SESSION['pharmacist_id'])) {
            if (isset($_POST['submit'])) {
              $orderID = $_POST['order_request_id'];     
              $more = $this->pharmacistViewOrdersModel->getAllOrderDetailsMore($orderID);
        
              $data = [
                'more' => $more
              ];
              $this->view('Pharmacist/v_PharmacistViewOrdersMore', $data);
           
            }else{
              redirect('Pharmacist/getAllOrderDetailsOfPharmacist');
            }
            // rest of the code
          } else {
            redirect('Login/login');
          }
        
       
    }

    // view selling history 
    public function pharmacistSellingHistory(){

        if(isset($_SESSION['pharmacist_id'])){
            $history = $this->pharmacistViewSellingHistoryModel->getAllSellingHistory($_SESSION['pharmacist_id']);
        
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

          $orderId = $_POST['order_id'];
          $historymore = $this->pharmacistViewSellingHistoryModel->getAllSellingHistoryMore($orderId);
        
          $data=[                      
            'historymore'=>$historymore
          ]; 
          $this->view('Pharmacist/v_PharmacistViewSellingHistoryMore',$data); 
       
        }else{
          redirect('Pharmacist/getAllOrderDetailsOfPharmacist');
        }
        // rest of the code
      } else {
        redirect('Login/login');
      }

      

  }

    // Pharmacist Accept Order 
    
    
 
/*Pharmacist View Prescription*/
public function pharmacistViewPrescriptions(){

    // temporary
  //  $this->view('Pharmacist/v_Prescription');
  if (isset($_POST['download'])) {
    $this->view('Pharmacist/v_Prescription');
  }
  
    
}

// Get rder details and 
public function acceptOrders(){
  if (isset($_SESSION['pharmacist_id'])) {
      if (isset($_POST['submit'])) {
        $orderID = $_POST['order_request_id'];     
        $more = $this->pharmacistViewOrdersModel->getAllOrderDetailsMore($orderID);
  
        $data = [
          'more' => $more,
          'pharmacist_note'=>'',
          'bill' => '',
          'charge'=> '',

          'pharmacist_note_err'=>'',
          'bill_err' => '',
          'charge_err' => ''
        ];
        $this->view('Pharmacist/v_PharmacistAcceptOrder', $data);
     
      }
      // rest of the code
    } else {
      redirect('Login/login');
    }
}


public function acceptOrderSubmit() // submit form and send an email 
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
    'bill' => trim($_POST['bill']),
    'charge'=> trim($_POST['charge']),  

    'pharmacist_note_err'=>'',
    'bill_err' => '',
    'charge_err' => ''

  ];
  //validate each input

  //validate name
  if (empty($data['pharmacist_note'])) {
    $data['pharmacist_note_err'] = 'Please enter Note';
  }

  if(empty($data['bill'])){
    $data['bill_err'] = 'Please enter bill.';
  }

  
  //validate charge

  if (empty($data['charge'])) {
    $data['charge_err'] = 'Please enter charge';
  }
// after validation send order...

  if(empty($data['pharmacist_note_err']) && empty($data['bill_err']) && empty($data['charge_err']))
  {
   
    $this->pharmacistSendAcceptOrderDetailsModel->sendAcceptOrderDetails($_SESSION['pharmacist_id'], $data);
    $this->pharmacistremoveOrderModel->acceptedOrderDetails($data);
    $this->view('Pharmacist/v_PharmacistDashBoard', $data);
    
}
}


}    
else 
{   redirect('Login/login');
}   


}


// Pharmacist reject orders
public function rejectOrders(){
  if (isset($_SESSION['pharmacist_id'])) {
      if (isset($_POST['submit'])) {
        $orderID = $_POST['order_request_id'];     
        $more = $this->pharmacistViewOrdersModel->getAllOrderDetailsMore($orderID);
  
        $data = [
          'more' => $more,
          'pharmacist_note'=>'',

          'pharmacist_note_err'=>'',
        ];
        $this->view('Pharmacist/v_PharmacistRejectOrder', $data);
     
      }
      // rest of the code
    } else {
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
  //validate each input
  //validate name
  if (empty($data['pharmacist_note'])) {
    $data['pharmacist_note_err'] = 'Please enter Note';
  }

  if(empty($data['pharmacist_note_err']))
  {
   
    $this->pharmacistSendAcceptOrderDetailsModel->sendRejectOrderDetails($_SESSION['pharmacist_id'], $data);
    $this->view('Pharmacist/v_PharmacistDashBoard', $data);
    
}
}

}    
else 
{   redirect('Login/login');
}   
}


// Pharmacist send order view details
public function sendOrder(){
  if (isset($_SESSION['pharmacist_id'])) {
      if (isset($_POST['submit'])) {
        $orderID = $_POST['order_request_id'];     
        $more = $this->pharmacistViewOrdersModel->getAllOrderDetailsMore($orderID);
  
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
        $more = $this->pharmacistViewOrdersModel->getAllOrderDetailsMore($orderID);
  
        $data = [
          'more' => $more,
          'pharmacist_note'=> trim($_POST['pharmacist_note']),

          'pharmacist_note_err'=>'',
        ];

        // validate pharmacist_note
        if (empty($data['pharmacist_note'])) {
          $data['pharmacist_note_err'] = 'Please enter Note';
        }
      
        
      /*      else if(validatePharmacistNote($data['pharmacist_note'])!="true"){
              $data['pharmacist_note_err']=validatePharmacistNote($data['pharmacist_note']);
             } */

        // after validate send order
        if(empty($data['pharmacist_note_err']))
        { 
          $this->pharmacistSendAcceptOrderDetailsModel->sendOrderforCustomer( $orderID,$data);
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
   
    $loggedPharmacist = $this->pharmacistModel->getPharmacistById($_SESSION['pharmacist_id']);
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

       $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

       $data=[
         'email'=> $_SESSION['pharmacist_email'],
         'pharmacist_id'=>$userId,
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
         'pharmacy_name' => trim($_POST['pharmacy_name']),
         'city'=>trim($_POST['city']),
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

      if(empty($data['pharmacy_name'])){
        $data['pharmacy_name_err']='Pharmacy Name can not be empty';
     }

     if(empty($data['address'])){
      $data['address_err']='Address can not be empty';
   }
      
      if(empty($data['slmc_reg_number'])){
          $data['slmc_reg_number_err']='slmc registration number can not be empty';
       }

      

     if(empty($data['first_name_err']) && empty($data['last_name_err'])&& empty($data['nic_err'])&& 
     empty($data['contact_number_err'])&& empty($data['gender_err']) &&  
     empty($data['bank_name_err'])&& empty($data['account_holder_name_err'])&& empty($data['branch_err'])&& 
     empty($data['account_number_err']) && empty($data['city_err']) && empty($data['address_err']) && empty($data['pharmacy_name_err'])){
           if($this->userModel->editUser($data)){
                 $_SESSION['profile_update']="true";
                 $this->view('Pharmacist/pharmacistDetails',$data);    
           }else{
             $this->view('Pharmacist/pharmacistDetails',$data);    
           }  
      
     }else{
       $this->view('Pharmacist/pharmacistDetails',$data);     
     }



   }else{
      $user= $this->pharmacistModel->getPharmaciststById($userId);

      
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