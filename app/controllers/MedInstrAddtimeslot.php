<?php

class MedInstrAddtimeslot extends Controller{
    private $medInstrAddtimeslotModel; 

    public function __construct(){
         $this->medInstrAddtimeslotModel = $this->model('M_MedInstrAddtimeslot');
    }

  
 //Med Instr Add timeslot
  public function medInstrAddtimeslot()
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
  
        $data = [
          'day'=>trim($_POST['day']),      
          'starting_time'=>trim($_POST['starting_time']),
          'ending_time'=>trim($_POST['ending_time']),      
          'fee'=>trim($_POST['fee']),
          'address'=>trim($_POST['address']),      
          'noOfParticipants'=>trim($_POST['noOfParticipants']),      
        

          
          'day_err'=>'',
          'starting_time_err'=>'',
          'ending_time_err'=>'',
          'fee_err'=>'',
          'address_err'=>'',
          'noOfParticipants_err'=>''
          

        ];      
         
       
        if(empty($data['day'])){
           $data['day_err']='Please enter a day';
        } 

        if(empty($data['starting_time'])){
          $data['starting_time_err']='Please select a starting time';
        }

        if(empty($data['ending_time'])){
           $data['ending_time_err']='Please select ending time';
        } 

        if(empty($data['fee'])){
          $data['fee_err']='Please enter a fee';
        }else if(validateFee($data['fee'])!="true"){
          $data['fee_err']=validateFee($data['fee']);
         }
       

        if(empty($data['address'])){
           $data['address_err']='Please enter a address';
        }else if(validateAddress($data['address'])!="true"){
          $data['address_err']=validateAddress($data['address']);
        } 
       
        if(empty($data['noOfParticipants'])){
          $data['noOfParticipants_err']='Please enter no of Participants';
        }else if(validateMaxParticipants($data['noOfParticipants'])!="true"){
          $data['noOfParticipants_err']=validateMaxParticipants($data['noOfParticipants']);
        }
       

         if(empty($data['day_err']) && empty($data['starting_time_err']) && empty($data['ending_time_err']) && empty($data['fee_err']) && empty($data['address_err'])){
 
            $addmedTimeslot=$this->medInstrAddtimeslotModel->medInstraddtimeslot($data,$_SESSION['MedInstr_id']);

         if($addmedTimeslot){
             $this->view('MedInstr/MedInstrAddtimeslot/v_medInstrAddtimeslot',$data);    
             
           }
           else{
            $this->view('MedInstr/MedInstrAddtimeslot/v_medInstrAddtimeslot',$data);
           }   
        }else{
          $this->view('MedInstr/MedInstrAddtimeslot/v_medInstrAddtimeslot',$data);
        } 
      }else{

      $data = [
        'day'=>'',      
        'starting_time'=>'',
        'ending_time'=>'',      
        'fee'=>$_SESSION['MedInstr_fee'],
        'address'=>$_SESSION['MedInstr_address'],      
        'noOfParticipants'=>'',
          

        
        'day_err'=>'',
        'starting_time_err'=>'',
        'ending_time_err'=>'',
        'fee_err'=>'',
        'address_err'=>'',
        'noOfParticipants_err'=>''
          
      
      ];
       $this->view('MedInstr/MedInstrAddtimeslot/v_medInstrAddtimeslot',$data);     
    }
    
  }else{
    redirect('Login/login');  
  }
  
  }

  

}

 ?>
