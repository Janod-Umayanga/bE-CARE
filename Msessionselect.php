<?php
 include_once "Msessionfile.php";
?>
<?php
 include_once "Mheader.php";
?>


<?php
  require_once "includes/dbh.inc.php";
  $current_date= date("Y-m-d");
  $result = mysqli_query($conn,"SELECT COUNT(title) AS new FROM session WHERE date>='$current_date' AND meditation_instructor_id={$_SESSION["userMid"]} ");
  $row = mysqli_fetch_array($result);

  $result2 = mysqli_query($conn,"SELECT COUNT(title) AS old FROM session  WHERE date<'$current_date' AND meditation_instructor_id={$_SESSION["userMid"]}");
  $row2 = mysqli_fetch_array($result2);


 ?>



   <div class="cRS">

            <div class="card">
               <img src="img/m3.jpg" alt="Avatar" style="width:100%; height:60%">
                   <div class="container">
                     <button class="btncard btncard1am"><a href="Msessionold.php">Completed Sessions</a></button>
                    <p> <b><?php echo $row2["old"] ?></b></p>
                  </div>
            </div>

            <div class="card">
               <img src="img/m4.jpg" alt="Avatar" style="width:90%; height:60%">
                   <div class="container">
                     <button class="btncard btncard1am"><a href="Msessionnew.php">Sessions To be Done</a></button>
                      <p> <b><?php echo $row["new"] ?></b></p>
                  </div>
            </div>


    </div>





<?php
 include_once "Mfooter.php";
?>
