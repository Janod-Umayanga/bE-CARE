<?php

   class M_MedInstrRegisteredUsers{
      private $db;

      public function __construct()
      {
        $this->db=new Database();
      }

      //find RegUsers Monday
      public function findRegUsersMonday($id)
      {
        $current_date= date("Y-m-d");
        $day='Monday';
        $this->db->query('SELECT COUNT(date) AS d1 FROM med_ins_appointment_day WHERE meditation_instructor_id=:id AND date>=:current_date AND day=:day');
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

      //find RegUsers Tuesday
      public function findRegUsersTuesday($id)
      {
        $current_date= date("Y-m-d");
        $day='Tuesday';
        $this->db->query('SELECT COUNT(date) AS d2 FROM med_ins_appointment_day WHERE meditation_instructor_id=:id AND date>=:current_date AND day=:day');
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

      //find RegUsers Wednesday
      public function findRegUsersWednesday($id)
      {
        $current_date= date("Y-m-d");
        $day='Wednesday';
        $this->db->query('SELECT COUNT(date) AS d3 FROM med_ins_appointment_day WHERE meditation_instructor_id=:id AND date>=:current_date AND day=:day');
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

      //find RegUsers Thursday
      public function findRegUsersThursday($id)
      {
        $current_date= date("Y-m-d");
        $day='Thursday';
        $this->db->query('SELECT COUNT(date) AS d4 FROM med_ins_appointment_day WHERE meditation_instructor_id=:id AND date>=:current_date AND day=:day');
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

      //find RegUsers Friday
      public function findRegUsersFriday($id)
      {
        $current_date= date("Y-m-d");
        $day='Friday';
        $this->db->query('SELECT COUNT(date) AS d5 FROM med_ins_appointment_day WHERE meditation_instructor_id=:id AND date>=:current_date AND day=:day');
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
   
      //find RegUsers Saturday
      public function findRegUsersSaturday($id)
      {
        $current_date= date("Y-m-d");
        $day='Saturday';
        $this->db->query('SELECT COUNT(date) AS d6 FROM med_ins_appointment_day WHERE meditation_instructor_id=:id AND date>=:current_date AND day=:day');
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
   
      //find RegUsers Sunday
      public function findRegUsersSunday($id)
      {
        $current_date= date("Y-m-d");
        $day='Sunday';
        $this->db->query('SELECT COUNT(date) AS d7 FROM med_ins_appointment_day WHERE meditation_instructor_id=:id AND date>=:current_date AND day=:day');
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

    //find All RegUsers Monday
    public function findAllRegUsersMonday($id)
    {
      $current_date= date("Y-m-d");
      $day='Monday';
      $this->db->query('SELECT * FROM med_ins_appointment_day WHERE meditation_instructor_id=:id AND  date>=:current_date AND day=:day ORDER BY date ASC');
      $this->db->bind(':id',$id);  
      $this->db->bind(':current_date',$current_date);  
      $this->db->bind(':day',$day);  


      $result=$this->db->resultSet();
         return $result;


   } 

   //find All RegUsers Tuesday
   public function findAllRegUsersTuesday($id)
   {
     $current_date= date("Y-m-d");
     $day='Tuesday';
     $this->db->query('SELECT * FROM med_ins_appointment_day WHERE meditation_instructor_id=:id AND  date>=:current_date AND day=:day ORDER BY date ASC');
     $this->db->bind(':id',$id);  
     $this->db->bind(':current_date',$current_date);  
     $this->db->bind(':day',$day);  


     $result=$this->db->resultSet();
        return $result;


   }
   
   //find All RegUsers Wednesday
   public function findAllRegUsersWednesday($id)
   {
     $current_date= date("Y-m-d");
     $day='Wednesday';
     $this->db->query('SELECT * FROM med_ins_appointment_day WHERE meditation_instructor_id=:id AND  date>=:current_date AND day=:day ORDER BY date ASC');
     $this->db->bind(':id',$id);  
     $this->db->bind(':current_date',$current_date);  
     $this->db->bind(':day',$day);  


     $result=$this->db->resultSet();
        return $result;


  } 

  //find All RegUsers Thursday
  public function findAllRegUsersThursday($id)
  {
    $current_date= date("Y-m-d");
    $day='Thursday';
    $this->db->query('SELECT * FROM med_ins_appointment_day WHERE meditation_instructor_id=:id AND  date>=:current_date AND day=:day ORDER BY date ASC');
    $this->db->bind(':id',$id);  
    $this->db->bind(':current_date',$current_date);  
    $this->db->bind(':day',$day);  


    $result=$this->db->resultSet();
       return $result;


 } 

 //find All RegUsers Friday
 public function findAllRegUsersFriday($id)
 {
   $current_date= date("Y-m-d");
   $day='Friday';
   $this->db->query('SELECT * FROM med_ins_appointment_day WHERE meditation_instructor_id=:id AND  date>=:current_date AND day=:day ORDER BY date ASC');
   $this->db->bind(':id',$id);  
   $this->db->bind(':current_date',$current_date);  
   $this->db->bind(':day',$day);  


   $result=$this->db->resultSet();
      return $result;


} 

//find All RegUsers Saturday
public function findAllRegUsersSaturday($id)
{
  $current_date= date("Y-m-d");
  $day='Saturday';
  $this->db->query('SELECT * FROM med_ins_appointment_day WHERE meditation_instructor_id=:id AND  date>=:current_date AND day=:day ORDER BY date ASC');
  $this->db->bind(':id',$id);  
  $this->db->bind(':current_date',$current_date);  
  $this->db->bind(':day',$day);  


  $result=$this->db->resultSet();
     return $result;


} 

//find All RegUsers Sunday
public function findAllRegUsersSunday($id)
{
  $current_date= date("Y-m-d");
  $day='Sunday';
  $this->db->query('SELECT * FROM med_ins_appointment_day WHERE meditation_instructor_id=:id AND  date>=:current_date AND day=:day ORDER BY date ASC');
  $this->db->bind(':id',$id);  
  $this->db->bind(':current_date',$current_date);  
  $this->db->bind(':day',$day);  


  $result=$this->db->resultSet();
     return $result;


} 

//find med Channel Details
public function  findmedChannelDetails()
{
      
    $this->db->query('SELECT * FROM med_ins_register ');
  
    $result=$this->db->resultSet();
    return $result;
} 

//search All Reg Users Monday
public function searchAllRegUsersMonday($search,$id)
{
  $current_date= date("Y-m-d");
  $day='Monday';
    
  $this->db->query("SELECT * FROM med_ins_appointment_day WHERE meditation_instructor_id=:id AND date>= :current_date AND day=:day AND CONCAT(day,date,address, fee) LIKE '%$search%'");
  $this->db->bind(':id',$id);  
  $this->db->bind(':current_date',$current_date);  
  $this->db->bind(':day',$day);  


  $result=$this->db->resultSet();
   return $result;
} 


//search All RegUsers Tuesday
public function searchAllRegUsersTuesday($search,$id)
{
  $current_date= date("Y-m-d");
  $day='Tuesday';
    
  $this->db->query("SELECT * FROM med_ins_appointment_day WHERE meditation_instructor_id=:id AND date>= :current_date AND day=:day AND CONCAT(day,date,address, fee) LIKE '%$search%'");
  $this->db->bind(':id',$id);  
  $this->db->bind(':current_date',$current_date);  
  $this->db->bind(':day',$day);  


  $result=$this->db->resultSet();
   return $result;
} 


//search All RegUsers Wednesday
public function searchAllRegUsersWednesday($search,$id)
{
  $current_date= date("Y-m-d");
  $day='Wednesday';
    
  $this->db->query("SELECT * FROM med_ins_appointment_day WHERE meditation_instructor_id=:id AND date>= :current_date AND day=:day AND CONCAT(day,date,address, fee) LIKE '%$search%'");
  $this->db->bind(':id',$id);  
  $this->db->bind(':current_date',$current_date);  
  $this->db->bind(':day',$day);  


  $result=$this->db->resultSet();
   return $result;
} 



//search All RegUsers Thursday
public function searchAllRegUsersThursday($search,$id)
{
  $current_date= date("Y-m-d");
  $day='Thursday';
    
  $this->db->query("SELECT * FROM med_ins_appointment_day WHERE meditation_instructor_id=:id AND date>= :current_date AND day=:day AND CONCAT(day,date,address, fee) LIKE '%$search%'");
  $this->db->bind(':id',$id);  
  $this->db->bind(':current_date',$current_date);  
  $this->db->bind(':day',$day);  


  $result=$this->db->resultSet();
   return $result;
} 


//search All RegUsers Friday
public function searchAllRegUsersFriday($search,$id)
{
  $current_date= date("Y-m-d");
  $day='Friday';
    
  $this->db->query("SELECT * FROM med_ins_appointment_day WHERE meditation_instructor_id=:id AND date>= :current_date AND day=:day AND CONCAT(day,date,address, fee) LIKE '%$search%'");
  $this->db->bind(':id',$id);  
  $this->db->bind(':current_date',$current_date);  
  $this->db->bind(':day',$day);  


  $result=$this->db->resultSet();
   return $result;
} 


//search All RegUsers Saturday
public function searchAllRegUsersSaturday($search,$id)
{
  $current_date= date("Y-m-d");
  $day='Saturday';
    
  $this->db->query("SELECT * FROM med_ins_appointment_day WHERE meditation_instructor_id=:id AND date>= :current_date AND day=:day AND CONCAT(day,date,address, fee) LIKE '%$search%'");
  $this->db->bind(':id',$id);  
  $this->db->bind(':current_date',$current_date);  
  $this->db->bind(':day',$day);  


  $result=$this->db->resultSet();
   return $result;
} 


//search All RegUsers Sunday
public function searchAllRegUsersSunday($search,$id)
{
  $current_date= date("Y-m-d");
  $day='Sunday';
    
  $this->db->query("SELECT * FROM med_ins_appointment_day WHERE meditation_instructor_id=:id AND date>= :current_date AND day=:day AND CONCAT(day,date,address, fee) LIKE '%$search%'");
  $this->db->bind(':id',$id);  
  $this->db->bind(':current_date',$current_date);  
  $this->db->bind(':day',$day);  


  $result=$this->db->resultSet();
   return $result;
} 
                   
}
?> 
    
    
    
   