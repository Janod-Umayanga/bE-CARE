<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>


<sectionc class="sMProfileCPW">

      <div class="cMProfileCPW">

              <h1>Change Password</h1>
              <form action="<?php echo URLROOT;?>/Admin/updatePW/<?php echo $_SESSION['admin_id'];?>" method="post">

                  <div>

                         <label>Current Password</label>
                         <input type="password" name="current_password" id="password" required="true" >
                         <span class="form-invalid"><?php echo $data['current_password_err'] ?></span>


                         <label>New Password</label>
                         <input type="password" name="new_password" id="password" required="true" >
                         <span class="form-invalid"><?php echo $data['new_password_err'] ?></span>


                         <label>Re-Type New Password</label>
                         <input type="password" name="retype_new_password" id="passwordRepeat"  required="true">
                         <span class="form-invalid"><?php echo $data['retype_new_password_err'] ?></span>


                         <button type="submit" id=" id="cMedS"" name="submit" >Update</button>
                        

                  </div>


              </form>
             
      </div>

  </section>



  <?php require APPROOT.'/views/inc/footer.php'; ?>


