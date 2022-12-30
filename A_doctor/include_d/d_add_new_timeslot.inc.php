<?php

if(isset($_POST["add"])){

  $doctor_timeslot_id = $_POST["doctor_timeslot_id"];
  $chaneling_day = $_POST["channeling_day"];
  $starting_time = $_POST["starting_time"];
  $ending_time = $_POST["ending_time"];
  $fee = $_POST["fee"];
  $address = $_POST["address"];
  $doctor_id = $_POST["doctor_id"];

require_once 'database.inc.php';
require_once 'functions.inc.php';

createTimeslots($conn,$doctor_timeslot_id,$chaneling_day,$starting_time,$ending_time,$fee,$address,$doctor_id);
}else{

  header("location: ../d_add_new_timeslots.php");
}







?>