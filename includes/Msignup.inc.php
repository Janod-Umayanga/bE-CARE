<?php

if(isset($_POST["submit"])){


    $first_name=$_POST["first_name"];
    $last_name=$_POST["last_name"];
    $nic=$_POST["nic"];
    $contact_number=$_POST["contact_number"];
    $gender=$_POST["gender"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $passwordRepeat=$_POST["passwordRepeat"];
    $city=$_POST["city"];
    $address=$_POST["address"];
    $fee=$_POST["fee"];
    $bank_name=$_POST["bank_name"];
    $account_holder_name=$_POST["account_holder_name"];
    $branch=$_POST["branch"];
    $account_number=$_POST["account_number"];
    $qualification_file=$_POST["qualification_file"];




    require_once "dbh.inc.php";
    require_once "Mfunctions.inc.php";


    if(invalidEmail($email)!== false){
        header("location:../Msignup.php?error=invalidemail");
        exit();
    }
    if(pwdMatch($password,$passwordRepeat)!== false){
        header("location:../Msignup.php?error=passwordsdontmatch");
        exit();
    }

    if(uidExists($conn,$email)!== false){
        header("location:../Msignup.php?error=usernametaken");
        exit();
    }

    createUser($conn,$first_name,$last_name,$nic,$contact_number,$gender,$email,$password,$city,$address,$fee,$bank_name,$account_holder_name,$branch,$account_number,$qualification_file);

}else{
   header("location:../Msignup.php");
   exit();
}
