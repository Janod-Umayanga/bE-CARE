<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>
<?php $admin=$data['admin']  ?>


<sectionc class="sViewMAMD">

      <div class="cViewMAMD">

              <h1>Admin Details</h1>

      <div class="cViewMAMDAA">


              <form >
                  <div>
                      <label>First name</label>
                      <input type="text" id="first_name" name="first_name" disabled="true" value="<?php echo $admin->first_name ?>">

                      <label>Last name</label>
                      <input type="text" id="last_name" name="last_name" disabled="true" value="<?php echo $admin->last_name ?>">

                      <label>NIC</label>
                      <input type="text" id="nic" name="nic" disabled="true" value="<?php echo $admin->nic ?>">

                      <label>Contact number</label>
                      <input type="text" id="contact_number" name="contact_number" disabled="true" value="<?php echo $admin->contact_number ?>" >

                      <label>Email</label>
                      <input type="email" name="email" id="email" disabled="true" value="<?php echo $admin->email ?>">

                      <label>Gender</label>
                      <input type="text" name="gender" id="gender" disabled="true" value="<?php echo $admin->gender ?>">

                    <label>Bank Name</label>
                    <input type="text" name="bank_name" id="bank_name"  disabled="true" value="<?php echo $admin->bank_name ?>">

                    <label>Account holder Name</label>
                    <input type="text" name="account_holder_name" id="account_holder_name" disabled="true" value="<?php echo $admin->account_holder_name ?>">

                    <label>Branch</label>
                    <input type="text" name="branch" id="branch" disabled="true" value="<?php echo $admin->branch ?>" >

                    <label>Account Number</label>
                    <input type="text" name="account_number" id="account_number" disabled="true" value="<?php echo $admin->account_number ?>">


                    <label>registration Date</label>
                    <input type="text" name="registered_date" id="registered_date"  disabled="true" value="<?php echo $admin->registered_date ?>">


                    <button id="cBigButton" onclick="location.href='<?php echo URLROOT;?>/AdminUserMgmt/admin'" type="button">Go back</button>
                    
                  </div>




              </form>

      </div>


      </div>

  </section>


<?php require APPROOT.'/views/inc/footer.php'; ?>
