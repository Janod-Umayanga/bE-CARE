<?php

class AdminComplaintMgmt extends Controller{
  
  public function __construct(){
    $this->adminComplaintMgmtModel = $this->model('M_AdminComplaintMgmt');
  }

  public function adminComplaintMgmt()
  {
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
   }

   public function viewMore($complaintId){
      $complaint= $this->adminComplaintMgmtModel->getComplaint($complaintId);
      
    $data=[                      
      'complaint'=>$complaint
      
       
    ];
    $this->view('AdminComplaintMgmt/v_complaintMgmtViewMore',$data);
 
   } 


}

 ?>
