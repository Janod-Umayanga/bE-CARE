<?php
 if(isset($_POST["submit"])){
    
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $nic = $_POST["nic"];
    $contact_number = $_POST["contact_number"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $password = $_POST["password"];
    $registered_date = $_POST["registered_date"];
    $slmc_reg_number = $_POST["slmc_reg_number"];
    $city = $_POST["city"];
    $bank_name = $_POST["bank_name"];
    $account_number = $_POST["account_number"];
    $account_holder_name = $_POST["account_holder_name"];
    $branch = $_POST["branch"];
    $re_type_password = $_POST["re_type_password"];
    $qualification_file = $_POST["qualification_file"];
    
   
    require_once 'database.inc.php';
    require_once 'functions.inc.php'; 

    if(pwdMatch($password , $re_type_password) !== false){
        header("location: ../signup.php?error=passwordontmatch");
        exit();
    }
    
    createUser_c($conn,$first_name,$last_name,$nic,$contact_number,$gender,$email,$password,$registered_date,$slmc_reg_number,$city,$bank_name,$account_number,$account_holder_name,$branch,$qualification_file);
    

 }
 else{
    header("location: ../signup_counsellor.php");
    exit();

 }

?>