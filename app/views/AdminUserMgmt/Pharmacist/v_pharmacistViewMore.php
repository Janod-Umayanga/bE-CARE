<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>
<?php $pharmacist=$data['pharmacist']  ?>

<sectionc class="sViewMAMD">

      <div class="cViewMAMD">

              <h1>Pharmacy Details</h1>

      <div class="cViewMAMDAA">


              <form >
                  <div>
                      <label>First name</label>
                      <input type="text" id="first_name" name="first_name" disabled="true" value="<?php echo $pharmacist->first_name ?>">

                      <label>Last name</label>
                      <input type="text" id="last_name" name="last_name" disabled="true" value="<?php echo $pharmacist->last_name ?>">

                      <label>NIC</label>
                      <input type="text" id="nic" name="nic" disabled="true" value="<?php echo  $pharmacist->nic ?>">

                      <label>Contact number</label>
                      <input type="text" id="contact_number" name="contact_number" disabled="true" value="<?php echo $pharmacist->contact_number ?>" >

                      <label>Email</label>
                      <input type="email" name="email" id="email" disabled="true" value="<?php echo $pharmacist->email ?>">

                      <label>Gender</label>
                      <input type="text" name="gender" id="gender" disabled="true" value="<?php echo $pharmacist->gender  ?>">

                    <label>City</label>
                    <input type="text" name="city" disabled="true" value="<?php echo  $pharmacist->city ?>"  >

                    <label>Address</label>
                    <input type="text" name="address" disabled="true" value="<?php echo $pharmacist->address ?>"  >

                    <label>Bank Name</label>
                    <input type="text" name="bank_name" id="bank_name"  disabled="true" value="<?php echo $pharmacist->bank_name ?>">

                    <label>Account holder Name</label>
                    <input type="text" name="account_holder_name" id="account_holder_name" disabled="true" value="<?php echo  $pharmacist->account_holder_name ?>">

                    <label>Branch</label>
                    <input type="text" name="branch" id="branch" disabled="true" value="<?php echo $pharmacist->branch ?>" >

                    <label>Account Number</label>
                    <input type="text" name="account_number" id="account_number" disabled="true" value="<?php echo$pharmacist->account_number ?>">


                    <label>SLMC registration Number</label>
                    <input type="text" name="slmc_reg_number" id="slmc_reg_number"  disabled="true" value="<?php echo $pharmacist->slmc_reg_number ?>" >


                    <label>Qualification File</label>
                    <button class="buttonamDownload button1amDownload"><a download="<?php echo $pharmacist->qualification_file ?>"  href="<?php echo URLROOT?>/upload/pharmacist_qualification/<?php echo $pharmacist->qualification_file ?>">Download</a></button>


                    <label>Pharmacy Name</label>
                    <input type="text" name="pharmacy_name" id="pharmacy_name"  disabled="true" value="<?php echo $pharmacist->pharmacy_name ?>">

                    <label>registration Date</label>
                    <input type="text" name="registered_date" id="registered_date"  disabled="true" value="<?php echo $pharmacist->registered_date?>">


                    <button id="cBigButton" onclick="location.href='<?php echo URLROOT;?>/AdminUserMgmt/Pharmacist'" type="button">Go back</button>


                  </div>




              </form>

      </div>


      </div>

  </section>

<?php require APPROOT.'/views/inc/footer.php'; ?>
