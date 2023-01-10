<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>


<sectionc class="sAdmin">

      <div class="cAdmin">

              <h1>Add New Patient</h1>
              <form action="<?php echo URLROOT;?>/AdminUserMgmt/addnewPatient" method="post">
                  <div>
                      <label>First name</label>
                      <input type="text" id="first_name" name="first_name" required="true" >

                      <label>Last name</label>
                      <input type="text" id="last_name" name="last_name" required="true" >

                      <label>NIC</label>
                      <input type="text" id="nic" name="nic" required="true" >

                      <label>Contact number</label>
                      <input type="text" id="contact_number" name="contact_number" required="true" >


                  </div>
                  <div>
                      <label>Email</label>
                      <input type="email" name="email" id="email" required="true" >

                      <label>Password</label>
                      <input type="password" name="password" id="password" required="true">

                      <label>Confirm Password</label>
                      <input type="password" name="confirm_password" id="confirm_password"  required="true" >

                      <label>Gender</label>
                      <select name="gender" id="gender" required="true" >
                         <option value="Male">Male</option>
                         <option value="Female">Female</option>
                      </select>

                      <button type="submit" name="submit">Add</button>

                  </div>


              </form>
     </div>

  </section>


<?php require APPROOT.'/views/inc/footer.php'; ?>
