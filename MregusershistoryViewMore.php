<?php
 include_once "Msessionfile.php";
?>

<?php
 include_once "Mheader.php";
?>

<?php
 if(isset($_POST["submit"])){
   $medtimeslotid=$_POST["submit"];
   $sql="SELECT * FROM med_timeslot INNER JOIN med_channel ON med_timeslot.med_timeslot_id=med_channel.med_timeslot_id WHERE med_timeslot.med_timeslot_id=$medtimeslotid";
   $result0 = mysqli_query($conn, $sql);
   $row0 = mysqli_fetch_array($result0);
 }
 ?>



<sectionc class="sViewMAMD">

      <div class="cViewMAMD">

              <h1>Registered User Details</h1>

      <div class="cViewMAMDAA">


              <form >
                  <div>


                      <label>Date</label>
                      <input type="text"  disabled="true" value="<?php echo $row0["date"] ?>">

                      <label>Starting Time</label>
                      <input type="text"  disabled="true" value="<?php echo $row0["starting_time"] ?>">

                      <label>Ending Time</label>
                      <input type="text"  disabled="true" value="<?php echo $row0["ending_time"] ?>">

                      <label>Day</label>
                      <input type="text"  disabled="true" value="<?php echo $row0["appointment_day"] ?>" >

                      <label>Name</label>
                      <input type="text"  disabled="true" value="<?php echo $row0["name"] ?>">



                       <label>Age</label>
                       <input type="text"  disabled="true" value="<?php echo $row0["age"] ?>">

                       <label>Contact Number</label>
                       <input type="text"  disabled="true" value="<?php echo $row0["contact_number"] ?>">

                       <label>Gender</label>
                       <input type="text"  disabled="true" value="<?php echo $row0["gender"] ?>">

                       <label>Registered Date</label>
                       <input type="text"  disabled="true" value="<?php echo $row0["reg_date"] ?>" >

                       <label>Fee</label>
                       <input type="text"  disabled="true" value="<?php echo $row0["fee"] ?>">

                       <label>Address</label>
                       <input type="text"  disabled="true" value="<?php echo $row0["address"] ?>" >



                    <button id="cBigButton" onclick="location.href='Mregusershistory.php'" type="button">Go back</button>


                  </div>
              </form>

      </div>


      </div>

  </section>




<?php
 include_once "Mfooter.php";
?>
