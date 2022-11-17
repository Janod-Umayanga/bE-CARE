<?php
 include_once "sessionfile.php";
?>
<?php
 include_once "header.php";
?>


<sectionc class="sMProfileCPW">

      <div class="cMProfileCPW">

              <h1>Change Password</h1>
              <form action="includes/updateProfilePWA.inc.php" method="post">

                  <div>

                         <label>Current Password</label>
                         <input type="password" name="currentPW" id="password" required="true" >

                         <label>New Password</label>
                         <input type="password" name="password" id="password" required="true" >

                         <label>Re-Type New Password</label>
                         <input type="password" name="passwordRepeat" id="passwordRepeat"  required="true">

                         <button type="submit" id=" id="cMedS"" name="submit" value="<?php echo $_SESSION["userid"] ?>">Update</button>

                  </div>


              </form>
              <?php
                  if(isset($_GET["error"])){
                    if($_GET["error"]=="Incorrect current password"){
                       echo "<p class='errorPW'>Incorrect current password!</p>";
                    }
                    else if($_GET["error"]=="error Updating Password"){
                       echo "<p class='errorPW'>error Updating Password!</p>";
                    }
                    else if($_GET["error"]=="New password and Re-Type new password are not matching"){
                       echo "<p class='errorPW'>New password and Re-Type new password are not matching!</p>";
                    }
                    else if($_GET["error"]=="none"){
                       echo "<p class='successPW'>You have successfully changed password!</p>";
                    }
                  }
               ?>


      </div>

  </section>




<?php
 include_once "footer.php";
?>
