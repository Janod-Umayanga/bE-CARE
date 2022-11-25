<?php
 include_once "Msessionfile.php";
?>
<?php
 include_once "Mheader.php";
?>

<?php
 require_once "./includes/dbh.inc.php";
if(isset($_POST['regusersSession'])){
  $_SESSION['session_id'] = $_POST['regusersSession'];
}

 $result = mysqli_query($conn,"SELECT * FROM session_register WHERE session_id={$_SESSION['session_id']}");
 if ($result->num_rows > 0){

 ?>


  <sectionc class="sAdminAM">
      <div class="cAdminAM">
             <h1>Registered Users</h1>
             <form class="searchform" action="" method="post">
                   <input type="text" name="search" placeholder="Filter registered users by name, age">&nbsp
                   <button type="submit" name="sbt" value="<?php echo $id;?>">Search</button>
             </form>

          <div class="amAdmintable">


             <table id="reg">
               <tr>
                 <th>Name</th>
                 <th>Contact Number</th>
                 <th>Age</th>
                 <th>Gender</th>
                 <th>Registered Date and Time</th>

               </tr>

               <?php
               if (isset($_POST['search'])) {
                   $se = $_POST['search'];
                   $sql="SELECT * FROM session_register WHERE session_id={$_SESSION['session_id']} AND CONCAT(name,age) LIKE '%$se%'";
                   unset($_SESSION['session_id']);
                   $result = mysqli_query($conn, $sql);


                   if ($result->num_rows > 0){

               while ($row = mysqli_fetch_array($result))
               {
                 echo "<tr>";
                 echo "<td>".$row['name']."</td>";
                 echo "<td>".$row['contact_number']."</td>";
                 echo "<td>".$row['age']."</td>";
                 echo "<td>".$row['gender']."</td>";
                 echo "<td>".$row['registered_date_and_time']."</td>";
                 ?>

                 <?php echo "</tr>";

                 echo "<tr>";
                 echo "<td></td>";
                 echo "<td></td>";
                 echo "<td></td>";
                 echo "<td></td>";
                 echo "<td></td>";
                 ?>

                 <?php echo "</tr>";



               }



             }
         }else{


           while ($row = mysqli_fetch_array($result))
           {
             echo "<tr>";
             echo "<td>".$row['name']."</td>";
             echo "<td>".$row['contact_number']."</td>";
             echo "<td>".$row['age']."</td>";
             echo "<td>".$row['gender']."</td>";
             echo "<td>".$row['registered_date_and_time']."</td>";
             ?>

             <?php echo "</tr>";

             echo "<tr>";
             echo "<td></td>";
             echo "<td></td>";
             echo "<td></td>";
             echo "<td></td>";
             echo "<td></td>";
             ?>

             <?php echo "</tr>";



           }

         }


                ?>




            </table>
      </div>

       </div>
   </section>

 <?php }else{  ?>


     <sectionc class="sAdminAM">
         <div class="cAdminAM">
                <h1>Still no one register for a session.</h1>
          </div>
      </section>



 <?php } ?>



<?php
 include_once "Mfooter.php";
?>
