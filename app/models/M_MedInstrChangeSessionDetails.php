
<?php

class M_MedInstrChangeSessionDetails{
   private $db;

   public function __construct()
   {
     $this->db=new Database();
   }

   public function getSessionDetails($id)

   { 
         $current_date= date("Y-m-d");
         $this->db->query('SELECT * FROM session WHERE meditation_instructor_id=:id AND date>=:current_date AND session_id NOT IN (SELECT session_id from session_register)');
         $this->db->bind(':id',$id);
         $this->db->bind(':current_date',$current_date);
        

         return $this->db->resultSet();
      
   } 

   public function searchSessionDetails($id,$search)

   { 
         $current_date= date("Y-m-d");
         $this->db->query("SELECT * FROM session WHERE meditation_instructor_id=:id AND date>=:current_date AND  session_id NOT IN (SELECT session_id from session_register) AND CONCAT(title,date,address, fee) LIKE '%$search%'");
         $this->db->bind(':id',$id);
         $this->db->bind(':current_date',$current_date);
        

         return $this->db->resultSet();
      
   } 

   public function  deleteSession($session_id){
   
    $this->db->query('DELETE FROM session WHERE session_id=:id');
    $this->db->bind(':id',$session_id);

    if($this->db->execute()){
       return true;
    }else{
        return false;
    } 
  }

  public function medInstraddNewSession($id,$data)
  {
   
    $this->db->query('INSERT INTO session (title,description,date,starting_time,ending_time,address,fee,meditation_instructor_id) VALUES (:title,:description,:date,:starting_time,:ending_time,:address,:fee,:id)');
    $this->db->bind(':title',$data['title']);
    $this->db->bind(':description',$data['description']);
    $this->db->bind(':date',$data['date']);
    $this->db->bind(':starting_time',$data['starting_time']);
    $this->db->bind(':ending_time',$data['ending_time']);
    $this->db->bind(':address',$data['address']);
    $this->db->bind(':fee',$data['fee']);
    $this->db->bind(':id',$id);

    if($this->db->execute()){
       return true;
    }else{
        return false;
    } 

  }

  public function viewSession($sessionId)
  {
     
    $this->db->query('SELECT * FROM session WHERE session_id=:id');
    $this->db->bind(':id',$sessionId);  
         
    $row=$this->db->single();
    return $row;
  } 

  public function medInstrupdateSession($id,$sessionId,$data)
  {
    $this->db->query('UPDATE session SET title=:title,date=:date,starting_time=:starting_time,ending_time=:ending_time,address=:address,fee=:fee,description=:description,meditation_instructor_id=:id WHERE session_id=:sessionId');
    $this->db->bind(':title',$data['title']);
    $this->db->bind(':description',$data['description']);
    $this->db->bind(':date',$data['date']);
    $this->db->bind(':starting_time',$data['starting_time']);
    $this->db->bind(':ending_time',$data['ending_time']);
    $this->db->bind(':address',$data['address']);
    $this->db->bind(':fee',$data['fee']);
    $this->db->bind(':id',$id);
    $this->db->bind(':sessionId',$sessionId);

    if($this->db->execute()){
       return true;
    }else{
        return false;
    } 

  }




}
