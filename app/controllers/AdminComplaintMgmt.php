<?php

class AdminComplaintMgmt extends Controller{
  private $adminComplaintMgmtModel;

  public function __construct(){
    $this->adminComplaintMgmtModel = $this->model('M_AdminComplaintMgmt');
  }

 //Admin Complaint Mgmt
   public function adminComplaintMgmt()
   {
     if(isset($_SESSION['admin_id'])) {
   
      $solvedComplaint= $this->adminComplaintMgmtModel->getnoOfSolvedComplaint();
      $unsolvedComplaint= $this->adminComplaintMgmtModel->getnoOfUnsolvedComplaint();
       
       $data=[                      
         'solvedComplaint'=>$solvedComplaint,
         'unsolvedComplaint'=>$unsolvedComplaint,
          
       ];
       $this->view('Admin/AdminComplaintMgmt/v_complaintMgmt',$data);
     }else{
        redirect('Login/login');  
     }
    }

   // Admin Solved Complaint 
    public function solvedComplaint()
    {
      if(isset($_SESSION['admin_id'])) {
    
        $complaint= $this->adminComplaintMgmtModel->getSolvedComplaint();
        $patient= $this->adminComplaintMgmtModel->getPatientDetails();
        $doctor= $this->adminComplaintMgmtModel->getDoctorDetails();
        $counsellor= $this->adminComplaintMgmtModel->getCounsellorDetails();
        $meditationInstr= $this->adminComplaintMgmtModel->getMeditationInstrDetails();
        $nutritionist= $this->adminComplaintMgmtModel->getNutritionistDetails();
        $pharmacist= $this->adminComplaintMgmtModel->getPharmacistDetails();
        
        $data=[                      
          'complaint'=>$complaint,
          'patient'=>$patient,
          'doctor'=>$doctor,
          'counsellor'=>$counsellor,
          'meditationInstr'=>$meditationInstr,
          'nutritionist'=>$nutritionist,
          'pharmacist'=>$pharmacist,
          
        ];
        $this->view('Admin/AdminComplaintMgmt/v_complaintMgmtSolved',$data);
      }else{
         redirect('Login/login');  
      }
     }
  
    //Admin unsolvedComplaint 
    public function unsolvedComplaint()
    {
      if(isset($_SESSION['admin_id'])) {
    
        $complaint= $this->adminComplaintMgmtModel->getUnsolvedComplaint();
        $patient= $this->adminComplaintMgmtModel->getPatientDetails();
        $doctor= $this->adminComplaintMgmtModel->getDoctorDetails();
        $counsellor= $this->adminComplaintMgmtModel->getCounsellorDetails();
        $meditationInstr= $this->adminComplaintMgmtModel->getMeditationInstrDetails();
        $nutritionist= $this->adminComplaintMgmtModel->getNutritionistDetails();
        $pharmacist= $this->adminComplaintMgmtModel->getPharmacistDetails();
        
        $data=[                      
          'complaint'=>$complaint,
          'patient'=>$patient,
          'doctor'=>$doctor,
          'counsellor'=>$counsellor,
          'meditationInstr'=>$meditationInstr,
          'nutritionist'=>$nutritionist,
          'pharmacist'=>$pharmacist,
          
        ];
        $this->view('Admin/AdminComplaintMgmt/v_complaintMgmtUnsolved',$data);
      }else{
         redirect('Login/login');  
      }
     }
  
     //View More Solved Complaint

   public function viewMoreS($complaintId){

    if(isset($_SESSION['admin_id'])) {
  
    if($_SERVER['REQUEST_METHOD']=='POST'){
     
      $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      
        $complaint= $this->adminComplaintMgmtModel->getSolvedComplaintViewMore($complaintId);
        
      $data=[                      
        'complaint'=>$complaint,
        'first_name'=>$_POST['first_name'],
        'last_name'=>$_POST['last_name'],
        'type'=>$_POST['type'],
        'email'=>$_POST['email']   
        
      ];
      $this->view('Admin/AdminComplaintMgmt/v_complaintMgmtViewMoreS',$data);
   
    }
    }else{
        redirect('Login/login');  
    }
   
   } 

        //View More Unsolved Complaint

   public function viewMoreUC($complaintId){

    if(isset($_SESSION['admin_id'])) {
  
    if($_SERVER['REQUEST_METHOD']=='POST'){
     
      $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      
        $complaint= $this->adminComplaintMgmtModel->getComplaint($complaintId);
        
      $data=[                      
        'complaint'=>$complaint,
        'first_name'=>$_POST['first_name'],
        'last_name'=>$_POST['last_name'],
        'type'=>$_POST['type'],
        'email'=>$_POST['email']   
        
      ];
      $this->view('Admin/AdminComplaintMgmt/v_complaintMgmtViewMoreUC',$data);
   
    }
    }else{
        redirect('Login/login');  
    }
   
   } 

  
    //Complaint Solved


     public function solved($id)
     {
      if(isset($_SESSION['admin_id'])) {  

           if($_SERVER['REQUEST_METHOD']=='GET'){
             $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
       
               
               $solved= $this->adminComplaintMgmtModel->setSolved($id);
   
                $data=[ ];
                
                if($solved==true){
                    redirect('AdminComplaintMgmt/adminComplaintMgmt');
                }
           } 
       
      }else{
           redirect('Login/login');  
      }
    }

}

 ?>
