<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>
<?php $doctor=$data['doctor']  ?>


<sectionc class="sViewMAMD">

      <div class="cViewMAMD">

              <h1>Doctor Details</h1>

      <div class="cViewMAMDAA">


              <form >
                  <div>
                      <label>First name</label>
                      <input type="text" id="first_name" name="first_name" disabled="true" value="<?php echo $doctor->first_name ?>">

                      <label>Last name</label>
                      <input type="text" id="last_name" name="last_name" disabled="true" value="<?php echo $doctor->last_name ?>">

                      <label>NIC</label>
                      <input type="text" id="nic" name="nic" disabled="true" value="<?php echo $doctor->nic ?>">

                      <label>Contact number</label>
                      <input type="text" id="contact_number" name="contact_number" disabled="true" value="<?php echo $doctor->contact_number ?>" >

                      <label>Email</label>
                      <input type="email" name="email" id="email" disabled="true" value="<?php echo $doctor->email ?>">

                      <label>Gender</label>
                      <input type="text" name="gender" id="gender" disabled="true" value="<?php echo $doctor->gender ?>">

                    <label>City</label>
                    <input type="text" name="city" disabled="true" value="<?php echo $doctor->city ?>"  >

                    <label>Bank Name</label>
                    <input type="text" name="bank_name" id="bank_name"  disabled="true" value="<?php echo $doctor->bank_name ?>">

                    <label>Account holder Name</label>
                    <input type="text" name="account_holder_name" id="account_holder_name" disabled="true" value="<?php echo $doctor->account_holder_name ?>">

                    <label>Branch</label>
                    <input type="text" name="branch" id="branch" disabled="true" value="<?php echo $doctor->branch ?>" >

                    <label>Account Number</label>
                    <input type="text" name="account_number" id="account_number" disabled="true" value="<?php echo $doctor->account_number ?>">


                    <label>SLMC registration Number</label>
                    <input type="text" name="slmc" id="slmc"  disabled="true" value="<?php echo $doctor->slmc_reg_number ?>" >



                    <label>Qualification File</label>
                    <button class="buttonamDownload button1amDownload"><a download="<?php echo $doctor->qualification_file ?>"  href="<?php echo URLROOT?>/upload/doctor_qualification/<?php echo $doctor->qualification_file ?>">Download</a></button>


                    <label>Type</label>
                    <input type="text" name="type" id="type"  disabled="true" value="<?php echo $doctor->type ?>">

                    <label>Specialization</label>
                    <input type="text" name="specialization" id="specialization"  disabled="true" value="<?php echo $doctor->specialization ?>">
            
                    <label>registration Date</label>
                    <input type="text" name="registered_date" id="registered_date"  disabled="true" value="<?php echo $doctor->registered_date ?>">


                    <button id="cBigButton" onclick="location.href='<?php echo URLROOT;?>/AdminUserMgmt/Doctor'" type="button">Go back</button>
                    
                  </div>




              </form>

      </div>


      </div>

  </section>


<?php require APPROOT.'/views/inc/footer.php'; ?>
