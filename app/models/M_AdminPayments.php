<?php

   class M_AdminPayments{
      private $db;

      public function __construct()
      {
         $this->db=new Database();
      }
     
           public function  doctorChannelAllSearch($search)         
           {
             $this->db->query("SELECT * FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id WHERE CONCAT(doctor.first_name,doctor.last_name) LIKE '%$search%' ORDER BY doctor_channel.date DESC ");
             $result=$this->db->resultSet();
              return $result;
           } 

           public function  doctorChannelAll()         
           {
             $this->db->query("SELECT * FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id ORDER BY doctor_channel.date DESC");
            
             $result=$this->db->resultSet();
              return $result;
           }

           public function doctorChannelAllProfit(){
            $this->db->query("SELECT sum((doctor_channel.paid_amount/110)*10) AS profit FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id ORDER BY doctor_channel.date DESC");
            $row= $this->db->single();
    
            if($this->db->rowCount() >0){
                  return $row;
            }else{
                  return false;
            }
             
          }
         

           public function  doctorChannelTodaySearch($search,$today)         
           {
              
             $this->db->query("SELECT * FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id WHERE CONCAT(doctor.first_name,doctor.last_name) LIKE '%$search%' AND doctor_channel.date=:today ORDER BY doctor_channel.date DESC");
             $this->db->bind(':today',$today);
  
             $result=$this->db->resultSet();
              return $result;
           } 

           public function doctorChannelToday($today)        
           {
             $this->db->query("SELECT * FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id WHERE doctor_channel.date=:today ORDER BY doctor_channel.date DESC");
             $this->db->bind(':today',$today);
  
             $result=$this->db->resultSet();
              return $result;
           }

           public function doctorChannelTodayProfit($today){
            $this->db->query("SELECT sum((doctor_channel.paid_amount/110)*10) AS profit FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id  WHERE doctor_channel.date=:today ORDER BY doctor_channel.date DESC");
            $this->db->bind(':today',$today);

            $row= $this->db->single();
    
            if($this->db->rowCount() >0){
                  return $row;
            }else{
                  return false;
            }
             
          }
          
           public function  doctorChannelYesterdaySearch($search,$yesterday)        
           {
             $this->db->query("SELECT * FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id WHERE CONCAT(doctor.first_name,doctor.last_name) LIKE '%$search%' AND doctor_channel.date=:yesterday ORDER BY doctor_channel.date DESC");
             $this->db->bind(':yesterday',$yesterday);

             $result=$this->db->resultSet();
              return $result;
           } 

           public function   doctorChannelYesterday($yesterday)        
           {
             $this->db->query("SELECT * FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id WHERE doctor_channel.date=:yesterday ORDER BY doctor_channel.date DESC");
             $this->db->bind(':yesterday',$yesterday);

             $result=$this->db->resultSet();
              return $result;
           }

           public function doctorChannelYesterdayProfit($yesterday){
            $this->db->query("SELECT sum((doctor_channel.paid_amount/110)*10) AS profit FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id  WHERE doctor_channel.date=:yesterday ORDER BY doctor_channel.date DESC");
            $this->db->bind(':yesterday',$yesterday);
  
            $row= $this->db->single();
    
            if($this->db->rowCount() >0){
                  return $row;
            }else{
                  return false;
            }
             
          }

           public function  doctorChannelThisMonthSearch($search,$month,$year)       
           {
             $this->db->query("SELECT * FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id WHERE CONCAT(doctor.first_name,doctor.last_name) LIKE '%$search%' AND MONTH(doctor_channel.date)=:month AND YEAR(doctor_channel.date)=:year ORDER BY doctor_channel.date DESC ");
             $this->db->bind(':month',$month);
             $this->db->bind(':year',$year);

          
             $result=$this->db->resultSet();
              return $result;
           } 

           public function  doctorChannelThisMonth($month,$year)       
           {
             $this->db->query("SELECT * FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id  WHERE MONTH(doctor_channel.date)=:month AND YEAR(doctor_channel.date)=:year ORDER BY doctor_channel.date DESC");
             $this->db->bind(':month',$month);
             $this->db->bind(':year',$year);

             $result=$this->db->resultSet();
              return $result;
           }

           public function doctorChannelThisMonthProfit($month,$year){
            $this->db->query("SELECT sum((doctor_channel.paid_amount/110)*10) AS profit FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id  WHERE  MONTH(doctor_channel.date)=:month AND YEAR(doctor_channel.date)=:year ORDER BY doctor_channel.date DESC");
            $this->db->bind(':month',$month);
            $this->db->bind(':year',$year);
  
            $row= $this->db->single();
    
            if($this->db->rowCount() >0){
                  return $row;
            }else{
                  return false;
            }
             
          }

           public function  doctorChannelThisYearSearch($search,$year)        
           {
             $this->db->query("SELECT * FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id WHERE CONCAT(doctor.first_name,doctor.last_name) LIKE '%$search%' AND YEAR(doctor_channel.date)=:year ORDER BY doctor_channel.date DESC");
             $this->db->bind(':year',$year);

             $result=$this->db->resultSet();
              return $result;
           } 

           public function   doctorChannelThisYear($year)        
           {
             $this->db->query("SELECT * FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id WHERE YEAR(doctor_channel.date)=:year ORDER BY doctor_channel.date DESC");
             $this->db->bind(':year',$year);

             $result=$this->db->resultSet();
              return $result;
           }


           public function doctorChannelThisYearProfit($year){
            $this->db->query("SELECT sum((doctor_channel.paid_amount/110)*10) AS profit FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id  WHERE  YEAR(doctor_channel.date)=:year ORDER BY doctor_channel.date DESC");
            $this->db->bind(':year',$year);
  
            $row= $this->db->single();
    
            if($this->db->rowCount() >0){
                  return $row;
            }else{
                  return false;
            }
             
          }

          
          
          public function doctorChannelDetails($id)
          {
            $this->db->query("SELECT * FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id  WHERE   doctor_channel.doctor_channel_id=:id");
            $this->db->bind(':id',$id);
  
            $row= $this->db->single();
    
            if($this->db->rowCount() >0){
                  return $row;
            }else{
                  return false;
            }
             
          }
}


 ?>
