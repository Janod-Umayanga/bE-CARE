<?php

class AdminComplaintMgmt extends Controller{
  
  public function __construct(){
    $this->adminComplaintMgmtModel = $this->model('M_AdminComplaintMgmt');
  }

  public function adminComplaintMgmt()
  {
    if(isset($_SESSION['admin_id'])) {
  
      $complaint= $this->adminComplaintMgmtModel->getAllComplaint();
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
      $this->view('AdminComplaintMgmt/v_complaintMgmt',$data);
    }else{
       redirect('Admin/login');  
    }
   }

   public function viewMore($complaintId){

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
      $this->view('AdminComplaintMgmt/v_complaintMgmtViewMore',$data);
   
    }
    }else{
        redirect('Admin/login');  
    }
   
   } 



}

 ?>
