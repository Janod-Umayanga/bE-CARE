<?php

if(isset($_POST["submit"]) && $_POST["usertype"]=="admin"){

 $email=$_POST["email"];
 $password=$_POST["password"];

  require_once "dbh.inc.php";
  require_once "functions.inc.php";

  if(emptyInputLogin($email,$password) !==false){
    header("location:../login.php?error=emptyinput");
    exit();
  }

  loginUser($conn,$email,$password);

}else if(isset($_POST["submit"]) && $_POST["usertype"]=="meditation_instructor"){

 $email=$_POST["email"];
 $password=$_POST["password"];

  require_once "dbh.inc.php";
  require_once "Mfunctions.inc.php";

  if(emptyInputLogin($email,$password) !==false){
    header("location:../Mlogin.php?error=emptyinput");
    exit();
  }

  loginUser($conn,$email,$password);

}




else{
   header("location:../index.php");
   exit();
}
