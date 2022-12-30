<?php 
     
     if(isset($_POST["submit"])){

       $email = $_POST["email"];
       $password = $_POST["password"];

       require_once 'database.inc.php';
       require_once 'functions.inc.php';


    loginUser($conn , $email , $password);
        
    }

    else{
        header("location: ../login.php");
        exit();
    }


?>