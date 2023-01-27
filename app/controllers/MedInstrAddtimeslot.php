<?php

class MedInstrAddtimeslot extends Controller{
    private $medInstrAddtimeslotModel; 
    public function __construct(){
    $this->medInstrAddtimeslotModel = $this->model('M_MedInstrAddtimeslot');
  }

  


  public function medInstrAddtimeslot()
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
  
        $data = [
          'month'=>trim($_POST['month']),
          'day'=>trim($_POST['day']),      
          'starting_time'=>trim($_POST['starting_time']),
          'ending_time'=>trim($_POST['ending_time']),      
          'fee'=>trim($_POST['fee']),
          'address'=>trim($_POST['address']),      
        

          
          'month_err'=>'',
          'day_err'=>'',
          'starting_time_err'=>'',
          'ending_time_err'=>'',
          'fee_err'=>'',
          'address_err'=>''

        ];      
         
        if(empty($data['month'])){
          $data['month_err']='Please select a month';
        }

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
          $data['fee_err']='Please enyer a fee';
        }

        if(empty($data['address'])){
           $data['address_err']='Please enter a address';
        } 
        
        $month=trim($_POST['month']);
        $day=trim($_POST['day']);      
       
        $current_month= date("m");
        $current_year= date("Y");
      
        $y=date("Y", strtotime("first {$day}.{$month}"));
        $m=date("m", strtotime("first {$day}.{$month}"));
      
      
       if($m<=$current_month && $y==$current_year){
         $data['month_err']='recheck month';
         
       }
        
         $first_rel_day= date("d", strtotime("first {$day}.{$month}"));
         $last_day= date("d",strtotime("last day of {$month}", time()));
      
         if(empty($data['month_err']) && empty($data['day_err']) && empty($data['starting_time_err']) && empty($data['ending_time_err']) && empty($data['fee_err']) && empty($data['address_err'])){
 
            $addmedTimeslot=$this->medInstrAddtimeslotModel->medInstraddtimeslot($_SESSION['MedInstr_id'],$first_rel_day,$last_day,$y,$m,$data);

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
        'month'=>'',
        'day'=>'',      
        'starting_time'=>'',
        'ending_time'=>'',      
        'fee'=>$_SESSION['MedInstr_fee'],
        'address'=>$_SESSION['MedInstr_address'],      
      

        
        'month_err'=>'',
        'day_err'=>'',
        'starting_time_err'=>'',
        'ending_time_err'=>'',
        'fee_err'=>'',
        'address_err'=>''

      
      ];
       $this->view('MedInstr/MedInstrAddtimeslot/v_medInstrAddtimeslot',$data);     
    }
    
  }else{
    redirect('Login/login');  
  }
  
  }

  

}

 ?>
