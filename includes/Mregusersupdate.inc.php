<?php

if(isset($_POST["submit"])){


    $date=$_POST["date"];
    $starting_time=$_POST["starting_time"];
    $ending_time=$_POST["ending_time"];
    $fee=$_POST["fee"];
    $address=$_POST["address"];
    $timeslot_id=$_POST["submit"];

    require_once "dbh.inc.php";
    require_once "Mfunctions.inc.php";


    updateTimeslot($conn,$date,$starting_time,$ending_time,$fee,$address,$timeslot_id);

}else{
   header("location:../Mregusersupdate.php");
   exit();
}
