<?php

   class M_AdminPayments{
      private $db;

      public function __construct()
      {
         $this->db=new Database();
      }
     
           public function  doctorChannelAllSearch($search)         
           {
             $this->db->query("SELECT * FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id WHERE CONCAT(doctor.first_name,doctor.last_name) LIKE '%$search%' ORDER BY doctor_channel.paid_time DESC ");
             $result=$this->db->resultSet();
              return $result;
           } 

           public function  doctorChannelAll()         
           {
             $this->db->query("SELECT * FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id ORDER BY doctor_channel.paid_time DESC");
            
             $result=$this->db->resultSet();
              return $result;
           }

           public function doctorChannelAllProfit(){
            $this->db->query("SELECT sum((doctor_channel.paid_amount/110)*10) AS profit, COUNT(doctor_channel.paid_amount) AS no FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id ORDER BY doctor_channel.paid_time DESC");
            $row= $this->db->single();
    
            if($this->db->rowCount() >0){
                  return $row;
            }else{
                  return false;
            }
             
          }

          public function doctorChannelAllProfitSearch($search){
            $this->db->query("SELECT sum((doctor_channel.paid_amount/110)*10) AS profit,  COUNT(doctor_channel.paid_amount) AS no, CONCAT(doctor.first_name,' ',doctor.last_name) AS name FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id WHERE CONCAT(doctor.first_name,doctor.last_name) LIKE '%$search%' ORDER BY doctor_channel.paid_time DESC");
            $row= $this->db->single();
    
            if($this->db->rowCount() >0){
                  return $row;
            }else{
                  return false;
            }
             
          }
         

           public function doctorChannelTodaySearch($search,$today)         
           {
              
             $this->db->query("SELECT * FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id WHERE CONCAT(doctor.first_name,doctor.last_name) LIKE '%$search%' AND DATE(doctor_channel.paid_time)=:today ORDER BY doctor_channel.paid_time DESC");
             $this->db->bind(':today',$today);                                                                                                                                                                                                         
  
             $result=$this->db->resultSet();
              return $result;
           } 

           public function doctorChannelToday($today)        
           {
             $this->db->query("SELECT * FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id WHERE DATE(doctor_channel.paid_time)=:today ORDER BY doctor_channel.paid_time DESC");
             $this->db->bind(':today',$today);
  
             $result=$this->db->resultSet();
              return $result;
           }

           public function doctorChannelTodayProfit($today){
            $this->db->query("SELECT sum((doctor_channel.paid_amount/110)*10) AS profit,  COUNT(doctor_channel.paid_amount) AS no  FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id  WHERE DATE(doctor_channel.paid_time)=:today ORDER BY doctor_channel.paid_time DESC");
            $this->db->bind(':today',$today);

            $row= $this->db->single();
    
            if($this->db->rowCount() >0){
                  return $row;
            }else{
                  return false;
            }
             
          }
          

          public function doctorChannelTodayProfitSearch($search,$today){
            $this->db->query("SELECT sum((doctor_channel.paid_amount/110)*10) AS profit, COUNT(doctor_channel.paid_amount) AS no, CONCAT(doctor.first_name,' ',doctor.last_name) AS name FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id  WHERE DATE(doctor_channel.paid_time)=:today AND CONCAT(doctor.first_name,doctor.last_name) LIKE '%$search%' ORDER BY doctor_channel.paid_time DESC");
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
             $this->db->query("SELECT * FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id WHERE CONCAT(doctor.first_name,doctor.last_name) LIKE '%$search%' AND DATE(doctor_channel.paid_time)=:yesterday ORDER BY doctor_channel.paid_time DESC");
             $this->db->bind(':yesterday',$yesterday);

             $result=$this->db->resultSet();
              return $result;
           } 

           public function   doctorChannelYesterday($yesterday)        
           {
             $this->db->query("SELECT * FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id WHERE DATE(doctor_channel.paid_time)=:yesterday ORDER BY doctor_channel.paid_time DESC");
             $this->db->bind(':yesterday',$yesterday);

             $result=$this->db->resultSet();
              return $result;
           }

           public function doctorChannelYesterdayProfit($yesterday){
            $this->db->query("SELECT sum((doctor_channel.paid_amount/110)*10) AS profit, COUNT(doctor_channel.paid_amount) AS no FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id  WHERE DATE(doctor_channel.paid_time)=:yesterday ORDER BY doctor_channel.paid_time DESC");
            $this->db->bind(':yesterday',$yesterday);
  
            $row= $this->db->single();
    
            if($this->db->rowCount() >0){
                  return $row;
            }else{
                  return false;
            }
             
          }

          public function doctorChannelYesterdayProfitSearch($search,$yesterday){
            $this->db->query("SELECT sum((doctor_channel.paid_amount/110)*10) AS profit,COUNT(doctor_channel.paid_amount) AS no, CONCAT(doctor.first_name,' ',doctor.last_name) AS name FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id  WHERE DATE(doctor_channel.paid_time)=:yesterday AND CONCAT(doctor.first_name,doctor.last_name) LIKE '%$search%' ORDER BY doctor_channel.paid_time DESC");
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
             $this->db->query("SELECT * FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id WHERE CONCAT(doctor.first_name,doctor.last_name) LIKE '%$search%' AND MONTH(doctor_channel.paid_time)=:month AND YEAR(doctor_channel.paid_time)=:year ORDER BY doctor_channel.paid_time DESC ");
             $this->db->bind(':month',$month);
             $this->db->bind(':year',$year);

          
             $result=$this->db->resultSet();
              return $result;
           } 

           public function  doctorChannelThisMonth($month,$year)       
           {
             $this->db->query("SELECT * FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id  WHERE MONTH(doctor_channel.paid_time)=:month AND YEAR(doctor_channel.paid_time)=:year ORDER BY doctor_channel.paid_time DESC");
             $this->db->bind(':month',$month);
             $this->db->bind(':year',$year);

             $result=$this->db->resultSet();
              return $result;
           }

           public function doctorChannelThisMonthProfit($month,$year){
            $this->db->query("SELECT sum((doctor_channel.paid_amount/110)*10) AS profit, COUNT(doctor_channel.paid_amount) AS no FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id  WHERE  MONTH(doctor_channel.paid_time)=:month AND YEAR(doctor_channel.paid_time)=:year ORDER BY doctor_channel.paid_time DESC");
            $this->db->bind(':month',$month);
            $this->db->bind(':year',$year);
  
            $row= $this->db->single();
    
            if($this->db->rowCount() >0){
                  return $row;
            }else{
                  return false;
            }
             
          }

          public function doctorChannelThisMonthProfitSearch($search,$month,$year){
            $this->db->query("SELECT sum((doctor_channel.paid_amount/110)*10) AS profit , COUNT(doctor_channel.paid_amount) AS no, CONCAT(doctor.first_name,' ',doctor.last_name) AS name FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id  WHERE  MONTH(doctor_channel.paid_time)=:month AND YEAR(doctor_channel.paid_time)=:year AND CONCAT(doctor.first_name,doctor.last_name) LIKE '%$search%' ORDER BY doctor_channel.paid_time DESC");
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
             $this->db->query("SELECT * FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id WHERE CONCAT(doctor.first_name,doctor.last_name) LIKE '%$search%' AND YEAR(doctor_channel.paid_time)=:year ORDER BY doctor_channel.paid_time DESC");
             $this->db->bind(':year',$year);

             $result=$this->db->resultSet();
              return $result;
           } 

           public function   doctorChannelThisYear($year)        
           {
             $this->db->query("SELECT * FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id WHERE YEAR(doctor_channel.paid_time)=:year ORDER BY doctor_channel.paid_time DESC");
             $this->db->bind(':year',$year);

             $result=$this->db->resultSet();
              return $result;
           }


           public function doctorChannelThisYearProfit($year){
            $this->db->query("SELECT sum((doctor_channel.paid_amount/110)*10) AS profit, COUNT(doctor_channel.paid_amount) AS no, COUNT(doctor_channel.paid_amount) AS no
            FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id  WHERE  YEAR(doctor_channel.paid_time)=:year ORDER BY doctor_channel.paid_time DESC");
            $this->db->bind(':year',$year);
  
            $row= $this->db->single();
    
            if($this->db->rowCount() >0){
                  return $row;
            }else{
                  return false;
            }
             
          }

          public function doctorChannelThisYearProfitSearch($search,$year){
            $this->db->query("SELECT sum((doctor_channel.paid_amount/110)*10) AS profit, CONCAT(doctor.first_name,' ',doctor.last_name) AS name, COUNT(doctor_channel.paid_amount) AS no FROM doctor_channel inner join doctor on doctor.doctor_id = doctor_channel.doctor_id  WHERE  YEAR(doctor_channel.paid_time)=:year AND CONCAT(doctor.first_name,doctor.last_name) LIKE '%$search%' ORDER BY doctor_channel.paid_time DESC");
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




       //     Counsellor



      public function  counsellorChannelAllSearch($search)         
      {
        $this->db->query("SELECT * FROM counsellor_channel inner join counsellor on counsellor.counsellor_id = counsellor_channel.counsellor_id WHERE CONCAT(counsellor.first_name,counsellor.last_name) LIKE '%$search%' ORDER BY counsellor_channel.paid_time DESC ");
        $result=$this->db->resultSet();
         return $result;
      } 

      public function  counsellorChannelAll()         
      {
        $this->db->query("SELECT * FROM counsellor_channel inner join counsellor on counsellor.counsellor_id = counsellor_channel.counsellor_id ORDER BY counsellor_channel.paid_time DESC");
       
        $result=$this->db->resultSet();
         return $result;
      }

      public function counsellorChannelAllProfit(){
       $this->db->query("SELECT sum((counsellor_channel.paid_amount/110)*10) AS profit, COUNT(counsellor_channel.paid_amount) AS no  FROM counsellor_channel inner join counsellor on counsellor.counsellor_id = counsellor_channel.counsellor_id ORDER BY counsellor_channel.paid_time DESC");
       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }

     public function counsellorChannelAllProfitSearch($search){
       $this->db->query("SELECT sum((counsellor_channel.paid_amount/110)*10) AS profit,  COUNT(counsellor_channel.paid_amount) AS no, CONCAT(counsellor.first_name,' ',counsellor.last_name) AS name FROM counsellor_channel inner join counsellor on counsellor.counsellor_id = counsellor_channel.counsellor_id WHERE CONCAT(counsellor.first_name,counsellor.last_name) LIKE '%$search%' ORDER BY counsellor_channel.paid_time DESC");
       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }
    

      public function counsellorChannelTodaySearch($search,$today)         
      {
         
        $this->db->query("SELECT * FROM counsellor_channel inner join counsellor on counsellor.counsellor_id = counsellor_channel.counsellor_id WHERE CONCAT(counsellor.first_name,counsellor.last_name) LIKE '%$search%' AND DATE(counsellor_channel.paid_time)=:today ORDER BY counsellor_channel.paid_time DESC");
        $this->db->bind(':today',$today);                                                                                                                                                                                                         

        $result=$this->db->resultSet();
         return $result;
      } 

      public function counsellorChannelToday($today)        
      {
        $this->db->query("SELECT * FROM counsellor_channel inner join counsellor on counsellor.counsellor_id = counsellor_channel.counsellor_id WHERE DATE(counsellor_channel.paid_time)=:today ORDER BY counsellor_channel.paid_time DESC");
        $this->db->bind(':today',$today);

        $result=$this->db->resultSet();
         return $result;
      }

      public function counsellorChannelTodayProfit($today){
       $this->db->query("SELECT sum((counsellor_channel.paid_amount/110)*10) AS profit,  COUNT(counsellor_channel.paid_amount) AS no  FROM counsellor_channel inner join counsellor on counsellor.counsellor_id = counsellor_channel.counsellor_id  WHERE DATE(counsellor_channel.paid_time)=:today ORDER BY counsellor_channel.paid_time DESC");
       $this->db->bind(':today',$today);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }
     

     public function counsellorChannelTodayProfitSearch($search,$today){
       $this->db->query("SELECT sum((counsellor_channel.paid_amount/110)*10) AS profit, COUNT(counsellor_channel.paid_amount) AS no, CONCAT(counsellor.first_name,' ',counsellor.last_name) AS name  FROM counsellor_channel inner join counsellor on counsellor.counsellor_id = counsellor_channel.counsellor_id  WHERE DATE(counsellor_channel.paid_time)=:today AND CONCAT(counsellor.first_name,counsellor.last_name) LIKE '%$search%' ORDER BY counsellor_channel.paid_time DESC");
       $this->db->bind(':today',$today);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }
     



      public function  counsellorChannelYesterdaySearch($search,$yesterday)        
      {
        $this->db->query("SELECT * FROM counsellor_channel inner join counsellor on counsellor.counsellor_id = counsellor_channel.counsellor_id WHERE CONCAT(counsellor.first_name,counsellor.last_name) LIKE '%$search%' AND DATE(counsellor_channel.paid_time)=:yesterday ORDER BY counsellor_channel.paid_time DESC");
        $this->db->bind(':yesterday',$yesterday);

        $result=$this->db->resultSet();
         return $result;
      } 

      public function   counsellorChannelYesterday($yesterday)        
      {
        $this->db->query("SELECT * FROM counsellor_channel inner join counsellor on counsellor.counsellor_id = counsellor_channel.counsellor_id WHERE DATE(counsellor_channel.paid_time)=:yesterday ORDER BY counsellor_channel.paid_time DESC");
        $this->db->bind(':yesterday',$yesterday);

        $result=$this->db->resultSet();
         return $result;
      }

      public function counsellorChannelYesterdayProfit($yesterday){
       $this->db->query("SELECT sum((counsellor_channel.paid_amount/110)*10) AS profit, COUNT(counsellor_channel.paid_amount) AS no FROM counsellor_channel inner join counsellor on counsellor.counsellor_id = counsellor_channel.counsellor_id  WHERE DATE(counsellor_channel.paid_time)=:yesterday ORDER BY counsellor_channel.paid_time DESC");
       $this->db->bind(':yesterday',$yesterday);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }

     public function counsellorChannelYesterdayProfitSearch($search,$yesterday){
       $this->db->query("SELECT sum((counsellor_channel.paid_amount/110)*10) AS profit, 
       COUNT(counsellor_channel.paid_amount) AS no, CONCAT(counsellor.first_name,' ',counsellor.last_name) AS name
        FROM counsellor_channel inner join counsellor on counsellor.counsellor_id = counsellor_channel.counsellor_id  WHERE DATE(counsellor_channel.paid_time)=:yesterday AND CONCAT(counsellor.first_name,counsellor.last_name) LIKE '%$search%' ORDER BY counsellor_channel.paid_time DESC");
       $this->db->bind(':yesterday',$yesterday);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }

      public function  counsellorChannelThisMonthSearch($search,$month,$year)       
      {
        $this->db->query("SELECT * FROM counsellor_channel inner join counsellor on counsellor.counsellor_id = counsellor_channel.counsellor_id WHERE CONCAT(counsellor.first_name,counsellor.last_name) LIKE '%$search%' AND MONTH(counsellor_channel.paid_time)=:month AND YEAR(counsellor_channel.paid_time)=:year ORDER BY counsellor_channel.paid_time DESC ");
        $this->db->bind(':month',$month);
        $this->db->bind(':year',$year);

     
        $result=$this->db->resultSet();
         return $result;
      } 

      public function  counsellorChannelThisMonth($month,$year)       
      {
        $this->db->query("SELECT * FROM counsellor_channel inner join counsellor on counsellor.counsellor_id = counsellor_channel.counsellor_id  WHERE MONTH(counsellor_channel.paid_time)=:month AND YEAR(counsellor_channel.paid_time)=:year ORDER BY counsellor_channel.paid_time DESC");
        $this->db->bind(':month',$month);
        $this->db->bind(':year',$year);

        $result=$this->db->resultSet();
         return $result;
      }

      public function counsellorChannelThisMonthProfit($month,$year){
       $this->db->query("SELECT sum((counsellor_channel.paid_amount/110)*10) AS profit, 
       COUNT(counsellor_channel.paid_amount) AS no
        FROM counsellor_channel inner join counsellor on counsellor.counsellor_id = counsellor_channel.counsellor_id  WHERE  MONTH(counsellor_channel.paid_time)=:month AND YEAR(counsellor_channel.paid_time)=:year ORDER BY counsellor_channel.paid_time DESC");
       $this->db->bind(':month',$month);
       $this->db->bind(':year',$year);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }

     public function counsellorChannelThisMonthProfitSearch($search,$month,$year){
       $this->db->query("SELECT sum((counsellor_channel.paid_amount/110)*10) AS profit, 
       COUNT(counsellor_channel.paid_amount) AS no, CONCAT(counsellor.first_name,' ',counsellor.last_name) AS name
         FROM counsellor_channel inner join counsellor on counsellor.counsellor_id = counsellor_channel.counsellor_id  WHERE  MONTH(counsellor_channel.paid_time)=:month AND YEAR(counsellor_channel.paid_time)=:year AND CONCAT(counsellor.first_name,counsellor.last_name) LIKE '%$search%' ORDER BY counsellor_channel.paid_time DESC");
       $this->db->bind(':month',$month);
       $this->db->bind(':year',$year);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }

      public function  counsellorChannelThisYearSearch($search,$year)        
      {
        $this->db->query("SELECT * FROM counsellor_channel inner join counsellor on counsellor.counsellor_id = counsellor_channel.counsellor_id WHERE CONCAT(counsellor.first_name,counsellor.last_name) LIKE '%$search%' AND YEAR(counsellor_channel.paid_time)=:year ORDER BY counsellor_channel.paid_time DESC");
        $this->db->bind(':year',$year);

        $result=$this->db->resultSet();
         return $result;
      } 

      public function   counsellorChannelThisYear($year)        
      {
        $this->db->query("SELECT * FROM counsellor_channel inner join counsellor on counsellor.counsellor_id = counsellor_channel.counsellor_id WHERE YEAR(counsellor_channel.paid_time)=:year ORDER BY counsellor_channel.paid_time DESC");
        $this->db->bind(':year',$year);

        $result=$this->db->resultSet();
         return $result;
      }


      public function counsellorChannelThisYearProfit($year){
       $this->db->query("SELECT sum((counsellor_channel.paid_amount/110)*10) AS profit, COUNT(counsellor_channel.paid_amount) AS no  FROM counsellor_channel inner join counsellor on counsellor.counsellor_id = counsellor_channel.counsellor_id  WHERE  YEAR(counsellor_channel.paid_time)=:year ORDER BY counsellor_channel.paid_time DESC");
       $this->db->bind(':year',$year);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }

     public function counsellorChannelThisYearProfitSearch($search,$year){
       $this->db->query("SELECT sum((counsellor_channel.paid_amount/110)*10) AS profit, CONCAT(counsellor.first_name,' ',counsellor.last_name) AS name, COUNT(counsellor_channel.paid_amount) AS no FROM counsellor_channel inner join counsellor on counsellor.counsellor_id = counsellor_channel.counsellor_id  WHERE  YEAR(counsellor_channel.paid_time)=:year AND CONCAT(counsellor.first_name,counsellor.last_name) LIKE '%$search%' ORDER BY counsellor_channel.paid_time DESC");
       $this->db->bind(':year',$year);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }
     
     public function counsellorChannelDetails($id)
     {
       $this->db->query("SELECT * FROM counsellor_channel inner join counsellor on counsellor.counsellor_id = counsellor_channel.counsellor_id  WHERE   counsellor_channel.counsellor_channel_id=:id");
       $this->db->bind(':id',$id);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }


      //     medInstructor Registration

      
      public function  medInstructorRegistrationAllSearch($search)         
      {
        $this->db->query("SELECT * FROM med_ins_register inner join meditation_instructor on meditation_instructor.meditation_instructor_id = med_ins_register.meditation_instructor_id WHERE CONCAT(meditation_instructor.first_name,meditation_instructor.last_name) LIKE '%$search%' ORDER BY med_ins_register.paid_time DESC ");
        $result=$this->db->resultSet();
         return $result;
      } 

      public function  medInstructorRegistrationAll()         
      {
        $this->db->query("SELECT * FROM med_ins_register inner join meditation_instructor on meditation_instructor.meditation_instructor_id = med_ins_register.meditation_instructor_id ORDER BY med_ins_register.paid_time DESC");
       
        $result=$this->db->resultSet();
         return $result;
      }

      public function medInstructorRegistrationAllProfit(){
       $this->db->query("SELECT sum((med_ins_register.paid_amount/110)*10) AS profit, COUNT(med_ins_register.paid_amount) AS no,  meditation_instructor.gender AS gender
       FROM med_ins_register inner join meditation_instructor on meditation_instructor.meditation_instructor_id = med_ins_register.meditation_instructor_id ORDER BY med_ins_register.paid_time DESC");
       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }

     public function medInstructorRegistrationAllProfitSearch($search){
       $this->db->query("SELECT sum((med_ins_register.paid_amount/110)*10) AS profit,  COUNT(med_ins_register.paid_amount) AS no, CONCAT(meditation_instructor.first_name,' ',meditation_instructor.last_name) AS name, meditation_instructor.gender AS gender
       FROM med_ins_register inner join meditation_instructor on meditation_instructor.meditation_instructor_id = med_ins_register.meditation_instructor_id WHERE CONCAT(meditation_instructor.first_name,meditation_instructor.last_name) LIKE '%$search%' ORDER BY med_ins_register.paid_time DESC");
       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }
    

      public function medInstructorRegistrationTodaySearch($search,$today)         
      {
         
        $this->db->query("SELECT * FROM med_ins_register inner join meditation_instructor on meditation_instructor.meditation_instructor_id = med_ins_register.meditation_instructor_id WHERE CONCAT(meditation_instructor.first_name,meditation_instructor.last_name) LIKE '%$search%' AND DATE(med_ins_register.paid_time)=:today ORDER BY med_ins_register.paid_time DESC");
        $this->db->bind(':today',$today);                                                                                                                                                                                                         

        $result=$this->db->resultSet();
         return $result;
      } 

      public function medInstructorRegistrationToday($today)        
      {
        $this->db->query("SELECT * FROM med_ins_register inner join meditation_instructor on meditation_instructor.meditation_instructor_id = med_ins_register.meditation_instructor_id WHERE DATE(med_ins_register.paid_time)=:today ORDER BY med_ins_register.paid_time DESC");
        $this->db->bind(':today',$today);

        $result=$this->db->resultSet();
         return $result;
      }

      public function medInstructorRegistrationTodayProfit($today){
       $this->db->query("SELECT sum((med_ins_register.paid_amount/110)*10) AS profit,  COUNT(med_ins_register.paid_amount) AS no,  meditation_instructor.gender AS gender
       FROM med_ins_register inner join meditation_instructor on meditation_instructor.meditation_instructor_id = med_ins_register.meditation_instructor_id  WHERE DATE(med_ins_register.paid_time)=:today ORDER BY med_ins_register.paid_time DESC");
       $this->db->bind(':today',$today);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }
     

     public function medInstructorRegistrationTodayProfitSearch($search,$today){
       $this->db->query("SELECT sum((med_ins_register.paid_amount/110)*10) AS profit, COUNT(med_ins_register.paid_amount) AS no, CONCAT(meditation_instructor.first_name,' ',meditation_instructor.last_name) AS name, meditation_instructor.gender AS gender
        FROM med_ins_register inner join meditation_instructor on meditation_instructor.meditation_instructor_id = med_ins_register.meditation_instructor_id  WHERE DATE(med_ins_register.paid_time)=:today AND CONCAT(meditation_instructor.first_name,meditation_instructor.last_name) LIKE '%$search%' ORDER BY med_ins_register.paid_time DESC");
       $this->db->bind(':today',$today);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }
     



      public function  medInstructorRegistrationYesterdaySearch($search,$yesterday)        
      {
        $this->db->query("SELECT * FROM med_ins_register inner join meditation_instructor on meditation_instructor.meditation_instructor_id = med_ins_register.meditation_instructor_id WHERE CONCAT(meditation_instructor.first_name,meditation_instructor.last_name) LIKE '%$search%' AND DATE(med_ins_register.paid_time)=:yesterday ORDER BY med_ins_register.paid_time DESC");
        $this->db->bind(':yesterday',$yesterday);

        $result=$this->db->resultSet();
         return $result;
      } 

      public function   medInstructorRegistrationYesterday($yesterday)        
      {
        $this->db->query("SELECT * FROM med_ins_register inner join meditation_instructor on meditation_instructor.meditation_instructor_id = med_ins_register.meditation_instructor_id WHERE DATE(med_ins_register.paid_time)=:yesterday ORDER BY med_ins_register.paid_time DESC");
        $this->db->bind(':yesterday',$yesterday);

        $result=$this->db->resultSet();
         return $result;
      }

      public function medInstructorRegistrationYesterdayProfit($yesterday){
       $this->db->query("SELECT sum((med_ins_register.paid_amount/110)*10) AS profit, COUNT(med_ins_register.paid_amount) AS no, meditation_instructor.gender AS gender
       FROM med_ins_register inner join meditation_instructor on meditation_instructor.meditation_instructor_id = med_ins_register.meditation_instructor_id  WHERE DATE(med_ins_register.paid_time)=:yesterday ORDER BY med_ins_register.paid_time DESC");
       $this->db->bind(':yesterday',$yesterday);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }

     public function medInstructorRegistrationYesterdayProfitSearch($search,$yesterday){
       $this->db->query("SELECT sum((med_ins_register.paid_amount/110)*10) AS profit, meditation_instructor.gender AS gender, COUNT(med_ins_register.paid_amount) AS no, CONCAT(meditation_instructor.first_name,' ',meditation_instructor.last_name) AS name
       FROM med_ins_register inner join meditation_instructor on meditation_instructor.meditation_instructor_id = med_ins_register.meditation_instructor_id  WHERE DATE(med_ins_register.paid_time)=:yesterday AND CONCAT(meditation_instructor.first_name,meditation_instructor.last_name) LIKE '%$search%' ORDER BY med_ins_register.paid_time DESC");
       $this->db->bind(':yesterday',$yesterday);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }

      public function  medInstructorRegistrationThisMonthSearch($search,$month,$year)       
      {
        $this->db->query("SELECT * FROM med_ins_register inner join meditation_instructor on meditation_instructor.meditation_instructor_id = med_ins_register.meditation_instructor_id WHERE CONCAT(meditation_instructor.first_name,meditation_instructor.last_name) LIKE '%$search%' AND MONTH(med_ins_register.paid_time)=:month AND YEAR(med_ins_register.paid_time)=:year ORDER BY med_ins_register.paid_time DESC ");
        $this->db->bind(':month',$month);
        $this->db->bind(':year',$year);

     
        $result=$this->db->resultSet();
         return $result;
      } 

      public function  medInstructorRegistrationThisMonth($month,$year)       
      {
        $this->db->query("SELECT * FROM med_ins_register inner join meditation_instructor on meditation_instructor.meditation_instructor_id = med_ins_register.meditation_instructor_id  WHERE MONTH(med_ins_register.paid_time)=:month AND YEAR(med_ins_register.paid_time)=:year ORDER BY med_ins_register.paid_time DESC");
        $this->db->bind(':month',$month);
        $this->db->bind(':year',$year);

        $result=$this->db->resultSet();
         return $result;
      }

      public function medInstructorRegistrationThisMonthProfit($month,$year){
       $this->db->query("SELECT sum((med_ins_register.paid_amount/110)*10) AS profit, meditation_instructor.gender AS gender, COUNT(med_ins_register.paid_amount) AS no FROM med_ins_register inner join meditation_instructor on meditation_instructor.meditation_instructor_id = med_ins_register.meditation_instructor_id  WHERE  MONTH(med_ins_register.paid_time)=:month AND YEAR(med_ins_register.paid_time)=:year ORDER BY med_ins_register.paid_time DESC");
       $this->db->bind(':month',$month);
       $this->db->bind(':year',$year);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }

     public function medInstructorRegistrationThisMonthProfitSearch($search,$month,$year){
       $this->db->query("SELECT sum((med_ins_register.paid_amount/110)*10) AS profit, meditation_instructor.gender AS gender, COUNT(med_ins_register.paid_amount) AS no, CONCAT(meditation_instructor.first_name,' ',meditation_instructor.last_name) AS name
       FROM med_ins_register inner join meditation_instructor on meditation_instructor.meditation_instructor_id = med_ins_register.meditation_instructor_id  WHERE  MONTH(med_ins_register.paid_time)=:month AND YEAR(med_ins_register.paid_time)=:year AND CONCAT(meditation_instructor.first_name,meditation_instructor.last_name) LIKE '%$search%' ORDER BY med_ins_register.paid_time DESC");
       $this->db->bind(':month',$month);
       $this->db->bind(':year',$year);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }

      public function  medInstructorRegistrationThisYearSearch($search,$year)        
      {
        $this->db->query("SELECT * FROM med_ins_register inner join meditation_instructor on meditation_instructor.meditation_instructor_id = med_ins_register.meditation_instructor_id WHERE CONCAT(meditation_instructor.first_name,meditation_instructor.last_name) LIKE '%$search%' AND YEAR(med_ins_register.paid_time)=:year ORDER BY med_ins_register.paid_time DESC");
        $this->db->bind(':year',$year);

        $result=$this->db->resultSet();
         return $result;
      } 

      public function   medInstructorRegistrationThisYear($year)        
      {
        $this->db->query("SELECT * FROM med_ins_register inner join meditation_instructor on meditation_instructor.meditation_instructor_id = med_ins_register.meditation_instructor_id WHERE YEAR(med_ins_register.paid_time)=:year ORDER BY med_ins_register.paid_time DESC");
        $this->db->bind(':year',$year);

        $result=$this->db->resultSet();
         return $result;
      }


      public function medInstructorRegistrationThisYearProfit($year){
       $this->db->query("SELECT sum((med_ins_register.paid_amount/110)*10) AS profit, COUNT(med_ins_register.paid_amount) AS no, meditation_instructor.gender AS gender
       FROM med_ins_register inner join meditation_instructor on meditation_instructor.meditation_instructor_id = med_ins_register.meditation_instructor_id  WHERE  YEAR(med_ins_register.paid_time)=:year ORDER BY med_ins_register.paid_time DESC");
       $this->db->bind(':year',$year);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }

     public function medInstructorRegistrationThisYearProfitSearch($search,$year){
       $this->db->query("SELECT sum((med_ins_register.paid_amount/110)*10) AS profit, CONCAT(meditation_instructor.first_name,' ',meditation_instructor.last_name) AS name, COUNT(med_ins_register.paid_amount) AS no, meditation_instructor.gender AS gender
       FROM med_ins_register inner join meditation_instructor on meditation_instructor.meditation_instructor_id = med_ins_register.meditation_instructor_id  WHERE  YEAR(med_ins_register.paid_time)=:year AND CONCAT(meditation_instructor.first_name,meditation_instructor.last_name) LIKE '%$search%' ORDER BY med_ins_register.paid_time DESC");
       $this->db->bind(':year',$year);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }
     
     public function medInstructorRegistrationDetails($id)
     {
       $this->db->query("SELECT * FROM med_ins_register inner join meditation_instructor on meditation_instructor.meditation_instructor_id = med_ins_register.meditation_instructor_id  WHERE   med_ins_register.med_ins_registration_id=:id");
       $this->db->bind(':id',$id);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }


//     Nutritionist Diet Plan



      public function  nutritionistDietPlanAllSearch($search)         
      {
        $this->db->query("SELECT * FROM request_diet_plan inner join nutritionist on nutritionist.nutritionist_id = request_diet_plan.nutritionist_id WHERE CONCAT(nutritionist.first_name,nutritionist.last_name) LIKE '%$search%' ORDER BY request_diet_plan.requested_date_and_time DESC ");
        $result=$this->db->resultSet();
         return $result;
      } 

      public function  nutritionistDietPlanAll()         
      {
        $this->db->query("SELECT * FROM request_diet_plan inner join nutritionist on nutritionist.nutritionist_id = request_diet_plan.nutritionist_id ORDER BY request_diet_plan.requested_date_and_time DESC");
       
        $result=$this->db->resultSet();
         return $result;
      }

      public function nutritionistDietPlanAllProfit(){
       $this->db->query("SELECT sum((request_diet_plan.paid_amount/110)*10) AS profit, COUNT(request_diet_plan.paid_amount) AS no FROM request_diet_plan inner join nutritionist on nutritionist.nutritionist_id = request_diet_plan.nutritionist_id ORDER BY request_diet_plan.requested_date_and_time DESC");
       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }

     public function nutritionistDietPlanAllProfitSearch($search){
       $this->db->query("SELECT sum((request_diet_plan.paid_amount/110)*10) AS profit,  COUNT(request_diet_plan.paid_amount) AS no, CONCAT(nutritionist.first_name,' ',nutritionist.last_name) AS name FROM request_diet_plan inner join nutritionist on nutritionist.nutritionist_id = request_diet_plan.nutritionist_id WHERE CONCAT(nutritionist.first_name,nutritionist.last_name) LIKE '%$search%' ORDER BY request_diet_plan.requested_date_and_time DESC");
       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }
    

      public function nutritionistDietPlanTodaySearch($search,$today)         
      {
         
        $this->db->query("SELECT * FROM request_diet_plan inner join nutritionist on nutritionist.nutritionist_id = request_diet_plan.nutritionist_id WHERE CONCAT(nutritionist.first_name,nutritionist.last_name) LIKE '%$search%' AND DATE(request_diet_plan.requested_date_and_time)=:today ORDER BY request_diet_plan.requested_date_and_time DESC");
        $this->db->bind(':today',$today);                                                                                                                                                                                                         

        $result=$this->db->resultSet();
         return $result;
      } 

      public function nutritionistDietPlanToday($today)        
      {
        $this->db->query("SELECT * FROM request_diet_plan inner join nutritionist on nutritionist.nutritionist_id = request_diet_plan.nutritionist_id WHERE DATE(request_diet_plan.requested_date_and_time)=:today ORDER BY request_diet_plan.requested_date_and_time DESC");
        $this->db->bind(':today',$today);

        $result=$this->db->resultSet();
         return $result;
      }

      public function nutritionistDietPlanTodayProfit($today){
       $this->db->query("SELECT sum((request_diet_plan.paid_amount/110)*10) AS profit,  COUNT(request_diet_plan.paid_amount) AS no  FROM request_diet_plan inner join nutritionist on nutritionist.nutritionist_id = request_diet_plan.nutritionist_id  WHERE DATE(request_diet_plan.requested_date_and_time)=:today ORDER BY request_diet_plan.requested_date_and_time DESC");
       $this->db->bind(':today',$today);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }
     

     public function nutritionistDietPlanTodayProfitSearch($search,$today){
       $this->db->query("SELECT sum((request_diet_plan.paid_amount/110)*10) AS profit, COUNT(request_diet_plan.paid_amount) AS no, CONCAT(nutritionist.first_name,' ',nutritionist.last_name) AS name, COUNT(request_diet_plan.paid_amount) AS no FROM request_diet_plan inner join nutritionist on nutritionist.nutritionist_id = request_diet_plan.nutritionist_id  WHERE DATE(request_diet_plan.requested_date_and_time)=:today AND CONCAT(nutritionist.first_name,nutritionist.last_name) LIKE '%$search%' ORDER BY request_diet_plan.requested_date_and_time DESC");
       $this->db->bind(':today',$today);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }
     



      public function  nutritionistDietPlanYesterdaySearch($search,$yesterday)        
      {
        $this->db->query("SELECT * FROM request_diet_plan inner join nutritionist on nutritionist.nutritionist_id = request_diet_plan.nutritionist_id WHERE CONCAT(nutritionist.first_name,nutritionist.last_name) LIKE '%$search%' AND DATE(request_diet_plan.requested_date_and_time)=:yesterday ORDER BY request_diet_plan.requested_date_and_time DESC");
        $this->db->bind(':yesterday',$yesterday);

        $result=$this->db->resultSet();
         return $result;
      } 

      public function   nutritionistDietPlanYesterday($yesterday)        
      {
        $this->db->query("SELECT * FROM request_diet_plan inner join nutritionist on nutritionist.nutritionist_id = request_diet_plan.nutritionist_id WHERE DATE(request_diet_plan.requested_date_and_time)=:yesterday ORDER BY request_diet_plan.requested_date_and_time DESC");
        $this->db->bind(':yesterday',$yesterday);

        $result=$this->db->resultSet();
         return $result;
      }

      public function nutritionistDietPlanYesterdayProfit($yesterday){
       $this->db->query("SELECT sum((request_diet_plan.paid_amount/110)*10) AS profit, COUNT(request_diet_plan.paid_amount) AS no, CONCAT(nutritionist.first_name,' ',nutritionist.last_name) AS name
       FROM request_diet_plan inner join nutritionist on nutritionist.nutritionist_id = request_diet_plan.nutritionist_id  WHERE DATE(request_diet_plan.requested_date_and_time)=:yesterday ORDER BY request_diet_plan.requested_date_and_time DESC");
       $this->db->bind(':yesterday',$yesterday);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }

     public function nutritionistDietPlanYesterdayProfitSearch($search,$yesterday){
       $this->db->query("SELECT sum((request_diet_plan.paid_amount/110)*10) AS profit, COUNT(request_diet_plan.paid_amount) AS no, CONCAT(nutritionist.first_name,' ',nutritionist.last_name) AS name
       FROM request_diet_plan inner join nutritionist on nutritionist.nutritionist_id = request_diet_plan.nutritionist_id  WHERE DATE(request_diet_plan.requested_date_and_time)=:yesterday AND CONCAT(nutritionist.first_name,nutritionist.last_name) LIKE '%$search%' ORDER BY request_diet_plan.requested_date_and_time DESC");
       $this->db->bind(':yesterday',$yesterday);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }

      public function  nutritionistDietPlanThisMonthSearch($search,$month,$year)       
      {
        $this->db->query("SELECT * FROM request_diet_plan inner join nutritionist on nutritionist.nutritionist_id = request_diet_plan.nutritionist_id WHERE CONCAT(nutritionist.first_name,nutritionist.last_name) LIKE '%$search%' AND MONTH(request_diet_plan.requested_date_and_time)=:month AND YEAR(request_diet_plan.requested_date_and_time)=:year ORDER BY request_diet_plan.requested_date_and_time DESC ");
        $this->db->bind(':month',$month);
        $this->db->bind(':year',$year);

     
        $result=$this->db->resultSet();
         return $result;
      } 

      public function  nutritionistDietPlanThisMonth($month,$year)       
      {
        $this->db->query("SELECT * FROM request_diet_plan inner join nutritionist on nutritionist.nutritionist_id = request_diet_plan.nutritionist_id  WHERE MONTH(request_diet_plan.requested_date_and_time)=:month AND YEAR(request_diet_plan.requested_date_and_time)=:year ORDER BY request_diet_plan.requested_date_and_time DESC");
        $this->db->bind(':month',$month);
        $this->db->bind(':year',$year);

        $result=$this->db->resultSet();
         return $result;
      }

      public function nutritionistDietPlanThisMonthProfit($month,$year){
       $this->db->query("SELECT sum((request_diet_plan.paid_amount/110)*10) AS profit, COUNT(request_diet_plan.paid_amount) AS no FROM request_diet_plan inner join nutritionist on nutritionist.nutritionist_id = request_diet_plan.nutritionist_id  WHERE  MONTH(request_diet_plan.requested_date_and_time)=:month AND YEAR(request_diet_plan.requested_date_and_time)=:year ORDER BY request_diet_plan.requested_date_and_time DESC");
       $this->db->bind(':month',$month);
       $this->db->bind(':year',$year);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }

     public function nutritionistDietPlanThisMonthProfitSearch($search,$month,$year){
       $this->db->query("SELECT sum((request_diet_plan.paid_amount/110)*10) AS profit, COUNT(request_diet_plan.paid_amount) AS no, CONCAT(nutritionist.first_name,' ',nutritionist.last_name) AS name
       FROM request_diet_plan inner join nutritionist on nutritionist.nutritionist_id = request_diet_plan.nutritionist_id  WHERE  MONTH(request_diet_plan.requested_date_and_time)=:month AND YEAR(request_diet_plan.requested_date_and_time)=:year AND CONCAT(nutritionist.first_name,nutritionist.last_name) LIKE '%$search%' ORDER BY request_diet_plan.requested_date_and_time DESC");
       $this->db->bind(':month',$month);
       $this->db->bind(':year',$year);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }

      public function  nutritionistDietPlanThisYearSearch($search,$year)        
      {
        $this->db->query("SELECT * FROM request_diet_plan inner join nutritionist on nutritionist.nutritionist_id = request_diet_plan.nutritionist_id WHERE CONCAT(nutritionist.first_name,nutritionist.last_name) LIKE '%$search%' AND YEAR(request_diet_plan.requested_date_and_time)=:year ORDER BY request_diet_plan.requested_date_and_time DESC");
        $this->db->bind(':year',$year);

        $result=$this->db->resultSet();
         return $result;
      } 

      public function   nutritionistDietPlanThisYear($year)        
      {
        $this->db->query("SELECT * FROM request_diet_plan inner join nutritionist on nutritionist.nutritionist_id = request_diet_plan.nutritionist_id WHERE YEAR(request_diet_plan.requested_date_and_time)=:year ORDER BY request_diet_plan.requested_date_and_time DESC");
        $this->db->bind(':year',$year);

        $result=$this->db->resultSet();
         return $result;
      }


      public function nutritionistDietPlanThisYearProfit($year){
       $this->db->query("SELECT sum((request_diet_plan.paid_amount/110)*10) AS profit, COUNT(request_diet_plan.paid_amount) AS no FROM request_diet_plan inner join nutritionist on nutritionist.nutritionist_id = request_diet_plan.nutritionist_id  WHERE  YEAR(request_diet_plan.requested_date_and_time)=:year ORDER BY request_diet_plan.requested_date_and_time DESC");
       $this->db->bind(':year',$year);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }

     public function nutritionistDietPlanThisYearProfitSearch($search,$year){
       $this->db->query("SELECT sum((request_diet_plan.paid_amount/110)*10) AS profit, CONCAT(nutritionist.first_name,' ',nutritionist.last_name) AS name, COUNT(request_diet_plan.paid_amount) AS no FROM request_diet_plan inner join nutritionist on nutritionist.nutritionist_id = request_diet_plan.nutritionist_id  WHERE  YEAR(request_diet_plan.requested_date_and_time)=:year AND CONCAT(nutritionist.first_name,nutritionist.last_name) LIKE '%$search%' ORDER BY request_diet_plan.requested_date_and_time DESC");
       $this->db->bind(':year',$year);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }
     
     public function nutritionistDietPlanDetails($id)
     {
       $this->db->query("SELECT * FROM request_diet_plan inner join nutritionist on nutritionist.nutritionist_id = request_diet_plan.nutritionist_id  WHERE   request_diet_plan.request_diet_plan_id=:id");
       $this->db->bind(':id',$id);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }


//     Pharmacist Order



      public function  pharmacistOrderAllSearch($search)         
      {
        $this->db->query("SELECT * FROM accept_order inner join pharmacist on pharmacist.pharmacist_id = accept_order.pharmacist_id WHERE CONCAT(pharmacist.first_name,pharmacist.last_name) LIKE '%$search%' ORDER BY accept_order.paid_time DESC ");
        $result=$this->db->resultSet();
         return $result;
      } 

      public function  pharmacistOrderAll()         
      {
        $this->db->query("SELECT * FROM accept_order inner join pharmacist on pharmacist.pharmacist_id = accept_order.pharmacist_id ORDER BY accept_order.paid_time DESC");
       
        $result=$this->db->resultSet();
         return $result;
      }

      public function pharmacistOrderAllProfit(){
       $this->db->query("SELECT sum((accept_order.charge/110)*10) AS profit, COUNT(accept_order.charge) AS no, pharmacist.gender AS gender FROM accept_order inner join pharmacist on pharmacist.pharmacist_id = accept_order.pharmacist_id ORDER BY accept_order.paid_time DESC");
       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }

     public function pharmacistOrderAllProfitSearch($search){
       $this->db->query("SELECT sum((accept_order.charge/110)*10) AS profit,  COUNT(accept_order.charge) AS no,  pharmacist.gender AS gender, CONCAT(pharmacist.first_name,' ',pharmacist.last_name) AS name FROM accept_order inner join pharmacist on pharmacist.pharmacist_id = accept_order.pharmacist_id WHERE CONCAT(pharmacist.first_name,pharmacist.last_name) LIKE '%$search%' ORDER BY accept_order.paid_time DESC");
       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }
    

      public function pharmacistOrderTodaySearch($search,$today)         
      {
         
        $this->db->query("SELECT * FROM accept_order inner join pharmacist on pharmacist.pharmacist_id = accept_order.pharmacist_id WHERE CONCAT(pharmacist.first_name,pharmacist.last_name) LIKE '%$search%' AND DATE(accept_order.paid_time)=:today ORDER BY accept_order.paid_time DESC");
        $this->db->bind(':today',$today);                                                                                                                                                                                                         

        $result=$this->db->resultSet();
         return $result;
      } 

      public function pharmacistOrderToday($today)        
      {
        $this->db->query("SELECT * FROM accept_order inner join pharmacist on pharmacist.pharmacist_id = accept_order.pharmacist_id WHERE DATE(accept_order.paid_time)=:today ORDER BY accept_order.paid_time DESC");
        $this->db->bind(':today',$today);

        $result=$this->db->resultSet();
         return $result;
      }

      public function pharmacistOrderTodayProfit($today){
       $this->db->query("SELECT sum((accept_order.charge/110)*10) AS profit,  COUNT(accept_order.charge) AS no,pharmacist.gender AS gender  FROM accept_order inner join pharmacist on pharmacist.pharmacist_id = accept_order.pharmacist_id  WHERE DATE(accept_order.paid_time)=:today ORDER BY accept_order.paid_time DESC");
       $this->db->bind(':today',$today);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }
     

     public function pharmacistOrderTodayProfitSearch($search,$today){
       $this->db->query("SELECT sum((accept_order.charge/110)*10) AS profit, COUNT(accept_order.charge) AS no, pharmacist.gender AS gender, CONCAT(pharmacist.first_name,' ',pharmacist.last_name) AS name, COUNT(accept_order.charge) AS no FROM accept_order inner join pharmacist on pharmacist.pharmacist_id = accept_order.pharmacist_id  WHERE DATE(accept_order.paid_time)=:today AND CONCAT(pharmacist.first_name,pharmacist.last_name) LIKE '%$search%' ORDER BY accept_order.paid_time DESC");
       $this->db->bind(':today',$today);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }
     



      public function  pharmacistOrderYesterdaySearch($search,$yesterday)        
      {
        $this->db->query("SELECT * FROM accept_order inner join pharmacist on pharmacist.pharmacist_id = accept_order.pharmacist_id WHERE CONCAT(pharmacist.first_name,pharmacist.last_name) LIKE '%$search%' AND DATE(accept_order.paid_time)=:yesterday ORDER BY accept_order.paid_time DESC");
        $this->db->bind(':yesterday',$yesterday);

        $result=$this->db->resultSet();
         return $result;
      } 

      public function   pharmacistOrderYesterday($yesterday)        
      {
        $this->db->query("SELECT * FROM accept_order inner join pharmacist on pharmacist.pharmacist_id = accept_order.pharmacist_id WHERE DATE(accept_order.paid_time)=:yesterday ORDER BY accept_order.paid_time DESC");
        $this->db->bind(':yesterday',$yesterday);

        $result=$this->db->resultSet();
         return $result;
      }

      public function pharmacistOrderYesterdayProfit($yesterday){
       $this->db->query("SELECT sum((accept_order.charge/110)*10) AS profit, COUNT(accept_order.charge) AS no, pharmacist.gender AS gender FROM accept_order inner join pharmacist on pharmacist.pharmacist_id = accept_order.pharmacist_id  WHERE DATE(accept_order.paid_time)=:yesterday ORDER BY accept_order.paid_time DESC");
       $this->db->bind(':yesterday',$yesterday);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }

     public function pharmacistOrderYesterdayProfitSearch($search,$yesterday){
       $this->db->query("SELECT sum((accept_order.charge/110)*10) AS profit , pharmacist.gender AS gender,  COUNT(accept_order.charge) AS no, CONCAT(pharmacist.first_name,' ',pharmacist.last_name) AS name
       FROM accept_order inner join pharmacist on pharmacist.pharmacist_id = accept_order.pharmacist_id  WHERE DATE(accept_order.paid_time)=:yesterday AND CONCAT(pharmacist.first_name,pharmacist.last_name) LIKE '%$search%' ORDER BY accept_order.paid_time DESC");
       $this->db->bind(':yesterday',$yesterday);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }

      public function  pharmacistOrderThisMonthSearch($search,$month,$year)       
      {
        $this->db->query("SELECT * FROM accept_order inner join pharmacist on pharmacist.pharmacist_id = accept_order.pharmacist_id WHERE CONCAT(pharmacist.first_name,pharmacist.last_name) LIKE '%$search%' AND MONTH(accept_order.paid_time)=:month AND YEAR(accept_order.paid_time)=:year ORDER BY accept_order.paid_time DESC ");
        $this->db->bind(':month',$month);
        $this->db->bind(':year',$year);

     
        $result=$this->db->resultSet();
         return $result;
      } 

      public function  pharmacistOrderThisMonth($month,$year)       
      {
        $this->db->query("SELECT * FROM accept_order inner join pharmacist on pharmacist.pharmacist_id = accept_order.pharmacist_id  WHERE MONTH(accept_order.paid_time)=:month AND YEAR(accept_order.paid_time)=:year ORDER BY accept_order.paid_time DESC");
        $this->db->bind(':month',$month);
        $this->db->bind(':year',$year);

        $result=$this->db->resultSet();
         return $result;
      }

      public function pharmacistOrderThisMonthProfit($month,$year){
       $this->db->query("SELECT sum((accept_order.charge/110)*10) AS profit, COUNT(accept_order.charge) AS no, pharmacist.gender AS gender FROM accept_order inner join pharmacist on pharmacist.pharmacist_id = accept_order.pharmacist_id  WHERE  MONTH(accept_order.paid_time)=:month AND YEAR(accept_order.paid_time)=:year ORDER BY accept_order.paid_time DESC");
       $this->db->bind(':month',$month);
       $this->db->bind(':year',$year);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }

     public function pharmacistOrderThisMonthProfitSearch($search,$month,$year){
       $this->db->query("SELECT sum((accept_order.charge/110)*10) AS profit, pharmacist.gender AS gender,  COUNT(accept_order.charge) AS no, CONCAT(pharmacist.first_name,' ',pharmacist.last_name) AS name
       FROM accept_order inner join pharmacist on pharmacist.pharmacist_id = accept_order.pharmacist_id  WHERE  MONTH(accept_order.paid_time)=:month AND YEAR(accept_order.paid_time)=:year AND CONCAT(pharmacist.first_name,pharmacist.last_name) LIKE '%$search%' ORDER BY accept_order.paid_time DESC");
       $this->db->bind(':month',$month);
       $this->db->bind(':year',$year);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }

      public function  pharmacistOrderThisYearSearch($search,$year)        
      {
        $this->db->query("SELECT * FROM accept_order inner join pharmacist on pharmacist.pharmacist_id = accept_order.pharmacist_id WHERE CONCAT(pharmacist.first_name,pharmacist.last_name) LIKE '%$search%' AND YEAR(accept_order.paid_time)=:year ORDER BY accept_order.paid_time DESC");
        $this->db->bind(':year',$year);

        $result=$this->db->resultSet();
         return $result;
      } 

      public function   pharmacistOrderThisYear($year)        
      {
        $this->db->query("SELECT * FROM accept_order inner join pharmacist on pharmacist.pharmacist_id = accept_order.pharmacist_id WHERE YEAR(accept_order.paid_time)=:year ORDER BY accept_order.paid_time DESC");
        $this->db->bind(':year',$year);

        $result=$this->db->resultSet();
         return $result;
      }


      public function pharmacistOrderThisYearProfit($year){
       $this->db->query("SELECT sum((accept_order.charge/110)*10) AS profit, COUNT(accept_order.charge) AS no, pharmacist.gender AS gender FROM accept_order inner join pharmacist on pharmacist.pharmacist_id = accept_order.pharmacist_id  WHERE  YEAR(accept_order.paid_time)=:year ORDER BY accept_order.paid_time DESC");
       $this->db->bind(':year',$year);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }

     public function pharmacistOrderThisYearProfitSearch($search,$year){
       $this->db->query("SELECT sum((accept_order.charge/110)*10) AS profit, pharmacist.gender AS gender, CONCAT(pharmacist.first_name,' ',pharmacist.last_name) AS name, COUNT(accept_order.charge) AS no FROM accept_order inner join pharmacist on pharmacist.pharmacist_id = accept_order.pharmacist_id  WHERE  YEAR(accept_order.paid_time)=:year AND CONCAT(pharmacist.first_name,pharmacist.last_name) LIKE '%$search%' ORDER BY accept_order.paid_time DESC");
       $this->db->bind(':year',$year);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }
     
     public function pharmacistOrderDetails($id)
     {
       $this->db->query("SELECT * FROM accept_order inner join pharmacist on pharmacist.pharmacist_id = accept_order.pharmacist_id  WHERE   accept_order.order_id=:id");
       $this->db->bind(':id',$id);

       $row= $this->db->single();

       if($this->db->rowCount() >0){
             return $row;
       }else{
             return false;
       }
        
     }



     //     Session Registration



     public function  sessionRegistrationAllSearch($search)         
     {
       $this->db->query("SELECT *,nutritionist.first_name AS nutritionist_first_name, nutritionist.last_name AS nutritionist_last_name,counsellor.first_name AS counsellor_first_name, counsellor.last_name AS counsellor_last_name
       FROM session_register
       LEFT JOIN session ON session_register.session_id = session.session_id
       LEFT JOIN counsellor ON session.counsellor_id = counsellor.counsellor_id
       LEFT JOIN nutritionist ON session.nutritionist_id = nutritionist.nutritionist_id
       LEFT JOIN meditation_instructor ON session.meditation_instructor_id = meditation_instructor.meditation_instructor_id
       WHERE CONCAT(nutritionist.first_name, nutritionist.last_name) LIKE '%$search%'
         OR CONCAT(counsellor.first_name, counsellor.last_name) LIKE '%$search%'
         OR CONCAT(meditation_instructor.first_name, meditation_instructor.last_name) LIKE '%$search%'
       ORDER BY session_register.registered_date_and_time DESC
       
        ");
       $result=$this->db->resultSet();
        return $result;
     } 

     public function  sessionRegistrationAll()         
     {
       $this->db->query("SELECT *,nutritionist.first_name AS nutritionist_first_name, nutritionist.last_name AS nutritionist_last_name,counsellor.first_name AS counsellor_first_name, counsellor.last_name AS counsellor_last_name  
       FROM session_register
       LEFT JOIN session ON session_register.session_id = session.session_id 
       LEFT JOIN nutritionist ON session.nutritionist_id = nutritionist.nutritionist_id
       LEFT JOIN counsellor ON session.counsellor_id = counsellor.counsellor_id
       LEFT JOIN meditation_instructor ON session.meditation_instructor_id = meditation_instructor.meditation_instructor_id
      
       ORDER BY session_register.registered_date_and_time DESC");
      
       $result=$this->db->resultSet();
        return $result;
     }

     public function sessionRegistrationAllProfit(){
      $this->db->query("SELECT sum((session_register.paid_amount/110)*10) AS profit, COUNT(session_register.paid_amount) AS no FROM session_register LEFT JOIN session ON session_register.session_id = session.session_id
      LEFT JOIN counsellor ON session.counsellor_id = counsellor.counsellor_id
      LEFT JOIN nutritionist ON session.nutritionist_id = nutritionist.nutritionist_id
      LEFT JOIN meditation_instructor ON session.meditation_instructor_id = meditation_instructor.meditation_instructor_id ORDER BY session_register.registered_date_and_time DESC");
      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return $row;
      }else{
            return false;
      }
       
    }

    public function sessionRegistrationAllProfitSearch($search){
      $this->db->query("SELECT sum((session_register.paid_amount/110)*10) AS profit,  COUNT(session_register.paid_amount) AS no, CONCAT(nutritionist.first_name,' ',nutritionist.last_name) AS nutritionist_name, CONCAT(counsellor.first_name,' ',counsellor.last_name) AS counsellor_name,CONCAT(meditation_instructor.first_name,' ',meditation_instructor.last_name) AS meditation_instructor_name, meditation_instructor.gender AS meditation_instructor_gender FROM session_register session_register LEFT JOIN session ON session_register.session_id = session.session_id
      LEFT JOIN counsellor ON session.counsellor_id = counsellor.counsellor_id
      LEFT JOIN nutritionist ON session.nutritionist_id = nutritionist.nutritionist_id
      LEFT JOIN meditation_instructor ON session.meditation_instructor_id = meditation_instructor.meditation_instructor_id WHERE CONCAT(nutritionist.first_name,nutritionist.last_name) LIKE '%$search%' OR CONCAT(meditation_instructor.first_name,meditation_instructor.last_name) LIKE '%$search%' OR 
      CONCAT(counsellor.first_name,counsellor.last_name) LIKE '%$search%' ORDER BY session_register.registered_date_and_time DESC");
      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return $row;
      }else{
            return false;
      }
       
    }

      
      public function sessionRegistrationTodaySearch($search, $today)         
      {
      $this->db->query("SELECT *,nutritionist.first_name AS nutritionist_first_name, nutritionist.last_name AS nutritionist_last_name,counsellor.first_name AS counsellor_first_name, counsellor.last_name AS counsellor_last_name
      FROM session_register
      LEFT JOIN session ON session_register.session_id = session.session_id
      LEFT JOIN counsellor ON session.counsellor_id = counsellor.counsellor_id
      LEFT JOIN nutritionist ON session.nutritionist_id = nutritionist.nutritionist_id
      LEFT JOIN meditation_instructor ON session.meditation_instructor_id = meditation_instructor.meditation_instructor_id
      WHERE (CONCAT(nutritionist.first_name,nutritionist.last_name) LIKE '%$search%'
      OR CONCAT(counsellor.first_name,counsellor.last_name) LIKE '%$search%'
      OR CONCAT(meditation_instructor.first_name,meditation_instructor.last_name) LIKE '%$search%')
      AND DATE(session_register.registered_date_and_time)=:today
      ORDER BY session_register.registered_date_and_time DESC");

      $this->db->bind(':today', $today);
      $result = $this->db->resultSet();
      return $result;
      }


     public function sessionRegistrationToday($today)        
     {
       $this->db->query("SELECT *,nutritionist.first_name AS nutritionist_first_name, nutritionist.last_name AS nutritionist_last_name,counsellor.first_name AS counsellor_first_name, counsellor.last_name AS counsellor_last_name  
       FROM session_register
       LEFT JOIN session ON session_register.session_id = session.session_id 
       LEFT JOIN nutritionist ON session.nutritionist_id = nutritionist.nutritionist_id
       LEFT JOIN counsellor ON session.counsellor_id = counsellor.counsellor_id
       LEFT JOIN meditation_instructor ON session.meditation_instructor_id = meditation_instructor.meditation_instructor_id WHERE DATE(session_register.registered_date_and_time)=:today ORDER BY session_register.registered_date_and_time DESC");

       $this->db->bind(':today',$today);

       $result=$this->db->resultSet();
        return $result;

        
     }

     public function sessionRegistrationTodayProfit($today){
 
      $this->db->query("SELECT sum((session_register.paid_amount/110)*10) AS profit, COUNT(session_register.paid_amount) AS no FROM session_register LEFT JOIN session ON session_register.session_id = session.session_id
      LEFT JOIN counsellor ON session.counsellor_id = counsellor.counsellor_id
      LEFT JOIN nutritionist ON session.nutritionist_id = nutritionist.nutritionist_id
      LEFT JOIN meditation_instructor ON session.meditation_instructor_id = meditation_instructor.meditation_instructor_id WHERE DATE(session_register.registered_date_and_time)=:today ORDER BY session_register.registered_date_and_time DESC");
     
      $this->db->bind(':today',$today);

      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return $row;
      }else{
            return false;
      }
       
    }
    

    public function sessionRegistrationTodayProfitSearch($search,$today){
      
      $this->db->query("SELECT sum((session_register.paid_amount/110)*10) AS profit,  COUNT(session_register.paid_amount) AS no, CONCAT(nutritionist.first_name,' ',nutritionist.last_name) AS nutritionist_name, CONCAT(counsellor.first_name,' ',counsellor.last_name) AS counsellor_name,CONCAT(meditation_instructor.first_name,' ',meditation_instructor.last_name) AS meditation_instructor_name, meditation_instructor.gender AS meditation_instructor_gender FROM session_register LEFT JOIN session ON session_register.session_id = session.session_id
      LEFT JOIN counsellor ON session.counsellor_id = counsellor.counsellor_id
      LEFT JOIN nutritionist ON session.nutritionist_id = nutritionist.nutritionist_id
      LEFT JOIN meditation_instructor ON session.meditation_instructor_id = meditation_instructor.meditation_instructor_id WHERE CONCAT(nutritionist.first_name,nutritionist.last_name) LIKE '%$search%' OR CONCAT(meditation_instructor.first_name,meditation_instructor.last_name) LIKE '%$search%' OR CONCAT(counsellor.first_name,counsellor.last_name)  LIKE '%$search%' AND DATE(session_register.registered_date_and_time)=:today ORDER BY session_register.registered_date_and_time DESC");

      $this->db->bind(':today',$today);

      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return $row;
      }else{
            return false;
      }
    }
    



     public function  sessionRegistrationYesterdaySearch($search,$yesterday)        
     {
        $this->db->query("SELECT *,nutritionist.first_name AS nutritionist_first_name, nutritionist.last_name AS nutritionist_last_name,counsellor.first_name AS counsellor_first_name, counsellor.last_name AS counsellor_last_name
        FROM session_register
        LEFT JOIN session ON session_register.session_id = session.session_id
        LEFT JOIN counsellor ON session.counsellor_id = counsellor.counsellor_id
        LEFT JOIN nutritionist ON session.nutritionist_id = nutritionist.nutritionist_id
        LEFT JOIN meditation_instructor ON session.meditation_instructor_id = meditation_instructor.meditation_instructor_id
        WHERE (CONCAT(nutritionist.first_name,nutritionist.last_name) LIKE '%$search%'
        OR CONCAT(counsellor.first_name,counsellor.last_name) LIKE '%$search%'
        OR CONCAT(meditation_instructor.first_name,meditation_instructor.last_name) LIKE '%$search%')
        AND DATE(session_register.registered_date_and_time)=:yesterday
        ORDER BY session_register.registered_date_and_time DESC");
  
        $this->db->bind(':yesterday',$yesterday);
        $result = $this->db->resultSet();
        return $result;
     } 

     public function   sessionRegistrationYesterday($yesterday)        
     {
        $this->db->query("SELECT *,nutritionist.first_name AS nutritionist_first_name, nutritionist.last_name AS nutritionist_last_name,counsellor.first_name AS counsellor_first_name, counsellor.last_name AS counsellor_last_name  
        FROM session_register
        LEFT JOIN session ON session_register.session_id = session.session_id 
        LEFT JOIN nutritionist ON session.nutritionist_id = nutritionist.nutritionist_id
        LEFT JOIN counsellor ON session.counsellor_id = counsellor.counsellor_id
        LEFT JOIN meditation_instructor ON session.meditation_instructor_id = meditation_instructor.meditation_instructor_id WHERE DATE(session_register.registered_date_and_time)=:yesterday ORDER BY session_register.registered_date_and_time DESC");
 
        $this->db->bind(':yesterday',$yesterday);

        $result=$this->db->resultSet();
         return $result;

     }

     public function sessionRegistrationYesterdayProfit($yesterday){
     
      $this->db->query("SELECT sum((session_register.paid_amount/110)*10) AS profit, COUNT(session_register.paid_amount) AS no FROM session_register LEFT JOIN session ON session_register.session_id = session.session_id
      LEFT JOIN counsellor ON session.counsellor_id = counsellor.counsellor_id
      LEFT JOIN nutritionist ON session.nutritionist_id = nutritionist.nutritionist_id
      LEFT JOIN meditation_instructor ON session.meditation_instructor_id = meditation_instructor.meditation_instructor_id WHERE DATE(session_register.registered_date_and_time)=:yesterday  ORDER BY session_register.registered_date_and_time DESC");
     
     $this->db->bind(':yesterday',$yesterday);

      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return $row;
      }else{
            return false;
      }
       
    }

    public function sessionRegistrationYesterdayProfitSearch($search,$yesterday){
    
      $this->db->query("SELECT sum((session_register.paid_amount/110)*10) AS profit,  COUNT(session_register.paid_amount) AS no, CONCAT(nutritionist.first_name,' ',nutritionist.last_name) AS nutritionist_name, CONCAT(counsellor.first_name,' ',counsellor.last_name) AS counsellor_name,CONCAT(meditation_instructor.first_name,' ',meditation_instructor.last_name) AS meditation_instructor_name, meditation_instructor.gender AS meditation_instructor_gender FROM session_register LEFT JOIN session ON session_register.session_id = session.session_id
      LEFT JOIN counsellor ON session.counsellor_id = counsellor.counsellor_id
      LEFT JOIN nutritionist ON session.nutritionist_id = nutritionist.nutritionist_id
      LEFT JOIN meditation_instructor ON session.meditation_instructor_id = meditation_instructor.meditation_instructor_id WHERE CONCAT(nutritionist.first_name,nutritionist.last_name) LIKE '%$search%' OR CONCAT(meditation_instructor.first_name,meditation_instructor.last_name) LIKE '%$search%' OR CONCAT(counsellor.first_name,counsellor.last_name)  LIKE '%$search%' AND DATE(session_register.registered_date_and_time)=:yesterday ORDER BY session_register.registered_date_and_time DESC");

      $this->db->bind(':yesterday',$yesterday);

      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return $row;
      }else{
            return false;
      }

    }

     public function  sessionRegistrationThisMonthSearch($search,$month,$year)       
     {
        $this->db->query("SELECT *,nutritionist.first_name AS nutritionist_first_name, nutritionist.last_name AS nutritionist_last_name,counsellor.first_name AS counsellor_first_name, counsellor.last_name AS counsellor_last_name
        FROM session_register
        LEFT JOIN session ON session_register.session_id = session.session_id
        LEFT JOIN counsellor ON session.counsellor_id = counsellor.counsellor_id
        LEFT JOIN nutritionist ON session.nutritionist_id = nutritionist.nutritionist_id
        LEFT JOIN meditation_instructor ON session.meditation_instructor_id = meditation_instructor.meditation_instructor_id
        WHERE (CONCAT(nutritionist.first_name,nutritionist.last_name) LIKE '%$search%'
        OR CONCAT(counsellor.first_name,counsellor.last_name) LIKE '%$search%'
        OR CONCAT(meditation_instructor.first_name,meditation_instructor.last_name) LIKE '%$search%')
        AND MONTH(session_register.registered_date_and_time)=:month AND YEAR(session_register.registered_date_and_time)=:year ORDER BY session_register.registered_date_and_time DESC ");

        $this->db->bind(':month',$month);
        $this->db->bind(':year',$year);
        $result = $this->db->resultSet();
        return $result;

     } 

     public function  sessionRegistrationThisMonth($month,$year)       
     {
       $this->db->query("SELECT *,nutritionist.first_name AS nutritionist_first_name, nutritionist.last_name AS nutritionist_last_name,counsellor.first_name AS counsellor_first_name, counsellor.last_name AS counsellor_last_name  
       FROM session_register
       LEFT JOIN session ON session_register.session_id = session.session_id 
       LEFT JOIN nutritionist ON session.nutritionist_id = nutritionist.nutritionist_id
       LEFT JOIN counsellor ON session.counsellor_id = counsellor.counsellor_id
       LEFT JOIN meditation_instructor ON session.meditation_instructor_id = meditation_instructor.meditation_instructor_id WHERE MONTH(session_register.registered_date_and_time)=:month AND YEAR(session_register.registered_date_and_time)=:year ORDER BY session_register.registered_date_and_time DESC");
      
      $this->db->bind(':month',$month);
       $this->db->bind(':year',$year);

       $result=$this->db->resultSet();
        return $result;

     }

     public function sessionRegistrationThisMonthProfit($month,$year){
      
      $this->db->query("SELECT sum((session_register.paid_amount/110)*10) AS profit, COUNT(session_register.paid_amount) AS no FROM session_register LEFT JOIN session ON session_register.session_id = session.session_id
      LEFT JOIN counsellor ON session.counsellor_id = counsellor.counsellor_id
      LEFT JOIN nutritionist ON session.nutritionist_id = nutritionist.nutritionist_id
      LEFT JOIN meditation_instructor ON session.meditation_instructor_id = meditation_instructor.meditation_instructor_id  WHERE  MONTH(session_register.registered_date_and_time)=:month AND YEAR(session_register.registered_date_and_time)=:year ORDER BY session_register.registered_date_and_time DESC");
     
      $this->db->bind(':month',$month);
      $this->db->bind(':year',$year);

      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return $row;
      }else{
            return false;
      }

    }

    public function sessionRegistrationThisMonthProfitSearch($search,$month,$year){

      $this->db->query("SELECT sum((session_register.paid_amount/110)*10) AS profit,  COUNT(session_register.paid_amount) AS no, CONCAT(nutritionist.first_name,' ',nutritionist.last_name) AS nutritionist_name, CONCAT(counsellor.first_name,' ',counsellor.last_name) AS counsellor_name,CONCAT(meditation_instructor.first_name,' ',meditation_instructor.last_name) AS meditation_instructor_name, meditation_instructor.gender AS meditation_instructor_gender FROM session_register LEFT JOIN session ON session_register.session_id = session.session_id
      LEFT JOIN counsellor ON session.counsellor_id = counsellor.counsellor_id
      LEFT JOIN nutritionist ON session.nutritionist_id = nutritionist.nutritionist_id
      LEFT JOIN meditation_instructor ON session.meditation_instructor_id = meditation_instructor.meditation_instructor_id WHERE  CONCAT(nutritionist.first_name,nutritionist.last_name) LIKE '%$search%' OR CONCAT(meditation_instructor.first_name,meditation_instructor.last_name) LIKE '%$search%' OR CONCAT(counsellor.first_name,counsellor.last_name)  LIKE '%$search%' AND MONTH(session_register.registered_date_and_time)=:month AND YEAR(session_register.registered_date_and_time)=:year  ORDER BY session_register.registered_date_and_time DESC");
      
      $this->db->bind(':month',$month);
      $this->db->bind(':year',$year);

      $row= $this->db->single();

      if($this->db->rowCount() >0){
          
            return $row;
           
      }else{
            return false;
      }
      
      
      
    }

     public function  sessionRegistrationThisYearSearch($search,$year)        
     {
       
       $this->db->query("SELECT *,nutritionist.first_name AS nutritionist_first_name, nutritionist.last_name AS nutritionist_last_name,counsellor.first_name AS counsellor_first_name, counsellor.last_name AS counsellor_last_name
      FROM session_register
      LEFT JOIN session ON session_register.session_id = session.session_id
      LEFT JOIN counsellor ON session.counsellor_id = counsellor.counsellor_id
      LEFT JOIN nutritionist ON session.nutritionist_id = nutritionist.nutritionist_id
      LEFT JOIN meditation_instructor ON session.meditation_instructor_id = meditation_instructor.meditation_instructor_id
      WHERE (CONCAT(nutritionist.first_name,nutritionist.last_name) LIKE '%$search%'
      OR CONCAT(counsellor.first_name,counsellor.last_name) LIKE '%$search%'
      OR CONCAT(meditation_instructor.first_name,meditation_instructor.last_name) LIKE '%$search%')
      AND YEAR(session_register.registered_date_and_time)=:year ORDER BY session_register.registered_date_and_time DESC");
       $this->db->bind(':year',$year);

      $result = $this->db->resultSet();
      return $result;

      } 

     public function   sessionRegistrationThisYear($year)        
     {
        $this->db->query("SELECT *,nutritionist.first_name AS nutritionist_first_name, nutritionist.last_name AS nutritionist_last_name,counsellor.first_name AS counsellor_first_name, counsellor.last_name AS counsellor_last_name  
        FROM session_register
        LEFT JOIN session ON session_register.session_id = session.session_id 
        LEFT JOIN nutritionist ON session.nutritionist_id = nutritionist.nutritionist_id
        LEFT JOIN counsellor ON session.counsellor_id = counsellor.counsellor_id
        LEFT JOIN meditation_instructor ON session.meditation_instructor_id = meditation_instructor.meditation_instructor_id WHERE YEAR(session_register.registered_date_and_time)=:year ORDER BY session_register.registered_date_and_time DESC");
      
       $this->db->bind(':year',$year);
 
        $result=$this->db->resultSet();
         return $result;
     
      }


     public function sessionRegistrationThisYearProfit($year){
         
      $this->db->query("SELECT sum((session_register.paid_amount/110)*10) AS profit, COUNT(session_register.paid_amount) AS no FROM session_register LEFT JOIN session ON session_register.session_id = session.session_id
      LEFT JOIN counsellor ON session.counsellor_id = counsellor.counsellor_id
      LEFT JOIN nutritionist ON session.nutritionist_id = nutritionist.nutritionist_id
      LEFT JOIN meditation_instructor ON session.meditation_instructor_id = meditation_instructor.meditation_instructor_id WHERE YEAR(session_register.registered_date_and_time)=:year ORDER BY session_register.registered_date_and_time DESC");
      $this->db->bind(':year',$year);

      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return $row;
      }else{
            return false;
      }

    }

    public function sessionRegistrationThisYearProfitSearch($search,$year){
      
      $this->db->query("SELECT sum((session_register.paid_amount/110)*10) AS profit,  COUNT(session_register.paid_amount) AS no, CONCAT(nutritionist.first_name,' ',nutritionist.last_name) AS nutritionist_name, CONCAT(counsellor.first_name,' ',counsellor.last_name) AS counsellor_name,CONCAT(meditation_instructor.first_name,' ',meditation_instructor.last_name) AS meditation_instructor_name, meditation_instructor.gender AS meditation_instructor_gender FROM session_register LEFT JOIN session ON session_register.session_id = session.session_id
      LEFT JOIN counsellor ON session.counsellor_id = counsellor.counsellor_id
      LEFT JOIN nutritionist ON session.nutritionist_id = nutritionist.nutritionist_id
      LEFT JOIN meditation_instructor ON session.meditation_instructor_id = meditation_instructor.meditation_instructor_id WHERE CONCAT(nutritionist.first_name,nutritionist.last_name) LIKE '%$search%' OR CONCAT(meditation_instructor.first_name,meditation_instructor.last_name) LIKE '%$search%' OR CONCAT(counsellor.first_name,counsellor.last_name)  LIKE '%$search%' AND YEAR(session_register.registered_date_and_time)=:year  ORDER BY session_register.registered_date_and_time DESC");

      $this->db->bind(':year',$year);

      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return $row;
      }else{
            return false;
      }

    }
    
    public function sessionRegistrationNutritionistDetails($id)
    {
      
      $this->db->query("SELECT *FROM session_register
      LEFT JOIN session ON session_register.session_id = session.session_id 
      LEFT JOIN nutritionist ON session.nutritionist_id = nutritionist.nutritionist_id
      WHERE session_registration_id = :id");
       $this->db->bind(':id',$id);
      
 
     $row= $this->db->single();

     if($this->db->rowCount() >0){
           return $row;
     }else{
           return false;
     }       
    }

    public function sessionRegistrationCounsellorDetails($id)
    {
      $this->db->query("SELECT *FROM session_register
      LEFT JOIN session ON session_register.session_id = session.session_id 
      LEFT JOIN counsellor ON session.counsellor_id = counsellor.counsellor_id
      WHERE session_registration_id = :id");
       $this->db->bind(':id',$id);
      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return $row;
      }else{
            return false;
      }
       
    }

    public function sessionRegistrationMedInstructorDetails($id)
    {
      $this->db->query("SELECT *FROM session_register
      LEFT JOIN session ON session_register.session_id = session.session_id 
      LEFT JOIN meditation_instructor ON session.meditation_instructor_id = meditation_instructor.meditation_instructor_id
      WHERE session_registration_id = :id");
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
