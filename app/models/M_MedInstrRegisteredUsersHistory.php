<?php
 
   class M_MedInstrRegisteredUsersHistory{
      private $db;

      public function __construct()
      {
        $this->db=new Database();
      }

      //find medInstr Registered Users History
      public function findmedInstrRegisteredUsersHistory($id)
      {
        $current_date= date("Y-m-d");
        $this->db->query('SELECT * FROM med_ins_appointment_day INNER JOIN med_ins_register ON med_ins_appointment_day.med_ins_appointment_day_id=med_ins_register.med_ins_appointment_day_id WHERE med_ins_register.meditation_instructor_id=:id AND med_ins_appointment_day.date<:current_date ORDER BY med_ins_appointment_day.date DESC');
        $this->db->bind(':id',$id);  
        $this->db->bind(':current_date',$current_date);  
       

        $result=$this->db->resultSet();
        return $result;
      } 

       //search medInstr Registered Users History  
       public function searchmedInstrRegisteredUsersHistory($search,$id)
      {
        $current_date= date("Y-m-d");
        $day='Saturday';
          
        $this->db->query("SELECT * FROM med_ins_appointment_day INNER JOIN med_ins_register ON med_ins_appointment_day.med_ins_appointment_day_id=med_ins_register.med_ins_appointment_day_id WHERE med_ins_register.meditation_instructor_id=:id AND med_ins_appointment_day.date<:current_date AND CONCAT(day,date,address,starting_time,ending_time,name) LIKE '%$search%'");
        $this->db->bind(':id',$id);  
        $this->db->bind(':current_date',$current_date);  
       
        $result=$this->db->resultSet();
        return $result;
      } 

     
      //view More MedInstr Registered User History   
      public function  viewMoremedInstrRegisteredUserHistory($med_ins_appointment_day_id)
      {
        $this->db->query("SELECT * FROM med_ins_appointment_day INNER JOIN med_ins_register ON med_ins_appointment_day.med_ins_appointment_day_id=med_ins_register.med_ins_appointment_day_id WHERE med_ins_appointment_day.med_ins_appointment_day_id=:id");
        $this->db->bind(':id',$med_ins_appointment_day_id);  
          
       
        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
  
      } 

}
?> 
    
    
    
   