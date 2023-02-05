<?php

class M_NutritionistSession{
   private $db;

   public function __construct()
   {
     $this->db=new Database();
    

   }

   public function findNoOfNewNutritionistSession($id)
{
  $current_date= date("Y-m-d");
  $this->db->query('SELECT COUNT(title) AS newSession_count FROM session WHERE date>=:current_date AND nutritionist_id=:id ');
  $this->db->bind(':id', $id);
  $this->db->bind(':current_date', $current_date);  
 
        
  $row=$this->db->single();
  return $row;
  

} 

public function  findNoOfOldNutritionistSession($id)
{
  $current_date= date("Y-m-d");
  $this->db->query('SELECT COUNT(title) AS oldSession_count FROM session  WHERE date<:current_date AND nutritionist_id=:id');
  $this->db->bind(':id', $id);
  $this->db->bind(':current_date', $current_date);  
 
         
  $row=$this->db->single();
  return $row;
  

} 


   
public function findNutritionistNewSession($id)
{
  $current_date= date("Y-m-d");
  $this->db->query('SELECT * FROM session WHERE nutritionist_id=:id AND date>=:current_date');
  $this->db->bind(':id', $id);
  $this->db->bind(':current_date', $current_date);  
 
        
  $result=$this->db->resultSet();
  return $result;
  

} 
        

public function searchNutritionistNewSession($id,$search)
{
$current_date= date("Y-m-d");
$this->db->query("SELECT * FROM session WHERE nutritionist_id=:id AND date>=:current_date AND CONCAT(title,date,address, fee) LIKE '%$search%'");
$this->db->bind(':id',$id);  
$this->db->bind(':current_date',$current_date);  


$result=$this->db->resultSet();
return $result;
} 



  public function findNutritionistOldSession($id)
   {
     $current_date= date("Y-m-d");
     $this->db->query('SELECT * FROM session WHERE nutritionist_id=:id AND date<:current_date');
     $this->db->bind(':id', $id);
     $this->db->bind(':current_date', $current_date);  
    
           
     $result=$this->db->resultSet();
     return $result;
     
   
   } 
           

public function searchNutritionistOldSession($id,$search)
{
 $current_date= date("Y-m-d");
 $this->db->query("SELECT * FROM session WHERE nutritionist_id=:id AND date<:current_date AND CONCAT(title,date,address, fee) LIKE '%$search%'");
 $this->db->bind(':id',$id);  
 $this->db->bind(':current_date',$current_date);  
 

 $result=$this->db->resultSet();
  return $result;
} 

public function viewMoreNutritionistSession($session_id)
{
 $this->db->query('SELECT * FROM session WHERE session_id=:session_id');
 $this->db->bind(':session_id', $session_id);
 
       
 $row=$this->db->single();
 return $row;
 

} 

public function  searchNutritionistSessionRegUsers($session_id,$search)
               
{
 
 $this->db->query("SELECT * FROM session_register WHERE session_id=:session_id AND CONCAT(name,age) LIKE '%$search%'");
 $this->db->bind(':session_id', $session_id);
 

 

 $result=$this->db->resultSet();
  return $result;
} 


public function  viewRegUsersNutritionistSession($session_id)
{
 $this->db->query("SELECT * FROM session_register WHERE session_id=:session_id");
 $this->db->bind(':session_id', $session_id);
 

 $result=$this->db->resultSet();
  return $result;
} 








}

?>