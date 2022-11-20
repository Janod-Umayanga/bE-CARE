<?php


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


function uidExistsPatient($conn,$email){
 $sql="SELECT * FROM patient WHERE email=?;";
 $stmt= mysqli_stmt_init($conn);

 if(!mysqli_stmt_prepare($stmt,$sql)){
   header("location:../addnewpatient.php?error=stmtfailed");
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

function uidExistsD($conn,$email){
 $sql="SELECT * FROM doctor WHERE email=?;";
 $stmt= mysqli_stmt_init($conn);

 if(!mysqli_stmt_prepare($stmt,$sql)){
   header("location:../addnewdoctor.php?error=stmtfailed");
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



function uidExistsRD($conn,$email){
 $sql="SELECT * FROM requested_doctor WHERE email=?;";
 $stmt= mysqli_stmt_init($conn);

 if(!mysqli_stmt_prepare($stmt,$sql)){
   header("location:../addnewdoctor.php?error=stmtfailed");
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


function uidExistsC($conn,$email){
 $sql="SELECT * FROM counsellor WHERE email=?;";
 $stmt= mysqli_stmt_init($conn);

 if(!mysqli_stmt_prepare($stmt,$sql)){
   header("location:../addnewcounsellor.php?error=stmtfailed");
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



function uidExistsRC($conn,$email){
 $sql="SELECT * FROM requested_counsellor WHERE email=?;";
 $stmt= mysqli_stmt_init($conn);

 if(!mysqli_stmt_prepare($stmt,$sql)){
   header("location:../addnewcounsellor.php?error=stmtfailed");
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



function uidExistsP($conn,$email){
 $sql="SELECT * FROM pharmacist WHERE email=?;";
 $stmt= mysqli_stmt_init($conn);

 if(!mysqli_stmt_prepare($stmt,$sql)){
   header("location:../addnewpharmacist.php?error=stmtfailed");
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



function uidExistsRP($conn,$email){
 $sql="SELECT * FROM requested_pharmacist WHERE email=?;";
 $stmt= mysqli_stmt_init($conn);

 if(!mysqli_stmt_prepare($stmt,$sql)){
   header("location:../addnewpharmacist.php?error=stmtfailed");
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



function uidExistsN($conn,$email){
 $sql="SELECT * FROM nutritionist WHERE email=?;";
 $stmt= mysqli_stmt_init($conn);

 if(!mysqli_stmt_prepare($stmt,$sql)){
   header("location:../addnewnutritionist.php?error=stmtfailed");
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



function uidExistsRN($conn,$email){
 $sql="SELECT * FROM requested_nutritionist WHERE email=?;";
 $stmt= mysqli_stmt_init($conn);

 if(!mysqli_stmt_prepare($stmt,$sql)){
   header("location:../addnewnutritionist.php?error=stmtfailed");
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

function uidExistsMI($conn,$email){
 $sql="SELECT * FROM meditation_instructor WHERE email=?;";
 $stmt= mysqli_stmt_init($conn);

 if(!mysqli_stmt_prepare($stmt,$sql)){
   header("location:../addnewmi.php?error=stmtfailed");
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



function uidExistsRMI($conn,$email){
 $sql="SELECT * FROM requested_meditation_instructor WHERE email=?;";
 $stmt= mysqli_stmt_init($conn);

 if(!mysqli_stmt_prepare($stmt,$sql)){
   header("location:../addnewmi.php?error=stmtfailed");
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










function createUser($conn,$first_name,$last_name,$nic,$contact_number,$gender,$email,$password,$bank_name,$account_holder_name,$branch,$account_number){
 $sql="INSERT INTO admin (first_name,last_name,nic,contact_number,gender,email,password,bank_name,account_holder_name,branch,account_number) VALUES (?,?,?,?,?,?,?,?,?,?,?);";
 $stmt= mysqli_stmt_init($conn);

 if(!mysqli_stmt_prepare($stmt,$sql)){
   header("location:../addnewadmin.php?error=stmtfailed");
   exit();
 }

$hashedPwd=password_hash($password,PASSWORD_DEFAULT);


mysqli_stmt_bind_param($stmt,"sssssssssss",$first_name,$last_name,$nic,$contact_number,$gender,$email,$hashedPwd,$bank_name,$account_holder_name,$branch,$account_number);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("location:../amAdmin.php?error=none");
exit();

}

function createSession($conn,$id,$title,$description,$date,$starting_time,$ending_time,$address,$fee){
 $sql="INSERT INTO session (title,description,date,starting_time,ending_time,address,fee,meditation_instructor_id) VALUES (?,?,?,?,?,?,?,?);";
 $stmt= mysqli_stmt_init($conn);

 if(!mysqli_stmt_prepare($stmt,$sql)){
   header("location:../addnewsession.php?error=stmtfailed");
   exit();
 }

mysqli_stmt_bind_param($stmt,"ssssssss",$title,$description,$date,$starting_time,$ending_time,$address,$fee,$id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("location:../Mchangesessiondetails.php?error=none");
exit();

}




function createUserC($conn,$first_name,$last_name,$nic,$contact_number,$gender,$email,$password,$city,$slmc,$bank_name,$account_holder_name,$branch,$account_number,$fileDestination)
{
 $sql="INSERT INTO counsellor (first_name,last_name,nic,contact_number,gender,email,password,city,slmc_reg_number,bank_name,account_holder_name,branch,account_number,qualification_file) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
 $stmt= mysqli_stmt_init($conn);

 if(!mysqli_stmt_prepare($stmt,$sql)){
   header("location:../addnewcounsellor.php?error=stmtfailed");
   exit();
 }

$hashedPwd=password_hash($password,PASSWORD_DEFAULT);


mysqli_stmt_bind_param($stmt,"ssssssssssssss",$first_name,$last_name,$nic,$contact_number,$gender,$email,$hashedPwd,$city,$slmc,$bank_name,$account_holder_name,$branch,$account_number,$fileDestination);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("location:../amCounsellor.php?error=none");
exit();

}


function createUserMi($conn,$first_name,$last_name,$nic,$contact_number,$gender,$email,$password,$city,$address,$fee,$bank_name,$account_holder_name,$branch,$account_number,$fileDestination)
{
 $sql="INSERT INTO meditation_instructor (first_name,last_name,nic,contact_number,gender,email,password,city,address,fee,bank_name,account_holder_name,branch,account_number,qualification_file) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
 $stmt= mysqli_stmt_init($conn);

 if(!mysqli_stmt_prepare($stmt,$sql)){
   header("location:../addnewmi.php?error=stmtfailed");
   exit();
 }

$hashedPwd=password_hash($password,PASSWORD_DEFAULT);


mysqli_stmt_bind_param($stmt,"sssssssssssssss",$first_name,$last_name,$nic,$contact_number,$gender,$email,$hashedPwd,$city,$address,$fee,$bank_name,$account_holder_name,$branch,$account_number,$fileDestination);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("location:../amMeditationInstructor.php?error=none");
exit();

}



function createUserN($conn,$first_name,$last_name,$nic,$contact_number,$gender,$email,$password,$fee,$slmc,$bank_name,$account_holder_name,$branch,$account_number,$fileDestination)
{
 $sql="INSERT INTO nutritionist (first_name,last_name,nic,contact_number,gender,email,password,fee,slmc_reg_number,bank_name,account_holder_name,branch,account_number,qualification_file) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
 $stmt= mysqli_stmt_init($conn);

 if(!mysqli_stmt_prepare($stmt,$sql)){
   header("location:../addnewnutritionist.php?error=stmtfailed");
   exit();
 }

$hashedPwd=password_hash($password,PASSWORD_DEFAULT);


mysqli_stmt_bind_param($stmt,"ssssssssssssss",$first_name,$last_name,$nic,$contact_number,$gender,$email,$hashedPwd,$fee,$slmc,$bank_name,$account_holder_name,$branch,$account_number,$fileDestination);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("location:../amNutritionist.php?error=none");
exit();

}



function  createUserPatient($conn,$first_name,$last_name,$nic,$contact_number,$gender,$email,$password)
{
 $sql="INSERT INTO patient (first_name,last_name,nic,contact_number,gender,email,password) VALUES (?,?,?,?,?,?,?);";
 $stmt= mysqli_stmt_init($conn);

 if(!mysqli_stmt_prepare($stmt,$sql)){
   header("location:../addnewpatient.php?error=stmtfailed");
   exit();
 }

$hashedPwd=password_hash($password,PASSWORD_DEFAULT);


mysqli_stmt_bind_param($stmt,"sssssss",$first_name,$last_name,$nic,$contact_number,$gender,$email,$hashedPwd);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("location:../amPatient.php?error=none");
exit();

}




function createUserP($conn,$first_name,$last_name,$nic,$contact_number,$gender,$email,$password,$city,$slmc,$bank_name,$account_holder_name,$branch,$account_number,$fileDestination,$address,$pharmacyname)
{
 $sql="INSERT INTO pharmacist (first_name,last_name,nic,contact_number,gender,email,password,city,slmc_reg_number,bank_name,account_holder_name,branch,account_number,qualification_file,address,pharmacy_name) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
 $stmt= mysqli_stmt_init($conn);

 if(!mysqli_stmt_prepare($stmt,$sql)){
   header("location:../addnewpharmacist.php?error=stmtfailed");
   exit();
 }

$hashedPwd=password_hash($password,PASSWORD_DEFAULT);


mysqli_stmt_bind_param($stmt,"ssssssssssssssss",$first_name,$last_name,$nic,$contact_number,$gender,$email,$hashedPwd,$city,$slmc,$bank_name,$account_holder_name,$branch,$account_number,$fileDestination,$address,$pharmacyname);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("location:../amPharmacist.php?error=none");
exit();

}


function createUserD($conn,$first_name,$last_name,$nic,$contact_number,$gender,$email,$password,$city,$slmc,$type,$specialization,$bank_name,$account_holder_name,$branch,$account_number,$fileDestination)
{
 $sql="INSERT INTO doctor (first_name,last_name,nic,contact_number,gender,email,password,slmc_reg_number,type,city,specialization,bank_name,account_holder_name,branch,account_number,qualification_file) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
 $stmt= mysqli_stmt_init($conn);


 if(!mysqli_stmt_prepare($stmt,$sql)){
   header("location:../addnewdoctor.php?error=stmtfailed");
   exit();
 }

$hashedPwd=password_hash($password,PASSWORD_DEFAULT);


mysqli_stmt_bind_param($stmt,"ssssssssssssssss",$first_name,$last_name,$nic,$contact_number,$gender,$email,$hashedPwd,$slmc,$type,$city,$specialization,$bank_name,$account_holder_name,$branch,$account_number,$fileDestination);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("location:../amDoctor.php?error=none");
exit();

}
