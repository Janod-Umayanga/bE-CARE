<?php
class Nutritionist extends Controller
{
  // private $nutritionistModel;
  private $nutritionistViewHistoryModel;
  // private $nutriSessionModel;
  private $nutritionistModel;
  private $nutritionistViewRequestsModel;
  private $nutritionistViewRequestsMoreModel;
  public $nutritionistIssueDietPlansModel;

  public function __construct()
  {
    $this->nutritionistModel = $this->model('M_Nutritionist');

    $this->nutritionistViewHistoryModel = $this->model('M_Nutritionist');
    //  $this->nutriHistoryModel = $this->model('M_NutritionistDashboard');
    // $this->nutriSessionModel = $this->model('M_NutritionistSession');
    $this->nutritionistViewRequestsModel = $this->model('M_Nutritionist');
    $this->nutritionistViewRequestsMoreModel = $this->model('M_Nutritionist');
    $this->nutritionistIssueDietPlansModel = $this->model('M_Nutritionist');
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
      $his = $this->nutritionistViewHistoryModel->viewHistoryPage($_SESSION['nutritionist_id']);

      $data = [
        'his' => $his
      ];
      $this->view('Nutritionist/v_NutritionistViewHistoryMore', $data);
    } else {
      redirect('Login/login');
    }

  }





  public function nutritionistViewRequests()
  {

    if (isset($_SESSION['nutritionist_id'])) {
      $plans = $this->nutritionistViewRequestsModel->getAllRequestedDietPlanDetails($_SESSION['nutritionist_id']);

      $data = [
        'plans' => $plans
      ];
      $this->view('Nutritionist/v_NutritionistViewRequests', $data);
    } else {
      redirect('Login/login');
    }


  }

  public function nutritionistViewRequestsMore()
  {

    if (isset($_SESSION['nutritionist_id'])) {
      $plans = $this->nutritionistViewRequestsMoreModel->getAllRequestedDietPlanMoreDetails($_SESSION['nutritionist_id']);

      $data = [
        'plans' => $plans
      ];
      $this->view('Nutritionist/v_NutritionistViewRequestsMore', $data);
    } else {
      redirect('Login/login');
    }


  }

  public function issueDietPlans()
  {


    if (isset($_SESSION['nutritionist_id'])) {

      if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'des' => trim($_POST['date']),
          'dietfile' => trim($_POST['starting_time']),

          'des_err' => '',
          'dietfile_err' => '',
        ];

        if (empty($data['des'])) {
          $data['des_err'] = 'Please enter any description';
        }

        if (empty($data['dietfile'])) {
          $data['dietfile_err'] = 'Please enter diet plan';
        }

        if (empty($data['des_err']) && empty($data['dietfile_err'])) {

          $issuePlan = $this->nutritionistIssueDietPlansModel->issueDietPlans($_SESSION['nutritionist_id'], $data);

          if ($issuePlan) {
            redirect('Nutritionist/nutritionistIssueDietPlans');

          } else {
            $this->view('Nutritionist/v_nutritionistIssueDietPlans', $data);
          }
        } else {
          $this->view('Nutritionist/v_nutritionistIssueDietPlans', $data);
        }
      } else {

        $data = [

          'des' => '',
          'dietfile' => '',

          'des_err' => '',
          'dietfile_err' => '',

        ];
        $this->view('Nutritionist/v_nutritionistIssueDietPlans', $data);
      }
    } else {
      redirect('Login/login');
    }
  }

  // profile details
  public function profDetails()
  {
    $loggedNutritionist = $this->nutritionistModel->getNutritionistById($_SESSION['nutritionist_id']);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
        'bankname' => trim($_POST['bank_name']),
        'accholdername' => trim($_POST['account_holder_name']),
        'branch' => trim($_POST['branch']),
        'fee' => trim($_POST['fee']),
        'accountnumber' => trim($_POST['account_number']),
        'email' => $loggedNutritionist->email,
        'rdate' => $loggedNutritionist->registered_date,

        'fname_err' => '',
        'lname_err' => '',
        'nic_err' => '',
        'cnumber_err' => '',
        'gender_err' => '',
        'slmcno_err' => '',
        'bname_err' => '',
        'hname_err' => '',
        'branch_err' => '',
        'accno_err' => '',
        'fee_err' => '',
      ];

      // Validate each input

      // Validate name
      if (empty($data['fname'])) {
        $data['fname_err'] = 'First name required';
      }
      if (empty($data['lname'])) {
        $data['lname_err'] = 'Last name required';
      }

      // Validate nic
      if (empty($data['nic'])) {
        $data['nic_err'] = 'NIC required';
      }

      // Validate contact number
      if (empty($data['cnumber'])) {
        $data['cnumber_err'] = 'Contact number required';
      }

      // Validate gender
      if (empty($data['gender'])) {
        $data['gender_err'] = 'Gender required';
      }

      // Validate gender
      if (empty($data['slmcregNo'])) {
        $data['slmcno_err'] = 'SLMC Reg No required';
      }


      // Validate gender
      if (empty($data['bankname'])) {
        $data['bname_err'] = 'Bank Name required';
      }

      // Validate gender
      if (empty($data['accholdername'])) {
        $data['hname_err'] = 'Account Holder Name required';
      }

      // Validate gender
      if (empty($data['branch'])) {
        $data['branch_err'] = 'Branch required';
      }

      // Validate gender
      if (empty($data['accountnumber'])) {
        $data['accno_err'] = 'Account Number required';
      }

      if (empty($data['fee'])) {
        $data['fee_err'] = 'Diet Plan Fee required';
      }


      // Update patient details after validation
      if (empty($data['fname_err']) && empty($data['lname_err']) && empty($data['nic_err']) && empty($data['cnumber_err']) && empty($data['gender_err'])) {
        // Update patient
        if ($this->nutritionistModel->update($data, $_SESSION['nutritionist_id'])) {
          redirect('Pages/index');
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view
        $this->view('Nutritionist/v_NutritioniststDetails', $data);
      }
    } else {
      $data = [
        'fname' => $loggedNutritionist->first_name,
        'lname' => $loggedNutritionist->last_name,
        'nic' => $loggedNutritionist->nic,
        'cnumber' => $loggedNutritionist->contact_number,
        'gender' => $loggedNutritionist->gender,
        'slmcregNo' => $loggedNutritionist->slmc_reg_number,
        'bankname' => $loggedNutritionist->bank_name,
        'accholdername' => $loggedNutritionist->account_holder_name,
        'branch' => $loggedNutritionist->branch,
        'accountnumber' => $loggedNutritionist->account_number,
        'fee' => $loggedNutritionist->fee,
        'email' => $loggedNutritionist->email,
        'rdate' => $loggedNutritionist->registered_date,

        'fname_err' => '',
        'lname_err' => '',
        'nic_err' => '',
        'cnumber_err' => '',
        'gender_err' => '',
        'slmcno_err' => '',
        'bname_err' => '',
        'hname_err' => '',
        'branch_err' => '',
        'accno_err' => '',
        'fee_err' => '',
      ];

      // Load view
      $this->view('Nutritionist/v_NutritionistDetails', $data);
    }
  }

}
  



   

