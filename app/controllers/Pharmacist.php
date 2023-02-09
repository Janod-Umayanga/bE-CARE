<?php

   class Pharmacist extends Controller {
    
    private $pharmacistModel;
    private $pharmacistViewOrdersModel;


    public function __construct()
    {
       $this->pharmacistModel = $this->model('M_Pharmacist');
       $this->pharmacistViewOrdersModel = $this->model('M_Pharmacist');
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
        $orders = $this->pharmacistViewOrdersModel->getAllOrderDetailsp($_SESSION['pharmacist_id']);
    
        $data=[                      
          'orders'=>$orders
        ]; 
        $this->view('Pharmacist/v_PharmacistViewOrders',$data);  
        }else{
          redirect('Login/login');
      }   
    }

    public function pharmacistViewOrdersMore()
    {
      if(isset($_SESSION['pharmacist_id'])){
        $orders = $this->pharmacistViewOrdersModel->getAllOrderDetailsp($_SESSION['pharmacist_id']);
    
        $data=[                      
          'orders'=>$orders
        ]; 
        $this->view('Pharmacist/v_PharmacistViewOrdersMore',$data);  
        }else{
          redirect('Login/login');
      }   
    }

    // Create method for view and update profile details
    public function profDetails(){
      $loggedPharmacist = $this->pharmacistModel->getPharmacistById($_SESSION['pharmacist_id']);

      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Form is submitting

        // Data validation
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Inserted form
        $data = [
            'fname' => trim($_POST['first_name']),
            'lname' => trim($_POST['last_name']),
            'nic' => trim($_POST['nic']),
            'cnumber' => trim($_POST['contact_number']),
            'gender' => trim($_POST['gender']),
            'slmcregNo' => trim($_POST['slmc_reg_number']),
            'pharname' => trim($_POST['pharmacy_name']),
            'city' => trim($_POST['city']),
            'address' => trim($_POST['address']),
            'bankname' => trim($_POST['bank_name']),
            'accholdername' => trim($_POST['account_holder_name']),
            'branch' => trim($_POST['branch']),
            'accountnumber' => trim($_POST['account_number']),
            'email' => $loggedPharmacist->email,
            'rdate' => $loggedPharmacist->registered_date,

            'fname_err' => '',
            'lname_err' => '',
            'nic_err' => '',
            'cnumber_err' => '',
            'gender_err' => '',
            'slmcno_err' =>'',
            'pname_err' => '',
            'city_err' => '',
            'address_err'=> '',
            'bname_err' => '',
            'hname_err' => '',
            'branch_err' => '',
            'accno_err' =>'',
        ];

        // Validate each input

        // Validate name
        if(empty($data['fname'])) {
            $data['fname_err'] = 'First name required';
        }
        if(empty($data['lname'])) {
            $data['lname_err'] = 'Last name required';
        }

        // Validate nic
        if(empty($data['nic'])) {
            $data['nic_err'] = 'NIC required';
        }

        // Validate contact number
        if(empty($data['cnumber'])) {
            $data['cnumber_err'] = 'Contact number required';
        }

        // Validate gender
        if(empty($data['gender'])) {
            $data['gender_err'] = 'Gender required';
        }

        // Validate gender
        if(empty($data['slmcregNo'])) {
            $data['slmcno_err'] = 'SLMC Reg No required';
        }

        // Validate gender
        if(empty($data['pharname'])) {
            $data['pname_err'] = 'Pharmacy Name required';
        }
        // Validate gender
        if(empty($data['city'])) {
            $data['city_err'] = 'City required';
        }
        // Validate gender
        if(empty($data['address'])) {
            $data['address_err'] = 'Address required';
        }
        // Validate gender
        if(empty($data['bankname'])) {
            $data['bname_err'] = 'Bank Name required';
        }

        // Validate gender
        if(empty($data['accholdername'])) {
            $data['hname_err'] = 'Account Holder Name required';
        }

        // Validate gender
        if(empty($data['branch'])) {
            $data['branch_err'] = 'Branch required';
        }

        // Validate gender
        if(empty($data['accountnumber'])) {
            $data['accno_err'] = 'Account Number required';
        }

        // Update patient details after validation
        if(empty($data['fname_err']) && empty($data['lname_err']) && empty($data['nic_err']) && empty($data['cnumber_err']) && empty($data['gender_err'])) {
            // Update patient
            if($this->pharmacistModel->update($data, $_SESSION['pharmacist_id'])) {
                redirect('Pages/index');
            }
            else {
                die('Something went wrong');
            }
        }
        else {
            // Load view
             $this->view('Pharmacist/v_PharmacistDetails', $data);
        }
    }
    else {
        $data = [
            'fname' => $loggedPharmacist->first_name,
            'lname' => $loggedPharmacist->last_name,
            'nic' =>  $loggedPharmacist->nic,
            'cnumber' => $loggedPharmacist->contact_number,
            'gender' =>  $loggedPharmacist->gender,
            'slmcregNo' => $loggedPharmacist->slmc_reg_number,
            'pharname' => $loggedPharmacist->pharmacy_name,
            'city' => $loggedPharmacist-> city,
            'address' => $loggedPharmacist->address,
            'bankname' => $loggedPharmacist->bank_name,
            'accholdername' => $loggedPharmacist->account_holder_name,
            'branch' => $loggedPharmacist->branch,
            'accountnumber' => $loggedPharmacist->account_number,
            'email' =>  $loggedPharmacist->email,
            'rdate' =>  $loggedPharmacist->registered_date,

            'fname_err' => '',
            'lname_err' => '',
            'nic_err' => '',
            'cnumber_err' => '',
            'gender_err' => '',
            'slmcno_err' =>'',
            'pname_err' => '',
            'city_err' => '',
            'address_err'=> '',
            'bname_err' => '',
            'hname_err' => '',
            'branch_err' => '',
            'accno_err' =>'',
        ];

        // Load view
        $this->view('Pharmacist/v_PharmacistDetails', $data);
    }
}
 
/*Pharmacist View Prescription*/
public function pharmacistViewPrescriptions(){

    // temporary
    $this->view('Pharmacist/v_Prescription');
    
}

}

?>