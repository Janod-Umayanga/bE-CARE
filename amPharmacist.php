<?php
 include_once "sessionfile.php";
?>

<?php
 include_once "header.php";
 require_once "includes/dbh.inc.php";

?>

 <sectionc class="sAdminAM">
     <div class="cAdminAM">
            <h1>Pharmacist
            <button class="buttonam button1am"><a href="addnewpharmacist.php">Add New </a></button>
            </h1>
           <div class="amAdmintable">


            <table id="reg">
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Registered date</th>
                <th>pharmacy name</th>
                <th>city</th>

                <th></th>
                <th></th>

              </tr>

              <?php
              $result = mysqli_query($conn,"SELECT * FROM Pharmacist");

              while ($row = mysqli_fetch_array($result))
              {
                echo "<tr>";
                echo "<td>".$row['first_name']."</td>";
                echo "<td>".$row['last_name']."</td>";
                echo "<td>".$row['registered_date']."</td>";
                echo "<td>".$row['pharmacy_name']."</td>";
                echo "<td>".$row['city']."</td>";
              ?>

              <td>
                <form  action="viewMoreAMPhar.php" method="post">
                  <button class="buttonamU button1amU" value="<?php echo $row["pharmacist_id"] ?>" name="submit">View More</button>
               </form>


              </td>

              <td>
                  <form action="./includes/amDeleteP.inc.php" method="post">
                        <button class="buttonamD button1amD" value="<?php echo $row["Pharmacist_id"] ?>" name="DeleteP">Delete</button>
                 </form>
              </td>

              <?php echo "<tr>";
              echo "<td></td>";
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


             ?>





           </table>
         </div>
      </div>
  </section>


<?php
 include_once "footer.php";
?>
