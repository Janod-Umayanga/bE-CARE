
<?php
 require_once "dbh.inc.php";
 require_once "Mfunctions.inc.php";


 $id=$_POST["verifyMI"];
 $result = mysqli_query($conn,"SELECT * FROM requested_meditation_instructor WHERE requested_meditation_instructor_id=$id");
 $row = mysqli_fetch_array($result);

 $first_name=$row["first_name"];
 $last_name=$row["last_name"];
 $nic=$row["nic"];
 $contact_number=$row["contact_number"];
 $gender=$row["gender"];
 $email=$row["email"];
 $password=$row["password"];
 $city=$row["city"];
 $address=$row["address"];
 $fee=$row["fee"];
 $bank_name=$row["bank_name"];
 $account_holder_name=$row["account_holder_name"];
 $branch=$row["branch"];
 $account_number=$row["account_number"];
 $qualification_file=$row["qualification_file"];


 createUser($conn,$id,$first_name,$last_name,$nic,$contact_number,$gender,$email,$password,$city,$address,$fee,$bank_name,$account_holder_name,$branch,$account_number,$qualification_file);


?>
