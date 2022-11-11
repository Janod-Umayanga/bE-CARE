<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Be-CARE</title>
</head>
<body>

 <header>
     <div class="left">
       <?php
         if(isset($_SESSION["useruid"])){  ?>
           <div>

                <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="Mregisteredusers.php">Registered users</a>
                <a href="Msession.php">Session</a>
                <a href="Mchangesessiondetails.php">Change Session details</a>
                </div>

                <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

                <script>
                function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
                }

                function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
                }
                </script>

           </div>
           <h1>Be-CARE</h1>
      <?php   }

        else{ ?>
           <div>
             <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

           </div>
           <h1>Be-CARE</h1>
      <?php   }

        ?>

     </div>

     <div class="right">
         <?php

           if(isset($_SESSION["useruid"])){
               echo "
               <form  action='Mprofile.php' >
                        <button>".$_SESSION["useruid"]."</button>
               </form>
               ";

               echo "
               <form  action='includes/Mlogout.inc.php' >
                        <button>LOGOUT</button>
               </form>
               ";

           }
           else{

             echo "
             <form  action='index.php' >
                      <button>LOGIN</button>
             </form>
             ";

             echo "
             <form  action='signupas.php' >
                      <button>SIGN UP</button>
             </form>
             ";


           }


          ?>




     </div>
 </header>
