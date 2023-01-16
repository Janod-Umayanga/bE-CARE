<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>

<sectionc class="sMSession">

      <div class="cMSession">

              <h1>Update Session</h1>
              <form action="<?php echo URLROOT;?>/MedInstrChangeSessionDetails/medInstrupdateSessionDetails/<?php echo  $data['session_id']?>" method="post">
                  <div>
                      <label>Title</label>
                      <input type="text" id="title" name="title" required="true" value="<?php echo $data['title'] ?>">

                      <label>Date</label>
                      <input type="date" id="date" name="date" required="true" value="<?php echo $data['date'] ?>">

                      <label>Starting Time</label>
                      <input type="time" id="starting_time" name="starting_time" required="true" value="<?php echo $data['starting_time'] ?>">

                      <label>Ending Time</label>
                      <input type="time" id="ending_time" name="ending_time" required="true" value="<?php echo $data['ending_time'] ?>">

                  </div>
                  <div>

                      <label>Address</label>
                      <input type="text" name="address" id="address" required="true" value="<?php echo $data['address'] ?>">

                      <label>Session Fee (Rs.)</label>
                      <input type="number" name="fee" id="fee" required="true" placeholder="1500" value="<?php echo $data['fee'] ?>">

                      <label>Description</label>
                      <textarea name="description" id="description" required="true" rows="8" cols="80"><?php echo $data['description'] ?></textarea>
                    
                      <button type="submit" class="updateSessionBtn" name="submit" >Update</button>
                    
                    
                    </div>





              </form>


        </div>

  </section>



<?php require APPROOT.'/views/inc/footer.php'; ?>
