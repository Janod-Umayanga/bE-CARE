<?php
//signup functions

//counsellor database table function
function createUser_c($conn,$first_name,$last_name,$nic,$contact_number,$gender,$email,$password,$registered_date,$slmc_reg_number,$city,$bank_name,$account_number,$account_holder_name,$branch,$qualification_file){

    $sql="INSERT INTO counsellor (first_name,last_name,nic,contact_number,gender,email,password,registered_date,slmc_reg_number,city,bank_name,account_holder_name,branch,account_number,qualification_file) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
    $stmt= mysqli_stmt_init($conn);
   
    if(!mysqli_stmt_prepare($stmt,$sql)){
      header("location:../signup_counsellor.php?error=stmtfailed");
      exit();
    }
   
   $password_hash = password_hash($password,PASSWORD_DEFAULT);
   
   
   mysqli_stmt_bind_param($stmt,"sssssssssssssss",$first_name,$last_name,$nic,$contact_number,$gender,$email,$password_hash,$registered_date,$slmc_reg_number,$city,$bank_name,$account_holder_name,$branch,$account_number,$qualification_file);
   
   mysqli_stmt_execute($stmt);
   mysqli_stmt_close($stmt);
   header("location:../login.php?error=none");
   exit();
   
   }

function createTimeslots($conn,$counsellor_timeslot_id,$chaneling_day,$starting_time,$ending_time,$fee,$address,$counsellor_id){

    $sql="INSERT INTO counsellor (counsellor_timeslot_id,chaneling_day,starting_time,ending_time,fee,address,doctor_id) VALUES (?,?,?,?,?,?,?);";
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

    $sql = "SELECT * FROM counsellor WHERE email = ?;";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup_counsellor.php?error=stmtfailed");
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

//login input empty function

function emptyInputLogin($email , $password){
    $result;

    if(empty($username) || empty($password)){
        $result = true;
    }else{
        $result = false;
    }

    return $result;
}


//counsellor login user function

function loginUser_c($conn, $email , $password){

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
        $_SESSION["user_c_id"] = $uidExists["counsellor_id"];
        $_SESSION["user_c_uid"] = $uidExists["first_name"];
        header("location: ../home_c_page.php?error=none");
        exit();

    }
}

?>