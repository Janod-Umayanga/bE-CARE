<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>

?>

<sectionc class="sViewMAMD">

      <div class="cViewMAMD">

              <h1>Registered User Details</h1>

      <div class="cViewMAMDAA">


              <form >
                  <div>


                      <label>Date</label>
                      <input type="text"  disabled="true" value="<?php echo $data['medChannel']->date ?>">

                      <label>Starting Time</label>
                      <input type="text"  disabled="true" value="<?php echo $data['medChannel']->starting_time ?>">

                      <label>Ending Time</label>
                      <input type="text"  disabled="true" value="<?php echo $data['medChannel']->ending_time ?>">

                      <label>Day</label>
                      <input type="text"  disabled="true" value="<?php echo $data['medChannel']->appointment_day ?>" >

                      <label>Name</label>
                      <input type="text"  disabled="true" value="<?php echo $data['medChannel']->name ?>">



                       <label>Age</label>
                       <input type="text"  disabled="true" value="<?php echo $data['medChannel']->age ?>">

                       <label>Contact Number</label>
                       <input type="text"  disabled="true" value="<?php echo $data['medChannel']->contact_number ?>">

                       <label>Gender</label>
                       <input type="text"  disabled="true" value="<?php echo $data['medChannel']->gender ?>">

                       <label>Registered Date</label>
                       <input type="text"  disabled="true" value="<?php echo $data['medChannel']->reg_date ?>" >

                       <label>Fee</label>
                       <input type="text"  disabled="true" value="<?php echo $data['medChannel']->fee ?>">

                       <label>Address</label>
                       <input type="text"  disabled="true" value="<?php echo $data['medChannel']->address ?>" >



                    <button id="cBigButton" onclick="location.href='<?php echo URLROOT;?>/MedInstrRegisteredUsersHistory/medInstrRegisteredUsersHistory'" type="button">Go back</button>


                  </div>
              </form>

      </div>


      </div>

  </section>




  <?php require APPROOT.'/views/inc/footer.php'; ?>

