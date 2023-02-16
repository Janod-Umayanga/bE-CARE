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
          if($period=='transactionPeriod'){
            if(!empty($search)){
               $docChannel=$this->adminPaymentsModel->doctorChannelAllSearch($search);
                
            }else{
               $docChannel=$this->adminPaymentsModel->doctorChannelAll();
               $profit= $this->adminPaymentsModel->doctorChannelAllProfit();
   
            }   
          }  
          else if($period=='today'){
            if(!empty($search)){
              $docChannel=$this->adminPaymentsModel->doctorChannelTodaySearch($search,$today);
   
            }else{
              $docChannel=$this->adminPaymentsModel->doctorChannelToday($today);
              $profit= $this->adminPaymentsModel->doctorChannelTodayProfit($today);
   
            }   
          }
          else if($period=='yesterday'){
            if(!empty($search)){
              $docChannel=$this->adminPaymentsModel->doctorChannelYesterdaySearch($search,$yesterday);
   
            }else{
              $docChannel=$this->adminPaymentsModel->doctorChannelYesterday($yesterday);
              $profit= $this->adminPaymentsModel->doctorChannelYesterdayProfit($yesterday);
   
            }   
          }
          else if($period=='thisMonth'){
            if(!empty($search)){
              $docChannel=$this->adminPaymentsModel->doctorChannelThisMonthSearch($search,$month,$year);
   
            }else{
              $docChannel=$this->adminPaymentsModel->doctorChannelThisMonth($month,$year);
              $profit= $this->adminPaymentsModel->doctorChannelThisMonthProfit($month,$year);
   
            }   
          }

          
          else if($period=='thisYear'){
            if(!empty($search)){
              $docChannel=$this->adminPaymentsModel->doctorChannelThisYearSearch($search,$year);
            }else{
              $docChannel=$this->adminPaymentsModel->doctorChannelThisYear($year);
              $profit= $this->adminPaymentsModel->doctorChannelThisYearProfit($year);
   
            }   
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
          'profit'=>$profit
        ];
        $this->view('Admin/AdminPayments/v_adminPayments',$data);
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



}

 ?>
