<?php
 include_once "sessionfile.php";
?>
<?php
 include_once "header.php";
 require_once "includes/dbh.inc.php";

?>

 <sectionc class="sAdminAM">
     <div class="cAdminAM">
            <h1>Nutritionist</h1>
         <div class="amAdmintable">


            <table id="reg">
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Contact Number</th>
                <th>Requested Date</th>
                <th>Fee</th>
                <th></th>
                <th></th>
                <th></th>

              </tr>

              <?php
              $result = mysqli_query($conn,"SELECT * FROM requested_nutritionist");

              while ($row = mysqli_fetch_array($result))
              {
                echo "<tr>";
                echo "<td>".$row['first_name']."</td>";
                echo "<td>".$row['last_name']."</td>";
                echo "<td>".$row['contact_number']."</td>";
                echo "<td>".$row['registered_date']."</td>";
                echo "<td>".$row['fee']."</td>";

                ?>
                <td>
                  <form  action="viewMoreRNut.php" method="post">
                    <button class="buttonamUyy button1amUyy" value="<?php echo $row["requested_nutritionist_id"] ?>" name="submit">View More</button>
                 </form>


                   <td>
                     <form  action="./includes/verifyN.inc.php" method="post">
                            <button class="buttonamUzz button1amUzz" value="<?php echo $row["requested_nutritionist_id"] ?>" name="verifyN">Verify</button>
                     </form>
                    </td>
                    <td>
                      <form action="./includes/NotverifyN.inc.php" method="post">
                            <button class="buttonamUxx button1amUxx" value="<?php echo $row["requested_nutritionist_id"] ?>" name="NotverifyN">Not Verify</button>
                     </form>
                   </td>

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
