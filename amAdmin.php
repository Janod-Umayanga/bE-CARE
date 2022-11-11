<?php
 include_once "header.php";
 require_once "includes/dbh.inc.php";

?>

 <sectionc class="signupAdminAM">
     <div class="contentAdminAM">
            <h1>Admin Account Management</h1>
            <button class="buttonam button1am"><a href="addnewadmin.php">Add new Account</a></button>
            <table id="customers">
              <tr>
                <th>Admin Id</th>
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
                echo "<td>".$row['admin_id']."</td>";
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
                ?> <td><button class="buttonamD button1amD"><a href="">Delete</a></button></td>

                <?php echo "</tr>";
              }


               ?>



           </table>

      </div>
  </section>


<?php
 include_once "footer.php";
?>
