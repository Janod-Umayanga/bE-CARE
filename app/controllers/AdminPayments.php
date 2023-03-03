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


}

 ?>
