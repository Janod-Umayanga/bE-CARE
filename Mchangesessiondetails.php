<?php
 include_once "Msessionfile.php";
?>
<?php
 include_once "Mheader.php";
 require_once "includes/dbh.inc.php";

?>

 <sectionc class="sAdminAM">
     <div class="cAdminAM">
            <h1>Update Session Details</h1>
            <button class="buttonam button1am"><a href="addnewsession.php">Add New</a></button>
         <div class="amAdmintable">


            <table id="customers">
              <tr>
                <th>Session Title</th>
                <th>Date</th>
                <th>Starting Time</th>
                <th>Ending Time</th>
                <th>Address</th>
                <th>Fee(Rs.)</th>
                <th>Description</th>
                <th></th>
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
                    <form  action="updateSession.php" method="post">
                           <button class="buttonamU button1amU" value="<?php echo $row["session_id"] ?>" name="updateSession">Update</button>
                    </form>
                   </td>
                   <td><button class="buttonamD button1amD"><a href="">Delete</a></button></td>

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
