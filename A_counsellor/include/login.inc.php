<?php 
     
     if(isset($_POST["submit"])){

       $email = $_POST["email"];
       $password = $_POST["password"];

       require_once 'database.inc.php';
       require_once 'functions.inc.php';


    loginUser_c($conn , $email , $password);
    emptyInputLogin($email , $password); 
        
    }

    else{
        header("location: ../login.php");
        exit();
    }


?>