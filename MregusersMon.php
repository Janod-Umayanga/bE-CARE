<?php
 include_once "Msessionfile.php";
?>
<?php
 include_once "Mheader.php";
 require_once "includes/dbh.inc.php";
 $current_date= date("Y-m-d");


$result = mysqli_query($conn,"SELECT * FROM med_timeslot WHERE date>='$current_date' AND appointment_day='Monday' ORDER BY date ASC ");

if($result->num_rows>0){  ?>

 <sectionc class="sMAdminAM">
       <div class="cMAdminAM">


   <?php
   while ($row = mysqli_fetch_array($result))
   { ?>
         <h1><?php echo $row["date"]; ?> | <?php echo $row["appointment_day"]; ?></h1>

         <div class="aMmAdmintable">
         <?php
           $result2 = mysqli_query($conn,"SELECT * FROM med_channel WHERE med_timeslot_id={$row["med_timeslot_id"]} ");
           if($result2->num_rows>0){  ?>

          
            <table id="Mreg">
              <tr>
                <th>Starting time</th>
                <th>Ending time</th>
                <th>Name</th>
                <th>Age</th>
                <th>Contact number</th>
                <th>Gender</th>

              </tr>

              <?php

              while ($row2 = mysqli_fetch_array($result2))
              {
                echo "<tr>";
                echo "<td>".$row['starting_time']."</td>";
                echo "<td>".$row['ending_time']."</td>";
                echo "<td>".$row2['name']."</td>";
                echo "<td>".$row2['age']."</td>";
                echo "<td>".$row2['contact_number']."</td>";
                echo "<td>".$row2['gender']."</td>";

                ?>


                <?php echo "</tr>";


                echo "<tr>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";

                ?>
                <?php echo "</tr>";
              }
               ?>


           </table>
         <?php }?>
     </div>


   <?php } ?>

      </div>
  </section>



<?php }else{ ?>


   <sectionc class="sMAdminAM">
       <div class="cMAdminAM">
              <h1>No sessions created yet.</h1>
       </div>
      </section>

<?php } ?>
<?php
 include_once "Mfooter.php";
?>
