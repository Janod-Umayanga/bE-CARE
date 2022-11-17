<?php

if(isset($_POST["submit"])){


    $description=$_POST["description"];
    $Mid=$_POST["submit"];

    require_once "dbh.inc.php";
    require_once "Mfunctions.inc.php";


    createFeedback($conn,$description,$Mid);

}else{
   header("location:../Mcomplaint.php");
   exit();
}
