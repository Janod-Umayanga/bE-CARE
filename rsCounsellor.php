<?php
 include_once "sessionfile.php";
?>
<?php
 include_once "header.php";
 require_once "includes/dbh.inc.php";

?>

 <sectionc class="sAdminAM">
     <div class="cAdminAM">
            <h1>Counsellor</h1>
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
                <th>slmc_reg_number</th>
                <th>City</th>
                <th>Bank Name</th>
                <th>Account Holder Name</th>
                <th>Branch</th>
                <th>Account Number</th>
                <th>Qualification File</th>
                <th></th>
                <th></th>


              </tr>

              <?php
              $result = mysqli_query($conn,"SELECT * FROM requested_counsellor");

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
                echo "<td>".$row['slmc_reg_number']."</td>";
                echo "<td>".$row['city']."</td>";
                echo "<td>".$row['bank_name']."</td>";
                echo "<td>".$row['account_holder_name']."</td>";
                echo "<td>".$row['branch']."</td>";
                echo "<td>".$row['account_number']."</td>";
                echo "<td>".$row['qualification_file']."</td>";

                ?> <td>
                    <form  action="./includes/verifyC.inc.php" method="post">
                           <button class="buttonamU button1amU" value="<?php echo $row["requested_counsellor_id"] ?>" name="verifyC">Verify</button>
                    </form>
                   </td>
                   <td>
                     <form action="./includes/NotverifyC.inc.php" method="post">
                           <button class="buttonamU button1amU" value="<?php echo $row["requested_counsellor_id"] ?>" name="NotverifyC">Not Verify</button>
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
