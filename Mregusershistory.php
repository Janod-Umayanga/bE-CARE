<?php
 include_once "Msessionfile.php";
?>
<?php
 include_once "Mheader.php";
 require_once "includes/dbh.inc.php";
 $current_date= date("Y-m-d");


$result = mysqli_query($conn,"SELECT * FROM med_timeslot INNER JOIN med_channel ON med_timeslot.med_timeslot_id=med_channel.med_timeslot_id WHERE meditation_instructor_id={$_SESSION["userMid"]} AND med_timeslot.date<'$current_date' ORDER BY med_timeslot.date DESC ");


if($result->num_rows>0){  ?>

 <sectionc class="sAdminAM">

       <div class="cAdminAM">

       <h1>Registered Users history</h1>
       <form class="searchform" action="" method="GET">
             <input type="text" name="search" placeholder="Filter registered users history by day date starting time ending time name, address">&nbsp
             <button type="submit">Search</button>
       </form>

         <div class="amAdmintable">


            <table id="reg">
              <tr>
                <th>Date</th>
                <th>Starting time</th>
                <th>Ending time</th>
                <th>Day</th>
                <th>Name</th>
                <th></th>
              </tr>

              <?php
              if (isset($_GET['search'])) {
                  $se = $_GET['search'];
                  $sql="SELECT * FROM med_timeslot INNER JOIN med_channel ON med_timeslot.med_timeslot_id=med_channel.med_timeslot_id WHERE meditation_instructor_id={$_SESSION["userMid"]} AND med_timeslot.date<'$current_date' AND CONCAT(appointment_day,date,address,starting_time,ending_time,name) LIKE '%$se%'";
                  $result = mysqli_query($conn, $sql);
                  if ($result->num_rows > 0){

              while ($row = mysqli_fetch_array($result))
              {
                echo "<tr>";
                echo "<td>".$row['date']."</td>";
                echo "<td>".$row['starting_time']."</td>";
                echo "<td>".$row['ending_time']."</td>";
                echo "<td>".$row['appointment_day']."</td>";
                echo "<td>".$row['name']."</td>";

                ?>

                <td>
                    <form  action="MregusershistoryViewMore.php" method="post">
                        <button id="myBtn" class="buttonamUzz button1amUzz" name="submit" value="<?php  echo $row["med_timeslot_id"]?>">View More</button>
                    </form>
                </td>


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


            }
        }else{



                        while ($row = mysqli_fetch_array($result))
                        {
                          echo "<tr>";
                          echo "<td>".$row['date']."</td>";
                          echo "<td>".$row['starting_time']."</td>";
                          echo "<td>".$row['ending_time']."</td>";
                          echo "<td>".$row['appointment_day']."</td>";
                          echo "<td>".$row['name']."</td>";

                          ?>

                          <td>
                            <form  action="MregusershistoryViewMore.php" method="post">
                                  <button id="myBtn" class="buttonamUzz button1amUzz" name="submit" value="<?php  echo $row["med_timeslot_id"]?>">View More</button>
                            </form>
                          </td>


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


                      } ?>

           </table>

     </div>

      </div>
  </section>



<?php }else{ ?>


   <sectionc class="sAdminAM">
       <div class="cAdminAM">
              <h1>No users registered yet.</h1>
       </div>
      </section>

<?php } ?>


<?php
 include_once "Mfooter.php";
?>
