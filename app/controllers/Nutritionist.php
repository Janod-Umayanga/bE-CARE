<?php

class Nutritionist extends Controller
{
   // private $nutritionistModel;
    private $nutritionistViewHistoryModel;
   // private $nutriSessionModel;
    private $nutritionistModel;
    private $nutritionistViewRequestsModel;
    private $nutritionistViewRequestsMoreModel;
 
 public function __construct()
    {
        $this->nutritionistModel = $this->model('M_Nutritionist');
      
        $this->nutritionistViewHistoryModel = $this->model('M_Nutritionist');
      //  $this->nutriHistoryModel = $this->model('M_NutritionistDashboard');
       // $this->nutriSessionModel = $this->model('M_NutritionistSession');
        $this->nutritionistViewRequestsModel = $this->model('M_Nutritionist');
        $this->nutritionistViewRequestsMoreModel = $this->model('M_Nutritionist');
    }
 
public function nutritionistDashBoard()
  {
   if(isset($_SESSION['nutritionist_id'])) {  
   
   $user= $this->nutritionistModel->findNutritionistByEmail($_SESSION['nutritionist_id']);
   $data=[                      
     'user'=>$user
   ]; 
   $this->view('Nutritionist/v_NutritionistDashboard',$data);

  }else{
    redirect('Login/login');  
  } 
  }
   
 

  public function nutritionistViewHistory(){
    
  if(isset($_SESSION['nutritionist_id'])){
    $his = $this->nutritionistViewHistoryModel->viewHistoryPage($_SESSION['nutritionist_id']);

    $data=[                      
      'his'=>$his
    ]; 
    $this->view('Nutritionist/v_NutritionistViewHistory',$data);  
  }else{
      redirect('Login/login');
  }

  }

  
  public function nutritionistViewRequests(){

  if(isset($_SESSION['nutritionist_id'])){
    $plans = $this->nutritionistViewRequestsModel->getAllRequestedDietPlanDetails($_SESSION['nutritionist_id']);

    $data=[                      
      'plans'=> $plans
    ]; 
    $this->view('Nutritionist/v_NutritionistViewRequests',$data);  
  }else{
      redirect('Login/login');
  }

   
  }

  public function nutritionistViewRequestsMore(){

    if(isset($_SESSION['nutritionist_id'])){
      $more = $this->nutritionistViewRequestsMoreModel->getAllRequestedDietPlanMoreDetails($_SESSION['nutritionist_id']);
  
      $data=[                      
        'more'=> $more
      ]; 
      $this->view('Nutritionist/v_NutritionistViewRequestsMore',$data);  
    }else{
        redirect('Login/login');
    }
  
     
    }

}

   

