<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>
<?php  $newSession=$data['newSession']  ?>


<sectionc class="sViewMAMD">

      <div class="cViewMAMD">

              <h1>Session Details</h1>

      <div class="cViewMAMDAA">


              <form >
                  <div>
                      <label>Title</label>
                      <input type="text"  disabled="true" value="<?php echo $newSession->title ?>">

                      <label>Date</label>
                      <input type="text"  disabled="true" value="<?php echo $newSession->date ?>">

                      <label>Starting Time</label>
                      <input type="text"  disabled="true" value="<?php echo $newSession->starting_time ?>">

                      <label>Ending Time</label>
                      <input type="text"  disabled="true" value="<?php echo $newSession->ending_time ?>" >

                      <label>Address</label>
                      <input type="email"  disabled="true" value="<?php echo $newSession->address ?>">

                      <label>Fee</label>
                      <input type="text"  disabled="true" value="<?php echo $newSession->fee ?>">


                      <label>Description</label>

                      <textarea rows="8" cols="71" id="viewmoresessiontxtarea" ><?php echo $newSession->description ?></textarea>

                      <button id="cBigButton" onclick="location.href='<?php echo URLROOT;?>/MedInstrSession/medInstrNewSession'" type="button">Go back</button>



                  </div>




              </form>

      </div>


      </div>

  </section>





<?php require APPROOT.'/views/inc/footer.php'; ?>


