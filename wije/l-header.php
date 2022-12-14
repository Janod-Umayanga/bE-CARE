<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styless.css">
    <title>Be-CARE</title>
</head>
<body>

  <?php
  if(isset($_SESSION["userMid"])){
  require_once "includes/dbh.inc.php";
  $userid=$_SESSION["userMid"];
  $result = mysqli_query($conn,"SELECT * FROM nutritionist WHERE nutritionist_id=$userid");
  $row = mysqli_fetch_array($result);
  $gender=$row['gender'];
  $name=$row['first_name'];
  if($gender=="Male"){
    $g="Mr. ";
  }else if($gender=="Female"){
    $g="Mrs. ";
  }
  }
   ?>

 <header>
     <div class="left">
       <?php
         if(isset($_SESSION["userMuid"])){  ?>
           <div>

                <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="indexMeditationInstructor.php">Dashboard</a>
                <a href="Mregusers.php">Registered users for meditation instructions</a>
                <a href="Mregusershistory.php">Registered users history</a>
                <a href="Mregusersadd.php">Add timeslot</a>
                <a href="Msessionselect.php">Session</a>
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

           if(isset($_SESSION["userMuid"])){
               echo strtoupper("
               <form  action='Mprofile.php' >
                        <button>".$g.$name."</button>
               </form>
               ");

               echo "
               <form method='post' action='includes/Mlogout.inc.php'>
                 <button type='submit' class='logout-btn'>
                    LOGOUT
                 </button>
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
