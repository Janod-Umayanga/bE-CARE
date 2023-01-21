<?php

   class M_MedInstrRegisteredUsers{
      private $db;

      public function __construct()
      {
        $this->db=new Database();
       

      }

      public function findRegUsersMonday($id)
      {
        $current_date= date("Y-m-d");
        $day='Monday';
        $this->db->query('SELECT COUNT(date) AS d1 FROM med_timeslot WHERE meditation_instructor_id=:id AND date>=:current_date AND appointment_day=:day');
        $this->db->bind(':id',$id);  
        $this->db->bind(':current_date',$current_date);  
        $this->db->bind(':day',$day);  


        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 

      public function findRegUsersTuesday($id)
      {
        $current_date= date("Y-m-d");
        $day='Tuesday';
        $this->db->query('SELECT COUNT(date) AS d2 FROM med_timeslot WHERE meditation_instructor_id=:id AND date>=:current_date AND appointment_day=:day');
        $this->db->bind(':id',$id);  
        $this->db->bind(':current_date',$current_date);  
        $this->db->bind(':day',$day);  


        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 

      
      public function findRegUsersWednesday($id)
      {
        $current_date= date("Y-m-d");
        $day='Wednesday';
        $this->db->query('SELECT COUNT(date) AS d3 FROM med_timeslot WHERE meditation_instructor_id=:id AND date>=:current_date AND appointment_day=:day');
        $this->db->bind(':id',$id);  
        $this->db->bind(':current_date',$current_date);  
        $this->db->bind(':day',$day);  


        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 

      public function findRegUsersThursday($id)
      {
        $current_date= date("Y-m-d");
        $day='Thursday';
        $this->db->query('SELECT COUNT(date) AS d4 FROM med_timeslot WHERE meditation_instructor_id=:id AND date>=:current_date AND appointment_day=:day');
        $this->db->bind(':id',$id);  
        $this->db->bind(':current_date',$current_date);  
        $this->db->bind(':day',$day);  


        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 

      public function findRegUsersFriday($id)
      {
        $current_date= date("Y-m-d");
        $day='Friday';
        $this->db->query('SELECT COUNT(date) AS d5 FROM med_timeslot WHERE meditation_instructor_id=:id AND date>=:current_date AND appointment_day=:day');
        $this->db->bind(':id',$id);  
        $this->db->bind(':current_date',$current_date);  
        $this->db->bind(':day',$day);  


        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 
   
      public function findRegUsersSaturday($id)
      {
        $current_date= date("Y-m-d");
        $day='Saturday';
        $this->db->query('SELECT COUNT(date) AS d6 FROM med_timeslot WHERE meditation_instructor_id=:id AND date>=:current_date AND appointment_day=:day');
        $this->db->bind(':id',$id);  
        $this->db->bind(':current_date',$current_date);  
        $this->db->bind(':day',$day);  


        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      } 
   
      public function findRegUsersSunday($id)
      {
        $current_date= date("Y-m-d");
        $day='Sunday';
        $this->db->query('SELECT COUNT(date) AS d7 FROM med_timeslot WHERE meditation_instructor_id=:id AND date>=:current_date AND appointment_day=:day');
        $this->db->bind(':id',$id);  
        $this->db->bind(':current_date',$current_date);  
        $this->db->bind(':day',$day);  


        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }

    } 

    public function findAllRegUsersMonday($id)
    {
      $current_date= date("Y-m-d");
      $day='Monday';
      $this->db->query('SELECT * FROM med_timeslot  WHERE meditation_instructor_id=:id AND  date>=:current_date AND appointment_day=:day ORDER BY date ASC');
      $this->db->bind(':id',$id);  
      $this->db->bind(':current_date',$current_date);  
      $this->db->bind(':day',$day);  


      $result=$this->db->resultSet();
         return $result;


   } 


   public function findAllRegUsersTuesday($id)
   {
     $current_date= date("Y-m-d");
     $day='Tuesday';
     $this->db->query('SELECT * FROM med_timeslot  WHERE meditation_instructor_id=:id AND  date>=:current_date AND appointment_day=:day ORDER BY date ASC');
     $this->db->bind(':id',$id);  
     $this->db->bind(':current_date',$current_date);  
     $this->db->bind(':day',$day);  


     $result=$this->db->resultSet();
        return $result;


   }
   
   public function findAllRegUsersWednesday($id)
   {
     $current_date= date("Y-m-d");
     $day='Wednesday';
     $this->db->query('SELECT * FROM med_timeslot  WHERE meditation_instructor_id=:id AND  date>=:current_date AND appointment_day=:day ORDER BY date ASC');
     $this->db->bind(':id',$id);  
     $this->db->bind(':current_date',$current_date);  
     $this->db->bind(':day',$day);  


     $result=$this->db->resultSet();
        return $result;


  } 

  public function findAllRegUsersThursday($id)
  {
    $current_date= date("Y-m-d");
    $day='Thursday';
    $this->db->query('SELECT * FROM med_timeslot  WHERE meditation_instructor_id=:id AND  date>=:current_date AND appointment_day=:day ORDER BY date ASC');
    $this->db->bind(':id',$id);  
    $this->db->bind(':current_date',$current_date);  
    $this->db->bind(':day',$day);  


    $result=$this->db->resultSet();
       return $result;


 } 


 public function findAllRegUsersFriday($id)
 {
   $current_date= date("Y-m-d");
   $day='Friday';
   $this->db->query('SELECT * FROM med_timeslot  WHERE meditation_instructor_id=:id AND  date>=:current_date AND appointment_day=:day ORDER BY date ASC');
   $this->db->bind(':id',$id);  
   $this->db->bind(':current_date',$current_date);  
   $this->db->bind(':day',$day);  


   $result=$this->db->resultSet();
      return $result;


} 


public function findAllRegUsersSaturday($id)
{
  $current_date= date("Y-m-d");
  $day='Saturday';
  $this->db->query('SELECT * FROM med_timeslot  WHERE meditation_instructor_id=:id AND  date>=:current_date AND appointment_day=:day ORDER BY date ASC');
  $this->db->bind(':id',$id);  
  $this->db->bind(':current_date',$current_date);  
  $this->db->bind(':day',$day);  


  $result=$this->db->resultSet();
     return $result;


} 


public function findAllRegUsersSunday($id)
{
  $current_date= date("Y-m-d");
  $day='Sunday';
  $this->db->query('SELECT * FROM med_timeslot  WHERE meditation_instructor_id=:id AND  date>=:current_date AND appointment_day=:day ORDER BY date ASC');
  $this->db->bind(':id',$id);  
  $this->db->bind(':current_date',$current_date);  
  $this->db->bind(':day',$day);  


  $result=$this->db->resultSet();
     return $result;


} 

public function  findmedChannelDetails()
{
      
    $this->db->query('SELECT * FROM med_channel ');
  
    $result=$this->db->resultSet();
    return $result;
} 


public function searchAllRegUsersMonday($search,$id)
{
  $current_date= date("Y-m-d");
  $day='Monday';
    
  $this->db->query("SELECT * FROM med_timeslot WHERE meditation_instructor_id=:id AND date>= :current_date AND appointment_day=:day AND CONCAT(appointment_day,date,address, fee) LIKE '%$search%'");
  $this->db->bind(':id',$id);  
  $this->db->bind(':current_date',$current_date);  
  $this->db->bind(':day',$day);  


  $result=$this->db->resultSet();
   return $result;
} 


public function searchAllRegUsersTuesday($search,$id)
{
  $current_date= date("Y-m-d");
  $day='Tuesday';
    
  $this->db->query("SELECT * FROM med_timeslot WHERE meditation_instructor_id=:id AND date>= :current_date AND appointment_day=:day AND CONCAT(appointment_day,date,address, fee) LIKE '%$search%'");
  $this->db->bind(':id',$id);  
  $this->db->bind(':current_date',$current_date);  
  $this->db->bind(':day',$day);  


  $result=$this->db->resultSet();
   return $result;
} 



public function searchAllRegUsersWednesday($search,$id)
{
  $current_date= date("Y-m-d");
  $day='Wednesday';
    
  $this->db->query("SELECT * FROM med_timeslot WHERE meditation_instructor_id=:id AND date>= :current_date AND appointment_day=:day AND CONCAT(appointment_day,date,address, fee) LIKE '%$search%'");
  $this->db->bind(':id',$id);  
  $this->db->bind(':current_date',$current_date);  
  $this->db->bind(':day',$day);  


  $result=$this->db->resultSet();
   return $result;
} 




public function searchAllRegUsersThursday($search,$id)
{
  $current_date= date("Y-m-d");
  $day='Thursday';
    
  $this->db->query("SELECT * FROM med_timeslot WHERE meditation_instructor_id=:id AND date>= :current_date AND appointment_day=:day AND CONCAT(appointment_day,date,address, fee) LIKE '%$search%'");
  $this->db->bind(':id',$id);  
  $this->db->bind(':current_date',$current_date);  
  $this->db->bind(':day',$day);  


  $result=$this->db->resultSet();
   return $result;
} 



public function searchAllRegUsersFriday($search,$id)
{
  $current_date= date("Y-m-d");
  $day='Friday';
    
  $this->db->query("SELECT * FROM med_timeslot WHERE meditation_instructor_id=:id AND date>= :current_date AND appointment_day=:day AND CONCAT(appointment_day,date,address, fee) LIKE '%$search%'");
  $this->db->bind(':id',$id);  
  $this->db->bind(':current_date',$current_date);  
  $this->db->bind(':day',$day);  


  $result=$this->db->resultSet();
   return $result;
} 



public function searchAllRegUsersSaturday($search,$id)
{
  $current_date= date("Y-m-d");
  $day='Saturday';
    
  $this->db->query("SELECT * FROM med_timeslot WHERE meditation_instructor_id=:id AND date>= :current_date AND appointment_day=:day AND CONCAT(appointment_day,date,address, fee) LIKE '%$search%'");
  $this->db->bind(':id',$id);  
  $this->db->bind(':current_date',$current_date);  
  $this->db->bind(':day',$day);  


  $result=$this->db->resultSet();
   return $result;
} 



public function searchAllRegUsersSunday($search,$id)
{
  $current_date= date("Y-m-d");
  $day='Sunday';
    
  $this->db->query("SELECT * FROM med_timeslot WHERE meditation_instructor_id=:id AND date>= :current_date AND appointment_day=:day AND CONCAT(appointment_day,date,address, fee) LIKE '%$search%'");
  $this->db->bind(':id',$id);  
  $this->db->bind(':current_date',$current_date);  
  $this->db->bind(':day',$day);  


  $result=$this->db->resultSet();
   return $result;
} 
                   
}
?> 
    
    
    
   