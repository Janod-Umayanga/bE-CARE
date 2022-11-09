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


    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    if(emptyInputSignup($first_name,$last_name,$nic,$contact_number,$gender,$email,$password,$passwordRepeat)!== false){
        header("location:../signup.php?error=emptyinput");
        exit();
    }

    if(invalidEmail($email)!== false){
        header("location:../signup.php?error=invalidemail");
        exit();
    }
    if(pwdMatch($password,$passwordRepeat)!== false){
        header("location:../signup.php?error=passwordsdontmatch");
        exit();
    }

    if(uidExists($conn,$email)!== false){
        header("location:../signup.php?error=usernametaken");
        exit();
    }

    createUser($conn,$first_name,$last_name,$nic,$contact_number,$gender,$email,$password);

}else{
   header("location:../signup.php");
   exit();
}
