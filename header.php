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
                <a href="requestedservice.php">Requested service providers</a>
                <a href="accountManagement.php">Account Management</a>
                <a href="complaints.php">Complaints</a>
                <a href="financialreports.php">Financial Reports</a>
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
               <form  action='profile.php' >
                        <button>".$_SESSION["useruid"]."</button>
               </form>
               ";

               echo "
               <form  action='includes/logout.inc.php' >
                        <button>Log out</button>
               </form>
               ";

           }
           else{

             echo "
             <form  action='login.php' >
                      <button>LOGIN</button>
             </form>
             ";

             echo "
             <form  action='signup.php' >
                      <button>SIGN UP</button>
             </form>
             ";


           }


          ?>




     </div>
 </header>
