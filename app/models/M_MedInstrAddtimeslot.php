<?php

   class M_MedInstrAddtimeslot{
      private $db;

      public function __construct()
      {
        $this->db=new Database();
       

      }

     // create timeslot

      public function medInstraddtimeslot($data,$meditation_instructor_id) {
          $this->db->query('INSERT INTO med_timeslot (appointment_day, starting_time, ending_time, fee, address,noOfParticipants,meditation_instructor_id,continue_flag) VALUES (:appointment_day, :starting_time, :ending_time, :fee, :address,:noOfParticipants, :meditation_instructor_id,:continue_flag)');
          $this->db->bind(':appointment_day', $data['day']);
          $this->db->bind(':starting_time', $data['starting_time']);
          $this->db->bind(':ending_time', $data['ending_time']);
          $this->db->bind(':fee', $data['fee']);
          $this->db->bind(':address', $data['address']);
          $this->db->bind(':noOfParticipants', $data['noOfParticipants']);
          $this->db->bind(':meditation_instructor_id', $meditation_instructor_id);
          $this->db->bind(':continue_flag', 1);

          if($this->db->execute()) {

              $timeslot = $this->getTheLatestTimeslot($meditation_instructor_id);
              return $this->createAppointmentDays($data['day'],$data['starting_time'] ,$data['ending_time'] ,$data['fee'] ,$data['address'] ,$data['noOfParticipants'] , $meditation_instructor_id, $timeslot->med_timeslot_id, 4);
          }
          else {
              return false;
          }
      }

      // create channel days
      public function createAppointmentDays($day, $starting_time,$ending_time,$fee,$address,$noOfParticipants, $meditation_instructor_id,$timeslot_id, $days_to_add_count) {
          $count = 0;
          
          foreach (range(1, $days_to_add_count) as $i) { //Range of numbers starting from 1 to $days_to_add_count
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

              //creates a DateTime object representing the current date and time based on the  server's system clock.
              $appointment_day = new DateTime();
         
             //modify appointment_day
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

      //Get The Latest Timeslot
      public function getTheLatestTimeslot($meditation_instructor_id) {
          $this->db->query('SELECT * FROM med_timeslot WHERE meditation_instructor_id = :meditation_instructor_id ORDER BY med_timeslot_id DESC');
          $this->db->bind(':meditation_instructor_id', $meditation_instructor_id);

          return $this->db->single();
      }

     

}
?> 
    
    
    
   