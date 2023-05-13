<?php

    class Payment extends Controller{
        private $paymentModel;
        private $doctorModel;
        private $doctorTimeslotModel;
        private $counsellorTimeslotModel;
        private $counsellorModel;
        private $meditationInstructorModel;
        private $meditationInstructorTimeslotModel;
        private $nutritionistModel;
        private $pharmacistModel;
        public function __construct() {
            $this->paymentModel = $this->model('M_Payment');
            $this->doctorModel = $this->model('M_Doctor');
            $this->doctorTimeslotModel = $this->model('M_Doctor_Timeslot');
            $this->counsellorTimeslotModel = $this->model('M_Counsellor_Timeslot');
            $this->counsellorModel = $this->model('M_Counsellor');
            $this->meditationInstructorModel = $this->model('M_MedInstr');
            $this->meditationInstructorTimeslotModel = $this->model('M_MedInstrAddtimeslot');
            $this->nutritionistModel = $this->model('M_Nutritionist');
            $this->pharmacistModel = $this->model('M_Pharmacist');
        }

        // // Verify the payment
        // public function verify() {
        //     $merchant_id         = $_POST['merchant_id'];
        //     $order_id            = $_POST['order_id'];
        //     $payhere_amount      = $_POST['payhere_amount'];
        //     $payhere_currency    = $_POST['payhere_currency'];
        //     $status_code         = $_POST['status_code'];
        //     $md5sig              = $_POST['md5sig'];

        //     // $data = [
        //     //     'name' => trim($_POST['name']),
        //     //     'age' => trim($_POST['age']),
        //     //     'gender' => trim($_POST['gender']),
        //     //     'cnumber' => trim($_POST['cnumber']),
        //     //     'weight' => trim($_POST['weight']),
        //     //     'height' => trim($_POST['height']),
        //     //     'marital_status' => trim($_POST['marital_status']),
        //     //     'medical_details' => trim($_POST['medical_details']),
        //     //     'allergies' => trim($_POST['allergies']),
        //     //     'sleeping_hours' => trim($_POST['sleeping_hours']),
        //     //     'water_consumption_per_day' => trim($_POST['water_consumption_per_day']),
        //     //     'goal' => trim($_POST['goal']),
        //     //     'nutritionist_id' => trim($_POST['nutritionist_id']),
        //     //     'fee' => trim($_POST['fee'])
        //     // ];

        //     $merchant_secret = 'NDA0MzQyMjc0NzQxMjQ5NjY4MTUxNTU5NjIzMjc4OTE3NjE4MTIx'; // Replace with your Merchant Secret (Can be found on your PayHere account's Settings page)

        //     $local_md5sig = strtoupper(
        //         md5(
        //             $merchant_id . 
        //             $order_id . 
        //             $payhere_amount . 
        //             $payhere_currency . 
        //             $status_code . 
        //             strtoupper(md5($merchant_secret)) 
        //         ) 
        //     );
                
        //     if (($local_md5sig === $md5sig) AND ($status_code == 2) ){
        //             //TODO: Update your database as payment success
        //             // Create order
        //             // $this->create($data);
        //     }
        // }

        // Pay for the doctor channel
        public function payforDoctorChannel() {
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

                    $_SESSION['name'] = $data['name'];

                    // Set your test stripe API key for the payment process
                    \Stripe\Stripe::setApiKey(STRIPEKEY);

                    // Create a payment session
                    $session = \Stripe\Checkout\Session::create([
                        'payment_method_types' => ['card'],
                        'line_items' => [[
                            'price_data' => [
                              'currency' => 'lkr',
                              'product' => 'prod_NjDnZBvY5IcHEB',
                              'unit_amount' => ($data['fee'] + $data['fee']*0.1)*100, 
                            ],
                            'quantity' => 1,
                          ]],
                        'mode' => 'payment',
                        'success_url' => URLROOT.'/Payment/createDoctorChannel/'.$data['age'].'/'.$data['cnumber'].'/'.$data['gender'].'/'.$data['doctor_id'].'/'.$data['channel_day_id'].'/'.$data['date'].'/'.$data['starting_time'].'/'.$data['time'].'/'.$data['duration'].'/'.$data['ending_time'].'/'.$data['fee'],
                        'cancel_url' => URLROOT.'/Payment/paymentUnsuccess/',
                      ]);

                    // Redirect the user to the Stripe payment gateway
                    header('Location: '. $session->url);
                    exit;
    
                    
                }
            }
            else {
                $_SESSION['need_login'] = true;
                // Redirect to login
                redirect('Login/login');
            }
        }

        // Create doctor channel after the payment is successful
        public function createDoctorChannel($age, $cnumber, $gender, $doctor_id, $channel_day_id, $date, $starting_time, $time, $duration, $ending_time, $fee) {

            if(isset($_SESSION['patient_id'])) {
                $data = [
                    'name' => $_SESSION['name'],
                    'age' => $age,
                    'gender' => $gender,
                    'cnumber' => $cnumber,
                    'doctor_id' => $doctor_id,
                    'channel_day_id' => $channel_day_id,
                    'date' => $date,
                    'starting_time' => $starting_time,
                    'time' => $time,
                    'duration' => $duration,
                    'ending_time' => $ending_time,
                    'fee' => $fee,
                ];

                unset($_SESSION['name']);

                // Create apppointment
                if($this->paymentModel->createDoctorChannel($data, $_SESSION['patient_id'])) {
                    $_SESSION['channel_created'] = true;

                    $doctor = $this->doctorModel->findDoctorByID($doctor_id);
                    $channel = $this->doctorTimeslotModel->getDoctorChannelDayById($channel_day_id);

                    $other = [
                        'patient_name' => $data['name'],
                        'patient_title' => $data['gender'],
                        'patient_age' => $data['age'],
                        'patient_contact_number' => $data['cnumber'],
                        'doctor_first_name' => $doctor->first_name,
                        'doctor_last_name' => $doctor->last_name,
                        'venue' => $channel->address,
                        'date' => $date,
                        'time' => $time,
                        'appointment_number' => ((strtotime($time) - strtotime($data['starting_time'])) / (60 * $duration))+1,
                        'fee' => $data['fee'] + $data['fee']*0.1,
                    ];

                    $email = $_SESSION['patient_email'];
                    $name = $_SESSION['patient_name'];
                    $bodyFlag = 11;

                    // Send email notification to the patient
                    sendMail($email,$name,"",$bodyFlag,$other);
                    redirect('Pages/index');
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                $_SESSION['need_login'] = true;
                // Redirect to login
                redirect('Login/login');
            }
        }

        // Channel counsellor
        public function payforCounsellorChannel() {
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

                    $_SESSION['name'] = $data['name'];
    
                    // Set your test stripe API key for the payment process
                    \Stripe\Stripe::setApiKey(STRIPEKEY);

                    // Create a payment session
                    $session = \Stripe\Checkout\Session::create([
                        'payment_method_types' => ['card'],
                        'line_items' => [[
                            'price_data' => [
                              'currency' => 'lkr',
                              'product' => 'prod_NjF8UkIzYG02Ks',
                              'unit_amount' => ($data['fee'] + $data['fee']*0.1)*100, 
                            ],
                            'quantity' => 1,
                          ]],
                        'mode' => 'payment',
                        'success_url' => URLROOT.'/Payment/createCounsellorChannel/'.$data['age'].'/'.$data['cnumber'].'/'.$data['gender'].'/'.$data['counsellor_id'].'/'.$data['channel_day_id'].'/'.$data['date'].'/'.$data['starting_time'].'/'.$data['time'].'/'.$data['duration'].'/'.$data['ending_time'].'/'.$data['fee'],
                        'cancel_url' => URLROOT.'/Payment/paymentUnsuccess/',
                      ]);

                    // Redirect the user to the Stripe payment gateway
                    header('Location: '. $session->url);
                    exit;  
                }
            }
            else {
                $_SESSION['need_login'] = true;
                // Redirect to login
                redirect('Login/login');
            }
        }

        // Create counsellor channel after the payment is successful
        public function createCounsellorChannel($age, $cnumber, $gender, $counsellor_id, $channel_day_id, $date, $starting_time, $time, $duration, $ending_time, $fee) {

            if(isset($_SESSION['patient_id'])) {
                $data = [
                    'name' => $_SESSION['name'],
                    'age' => $age,
                    'gender' => $gender,
                    'cnumber' => $cnumber,
                    'counsellor_id' => $counsellor_id,
                    'channel_day_id' => $channel_day_id,
                    'date' => $date,
                    'starting_time' => $starting_time,
                    'time' => $time,
                    'duration' => $duration,
                    'ending_time' => $ending_time,
                    'fee' => $fee,
                ];

                unset($_SESSION['name']);

                // Create apppointment
                if($this->paymentModel->createCounsellorChannel($data, $_SESSION['patient_id'])) {
                    $_SESSION['channel_created'] = true;

                    $counsellor = $this->counsellorModel->findCounsellorByID($counsellor_id);
                    $channel = $this->counsellorTimeslotModel->getCounsellorChannelDayById($channel_day_id);

                    $other = [
                        'patient_name' => $data['name'],
                        'patient_title' => $data['gender'],
                        'patient_age' => $data['age'],
                        'patient_contact_number' => $data['cnumber'],
                        'counsellor_first_name' => $counsellor->first_name,
                        'counsellor_last_name' => $counsellor->last_name,
                        'venue' => $channel->address,
                        'date' => $date,
                        'time' => $time,
                        'appointment_number' => ((strtotime($time) - strtotime($data['starting_time'])) / (60 * $duration))+1,
                        'fee' => $data['fee'] + $data['fee']*0.1,
                    ];

                    $email = $_SESSION['patient_email'];
                    $name = $_SESSION['patient_name'];
                    $bodyFlag = 12;

                    // Send email notification to the patient
                    sendMail($email,$name,"",$bodyFlag,$other);
                    redirect('Pages/index');
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                $_SESSION['need_login'] = true;
                // Redirect to login
                redirect('Login/login');
            }
        }

        // Register for the session
        public function payforSessionRegister() {
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
                        'noOfParticipants' => trim($_POST['noOfParticipants']),
                        'current_participants' => trim($_POST['current_participants']),
                    ];

                    $_SESSION['name'] = $data['name'];

                    // Set your test stripe API key for the payment process
                    \Stripe\Stripe::setApiKey(STRIPEKEY);

                    // Create a payment session
                    $session = \Stripe\Checkout\Session::create([
                        'payment_method_types' => ['card'],
                        'line_items' => [[
                            'price_data' => [
                              'currency' => 'lkr',
                              'product' => 'prod_NkO72NWCWePJn4',
                              'unit_amount' => ($data['fee'] + $data['fee']*0.1)*100, 
                            ],
                            'quantity' => 1,
                          ]],
                        'mode' => 'payment',
                        'success_url' => URLROOT.'/Payment/createSessionRegister/'.$data['age'].'/'.$data['cnumber'].'/'.$data['gender'].'/'.$data['session_id'].'/'.$data['fee'].'/'.$data['noOfParticipants'].'/'.$data['current_participants'],
                        'cancel_url' => URLROOT.'/Payment/paymentUnsuccess/',
                      ]);

                    // Redirect the user to the Stripe payment gateway
                    header('Location: '. $session->url);
                    exit;
    
                      
                }
        }

        // Create session register after the payment is successful
        public function createSessionRegister($age, $cnumber, $gender, $session_id, $fee, $noOfParticipants, $current_participants) {

                $data = [
                    'name' => $_SESSION['name'],
                    'age' => $age,
                    'gender' => $gender,
                    'cnumber' => $cnumber,
                    'session_id' => $session_id,
                    'fee' => $fee,
                    'noOfParticipants' => $noOfParticipants,
                    'current_participants' => $current_participants,
                ];

                unset($_SESSION['name']);

                // Create session register
                if($this->paymentModel->createSessionRegister($data)) {
                    $_SESSION['channel_created'] = true;
                    // $_SESSION['session_register_created'] = true;
                    redirect('Pages/index');
                }
                else {
                    die('Something went wrong');
                } 
            
        }
        
        // Request a diet plan
        public function payforDietPlanRequest() {
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

                    $_SESSION['name'] = $data['name'];
                    $_SESSION['medical_details'] = $data['medical_details'];
                    $_SESSION['allergies'] = $data['allergies'];
                    $_SESSION['goal'] = $data['goal'];
    
                    // Set your test stripe API key for the payment process
                    \Stripe\Stripe::setApiKey(STRIPEKEY);

                    // Create a payment session
                    $session = \Stripe\Checkout\Session::create([
                        'payment_method_types' => ['card'],
                        'line_items' => [[
                            'price_data' => [
                              'currency' => 'lkr',
                              'product' => 'prod_NjHprCSGGelbIy',
                              'unit_amount' => ($data['fee'] + $data['fee']*0.1)*100, 
                            ],
                            'quantity' => 1,
                          ]],
                        'mode' => 'payment',
                        'success_url' => URLROOT.'/Payment/createDietPlanRequest/'.$data['age'].'/'.$data['gender'].'/'.$data['cnumber'].'/'.$data['weight'].'/'.$data['height'].'/'.$data['marital_status'].'/'.$data['sleeping_hours'].'/'.$data['water_consumption_per_day'].'/'.$data['nutritionist_id'].'/'.$data['fee'],
                        'cancel_url' => URLROOT.'/Payment/paymentUnsuccess/',
                      ]);

                    // Redirect the user to the Stripe payment gateway
                    header('Location: '. $session->url);
                    exit; 
                }
            }
            else {
                $_SESSION['need_login'] = true;
                // Redirect to login
                redirect('Login/login');
            }
        }

        // Create diet plan request after the payment is successful
        public function createDietPlanRequest($age, $gender, $cnumber, $weight, $height, $marital_status, $sleeping_hours, $water_consumption_per_day, $nutritionist_id, $fee) {

            if(isset($_SESSION['patient_id'])) {
                $data = [
                    'name' => $_SESSION['name'],
                    'age' => $age,
                    'gender' => $gender,
                    'cnumber' => $cnumber,
                    'weight' => $weight,
                    'height' => $height,
                    'marital_status' => $marital_status,
                    'medical_details' => $_SESSION['medical_details'],
                    'allergies' => $_SESSION['allergies'],
                    'sleeping_hours' => $sleeping_hours,
                    'water_consumption_per_day' => $water_consumption_per_day,
                    'goal' => $_SESSION['goal'],
                    'nutritionist_id' => $nutritionist_id,
                    'fee' => $fee,
                ];

                unset($_SESSION['name']);
                unset($_SESSION['medical_details']);
                unset($_SESSION['allergies']);
                unset($_SESSION['goal']);

                // Create diet plan request
                if($this->paymentModel->createDietPlanRequest($data, $_SESSION['patient_id'])) {
                    $_SESSION['diet_plan_request_created'] = true;

                    // Send email to the nutritionist
                    $nutritionist = $this->nutritionistModel->getNutritionistbyId($nutritionist_id);
                    $other = [
                        'patient_name' => $data['name'],
                        'patient_title' => $data['gender'],
                    ];

                    $email = $nutritionist->email;
                    $name = $nutritionist->first_name;
                    $bodyFlag = 15;

                    // Send email notification to the patient
                    sendMail($email,$name,"",$bodyFlag,$other);

                    redirect('Pages/index');
                }
                else {
                    die('Something went wrong');
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
                        'email' => trim($_POST['email']),
                        'pharmacist_id' => trim($_POST['pharmacist_id']),
                    ];

                    // Set your test stripe API key for the payment process
                    \Stripe\Stripe::setApiKey(STRIPEKEY);

                    // Create a payment session
                    $session = \Stripe\Checkout\Session::create([
                        'payment_method_types' => ['card'],
                        'line_items' => [[
                            'price_data' => [
                              'currency' => 'lkr',
                              'product' => 'prod_NiyD9NFPFoALOm',
                              'unit_amount' => ($data['fee'] + $data['fee']*0.1)*100, 
                            ],
                            'quantity' => 1,
                          ]],
                        'mode' => 'payment',
                        'success_url' => URLROOT.'/Payment/createOrder/'.$data['order_id'].'/'.$data['fee'].'/'.$data['email'].'/'.$data['pharmacist_id'],
                        'cancel_url' => URLROOT.'/Payment/paymentUnsuccess/',
                      ]);

                    // Redirect the user to the Stripe payment gateway
                    header('Location: '. $session->url);
                    exit;
  
                }
            }
            else {
                $_SESSION['need_login'] = true;
                // Redirect to login
                redirect('Login/login');
            }
        }

        // Create order after the payment is success
        public function createOrder($order_id, $fee, $email, $pharmacist_id) {

            $data = [
                'order_id' => $order_id,
                'fee' => $fee,
            ];

            // Create order
            if($this->paymentModel->payForOrder($data)) {
                $_SESSION['paid_for_order'] = true;

                $pharmacist = $this->pharmacistModel->getPharmacistbyId($pharmacist_id);

                $other = [
                    'patient_name' => $_SESSION['patient_name'],
                    'patient_title' => $_SESSION['patient_title'],
                    'fee' => $fee + $fee*0.1,
                ];

                $name = $pharmacist->first_name;
                $bodyFlag = 8;

                // Send email notification to the pharmacist
                sendMail($email,$name,"",$bodyFlag,$other);

                redirect('Pages/index');
            }
            else {
                die('Something went wrong');
            } 
        }

        // Pay for the doctor channel
        public function payforMeditationInstructorRegistration() {
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
                        'meditation_instructor_id' =>trim($_POST['meditation_instructor_id']),
                        'appointment_day_id' => trim($_POST['appointment_day_id']),
                        'noOfParticipants' => trim($_POST['noOfParticipants']),
                        'current_participants' => trim($_POST['current_participants']),
                        'fee' => trim($_POST['fee']),
                    ];

                    $_SESSION['name'] = $data['name'];

                    // Set your test stripe API key for the payment process
                    \Stripe\Stripe::setApiKey(STRIPEKEY);

                    // Create a payment session
                    $session = \Stripe\Checkout\Session::create([
                        'payment_method_types' => ['card'],
                        'line_items' => [[
                            'price_data' => [
                              'currency' => 'lkr',
                              'product' => 'prod_Njzkt9hxfrJfd0',
                              'unit_amount' => ($data['fee'] + $data['fee']*0.1)*100, 
                            ],
                            'quantity' => 1,
                          ]],
                        'mode' => 'payment',
                        'success_url' => URLROOT.'/Payment/createMeditationInstructorRegistration/'.$data['age'].'/'.$data['cnumber'].'/'.$data['gender'].'/'.$data['meditation_instructor_id'].'/'.$data['appointment_day_id'].'/'.$data['noOfParticipants'].'/'.$data['current_participants'].'/'.$data['fee'],
                        'cancel_url' => URLROOT.'/Payment/paymentUnsuccess/',
                      ]);

                    // Redirect the user to the Stripe payment gateway
                    header('Location: '. $session->url);
                    exit;
    
                    
                }
            }
            else {
                $_SESSION['need_login'] = true;
                // Redirect to login
                redirect('Login/login');
            }
        }

        // Create doctor channel after the payment is successful
        public function createMeditationInstructorRegistration($age, $cnumber, $gender, $meditation_instructor_id, $appointment_day_id, $noOfParticipants, $current_participants, $fee) {

            if(isset($_SESSION['patient_id'])) {
                $data = [
                    'name' => $_SESSION['name'],
                    'age' => $age,
                    'gender' => $gender,
                    'cnumber' => $cnumber,
                    'meditation_instructor_id' => $meditation_instructor_id,
                    'appointment_day_id' => $appointment_day_id,
                    'noOfParticipants' => $noOfParticipants,
                    'current_participants' => $current_participants,
                    'fee' => $fee,
                ];

                unset($_SESSION['name']);

                // Create apppointment
                if($this->paymentModel->createMeditationInstructorRegistration($data, $_SESSION['patient_id'])) {
                    $_SESSION['channel_created'] = true;

                    $instructor = $this->meditationInstructorModel->findUserByID($meditation_instructor_id);
                    $appointment = $this->meditationInstructorTimeslotModel->getMedInstrAppointmentDayById($appointment_day_id);

                    $other = [
                        'patient_name' => $data['name'],
                        'patient_title' => $data['gender'],
                        'patient_age' => $data['age'],
                        'patient_contact_number' => $data['cnumber'],
                        'instructor_first_name' => $instructor->first_name,
                        'instructor_last_name' => $instructor->last_name,
                        'venue' => $appointment->address,
                        'date' => $appointment->date,
                        'starting_time' => $appointment->starting_time,
                        'ending_time' => $appointment->ending_time,
                        'fee' => $data['fee'] + $data['fee']*0.1,
                    ];

                    $email = $_SESSION['patient_email'];
                    $name = $_SESSION['patient_name'];
                    $bodyFlag = 13;

                    // Send email notification to the patient
                    sendMail($email,$name,"",$bodyFlag,$other);
                    redirect('Pages/index');
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                $_SESSION['need_login'] = true;
                // Redirect to login
                redirect('Login/login');
            }
        }

        public function paymentUnsuccess() {
            $this->view('patients/v_payment_unsuccess');
        }

    }

?>