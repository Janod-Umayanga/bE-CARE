<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>


<sectionc class="sViewMAMD">

      <div class="cViewMAMD">

              <h1>Update timeslot</h1>

      <div class="cViewMAMDAA">

              <form  action="<?php echo URLROOT;?>/MedInstrChangeTimeslot/updateMedInstrChangeTimeslot/<?php echo  $data["timeslot_id"] ?>" method="post" >
                <input type="hidden" name="date" value="<?php echo $data["date"] ?>">
           
               <div>
                      <label>Date</label>
                      <input type="text"  name="dat" disabled="true" value="<?php echo $data["date"] ?>">

                      <label>Starting Time</label>
                      <input type="time"  name="starting_time" required="true" value="<?php echo $data["starting_time"] ?>" >

                      <label>Ending time</label>
                      <input type="time" name="ending_time"  required="true" value="<?php echo $data["ending_time"] ?>">

                      <label>Fee</label>
                      <input type="number" name="fee"  required="true" value="<?php echo $data["fee"] ?>">

                      <label>Address</label>
                      <input type="text" name="address"  required="true" value="<?php echo $data["address"] ?>">


                      <button id="cBigButton" type="submit" name="submit"  >Submit</button>



                  </div>




              </form>


      </div>


      </div>

  </section>





  <?php require APPROOT.'/views/inc/footer.php'; ?>

