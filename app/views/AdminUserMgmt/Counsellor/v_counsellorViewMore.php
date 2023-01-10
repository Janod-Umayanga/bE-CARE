<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>
<?php $counsellor=$data['counsellor']  ?>



<sectionc class="sViewMAMD">

      <div class="cViewMAMD">

              <h1>Counsellor Details</h1>

      <div class="cViewMAMDAA">


              <form >
                  <div>
                      <label>First name</label>
                      <input type="text" id="first_name" name="first_name" disabled="true" value="<?php echo $counsellor->first_name ?>">

                      <label>Last name</label>
                      <input type="text" id="last_name" name="last_name" disabled="true" value="<?php echo $counsellor->last_name ?>">

                      <label>NIC</label>
                      <input type="text" id="nic" name="nic" disabled="true" value="<?php echo $counsellor->nic ?>">

                      <label>Contact number</label>
                      <input type="text" id="contact_number" name="contact_number" disabled="true" value="<?php echo $counsellor->contact_number ?>" >

                      <label>Email</label>
                      <input type="email" name="email" id="email" disabled="true" value="<?php echo $counsellor->email ?>">

                      <label>Gender</label>
                      <input type="text" name="gender" id="gender" disabled="true" value="<?php echo $counsellor->gender ?>">

                    <label>City</label>
                    <input type="text" name="city" disabled="true" value="<?php echo $counsellor->city ?>"  >

                    <label>Bank Name</label>
                    <input type="text" name="bank_name" id="bank_name"  disabled="true" value="<?php echo $counsellor->bank_name ?>">

                    <label>Account holder Name</label>
                    <input type="text" name="account_holder_name" id="account_holder_name" disabled="true" value="<?php echo $counsellor->account_holder_name ?>">

                    <label>Branch</label>
                    <input type="text" name="branch" id="branch" disabled="true" value="<?php echo $counsellor->branch ?>" >

                    <label>Account Number</label>
                    <input type="text" name="account_number" id="account_number" disabled="true" value="<?php echo $counsellor->account_number ?>">


                    <label>SLMC registration Number</label>
                    <input type="text" name="slmc" id="slmc"  disabled="true" value="<?php echo $counsellor->slmc_reg_number ?>" >



                    <label>Qualification File</label>
                    <button class="buttonamDownload button1amDownload"><a download="<?php echo $counsellor->qualification_file ?>"  href="<?php echo URLROOT?>/upload/counsellor_qualification/<?php echo $counsellor->qualification_file ?>">Download</a></button>


                    <label>Registered Date</label>
                    <input type="text" name="registered_date" id="registered_date"  disabled="true" value="<?php echo $counsellor->registered_date ?>">



                    <button id="cBigButton" onclick="location.href='<?php echo URLROOT;?>/AdminUserMgmt/Counsellor'" type="button">Go back</button>




                  </div>




              </form>

      </div>


      </div>

  </section>




<?php require APPROOT.'/views/inc/footer.php'; ?>
