<?php
 include_once "Msessionfile.php";
?>
<?php
 include_once "Mheader.php";
?>

<?php
 require_once "./includes/dbh.inc.php";

 $id=$_POST["regusersSession"];
 


 ?>


  <sectionc class="sAdminAM">
      <div class="cAdminAM">
             <h1>Registered Users</h1>
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
               $result = mysqli_query($conn,"SELECT * FROM session_register WHERE session_id=$id");

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


                ?>



            </table>
      </div>
       </div>
   </section>



<?php
 include_once "Mfooter.php";
?>
