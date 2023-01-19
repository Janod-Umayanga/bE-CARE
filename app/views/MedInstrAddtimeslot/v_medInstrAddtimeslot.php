<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>


<sectionc class="sViewMAMD">

      <div class="cViewMAMD">

              <h1>Add new timeslot</h1>

      <div class="cViewMAMDAA">


              <form  action="<?php echo URLROOT;?>/MedInstrAddtimeslot/medInstrAddtimeslot" method="post" >
                  <div>
                      <label>Month</label>
                      <input type="month"  name="month"  >
                      <span class="form-invalid"><?php echo $data['month_err'] ?></span>
                    
                      <label>Day</label>
                     <select name="day" id="day" >
                         <option value="Monday">Monday</option>
                         <option value="Tuesday">Tuesday</option>
                         <option value="Wednesday">Wednesday</option>
                         <option value="Thursday">Thursday</option>
                         <option value="Friday">Friday</option>
                         <option value="Saturday">Saturday</option>
                         <option value="Sunday">Sunday</option>

                      </select>


                      <label>Starting Time</label>
                      <input type="time"  name="starting_time"   >

                      <label>Ending time</label>
                      <input type="time" name="ending_time"   >

                      <label>Fee</label>
                      <input type="number" name="fee"   value="<?php echo $data["fee"]?>" >


                    <label>Address</label>
                    <input type="text" name="address"   value="<?php echo $data["address"]?>" >


                      <button id="cBigButton" type="submit" name="submit">Submit</button>



                  </div>




              </form>

      </div>


      </div>

  </section>


  <?php require APPROOT.'/views/inc/footer.php'; ?>
