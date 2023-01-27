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

        public function create($data) {
            
            // Create order
            if($this->paymentModel->createDietPlanRequest($data, $_SESSION['patient_id'])) {
                redirect('Pages/index');
           }
           else {
               die('Something went wrong');
           }
        }

    }

?>