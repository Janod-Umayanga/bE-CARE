<?php
 include_once "Msessionfile.php";
?>
<?php
 include_once "Mheader.php";
 require_once "includes/dbh.inc.php";

 $current_date= date("Y-m-d");
 $result = mysqli_query($conn,"SELECT * FROM med_timeslot WHERE meditation_instructor_id={$_SESSION["userMid"]} AND date>='$current_date' AND med_timeslot_id NOT IN (SELECT med_timeslot_id from med_channel) ORDER BY date ASC  ");
 if($result->num_rows>0){



?>

 <sectionc class="sAdminAM">
     <div class="cAdminAM">
            <h1>Change Timeslot</h1>
            <form class="searchform" action="" method="GET">
                  <input type="text" name="search" placeholder="Filter timeslot by day date address fee starting time ending time">&nbsp
                  <button type="submit">Search</button>
            </form>


         <div class="amAdmintable">


            <table id="reg">
              <tr>
                <th>Date</th>
                <th>Starting Time</th>
                <th>Ending Time</th>
                <th>Day</th>
                <th></th>
                <th></th>
              </tr>

              <?php
              if (isset($_GET['search'])) {
                  $se = $_GET['search'];
                  $sql="SELECT * FROM med_timeslot WHERE meditation_instructor_id={$_SESSION["userMid"]} AND date>='$current_date' AND med_timeslot_id NOT IN (SELECT med_timeslot_id from med_channel) AND CONCAT(appointment_day,date,address,fee,starting_time,ending_time) LIKE '%$se%'";
                  $result = mysqli_query($conn, $sql);

                  if ($result->num_rows > 0){

              while ($row = mysqli_fetch_array($result))
              {
                echo "<tr>";
                echo "<td>".$row['date']."</td>";
                echo "<td>".$row['starting_time']."</td>";
                echo "<td>".$row['ending_time']."</td>";
                echo "<td>".$row['appointment_day']."</td>";
                ?> <td>
                    <form  action="Mregusersupdate.php" method="post">
                           <button class="buttonamUqq button1amUqq" value="<?php echo $row["med_timeslot_id"] ?>" name="updatetimeslot">Update</button>
                    </form>
                   </td>
                   <td>

                     <form action="./includes/Mregusersdelete.inc.php" method="post">
                           <button class="buttonamUll button1amUll" value="<?php echo $row["med_timeslot_id"] ?>" name="deletetimeslot">Delete</button>
                    </form>


                   </td>

                <?php echo "</tr>";

                echo "<tr>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";

                ?> <td>
                    <form >

                    </form>
                   </td>
                   <td>

                     <form >

                     </form>


                   </td>

                <?php echo "</tr>";






              }


            }
        }else{


          while ($row = mysqli_fetch_array($result))
          {
            echo "<tr>";
            echo "<td>".$row['date']."</td>";
            echo "<td>".$row['starting_time']."</td>";
            echo "<td>".$row['ending_time']."</td>";
            echo "<td>".$row['appointment_day']."</td>";
            ?>

            <td>
                <form  action="Mregusersupdate.php" method="post">
                       <button class="buttonamUqq button1amUqq" value="<?php echo $row["med_timeslot_id"] ?>" name="updatetimeslot">Update</button>
                </form>
               </td>
               <td>

                 <form action="./includes/Mregusersdelete.inc.php" method="post">
                       <button class="buttonamUll button1amUll" value="<?php echo $row["med_timeslot_id"] ?>" name="deletetimeslot">Delete</button>
                </form>


               </td>

            <?php echo "</tr>";

            echo "<tr>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";

            ?> <td>
                <form >

                </form>
               </td>
               <td>

                 <form >

                 </form>


               </td>

            <?php echo "</tr>";






          }


        } ?>

           </table>
     </div>
      </div>
  </section>


  <?php }else{?>
    <sectionc class="sAdminAM">
        <div class="cAdminAM">
               <h1>No timeslot created yet.</h1>
        </div>
         </div>
     </section>

  <?php }?>

<?php
 include_once "Mfooter.php";
?>
