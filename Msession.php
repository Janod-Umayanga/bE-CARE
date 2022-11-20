<?php
 include_once "Msessionfile.php";
?>
<?php
 include_once "Mheader.php";
 require_once "includes/dbh.inc.php";

?>

 <sectionc class="smsession">
     <div class="cmsession">
            <h1>Sessions</h1>
         <div class="amAdmintable">


            <table id="reg">
              <tr>
                <th>Session Title</th>
                <th>Date</th>
                <th>Starting Time</th>
                <th>Ending Time</th>
                <th>Address</th>
                <th>Fee(Rs.)</th>
                <th>Description</th>
                <th></th>

              </tr>

              <?php
              $result = mysqli_query($conn,"SELECT * FROM session WHERE meditation_instructor_id={$_SESSION["userMid"]}");

              while ($row = mysqli_fetch_array($result))
              {
                echo "<tr>";
                echo "<td>".$row['title']."</td>";
                echo "<td>".$row['date']."</td>";
                echo "<td>".$row['starting_time']."</td>";
                echo "<td>".$row['ending_time']."</td>";
                echo "<td>".$row['address']."</td>";
                echo "<td>".$row['fee']."</td>";
                echo "<td>".$row['description']."</td>";
                ?> <td>
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
                echo "<td></td>";
                ?> <td>
                    <form >

                    </form>
                   </td>

                <?php echo "</tr>";






              }


               ?>



           </table>
     </div>
      </div>
  </section>


<?php
 include_once "Mfooter.php";
?>
