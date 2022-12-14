<?php
 include_once "Msessionfile.php";
?>
<?php
 include_once "Mheader.php";
 require_once "includes/dbh.inc.php";
 $current_date= date("Y-m-d");


$result0 = mysqli_query($conn,"SELECT * FROM med_timeslot WHERE date>='$current_date' AND appointment_day='Thursday' ORDER BY date ASC ");

if($result0->num_rows>0)
{  ?>

     <sectionc class="sMAdminAM">
           <div class="cMAdminAM">
              <br>
             <form class="searchform" action="" method="GET">
                   <input type="text" name="search" placeholder="Filter by date address fee ">&nbsp
                   <button type="submit">Search</button>
             </form><br>

      <?php
       if (isset($_GET['search']))
       {
           $se = $_GET['search'];
           $sql="SELECT * FROM med_timeslot WHERE date>='$current_date' AND appointment_day='Thursday' AND CONCAT(appointment_day,date,address, fee) LIKE '%$se%'";

           $result = mysqli_query($conn, $sql);


           if ($result->num_rows > 0){



           while ($row = mysqli_fetch_array($result))
           { ?>
             <h1><?php echo $row["date"]; ?> | <?php echo $row["appointment_day"]; ?></h1>
             <h4 style="color:Green;"><?php echo $row["address"]; ?> | Rs.<?php echo $row["fee"]; ?></h4>


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


       <?php }
     }else{ ?>
              <h1>No result found</h1>

       <?php }}else{


            while ($row = mysqli_fetch_array($result0))
            { ?>
                  <h1><?php echo $row["date"]; ?> | <?php echo $row["appointment_day"]; ?></h1>
                  <h4 style="color:Green;"><?php echo $row["address"]; ?> | Rs.<?php echo $row["fee"]; ?></h4>


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

     <?php
       }} ?>
          </div>
      </section>



<?php
}else{ ?>


      <section class="sMAdminAM">
          <div class="cMAdminAM">
              <h1>No users registered yet.</h1>
          </div>
      </section>

<?php
 } ?>



<?php
 include_once "Mfooter.php";
?>
