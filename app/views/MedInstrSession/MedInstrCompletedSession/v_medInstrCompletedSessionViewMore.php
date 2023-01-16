<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>
<?php  $oldSession=$data['oldSession']  ?>


<sectionc class="sViewMAMD">

      <div class="cViewMAMD">

              <h1>Session Details</h1>

      <div class="cViewMAMDAA">


              <form >
                  <div>
                      <label>Title</label>
                      <input type="text"  disabled="true" value="<?php echo $oldSession->title ?>">

                      <label>Date</label>
                      <input type="text"  disabled="true" value="<?php echo $oldSession->date ?>">

                      <label>Starting Time</label>
                      <input type="text"  disabled="true" value="<?php echo $oldSession->starting_time ?>">

                      <label>Ending Time</label>
                      <input type="text"  disabled="true" value="<?php echo $oldSession->ending_time ?>" >

                      <label>Address</label>
                      <input type="email"  disabled="true" value="<?php echo $oldSession->address ?>">

                      <label>Fee</label>
                      <input type="text"  disabled="true" value="<?php echo $oldSession->fee ?>">


                      <label>Description</label>

                      <textarea rows="8" cols="71" id="viewmoresessiontxtarea" ><?php echo $oldSession->description ?></textarea>

                      <button id="cBigButton" onclick="location.href='<?php echo URLROOT;?>/MedInstrSession/medInstrOldSession'" type="button">Go back</button>



                  </div>




              </form>

      </div>


      </div>

  </section>





<?php require APPROOT.'/views/inc/footer.php'; ?>


