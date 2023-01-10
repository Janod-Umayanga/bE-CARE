<?php

   class M_Admin{
      private $db;

      public function __construct() 
      {
        $this->db=new Database();
      } 

      public function register($data)
      {
        $this->db->query('INSERT INTO Users(profile_image,name,email,password) VALUES (:profile_image,:name,:email,:password)');
        $this->db->bind(':profile_image',$data['profile_image_name']);  
        $this->db->bind(':name',$data['name']);  
        $this->db->bind(':email',$data['email']);  
        $this->db->bind(':password',$data['password']);  

        if($this->db->execute()){
             return true;  
        }else{
            return false; 
        }    


      }


      public function findUserByEmail($email)
      {
        $this->db->query('SELECT * FROM admin WHERE email= :email');
        $this->db->bind(':email',$email);  

        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return true;
        }else{
              return false;
        }
    }

     public function login($email,$password){
          $this->db->query('SELECT * FROM admin WHERE email=:email');
          $this->db->bind(':email',$email);
          
          $row= $this->db->single();
          $hashed_password =$row->password;
          if(password_verify($password,$hashed_password)){
             return $row;
          }else{
            return false;
          }  
      }    
     
      public function findUserByID($id)
      {
        $this->db->query('SELECT * FROM admin WHERE admin_id= :id');
        $this->db->bind(':id',$id);  

        $row= $this->db->single();

        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
       }

       
       public function getUserById($postId)
      {
        $this->db->query("SELECT Posts.id as post_id, Posts.image as image, Users.id as user_id, Users.name as user_name, Posts.title as title, Posts.body as body,
        posts.created_at as post_created_at, users.created_at as user_created_at FROM Posts INNER JOIN Users ON Posts.user_id = Users.id WHERE posts.id=:id");

        $this->db->bind(':id',$postId);
        $row=$this->db->single();
        return $row;
 
      }

       public function editUser($data){
        $this->db->query('UPDATE admin set first_name=:first_name, last_name = :last_name, nic = :nic, contact_number=:contact_number, bank_name = :bank_name, account_holder_name = :account_holder_name, branch=:branch, account_number = :account_number, gender = :gender WHERE admin_id = :id');
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name',$data['last_name']);
        $this->db->bind(':nic', $data['nic']);
        $this->db->bind(':contact_number', $data['contact_number']);
        $this->db->bind(':bank_name', $data['bank_name']);
        $this->db->bind(':account_holder_name', $data['account_holder_name']);
        $this->db->bind(':branch', $data['branch']);
        $this->db->bind(':account_number', $data['account_number']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':id', $data['admin_id']);
            

        if($this->db->execute()){
           return true;
        }else{
            return false;
        } 
      }
      

      public function findUserPWMatch($id,$password){
        $this->db->query('SELECT password FROM admin WHERE admin_id=:id');
        $this->db->bind(':id',$id);
        
        $row= $this->db->single();
        $hashed_password =$row->password;
        if(password_verify($password,$hashed_password)){
           return true;
        }else{
          return false;
        }  

      }

      public function changePW($data){

       
        $this->db->query('UPDATE admin set password = :password WHERE admin_id = :id');
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':id', $data['admin_id']);
            

        if($this->db->execute()){
           return true;
        }else{
            return false;
        } 
      }
      

}


 ?>
