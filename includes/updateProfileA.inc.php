<?php

if(isset($_POST["submit"])){


    $first_name=$_POST["first_name"];
    $last_name=$_POST["last_name"];
    $nic=$_POST["nic"];
    $contact_number=$_POST["contact_number"];
    $gender=$_POST["gender"];
    $bank_name=$_POST["bank_name"];
    $account_holder_name=$_POST["account_holder_name"];
    $branch=$_POST["branch"];
    $account_number=$_POST["account_number"];
    $id=$_POST["submit"];


    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    updateUser($conn,$id,$first_name,$last_name,$nic,$contact_number,$gender,$bank_name,$account_holder_name,$branch,$account_number);

}else{
   header("location:../profile.php");
   exit();
}
