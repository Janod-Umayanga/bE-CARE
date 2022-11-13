<?php
 include_once "sessionfile.php";
?>
<?php
 include_once "header.php";
?>


<sectionc class="sMProfileCPW">

      <div class="cMProfileCPW">

              <h1>Change Password</h1>
              <form >

                  <div>

                         <label>Current Password</label>
                         <input type="password" name="password" id="password" required="true" >

                         <label>New Password</label>
                         <input type="password" name="password" id="password" required="true" >

                         <label>Re-Type New Password</label>
                         <input type="password" name="passwordRepeat" id="passwordRepeat"  required="true">

                         <button type="submit" id=" id="cMedS"" name="submit">Update</button>

                  </div>



              </form>


      </div>

  </section>




<?php
 include_once "footer.php";
?>
