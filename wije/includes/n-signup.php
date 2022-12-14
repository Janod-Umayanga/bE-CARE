<?php

if(isset($_POST["submit"])){


    $first_name=$_POST["first_name"];
    $last_name=$_POST["last_name"];
    $nic=$_POST["nic"];
    $contact_number=$_POST["contact_number"];
    $fee = $_POST['fee'];
    $gender=$_POST["gender"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $passwordRepeat=$_POST["passwordRepeat"];
    $bank_name=$_POST["bank_name"];
    $account_holder_name=$_POST["account_holder_name"];
    $branch=$_POST["branch"];
    $account_number=$_POST["account_number"];



    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    if(invalidEmail($email)!== false){
        header("location:../n-signup.php?error=invalidemail");
        exit();
    }
    if(pwdMatch($password,$passwordRepeat)!== false){
        header("location:../n-signup.php?error=passwordsdontmatch");
        exit();
    }


}else{
   header("location:../signup.php");
   exit();
}
