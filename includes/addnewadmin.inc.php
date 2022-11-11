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
    $bank_name=$_POST["bank_name"];
    $account_holder_name=$_POST["account_holder_name"];
    $branch=$_POST["branch"];
    $account_number=$_POST["account_number"];


    require_once "dbh.inc.php";
    require_once "addnewfunctions.inc.php";


    if(invalidEmail($email)!== false){
        header("location:../addnewadmin.php?error=invalidemail");
        exit();
    }
    if(pwdMatch($password,$passwordRepeat)!== false){
        header("location:../addnewadmin.php?error=passwordsdontmatch");
        exit();
    }

    if(uidExists($conn,$email)!== false){
        header("location:../addnewadmin.php?error=emailtaken");
        exit();
    }

    createUser($conn,$first_name,$last_name,$nic,$contact_number,$gender,$email,$password,$bank_name,$account_holder_name,$branch,$account_number);

}else{
   header("location:../addnewadmin.php");
   exit();
}
