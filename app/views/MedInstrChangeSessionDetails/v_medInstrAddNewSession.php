<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>


<sectionc class="sMSession">

      <div class="cMSession">

              <h1>Add New Session</h1>
              <form action="<?php echo URLROOT;?>/MedInstrChangeSessionDetails/addNewMedInstrSession" method="post">
                  <div>
                      <label>Title</label>
                      <input type="text" id="title" name="title" required="true" >

                      <label>Date</label>
                      <input type="date" id="date" name="date" required="true" >

                      <label>Starting Time</label>
                      <input type="time" id="starting_time" name="starting_time" required="true" >

                      <label>Ending Time</label>
                      <input type="time" id="ending_time" name="ending_time" required="true" >

                  </div>
                  <div>

                      <label>Address</label>
                      <input type="text" name="address" id="address" required="true" >

                      <label>Session Fee (Rs.)</label>
                      <input type="number" name="fee" id="fee" required="true" placeholder="1500">

                      <label>Description</label>
                      <textarea name="description" id="description" required="true" rows="6" cols="80"></textarea>
                       <br>
                      <button type="submit"  name="submit">Add</button>

                  </div>





              </form>


        </div>

  </section>




<?php require APPROOT.'/views/inc/footer.php'; ?>
