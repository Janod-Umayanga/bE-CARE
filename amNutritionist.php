<?php
 include_once "sessionfile.php";
?>

<?php
 include_once "header.php";
 require_once "includes/dbh.inc.php";

?>

 <sectionc class="sAdminAM">
     <div class="cAdminAM">
            <h1>Nutritionist Account Management</h1>
           <div class="amAdmintable">


            <table id="customers">
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Nic</th>
                <th>Contact Number</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Registered date</th>
                <th>slmc_reg_number</th>
                <th>fee</th>
                <th>Bank name</th>
                <th>Account holder name</th>
                <th>Branch</th>
                <th>Account Number</th>
                <th>Qualification File</th>

                <th></th>

              </tr>

              <?php
              $result = mysqli_query($conn,"SELECT * FROM nutritionist");

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
                echo "<td>".$row['fee']."</td>";
                echo "<td>".$row['bank_name']."</td>";
                echo "<td>".$row['account_holder_name']."</td>";
                echo "<td>".$row['branch']."</td>";
                echo "<td>".$row['account_number']."</td>";
              ?>

                <td>
                   <button class="buttonamDownload button1amDownload"><a download="<?php echo $row['qualification_file'] ?>"  href="uploads/<?php echo $row['qualification_file'] ?>">Download</a></button>

               </td>


                <td>

                  <form action="./includes/amDeleteN.inc.php" method="post">
                        <button class="buttonamD button1amD" value="<?php echo $row["nutritionist_id"] ?>" name="DeleteN">Delete</button>
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
