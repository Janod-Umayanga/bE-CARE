<?php

function emptyInputSignup($first_name,$last_name,$nic,$contact_number,$gender,$email,$password,$passwordRepeat){
 if(empty($first_name) || empty($last_name)|| empty($nic) || empty($contact_number)|| empty($gender)|| empty($email)|| empty($password)|| empty($passwordRepeat)  ){
    $result=true;
 }else{
   $result=false;
 }
 return $result;
}


function invalidEmail($email){

   if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $result=true;
   }
   else{
     $result=false;
   }
   return $result;
}


function pwdMatch($password,$passwordRepeat){

   if($password!==$passwordRepeat){
      $result=true;
   }
   else{
     $result=false;
   }
   return $result;
}


function uidExists($conn,$email){
 $sql="SELECT * FROM admin WHERE email=?;";
 $stmt= mysqli_stmt_init($conn);

 if(!mysqli_stmt_prepare($stmt,$sql)){
   header("location:../addnewadmin.php?error=stmtfailed");
   exit();
 }

mysqli_stmt_bind_param($stmt,"s",$email);
mysqli_stmt_execute($stmt);

$resultData=mysqli_stmt_get_result($stmt);

if($row=mysqli_fetch_assoc($resultData)){
 return $row;
}else{
 $result=false;
 return $result;
}

mysqli_stmt_close($stmt);
}


function createUser($conn,$first_name,$last_name,$nic,$contact_number,$gender,$email,$password){
 $sql="INSERT INTO admin (first_name,last_name,nic,contact_number,gender,email,password) VALUES (?,?,?,?,?,?,?);";
 $stmt= mysqli_stmt_init($conn);

 if(!mysqli_stmt_prepare($stmt,$sql)){
   header("location:../addnewadmin.php?error=stmtfailed");
   exit();
 }

$hashedPwd=password_hash($password,PASSWORD_DEFAULT);


mysqli_stmt_bind_param($stmt,"sssssss",$first_name,$last_name,$nic,$contact_number,$gender,$email,$hashedPwd);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("location:../amAdmin.php?error=none");
exit();

}
