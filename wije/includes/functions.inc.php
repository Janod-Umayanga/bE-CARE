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


function uidExists($conn, $email)
{
  $sql = "SELECT * FROM nutritionist WHERE email=?;";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location:../signup.php?error=stmtfailed");
    exit();
  }
}