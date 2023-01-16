<?php

class MedInstrAddtimeslot extends Controller{

    public function __construct(){
    $this->medInstrAddtimeslotModel = $this->model('M_MedInstrAddtimeslot');
  }

  


  public function medInstrAddtimeslot()
  {
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
          'day_err'=>''
         ];      
         
        if(empty($data['month'])){
          $data['month_err']='Please select a month';
        }

        if(empty($data['day'])){
           $data['day_err']='Please enter a day';
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
      
         if(empty($data['month_err']) && empty($data['day_err'])){
 
            $addmedTimeslot=$this->medInstrAddtimeslotModel->medInstraddtimeslot($_SESSION['MedInstr_id'],$first_rel_day,$last_day,$y,$m,$data);

         if($addmedTimeslot){
             $this->view('MedInstrAddtimeslot/v_medInstrAddtimeslot',$data);    
             
           }
           else{
            $this->view('MedInstrAddtimeslot/v_medInstrAddtimeslot',$data);
           }   
        }else{
          $this->view('MedInstrAddtimeslot/v_medInstrAddtimeslot',$data);
        } 
      }else{

      $data = [
        'month'=>'',
        'day'=>'',      
        'starting_time'=>'',
        'ending_time'=>'',      
        'fee'=>'',
        'address'=>'',      
        'meditation_instructor_id'=>'',      
      

        
        'month_err'=>'',
        'day_err'=>''
      
      ];
       $this->view('MedInstrAddtimeslot/v_medInstrAddtimeslot',$data);     
    } 
  }


}

 ?>
