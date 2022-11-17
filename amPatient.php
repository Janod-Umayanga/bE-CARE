<?php
 include_once "sessionfile.php";
?>

<?php
 include_once "header.php";
 require_once "includes/dbh.inc.php";

?>

 <sectionc class="sAdminAM">
     <div class="cAdminAM">
            <h1>Patient Account Management</h1>
           <div class="amAdmintable">


            <table id="customers">
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Nic</th>
                <th>Contact Number</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Registered Date</th>
                <th></th>

              </tr>

              <?php
              $result = mysqli_query($conn,"SELECT * FROM patient");

              while ($row = mysqli_fetch_array($result))
              {
                echo "<tr>";
                echo "<td>".$row['first_name']."</td>";
                echo "<td>".$row['last_name']."</td>";
                echo "<td>".$row['nic']."</td>";
                echo "<td>".$row['contact_number']."</td>";
                echo "<td>".$row['gender']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['registered_date']."</td>";
                ?> <td>
                  <form action="./includes/amDeletePatient.inc.php" method="post">
                        <button class="buttonamD button1amD" value="<?php echo $row["patient_id"] ?>" name="DeletePatient">Delete</button>
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
 include_once "footer.php";
?>
