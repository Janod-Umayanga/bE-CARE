<?php

if(isset($_POST["submit"])){


    $subject=$_POST["subject"];
    $description=$_POST["description"];
    $Mid=$_POST["submit"];



    require_once "dbh.inc.php";
    require_once "Mfunctions.inc.php";


    createComplaint($conn,$subject,$description,$Mid);

}else{
   header("location:../Mcomplaint.php");
   exit();
}
