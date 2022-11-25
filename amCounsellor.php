<?php
 include_once "sessionfile.php";
?>

<?php
 include_once "header.php";
 require_once "includes/dbh.inc.php";

?>

 <sectionc class="sAdminAM">
     <div class="cAdminAM">
            <h1>Counsellor
            <button class="buttonam button1am"><a href="addnewcounsellor.php">Add New </a></button>
            </h1>

            <form class="searchform" action="" method="GET">
                  <input type="text" name="search" placeholder="Filter counsellor by first name, last name, city">&nbsp
                  <button type="submit">Search</button>
              </form>

           <div class="amAdmintable">


            <table id="reg">
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Registered date</th>
                <th>city</th>
                <th></th>

                <th></th>

              </tr>

              <?php
              if (isset($_GET['search'])) {
                  $se = $_GET['search'];
                  $sql="SELECT * FROM counsellor WHERE CONCAT(first_name,last_name,city) LIKE '%$se%'AND delete_flag=0 ";
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
                  <form  action="viewMoreAMCoun.php" method="post">
                    <button class="buttonamU button1amU" value="<?php echo $row["counsellor_id"] ?>" name="submit">View More</button>
                 </form>

               </td>

               <td>

               <form action="./includes/amDeleteC.inc.php" method="post">
                     <button class="buttonamD button1amD" value="<?php echo $row["counsellor_id"] ?>" name="DeleteC">Delete</button>
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

         $result = mysqli_query($conn,"SELECT * FROM counsellor WHERE delete_flag=0");

         while ($row = mysqli_fetch_array($result))
         {
           echo "<tr>";
           echo "<td>".$row['first_name']."</td>";
           echo "<td>".$row['last_name']."</td>";
           echo "<td>".$row['registered_date']."</td>";
           echo "<td>".$row['city']."</td>";
         ?>

         <td>
           <form  action="viewMoreAMCoun.php" method="post">
             <button class="buttonamU button1amU" value="<?php echo $row["counsellor_id"] ?>" name="submit">View More</button>
          </form>

        </td>

        <td>

          <form action="./includes/amDeleteC.inc.php" method="post">
              <button class="buttonamD button1amD" value="<?php echo $row["counsellor_id"] ?>" name="DeleteC">Delete</button>
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
