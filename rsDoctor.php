<?php
 include_once "sessionfile.php";
?>
<?php
 include_once "header.php";
 require_once "includes/dbh.inc.php";

?>

 <sectionc class="sAdminAM">
     <div class="cAdminAM">
            <h1>Doctor</h1>

            <form class="searchform" action="" method="GET">
                  <input type="text" name="search" placeholder="Filter requested doctor by first name, last name, city, type, specialization">&nbsp
                  <button type="submit">Search</button>
            </form>

         <div class="amAdmintable">


            <table id="reg">
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Requested Date</th>
                <th>Type</th>
                <th>Specialization</th>
                <th></th>
                <th></th>
                <th></th>


              </tr>

              <?php
              if (isset($_GET['search'])) {
                  $se = $_GET['search'];
                  $sql="SELECT * FROM requested_doctor WHERE CONCAT(first_name,last_name,city,type,specialization) LIKE '%$se%'";
                  $result = mysqli_query($conn, $sql);


              if ($result->num_rows > 0){

              while ($row = mysqli_fetch_array($result))
              {
                echo "<tr>";
                echo "<td>".$row['first_name']."</td>";
                echo "<td>".$row['last_name']."</td>";
                echo "<td>".$row['registered_date']."</td>";
                echo "<td>".$row['type']."</td>";
                echo "<td>".$row['specialization']."</td>";

             ?>

                 <td>
                   <form  action="viewMoreRDoc.php" method="post">
                     <button class="buttonamUyy button1amUxx" value="<?php echo $row["requested_doctor_id"] ?>" name="submit">View More</button>
                   </form>

                 </td>


                  <td>
                    <form  action="./includes/verifyD.inc.php" method="post">
                           <button class="buttonamUzz button1amUzz" value="<?php echo $row["requested_doctor_id"] ?>" name="verifyD">Verify</button>
                    </form>
                   </td>
                   <td>
                     <form action="./includes/NotverifyD.inc.php" method="post">
                           <button class="buttonamUxx button1amUzz" value="<?php echo $row["requested_doctor_id"] ?>" name="NotverifyD">Not Verify</button>
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
               }
             }else{

              $result = mysqli_query($conn,"SELECT * FROM requested_doctor");

              while ($row = mysqli_fetch_array($result))
              {
                echo "<tr>";
                echo "<td>".$row['first_name']."</td>";
                echo "<td>".$row['last_name']."</td>";
                echo "<td>".$row['registered_date']."</td>";
                echo "<td>".$row['type']."</td>";
                echo "<td>".$row['specialization']."</td>";
             ?>

             <td>
               <form  action="viewMoreRDoc.php" method="post">
                 <button class="buttonamUyy button1amUxx" value="<?php echo $row["requested_doctor_id"] ?>" name="submit">View More</button>
               </form>

             </td>


              <td>
                <form  action="./includes/verifyD.inc.php" method="post">
                       <button class="buttonamUzz button1amUzz" value="<?php echo $row["requested_doctor_id"] ?>" name="verifyD">Verify</button>
                </form>
               </td>
               <td>
                 <form action="./includes/NotverifyD.inc.php" method="post">
                       <button class="buttonamUxx button1amUzz" value="<?php echo $row["requested_doctor_id"] ?>" name="NotverifyD">Not Verify</button>
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
             }


                  ?>



           </table>
     </div>
      </div>
  </section>


<?php
 include_once "footer.php";
?>
