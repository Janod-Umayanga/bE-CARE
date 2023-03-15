<?php

    class Payment extends Controller{
        private $paymentModel;
        public function __construct() {
            $this->paymentModel = $this->model('M_Payment');
        }

        // Verify the payment
        public function verify() {
            $merchant_id         = $_POST['merchant_id'];
            $order_id            = $_POST['order_id'];
            $payhere_amount      = $_POST['payhere_amount'];
            $payhere_currency    = $_POST['payhere_currency'];
            $status_code         = $_POST['status_code'];
            $md5sig              = $_POST['md5sig'];

            // $data = [
            //     'name' => trim($_POST['name']),
            //     'age' => trim($_POST['age']),
            //     'gender' => trim($_POST['gender']),
            //     'cnumber' => trim($_POST['cnumber']),
            //     'weight' => trim($_POST['weight']),
            //     'height' => trim($_POST['height']),
            //     'marital_status' => trim($_POST['marital_status']),
            //     'medical_details' => trim($_POST['medical_details']),
            //     'allergies' => trim($_POST['allergies']),
            //     'sleeping_hours' => trim($_POST['sleeping_hours']),
            //     'water_consumption_per_day' => trim($_POST['water_consumption_per_day']),
            //     'goal' => trim($_POST['goal']),
            //     'nutritionist_id' => trim($_POST['nutritionist_id']),
            //     'fee' => trim($_POST['fee'])
            // ];

            $merchant_secret = 'NDA0MzQyMjc0NzQxMjQ5NjY4MTUxNTU5NjIzMjc4OTE3NjE4MTIx'; // Replace with your Merchant Secret (Can be found on your PayHere account's Settings page)

            $local_md5sig = strtoupper(
                md5(
                    $merchant_id . 
                    $order_id . 
                    $payhere_amount . 
                    $payhere_currency . 
                    $status_code . 
                    strtoupper(md5($merchant_secret)) 
                ) 
            );
                
            if (($local_md5sig === $md5sig) AND ($status_code == 2) ){
                    //TODO: Update your database as payment success
                    // Create order
                    // $this->create($data);
            }
        }

        // Channel doctor
        public function createDoctorChannel() {
            if(isset($_SESSION['patient_id'])) {
                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Form is submitting
    
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                    // Inserted form
                    $data = [
                        'name' => trim($_POST['name']),
                        'age' => trim($_POST['age']),
                        'cnumber' => trim($_POST['cnumber']),
                        'gender' => trim($_POST['gender']),
                        'doctor_id' =>trim($_POST['doctor_id']),
                        'channel_day_id' => trim($_POST['channel_day_id']),
                        'date' => trim($_POST['date']),
                        'starting_time' => trim($_POST['starting_time']),
                        'time' => trim($_POST['time']),
                        'duration' => trim($_POST['duration']),
                        'ending_time' => trim($_POST['ending_time']),
                        'fee' => trim($_POST['fee']),
                    ];
    
                    // Create apppointment
                    if($this->paymentModel->createDoctorChannel($data, $_SESSION['patient_id'])) {
                        $_SESSION['channel_created'] = true;
                        redirect('Pages/index');
                    }
                    else {
                        die('Something went wrong');
                    }   
                }
            }
            else {
                $_SESSION['need_login'] = true;
                // Redirect to login
                redirect('Login/login');
            }
        }

        // Channel counsellor
        public function createCounsellorChannel() {
            if(isset($_SESSION['patient_id'])) {
                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Form is submitting
    
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                    // Inserted form
                    $data = [
                        'name' => trim($_POST['name']),
                        'age' => trim($_POST['age']),
                        'cnumber' => trim($_POST['cnumber']),
                        'gender' => trim($_POST['gender']),
                        'counsellor_id' =>trim($_POST['counsellor_id']),
                        'channel_day_id' => trim($_POST['channel_day_id']),
                        'date' => trim($_POST['date']),
                        'starting_time' => trim($_POST['starting_time']),
                        'time' => trim($_POST['time']),
                        'duration' => trim($_POST['duration']),
                        'ending_time' => trim($_POST['ending_time']),
                        'fee' => trim($_POST['fee']),
                    ];
    
                    // Create apppointment
                    if($this->paymentModel->createCounsellorChannel($data, $_SESSION['patient_id'])) {
                        $_SESSION['channel_created'] = true;
                        redirect('Pages/index');
                    }
                    else {
                        die('Something went wrong');
                    }   
                }
            }
            else {
                $_SESSION['need_login'] = true;
                // Redirect to login
                redirect('Login/login');
            }
        }

        // Register for the session
        public function createSessionRegister() {
                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Form is submitting
    
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                    // Inserted form
                    $data = [
                        'name' => trim($_POST['name']),
                        'age' => trim($_POST['age']),
                        'cnumber' => trim($_POST['cnumber']),
                        'gender' => trim($_POST['gender']),
                        'session_id' =>trim($_POST['session_id']),
                        'fee' => trim($_POST['fee']),
                    ];
    
                    // Create session register
                    if($this->paymentModel->createSessionRegister($data)) {
                        $_SESSION['session_register_created'] = true;
                        redirect('Pages/index');
                    }
                    else {
                        die('Something went wrong');
                    }   
                }
        }
        
        // Request a diet plan
        public function createDietPlanRequest() {
            if(isset($_SESSION['patient_id'])) {
                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Form is submitting
    
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                    // Inserted form
                    $data = [
                        'name' => trim($_POST['name']),
                        'age' => trim($_POST['age']),
                        'gender' => trim($_POST['gender']),
                        'cnumber' => trim($_POST['cnumber']),
                        'weight' => trim($_POST['weight']),
                        'height' => trim($_POST['height']),
                        'marital_status' => trim($_POST['marital_status']),
                        'medical_details' => trim($_POST['medical_details']),
                        'allergies' => trim($_POST['allergies']),
                        'sleeping_hours' => trim($_POST['sleeping_hours']),
                        'water_consumption_per_day' => trim($_POST['water_consumption_per_day']),
                        'goal' => trim($_POST['goal']),
                        'nutritionist_id' => trim($_POST['nutritionist_id']),
                        'fee' => trim($_POST['fee']),
                    ];
    
                    // Create apppointment
                    if($this->paymentModel->createDietPlanRequest($data, $_SESSION['patient_id'])) {
                        $_SESSION['diet_plan_request_created'] = true;
                        redirect('Pages/index');
                    }
                    else {
                        die('Something went wrong');
                    }   
                }
            }
            else {
                $_SESSION['need_login'] = true;
                // Redirect to login
                redirect('Login/login');
            }
        }

        // pay for order
        public function payForOrder() {
            if(isset($_SESSION['patient_id'])) {
                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Form is submitting
    
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                    // Inserted form
                    $data = [
                        'order_id' => trim($_POST['order_id']),
                        'fee' => trim($_POST['fee']),
                        'email' => trim($_POST['email'])
                    ];
    
                    // Create apppointment
                    if($this->paymentModel->payForOrder($data)) {
                        $_SESSION['paid_for_order'] = true;

                        // Send email notification to the pharmacy
                        $to = $data['email'];
                        $subject = "Order Payment";
                        $message = "Customer paid for the medicine order. You can now deliver the medicine.";
                        $headers = "From: " . SITENAME . " <" . EMAIL . ">" . "\r\n" .'Reply-To: ' . EMAIL . "\r\n" .'X-Mailer: PHP/' . phpversion();
                        mail($to, $subject, $message, $headers);

                        redirect('Pages/index');
                    }
                    else {
                        die('Something went wrong');
                    }   
                }
            }
            else {
                $_SESSION['need_login'] = true;
                // Redirect to login
                redirect('Login/login');
            }
        }

    }

?>