<?php
 include_once "footer.php";
?>


<?php
 include_once "sessionfile.php";
?>
<?php
 include_once "header.php";
?>


<?php
  require_once "includes/dbh.inc.php";
  $result = mysqli_query($conn,"SELECT COUNT(email) AS doc FROM doctor");
  $row = mysqli_fetch_array($result);

  $result2 = mysqli_query($conn,"SELECT COUNT(email) AS coun FROM counsellor");
  $row2 = mysqli_fetch_array($result2);

  $result3 = mysqli_query($conn,"SELECT COUNT(email) AS nut FROM nutritionist");
  $row3 = mysqli_fetch_array($result3);

  $result4 = mysqli_query($conn,"SELECT COUNT(email) AS mi FROM meditation_instructor ");
  $row4 = mysqli_fetch_array($result4);

  $result5 = mysqli_query($conn,"SELECT COUNT(email) AS phar FROM pharmacist");
  $row5 = mysqli_fetch_array($result5);

  $result6 = mysqli_query($conn,"SELECT COUNT(email) AS pat FROM patient ");
  $row6 = mysqli_fetch_array($result6);

  $result7 = mysqli_query($conn,"SELECT COUNT(email) AS adm FROM admin");
  $row7 = mysqli_fetch_array($result7);


 ?>



   <div class="cRS">


            <div class="card">
              <img src="img/pa2.jpg" alt="Avatar" style="width:80%; height:60%">
                  <div class="container">
                    <button class="btncard btncard1am"><a href="amPatient.php">Patient</a></button>
                       <p>Total <b><?php echo $row6["pat"] ?></b></p>
                 </div>
            </div>

            <div class="card">
               <img src="img/d1.jpg" alt="Avatar" style="width:100%">
                   <div class="container">
                     <button class="btncard btncard1am"><a href="amDoctor.php">Doctor</a></button>
                    <p>Total <b><?php echo $row["doc"] ?></b></p>
                  </div>
            </div>

            <div class="card">
               <img src="img/c4.jpg" alt="Avatar" style="width:100%; height:60%">
                   <div class="container">
                     <button class="btncard btncard1am"><a href="amCounsellor.php">Counsellor</a></button>
                      <p>Total <b><?php echo $row2["coun"] ?></b></p>
                  </div>
            </div>



    </div>

    <div class="cRS2">

           <div class="card2">
              <img src="img/a3.jpg" alt="Avatar" style="width:100% ">
                  <div class="container">
                    <button class="btncard btncard1am"><a href="amAdmin.php">Admin</a></button>
                     <p>Total <b><?php echo $row7["adm"] ?></b></p>
                 </div>
           </div>

           <div class="card2">
              <img src="img/m2.jpg" alt="Avatar" style="width:100%">
                  <div class="container">
                    <button class="btncard btncard1am"><a href="amMeditationInstructor.php">Meditation Instructor</a></button>
                     <p>Total <b><?php echo $row4["mi"] ?></b></p>
                 </div>
           </div>

           <div class="card2">
              <img src="img/p2.jpg" alt="Avatar" style="width:100%">
                  <div class="container">
                    <button class="btncard btncard1am"><a href="amPharmacist.php">Pharmacist</a></button>
                     <p>Total <b><?php echo $row5["phar"] ?></b> </p>
                 </div>
           </div>

           <div class="card2">
              <img src="img/n1.jpg" alt="Avatar" style="width:100%">
                  <div class="container">
                    <button class="btncard btncard1am"><a href="amNutritionist.php">Nutritionist</a></button>
                     <p>Total  <b><?php echo $row3["nut"] ?></b></p>
                 </div>
           </div>




<?php
 include_once "footer.php";
?>
