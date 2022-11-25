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

            <form class="searchform" action="" method="GET">
                  <input type="text" name="search" placeholder="Filter requested counsellor by first name, last name, city">&nbsp
                  <button type="submit">Search</button>
              </form>

         <div class="amAdmintable">


            <table id="reg">
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Requested Date</th>
                <th>City</th>
                <th></th>
                <th></th>
                <th></th>


              </tr>
              <?php
              if (isset($_GET['search'])) {
                  $se = $_GET['search'];
                  $sql="SELECT * FROM requested_counsellor WHERE CONCAT(first_name,last_name,city) LIKE '%$se%'";
                  $result = mysqli_query($conn, $sql);


                  if ($result->num_rows > 0){

              while ($row = mysqli_fetch_array($result))
              {
                echo "<tr>";
                echo "<td>".$row['first_name']."</td>";
                echo "<td>".$row['last_name']."</td>";
                echo "<td>".$row['registered_date']."</td>";
                echo "<td>".$row['city']."</td>";

             ?>

              <td>
                <form  action="viewMoreRCoun.php" method="post">
                  <button class="buttonamUyy button1amUyy" value="<?php echo $row["requested_counsellor_id"] ?>" name="submit">View More</button>
               </form>

             </td>

             <td>
                   <form  action="./includes/verifyC.inc.php" method="post">
                          <button class="buttonamUzz button1amUzz" value="<?php echo $row["requested_counsellor_id"] ?>" name="verifyC">Verify</button>
                   </form>
                  </td>
                  <td>
                    <form action="./includes/NotverifyC.inc.php" method="post">
                          <button class="buttonamUxx button1amUxx" value="<?php echo $row["requested_counsellor_id"] ?>" name="NotverifyC">Not Verify</button>
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

       $result = mysqli_query($conn,"SELECT * FROM requested_counsellor");

       while ($row = mysqli_fetch_array($result))
       {
         echo "<tr>";
         echo "<td>".$row['first_name']."</td>";
         echo "<td>".$row['last_name']."</td>";
         echo "<td>".$row['registered_date']."</td>";
         echo "<td>".$row['city']."</td>";
       ?>

       <td>
         <form  action="viewMoreRCoun.php" method="post">
           <button class="buttonamUyy button1amUyy" value="<?php echo $row["requested_counsellor_id"] ?>" name="submit">View More</button>
        </form>

      </td>

      <td>
            <form  action="./includes/verifyC.inc.php" method="post">
                   <button class="buttonamUzz button1amUzz" value="<?php echo $row["requested_counsellor_id"] ?>" name="verifyC">Verify</button>
            </form>
           </td>
           <td>
             <form action="./includes/NotverifyC.inc.php" method="post">
                   <button class="buttonamUxx button1amUxx" value="<?php echo $row["requested_counsellor_id"] ?>" name="NotverifyC">Not Verify</button>
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
