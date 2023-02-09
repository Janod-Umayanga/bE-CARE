<?php

   class M_MedInstrAddtimeslot{
      private $db;

      public function __construct()
      {
        $this->db=new Database();
       

      }

      public function medInstraddtimeslot($id,$first_rel_day,$last_day,$y,$m,$data)
      {
           
   
        while($first_rel_day<=$last_day){
            $newdate=$y."-".$m."-".$first_rel_day;
            $this->db->query('INSERT INTO med_timeslot(appointment_day,starting_time,ending_time,date,fee,address,meditation_instructor_id) 
            VALUES (:appointment_day,:starting_time,:ending_time,:date,:fee,:address,:meditation_instructor_id)');
            $this->db->bind(':appointment_day', $data['day']);
            $this->db->bind(':starting_time', $data['starting_time']);
            $this->db->bind(':ending_time', $data['ending_time']);
            $this->db->bind(':date', $newdate);
            $this->db->bind(':fee', $data['fee']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':meditation_instructor_id', $id);

            if($this->db->execute()){

             }else{
                 return false;
             }
     
   
            $first_rel_day=$first_rel_day+7;
           
        }

             return true;
        
      } 


     

}
?> 
    
    
    
   