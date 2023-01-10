<div class="topnav">
 
<header>
     <div class="left">
       <?php
         if(isset($_SESSION["admin_id"])){  ?>
           <div>
                <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="<?php echo URLROOT ?>/AdminDashboard/adminDashBoard">Dashboard</a>
                <a href="<?php echo URLROOT ?>/AdminReqSerProviders/adminReqSerProviders">Requested service providers</a>
                <a href="<?php echo URLROOT ?>/AdminUserMgmt/adminUserMgmt">User Management</a>
                <a href="<?php echo URLROOT ?>/AdminComplaintMgmt/adminComplaintMgmt">Complaint Management</a>
                <a href="<?php echo URLROOT ?>/AdminPayments/adminPayments">Payments</a>
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

           if(isset($_SESSION["admin_id"])){
               echo strtoupper("
               <form  action='http://localhost/be-CARE-geenath-MVC/Admin/profile' >
                        <button class='one' >".$_SESSION["admin_gender"]."".$_SESSION["admin_name"]."</button>
               </form>
               ");

               echo "
               <form action='http://localhost/be-CARE-geenath-MVC/Admin/logout'>
                 <button type='submit' class='logout-btn'>
                    LOGOUT
                 </button>
               </form>

               ";

           }
           else{

             echo "
             <form  action='http://localhost/be-CARE-geenath-MVC/Admin/login' >
                      <button class='three'>LOGIN</button>
             </form>
             ";

             echo "
             <form  action='signupas.php' >
                      <button class='four'>SIGN UP</button>
             </form>
             ";


           }


          ?>




     </div>
 </header>
