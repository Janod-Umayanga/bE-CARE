<?php

if(isset($_POST["submit"]) && $_POST["usertype"]=="nutritionist"){

 $email=$_POST["email"];
 $password=$_POST["password"];

  require_once ("db.inc.php");
  require_once ("functions.inc.php");

  if(emptyInputLogin($email,$password) !==false){
    header("location:../login.php?error=emptyinput");
    exit();
  }

  loginUser($connection,$email,$password);

}else if(isset($_POST["submit"]) && $_POST["usertype"]=="pharmacist"){

 $email=$_POST["email"];
 $password=$_POST["password"];

  require_once "connect-database.php";
  require_once "pfunctions.inc.php";

  if(emptyInputLogin($email,$password) !==false){
    header("location:../plogin.php?error=emptyinput");
    exit();
  }

  loginUser($connection,$email,$password);

}




else{
   header("location:../index.php");
   exit();
}
