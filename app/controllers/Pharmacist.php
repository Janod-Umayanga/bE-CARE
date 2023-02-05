<?php

   class Pharmacist extends Controller{
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
        $orders = $this->pharmacistViewOrdersModel->getAllOrderDetails($_SESSION['pharmacist_id']);
    
        $data=[                      
          'orders'=>$orders
        ]; 
        $this->view('pharmacist/v_PharmacistViewOrders',$data);  
      }else{
          redirect('Login/login');
      }
    
       
    }



   }

   




?>