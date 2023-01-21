<?php

   class M_MedInstrRegisteredUsersHistory{
      private $db;

      public function __construct()
      {
        $this->db=new Database();
       

      }

      public function findmedInstrRegisteredUsersHistory($id)
      
      {
        $current_date= date("Y-m-d");
        $this->db->query('SELECT * FROM med_timeslot INNER JOIN med_channel ON med_timeslot.med_timeslot_id=med_channel.med_timeslot_id WHERE meditation_instructor_id=:id AND med_timeslot.date<:current_date ORDER BY med_timeslot.date DESC');
        $this->db->bind(':id',$id);  
        $this->db->bind(':current_date',$current_date);  
       

        $result=$this->db->resultSet();
        return $result;
      } 


       public function searchmedInstrRegisteredUsersHistory($search,$id)

      {
        $current_date= date("Y-m-d");
        $day='Saturday';
          
        $this->db->query("SELECT * FROM med_timeslot INNER JOIN med_channel ON med_timeslot.med_timeslot_id=med_channel.med_timeslot_id WHERE meditation_instructor_id=:id AND med_timeslot.date<:current_date AND CONCAT(appointment_day,date,address,starting_time,ending_time,name) LIKE '%$search%'");
        $this->db->bind(':id',$id);  
        $this->db->bind(':current_date',$current_date);  
       
        $result=$this->db->resultSet();
        return $result;
      } 

     
      
      public function  viewMoremedInstrRegisteredUserHistory($med_timeslot_id)
      {
          
        $this->db->query("SELECT * FROM med_timeslot INNER JOIN med_channel ON med_timeslot.med_timeslot_id=med_channel.med_timeslot_id WHERE med_timeslot.med_timeslot_id=:medtimeslotid");
        $this->db->bind(':medtimeslotid',$med_timeslot_id);  
          
       
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
  
      } 

}
?> 
    
    
    
   