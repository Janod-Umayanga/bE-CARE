<?php

 class Pages extends controller{
  
   public function __construct()
   {
     $this->pagesModel=$this->model('M_Pages');
   }

   public function index()
   {
    $data=[];
    $this->view('pages/v_index',$data);

   }

   public function feedback()
   {
    $feedback= $this->pagesModel->getAllfeedBack();
    $patient= $this->pagesModel->getPatientDetails();
    
    $data=[                      
      'feedback'=>$feedback,
      'patient'=>$patient
       
    ];
    $this->view('pages/v_feedback',$data);
 
   }

   public function aboutus()
   {
    
    $data=[                      
       
    ];
   
     $this->view('pages/v_aboutus',$data);
 
   }


   public function contactus()
   {
    
    $data=[                      
       
    ];
   
    $this->view('pages/v_contactus',$data);
 
   }


//    public function about()
//    {
//      $users=$this->pagesModel->getUsers();

//      $data=[
//        'users'=> $users
//      ];
//      $this->view('v_about',$data);
//    }


 }

 ?>
