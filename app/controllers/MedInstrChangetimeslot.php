<?php

class MedInstrChangetimeslot extends Controller{
    private $medInstrChangetimeslotModel;
    
    public function __construct(){
    $this->medInstrChangetimeslotModel = $this->model('M_MedInstrChangetimeslot');
  }


  //Med Instr Changetimeslot
  public function medInstrChangetimeslot()
  {
  
   if(isset($_SESSION['MedInstr_id'])) {  
   
   $timeslot= $this->medInstrChangetimeslotModel->medInstrtimeslot($_SESSION['MedInstr_id']);
  
    
   foreach($timeslot AS $slot){

     //check timeslot is recurring
     if($slot->continue_flag==1){

        // if timeslot is recurring set upcomming 4 weeks.
        $this->medInstrChangetimeslotModel->getChannelingDays($slot->med_timeslot_id,$slot->appointment_day, $slot->starting_time,$slot->ending_time,$slot->fee,$slot->address,$slot->noOfParticipants, $slot->meditation_instructor_id);
      }


   }
  
    $appointmentday= $this->medInstrChangetimeslotModel->medInstrappointmentday($_SESSION['MedInstr_id']);
  
    $data=[                      
     'timeslot'=>$timeslot,
     'appointmentday'=>$appointmentday,
     'search'=>''
   ];
  
   $this->view('MedInstr/MedInstrChangetimeslot/v_medInstrChangetimeslot',$data);
  
  }else{
    redirect('Login/login');  
  }

  }

  //search MedInstr Change Timeslot
  public function  searchMedInstrChangeTimeslot()
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
  
          $search=trim($_GET['search']);
          
          $timeslot= $this->medInstrChangetimeslotModel->searchMedInstrTimeslot($search,$_SESSION['MedInstr_id']);
          $appointmentday= $this->medInstrChangetimeslotModel->medInstrappointmentday($_SESSION['MedInstr_id']);
         
          $data=[                      
            'timeslot'=>$timeslot,
            'appointmentday'=>$appointmentday,
            'search'=>$search
          ];
         $this->view('MedInstr/MedInstrChangetimeslot/v_medInstrChangetimeslot',$data);
   
      
     }
      }else{
        redirect('Login/login');  
      }
  }

  //Update Appointment Day
  public function updateAppointmentDay($appointment_day_id)
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
  
        $data = [
          'date'=>trim($_POST['date']),
          'starting_time'=>trim($_POST['starting_time']),
          'ending_time'=>trim($_POST['ending_time']),      
          'fee'=>trim($_POST['fee']),
          'address'=>trim($_POST['address']), 
          'noOfParticipants'=>trim($_POST['noOfParticipants']),     
          'meditation_instructor_id'=>$_SESSION['MedInstr_id'],      
          'appointment_day_id'=>$appointment_day_id,          
  
          'date_err'=>'',
          'starting_time_err'=>'',
          'ending_time_err'=>'',
          'fee_err'=>'',
          'address_err'=>'',
          'noOfParticipants_err'=>''

         ];      
         
         
        if(empty($data['date'])){
          $data['date_err']='Please enter a date';
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
          $data['noOfParticipants_err']='Please enter a no Of Participants';
       }else if(validateMaxParticipants($data['noOfParticipants'])!="true"){
        $data['noOfParticipants_err']=validateMaxParticipants($data['noOfParticipants']);
       } 
       

        if(empty($data['date_err']) && empty($data['starting_time_err']) && empty($data['ending_time_err']) && empty($data['fee_err']) && empty($data['address_err']) && empty($data['noOfParticipants_err']) ){
 
            $updateappointment=$this->medInstrChangetimeslotModel->updateappointmentday($data,$appointment_day_id);
       
         if($updateappointment){
             $this->view('MedInstr/MedInstrChangetimeslot/v_medInstrUpdateappointment',$data); 
           }
           else{
            $this->view('MedInstr/MedInstrChangetimeslot/v_medInstrUpdateappointment',$data);
           }   
        }else{
          $this->view('MedInstr/MedInstrChangetimeslot/v_medInstrUpdateappointment',$data);
        } 
      }
  }else{
    redirect('Login/login');  
  }
  }

 
    //view Appointment Day
    public function viewAppointmentDay($appointment_day_id)
    {
      if(isset($_SESSION['MedInstr_id'])) {  
  
      $appointment=$this->medInstrChangetimeslotModel->viewappointmentday($appointment_day_id);
           // $_SESSION['Med_Instr_timeslot_id']=$appointment_day_id;
            
            $data = [
              'date'=>$appointment->date,
              'day'=>$appointment->day,
              'starting_time'=>$appointment->starting_time,
              'ending_time'=>$appointment->ending_time,      
              'fee'=>$appointment->fee,
              'address'=>$appointment->address,
              'noOfParticipants'=>$appointment->noOfParticipants,      
              'meditation_instructor_id'=>$_SESSION['MedInstr_id'],      
              'appointment_day_id'=>$appointment_day_id,
              
              'date_err'=>'',
              'day_err'=>'',
              'starting_time_err'=>'',
              'ending_time_err'=>'',
              'fee_err'=>'',
              'address_err'=>'',
              'noOfParticipants_err'=>'',
              
            
            ];
            $this->view('MedInstr/MedInstrChangetimeslot/v_medInstrUpdateappointment',$data);
        
          }else{
            redirect('Login/login');  
          }
    } 
        
    //view Timeslot
    public function viewTimeslot($timeslot_id)
    {
      if(isset($_SESSION['MedInstr_id'])) {  
  
      $timeslot=$this->medInstrChangetimeslotModel->viewtimeslot($timeslot_id);
           // $_SESSION['Med_Instr_timeslot_id']=$timeslot_id;
            
            $data = [
             
              'appointment_day'=>$timeslot->appointment_day,
              'starting_time'=>$timeslot->starting_time,
              'ending_time'=>$timeslot->ending_time,      
              'fee'=>$timeslot->fee,
              'address'=>$timeslot->address,
              'noOfParticipants'=>$timeslot->noOfParticipants,      
              'meditation_instructor_id'=>$_SESSION['MedInstr_id'],      
              'timeslot_id'=>$timeslot_id,
              
              'appointment_day_err'=>'',
              'starting_time_err'=>'',
              'ending_time_err'=>'',
              'fee_err'=>'',
              'address_err'=>'',
              'noOfParticipants_err'=>'',
              
            
            ];
            $this->view('MedInstr/MedInstrChangetimeslot/v_medInstrUpdatetimeslot',$data);
        
          }else{
            redirect('Login/login');  
          }
    } 
    

   //Disable Appointment Day
    public function disableAppointmentDay($appointment_day_id)
    {
          
      if(isset($_SESSION['MedInstr_id'])) {  
      
        $this->medInstrChangetimeslotModel->medInstrdisableappointmentday($appointment_day_id);
        $timeslot= $this->medInstrChangetimeslotModel->medInstrtimeslot($_SESSION['MedInstr_id']);
        $appointmentday= $this->medInstrChangetimeslotModel->medInstrappointmentday($_SESSION['MedInstr_id']);
        
        $data=[                      
          'timeslot'=>$timeslot,
          'appointmentday'=>$appointmentday,
          'search'=>''
        ];
        $this->view('MedInstr/MedInstrChangetimeslot/v_medInstrChangetimeslot',$data);
      }else{
        redirect('Login/login');  
      }
 

    } 

    //Enable Appointment Day
    public function enableAppointmentDay($appointment_day_id)
    {
          
      if(isset($_SESSION['MedInstr_id'])) {  
      
        $this->medInstrChangetimeslotModel->medInstrenableappointmentday($appointment_day_id);
        $timeslot= $this->medInstrChangetimeslotModel->medInstrtimeslot($_SESSION['MedInstr_id']);
        $appointmentday= $this->medInstrChangetimeslotModel->medInstrappointmentday($_SESSION['MedInstr_id']);
        
        $data=[                      
          'timeslot'=>$timeslot,
          'appointmentday'=>$appointmentday,
          'search'=>''
        ];
        $this->view('MedInstr/MedInstrChangetimeslot/v_medInstrChangetimeslot',$data);
      }else{
        redirect('Login/login');  
      }
 

    } 

    //Stop Creating Recurring Timeslot
    public function stopCreatingRecurringTimeslot($appointment_day_id)
    {
          
      if(isset($_SESSION['MedInstr_id'])) {  
      
        $this->medInstrChangetimeslotModel->stopCreateRecurringTimeslot($appointment_day_id);
        $timeslot= $this->medInstrChangetimeslotModel->medInstrtimeslot($_SESSION['MedInstr_id']);
        $appointmentday= $this->medInstrChangetimeslotModel->medInstrappointmentday($_SESSION['MedInstr_id']);
        
        $data=[                      
          'timeslot'=>$timeslot,
          'appointmentday'=>$appointmentday,
          'search'=>''
        ];
        $this->view('MedInstr/MedInstrChangetimeslot/v_medInstrChangetimeslot',$data);
      }else{
        redirect('Login/login');  
      }
 

    } 
 
    //creating Recurring Timeslot
    public function creatingRecurringTimeslot($appointment_day_id)
    {
          
      if(isset($_SESSION['MedInstr_id'])) {  
      
        $this->medInstrChangetimeslotModel->createRecurringTimeslot($appointment_day_id);
        $timeslot= $this->medInstrChangetimeslotModel->medInstrtimeslot($_SESSION['MedInstr_id']);
        $appointmentday= $this->medInstrChangetimeslotModel->medInstrappointmentday($_SESSION['MedInstr_id']);
        
        $data=[                      
          'timeslot'=>$timeslot,
          'appointmentday'=>$appointmentday,
          'search'=>''
        ];
        $this->view('MedInstr/MedInstrChangetimeslot/v_medInstrChangetimeslot',$data);
      }else{
        redirect('Login/login');  
      }
 

    } 
    
  //Update Future Timeslot
public function updateFutureTimeslot($timeslot_id)
{
  if(isset($_SESSION['MedInstr_id'])) {  

  if($_SERVER["REQUEST_METHOD"] == 'POST'){
      $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

      $data = [
        'appointment_day'=>trim($_POST['appointment_day']),
        'starting_time'=>trim($_POST['starting_time']),
        'ending_time'=>trim($_POST['ending_time']),      
        'fee'=>trim($_POST['fee']),
        'address'=>trim($_POST['address']), 
        'noOfParticipants'=>trim($_POST['noOfParticipants']),     
        'meditation_instructor_id'=>$_SESSION['MedInstr_id'],      
        'appointment_day_id'=>$timeslot_id,          

        'appointment_day_err'=>'',
        'starting_time_err'=>'',
        'ending_time_err'=>'',
        'fee_err'=>'',
        'address_err'=>'',
        'noOfParticipants_err'=>''

       ];      
       
       
      if(empty($data['appointment_day'])){
        $data['appointment_day_err']='Please enter a appointment_day';
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
        $data['noOfParticipants_err']='Please enter a no Of Participants';
     }else if(validateMaxParticipants($data['noOfParticipants'])!="true"){
        $data['noOfParticipants_err']=validateMaxParticipants($data['noOfParticipants']);
      }
     
     

      if(empty($data['appointment_day_err']) && empty($data['starting_time_err']) && empty($data['ending_time_err']) && empty($data['fee_err']) && empty($data['address_err']) && empty($data['noOfParticipants_err']) ){

          $updateTimeslot=$this->medInstrChangetimeslotModel->updateTimeslot($data,$timeslot_id);
     
       if($updateTimeslot){
           $this->view('MedInstr/MedInstrChangetimeslot/v_medInstrUpdatetimeslot',$data); 
         }
         else{
          $this->view('MedInstr/MedInstrChangetimeslot/v_medInstrUpdatetimeslot',$data);
         }   
      }else{
        $this->view('MedInstr/MedInstrChangetimeslot/v_medInstrUpdatetimeslot',$data);
      } 
    }
}else{
  redirect('Login/login');  
}
}


}




 ?>
