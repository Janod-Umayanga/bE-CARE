<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>
<?php $meditationInstructor=$data['meditationInstructor']  ?>



<sectionc class="sViewMAMD">

      <div class="cViewMAMD">

              <h1>Meditation Instructor Details</h1>

      <div class="cViewMAMDAA">


              <form >
                  <div>
                      <label>First name</label>
                      <input type="text" id="first_name" name="first_name" disabled="true" value="<?php echo $meditationInstructor->first_name ?>">

                      <label>Last name</label>
                      <input type="text" id="last_name" name="last_name" disabled="true" value="<?php echo $meditationInstructor->last_name ?>">

                      <label>NIC</label>
                      <input type="text" id="nic" name="nic" disabled="true" value="<?php echo $meditationInstructor->nic ?>">

                      <label>Contact number</label>
                      <input type="text" id="contact_number" name="contact_number" disabled="true" value="<?php echo $meditationInstructor->contact_number ?>" >

                      <label>Email</label>
                      <input type="email" name="email" id="email" disabled="true" value="<?php echo $meditationInstructor->email ?>">

                      <label>Gender</label>
                      <input type="text" name="gender" id="gender" disabled="true" value="<?php echo $meditationInstructor->gender ?>">

                    <label>City</label>
                    <input type="text" name="city" disabled="true" value="<?php echo $meditationInstructor->city ?>"  >

                    <label>Address</label>
                    <input type="text" name="address" disabled="true" value="<?php echo $meditationInstructor->address ?>"  >

                    <label>Fee</label>
                    <input type="text" name="fee" disabled="true" value="<?php echo $meditationInstructor->fee ?>"  >

                    <label>Bank Name</label>
                    <input type="text" name="bank_name" id="bank_name"  disabled="true" value="<?php echo $meditationInstructor->bank_name ?>">

                    <label>Account holder Name</label>
                    <input type="text" name="account_holder_name" id="account_holder_name" disabled="true" value="<?php echo $meditationInstructor->account_holder_name ?>">

                    <label>Branch</label>
                    <input type="text" name="branch" id="branch" disabled="true" value="<?php echo $meditationInstructor->branch ?>" >

                    <label>Account Number</label>
                    <input type="text" name="account_number" id="account_number" disabled="true" value="<?php echo $meditationInstructor->account_number ?>">

                    <label>Qualification File</label>
                    <button class="buttonamDownload button1amDownload"><a download="<?php echo $meditationInstructor->qualification_file ?>"  href="uploads/<?php echo $meditationInstructor->qualification_file ?>">Download</a></button>

                    <label>registered Date</label>
                    <input type="text" name="registered_date" id="registered_date" disabled="true" value="<?php echo $meditationInstructor->registered_date ?>" >

                    <button id="cBigButton" onclick="location.href='<?php echo URLROOT;?>/AdminReqSerProviders/adminReqMeditationInstructor'" type="button">Go back</button>


                
             
                  </div>




              </form>

      </div>


      </div>

  </section>




  <?php require APPROOT.'/views/inc/footer.php'; ?>
