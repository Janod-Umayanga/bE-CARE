<?php
 include_once "Msessionfile.php";
?>

<?php
 include_once "Mheader.php";
?>

<?php
  if(isset($_POST["submit"])){
    require_once "includes/dbh.inc.php";
    $sesid=$_POST["submit"];
    $result = mysqli_query($conn,"SELECT * FROM session WHERE session_id=$sesid");
    $row = mysqli_fetch_array($result);
  }
 ?>


<sectionc class="sViewMAMD">

      <div class="cViewMAMD">

              <h1>Session Details</h1>

      <div class="cViewMAMDAA">


              <form >
                  <div>
                      <label>Title</label>
                      <input type="text"  disabled="true" value="<?php echo $row["title"] ?>">

                      <label>Date</label>
                      <input type="text"  disabled="true" value="<?php echo $row["date"] ?>">

                      <label>Starting Time</label>
                      <input type="text"  disabled="true" value="<?php echo $row["starting_time"] ?>">

                      <label>Ending Time</label>
                      <input type="text"  disabled="true" value="<?php echo $row["ending_time"] ?>" >

                      <label>Address</label>
                      <input type="email"  disabled="true" value="<?php echo $row["address"] ?>">

                      <label>Fee</label>
                      <input type="text"  disabled="true" value="<?php echo $row["fee"] ?>">


                      <label>Description</label>

                      <textarea rows="8" cols="71" id="viewmoresessiontxtarea" ><?php echo $row["description"] ?></textarea>

                      <button id="cBigButton" onclick="location.href='Msessionnew.php'" type="button">Go back</button>



                  </div>




              </form>

      </div>


      </div>

  </section>




<?php
 include_once "Mfooter.php";
?>
