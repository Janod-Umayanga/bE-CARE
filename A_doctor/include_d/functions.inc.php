<?php


function createUser($conn,$first_name,$last_name,$nic,$email,$account_number,$branch,$account_holder_name,$bank_name,$city,$gender,$contact_number,$registered_date,$password,$type,$specialization,$slmc_reg_number,$qualification_file){

    $sql="INSERT INTO doctor (first_name,last_name,nic,email,account_number,branch,account_holder_name,bank_name,city,gender,contact_number,registered_date,password,type,specialization,slmc_reg_number,qualification_file) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
    $stmt= mysqli_stmt_init($conn);
   
    if(!mysqli_stmt_prepare($stmt,$sql)){
      header("location:../signup_doctor.php?error=stmtfailed");
      exit();
    }
   
   $password_hash = password_hash($password,PASSWORD_DEFAULT);
   
   
   mysqli_stmt_bind_param($stmt,"sssssssssssssssss",$first_name,$last_name,$nic,$email,$account_number,$branch,$account_holder_name,$bank_name,$city,$gender,$contact_number,$registered_date, $password_hash,$type,$specialization,$slmc_reg_number,$qualification_file);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_close($stmt);
   header("location:../login.php?error=none");
   exit();
   
   }
   


function createTimeslots($conn,$doctor_timeslot_id,$chaneling_day,$starting_time,$ending_time,$fee,$address,$doctor_id){

    $sql="INSERT INTO doctor (doctor_timeslot_id,chaneling_day,starting_time,ending_time,fee,address,doctor_id) VALUES (?,?,?,?,?,?,?);";
    $stmt= mysqli_stmt_init($conn);
   
    if(!mysqli_stmt_prepare($stmt,$sql)){
      header("location:../d_add_new_timeslots.php?error=stmtfailed");
      exit();
    }else{
      
        header("location:../profile.php");
        exit();

    }
   
   
   
   }


function pwdMatch($password , $re_type_password){
    $result;

    if($password !== $re_type_password){
        $result = true;
    }else{
        $result = false; 
    }

    return $result;
}

function uidExists($conn , $email){

    $sql = "SELECT * FROM doctor WHERE email = ?;";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();

    }

    mysqli_stmt_bind_param($stmt , "s" , $email);
    mysqli_stmt_execute($stmt);

    $ResultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($ResultData)){
          return $row; 
    }else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function emptyInputInput($email , $password){
    $result;

    if(empty($username) || empty($password)){
        $result = true;
    }else{
        $result = false;
    }

    return $result;
}

function loginUser($conn, $email , $password){

    $uidExists = uidExists($conn , $email);

    if($uidExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
        }

    $password_hash = $uidExists["password"];
    $checkPwd = password_verify($password , $password_hash);

    if($checkPwd === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if($checkPwd === true){
        session_start();
        $_SESSION["user_d_id"] = $uidExists["doctor_id"];
        $_SESSION["user_d_uid"] = $uidExists["first_name"];
        header("location: ../home_d_page.php?error=none");
        exit();

    }
}

?>