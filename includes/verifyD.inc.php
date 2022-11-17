
<?php
 require_once "dbh.inc.php";
 require_once "functions.inc.php";


 $id=$_POST["verifyD"];
 $result = mysqli_query($conn,"SELECT * FROM requested_doctor WHERE requested_doctor_id=$id");
 $row = mysqli_fetch_array($result);

 $first_name=$row["first_name"];
 $last_name=$row["last_name"];
 $nic=$row["nic"];
 $contact_number=$row["contact_number"];
 $gender=$row["gender"];
 $email=$row["email"];
 $password=$row["password"];
 $slmc_reg_number=$row["slmc_reg_number"];
 $type=$row["type"];
 $city=$row["city"];
 $specialization=$row["specialization"];
 $bank_name=$row["bank_name"];
 $account_holder_name=$row["account_holder_name"];
 $branch=$row["branch"];
 $account_number=$row["account_number"];
 $qualification_file=$row["qualification_file"];


 createUserD($conn,$id,$first_name,$last_name,$nic,$contact_number,$gender,$email,$password,$slmc_reg_number,$type,$city,$specialization,$bank_name,$account_holder_name,$branch,$account_number,$qualification_file);


?>
