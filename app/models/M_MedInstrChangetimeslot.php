<?php

   class M_MedInstrChangetimeslot{
      private $db;

      public function __construct()
      {
        $this->db=new Database();
       

      }

      public function medInstrtimeslot($id)
      {
        $current_date= date("Y-m-d");
        $this->db->query('SELECT * FROM med_timeslot WHERE meditation_instructor_id=:id AND date>=:current_date AND med_timeslot_id NOT IN (SELECT med_timeslot_id from med_channel) ORDER BY date ASC  ');
        $this->db->bind(':id', $id);
        $this->db->bind(':current_date', $current_date);  
        return $this->db->resultSet();
        
        
      
      } 


      public function searchMedInstrTimeslot($search,$id)
      {
        $current_date= date("Y-m-d");
         
        $this->db->query("SELECT * FROM med_timeslot WHERE meditation_instructor_id=:id AND date>=:current_date AND med_timeslot_id NOT IN (SELECT med_timeslot_id from med_channel) AND CONCAT(appointment_day,date,address,fee,starting_time,ending_time) LIKE '%$search%'");
        $this->db->bind(':id',$id);  
        $this->db->bind(':current_date',$current_date);  
      
        $result=$this->db->resultSet();
        return $result;
      } 
    
       
      public function  viewtimeslot($timeslot_id)
      {
         
        $this->db->query('SELECT * FROM med_timeslot WHERE med_timeslot_id=:id');
        $this->db->bind(':id',$timeslot_id);  
             
        $row=$this->db->single();
        return $row;
      } 
      
      public function updatetimeslot($data,$timeslot_id)
      {
        
        $this->db->query('UPDATE med_timeslot SET starting_time=:starting_time,ending_time=:ending_time,address=:address,fee=:fee WHERE med_timeslot_id=:med_timeslot_id');
        $this->db->bind(':starting_time', $data['starting_time']);
        $this->db->bind(':ending_time',$data['ending_time']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':fee', $data['fee']);
        $this->db->bind(':med_timeslot_id', $timeslot_id);
      

        if($this->db->execute()){
           return true;
        }else{
            return false;
        } 
      } 

     public function  deleteMedInstrChangeTimeslot($timeslot_id){
        $this->db->query('DELETE FROM med_timeslot WHERE med_timeslot_id=:id');
        $this->db->bind(':id',$timeslot_id);

        if($this->db->execute()){
           return true;
        }else{
            return false;
        } 
      }
}
?> 
    
    
    
   