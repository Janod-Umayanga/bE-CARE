<?php
 include_once "sessionfile.php";
?>

<?php
 include_once "header.php";
 require_once "includes/dbh.inc.php";

?>

 <sectionc class="sAdminAM">
     <div class="cAdminAM">
            <h1>Patient
               <button class="buttonam button1am"><a href="addnewpatient.php">Add New </a></button>
            </h1>
            <form class="searchform" action="" method="GET">
                  <input type="text" name="search" placeholder="Filter patient by first name, last name">&nbsp
                  <button type="submit">Search</button>
              </form>

            <div class="amAdmintable">


            <table id="reg">
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Nic</th>
                <th>Registered Date</th>
                <th></th>
                <th></th>

              </tr>

              <?php
              if (isset($_GET['search'])) {
                  $se = $_GET['search'];
                  $sql="SELECT * FROM patient WHERE CONCAT(first_name,last_name) LIKE '%$se%' AND delete_flag=0 ";
                  $result = mysqli_query($conn, $sql);


                  if ($result->num_rows > 0){
                      while($row = mysqli_fetch_array($result))
                      {
                      echo "<tr>";
                      echo "<td>".$row['first_name']."</td>";
                      echo "<td>".$row['last_name']."</td>";
                      echo "<td>".$row['nic']."</td>";
                      echo "<td>".$row['registered_date']."</td>";
                      ?>

                      <td>
                        <form  action="viewMoreAMPa.php" method="post">
                          <button class="buttonamU button1amU" value="<?php echo $row["patient_id"] ?>" name="submit">View More</button>
                       </form>


                      </td>

                      <td>
                       <form action="./includes/amDeletePatient.inc.php" method="post">
                             <button class="buttonamD button1amD" value="<?php echo $row["patient_id"] ?>" name="DeletePatient">Delete</button>
                      </form>
                       </td>

                      <?php echo "<tr>";
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
              }else{

               $result = mysqli_query($conn,"SELECT * FROM patient WHERE delete_flag=0");

               while ($row = mysqli_fetch_array($result))
               {
                 echo "<tr>";
                 echo "<td>".$row['first_name']."</td>";
                 echo "<td>".$row['last_name']."</td>";
                 echo "<td>".$row['nic']."</td>";
                 echo "<td>".$row['registered_date']."</td>";
                 ?>

                 <td>
                   <form  action="viewMoreAMPa.php" method="post">
                     <button class="buttonamU button1amU" value="<?php echo $row["patient_id"] ?>" name="submit">View More</button>
                  </form>


                 </td>

                 <td>
                  <form action="./includes/amDeletePatient.inc.php" method="post">
                        <button class="buttonamD button1amD" value="<?php echo $row["patient_id"] ?>" name="DeletePatient">Delete</button>
                 </form>
                  </td>

                 <?php echo "<tr>";
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


<?php
 include_once "footer.php";
?>
