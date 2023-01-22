<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>
<?php $user=$data['user']?>     

<sectionc class="sAdminProfile">

      <div class="cAdminProfile">

              <h1>Account details</h1>
              <form action="<?php echo URLROOT;?>/Admin/editProfile/<?php echo $_SESSION['admin_id'];?>" method="post">
                  <div>
                      <label>First name</label>
                      <input type="text" id="first_name" name="first_name" required="true" value="<?php echo $user->first_name; ?>">

                      <label>Last name</label>
                      <input type="text" id="last_name" name="last_name" required="true" value="<?php echo $user->last_name; ?>">

                      <label>NIC</label>
                      <input type="text" id="nic" name="nic" required="true" value="<?php echo $user->nic; ?>">

                      <label>Contact number</label>
                      <input type="text" id="contact_number" name="contact_number" required="true" value="<?php echo $user->contact_number; ?>">

                      <label>Email</label>
                      <input type="email" name="email" id="email" required="true" disabled="true" value="<?php echo $user->email; ?>">


                  </div>
                  <div>
                        <label>Bank Name</label>
                        <input type="text" name="bank_name" id="bank_name"  required="true" value="<?php echo $user->bank_name; ?>">

                        <label>Account holder Name</label>
                        <input type="text" name="account_holder_name" id="account_holder_name" required="true" value="<?php echo $user->account_holder_name; ?>">

                        <label>Branch</label>
                        <input type="text" name="branch" id="branch" required="true" value="<?php echo $user->branch; ?>">

                        <label>Account Number</label>
                        <input type="text" name="account_number" id="account_number" required="true" value="<?php echo $user->account_number; ?>">

                        <label>Gender</label>
                        <select name="gender" id="gender" required="true" value="<?php echo $user->gender; ?>" >
                           <option value="Male">Male</option>
                           <option value="Female">Female</option>
                        </select>

                  </div>

                  <div>

                        <button id="cAdminCP"> <a href="<?php echo URLROOT?>/Admin/changePW/">Change Password</a></button>
                         <br>

                         <button type="submit" id="cAdminU" name="submit" >Update</button>

                  </div>



              </form>

              

      </div>

  </section>


  <?php require APPROOT.'/views/inc/footer.php'; ?>