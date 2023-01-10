<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>

<sectionc class="s">

      <div class="c">

              <h1>Login</h1>

              <form action="" method="post">
                  <div>
                      <label>User Type</label>
                      <select name="usertype" id="usertype" required="true" >
                        <option value="admin">Admin</option>
                        <option value="meditation_instructor">Meditation Instructor</option>
                     </select>

                      <label>Email</label>
                      <input type="text" name="email" id="email" required="true" value="<?php echo $data['email'] ?>">
                       <span class="form-invalid"><?php echo $data['email_err'] ?></span>


                      <label>Password</label>
                      <input type="password" name="password" id="password" required="true" value="<?php echo $data['password'] ?>">
                      <span class="form-invalid"><?php echo $data['password_err'] ?></span>


                      <button type="submit" name="submit">Log In</button>

                  </div>

                  <div >

                  </div>


              </form>
              <?php flash('reg_flash'); ?>

      </div>

  </section>




<?php require APPROOT.'/views/inc/footer.php'; ?>


