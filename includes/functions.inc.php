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
    header("location:../signup.php?error=stmtfailed");
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
   header("location:../signup.php?error=stmtfailed");
   exit();
 }

$hashedPwd=password_hash($password,PASSWORD_DEFAULT);


mysqli_stmt_bind_param($stmt,"sssssssssss",$first_name,$last_name,$nic,$contact_number,$gender,$email,$hashedPwd,$bank_name,$account_holder_name,$branch,$account_number);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("location:../index.php?error=none");
exit();

}


function emptyInputLogin($email,$password){
  if(empty($email) || empty($password)){
     $result=true;
  }else{
    $result=false;
  }
  return $result;
}


function loginUser($conn,$email,$password){
  $uidExists=uidExists($conn,$email);

  if($uidExists["delete_flag"]===1){
    header("location:../index.php?error=Incorrect login information");
    exit();
  }

  if($uidExists===false){
    header("location:../index.php?error=Incorrect login information");
    exit();
  }


  $pwdHashed=$uidExists["password"];
  $checkPwd=password_verify($password,$pwdHashed);
  if($checkPwd===false){
    header("location:../index.php?error=Incorrect login information");
    exit();
  }else if($checkPwd===true){
     session_start();
     $_SESSION["userid"]=$uidExists["admin_id"];
     $_SESSION["useruid"]=$uidExists["first_name"];
     header("location:../indexAdmin.php");
     // exit();
  }

}


function createUserP($conn,$id,$first_name,$last_name,$nic,$contact_number,$gender,$email,$password,$slmc_reg_number,$pharmacy_name,$city,$address,$bank_name,$account_holder_name,$branch,$account_number,$qualification_file)
{
  $sql="INSERT INTO pharmacist(first_name,last_name,nic,contact_number,gender,email,password,slmc_reg_number,pharmacy_name,city,address,bank_name,account_holder_name,branch,account_number,qualification_file) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";


  $stmt= mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location:../rsPharamcist.php?error=stmtfailed");
    exit();
  }

 mysqli_stmt_bind_param($stmt,"ssssssssssssssss",$first_name,$last_name,$nic,$contact_number,$gender,$email,$password,$slmc_reg_number,$pharmacy_name,$city,$address,$bank_name,$account_holder_name,$branch,$account_number,$qualification_file);
 mysqli_stmt_execute($stmt);
 mysqli_stmt_close($stmt);

 $sql="DELETE FROM requested_pharmacist WHERE requested_pharmacist_id=$id;";
 if (mysqli_query($conn, $sql)) {
  //echo "Record deleted successfully";
 } else {
  //echo "Error deleting record: " . mysqli_error($conn);
 }



 header("location:../rsPharmacist.php?error=none");
 exit();
}

function createUserN($conn,$id,$first_name,$last_name,$nic,$contact_number,$gender,$email,$password,$slmc_reg_number,$fee,$bank_name,$account_holder_name,$branch,$account_number,$qualification_file)
{
  $sql="INSERT INTO nutritionist(first_name,last_name,nic,contact_number,gender,email,password,slmc_reg_number,fee,bank_name,account_holder_name,branch,account_number,qualification_file) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
  $stmt= mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location:../rsNutritionist.php?error=stmtfailed");
    exit();
  }



 mysqli_stmt_bind_param($stmt,"ssssssssssssss",$first_name,$last_name,$nic,$contact_number,$gender,$email,$password,$slmc_reg_number,$fee,$bank_name,$account_holder_name,$branch,$account_number,$qualification_file);
 mysqli_stmt_execute($stmt);
 mysqli_stmt_close($stmt);

 $sql="DELETE FROM requested_nutritionist WHERE requested_nutritionist_id=$id;";
 if (mysqli_query($conn, $sql)) {
  //echo "Record deleted successfully";
 } else {
  //echo "Error deleting record: " . mysqli_error($conn);
 }



 header("location:../rsNutritionist.php?error=none");
 exit();
}

function createUserD($conn,$id,$first_name,$last_name,$nic,$contact_number,$gender,$email,$password,$slmc_reg_number,$type,$city,$specialization,$bank_name,$account_holder_name,$branch,$account_number,$qualification_file)
{
  $sql="INSERT INTO doctor(first_name,last_name,nic,contact_number,gender,email,password,slmc_reg_number,type,city,specialization,bank_name,account_holder_name,branch,account_number,qualification_file) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
  $stmt= mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location:../rsDoctor.php?error=stmtfailed");
    exit();
  }



 mysqli_stmt_bind_param($stmt,"ssssssssssssssss",$first_name,$last_name,$nic,$contact_number,$gender,$email,$password,$slmc_reg_number,$type,$city,$specialization,$bank_name,$account_holder_name,$branch,$account_number,$qualification_file);
 mysqli_stmt_execute($stmt);
 mysqli_stmt_close($stmt);

 $sql="DELETE FROM requested_doctor WHERE requested_doctor_id=$id;";
 if (mysqli_query($conn, $sql)) {
  //echo "Record deleted successfully";
 } else {
  //echo "Error deleting record: " . mysqli_error($conn);
 }



 header("location:../rsDoctor.php?error=none");
 exit();
}


function createUserC($conn,$id,$first_name,$last_name,$nic,$contact_number,$gender,$email,$password,$slmc_reg_number,$city,$bank_name,$account_holder_name,$branch,$account_number,$qualification_file)
{
  $sql="INSERT INTO counsellor(first_name,last_name,nic,contact_number,gender,email,password,slmc_reg_number,city,bank_name,account_holder_name,branch,account_number,qualification_file) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
  $stmt= mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location:../rsCounsellor.php?error=stmtfailed");
    exit();
  }



  mysqli_stmt_bind_param($stmt,"ssssssssssssss",$first_name,$last_name,$nic,$contact_number,$gender,$email,$password,$slmc_reg_number,$city,$bank_name,$account_holder_name,$branch,$account_number,$qualification_file);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  $sql="DELETE FROM requested_counsellor WHERE requested_counsellor_id=$id;";
  if (mysqli_query($conn, $sql)) {
  //echo "Record deleted successfully";
  } else {
  //echo "Error deleting record: " . mysqli_error($conn);
  }



  header("location:../rsCounsellor.php?error=none");
  exit();
}


function updateUser($conn,$id,$first_name,$last_name,$nic,$contact_number,$gender,$bank_name,$account_holder_name,$branch,$account_number)
{
  $sql = "UPDATE admin SET first_name='$first_name',last_name='$last_name',nic='$nic',contact_number='$contact_number',gender='$gender',bank_name='$bank_name',account_holder_name='$account_holder_name',branch='$branch',account_number='$account_number' WHERE admin_id=$id";

if (mysqli_query($conn, $sql)) {

  header("location:../profile.php?error=none");
  exit();
} else {
  header("location:../profile.php?error=errorUpdating");
  exit();

}

 mysqli_close($conn);

}

function updatePW($conn,$id,$currentPW,$password,$passwordRepeat)
{

  $result = mysqli_query($conn,"SELECT password FROM admin WHERE admin_id=$id");
  $row = mysqli_fetch_array($result);
  $pass=$row["password"];

  $checkPwd=password_verify($currentPW,$pass);
  if($checkPwd===false){
    header("location:../profileChangePW.php?error=Incorrect current password");
    exit();
  }else if($checkPwd===true){
    if($password==$passwordRepeat){

       $hashedPwd=password_hash($password,PASSWORD_DEFAULT);
       $sql = "UPDATE admin SET password='$hashedPwd' WHERE admin_id=$id";


       if (mysqli_query($conn, $sql)) {

       header("location:../profileChangePW.php?error=none");
       exit();
       } else {
       header("location:../profileChangePW.php?error=error Updating Password");
       exit();

       }

       mysqli_close($conn);

    }else{
      header("location:../profileChangePW.php?error=New password and Re-Type new password are not matching");
      exit();

    }
  }

}


function deleteMI($conn,$id){
  $sql="DELETE FROM requested_meditation_instructor WHERE requested_meditation_instructor_id=$id;";
  if (mysqli_query($conn, $sql)) {
   //echo "Record deleted successfully";
  } else {
   //echo "Error deleting record: " . mysqli_error($conn);
  }



  header("location:../rsMeditationInstructor.php?error=none");
  exit();

}


function deleteD($conn,$id){
  $sql="DELETE FROM requested_doctor WHERE requested_doctor_id=$id;";
  if (mysqli_query($conn, $sql)) {
   //echo "Record deleted successfully";
  } else {
   //echo "Error deleting record: " . mysqli_error($conn);
  }



  header("location:../rsDoctor.php?error=none");
  exit();

}



function deleteC($conn,$id){
  $sql="DELETE FROM requested_counsellor WHERE requested_counsellor_id=$id;";
  if (mysqli_query($conn, $sql)) {
   //echo "Record deleted successfully";
  } else {
   //echo "Error deleting record: " . mysqli_error($conn);
  }



  header("location:../rsCounsellor.php?error=none");
  exit();

}


function deleteN($conn,$id){
  $sql="DELETE FROM requested_nutritionist WHERE requested_nutritionist_id=$id;";
  if (mysqli_query($conn, $sql)) {
   //echo "Record deleted successfully";
  } else {
   //echo "Error deleting record: " . mysqli_error($conn);
  }



  header("location:../rsNutritionist.php?error=none");
  exit();

}



function deleteP($conn,$id){
  $sql="DELETE FROM requested_pharamacist WHERE requested_pharamacist_id=$id;";
  if (mysqli_query($conn, $sql)) {
   //echo "Record deleted successfully";
  } else {
   //echo "Error deleting record: " . mysqli_error($conn);
  }



  header("location:../rsPharamcist.php?error=none");
  exit();

}

function AMdeleteMI($conn,$id){
  $sql = "UPDATE meditation_instructor SET delete_flag=1 WHERE meditation_instructor_id=$id";

  if (mysqli_query($conn, $sql)) {
    header("location:../amMeditationInstructor.php?error=none");
    exit();
  } else {
    header("location:../amMeditationInstructor.php?error=errorUpdating");
    exit();

  }

   mysqli_close($conn);




}


function AMdeleteD($conn,$id){

  $sql = "UPDATE doctor SET delete_flag=1 WHERE doctor_id=$id";

  if (mysqli_query($conn, $sql)) {
    header("location:../amDoctor.php?error=none");
    exit();
  } else {
    header("location:../amDoctor.php?error=errorUpdating");
    exit();

  }

   mysqli_close($conn);



}



function AMdeleteC($conn,$id){

  $sql = "UPDATE counsellor SET delete_flag=1 WHERE counsellor_id=$id";

  if (mysqli_query($conn, $sql)) {
    header("location:../amCounsellor.php?error=none");
    exit();
  } else {
    header("location:../amCounsellor.php?error=errorUpdating");
    exit();

  }

   mysqli_close($conn);



}


function AMdeleteN($conn,$id){
  $sql = "UPDATE nutritionist SET delete_flag=1 WHERE nutritionist_id=$id";

  if (mysqli_query($conn, $sql)) {
    header("location:../amNutritionist.php?error=none");
    exit();
  } else {
    header("location:../amNutritionist.php?error=errorUpdating");
    exit();

  }

   mysqli_close($conn);

}



function AMdeleteP($conn,$id){

  $sql = "UPDATE pharmacist SET delete_flag=1 WHERE pharmacist_id=$id";

  if (mysqli_query($conn, $sql)) {
    header("location:../amPharmacist.php?error=none");
    exit();
  } else {
    header("location:../amPharmacist.php?error=errorUpdating");
    exit();

  }

   mysqli_close($conn);

}


function AMdeleteA($conn,$id){

  $sql = "UPDATE admin SET delete_flag=1 WHERE admin_id=$id";

  if (mysqli_query($conn, $sql)) {
    header("location:../amAdmin.php?error=none");
    exit();
  } else {
    header("location:../amAdmin.php?error=errorUpdating");
    exit();

  }

   mysqli_close($conn);


}



function AMdeletePatient($conn,$id){
  $sql = "UPDATE patient SET delete_flag=1 WHERE patient_id=$id";

  if (mysqli_query($conn, $sql)) {
    header("location:../ampatient.php?error=none");
    exit();
  } else {
    header("location:../ampatient.php?error=errorUpdating");
    exit();

  }

   mysqli_close($conn);




}
