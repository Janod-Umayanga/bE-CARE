
<?php

   class M_Complaint{
      private $db;

      public function __construct()
      {
        $this->db=new Database();
      }

      public function  addComplaint($data)
      {
            $this->db->query('INSERT INTO complaint (subject,description,meditation_instructor_id) VALUES (:subject,:description,:meditation_instructor_id)');
            $this->db->bind(':subject',$data['subject']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':meditation_instructor_id', $data['meditation_instructor_id']);
           

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }    
      } 
   }