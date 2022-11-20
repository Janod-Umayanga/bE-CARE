<?php
 include_once "Msessionfile.php";
?>
<?php
 include_once "Mheader.php";
?>


<sectionc class="sMFeedback">

      <div class="cMFeedback">

        <h1>Feedback</h1>
        <!-- <button type="submit" class="newfeedback" name="submit"><a href="addnewfeedback.php"> Add new Feedback</a></button> -->

        <div class="cMFeedbackAA">
              <?php
              $result = mysqli_query($conn,"SELECT * FROM feedback ORDER BY feedback_date DESC");

              while ($row = mysqli_fetch_array($result))
              {
                if(!empty($row['patient_id'])){
                  $pid=$row['patient_id'];
                  $res= mysqli_query($conn,"SELECT first_name,last_name FROM patient WHERE patient_id=$pid");
                  $cname=mysqli_fetch_array($res);
                  $type="Patient";
                }else if(!empty($row['doctor_id'])){
                  $did=$row['doctor_id'];
                  $res= mysqli_query($conn,"SELECT first_name,last_name FROM doctor WHERE doctor_id=$did");
                  $cname=mysqli_fetch_array($res);
                  $type="Doctor";
                }else if(!empty($row['counsellor_id'])){
                  $cid=$row['counsellor_id'];
                  $res= mysqli_query($conn,"SELECT first_name,last_name, FROM counsellor WHERE counsellor_id=$cid");
                  $cname=mysqli_fetch_array($res);
                  $type="Counsellor";
                }else if(!empty($row['nutritionist_id'])){
                  $nid=$row['nutritionist_id'];
                  $res= mysqli_query($conn,"SELECT first_name,last_name  FROM nutritionist WHERE nutritionist_id=$nid");
                  $cname=mysqli_fetch_array($res);
                  $type="Nutritionist";
                }else if(!empty($row['pharmacist_id'])){
                  $fid=$row['pharmacist_id'];
                  $res= mysqli_query($conn,"SELECT first_name,last_name FROM pharmacist WHERE pharmacist_id=$fid");
                  $cname=mysqli_fetch_array($res);
                  $type="pharmacist";
                }else if(!empty($row['meditation_instructor_id'])){
                  $mid=$row['meditation_instructor_id'];
                  $res= mysqli_query($conn,"SELECT first_name,last_name FROM meditation_instructor WHERE meditation_instructor_id=$mid");
                  $cname=mysqli_fetch_array($res);
                  $type="Meditation Instructor";
                }


            echo  "<form  class='aaaa' action='includes/Mcomplaint.inc.php' method='post'>";

                         echo "<label>".$cname["first_name"]." ".$cname["last_name"]."</label>";
                         echo "<label>".$type."</label>";
                         echo "<label>".$row['feedback_date']."</label>";
                         echo "<label>".$row['description']."</label>";

            echo "</form>";
          }

        ?>

       </div>

      </div>

  </section>


<?php
 include_once "Mfooter.php";
?>
