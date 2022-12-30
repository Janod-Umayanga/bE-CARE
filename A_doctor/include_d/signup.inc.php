<?php

if(isset($_POST["submit"])){
   
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $nic = $_POST["nic"];
    $email = $_POST["email"];
    $account_number = $_POST["account_number"];
    $branch = $_POST["branch"];
    $account_holder_name = $_POST["account_holder_name"];
    $bank_name = $_POST["bank_name"];
    $city = $_POST["city"];
    $gender = $_POST["gender"];
    $contact_number = $_POST["contact_number"];
    $registered_date = $_POST["registered_date"];
    $password = $_POST["password"];
    $re_type_password = $_POST["re_type_password"];
    $type = $_POST["type"];
    $specialization = $_POST["specialization"];
    $slmc_reg_number = $_POST["slmc_reg_number"];
    $qualification_file = $_POST["qualification_file"];

    require_once 'database.inc.php';
    require_once 'functions.inc.php';
    

    
    if(pwdMatch($password , $re_type_password) !== false){
        header("location: ../signup_doctor.php?error=passwordsdontmatch");
        exit();
    }

    createUser($conn,$first_name,$last_name,$nic,$email,$account_number,$branch,$account_holder_name,$bank_name,$city,$gender,$contact_number,$registered_date,$password,$type,$specialization,$slmc_reg_number,$qualification_file);

    

}else{
    header("location: ../signup_doctor.php");

}
   


?>