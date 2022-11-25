<?php
 include_once "Msessionfile.php";
?>
<?php
 include_once "Mheader.php";
 require_once "includes/dbh.inc.php";

 $current_date= date("Y-m-d");
 $result = mysqli_query($conn,"SELECT * FROM session WHERE meditation_instructor_id={$_SESSION["userMid"]} AND date>='$current_date'");
 if($result->num_rows>0){

?>

 <sectionc class="sAdminAM">
     <div class="cAdminAM">
            <h1>Change Session Details
            <button class="buttonam button1am"><a href="addnewsession.php">Add New</a></button></h1>

            <form class="searchform" action="" method="GET">
                  <input type="text" name="search" placeholder="Filter sessions by title date address fee">&nbsp
                  <button type="submit">Search</button>
            </form>


         <div class="amAdmintable">


            <table id="reg">
              <tr>
                <th>Session Title</th>
                <th>Date</th>
                <th>Starting Time</th>
                <th>Ending Time</th>
                <th>Address</th>
                <th></th>
                <th></th>
              </tr>

              <?php
              if (isset($_GET['search'])) {
                  $se = $_GET['search'];
                  $sql="SELECT * FROM session WHERE meditation_instructor_id={$_SESSION["userMid"]} AND date>='$current_date' AND CONCAT(title,date,address, fee) LIKE '%$se%'";
                  $result = mysqli_query($conn, $sql);


                  if ($result->num_rows > 0){

              while ($row = mysqli_fetch_array($result))
              {
                echo "<tr>";
                echo "<td>".$row['title']."</td>";
                echo "<td>".$row['date']."</td>";
                echo "<td>".$row['starting_time']."</td>";
                echo "<td>".$row['ending_time']."</td>";
                echo "<td>".$row['address']."</td>";
                ?> <td>
                    <form  action="updateSession.php" method="post">
                           <button class="buttonamUqq button1amUqq" value="<?php echo $row["session_id"] ?>" name="updateSession">Update</button>
                    </form>
                   </td>
                   <td>

                     <form action="./includes/DeleteSession.inc.php" method="post">
                           <button class="buttonamUll button1amUll" value="<?php echo $row["session_id"] ?>" name="DeleteSession">Delete</button>
                    </form>


                   </td>

                <?php echo "</tr>";

                echo "<tr>";
                echo "<td></td>";
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
            echo "<td>".$row['title']."</td>";
            echo "<td>".$row['date']."</td>";
            echo "<td>".$row['starting_time']."</td>";
            echo "<td>".$row['ending_time']."</td>";
            echo "<td>".$row['address']."</td>";
            ?> <td>
                <form  action="updateSession.php" method="post">
                       <button class="buttonamUqq button1amUqq" value="<?php echo $row["session_id"] ?>" name="updateSession">Update</button>
                </form>
               </td>
               <td>

                 <form action="./includes/DeleteSession.inc.php" method="post">
                       <button class="buttonamUll button1amUll" value="<?php echo $row["session_id"] ?>" name="DeleteSession">Delete</button>
                </form>


               </td>

            <?php echo "</tr>";

            echo "<tr>";
            echo "<td></td>";
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
               <h1>No sessions created yet.</h1>
        </div>
         </div>
     </section>

  <?php }?>

<?php
 include_once "Mfooter.php";
?>
