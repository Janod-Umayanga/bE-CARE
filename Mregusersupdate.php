<?php
 include_once "Msessionfile.php";
?>

<?php
 include_once "Mheader.php";
 require_once "./includes/dbh.inc.php";

 $id=$_POST["updatetimeslot"];
 $result = mysqli_query($conn,"SELECT * FROM med_timeslot WHERE med_timeslot_id=$id");
 $row = mysqli_fetch_array($result);



?>


<sectionc class="sViewMAMD">

      <div class="cViewMAMD">

              <h1>Update timeslot</h1>

      <div class="cViewMAMDAA">


              <form  action="includes/Mregusersupdate.inc.php" method="post" >
                  <div>
                      <label>Date</label>
                      <input type="text"  name="date" disabled="true" value="<?php echo $row["date"] ?>">

                      <label>Starting Time</label>
                      <input type="time"  name="starting_time" required="true" value="<?php echo $row["starting_time"] ?>" >

                      <label>Ending time</label>
                      <input type="time" name="ending_time"  required="true" value="<?php echo $row["ending_time"] ?>">

                      <label>Fee</label>
                      <input type="number" name="fee"  required="true" value="<?php echo $row["fee"] ?>">

                      <label>Address</label>
                      <input type="text" name="address"  required="true" value="<?php echo $row["address"] ?>">


                      <button id="cBigButton" type="submit" name="submit" value="<?php echo $row["med_timeslot_id"] ?>" >Submit</button>



                  </div>




              </form>


      </div>


      </div>

  </section>




<?php
 include_once "Mfooter.php";
?>
