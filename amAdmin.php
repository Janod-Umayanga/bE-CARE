<?php
 include_once "sessionfile.php";
?>

<?php
 include_once "header.php";
 require_once "includes/dbh.inc.php";

?>

 <sectionc class="sAdminAM">
     <div class="cAdminAM">
            <h1>Admin Account Management</h1>
            <button class="buttonam button1am"><a href="addnewadmin.php">Add new Account</a></button>
           <div class="amAdmintable">


            <table id="customers">
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Nic</th>
                <th>Contact Number</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Bank name</th>
                <th>Account holder name</th>
                <th>Branch</th>
                <th>Account Number</th>
                <th></th>

              </tr>

              <?php
              $result = mysqli_query($conn,"SELECT * FROM admin");

              while ($row = mysqli_fetch_array($result))
              {
                echo "<tr>";
                echo "<td>".$row['first_name']."</td>";
                echo "<td>".$row['last_name']."</td>";
                echo "<td>".$row['nic']."</td>";
                echo "<td>".$row['contact_number']."</td>";
                echo "<td>".$row['gender']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['bank_name']."</td>";
                echo "<td>".$row['account_holder_name']."</td>";
                echo "<td>".$row['branch']."</td>";
                echo "<td>".$row['account_number']."</td>";
                ?> <td>
                  <form action="./includes/amDeleteA.inc.php" method="post">
                        <button class="buttonamD button1amD" value="<?php echo $row["admin_id"] ?>" name="DeleteA">Delete</button>
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
