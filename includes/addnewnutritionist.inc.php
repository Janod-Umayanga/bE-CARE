<?php

if(isset($_POST["submit"])){


    $first_name=$_POST["first_name"];
    $last_name=$_POST["last_name"];
    $nic=$_POST["nic"];
    $contact_number=$_POST["contact_number"];
    $gender=$_POST["gender"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $passwordRepeat=$_POST["passwordRepeat"];
    $fee=$_POST["fee"];
    $slmc=$_POST["slmc"];
    $bank_name=$_POST["bank_name"];
    $account_holder_name=$_POST["account_holder_name"];
    $branch=$_POST["branch"];
    $account_number=$_POST["account_number"];

    $fileName=$_FILES['qualification_file']['name'];
    $fileTmpName=$_FILES['qualification_file']['tmp_name'];
    $fileSize=$_FILES['qualification_file']['size'];
    $fileError=$_FILES['qualification_file']['error'];
    $fileType=$_FILES['qualification_file']['type'];

    $fileExt=explode('.',$fileName);
    $fileActualExt=strtolower(end($fileExt));
    $allowed=array('jpg','jpeg','png','pdf','zip','rar');

    if(in_array($fileActualExt,$allowed)){
       if($fileError===0){
           if($fileSize<100000000){
               $fileNameNew=uniqid('',true).".".$fileActualExt;
               $fileDestination='../uploads/'.$fileNameNew;
               move_uploaded_file($fileTmpName,$fileDestination);
           }else{
                header("location:../addnewnutritionist.php?error=Your qualification file is too big!");
                exit();

           }
       }else{
              header("location:../addnewnutritionist.php?error=There was an error uploading file!");
              exit();

       }
    }else{
      header("location:../addnewnutritionist.php?error=You cannot upload files of this type!");
      exit();
    }


    require_once "dbh.inc.php";
    require_once "addnewfunctions.inc.php";


    if(invalidEmail($email)!== false){
        header("location:../addnewnutritionist.php?error=invalidemail");
        exit();
    }
    if(pwdMatch($password,$passwordRepeat)!== false){
        header("location:../addnewnutritionist.php?error=passwordsdontmatch");
        exit();
    }

    if(uidExistsN($conn,$email)!== false){
        header("location:../addnewnutritionist.php?error=usernametaken");
        exit();
    }

    if(uidExistsRN($conn,$email)!== false){
        header("location:../addnewnutritionist.php?error=usernametaken");
        exit();
    }

    createUserN($conn,$first_name,$last_name,$nic,$contact_number,$gender,$email,$password,$fee,$slmc,$bank_name,$account_holder_name,$branch,$account_number,$fileDestination);

}else{
   header("location:../addnewnutritionist.php");
   exit();
}
