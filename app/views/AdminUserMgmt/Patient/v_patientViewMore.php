<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>
<?php $patient=$data['patient']  ?>


<sectionc class="sViewMAMD">

      <div class="cViewMAMD">

              <h1>Patient Details</h1>

      <div class="cViewMAMDAA">


              <form >
                  <div>
                      <label>First name</label>
                      <input type="text" id="first_name" name="first_name" disabled="true" value="<?php echo $patient->first_name ?>">

                      <label>Last name</label>
                      <input type="text" id="last_name" name="last_name" disabled="true" value="<?php echo $patient->last_name ?>">

                      <label>NIC</label>
                      <input type="text" id="nic" name="nic" disabled="true" value="<?php echo $patient->nic ?>">

                      <label>Contact number</label>
                      <input type="text" id="contact_number" name="contact_number" disabled="true" value="<?php echo $patient->contact_number ?>" >

                      <label>Email</label>
                      <input type="email" name="email" id="email" disabled="true" value="<?php echo $patient->email ?>">

                      <label>Gender</label>
                      <input type="text" name="gender" id="gender" disabled="true" value="<?php echo $patient->gender ?>">

                    <label>registration Date</label>
                    <input type="text" name="registered_date" id="registered_date"  disabled="true" value="<?php echo $patient->registered_date ?>">


                    <button id="cBigButton" onclick="location.href='<?php echo URLROOT;?>/AdminUserMgmt/patient'" type="button">Go back</button>
                    
                  </div>




              </form>

      </div>


      </div>

  </section>


<?php require APPROOT.'/views/inc/footer.php'; ?>
