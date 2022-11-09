<?php

session_start();
//
// if(isset($_POST["submit"])){
//
//     $name=$_POST["name"];
//     $email=$_POST["email"];
//     $username=$_POST["uid"];
//     $cpwd=$_POST["cpwd"];
//     $pwd=$_POST["pwd"];
//     $pwdRepeat=$_POST["pwdrepeat"];
//
//     require_once "dbh.inc.php";
//     require_once "functions.inc.php";
//
//     if( emptyInputProfileUpdate($name,$email,$username,$pwd,$pwdRepeat,$cpwd)!== false){
//         header("location:../profile.php?error=emptyinput");
//         exit();
//     }
//
//     if(invalidUid($username)!== false){
//         header("location:../profile.php?error=invaliduid");
//         exit();
//     }
//     if(invalidEmail($email)!== false){
//         header("location:../profile.php?error=invalidemail");
//         exit();
//     }
//     if(pwdMatch($pwd,$pwdRepeat)!== false){
//         header("location:../profile.php?error=newpasswordsdontmatch");
//         exit();
//     }
//
//     if(currentpwdMatch($cpwd)!== false){
//         header("location:../profile.php?error=currentpasswordsdontmatch");
//         exit();
//     }
//
//
//
//     updateUser($conn,$name,$email,$username,$pwd);
//
// }else{
//    header("location:../signup.php");
//    exit();
// }
