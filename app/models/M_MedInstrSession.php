  <?php

   class M_MedInstrSession{
      private $db;

      public function __construct()
      {
        $this->db=new Database();
       

      }
      
      //find No Of Old Session
      public function  findNoOfOldSession($id)
      {
        $current_date= date("Y-m-d");
        $this->db->query('SELECT COUNT(title) AS oldSession_count FROM session  WHERE date<:current_date AND meditation_instructor_id=:id');
        $this->db->bind(':id', $id);
        $this->db->bind(':current_date', $current_date);  
       
               
        $row=$this->db->single();
        return $row;
        
      
      } 

      //find No Of New Session
      public function findNoOfNewSession($id)
      {
        $current_date= date("Y-m-d");
        $this->db->query('SELECT COUNT(title) AS newSession_count FROM session WHERE date>=:current_date AND meditation_instructor_id=:id ');
        $this->db->bind(':id', $id);
        $this->db->bind(':current_date', $current_date);  
       
              
        $row=$this->db->single();
        return $row;
        
      
      } 

      //find Old Session
      public function findOldSession($id)
      {
        $current_date= date("Y-m-d");
        $this->db->query('SELECT * FROM session WHERE meditation_instructor_id=:id AND date<:current_date ORDER BY date DESC');
        $this->db->bind(':id', $id);
        $this->db->bind(':current_date', $current_date);  
       
              
        $result=$this->db->resultSet();
        return $result;
        
      
      } 
              
  //Search Old Session
  public function searchOldSession($id,$search)
  {
    $current_date= date("Y-m-d");
    $this->db->query("SELECT * FROM session WHERE meditation_instructor_id=:id AND date<:current_date AND CONCAT(title,date,address, fee) LIKE '%$search%' ORDER BY date DESC");
    $this->db->bind(':id',$id);  
    $this->db->bind(':current_date',$current_date);  
    
  
    $result=$this->db->resultSet();
     return $result;
  } 

  //View More Session
  public function viewMoreSession($session_id)
  {
    $this->db->query('SELECT * FROM session WHERE session_id=:session_id');
    $this->db->bind(':session_id', $session_id);
    
          
    $row=$this->db->single();
    return $row;
    
  
  } 

  //view Reg Users Session
  public function  viewRegUsersSession($session_id)
  {
    $this->db->query("SELECT * FROM session_register WHERE session_id=:session_id ORDER BY registered_date_and_time ASC");
    $this->db->bind(':session_id', $session_id);
    
  
    $result=$this->db->resultSet();
     return $result;
  } 

  //Search MedInstr Session RegUsers
  public function  searchMedInstrSessionRegUsers($session_id,$search)
  {
    $this->db->query("SELECT * FROM session_register WHERE session_id=:session_id AND CONCAT(name,age) LIKE '%$search%' ORDER BY registered_date_and_time ASC");
    $this->db->bind(':session_id', $session_id);
    
  
     $result=$this->db->resultSet();
     return $result;
  } 

  
  //Find New Session  
  public function findNewSession($id)
      {
        $current_date= date("Y-m-d");
        $this->db->query('SELECT * FROM session WHERE meditation_instructor_id=:id AND date>=:current_date ORDER BY date ASC');
        $this->db->bind(':id', $id);
        $this->db->bind(':current_date', $current_date);  
       
              
        $result=$this->db->resultSet();
        return $result;
        
      
      } 
              
  //Search New Session
  public function searchNewSession($id,$search)
  {
    $current_date= date("Y-m-d");
    $this->db->query("SELECT * FROM session WHERE meditation_instructor_id=:id AND date>=:current_date AND CONCAT(title,date,address, fee) LIKE '%$search%' ORDER BY date ASC");
    $this->db->bind(':id',$id);  
    $this->db->bind(':current_date',$current_date);  
    
  
    $result=$this->db->resultSet();
     return $result;
  } 

  


}

?>