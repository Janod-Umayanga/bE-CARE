<?php
 include_once "sessionfile.php";
?>

<?php
 include_once "header.php";
 require_once "includes/dbh.inc.php";

?>

 <sectionc class="sAdminAM">
     <div class="cAdminAM">
            <h1>Admin
            <button class="buttonam button1am"><a href="addnewadmin.php">Add New </a></button>
            </h1>
           <div class="amAdmintable">


            <table id="reg">
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Registered Date</th>
                <th>Contact Number</th>
                <th></th>
                <th></th>

              </tr>

              <?php
              $result = mysqli_query($conn,"SELECT * FROM admin");

              while ($row = mysqli_fetch_array($result))
              {
                echo "<tr>";
                echo "<td>".$row['first_name']."</td>";
                echo "<td>".$row['last_name']."</td>";
                echo "<td>".$row['registered_date']."</td>";
                echo "<td>".$row['contact_number']."</td>";

                ?>

                <td>
                  <form  action="viewMoreAMAdm.php" method="post">
                    <button class="buttonamU button1amU" value="<?php echo $row["admin_id"] ?>" name="submit">View More</button>
                 </form>
                </td>

                <td>
                 <form action="./includes/amDeleteA.inc.php" method="post">
                       <button class="buttonamD button1amD" value="<?php echo $row["admin_id"] ?>" name="DeleteA">Delete</button>
                </form>

               </td>

                 <?php echo "<tr>";
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
