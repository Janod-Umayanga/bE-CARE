<?php

class Complaint extends Controller{
  private $complaintModel; 

  public function __construct(){
    $this->complaintModel = $this->model('M_Complaint');
  }


  //Complaint
  public function complaint()
  {

  if($_SERVER["REQUEST_METHOD"] == 'POST'){
     $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
 
    $data=[                      
     'subject'=>trim($_POST['subject']),
     'complaint'=>trim($_POST['complaint']),
     'usertype'=>trim($_POST['usertype']),

     'subject_err'=>'',
     'complaint_err'=>''
     
     
   ];

   if(empty($data['subject_err']) && empty($data['complaint_err'])){


    //Patient
        if($data['usertype']=='patient'){
          $id=$_SESSION['patient_id'];
          $addcomplaint=$this->complaintModel->addComplaintPatient($data,$id);
          if($addcomplaint){
            redirect('Pages/index',$data);  
          }else{
            $this->view('pages/v_complaint',$data);    
        }
     
    //Doctor
        }else if($data['usertype']=='doctor'){
          $id=$_SESSION['doctor_id'];
          $addcomplaint=$this->complaintModel->addComplaintDoctor($data,$id);
          if($addcomplaint){
            redirect('Doctor/dashboard',$data);  
          }else{
            $this->view('pages/v_complaint',$data);    
        }
    //Counsellor
        }else if($data['usertype']=='counsellor'){
         
          $id=$_SESSION['counsellor_id'];
          $addcomplaint=$this->complaintModel->addComplaintCounsellor($data,$id);
          if($addcomplaint){
              redirect('Counsellor/dashboard',$data);  
          }else{
            $this->view('pages/v_complaint',$data);    
        }
    //Meditation Instructor
        }else if($data['usertype']=='MedInstr'){
         
          $id=$_SESSION['MedInstr_id'];
          $addcomplaint=$this->complaintModel->addComplaintMedInstr($data,$id);
          if($addcomplaint){
             redirect('MedInstrDashBoard/medInstrDashBoard',$data);  
          }else{
            $this->view('pages/v_complaint',$data);    
        }
    //Nutritionist
        }else if($data['usertype']=='nutritionist'){
          
          $id=$_SESSION['nutritionist_id'];
          $addcomplaint=$this->complaintModel->addComplaintNutritionist($data,$id);
          if($addcomplaint){
            redirect('Nutritionist/nutritionistDashBoard',$data);  
          }else{
            $this->view('pages/v_complaint',$data);    
        }

    //Pharmacist    
        }else if($data['usertype']=='pharmacist'){
          
          $id=$_SESSION['pharmacist_id'];
          $addcomplaint=$this->complaintModel->addComplaintPharmacist($data,$id);
          if($addcomplaint){
            redirect('Pharmacist/pharmacistDashBoard',$data);  
          }else{
            $this->view('pages/v_complaint',$data);    
          }
        }

    
            
   }else{
      $this->view('pages/v_complaint',$data);  
    
   }  
   
  }else{
    $data=[                      
      'subject'=>'',
      'complaint'=>'',
      'meditation_instructor_id'=>'',

      
     'subject_err'=>'',
     'complaint_err'=>''
     
    ];
    
    $this->view('pages/v_complaint',$data);    
    
  }  

  

  
}

}

 ?>
