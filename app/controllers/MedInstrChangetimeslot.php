<?php

class MedInstrChangetimeslot extends Controller{

    public function __construct(){
    $this->medInstrChangetimeslotModel = $this->model('M_MedInstrChangetimeslot');
  }

  
  public function medInstrChangetimeslot()
  {
   $timeslot= $this->medInstrChangetimeslotModel->medInstrtimeslot($_SESSION['MedInstr_id']);
   $data=[                      
     'timeslot'=>$timeslot,
     'search'=>''
   ];
   $this->view('MedInstrChangetimeslot/v_medInstrChangetimeslot',$data);


  }

  public function  searchMedInstrChangeTimeslot()
  {
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
  
          $search=trim($_GET['search']);
          
          $timeslot= $this->medInstrChangetimeslotModel->searchMedInstrTimeslot($search,$_SESSION['MedInstr_id']);
          $data=[                      
            'timeslot'=>$timeslot,
            'search'=>$search
         ];
         $this->view('MedInstrChangetimeslot/v_medInstrChangetimeslot',$data);
   
      
     }else{
          $data=[                      
            'timeslot'=>'',
            'search'=>''
          ];
          $this->view('MedInstrChangetimeslot/v_medInstrChangetimeslot',$data);
        }
  
  }

  public function updateMedInstrChangeTimeslot($timeslot_id)
  {
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
  
        $data = [
          'date'=>trim($_POST['date']),
          'starting_time'=>trim($_POST['starting_time']),
          'ending_time'=>trim($_POST['ending_time']),      
          'fee'=>trim($_POST['fee']),
          'address'=>trim($_POST['address']),      
          'meditation_instructor_id'=>$_SESSION['MedInstr_id'],      
          'timeslot_id'=>$_SESSION['Med_Instr_timeslot_id'],          

          
          'fee_err'=>'',
          'address_err'=>''
         ];      
         
        if(empty($data['fee'])){
          $data['fee_err']='Please enter a fee amount';
        }

        if(empty($data['address'])){
           $data['address_err']='Please enter a address';
        } 
        
         if(empty($data['fee_err']) && empty($data['address_err'])){
 
            $updateTimeslot=$this->medInstrChangetimeslotModel->updatetimeslot($data,$timeslot_id);

         if($updateTimeslot){
             $this->view('MedInstrChangetimeslot/v_medInstrUpdatetimeslot',$data); 
           }
           else{
            $this->view('MedInstrChangetimeslot/v_medInstrUpdatetimeslot',$data);
           }   
        }else{
          $this->view('MedInstrUpdatetimeslot/v_medInstrUpdatetimeslot',$data);
        } 
      }else{
      
      $data = [
        'date'=>'',
        'starting_time'=>'',
        'ending_time'=>'',      
        'fee'=>'',
        'address'=>'',      
        'meditation_instructor_id'=>'',      
        'timeslot_id'=>$_SESSION['Med_Instr_timeslot_id'],

        
        'fee_err'=>'',
        'address_err'=>''
    
      ];
       $this->view('MedInstrChangetimeslot/v_medInstrChangetimeslot',$data);     
    } 
  }

 

    public function medInstrViewtimeslot($timeslot_id)
    {
            $timeslot=$this->medInstrChangetimeslotModel->viewtimeslot($timeslot_id);
            $_SESSION['Med_Instr_timeslot_id']=$timeslot_id;
            
            $data = [
              'date'=>$timeslot->date,
              'starting_time'=>$timeslot->starting_time,
              'ending_time'=>$timeslot->ending_time,      
              'fee'=>$timeslot->fee,
              'address'=>$timeslot->address,      
              'meditation_instructor_id'=>$_SESSION['MedInstr_id'],      
              'timeslot_id'=>$timeslot_id  
            
            ];
            $this->view('MedInstrChangetimeslot/v_medInstrUpdatetimeslot',$data);
        

    } 
        
    
    public function deleteMedInstrChangeTimeslot($timeslot_id)
    {
            $deletetimeslot=$this->medInstrChangetimeslotModel->deleteMedInstrChangeTimeslot($timeslot_id);
            $timeslot= $this->medInstrChangetimeslotModel->medInstrtimeslot($_SESSION['MedInstr_id']);

            $data = [
            'timeslot'=>$timeslot,
            'search'=>''
            ];
        
            if($deletetimeslot==true){
                $this->view('MedInstrChangetimeslot/v_medInstrChangetimeslot',$data);
            }
          

    } 

    
}




 ?>
