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
  $sql="SELECT * FROM meditation_instructor WHERE email=?;";
  $stmt= mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location:../Msignup.php?error=stmtfailed");
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


function uidExistsRM($conn,$email){
  $sql="SELECT * FROM requested_meditation_instructor WHERE email=?;";
  $stmt= mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location:../Msignup.php?error=stmtfailed");
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

function createUserRM($conn,$first_name,$last_name,$nic,$contact_number,$gender,$email,$password,$city,$address,$fee,$bank_name,$account_holder_name,$branch,$account_number,$qualification_file){
  $sql="INSERT INTO requested_meditation_instructor(first_name,last_name,nic,contact_number,gender,email,password,city,address,fee,bank_name,account_holder_name,branch,account_number,qualification_file) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
  $stmt= mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location:../Msignup.php?error=stmtfailed");
    exit();
  }

$hashedPwd=password_hash($password,PASSWORD_DEFAULT);


mysqli_stmt_bind_param($stmt,"sssssssssssssss",$first_name,$last_name,$nic,$contact_number,$gender,$email,$hashedPwd,$city,$address,$fee,$bank_name,$account_holder_name,$branch,$account_number,$qualification_file);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("location:../MsignupVerify.php?error=none");
exit();

}


function createUser($conn,$id,$first_name,$last_name,$nic,$contact_number,$gender,$email,$password,$city,$address,$fee,$bank_name,$account_holder_name,$branch,$account_number,$qualification_file){
  $sql="INSERT INTO meditation_instructor(first_name,last_name,nic,contact_number,gender,email,password,city,address,fee,bank_name,account_holder_name,branch,account_number,qualification_file) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
  $stmt= mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location:../rsMeditationInstructor.php?error=stmtfailed");
    exit();
  }



mysqli_stmt_bind_param($stmt,"sssssssssssssss",$first_name,$last_name,$nic,$contact_number,$gender,$email,$password,$city,$address,$fee,$bank_name,$account_holder_name,$branch,$account_number,$qualification_file);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

$sql="DELETE FROM requested_meditation_instructor WHERE requested_meditation_instructor_id=$id;";
if (mysqli_query($conn, $sql)) {
  //echo "Record deleted successfully";
} else {
  //echo "Error deleting record: " . mysqli_error($conn);
}



header("location:../rsMeditationInstructor.php?error=none");
exit();

}


function createComplaint($conn,$subject,$description,$Mid)
{
  $sql="INSERT INTO complaint (subject,description,meditation_instructor_id) VALUES (?,?,?);";
  $stmt= mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location:../Mcomplaint.php?error=stmtfailed");
    exit();
  }



mysqli_stmt_bind_param($stmt,"sss",$subject,$description,$Mid);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("location:../indexMeditationInstructor.php?error=none");
exit();

}

function createFeedback($conn,$description,$Mid)
{
  $sql="INSERT INTO feedback (description,meditation_instructor_id) VALUES (?,?);";
  $stmt= mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location:../Mfeedback.php?error=stmtfailed");
    exit();
  }



mysqli_stmt_bind_param($stmt,"ss",$description,$Mid);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("location:../Mfeedback.php?error=none");
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
     $_SESSION["userMid"]=$uidExists["meditation_instructor_id"];
     $_SESSION["userMuid"]=$uidExists["first_name"];

     header("location:../indexMeditationInstructor.php");
     //exit();
  }

}





function updateUserM($conn,$id,$first_name,$last_name,$nic,$contact_number,$gender,$bank_name,$account_holder_name,$branch,$account_number,$city,$address,$fee)
{
  $sql = "UPDATE meditation_instructor SET first_name='$first_name',last_name='$last_name',nic='$nic',contact_number='$contact_number',gender='$gender',bank_name='$bank_name',account_holder_name='$account_holder_name',branch='$branch',account_number='$account_number',city='$city',address='$address',fee='$fee' WHERE meditation_instructor_id=$id";

if (mysqli_query($conn, $sql)) {

  header("location:../Mprofile.php?error=none");
  exit();
} else {
  header("location:../Mprofile.php?error=errorUpdating");
  exit();

}

 mysqli_close($conn);

}

function updatePW($conn,$id,$currentPW,$password,$passwordRepeat)
{

  $result = mysqli_query($conn,"SELECT password FROM meditation_instructor WHERE meditation_instructor_id=$id");
  $row = mysqli_fetch_array($result);
  $pass=$row["password"];

  $checkPwd=password_verify($currentPW,$pass);
  if($checkPwd===false){
    header("location:../MprofileChangePW.php?error=Incorrect current password");
    exit();
  }else if($checkPwd===true){
    if($password==$passwordRepeat){

       $hashedPwd=password_hash($password,PASSWORD_DEFAULT);
       $sql = "UPDATE meditation_instructor SET password='$hashedPwd' WHERE meditation_instructor_id=$id";


       if (mysqli_query($conn, $sql)) {

       header("location:../MprofileChangePW.php?error=none");
       exit();
       } else {
       header("location:../MprofileChangePW.php?error=error Updating Password");
       exit();

       }

       mysqli_close($conn);

    }else{
      header("location:../MprofileChangePW.php?error=New password and Re-Type new password are not matching");
      exit();

    }
  }
}


function DeleteSessionMI($conn,$id)
{
  $sql="DELETE FROM session WHERE session_id=$id;";
  if (mysqli_query($conn, $sql)) {
   //echo "Record deleted successfully";
  } else {
   //echo "Error deleting record: " . mysqli_error($conn);
  }



  header("location:../Mchangesessiondetails.php?error=none");
  exit();
}


function updateSessionDetails($conn,$id,$title,$date,$starting_time,$ending_time,$address,$fee,$description,$MID)
{
  $sql = "UPDATE session SET title='$title',date='$date',starting_time='$starting_time',ending_time='$ending_time',address='$address',fee='$fee',description='$description',meditation_instructor_id=$MID WHERE session_id=$id";

if (mysqli_query($conn, $sql)) {
  header("location:../Mchangesessiondetails.php?error=none");
  exit();
} else {
  echo "Error Updating record: " . mysqli_error($conn);
}

 mysqli_close($conn);

}

//,$day,$starting_time,$ending_time,$fee,$address


function createTimeslot($conn,$month,$day,$starting_time,$ending_time,$fee,$address,$meditation_instructor_id)
{
  $current_month= date("m");
  $current_year= date("Y");

  $y=date("Y", strtotime("first {$day}.{$month}"));
  $m=date("m", strtotime("first {$day}.{$month}"));


 if($m<=$current_month && $y==$current_year){
   header("location:../Mregusersadd.php?error=recheck month");
   exit();
 }

   $first_rel_day= date("d", strtotime("first {$day}.{$month}"));
   $last_day= date("d",strtotime("last day of {$month}", time()));



   while($first_rel_day<=$last_day){

     $sql="INSERT INTO med_timeslot(appointment_day,starting_time,ending_time,date,fee,address,meditation_instructor_id) VALUES (?,?,?,?,?,?,?);";
     $stmt= mysqli_stmt_init($conn);

     if(!mysqli_stmt_prepare($stmt,$sql)){
       header("location:../Mregusersadd.php?error=stmtfailed");
       exit();
     }

     $newdate=$y."-".$m."-".$first_rel_day;

     mysqli_stmt_bind_param($stmt,"sssssss",$day,$starting_time,$ending_time,$newdate,$fee,$address,$meditation_instructor_id);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_close($stmt);


     $first_rel_day=$first_rel_day+7;
     echo $meditation_instructor_id;
   }
   header("location:../Mregusersadd.php?error=none");
   exit();



}



function updateTimeslot($conn,$date,$starting_time,$ending_time,$fee,$address,$timeslot_id)
{
  $sql = "UPDATE med_timeslot SET starting_time='$starting_time',ending_time='$ending_time',address='$address',fee='$fee' WHERE med_timeslot_id=$timeslot_id";

  if (mysqli_query($conn, $sql)) {
    header("location:../Mreguserschange.php?error=none");
    exit();
  } else {
    echo "Error Updating record: " . mysqli_error($conn);
  }

   mysqli_close($conn);


}


function Deletetimeslot($conn,$id)
{
  $sql="DELETE FROM med_timeslot WHERE med_timeslot_id=$id;";
  if (mysqli_query($conn, $sql)) {
   //echo "Record deleted successfully";
  } else {
   //echo "Error deleting record: " . mysqli_error($conn);
  }



  header("location:../Mreguserschange.php?error=none");
  exit();


}
