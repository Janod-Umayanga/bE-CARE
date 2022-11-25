<?php
 include_once "Msessionfile.php";
?>
<?php
 include_once "Mheader.php";
 require_once "includes/dbh.inc.php";
 $current_date= date("Y-m-d");

 $result = mysqli_query($conn,"SELECT * FROM session WHERE meditation_instructor_id={$_SESSION["userMid"]} AND date<'$current_date'");
 if($result->num_rows>0){
?>

 <sectionc class="sAdminAM">
     <div class="cAdminAM">
            <h1>Sessions</h1>
            <form class="searchform" action="" method="GET">
                  <input type="text" name="search" placeholder="Filter Completed sessions by title date address fee">&nbsp
                  <button type="submit">Search</button>
            </form>

         <div class="amAdmintable">


            <table id="reg">
              <tr>
                <th>Session Title</th>
                <th>Date</th>
                <th>Starting Time</th>
                <th>Ending Time</th>
                <th></th>
                <th></th>

              </tr>

              <?php
              if (isset($_GET['search'])) {
                  $se = $_GET['search'];
                  $sql="SELECT * FROM session WHERE meditation_instructor_id={$_SESSION["userMid"]} AND date<'$current_date' AND CONCAT(title,date,address, fee) LIKE '%$se%'";
                  $result = mysqli_query($conn, $sql);


                  if ($result->num_rows > 0){

              while ($row = mysqli_fetch_array($result))
              {
                echo "<tr>";
                echo "<td>".$row['title']."</td>";
                echo "<td>".$row['date']."</td>";
                echo "<td>".$row['starting_time']."</td>";
                echo "<td>".$row['ending_time']."</td>";
                ?>

                <td>
                    <form  action="viewMoreMsessionOld.php" method="post">
                           <button class="buttonamUyy  button1amUyy " value="<?php echo $row["session_id"] ?>" name="submit">View More</button>
                    </form>
                   </td>


                  <td>
                    <form  action="regUsersSession.php" method="post">
                           <button class="buttonamMS button1amMS" value="<?php echo $row["session_id"] ?>" name="regusersSession">View Registered Users</button>
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

                ?> <td>
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
           echo "<td>".$row['title']."</td>";
           echo "<td>".$row['date']."</td>";
           echo "<td>".$row['starting_time']."</td>";
           echo "<td>".$row['ending_time']."</td>";
           ?>

           <td>
               <form  action="viewMoreMsessionOld.php" method="post">
                      <button class="buttonamUyy  button1amUyy " value="<?php echo $row["session_id"] ?>" name="submit">View More</button>
               </form>
              </td>


             <td>
               <form  action="regUsersSession.php" method="post">
                      <button class="buttonamMS button1amMS" value="<?php echo $row["session_id"] ?>" name="regusersSession">View Registered Users</button>
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

        <td>

        </td>
           <?php echo "</tr>";
         }
        }


               ?>





           </table>
     </div>
      </div>
  </section>

<?php }else{ ?>


   <sectionc class="sAdminAM">
       <div class="cAdminAM">
              <h1>No sessions created yet.</h1>
       </div>
      </section>

<?php } ?>
<?php
 include_once "Mfooter.php";
?>
