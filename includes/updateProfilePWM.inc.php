<?php

if(isset($_POST["submit"])){


    $currentPW=$_POST["currentPW"];
    $password=$_POST["password"];
    $passwordRepeat=$_POST["passwordRepeat"];
    $id=$_POST["submit"];


    require_once "dbh.inc.php";
    require_once "Mfunctions.inc.php";

    updatePW($conn,$id,$currentPW,$password,$passwordRepeat);

}else{
   header("location:../MprofileChangePW.php");
   exit();
}
