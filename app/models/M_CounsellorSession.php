<?php

class M_CounsellorSession{
   private $db;

   public function __construct()
   {
     $this->db=new Database();
    

   }

   public function findNoOfNewCounsellorSession($id)
{
  $current_date= date("Y-m-d");
  $this->db->query('SELECT COUNT(title) AS newSession_count FROM session WHERE date>=:current_date AND counsellor_id=:id ');
  $this->db->bind(':id', $id);
  $this->db->bind(':current_date', $current_date);  
 
        
  $row=$this->db->single();
  return $row;
  

} 

public function  findNoOfOldCounsellorSession($id)
{
  $current_date= date("Y-m-d");
  $this->db->query('SELECT COUNT(title) AS oldSession_count FROM session  WHERE date<:current_date AND counsellor_id=:id');
  $this->db->bind(':id', $id);
  $this->db->bind(':current_date', $current_date);  
 
         
  $row=$this->db->single();
  return $row;
  

} 


   
public function findCounsellorNewSession($id)
{
  $current_date= date("Y-m-d");
  $this->db->query('SELECT * FROM session WHERE counsellor_id=:id AND date>=:current_date');
  $this->db->bind(':id', $id);
  $this->db->bind(':current_date', $current_date);  
 
        
  $result=$this->db->resultSet();
  return $result;
  

} 
        

public function searchCounsellorNewSession($id,$search)
{
$current_date= date("Y-m-d");
$this->db->query("SELECT * FROM session WHERE counsellor_id=:id AND date>=:current_date AND CONCAT(title,date,address, fee) LIKE '%$search%'");
$this->db->bind(':id',$id);  
$this->db->bind(':current_date',$current_date);  


$result=$this->db->resultSet();
return $result;
} 



  public function findCounsellorOldSession($id)
   {
     $current_date= date("Y-m-d");
     $this->db->query('SELECT * FROM session WHERE counsellor_id=:id AND date<:current_date');
     $this->db->bind(':id', $id);
     $this->db->bind(':current_date', $current_date);  
    
           
     $result=$this->db->resultSet();
     return $result;
     
   
   } 
           

public function searchCounsellorOldSession($id,$search)
{
 $current_date= date("Y-m-d");
 $this->db->query("SELECT * FROM session WHERE counsellor_id=:id AND date<:current_date AND CONCAT(title,date,address, fee) LIKE '%$search%'");
 $this->db->bind(':id',$id);  
 $this->db->bind(':current_date',$current_date);  
 

 $result=$this->db->resultSet();
  return $result;
} 

public function viewMoreCounsellorSession($session_id)
{
 $this->db->query('SELECT * FROM session WHERE session_id=:session_id');
 $this->db->bind(':session_id', $session_id);
 
       
 $row=$this->db->single();
 return $row;
 

} 

public function  searchCounsellorSessionRegUsers($session_id,$search)
               
{
 
 $this->db->query("SELECT * FROM session_register WHERE session_id=:session_id AND CONCAT(name,age) LIKE '%$search%'");
 $this->db->bind(':session_id', $session_id);
 

 

 $result=$this->db->resultSet();
  return $result;
} 


public function  viewRegUsersCounsellorSession($session_id)
{
 $this->db->query("SELECT * FROM session_register WHERE session_id=:session_id");
 $this->db->bind(':session_id', $session_id);
 

 $result=$this->db->resultSet();
  return $result;
} 

}

?>