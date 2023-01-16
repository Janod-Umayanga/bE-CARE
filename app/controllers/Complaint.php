<?php

class Complaint extends Controller{
  public function __construct(){
    $this->complaintModel = $this->model('M_Complaint');
  }

  public function complaint()
  {

  if($_SERVER["REQUEST_METHOD"] == 'POST'){
     $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
 
    $data=[                      
     'subject'=>trim($_POST['subject']),
     'description'=>trim($_POST['description']),
     'meditation_instructor_id'=>$_SESSION['MedInstr_id']
     
   ];

    $addcomplaint=$this->complaintModel->addComplaint($data);

    if($addcomplaint){
         flash('reg_flash', 'Complaint added successfully!');
         
         if(isset($_SESSION['MedInstr_id'])){
          $this->view('MedInstrDashBoard/v_medInstrDashBoard',$data);    
         
         }
            
    }else{
      $this->view('pages/v_complaint',$data);    
        
    }
    
   }
   
  else{
    $data=[                      
      'subject'=>'',
      'description'=>'',
      'meditation_instructor_id'=>''
    ];
    
    $this->view('pages/v_complaint',$data);    
    
  }  

  }

  
}

 ?>
