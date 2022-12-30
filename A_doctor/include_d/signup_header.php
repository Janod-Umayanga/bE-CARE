<?php
    session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="styledc.css">
    <title>Signup</title>

</head>
<body>

<div class="main_header_wrapper">
        <div class="center_wrapper1">
            <div class="left1">
                <div class="main_logo">
                   <a href=""><img src="images/Vector.png" alt=""></a>
                </div>

                <div class="becare">
                    Be CARE
                </div>
            </div>

            <div class="right1">
            <?php
                if(isset($_SESSION["user_d_uid"])){
                    echo "<li><a href='login.php'>Login</a></li>";
                    echo  "<li><a href='signup_counsellor.php'>Signup</a></li>";
                }else{
                    echo "<li><a href='login.php'>Login</a></li>";
                    echo  "<li><a href='signup_doctor.php'>Signup</a></li>";
                }
                   
                ?>
                
                   
            </div>
        </div>
</div>