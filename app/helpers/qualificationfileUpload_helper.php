<?php 
  
  function uploadFile($file,$file_name, $location){
      $target=PUBROOT.$location.$file_name;

      return move_uploaded_file($file,$target);
  }  

     //uploadFile($data['qualification_file']['tmp_name'],$data['qualification_file_name'],'/upload/doctor_qualification/')
  
     
?>