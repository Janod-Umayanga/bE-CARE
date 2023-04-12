<?php

   class M_MedInstrChangetimeslot{
      private $db;

      public function __construct()
      {
        $this->db=new Database();
       

      }

      public function medInstrtimeslot($id)
      {
       
        $this->db->query('SELECT * FROM med_timeslot WHERE meditation_instructor_id=:id');
        $this->db->bind(':id', $id);
        return $this->db->resultSet();
        
        
      
      } 

      
      public function medInstrappointmentday($id)
      {
        $current_timestamp = time();
        $this->db->query('SELECT * FROM med_ins_appointment_day WHERE meditation_instructor_id=:id AND CONCAT(date, " ", starting_time) > FROM_UNIXTIME(:current_timestamp) AND med_ins_appointment_day_id NOT IN (SELECT med_ins_appointment_day_id from med_ins_register) ORDER BY date ASC  ');
        $this->db->bind(':id', $id);
        $this->db->bind(':current_timestamp', $current_timestamp);
        return $this->db->resultSet();
       
                 
      }  

      public function  medInstrdisableappointmentday($appointment_day_id)
      {
            $this->db->query('UPDATE med_ins_appointment_day SET active=:active WHERE med_ins_appointment_day_id=:med_ins_appointment_day_id');
            $this->db->bind(':active', 0);
            $this->db->bind(':med_ins_appointment_day_id', $appointment_day_id);
          

            if($this->db->execute()){
               return true;
            }else{
                return false;
            } 
        
      }  
     
      public function  medInstrenableappointmentday($appointment_day_id)
      {
            $this->db->query('UPDATE med_ins_appointment_day SET active=:active WHERE med_ins_appointment_day_id=:med_ins_appointment_day_id');
            $this->db->bind(':active',1);
            $this->db->bind(':med_ins_appointment_day_id', $appointment_day_id);
          

            if($this->db->execute()){
               return true;
            }else{
                return false;
            } 
        
      }  

           
      public function  stopCreateRecurringTimeslot($timeslot_id)
      {
            $this->db->query('UPDATE med_timeslot SET continue_flag=:continue_flag WHERE med_timeslot_id=:med_timeslot_id');
            $this->db->bind(':continue_flag',0);
            $this->db->bind(':med_timeslot_id', $timeslot_id);
          

            if($this->db->execute()){
               return true;
            }else{
                return false;
            } 
        
      }  


      public function  createRecurringTimeslot($timeslot_id)
      {
            $this->db->query('UPDATE med_timeslot SET continue_flag=:continue_flag WHERE med_timeslot_id=:med_timeslot_id');
            $this->db->bind(':continue_flag',1);
            $this->db->bind(':med_timeslot_id', $timeslot_id);
          

            if($this->db->execute()){
               return true;
            }else{
                return false;
            } 
        
      }  


      public function searchMedInstrTimeslot($search,$id)
      {
         
        $this->db->query("SELECT * FROM med_timeslot WHERE meditation_instructor_id=:id  AND CONCAT(appointment_day,starting_time,ending_time) LIKE '%$search%'");
        $this->db->bind(':id',$id);  
           
        $result=$this->db->resultSet();
        return $result;
      } 
    
       
      public function  viewappointmentday($appointment_day_id)
      {
         
        $this->db->query('SELECT * FROM med_ins_appointment_day WHERE med_ins_appointment_day_id=:id');
        $this->db->bind(':id',$appointment_day_id);  
             
        $row=$this->db->single();
        return $row;
      } 
      

   
      public function  viewtimeslot($timeslot_id)
     {
       
        $this->db->query('SELECT * FROM med_timeslot WHERE med_timeslot_id=:id');
        $this->db->bind(':id',$timeslot_id);  
             
        $row=$this->db->single();
        return $row;
      } 


      public function updateappointmentday($data,$appointment_day_id)
      {
        
        $this->db->query('UPDATE med_ins_appointment_day SET starting_time=:starting_time,ending_time=:ending_time,address=:address,fee=:fee,noOfParticipants=:noOfParticipants WHERE med_ins_appointment_day_id=:med_ins_appointment_day_id');
        $this->db->bind(':starting_time', $data['starting_time']);
        $this->db->bind(':ending_time',$data['ending_time']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':fee', $data['fee']);
        $this->db->bind(':noOfParticipants', $data['noOfParticipants']);
        $this->db->bind(':med_ins_appointment_day_id', $appointment_day_id);
      

        if($this->db->execute()){
           return true;
        }else{
            return false;
        } 
      } 

      public function updateTimeslot($data,$timeslot_id)
      {
        
        $this->db->query('UPDATE med_timeslot SET starting_time=:starting_time,ending_time=:ending_time,address=:address,fee=:fee,noOfParticipants=:noOfParticipants WHERE med_timeslot_id=:med_timeslot_id');
        $this->db->bind(':starting_time', $data['starting_time']);
        $this->db->bind(':ending_time',$data['ending_time']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':fee', $data['fee']);
        $this->db->bind(':noOfParticipants', $data['noOfParticipants']);
        $this->db->bind(':med_timeslot_id', $timeslot_id);
      

        if($this->db->execute()){
           return true;
        }else{
            return false;
        } 
      } 

     
      public function getChannelingDays($med_timeslot_id,$day, $starting_time,$ending_time,$fee,$address,$noOfParticipants, $meditation_instructor_id) {
      
        $current_timestamp = time();

        $this->db->query('SELECT * FROM med_ins_appointment_day WHERE med_timeslot_id = :med_timeslot_id AND CONCAT(date, " ", starting_time) > FROM_UNIXTIME(:current_timestamp)');
        $this->db->bind(':med_timeslot_id', $med_timeslot_id);
        $this->db->bind(':current_timestamp', $current_timestamp);
        

        $days_to_add_count = 0;

        $rows = $this->db->resultSet();
        if($this->db->rowCount() < 4) {
            $days_to_add_count = 4 - $this->db->rowCount();
            return $this->createAppointmentDays($day, $starting_time,$ending_time,$fee,$address,$noOfParticipants, $meditation_instructor_id,$med_timeslot_id, $days_to_add_count);
        }
        else {
            return true;
        }
    }
    
      // create channel days
      public function createAppointmentDays($day, $starting_time,$ending_time,$fee,$address,$noOfParticipants, $meditation_instructor_id,$timeslot_id, $days_to_add_count) {
        $count = 0;
        foreach (range(1, $days_to_add_count) as $i) {
            if($i==4) {
                $mod_string = 'next '.$day;
            }
            if($i==3) {
                $mod_string = 'second '.$day;
            }
            if($i==2) {
                $mod_string = 'third '.$day;
            }
            if($i==1) {
                $mod_string = 'fourth '.$day;
            }
            $appointment_day = new DateTime();
            $appointment_day->modify($mod_string);
            $this->db->query('INSERT INTO med_ins_appointment_day (date, day,active,starting_time,ending_time,fee, address,noOfParticipants, med_timeslot_id, meditation_instructor_id) VALUES (:date,:day, :active, :starting_time,:ending_time,:fee, :address,:noOfParticipants,:med_timeslot_id, :meditation_instructor_id)');
            $this->db->bind(':date', $appointment_day->format('Y-m-d'));
            $this->db->bind(':day', $day);
            $this->db->bind(':active', 1);
            $this->db->bind(':starting_time', $starting_time);
            $this->db->bind(':ending_time', $ending_time);
            $this->db->bind(':fee', $fee);
            $this->db->bind(':address', $address);
            $this->db->bind(':noOfParticipants', $noOfParticipants);
            $this->db->bind(':med_timeslot_id', $timeslot_id);
            $this->db->bind(':meditation_instructor_id', $meditation_instructor_id);
          

            if($this->db->execute()) {
                $count = $count + 1;
            }
        }
        if($count == $days_to_add_count) {
            return true;
        }
        else {
            return false;
        }
    }

   
}
?> 
    
    
    
   