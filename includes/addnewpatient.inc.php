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
    require_once "addnewfunctions.inc.php";


    if(invalidEmail($email)!== false){
        header("location:../addnewpatient.php?error=invalidemail");
        exit();
    }
    if(pwdMatch($password,$passwordRepeat)!== false){
        header("location:../addnewpatient.php?error=passwordsdontmatch");
        exit();
    }

    if(uidExistsPatient($conn,$email)!== false){
        header("location:../addnewpatient.php?error=emailtaken");
        exit();
    }

    createUserPatient($conn,$first_name,$last_name,$nic,$contact_number,$gender,$email,$password);

}else{
   header("location:../addnewpatient.php");
   exit();
}
