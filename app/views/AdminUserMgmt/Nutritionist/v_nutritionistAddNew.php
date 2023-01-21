<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>


<sectionc class="sMed">

      <div class="cMed">

              <h1>Add New Nutritionist</h1>
              <form action="<?php echo URLROOT;?>/AdminUserMgmt/addnewNutritionist" method="post" enctype="multipart/form-data">
                  <div>
                      <label>First name</label>
                      <input type="text" id="first_name" name="first_name" required="true" >

                      <label>Last name</label>
                      <input type="text" id="last_name" name="last_name" required="true" >

                      <label>NIC</label>
                      <input type="text" id="nic" name="nic" required="true" >

                      <label>Contact number</label>
                      <input type="text" id="contact_number" name="contact_number" required="true" >

                      <label>Email</label>
                      <input type="email" name="email" id="email" required="true" >

                      <label>Gender</label>
                      <select name="gender" id="gender" required="true" >
                         <option value="Male">Male</option>
                         <option value="Female">Female</option>
                      </select>
                  </div>
                  <div>
                    <label>Bank Name</label>
                    <input type="text" name="bank_name" id="bank_name"  required="true" >

                    <label>Account holder Name</label>
                    <input type="text" name="account_holder_name" id="account_holder_name" required="true" >

                    <label>Branch</label>
                    <input type="text" name="branch" id="branch" required="true" >

                    <label>Account Number</label>
                    <input type="text" name="account_number" id="account_number" required="true" >

                    <label>Qualification File</label>
                    <input type="file" name="qualification_file" id="qualification_file"  required="true" >

                    <label>Fee</label>
                    <input type="text" name="fee" id="fee"  required="true" >

                  </div>

                  <div>




                    <label>Password</label>
                    <input type="password" name="password" id="password" required="true" >

                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password"  required="true" >


                    <label>SLMC registration Number</label>
                    <input type="text" name="slmc" id="slmc"  required="true" >

                      <button id="cMedButton" type="submit" name="submit">Add</button>
                  </div>

              </form>

      </div>

  </section>


<?php require APPROOT.'/views/inc/footer.php'; ?>
