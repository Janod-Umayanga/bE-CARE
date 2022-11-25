<?php
 include_once "Msessionfile.php";
?>
<?php
 include_once "Mheader.php";
?>


<?php
  require_once "includes/dbh.inc.php";
  $current_date= date("Y-m-d");

  $result = mysqli_query($conn,"SELECT COUNT(date) AS d1 FROM med_timeslot WHERE date>='$current_date' AND appointment_day='Monday'");
  $row = mysqli_fetch_array($result);

  $result2 = mysqli_query($conn,"SELECT COUNT(date) AS d2 FROM med_timeslot WHERE date>='$current_date' AND appointment_day='Tuesday'");
  $row2 = mysqli_fetch_array($result2);

  $result3 = mysqli_query($conn,"SELECT COUNT(date) AS d3 FROM med_timeslot WHERE date>='$current_date' AND appointment_day='Wednesday'");
  $row3 = mysqli_fetch_array($result3);

  $result4 = mysqli_query($conn,"SELECT COUNT(date) AS d4 FROM med_timeslot WHERE date>='$current_date' AND appointment_day='Thursday'");
  $row4 = mysqli_fetch_array($result4);

  $result5 = mysqli_query($conn,"SELECT COUNT(date) AS d5 FROM med_timeslot WHERE date>='$current_date' AND appointment_day='Friday'");
  $row5 = mysqli_fetch_array($result5);

  $result6 = mysqli_query($conn,"SELECT COUNT(date) AS d6 FROM med_timeslot WHERE date>='$current_date' AND appointment_day='Saturday'");
  $row6 = mysqli_fetch_array($result6);

  $result7 = mysqli_query($conn,"SELECT COUNT(date) AS d7 FROM med_timeslot WHERE date>='$current_date' AND appointment_day='Sunday'");
  $row7 = mysqli_fetch_array($result7);

 ?>



   <div class="cRS">
            <?php if($row["d1"] > 0){?>
            <div class="card">
               <img src="img/mm8.jpg" alt="Avatar" style="width:70%; height:60%">
                   <div class="container">
                     <button class="btncard btncard1am"><a href="MregusersMon.php">Monday</a></button>

                  </div>
            </div>

          <?php } if($row2["d2"]>0) { ?>


            <div class="card">
               <img src="img/m5.jpg" alt="Avatar" style="width:90%; height:60%">
                   <div class="container">
                     <button class="btncard btncard1am"><a href="">Tuesday</a></button>
                  </div>
            </div>

          <?php }if($row3["d3"]>0) { ?>

            <div class="card">
               <img src="img/mm3.jpg" alt="Avatar" style="width:70%; height:60%">
                   <div class="container">
                     <button class="btncard btncard1am"><a href="">Wednesday</a></button>

                  </div>
            </div>


    </div>

    <div class="cRS2">

    <?php }if($row4["d4"]>0) { ?>

             <div class="card">
                <img src="img/mm5.jpg" alt="Avatar" style="width:70%; height:60%">
                    <div class="container">
                      <button class="btncard btncard1am"><a href="">Thursday</a></button>

                   </div>
             </div>

        <?php }if($row5["d5"]>0) { ?>

             <div class="card">
                <img src="img/mm6.jpg" alt="Avatar" style="width:70%; height:60%">
                    <div class="container">
                      <button class="btncard btncard1am"><a href="">Friday</a></button>

                   </div>
             </div>

        <?php }if($row6["d6"]>0) { ?>

             <div class="card">
                <img src="img/mm7.jpg" alt="Avatar" style="width:90%; height:60%">
                    <div class="container">
                      <button class="btncard btncard1am"><a href="">Saturday</a></button>

                   </div>
             </div>

       <?php }if($row7["d7"]>0) { ?>

             <div class="card">
                <img src="img/mm9.jpg" alt="Avatar" style="width:90%; height:60%">
                    <div class="container">
                      <button class="btncard btncard1am"><a href="">Sunday</a></button>

                   </div>
             </div>
       <?php }?>

     </div>




<?php
 include_once "Mfooter.php";
?>
