<?php
if(isset($_POST["submit"])){


    $title=$_POST["title"];
    $date=$_POST["date"];
    $starting_time=$_POST["starting_time"];
    $ending_time=$_POST["ending_time"];
    $address=$_POST["address"];
    $fee=$_POST["fee"];
    $description=$_POST["description"];
    $id=$_POST["submit"];
    $MID=$_POST["MID"];



    require_once "dbh.inc.php";
    require_once "Mfunctions.inc.php";

    updateSessionDetails($conn,$id,$title,$date,$starting_time,$ending_time,$address,$fee,$description,$MID);

}else{
   header("location:../updateSession.php");
   exit();
}
