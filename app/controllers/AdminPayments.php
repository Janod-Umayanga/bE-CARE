<?php

class AdminPayments extends Controller{
  private $adminPaymentsModel;
  
  public function __construct(){
    $this->adminPaymentsModel = $this->model('M_AdminPayments');
  }

  public function doctorChannelPayments()
  {
    if(isset($_SESSION['admin_id'])) {  
    
    $docChannel= $this->adminPaymentsModel->doctorChannelAll();
    $profit= $this->adminPaymentsModel->doctorChannelAllProfit();
    
    $_SESSION['payment_table']="doctorChannelPayments";

    $data=[                      
      'docChannel'=>$docChannel,
      'search'=>'',
      'service'=>'Doctor Channel',
      'period'=>'Total',
      'profit'=>$profit
      
    ];

      $_SESSION['payment_service'] ='doctorChannel' ;
    
      $_SESSION['payment_period'] ='transactionPeriod';
    
    

    $this->view('Admin/AdminPayments/v_adminPayments',$data);
   

    }else{
      redirect('Login/login');  
    }
  }

  

public function  doctorChannelPaymentsSearch()
{
  if(isset($_SESSION['admin_id'])) {  

  if($_SERVER['REQUEST_METHOD']=='GET'){
    $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        $search=trim($_GET['search']);
        $service=trim($_GET['service']);
        $period= trim($_GET['period']);

        if(isset($_GET['service'])){
          $_SESSION['payment_service'] = $_GET['service'];
         }
    
        if(isset($_GET['period'])){
          $_SESSION['payment_period'] = $_GET['period'];
        }
        
        
     
        $today = date('Y-m-d'); 
        $yesterday = date('Y-m-d', strtotime('-1 day'));
        $month = date("m"); 
        $year = date("Y"); 
      

        if($service=="doctorChannel"){
          $_SESSION['payment_table']="doctorChannelPayments";

          if($period=='transactionPeriod'){
            if(!empty($search)){
               $docChannel=$this->adminPaymentsModel->doctorChannelAllSearch($search);
               $profit= $this->adminPaymentsModel->doctorChannelAllProfitSearch($search);

            }else{
               $docChannel=$this->adminPaymentsModel->doctorChannelAll();
               $profit= $this->adminPaymentsModel->doctorChannelAllProfit();
   
            }
               
          }  
          else if($period=='today'){
            if(!empty($search)){
              $docChannel=$this->adminPaymentsModel->doctorChannelTodaySearch($search,$today);
              $profit= $this->adminPaymentsModel->doctorChannelTodayProfitSearch($search,$today);

            }else{
              $docChannel=$this->adminPaymentsModel->doctorChannelToday($today);
              $profit= $this->adminPaymentsModel->doctorChannelTodayProfit($today);
   
            }   
          }
          else if($period=='yesterday'){
            if(!empty($search)){
              $docChannel=$this->adminPaymentsModel->doctorChannelYesterdaySearch($search,$yesterday);
              $profit= $this->adminPaymentsModel->doctorChannelYesterdayProfitSearch($search,$yesterday);

            }else{
              $docChannel=$this->adminPaymentsModel->doctorChannelYesterday($yesterday);
              $profit= $this->adminPaymentsModel->doctorChannelYesterdayProfit($yesterday);
            }   
          }
          else if($period=='thisMonth'){
            if(!empty($search)){
              $docChannel=$this->adminPaymentsModel->doctorChannelThisMonthSearch($search,$month,$year);
              $profit= $this->adminPaymentsModel->doctorChannelThisMonthProfitSearch($search,$month,$year);

            }else{
              $docChannel=$this->adminPaymentsModel->doctorChannelThisMonth($month,$year);
              $profit= $this->adminPaymentsModel->doctorChannelThisMonthProfit($month,$year);
            }   
          }

          else if($period=='thisYear'){
            if(!empty($search)){
              $docChannel=$this->adminPaymentsModel->doctorChannelThisYearSearch($search,$year);
              $profit= $this->adminPaymentsModel->doctorChannelThisYearProfitSearch($search,$year);

            }else{
              $docChannel=$this->adminPaymentsModel->doctorChannelThisYear($year);
              $profit= $this->adminPaymentsModel->doctorChannelThisYearProfit($year);
   
            }   
          }
          
         
        

        if($service=="doctorChannel"){
          $se="Doctor Channel";
        }
        if($period=="transactionPeriod"){
          $pe="Total";
        }
        else if($period=="today"){
          $pe="Today";
        }
        else if($period=="yesterday"){
          $pe="Yesterday";
        }
        else if($period=="thisMonth"){
          $pe="This Month";
        }
        else if($period=="thisYear"){
          $pe="This Year";
        }

        if(!isset($profit)){
            $profit='';
        }
      
        $data=[                      
          'docChannel'=>$docChannel,
          'search'=>$search,
          'service'=>$se,
          'period'=>$pe,
          'profit'=>$profit,
          'correctservice'=>$service,
          'correctperiod'=>$period
          
        ];
        $this->view('Admin/AdminPayments/v_adminPayments',$data);
    }

  //  Counsellor Channel
    if($service=="counsellorChannel"){
      $_SESSION['payment_table']="counsellorChannelPayments";

      if($period=='transactionPeriod'){
        if(!empty($search)){
           $counsellorChannel=$this->adminPaymentsModel->counsellorChannelAllSearch($search);
           $profit= $this->adminPaymentsModel->counsellorChannelAllProfitSearch($search);

        }else{
           $counsellorChannel=$this->adminPaymentsModel->counsellorChannelAll();
           $profit= $this->adminPaymentsModel->counsellorChannelAllProfit();

        }   
      }  
      else if($period=='today'){
        if(!empty($search)){
          $counsellorChannel=$this->adminPaymentsModel->counsellorChannelTodaySearch($search,$today);
          $profit= $this->adminPaymentsModel->counsellorChannelTodayProfitSearch($search,$today);

        }else{
          $counsellorChannel=$this->adminPaymentsModel->counsellorChannelToday($today);
          $profit= $this->adminPaymentsModel->counsellorChannelTodayProfit($today);

        }   
      }
      else if($period=='yesterday'){
        if(!empty($search)){
          $counsellorChannel=$this->adminPaymentsModel->counsellorChannelYesterdaySearch($search,$yesterday);
          $profit= $this->adminPaymentsModel->counsellorChannelYesterdayProfitSearch($search,$yesterday);

        }else{
          $counsellorChannel=$this->adminPaymentsModel->counsellorChannelYesterday($yesterday);
          $profit= $this->adminPaymentsModel->counsellorChannelYesterdayProfit($yesterday);
        }   
      }
      else if($period=='thisMonth'){
        if(!empty($search)){
          $counsellorChannel=$this->adminPaymentsModel->counsellorChannelThisMonthSearch($search,$month,$year);
          $profit= $this->adminPaymentsModel->counsellorChannelThisMonthProfitSearch($search,$month,$year);

        }else{
          $counsellorChannel=$this->adminPaymentsModel->counsellorChannelThisMonth($month,$year);
          $profit= $this->adminPaymentsModel->counsellorChannelThisMonthProfit($month,$year);
        }   
      }

      else if($period=='thisYear'){
        if(!empty($search)){
          $counsellorChannel=$this->adminPaymentsModel->counsellorChannelThisYearSearch($search,$year);
          $profit= $this->adminPaymentsModel->counsellorChannelThisYearProfitSearch($search,$year);

        }else{
          $counsellorChannel=$this->adminPaymentsModel->counsellorChannelThisYear($year);
          $profit= $this->adminPaymentsModel->counsellorChannelThisYearProfit($year);

        }   
      }
      
     
    

    if($service=="counsellorChannel"){
      $se="Counsellor Channel";
    }
    if($period=="transactionPeriod"){
      $pe="Total";
    }
    else if($period=="today"){
      $pe="Today";
    }
    else if($period=="yesterday"){
      $pe="Yesterday";
    }
    else if($period=="thisMonth"){
      $pe="This Month";
    }
    else if($period=="thisYear"){
      $pe="This Year";
    }

    if(!isset($profit)){
        $profit='';
    }
  
    $data=[                      
      'counsellorChannel'=>$counsellorChannel,
      'search'=>$search,
      'service'=>$se,
      'period'=>$pe,
      'profit'=>$profit,
      'correctservice'=>$service,
      'correctperiod'=>$period
     
    ];
    $this->view('Admin/AdminPayments/v_adminPayments',$data);
 }

 //  Nutritionist Diet Plan
    if($service=="nutritionistDietPlan"){
      $_SESSION['payment_table']="nutritionistDietPlanPayments";

      if($period=='transactionPeriod'){
        if(!empty($search)){
           $nutritionistDietPlan=$this->adminPaymentsModel->nutritionistDietPlanAllSearch($search);
           $profit= $this->adminPaymentsModel->nutritionistDietPlanAllProfitSearch($search);

        }else{
           $nutritionistDietPlan=$this->adminPaymentsModel->nutritionistDietPlanAll();
           $profit= $this->adminPaymentsModel->nutritionistDietPlanAllProfit();

        }   
      }  
      else if($period=='today'){
        if(!empty($search)){
          $nutritionistDietPlan=$this->adminPaymentsModel->nutritionistDietPlanTodaySearch($search,$today);
          $profit= $this->adminPaymentsModel->nutritionistDietPlanTodayProfitSearch($search,$today);

        }else{
          $nutritionistDietPlan=$this->adminPaymentsModel->nutritionistDietPlanToday($today);
          $profit= $this->adminPaymentsModel->nutritionistDietPlanTodayProfit($today);

        }   
      }
      else if($period=='yesterday'){
        if(!empty($search)){
          $nutritionistDietPlan=$this->adminPaymentsModel->nutritionistDietPlanYesterdaySearch($search,$yesterday);
          $profit= $this->adminPaymentsModel->nutritionistDietPlanYesterdayProfitSearch($search,$yesterday);

        }else{
          $nutritionistDietPlan=$this->adminPaymentsModel->nutritionistDietPlanYesterday($yesterday);
          $profit= $this->adminPaymentsModel->nutritionistDietPlanYesterdayProfit($yesterday);
        }   
      }
      else if($period=='thisMonth'){
        if(!empty($search)){
          $nutritionistDietPlan=$this->adminPaymentsModel->nutritionistDietPlanThisMonthSearch($search,$month,$year);
          $profit= $this->adminPaymentsModel->nutritionistDietPlanThisMonthProfitSearch($search,$month,$year);

        }else{
          $nutritionistDietPlan=$this->adminPaymentsModel->nutritionistDietPlanThisMonth($month,$year);
          $profit= $this->adminPaymentsModel->nutritionistDietPlanThisMonthProfit($month,$year);
        }   
      }

      else if($period=='thisYear'){
        if(!empty($search)){
          $nutritionistDietPlan=$this->adminPaymentsModel->nutritionistDietPlanThisYearSearch($search,$year);
          $profit= $this->adminPaymentsModel->nutritionistDietPlanThisYearProfitSearch($search,$year);

        }else{
          $nutritionistDietPlan=$this->adminPaymentsModel->nutritionistDietPlanThisYear($year);
          $profit= $this->adminPaymentsModel->nutritionistDietPlanThisYearProfit($year);

        }   
      }
      
     
    

    if($service=="nutritionistDietPlan"){
      $se="Nutritionist Diet Plan";
    }
    if($period=="transactionPeriod"){
      $pe="Total";
    }
    else if($period=="today"){
      $pe="Today";
    }
    else if($period=="yesterday"){
      $pe="Yesterday";
    }
    else if($period=="thisMonth"){
      $pe="This Month";
    }
    else if($period=="thisYear"){
      $pe="This Year";
    }

    if(!isset($profit)){
        $profit='';
    }
  
    $data=[                      
      'nutritionistDietPlan'=>$nutritionistDietPlan,
      'search'=>$search,
      'service'=>$se,
      'period'=>$pe,
      'profit'=>$profit,
      'correctservice'=>$service,
      'correctperiod'=>$period
     
    ];
    $this->view('Admin/AdminPayments/v_adminPayments',$data);
 }


    //  Pharmacist Order
    if($service=="pharmacistOrder"){
      $_SESSION['payment_table']="pharmacistOrderPayments";

      if($period=='transactionPeriod'){
        if(!empty($search)){
           $pharmacistOrder=$this->adminPaymentsModel->pharmacistOrderAllSearch($search);
           $profit= $this->adminPaymentsModel->pharmacistOrderAllProfitSearch($search);

        }else{
           $pharmacistOrder=$this->adminPaymentsModel->pharmacistOrderAll();
           $profit= $this->adminPaymentsModel->pharmacistOrderAllProfit();

        }   
      }  
      else if($period=='today'){
        if(!empty($search)){
          $pharmacistOrder=$this->adminPaymentsModel->pharmacistOrderTodaySearch($search,$today);
          $profit= $this->adminPaymentsModel->pharmacistOrderTodayProfitSearch($search,$today);

        }else{
          $pharmacistOrder=$this->adminPaymentsModel->pharmacistOrderToday($today);
          $profit= $this->adminPaymentsModel->pharmacistOrderTodayProfit($today);

        }   
      }
      else if($period=='yesterday'){
        if(!empty($search)){
          $pharmacistOrder=$this->adminPaymentsModel->pharmacistOrderYesterdaySearch($search,$yesterday);
          $profit= $this->adminPaymentsModel->pharmacistOrderYesterdayProfitSearch($search,$yesterday);

        }else{
          $pharmacistOrder=$this->adminPaymentsModel->pharmacistOrderYesterday($yesterday);
          $profit= $this->adminPaymentsModel->pharmacistOrderYesterdayProfit($yesterday);
        }   
      }
      else if($period=='thisMonth'){
        if(!empty($search)){
          $pharmacistOrder=$this->adminPaymentsModel->pharmacistOrderThisMonthSearch($search,$month,$year);
          $profit= $this->adminPaymentsModel->pharmacistOrderThisMonthProfitSearch($search,$month,$year);

        }else{
          $pharmacistOrder=$this->adminPaymentsModel->pharmacistOrderThisMonth($month,$year);
          $profit= $this->adminPaymentsModel->pharmacistOrderThisMonthProfit($month,$year);
        }   
      }

      else if($period=='thisYear'){
        if(!empty($search)){
          $pharmacistOrder=$this->adminPaymentsModel->pharmacistOrderThisYearSearch($search,$year);
          $profit= $this->adminPaymentsModel->pharmacistOrderThisYearProfitSearch($search,$year);

        }else{
          $pharmacistOrder=$this->adminPaymentsModel->pharmacistOrderThisYear($year);
          $profit= $this->adminPaymentsModel->pharmacistOrderThisYearProfit($year);

        }   
      }
      
     
    

    if($service=="pharmacistOrder"){
      $se="pharmacist Order";
    }
    if($period=="transactionPeriod"){
      $pe="Total";
    }
    else if($period=="today"){
      $pe="Today";
    }
    else if($period=="yesterday"){
      $pe="Yesterday";
    }
    else if($period=="thisMonth"){
      $pe="This Month";
    }
    else if($period=="thisYear"){
      $pe="This Year";
    }

    if(!isset($profit)){
        $profit='';
    }
  
    $data=[                      
      'pharmacistOrder'=>$pharmacistOrder,
      'search'=>$search,
      'service'=>$se,
      'period'=>$pe,
      'profit'=>$profit,
      'correctservice'=>$service,
      'correctperiod'=>$period
     
    ];
    $this->view('Admin/AdminPayments/v_adminPayments',$data);
   }


   
    //  Med Instructor Registration
    if($service=="medInstructorRegistration"){
      $_SESSION['payment_table']="medInstructorRegistrationPayments";

      if($period=='transactionPeriod'){
        if(!empty($search)){
           $medInstructorRegistration=$this->adminPaymentsModel->medInstructorRegistrationAllSearch($search);
           $profit= $this->adminPaymentsModel->medInstructorRegistrationAllProfitSearch($search);

        }else{
           $medInstructorRegistration=$this->adminPaymentsModel->medInstructorRegistrationAll();
           $profit= $this->adminPaymentsModel->medInstructorRegistrationAllProfit();

        }   
      }  
      else if($period=='today'){
        if(!empty($search)){
          $medInstructorRegistration=$this->adminPaymentsModel->medInstructorRegistrationTodaySearch($search,$today);
          $profit= $this->adminPaymentsModel->medInstructorRegistrationTodayProfitSearch($search,$today);

        }else{
          $medInstructorRegistration=$this->adminPaymentsModel->medInstructorRegistrationToday($today);
          $profit= $this->adminPaymentsModel->medInstructorRegistrationTodayProfit($today);

        }   
      }
      else if($period=='yesterday'){
        if(!empty($search)){
          $medInstructorRegistration=$this->adminPaymentsModel->medInstructorRegistrationYesterdaySearch($search,$yesterday);
          $profit= $this->adminPaymentsModel->medInstructorRegistrationYesterdayProfitSearch($search,$yesterday);

        }else{
          $medInstructorRegistration=$this->adminPaymentsModel->medInstructorRegistrationYesterday($yesterday);
          $profit= $this->adminPaymentsModel->medInstructorRegistrationYesterdayProfit($yesterday);
        }   
      }
      else if($period=='thisMonth'){
        if(!empty($search)){
          $medInstructorRegistration=$this->adminPaymentsModel->medInstructorRegistrationThisMonthSearch($search,$month,$year);
          $profit= $this->adminPaymentsModel->medInstructorRegistrationThisMonthProfitSearch($search,$month,$year);

        }else{
          $medInstructorRegistration=$this->adminPaymentsModel->medInstructorRegistrationThisMonth($month,$year);
          $profit= $this->adminPaymentsModel->medInstructorRegistrationThisMonthProfit($month,$year);
        }   
      }

      else if($period=='thisYear'){
        if(!empty($search)){
          $medInstructorRegistration=$this->adminPaymentsModel->medInstructorRegistrationThisYearSearch($search,$year);
          $profit= $this->adminPaymentsModel->medInstructorRegistrationThisYearProfitSearch($search,$year);

        }else{
          $medInstructorRegistration=$this->adminPaymentsModel->medInstructorRegistrationThisYear($year);
          $profit= $this->adminPaymentsModel->medInstructorRegistrationThisYearProfit($year);

        }   
      }
      
     
    

    if($service=="medInstructorRegistration"){
      $se="Med Instr Registration";
    }
    if($period=="transactionPeriod"){
      $pe="Total";
    }
    else if($period=="today"){
      $pe="Today";
    }
    else if($period=="yesterday"){
      $pe="Yesterday";
    }
    else if($period=="thisMonth"){
      $pe="This Month";
    }
    else if($period=="thisYear"){
      $pe="This Year";
    }

    if(!isset($profit)){
        $profit='';
    }
  
    $data=[                      
      'medInstructorRegistration'=>$medInstructorRegistration,
      'search'=>$search,
      'service'=>$se,
      'period'=>$pe,
      'profit'=>$profit,
      'correctservice'=>$service,
      'correctperiod'=>$period
     
    ];
    $this->view('Admin/AdminPayments/v_adminPayments',$data);
   }


 //  Session Registration
    if($service=="sessionRegistration"){
      $_SESSION['payment_table']="sessionRegistrationPayments";

      if($period=='transactionPeriod'){
        if(!empty($search)){
           $sessionRegistration=$this->adminPaymentsModel->sessionRegistrationAllSearch($search);
          $profit= $this->adminPaymentsModel->sessionRegistrationAllProfitSearch($search);

        }else{
           $sessionRegistration=$this->adminPaymentsModel->sessionRegistrationAll();
           $profit= $this->adminPaymentsModel->sessionRegistrationAllProfit();

        }   
      }  
      else if($period=='today'){
        if(!empty($search)){
          $sessionRegistration=$this->adminPaymentsModel->sessionRegistrationTodaySearch($search,$today);
          $profit= $this->adminPaymentsModel->sessionRegistrationTodayProfitSearch($search,$today);

        }else{
          $sessionRegistration=$this->adminPaymentsModel->sessionRegistrationToday($today);
          $profit= $this->adminPaymentsModel->sessionRegistrationTodayProfit($today);

        }   
      }
      else if($period=='yesterday'){
        if(!empty($search)){
          $sessionRegistration=$this->adminPaymentsModel->sessionRegistrationYesterdaySearch($search,$yesterday);
          $profit= $this->adminPaymentsModel->sessionRegistrationYesterdayProfitSearch($search,$yesterday);

        }else{
          $sessionRegistration=$this->adminPaymentsModel->sessionRegistrationYesterday($yesterday);
          $profit= $this->adminPaymentsModel->sessionRegistrationYesterdayProfit($yesterday);
        }   
      }
      else if($period=='thisMonth'){
        if(!empty($search)){
          $sessionRegistration=$this->adminPaymentsModel->sessionRegistrationThisMonthSearch($search,$month,$year);
          $profit= $this->adminPaymentsModel->sessionRegistrationThisMonthProfitSearch($search,$month,$year);

        }else{
          $sessionRegistration=$this->adminPaymentsModel->sessionRegistrationThisMonth($month,$year);
          $profit= $this->adminPaymentsModel->sessionRegistrationThisMonthProfit($month,$year);
        }   
      }

      else if($period=='thisYear'){
        if(!empty($search)){
          $sessionRegistration=$this->adminPaymentsModel->sessionRegistrationThisYearSearch($search,$year);
          $profit= $this->adminPaymentsModel->sessionRegistrationThisYearProfitSearch($search,$year);

        }else{
          $sessionRegistration=$this->adminPaymentsModel->sessionRegistrationThisYear($year);
          $profit= $this->adminPaymentsModel->sessionRegistrationThisYearProfit($year);

        }   
      }
      
     
    

    if($service=="sessionRegistration"){
      $se="Session ";
    }
    if($period=="transactionPeriod"){
      $pe="Total";
    }
    else if($period=="today"){
      $pe="Today";
    }
    else if($period=="yesterday"){
      $pe="Yesterday";
    }
    else if($period=="thisMonth"){
      $pe="This Month";
    }
    else if($period=="thisYear"){
      $pe="This Year";
    }

    if(!isset($profit)){
        $profit='';
    }
  
    $data=[                      
      'sessionRegistration'=>$sessionRegistration,
      'search'=>$search,
      'service'=>$se,
      'period'=>$pe,
      'profit'=>$profit,
      'correctservice'=>$service,
      'correctperiod'=>$period
     
    ];
    $this->view('Admin/AdminPayments/v_adminPayments',$data);
 }

 }
  }else{
    redirect('Login/login');  
  }
}



public function doctorChannelViewMore($id)
{
  if(isset($_SESSION['admin_id'])) {  
  
  $docChannel= $this->adminPaymentsModel->doctorChannelDetails($id);
  
  
  $data=[                      
    'docChannel'=>$docChannel,
    
  ];
  

  $this->view('Admin/AdminPayments/v_doctorChannelViewMore',$data);
 

  }else{
    redirect('Login/login');  
  }
}

public function counsellorChannelViewMore($id)
{
  if(isset($_SESSION['admin_id'])) {  
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
  
          $search=trim($_GET['search']);
          $service=trim($_GET['service']);
          $period= trim($_GET['period']);
  
          $counsellorChannel= $this->adminPaymentsModel->counsellorChannelDetails($id);
  
          $data=[                      
            'counsellorChannel'=>$counsellorChannel,
            'search'=>$search,
            'service'=>$service,
            'period'=>$period
                      
          ];
          

          $this->view('Admin/AdminPayments/v_counsellorChannelViewMore',$data);
        
    }
  }else{
    redirect('Login/login');  
  }
}


public function nutritionistDietPlanViewMore($id)
{
  if(isset($_SESSION['admin_id'])) {  
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
  
          $search=trim($_GET['search']);
          $service=trim($_GET['service']);
          $period= trim($_GET['period']);
  
          $nutritionistDietPlan= $this->adminPaymentsModel->nutritionistDietPlanDetails($id);
  
          $data=[                      
            'nutritionistDietPlan'=>$nutritionistDietPlan,
            'search'=>$search,
            'service'=>$service,
            'period'=>$period
                      
          ];
          

          $this->view('Admin/AdminPayments/v_nutritionistDietPlanViewMore',$data);
        
    }
  }else{
    redirect('Login/login');  
  }
}



public function sessionRegistrationNutritionistViewMore($id)
{                  
  if(isset($_SESSION['admin_id'])) {  
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
  
          $search=trim($_GET['search']);
          $service=trim($_GET['service']);
          $period= trim($_GET['period']);
  
          $sessionRegistration= $this->adminPaymentsModel->sessionRegistrationNutritionistDetails($id);
  
          $data=[                      
            'sessionRegistration'=>$sessionRegistration,
            'search'=>$search,
            'service'=>$service,
            'period'=>$period
                      
          ];
          

          $this->view('Admin/AdminPayments/v_sessionRegistrationNutritionistViewMore',$data);
        
    }
  }else{
    redirect('Login/login');  
  }
}


public function sessionRegistrationCounsellorViewMore($id)
{                  
  if(isset($_SESSION['admin_id'])) {  
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
  
          $search=trim($_GET['search']);
          $service=trim($_GET['service']);
          $period= trim($_GET['period']);
  
          $sessionRegistration= $this->adminPaymentsModel->sessionRegistrationCounsellorDetails($id);
  
          $data=[                      
            'sessionRegistration'=>$sessionRegistration,
            'search'=>$search,
            'service'=>$service,
            'period'=>$period
                      
          ];
          

          $this->view('Admin/AdminPayments/v_sessionRegistrationCounsellorViewMore',$data);
        
    }
  }else{
    redirect('Login/login');  
  }
}


public function sessionRegistrationMedInstructorViewMore($id)
{                  
  if(isset($_SESSION['admin_id'])) {  
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
  
          $search=trim($_GET['search']);
          $service=trim($_GET['service']);
          $period= trim($_GET['period']);
  
          $sessionRegistration= $this->adminPaymentsModel->sessionRegistrationMedInstructorDetails($id);
  
          $data=[                      
            'sessionRegistration'=>$sessionRegistration,
            'search'=>$search,
            'service'=>$service,
            'period'=>$period
                      
          ];
          

          $this->view('Admin/AdminPayments/v_sessionRegistrationMedInstructorViewMore',$data);
        
    }
  }else{
    redirect('Login/login');  
  }
}
public function pharmacistOrderViewMore($id)
{
  if(isset($_SESSION['admin_id'])) {  
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
  
          $search=trim($_GET['search']);
          $service=trim($_GET['service']);
          $period= trim($_GET['period']);
  
          $pharmacistOrder= $this->adminPaymentsModel->pharmacistOrderDetails($id);
  
          $data=[                      
            'pharmacistOrder'=>$pharmacistOrder,
            'search'=>$search,
            'service'=>$service,
            'period'=>$period
                      
          ];
          

          $this->view('Admin/AdminPayments/v_pharmacistOrderViewMore',$data);
        
    }
  }else{
    redirect('Login/login');  
  }
}



public function medInstructorRegistrationViewMore($id)
{
  if(isset($_SESSION['admin_id'])) {  
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
  
          $search=trim($_GET['search']);
          $service=trim($_GET['service']);
          $period= trim($_GET['period']);
  
          $medInstructorRegistration= $this->adminPaymentsModel->medInstructorRegistrationDetails($id);
  
          $data=[                      
            'medInstructorRegistration'=>$medInstructorRegistration,
            'search'=>$search,
            'service'=>$service,
            'period'=>$period
                      
          ];
          

          $this->view('Admin/AdminPayments/v_medInstructorRegistrationViewMore',$data);
        
    }
  }else{
    redirect('Login/login');  
  }
}






  public function generateReport(){

    
    if(isset($_SESSION['admin_id'])) {  
      if($_SERVER['REQUEST_METHOD']=='POST'){
        $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $today = date('Y-m-d'); 
        $yesterday = date('Y-m-d', strtotime('-1 day'));
        $month = date("m"); 
        $year = date("Y"); 
      
       
        if($_SESSION['payment_service']=='doctorChannel'){ 
            $service='Doctor Channel';
                                            
          if($_SESSION['payment_period']=='transactionPeriod'){ 
             $payment_service= $this->adminPaymentsModel->doctorChannelAll();
             $payment_profit= $this->adminPaymentsModel->doctorChannelAllProfit();
             $period='Total';
          }


          if($_SESSION['payment_period']=='today'){ 
            $payment_service= $this->adminPaymentsModel->doctorChannelToday($today);
            $payment_profit=  $this->adminPaymentsModel->doctorChannelTodayProfit($today);
            $period=$today;
          }

          if($_SESSION['payment_period']=='yesterday'){ 
            $payment_service= $this->adminPaymentsModel->doctorChannelYesterday($yesterday);
            $payment_profit= $this->adminPaymentsModel->doctorChannelYesterdayProfit($yesterday);
            $period=$yesterday;
          }

          if($_SESSION['payment_period']=='thisMonth'){ 
            $payment_service= $this->adminPaymentsModel->doctorChannelThisMonth($month,$year);
            $payment_profit= $this->adminPaymentsModel->doctorChannelThisMonthProfit($month,$year);
            $period= date("Y").' '. date("M");
          }

          if($_SESSION['payment_period']=='thisYear'){ 
            $payment_service= $this->adminPaymentsModel->doctorChannelThisYear($year);
            $payment_profit= $this->adminPaymentsModel->doctorChannelThisYearProfit($year);
            $period='Year'.' '.date("Y");
          }
 

         } 

      else if($_SESSION['payment_service']=='counsellorChannel'){ 
          $service='Counsellor Channel';
                                          
        if($_SESSION['payment_period']=='transactionPeriod'){ 
           $payment_service= $this->adminPaymentsModel->counsellorChannelAll();
           $payment_profit= $this->adminPaymentsModel->counsellorChannelAllProfit();
           $period='Total';
        }


        if($_SESSION['payment_period']=='today'){ 
          $payment_service= $this->adminPaymentsModel->counsellorChannelToday($today);
          $payment_profit=  $this->adminPaymentsModel->counsellorChannelTodayProfit($today);
          $period=$today;
        }

        if($_SESSION['payment_period']=='yesterday'){ 
          $payment_service= $this->adminPaymentsModel->counsellorChannelYesterday($yesterday);
          $payment_profit= $this->adminPaymentsModel->counsellorChannelYesterdayProfit($yesterday);
          $period=$yesterday;
        }

        if($_SESSION['payment_period']=='thisMonth'){ 
          $payment_service= $this->adminPaymentsModel->counsellorChannelThisMonth($month,$year);
          $payment_profit= $this->adminPaymentsModel->counsellorChannelThisMonthProfit($month,$year);
          $period= date("Y").' '. date("M");
        }

        if($_SESSION['payment_period']=='thisYear'){ 
          $payment_service= $this->adminPaymentsModel->counsellorChannelThisYear($year);
          $payment_profit= $this->adminPaymentsModel->counsellorChannelThisYearProfit($year);
          $period='Year'.' '.date("Y");
        }


       } 

     else if($_SESSION['payment_service']=='nutritionistDietPlan'){ 
        $service='Nutritionist Diet Plan';
                                        
      if($_SESSION['payment_period']=='transactionPeriod'){ 
         $payment_service= $this->adminPaymentsModel->nutritionistDietPlanAll();
         $payment_profit= $this->adminPaymentsModel->nutritionistDietPlanAllProfit();
         $period='Total';
      }


      if($_SESSION['payment_period']=='today'){ 
        $payment_service= $this->adminPaymentsModel->nutritionistDietPlanToday($today);
        $payment_profit=  $this->adminPaymentsModel->nutritionistDietPlanTodayProfit($today);
        $period=$today;
      }

      if($_SESSION['payment_period']=='yesterday'){ 
        $payment_service= $this->adminPaymentsModel->nutritionistDietPlanYesterday($yesterday);
        $payment_profit= $this->adminPaymentsModel->nutritionistDietPlanYesterdayProfit($yesterday);
        $period=$yesterday;
      }

      if($_SESSION['payment_period']=='thisMonth'){ 
        $payment_service= $this->adminPaymentsModel->nutritionistDietPlanThisMonth($month,$year);
        $payment_profit= $this->adminPaymentsModel->nutritionistDietPlanThisMonthProfit($month,$year);
        $period= date("Y").' '. date("M");
      }

      if($_SESSION['payment_period']=='thisYear'){ 
        $payment_service= $this->adminPaymentsModel->nutritionistDietPlanThisYear($year);
        $payment_profit= $this->adminPaymentsModel->nutritionistDietPlanThisYearProfit($year);
        $period='Year'.' '.date("Y");
      }


      }
      else if($_SESSION['payment_service']=='medInstructorRegistration'){ 
        $service='Med Instruction Registration';
                                        
      if($_SESSION['payment_period']=='transactionPeriod'){ 
         $payment_service= $this->adminPaymentsModel->medInstructorRegistrationAll();
         $payment_profit= $this->adminPaymentsModel->medInstructorRegistrationAllProfit();
         $period='Total';
      }


      if($_SESSION['payment_period']=='today'){ 
        $payment_service= $this->adminPaymentsModel->medInstructorRegistrationToday($today);
        $payment_profit=  $this->adminPaymentsModel->medInstructorRegistrationTodayProfit($today);
        $period=$today;
      }

      if($_SESSION['payment_period']=='yesterday'){ 
        $payment_service= $this->adminPaymentsModel->medInstructorRegistrationYesterday($yesterday);
        $payment_profit= $this->adminPaymentsModel->medInstructorRegistrationYesterdayProfit($yesterday);
        $period=$yesterday;
      }

      if($_SESSION['payment_period']=='thisMonth'){ 
        $payment_service= $this->adminPaymentsModel->medInstructorRegistrationThisMonth($month,$year);
        $payment_profit= $this->adminPaymentsModel->medInstructorRegistrationThisMonthProfit($month,$year);
        $period= date("Y").' '. date("M");
      }

      if($_SESSION['payment_period']=='thisYear'){ 
        $payment_service= $this->adminPaymentsModel->medInstructorRegistrationThisYear($year);
        $payment_profit= $this->adminPaymentsModel->medInstructorRegistrationThisYearProfit($year);
        $period='Year'.' '.date("Y");
      }


     } 

    
    else if($_SESSION['payment_service']=='pharmacistOrder'){ 
      $service='Pharmacist Order';
                                      
    if($_SESSION['payment_period']=='transactionPeriod'){ 
       $payment_service= $this->adminPaymentsModel->pharmacistOrderAll();
       $payment_profit= $this->adminPaymentsModel->pharmacistOrderAllProfit();
       $period='Total';
    }


    if($_SESSION['payment_period']=='today'){ 
      $payment_service= $this->adminPaymentsModel->pharmacistOrderToday($today);
      $payment_profit=  $this->adminPaymentsModel->pharmacistOrderTodayProfit($today);
      $period=$today;
    }

    if($_SESSION['payment_period']=='yesterday'){ 
      $payment_service= $this->adminPaymentsModel->pharmacistOrderYesterday($yesterday);
      $payment_profit= $this->adminPaymentsModel->pharmacistOrderYesterdayProfit($yesterday);
      $period=$yesterday;
    }

    if($_SESSION['payment_period']=='thisMonth'){ 
      $payment_service= $this->adminPaymentsModel->pharmacistOrderThisMonth($month,$year);
      $payment_profit= $this->adminPaymentsModel->pharmacistOrderThisMonthProfit($month,$year);
      $period= date("Y").' '. date("M");
    }

    if($_SESSION['payment_period']=='thisYear'){ 
      $payment_service= $this->adminPaymentsModel->pharmacistOrderThisYear($year);
      $payment_profit= $this->adminPaymentsModel->pharmacistOrderThisYearProfit($year);
      $period='Year'.' '.date("Y");
    }


   } 
 else if($_SESSION['payment_service']=='sessionRegistration'){ 
      $service='Session Registration';
                                      
    if($_SESSION['payment_period']=='transactionPeriod'){ 
       $payment_service= $this->adminPaymentsModel->sessionRegistrationAll();
       $payment_profit= $this->adminPaymentsModel->sessionRegistrationAllProfit();
       $period='Total';
    }


    if($_SESSION['payment_period']=='today'){ 
      $payment_service= $this->adminPaymentsModel->sessionRegistrationToday($today);
      $payment_profit=  $this->adminPaymentsModel->sessionRegistrationTodayProfit($today);
      $period=$today;
    }

    if($_SESSION['payment_period']=='yesterday'){ 
      $payment_service= $this->adminPaymentsModel->sessionRegistrationYesterday($yesterday);
      $payment_profit= $this->adminPaymentsModel->sessionRegistrationYesterdayProfit($yesterday);
      $period=$yesterday;
    }

    if($_SESSION['payment_period']=='thisMonth'){ 
      $payment_service= $this->adminPaymentsModel->sessionRegistrationThisMonth($month,$year);
      $payment_profit= $this->adminPaymentsModel->sessionRegistrationThisMonthProfit($month,$year);
      $period= date("Y").' '. date("M");
    }

    if($_SESSION['payment_period']=='thisYear'){ 
      $payment_service= $this->adminPaymentsModel->sessionRegistrationThisYear($year);
      $payment_profit= $this->adminPaymentsModel->sessionRegistrationThisYearProfit($year);
      $period='Year'.' '.date("Y");
    }


   } 


      

         
        // Generate the PDF report using the FPDF library
        $pdf = new FPDF();
        $pdf->AddPage('L','A4');
        
        $pdf->SetFont('Arial', 'B', 20);
        $pdf->Cell(0, 10, 'Becare '. $service.' '.$period. ' Payment Details', 0, 1, 'C');
        $pdf->Cell(0, 10, $period.' profit : Rs. '.Round($payment_profit->profit,2 ), 0, 1, 'C');
       
       
        $pdfWidth = $pdf->GetPageWidth();
        $pdfHeight = $pdf->GetPageHeight();

        $pdf->Rect(5, 5, $pdfWidth-8, $pdfHeight-10, 'D');    

        $pdf->SetFont('Arial', 'B', 14);
        $pdf->SetTitle('Becare Payment Details Report');
        $pdf->SetTextColor(255, 255, 255);
       


        $pdf->Cell(70, 10, 'Service Provider Name', 1 , 0, 'C',1);
        $pdf->Cell(30, 10, 'Total Fee', 1 , 0, 'C',1);
        $pdf->Cell(60, 10, 'Service Provider Fee', 1 , 0, 'C',1);
        $pdf->Cell(30, 10, 'Profit', 1 , 0, 'C',1);
        $pdf->Cell(50, 10, 'Date & Time', 1 , 0, 'C',1);
         $pdf->Ln();
        
        $pdf->SetTextColor(0, 0, 0);
        
        $pdf->SetFont('Arial', '', 12);
        foreach ($payment_service as $row) {
        
          if($_SESSION['payment_service']=='medInstructorRegistration'||$_SESSION['payment_service']=='pharmacistOrder'){
                if($row->gender=='Male'){$gend='Mr.';}
                elseif($row->gender=='Female'){$gend='Mrs.';}

            $pdf->Cell(70,10, $gend. $row->first_name.' '. $row->last_name, 1 , 0, 'C');
           
          }
          
          elseif($_SESSION['payment_service']=='sessionRegistration'){
            
            if(!empty($row->meditation_instructor_id)){
              if($row->gender=='Male'){$gend='Mr.';}
              elseif($row->gender=='Female'){$gend='Mrs.';}

               $pdf->Cell(70,10, $gend. $row->first_name.' '. $row->last_name, 1 , 0, 'C');
       
            }
       
            if(!empty($row->nutritionist_id)){
                $pdf->Cell(70,10, 'Dr. '. $row->nutritionist_first_name.' '. $row->nutritionist_last_name, 1 , 0, 'C');
       
            }
       
            if(!empty($row->counsellor_id)){
                $pdf->Cell(70,10, 'Dr. '. $row->counsellor_first_name.' '. $row->counsellor_last_name, 1 , 0, 'C');
       
            }
       
       
         }
              
            
          
          else{
            $pdf->Cell(70,10,'Dr '. $row->first_name.' '. $row->last_name, 1 , 0, 'C');
           
          }
 
            
        if($_SESSION['payment_service']=='pharmacistOrder'){
          $pdf->Cell(30,10,Round($row->charge,2), 1 , 0, 'C');
          $pdf->Cell(60,10,Round(($row->charge/110)*100,2), 1 , 0, 'C');
          $pdf->Cell(30,10,Round(($row->charge/110)*10,2), 1 , 0, 'C');
       
        }else{
          $pdf->Cell(30,10,Round($row->paid_amount,2), 1 , 0, 'C');
          $pdf->Cell(60,10,Round(($row->paid_amount/110)*100,2), 1 , 0, 'C');
          $pdf->Cell(30,10,Round(($row->paid_amount/110)*10,2), 1 , 0, 'C');
       
        }
          

            
       if(!empty($row->paid_time)){
           $pdf->Cell(50,10,$row->paid_time, 1 , 0, 'C');

      }else if(!empty($row->requested_date_and_time)){
           $pdf->Cell(50,10,$row->requested_date_and_time, 1 , 0, 'C');

      }else if(!empty($row->registered_date_and_time)){
           $pdf->Cell(50,10,$row->registered_date_and_time, 1 , 0, 'C');

      }
           

       $pdf->Ln();
   

        }

       
        
        $pdf->AliasNbPages();
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Page ' . $pdf->PageNo() . ' of {nb}', 0, 0, 'C');
        
  
        // $pdf->Output();
         $pdf->Output('BeCarePayments.pdf', 'D');
       
         
               
      }
    }else{
      redirect('Login/login');  
    }


    }













}

 ?>
