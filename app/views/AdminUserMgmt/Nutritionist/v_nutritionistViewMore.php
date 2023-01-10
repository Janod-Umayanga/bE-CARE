<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>
<?php $nutritionist=$data['nutritionist']  ?>


<sectionc class="sViewMAMD">

      <div class="cViewMAMD">

              <h1>Nutritionist Details</h1>

      <div class="cViewMAMDAA">


              <form >
                  <div>
                      <label>First name</label>
                      <input type="text" id="first_name" name="first_name" disabled="true" value="<?php echo $nutritionist->first_name ?>">

                      <label>Last name</label>
                      <input type="text" id="last_name" name="last_name" disabled="true" value="<?php echo $nutritionist->last_name?>">

                      <label>NIC</label>
                      <input type="text" id="nic" name="nic" disabled="true" value="<?php echo $nutritionist->nic?>">

                      <label>Contact number</label>
                      <input type="text" id="contact_number" name="contact_number" disabled="true" value="<?php echo $nutritionist->contact_number?>" >

                      <label>Email</label>
                      <input type="email" name="email" id="email" disabled="true" value="<?php echo $nutritionist->email?>">

                      <label>Gender</label>
                      <input type="text" name="gender" id="gender" disabled="true" value="<?php echo $nutritionist->gender?>">

                    <label>Bank Name</label>
                    <input type="text" name="bank_name" id="bank_name"  disabled="true" value="<?php echo $nutritionist->bank_name?>">

                    <label>Account holder Name</label>
                    <input type="text" name="account_holder_name" id="account_holder_name" disabled="true" value="<?php echo $nutritionist->account_holder_name?>">

                    <label>Branch</label>
                    <input type="text" name="branch" id="branch" disabled="true" value="<?php echo $nutritionist->branch?>" >

                    <label>Account Number</label>
                    <input type="text" name="account_number" id="account_number" disabled="true" value="<?php echo $nutritionist->account_number?>">


                    <label>SLMC registration Number</label>
                    <input type="text" name="slmc" id="slmc"  disabled="true" value="<?php echo $nutritionist->slmc_reg_number?>" >



                    <label>Qualification File</label>
                    <button class="buttonamDownload button1amDownload"><a download="<?php echo $nutritionist->qualification_file ?>"  href="<?php echo URLROOT?>/upload/nutritionist_qualification/<?php echo $nutritionist->qualification_file ?>">Download</a></button>

                    <label>Registered Date</label>
                    <input type="text" name="registered_date" id="registered_date" disabled="true" value="<?php echo $nutritionist->registered_date?>">

                    <label>Fee</label>
                    <input type="text" name="fee" id="fee"  disabled="true" value="<?php echo $nutritionist->fee?>">



                    <button id="cBigButton" onclick="location.href='<?php echo URLROOT;?>/AdminUserMgmt/Nutritionist'" type="button">Go back</button>


                  </div>




              </form>

      </div>


      </div>

  </section>



<?php require APPROOT.'/views/inc/footer.php'; ?>
