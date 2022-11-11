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


function createUser($conn,$first_name,$last_name,$nic,$contact_number,$gender,$email,$password,$city,$address,$fee,$bank_name,$account_holder_name,$branch,$account_number,$qualification_file){
  $sql="INSERT INTO meditation_instructor (first_name,last_name,nic,contact_number,gender,email,password,city,address,fee,bank_name,account_holder_name,branch,account_number,qualification_file) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
  $stmt= mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location:../Msignup.php?error=stmtfailed");
    exit();
  }

$hashedPwd=password_hash($password,PASSWORD_DEFAULT);


mysqli_stmt_bind_param($stmt,"sssssssssssssss",$first_name,$last_name,$nic,$contact_number,$gender,$email,$hashedPwd,$city,$address,$fee,$bank_name,$account_holder_name,$branch,$account_number,$qualification_file);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("location:../index.php?error=none");
exit();

}

function createComplaint($conn,$subject,$description){
  $sql="INSERT INTO complaint (subject,description) VALUES (?,?);";
  $stmt= mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location:../Mcomplaint.php?error=stmtfailed");
    exit();
  }



mysqli_stmt_bind_param($stmt,"ss",$subject,$description);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("location:../indexMeditationInstructor.php?error=none");
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
    header("location:../Mlogin.php?error=wronglogin");
    exit();
  }

  $pwdHashed=$uidExists["password"];
  $checkPwd=password_verify($password,$pwdHashed);
  if($checkPwd===false){
    header("location:../Mlogin.php?error=wronglogin");
    exit();
  }else if($checkPwd===true){
     session_start();
     $_SESSION["userid"]=$uidExists["meditation_instructor_id"];
     $_SESSION["useruid"]=$uidExists["first_name"];

     header("location:../indexMeditationInstructor.php");
     exit();
  }

}
