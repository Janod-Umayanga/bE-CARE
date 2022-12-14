<?php

if(isset($_POST["submit"])){


    $month=$_POST["month"];
    $day=$_POST["day"];
    $starting_time=$_POST["starting_time"];
    $ending_time=$_POST["ending_time"];
    $fee=$_POST["fee"];
    $address=$_POST["address"];
    $meditation_instructor_id=$_POST["submit"];

    require_once "dbh.inc.php";
    require_once "Mfunctions.inc.php";


    createTimeslot($conn,$month,$day,$starting_time,$ending_time,$fee,$address,$meditation_instructor_id);

}else{
   header("location:../Mregusersadd.php");
   exit();
}
