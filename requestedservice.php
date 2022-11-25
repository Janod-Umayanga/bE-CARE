<?php
 include_once "sessionfile.php";
?>
<?php
 include_once "header.php";
?>


<?php
  require_once "includes/dbh.inc.php";
  $result = mysqli_query($conn,"SELECT COUNT(email) AS doc FROM requested_doctor");
  $row = mysqli_fetch_array($result);

  $result2 = mysqli_query($conn,"SELECT COUNT(email) AS coun FROM requested_counsellor");
  $row2 = mysqli_fetch_array($result2);

  $result3 = mysqli_query($conn,"SELECT COUNT(email) AS nut FROM requested_nutritionist");
  $row3 = mysqli_fetch_array($result3);

  $result4 = mysqli_query($conn,"SELECT COUNT(email) AS mi FROM requested_meditation_instructor ");
  $row4 = mysqli_fetch_array($result4);

  $result5 = mysqli_query($conn,"SELECT COUNT(email) AS phar FROM requested_pharmacist");
  $row5 = mysqli_fetch_array($result5);

 ?>



   <div class="cRS">

            <div class="card">
               <img src="img/d1.jpg" alt="Avatar" style="width:100%">
                   <div class="container">
                     <button class="btncard btncard1am"><a href="rsDoctor.php">Doctor</a></button>
                    <p>No of Requested <b><?php echo $row["doc"] ?></b></p>
                  </div>
            </div>

            <div class="card">
               <img src="img/c4.jpg" alt="Avatar" style="width:100%; height:60%">
                   <div class="container">
                     <button class="btncard btncard1am"><a href="rsCounsellor.php">Counsellor</a></button>
                      <p>No of Requested <b><?php echo $row2["coun"] ?></b></p>
                  </div>
            </div>


    </div>

    <div class="cRS2">

           <div class="card2">
              <img src="img/n1.jpg" alt="Avatar" style="width:100%">
                  <div class="container">
                    <button class="btncard btncard1am"><a href="rsNutritionist.php">Nutritionist</a></button>
                     <p>No of Requested <b><?php echo $row3["nut"] ?></b></p>
                 </div>
           </div>


           <div class="card2">
              <img src="img/m2.jpg" alt="Avatar" style="width:100%">
                  <div class="container">
                    <button class="btncard btncard1am"><a href="rsMeditationInstructor.php">Meditation Instructor</a></button>
                     <p>No of Requested <b><?php echo $row4["mi"] ?></b></p>
                 </div>
           </div>

           <div class="card2">
              <img src="img/p2.jpg" alt="Avatar" style="width:100%">
                  <div class="container">
                    <button class="btncard btncard1am"><a href="rsPharmacist.php">Pharmacist</a></button>
                     <p>No of Requested <b><?php echo $row5["phar"] ?></b> </p>
                 </div>
           </div>

    </div>



<?php
 include_once "footer.php";
?>
