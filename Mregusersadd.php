<?php
 include_once "Msessionfile.php";
?>

<?php
 include_once "Mheader.php";
?>


<sectionc class="sViewMAMD">

      <div class="cViewMAMD">

              <h1>Add new timeslot</h1>

      <div class="cViewMAMDAA">


              <form  action="includes/Mregusersadd.inc.php" method="post" >
                  <div>
                      <label>Month</label>
                      <input type="month"  name="month" required="true" >

                      <label>Day</label>
                     <select name="day" id="day" required="true">
                         <option value="Monday">Monday</option>
                         <option value="Tuesday">Tuesday</option>
                         <option value="Wednesday">Wednesday</option>
                         <option value="Thursday">Thursday</option>
                         <option value="Friday">Friday</option>
                         <option value="Saturday">Saturday</option>
                         <option value="Sunday">Sunday</option>

                      </select>


                      <label>Starting Time</label>
                      <input type="time"  name="starting_time" required="true"  >

                      <label>Ending time</label>
                      <input type="time" name="ending_time"  required="true" >

                      <label>Fee</label>
                      <input type="number" name="fee"  required="true" >


                    <label>Address</label>
                    <input type="text" name="address"  required="true"">


                      <button id="cBigButton" type="submit" name="submit" value="<?php echo $_SESSION["userMid"] ?>" >Submit</button>



                  </div>




              </form>

              <?php
                  if(isset($_GET["error"])){
                    if($_GET["error"]=="recheck month"){
                       echo "<p class='error'>Recheck month!</p>";
                    }

                  }
               ?>

      </div>


      </div>

  </section>




<?php
 include_once "Mfooter.php";
?>
