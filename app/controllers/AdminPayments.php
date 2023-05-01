<?php

class AdminPayments extends Controller{
  private $adminPaymentsModel;
  
  public function __construct(){
    $this->adminPaymentsModel = $this->model('M_AdminPayments');
  }

  //view Doctor channel payments

  public function doctorChannelPayments()
  {
    if(isset($_SESSION['admin_id'])) {  
    
    $docChannel= $this->adminPaymentsModel->doctorChannelAll();   // get all doctor channels
    $profit= $this->adminPaymentsModel->doctorChannelAllProfit(); // get all doctor channels profit
    
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

        //Doctor Channel

        if($service=="doctorChannel"){
          $_SESSION['payment_table']="doctorChannelPayments";

        //Doctor Channel transaction period  
          if($period=='transactionPeriod'){
            if(!empty($search)){
               $docChannel=$this->adminPaymentsModel->doctorChannelAllSearch($search);
         
            }else{
               $docChannel=$this->adminPaymentsModel->doctorChannelAll();
               $profit= $this->adminPaymentsModel->doctorChannelAllProfit();
   
            }
               
          }
          
          //Doctor Channel today
          else if($period=='today'){
            if(!empty($search)){
              $docChannel=$this->adminPaymentsModel->doctorChannelTodaySearch($search,$today);
         
            }else{
              $docChannel=$this->adminPaymentsModel->doctorChannelToday($today);
              $profit= $this->adminPaymentsModel->doctorChannelTodayProfit($today);
   
            }   
          }

          //Doctor Channel yesterday
          else if($period=='yesterday'){
            if(!empty($search)){
              $docChannel=$this->adminPaymentsModel->doctorChannelYesterdaySearch($search,$yesterday);
         
            }else{
              $docChannel=$this->adminPaymentsModel->doctorChannelYesterday($yesterday);
              $profit= $this->adminPaymentsModel->doctorChannelYesterdayProfit($yesterday);
            }   
          }

          //Doctor Channel thisMonth
          else if($period=='thisMonth'){
            if(!empty($search)){
              $docChannel=$this->adminPaymentsModel->doctorChannelThisMonthSearch($search,$month,$year);
       
            }else{
              $docChannel=$this->adminPaymentsModel->doctorChannelThisMonth($month,$year);
              $profit= $this->adminPaymentsModel->doctorChannelThisMonthProfit($month,$year);
            }   
          }

          //Doctor Channel thisYear
          else if($period=='thisYear'){
            if(!empty($search)){
              $docChannel=$this->adminPaymentsModel->doctorChannelThisYearSearch($search,$year);
       
            }else{
              $docChannel=$this->adminPaymentsModel->doctorChannelThisYear($year);
              $profit= $this->adminPaymentsModel->doctorChannelThisYearProfit($year);
   
            }   
          }
          
         
        //$se for service 
        //$pe for period 

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

      //Counsellor Channel transactionPeriod
      if($period=='transactionPeriod'){
        if(!empty($search)){
           $counsellorChannel=$this->adminPaymentsModel->counsellorChannelAllSearch($search);

        }else{
           $counsellorChannel=$this->adminPaymentsModel->counsellorChannelAll();
           $profit= $this->adminPaymentsModel->counsellorChannelAllProfit();

        }   
      }  

        //Counsellor Channel today
      else if($period=='today'){
        if(!empty($search)){
          $counsellorChannel=$this->adminPaymentsModel->counsellorChannelTodaySearch($search,$today);

        }else{
          $counsellorChannel=$this->adminPaymentsModel->counsellorChannelToday($today);
          $profit= $this->adminPaymentsModel->counsellorChannelTodayProfit($today);

        }   
      }

      //Counsellor Channel yesterday
      else if($period=='yesterday'){
        if(!empty($search)){
          $counsellorChannel=$this->adminPaymentsModel->counsellorChannelYesterdaySearch($search,$yesterday);

        }else{
          $counsellorChannel=$this->adminPaymentsModel->counsellorChannelYesterday($yesterday);
          $profit= $this->adminPaymentsModel->counsellorChannelYesterdayProfit($yesterday);
        }   
      }

      //Counsellor Channel thisMonth
      else if($period=='thisMonth'){
        if(!empty($search)){
          $counsellorChannel=$this->adminPaymentsModel->counsellorChannelThisMonthSearch($search,$month,$year);

        }else{
          $counsellorChannel=$this->adminPaymentsModel->counsellorChannelThisMonth($month,$year);
          $profit= $this->adminPaymentsModel->counsellorChannelThisMonthProfit($month,$year);
        }   
      }

      //Counsellor Channel thisYear
      else if($period=='thisYear'){
        if(!empty($search)){
          $counsellorChannel=$this->adminPaymentsModel->counsellorChannelThisYearSearch($search,$year);

        }else{
          $counsellorChannel=$this->adminPaymentsModel->counsellorChannelThisYear($year);
          $profit= $this->adminPaymentsModel->counsellorChannelThisYearProfit($year);

        }   
      }
      
        //$se for service 
        //$pe for period 

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

      //  Nutritionist Diet Plan transactionPeriod
      if($period=='transactionPeriod'){
        if(!empty($search)){
           $nutritionistDietPlan=$this->adminPaymentsModel->nutritionistDietPlanAllSearch($search);
 
        }else{
           $nutritionistDietPlan=$this->adminPaymentsModel->nutritionistDietPlanAll();
           $profit= $this->adminPaymentsModel->nutritionistDietPlanAllProfit();

        }   
      }  
      //  Nutritionist Diet Plan today
      else if($period=='today'){
        if(!empty($search)){
          $nutritionistDietPlan=$this->adminPaymentsModel->nutritionistDietPlanTodaySearch($search,$today);
 
        }else{
          $nutritionistDietPlan=$this->adminPaymentsModel->nutritionistDietPlanToday($today);
          $profit= $this->adminPaymentsModel->nutritionistDietPlanTodayProfit($today);

        }   
      }
       //  Nutritionist Diet Plan yesterday

      else if($period=='yesterday'){
        if(!empty($search)){
          $nutritionistDietPlan=$this->adminPaymentsModel->nutritionistDietPlanYesterdaySearch($search,$yesterday);
 
        }else{
          $nutritionistDietPlan=$this->adminPaymentsModel->nutritionistDietPlanYesterday($yesterday);
          $profit= $this->adminPaymentsModel->nutritionistDietPlanYesterdayProfit($yesterday);
        }   
      }

       //  Nutritionist Diet Plan thisMonth
      else if($period=='thisMonth'){
        if(!empty($search)){
          $nutritionistDietPlan=$this->adminPaymentsModel->nutritionistDietPlanThisMonthSearch($search,$month,$year);
 
        }else{
          $nutritionistDietPlan=$this->adminPaymentsModel->nutritionistDietPlanThisMonth($month,$year);
          $profit= $this->adminPaymentsModel->nutritionistDietPlanThisMonthProfit($month,$year);
        }   
      }

      //  Nutritionist Diet Plan thisYear
      else if($period=='thisYear'){
        if(!empty($search)){
          $nutritionistDietPlan=$this->adminPaymentsModel->nutritionistDietPlanThisYearSearch($search,$year);
 
        }else{
          $nutritionistDietPlan=$this->adminPaymentsModel->nutritionistDietPlanThisYear($year);
          $profit= $this->adminPaymentsModel->nutritionistDietPlanThisYearProfit($year);

        }   
      }
      
       //$se for service 
       //$pe for period 

    

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

      //  Pharmacist Order transactionPeriod
      if($period=='transactionPeriod'){
        if(!empty($search)){
           $pharmacistOrder=$this->adminPaymentsModel->pharmacistOrderAllSearch($search);
   
        }else{
           $pharmacistOrder=$this->adminPaymentsModel->pharmacistOrderAll();
           $profit= $this->adminPaymentsModel->pharmacistOrderAllProfit();

        }   
      } 

      //  Pharmacist Order today
      else if($period=='today'){
        if(!empty($search)){
          $pharmacistOrder=$this->adminPaymentsModel->pharmacistOrderTodaySearch($search,$today);
   
        }else{
          $pharmacistOrder=$this->adminPaymentsModel->pharmacistOrderToday($today);
          $profit= $this->adminPaymentsModel->pharmacistOrderTodayProfit($today);

        }   
      }

      //  Pharmacist Order yesterday
      else if($period=='yesterday'){
        if(!empty($search)){
          $pharmacistOrder=$this->adminPaymentsModel->pharmacistOrderYesterdaySearch($search,$yesterday);
   
        }else{
          $pharmacistOrder=$this->adminPaymentsModel->pharmacistOrderYesterday($yesterday);
          $profit= $this->adminPaymentsModel->pharmacistOrderYesterdayProfit($yesterday);
        }   
      }

        //  Pharmacist Order thisMonth
      else if($period=='thisMonth'){
        if(!empty($search)){
          $pharmacistOrder=$this->adminPaymentsModel->pharmacistOrderThisMonthSearch($search,$month,$year);
 
        }else{
          $pharmacistOrder=$this->adminPaymentsModel->pharmacistOrderThisMonth($month,$year);
          $profit= $this->adminPaymentsModel->pharmacistOrderThisMonthProfit($month,$year);
        }   
      }

       //  Pharmacist Order thisYear
      else if($period=='thisYear'){
        if(!empty($search)){
          $pharmacistOrder=$this->adminPaymentsModel->pharmacistOrderThisYearSearch($search,$year);
 
        }else{
          $pharmacistOrder=$this->adminPaymentsModel->pharmacistOrderThisYear($year);
          $profit= $this->adminPaymentsModel->pharmacistOrderThisYearProfit($year);

        }   
      }
      
       //$se for service 
       //$pe for period 
    
    

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

      //  Med Instructor Registration transactionPeriod
      if($period=='transactionPeriod'){
        if(!empty($search)){
           $medInstructorRegistration=$this->adminPaymentsModel->medInstructorRegistrationAllSearch($search);
 
        }else{
           $medInstructorRegistration=$this->adminPaymentsModel->medInstructorRegistrationAll();
           $profit= $this->adminPaymentsModel->medInstructorRegistrationAllProfit();

        }   
      } 

      //  Med Instructor Registration today
      else if($period=='today'){
        if(!empty($search)){
          $medInstructorRegistration=$this->adminPaymentsModel->medInstructorRegistrationTodaySearch($search,$today);
      
        }else{
          $medInstructorRegistration=$this->adminPaymentsModel->medInstructorRegistrationToday($today);
          $profit= $this->adminPaymentsModel->medInstructorRegistrationTodayProfit($today);

        }   
      }

      //  Med Instructor Registration yesterday
      else if($period=='yesterday'){
        if(!empty($search)){
          $medInstructorRegistration=$this->adminPaymentsModel->medInstructorRegistrationYesterdaySearch($search,$yesterday);
         

        }else{
          $medInstructorRegistration=$this->adminPaymentsModel->medInstructorRegistrationYesterday($yesterday);
          $profit= $this->adminPaymentsModel->medInstructorRegistrationYesterdayProfit($yesterday);
        }   
      }
    
      //  Med Instructor Registration thisMonth
      else if($period=='thisMonth'){
        if(!empty($search)){
          $medInstructorRegistration=$this->adminPaymentsModel->medInstructorRegistrationThisMonthSearch($search,$month,$year);

        }else{
          $medInstructorRegistration=$this->adminPaymentsModel->medInstructorRegistrationThisMonth($month,$year);
          $profit= $this->adminPaymentsModel->medInstructorRegistrationThisMonthProfit($month,$year);
        }   
      }

      //  Med Instructor Registration thisYear
      else if($period=='thisYear'){
        if(!empty($search)){
          $medInstructorRegistration=$this->adminPaymentsModel->medInstructorRegistrationThisYearSearch($search,$year);
      
        }else{
          $medInstructorRegistration=$this->adminPaymentsModel->medInstructorRegistrationThisYear($year);
          $profit= $this->adminPaymentsModel->medInstructorRegistrationThisYearProfit($year);

        }   
      }
      
       //$se for service 
       //$pe for period 
    
    

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

       //  Session Registration transactionPeriod
      if($period=='transactionPeriod'){
        if(!empty($search)){
           $sessionRegistration=$this->adminPaymentsModel->sessionRegistrationAllSearch($search);
    
        }else{
           $sessionRegistration=$this->adminPaymentsModel->sessionRegistrationAll();
           $profit= $this->adminPaymentsModel->sessionRegistrationAllProfit();

        }   
      }  
      //  Session Registration today
      else if($period=='today'){
        if(!empty($search)){
          $sessionRegistration=$this->adminPaymentsModel->sessionRegistrationTodaySearch($search,$today);
    
        }else{
          $sessionRegistration=$this->adminPaymentsModel->sessionRegistrationToday($today);
          $profit= $this->adminPaymentsModel->sessionRegistrationTodayProfit($today);

        }   
      }

       //  Session Registration yesterday
      else if($period=='yesterday'){
        if(!empty($search)){
          $sessionRegistration=$this->adminPaymentsModel->sessionRegistrationYesterdaySearch($search,$yesterday);
    
        }else{
          $sessionRegistration=$this->adminPaymentsModel->sessionRegistrationYesterday($yesterday);
          $profit= $this->adminPaymentsModel->sessionRegistrationYesterdayProfit($yesterday);
        }   
      }
       //  Session Registration thisMonth
      else if($period=='thisMonth'){
        if(!empty($search)){
          $sessionRegistration=$this->adminPaymentsModel->sessionRegistrationThisMonthSearch($search,$month,$year);
    
        }else{
          $sessionRegistration=$this->adminPaymentsModel->sessionRegistrationThisMonth($month,$year);
          $profit= $this->adminPaymentsModel->sessionRegistrationThisMonthProfit($month,$year);
        }   
      }

      //  Session Registration thisYear
      else if($period=='thisYear'){
        if(!empty($search)){
          $sessionRegistration=$this->adminPaymentsModel->sessionRegistrationThisYearSearch($search,$year);
    
        }else{
          $sessionRegistration=$this->adminPaymentsModel->sessionRegistrationThisYear($year);
          $profit= $this->adminPaymentsModel->sessionRegistrationThisYearProfit($year);

        }   
      }
      
       //$se for service 
       //$pe for period 
    
    

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


// Doctor channel view More
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

//counsellor Channel view More
public function counsellorChannelViewMore($id)
{
  if(isset($_SESSION['admin_id'])) {  
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
  
          $search=trim($_GET['search']);
          $service=trim($_GET['service']);
          $period= trim($_GET['period']);
  
          //$search , $service, $period values use to correctly backing to relevant table from view More. 

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

//nutritionist dietplan viewMore
public function nutritionistDietPlanViewMore($id)
{
  if(isset($_SESSION['admin_id'])) {  
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
  
          $search=trim($_GET['search']);
          $service=trim($_GET['service']);
          $period= trim($_GET['period']);
  
          
          //$search , $service, $period values use to correctly backing to relevant table from view More. 

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


//sessionRegistration Nutritionist ViewMore
public function sessionRegistrationNutritionistViewMore($id)
{                  
  if(isset($_SESSION['admin_id'])) {  
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
  
          $search=trim($_GET['search']);
          $service=trim($_GET['service']);
          $period= trim($_GET['period']);

          
          //$search , $service, $period values use to correctly backing to relevant table from view More. 

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

//session Registration Counsellor ViewMore
public function sessionRegistrationCounsellorViewMore($id)
{                  
  if(isset($_SESSION['admin_id'])) {  
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
  
          $search=trim($_GET['search']);
          $service=trim($_GET['service']);
          $period= trim($_GET['period']);
  
        
         //$search , $service, $period values use to correctly backing to relevant table from view More. 

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

//session Registration MedInstructorViewMore
public function sessionRegistrationMedInstructorViewMore($id)
{                  
  if(isset($_SESSION['admin_id'])) {  
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
  
          $search=trim($_GET['search']);
          $service=trim($_GET['service']);
          $period= trim($_GET['period']);
  
         //$search , $service, $period values use to correctly backing to relevant table from view More. 

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

//pharmacistOrder ViewMore
public function pharmacistOrderViewMore($id)
{
  if(isset($_SESSION['admin_id'])) {  
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
  
          $search=trim($_GET['search']);
          $service=trim($_GET['service']);
          $period= trim($_GET['period']);
  
        //$search , $service, $period values use to correctly backing to relevant table from view More. 

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

//medInstructorRegistrationViewMore

public function medInstructorRegistrationViewMore($id)
{
  if(isset($_SESSION['admin_id'])) {  
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
  
          $search=trim($_GET['search']);
          $service=trim($_GET['service']);
          $period= trim($_GET['period']);
  
          
        //$search , $service, $period values use to correctly backing to relevant table from view More. 

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


//Generate Report


  public function generateReport(){

    
    if(isset($_SESSION['admin_id'])) {  
      if($_SERVER['REQUEST_METHOD']=='POST'){
        $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
       
        
        $today = date('Y-m-d'); 
        $yesterday = date('Y-m-d', strtotime('-1 day'));
        $month = date("m"); 
        $year = date("Y"); 
      
       //Doctor Channel
        if($_SESSION['payment_service']=='doctorChannel'){ 
            $service='Doctor Channel';
          
           //Doctor Channel transactionPeriod
          if($_SESSION['payment_period']=='transactionPeriod'){ 
             $payment_service= $this->adminPaymentsModel->doctorChannelAll();
             $payment_profit= $this->adminPaymentsModel->doctorChannelAllProfit();
             $period='Total';
          }

            //Doctor Channel today
          if($_SESSION['payment_period']=='today'){ 
            $payment_service= $this->adminPaymentsModel->doctorChannelToday($today);
            $payment_profit=  $this->adminPaymentsModel->doctorChannelTodayProfit($today);
            $period=$today;
          }
             //Doctor Channel yesterday
          if($_SESSION['payment_period']=='yesterday'){ 
            $payment_service= $this->adminPaymentsModel->doctorChannelYesterday($yesterday);
            $payment_profit= $this->adminPaymentsModel->doctorChannelYesterdayProfit($yesterday);
            $period=$yesterday;
          }
             //Doctor Channel thisMonth
          if($_SESSION['payment_period']=='thisMonth'){ 
            $payment_service= $this->adminPaymentsModel->doctorChannelThisMonth($month,$year);
            $payment_profit= $this->adminPaymentsModel->doctorChannelThisMonthProfit($month,$year);
            $period= date("Y").' '. date("M");
          }
             //Doctor Channel thisYear
          if($_SESSION['payment_period']=='thisYear'){ 
            $payment_service= $this->adminPaymentsModel->doctorChannelThisYear($year);
            $payment_profit= $this->adminPaymentsModel->doctorChannelThisYearProfit($year);
            $period='Year'.' '.date("Y");
          }
 

         } 
      //Counsellor Channel
      else if($_SESSION['payment_service']=='counsellorChannel'){ 
          $service='Counsellor Channel';
      
          //Counsellor Channel transactionPeriod                                 
        if($_SESSION['payment_period']=='transactionPeriod'){ 
           $payment_service= $this->adminPaymentsModel->counsellorChannelAll();
           $payment_profit= $this->adminPaymentsModel->counsellorChannelAllProfit();
           $period='Total';
        }

          //Counsellor Channel today
        if($_SESSION['payment_period']=='today'){ 
          $payment_service= $this->adminPaymentsModel->counsellorChannelToday($today);
          $payment_profit=  $this->adminPaymentsModel->counsellorChannelTodayProfit($today);
          $period=$today;
        }
        
          //Counsellor Channel yesterday
        if($_SESSION['payment_period']=='yesterday'){ 
          $payment_service= $this->adminPaymentsModel->counsellorChannelYesterday($yesterday);
          $payment_profit= $this->adminPaymentsModel->counsellorChannelYesterdayProfit($yesterday);
          $period=$yesterday;
        }

        //Counsellor Channel thisMonth
        if($_SESSION['payment_period']=='thisMonth'){ 
          $payment_service= $this->adminPaymentsModel->counsellorChannelThisMonth($month,$year);
          $payment_profit= $this->adminPaymentsModel->counsellorChannelThisMonthProfit($month,$year);
          $period= date("Y").' '. date("M");
        }
        
        //Counsellor Channel thisYear
        if($_SESSION['payment_period']=='thisYear'){ 
          $payment_service= $this->adminPaymentsModel->counsellorChannelThisYear($year);
          $payment_profit= $this->adminPaymentsModel->counsellorChannelThisYearProfit($year);
          $period='Year'.' '.date("Y");
        }


       } 

      //Nutritionist DietPlan 
     else if($_SESSION['payment_service']=='nutritionistDietPlan'){ 
        $service='Nutritionist Diet Plan';
                               
      //Nutritionist DietPlan transactionPeriod  
      if($_SESSION['payment_period']=='transactionPeriod'){ 
         $payment_service= $this->adminPaymentsModel->nutritionistDietPlanAll();
         $payment_profit= $this->adminPaymentsModel->nutritionistDietPlanAllProfit();
         $period='Total';
      }

      //Nutritionist DietPlan today
      if($_SESSION['payment_period']=='today'){ 
        $payment_service= $this->adminPaymentsModel->nutritionistDietPlanToday($today);
        $payment_profit=  $this->adminPaymentsModel->nutritionistDietPlanTodayProfit($today);
        $period=$today;
      }

      //Nutritionist DietPlan yesterday
      if($_SESSION['payment_period']=='yesterday'){ 
        $payment_service= $this->adminPaymentsModel->nutritionistDietPlanYesterday($yesterday);
        $payment_profit= $this->adminPaymentsModel->nutritionistDietPlanYesterdayProfit($yesterday);
        $period=$yesterday;
      }

       //Nutritionist DietPlan thisMonth
      if($_SESSION['payment_period']=='thisMonth'){ 
        $payment_service= $this->adminPaymentsModel->nutritionistDietPlanThisMonth($month,$year);
        $payment_profit= $this->adminPaymentsModel->nutritionistDietPlanThisMonthProfit($month,$year);
        $period= date("Y").' '. date("M");
      }
     
      //Nutritionist DietPlan thisYear
      if($_SESSION['payment_period']=='thisYear'){ 
        $payment_service= $this->adminPaymentsModel->nutritionistDietPlanThisYear($year);
        $payment_profit= $this->adminPaymentsModel->nutritionistDietPlanThisYearProfit($year);
        $period='Year'.' '.date("Y");
      }

      //medInstructorRegistration
      }
      else if($_SESSION['payment_service']=='medInstructorRegistration'){ 
        $service='Med Instruction Registration';
      
        //medInstructorRegistration transactionPeriod                                 
      if($_SESSION['payment_period']=='transactionPeriod'){ 
         $payment_service= $this->adminPaymentsModel->medInstructorRegistrationAll();
         $payment_profit= $this->adminPaymentsModel->medInstructorRegistrationAllProfit();
         $period='Total';
      }

      //medInstructorRegistration today
      if($_SESSION['payment_period']=='today'){ 
        $payment_service= $this->adminPaymentsModel->medInstructorRegistrationToday($today);
        $payment_profit=  $this->adminPaymentsModel->medInstructorRegistrationTodayProfit($today);
        $period=$today;
      }

      //medInstructorRegistration yesterday
      if($_SESSION['payment_period']=='yesterday'){ 
        $payment_service= $this->adminPaymentsModel->medInstructorRegistrationYesterday($yesterday);
        $payment_profit= $this->adminPaymentsModel->medInstructorRegistrationYesterdayProfit($yesterday);
        $period=$yesterday;
      }

      //medInstructorRegistration thisMonth
      if($_SESSION['payment_period']=='thisMonth'){ 
        $payment_service= $this->adminPaymentsModel->medInstructorRegistrationThisMonth($month,$year);
        $payment_profit= $this->adminPaymentsModel->medInstructorRegistrationThisMonthProfit($month,$year);
        $period= date("Y").' '. date("M");
      }

      //medInstructorRegistration thisYear
      if($_SESSION['payment_period']=='thisYear'){ 
        $payment_service= $this->adminPaymentsModel->medInstructorRegistrationThisYear($year);
        $payment_profit= $this->adminPaymentsModel->medInstructorRegistrationThisYearProfit($year);
        $period='Year'.' '.date("Y");
      }


     } 

    //pharmacist Order
    else if($_SESSION['payment_service']=='pharmacistOrder'){ 
      $service='Pharmacist Order';
                      
    //pharmacist Order transactionPeriod  
    if($_SESSION['payment_period']=='transactionPeriod'){ 
       $payment_service= $this->adminPaymentsModel->pharmacistOrderAll();
       $payment_profit= $this->adminPaymentsModel->pharmacistOrderAllProfit();
       $period='Total';
    }

    //pharmacist Order today
    if($_SESSION['payment_period']=='today'){ 
      $payment_service= $this->adminPaymentsModel->pharmacistOrderToday($today);
      $payment_profit=  $this->adminPaymentsModel->pharmacistOrderTodayProfit($today);
      $period=$today;
    }
    
    //pharmacist Order yesterday
    if($_SESSION['payment_period']=='yesterday'){ 
      $payment_service= $this->adminPaymentsModel->pharmacistOrderYesterday($yesterday);
      $payment_profit= $this->adminPaymentsModel->pharmacistOrderYesterdayProfit($yesterday);
      $period=$yesterday;
    }

    //pharmacist Order thisMonth
    if($_SESSION['payment_period']=='thisMonth'){ 
      $payment_service= $this->adminPaymentsModel->pharmacistOrderThisMonth($month,$year);
      $payment_profit= $this->adminPaymentsModel->pharmacistOrderThisMonthProfit($month,$year);
      $period= date("Y").' '. date("M");
    }
 
    //pharmacist Order thisYear
    if($_SESSION['payment_period']=='thisYear'){ 
      $payment_service= $this->adminPaymentsModel->pharmacistOrderThisYear($year);
      $payment_profit= $this->adminPaymentsModel->pharmacistOrderThisYearProfit($year);
      $period='Year'.' '.date("Y");
    }


   } 

   //sessionRegistration
 else if($_SESSION['payment_service']=='sessionRegistration'){ 
      $service='Session Registration';
                        
    //sessionRegistration transactionPeriod  
    if($_SESSION['payment_period']=='transactionPeriod'){ 
       $payment_service= $this->adminPaymentsModel->sessionRegistrationAll();
       $payment_profit= $this->adminPaymentsModel->sessionRegistrationAllProfit();
       $period='Total';
    }

   //sessionRegistration today
    if($_SESSION['payment_period']=='today'){ 
      $payment_service= $this->adminPaymentsModel->sessionRegistrationToday($today);
      $payment_profit=  $this->adminPaymentsModel->sessionRegistrationTodayProfit($today);
      $period=$today;
    }

    //sessionRegistration yesterday
    if($_SESSION['payment_period']=='yesterday'){ 
      $payment_service= $this->adminPaymentsModel->sessionRegistrationYesterday($yesterday);
      $payment_profit= $this->adminPaymentsModel->sessionRegistrationYesterdayProfit($yesterday);
      $period=$yesterday;
    }

    //sessionRegistration thisMonth
    if($_SESSION['payment_period']=='thisMonth'){ 
      $payment_service= $this->adminPaymentsModel->sessionRegistrationThisMonth($month,$year);
      $payment_profit= $this->adminPaymentsModel->sessionRegistrationThisMonthProfit($month,$year);
      $period= date("Y").' '. date("M");
    }
    
    //sessionRegistration thisYear
    if($_SESSION['payment_period']=='thisYear'){ 
      $payment_service= $this->adminPaymentsModel->sessionRegistrationThisYear($year);
      $payment_profit= $this->adminPaymentsModel->sessionRegistrationThisYearProfit($year);
      $period='Year'.' '.date("Y");
    }


   } 


      

         
        // Generate the PDF report using the FPDF library
        $pdf = new FPDF();
       
        // creating a new PDF document with landscape orientation and A4 page size 
        $pdf->AddPage('L','A4');
       
              
        $pdf->SetFont('Arial', 'B', 20);  // set the font, style, and size for text in a PDF


        // 0 width of the cell
        // 10 height of the cell
        // 0 border style of the cell. In this case, 0 means no border.
        // 1 line break after the cell. In this case, 1 means a line break will be added after the cell.
        //'C'text will be centered within the cell.
 
        $pdf->Cell(0, 10, 'Becare '. $service.' '.$period. ' Payment Details', 0, 1, 'C');

       
        $pdf->Cell(0, 10, $period.' profit : Rs. '.Round($payment_profit->profit,2 ), 0, 1, 'C');
       
       //width and height of a PDF page get using PHP's GetPageWidth() and GetPageHeight() methods.
        $pdfWidth = $pdf->GetPageWidth();
        $pdfHeight = $pdf->GetPageHeight();

        // Rectangle is drawn in a PDF document using $pdf->Rect() method with coordinates (5, 5) as the top-left corner
        // $pdfWidth-8 for the width and $pdfHeight-10 for the height
        //'D' indicating rectangle should be drawn with no fill.
        $pdf->Rect(5, 5, $pdfWidth-8, $pdfHeight-10, 'D');    

        $pdf->SetFont('Arial', 'B', 14);
        $pdf->SetTitle('Becare Payment Details Report'); //Title
       
       //Text color set to white (RGB value of 255, 255, 255) 
        $pdf->SetTextColor(255, 255, 255);
       
       //last parameter '1' in the $pdf->Cell() indicates black as background color of cell     
        $pdf->Cell(109, 10, 'Service Provider Name', 1 , 0, 'C',1);
        $pdf->Cell(30, 10, 'Total Fee', 1 , 0, 'C',1);
        $pdf->Cell(60, 10, 'Service Provider Fee', 1 , 0, 'C',1);
        $pdf->Cell(30, 10, 'Profit', 1 , 0, 'C',1);
        $pdf->Cell(50, 10, 'Date & Time', 1 , 0, 'C',1);
        $pdf->Ln();  // add a new line (line break)
        
        $pdf->SetTextColor(0, 0, 0);   //Text color set to Black 
       
        
        $pdf->SetFont('Arial', '', 12);

        foreach ($payment_service as $row) {
        
        //Service Provider Name

          if($_SESSION['payment_service']=='medInstructorRegistration'||$_SESSION['payment_service']=='pharmacistOrder'){
                if($row->gender=='Male'){$gend='Mr.';}
                elseif($row->gender=='Female'){$gend='Mrs.';}

            $pdf->Cell(109,10, $gend. $row->first_name.' '. $row->last_name, 1 , 0, 'C');
           
          }
          
          elseif($_SESSION['payment_service']=='sessionRegistration'){
            
            if(!empty($row->meditation_instructor_id)){
              if($row->gender=='Male'){$gend='Mr.';}
              elseif($row->gender=='Female'){$gend='Mrs.';}

               $pdf->Cell(109,10, $gend. $row->first_name.' '. $row->last_name, 1 , 0, 'C');
       
            }
       
            if(!empty($row->nutritionist_id)){
                $pdf->Cell(109,10, 'Dr. '. $row->nutritionist_first_name.' '. $row->nutritionist_last_name, 1 , 0, 'C');
       
            }
       
            if(!empty($row->counsellor_id)){
                $pdf->Cell(109,10, 'Dr. '. $row->counsellor_first_name.' '. $row->counsellor_last_name, 1 , 0, 'C');
       
            }
       
       
         }
              
            
          
          else{
            $pdf->Cell(109,10,'Dr '. $row->first_name.' '. $row->last_name, 1 , 0, 'C');
           
          }
 
      //Total Fee ,ServiceProvider fee, profit   
            
        if($_SESSION['payment_service']=='pharmacistOrder'){
          $pdf->Cell(30,10,Round($row->charge,2), 1 , 0, 'C');
          $pdf->Cell(60,10,Round(($row->charge/110)*100,2), 1 , 0, 'C');
          $pdf->Cell(30,10,Round(($row->charge/110)*10,2), 1 , 0, 'C');
       
        }else{
          $pdf->Cell(30,10,Round($row->paid_amount,2), 1 , 0, 'C');
          $pdf->Cell(60,10,Round(($row->paid_amount/110)*100,2), 1 , 0, 'C');
          $pdf->Cell(30,10,Round(($row->paid_amount/110)*10,2), 1 , 0, 'C');
       
        }
          

      //Paid Time
            
      if(!empty($row->paid_time)){
           $pdf->Cell(50,10,$row->paid_time, 1 , 0, 'C');

      }else if(!empty($row->requested_date_and_time)){
           $pdf->Cell(50,10,$row->requested_date_and_time, 1 , 0, 'C');

      }else if(!empty($row->registered_date_and_time)){
           $pdf->Cell(50,10,$row->registered_date_and_time, 1 , 0, 'C');

      }
           

       $pdf->Ln(); // add a new line (line break)
   

        }

       
        
        $pdf->AliasNbPages();  // Total number of pages in a PDF document
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Page ' . $pdf->PageNo() . ' of {nb}', 0, 0, 'C'); 
        // $pdf->PageNo() retrieve the current page number of the document
        
  
        // $pdf->Output();
         $pdf->Output('BeCarePayments.pdf', 'D');
       
         //output mode as 'D', PDF download as an attachment in the user's browser
               
      }
    }else{
      redirect('Login/login');  
    }


    }













}

 ?>
