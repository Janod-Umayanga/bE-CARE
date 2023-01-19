<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>

<sectionc class="sAdminProfile">

      <div class="cAdminProfile">

              <h1>Account details</h1>
              <form action="<?php echo URLROOT;?>/MedInstr/editProfile/<?php echo $_SESSION['MedInstr_id'];?>" method="post">
                   <input type="hidden" name="email" value="<?php echo $data['email'] ?>">
                   <div>
                      <label>First name</label>
                      <input type="text" id="first_name" name="first_name" required="true" value="<?php echo $data['first_name'] ?>">

                      <label>Last name</label>
                      <input type="text" id="last_name" name="last_name" required="true" value="<?php echo $data['last_name'] ?>">

                      <label>NIC</label>
                      <input type="text" id="nic" name="nic" required="true" value="<?php echo $data['nic'] ?>">

                      <label>Contact number</label>
                      <input type="text" id="contact_number" name="contact_number" required="true" value="<?php echo $data['contact_number'] ?>">

                      <label>Gender</label>
                        <select name="gender" id="gender" required="true" value="<?php echo $data['gender'] ?>" >
                           <option value="Male">Male</option>
                           <option value="Female">Female</option>
                        </select>

                      <label>Email</label>
                      <input type="email" name="emal" id="email" required="true" disabled="true" value="<?php echo $data['email'] ?>">


                  </div>
                  <div>
                        <label>City</label>
                        <input type="text" name="city" required="true"  value="<?php echo $data['city'] ?>">

                        <label>Address</label>
                        <input type="text" name="address" id="address" required="true" value="<?php echo $data['address'] ?>">

                        <label>Registration Fee (Rs.)</label>
                        <input type="number" name="fee" id="fee" required="true" value="<?php echo $data['fee'] ?>">

                        <label>Bank Name</label>
                        <input type="text" name="bank_name" id="bank_name"  required="true" value="<?php echo $data['bank_name'] ?>">

                        <label>Account holder Name</label>
                        <input type="text" name="account_holder_name" id="account_holder_name" required="true" value="<?php echo $data['account_holder_name'] ?>">

                        <label>Branch</label>
                        <input type="text" name="branch" id="branch" required="true" value="<?php echo $data['branch'] ?>">

                  </div>

                  <div>
                        <label>Account Number</label>
                        <input type="text" name="account_number" id="account_number" required="true" value="<?php echo $data['account_number'] ?>">

                        <button id="cAdminCP"> <a href="<?php echo URLROOT?>/MedInstr/changePW/">Change Password</a></button>
                         <br>

                         <button type="submit" id="cAdminU" name="submit" >Update</button>

                  </div>


              </form>

              

      </div>

  </section>


  <?php require APPROOT.'/views/inc/footer.php'; ?>