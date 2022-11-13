<?php

if(isset($_POST["submit"])){


    $title=$_POST["title"];
    $description=$_POST["description"];
    $date=$_POST["date"];
    $starting_time=$_POST["starting_time"];
    $ending_time=$_POST["ending_time"];
    $address=$_POST["address"];
    $fee=$_POST["fee"];
    $id=$_POST["submit"];

    require_once "dbh.inc.php";
    require_once "addnewfunctions.inc.php";


    createSession($conn,$id,$title,$description,$date,$starting_time,$ending_time,$address,$fee);

}else{
   header("location:../addnewsession.php");
   exit();
}
