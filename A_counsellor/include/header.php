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
                if(isset($_SESSION["user_c_id"])){

                    $profile_name = $_SESSION['user_c_uid'];
                    echo "<li><a href='include/logout.inc.php'>LOGOUT</a></li>";
                    echo  "<li><a href='profile.php'> $profile_name </a></li>";
                }else{
                    echo "<li><a href='login.php'>LOGIN</a></li>";
                    echo  "<li><a href='signup_counsellor.php'>SIGNUP</a></li>";
                       
                }
                   
            ?>
                
                   
            </div>
        </div>
</div>