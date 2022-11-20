<?php
 include_once "sessionfile.php";
?>
<?php
 include_once "header.php";
 require_once "includes/dbh.inc.php";

?>

 <sectionc class="sAdminAM">
     <div class="cAdminAM">
            <h1>Complaints</h1>
         <div class="amAdmintable">


            <table id="reg">
              <tr>
                <th>Name</th>
                <th>User Type</th>
                <th>Date</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Complaint</th>
                <th></th>


              </tr>

              <?php
              $result = mysqli_query($conn,"SELECT * FROM complaint ORDER BY complaint_date DESC");

              while ($row = mysqli_fetch_array($result))
              {
                if(!empty($row['patient_id'])){
                  $pid=$row['patient_id'];
                  $res= mysqli_query($conn,"SELECT first_name,last_name,email FROM patient WHERE patient_id=$pid");
                  $cname=mysqli_fetch_array($res);
                  $type="Patient";
                }else if(!empty($row['doctor_id'])){
                  $did=$row['doctor_id'];
                  $res= mysqli_query($conn,"SELECT first_name,last_name,email FROM doctor WHERE doctor_id=$did");
                  $cname=mysqli_fetch_array($res);
                  $type="Doctor";
                }else if(!empty($row['counsellor_id'])){
                  $cid=$row['counsellor_id'];
                  $res= mysqli_query($conn,"SELECT first_name,last_name,email FROM counsellor WHERE counsellor_id=$cid");
                  $cname=mysqli_fetch_array($res);
                  $type="Counsellor";
                }else if(!empty($row['nutritionist_id'])){
                  $nid=$row['nutritionist_id'];
                  $res= mysqli_query($conn,"SELECT first_name,last_name,email FROM nutritionist WHERE nutritionist_id=$nid");
                  $cname=mysqli_fetch_array($res);
                  $type="Nutritionist";
                }else if(!empty($row['pharmacist_id'])){
                  $fid=$row['pharmacist_id'];
                  $res= mysqli_query($conn,"SELECT first_name,last_name,email FROM pharmacist WHERE pharmacist_id=$fid");
                  $cname=mysqli_fetch_array($res);
                  $type="pharmacist";
                }else if(!empty($row['meditation_instructor_id'])){
                  $mid=$row['meditation_instructor_id'];
                  $res= mysqli_query($conn,"SELECT first_name,last_name,email FROM meditation_instructor WHERE meditation_instructor_id=$mid");
                  $cname=mysqli_fetch_array($res);
                  $type="Meditation Instructor";
                }

                echo "<tr>";
                echo "<td>".$cname["first_name"]." ".$cname["last_name"]."</td>";
                echo "<td>".$type."</td>";
                echo "<td>".$row['complaint_date']."</td>";
                echo "<td>".$cname['email']."</td>";

                echo "<td>".$row['subject']."</td>";
                echo "<td>".$row['description']."</td>";
                ?>
                 <td>
                   <input onclick="change()" id="<?php echo $cname['email'] ?>" type="button" class="buttonamDownload button1amDownload" value="Not Solved"></input>


                   <script>
                       function change()
                       {
                          var elem = document.getElementById("<?php echo $cname['email'] ?>");
                          if (elem.value=="Not Solved") elem.value = "Solved";
                          else elem.value = "Not Solved";
                       }
                   </script>

                 </td>
                 <?php echo "</tr>";?>


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


               ?>



           </table>
     </div>
      </div>
  </section>


<?php
 include_once "footer.php";
?>
