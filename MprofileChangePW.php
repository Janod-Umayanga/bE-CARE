<?php
 include_once "Msessionfile.php";
?>
<?php
 include_once "Mheader.php";
?>


<?php
 require_once "./includes/dbh.inc.php";
 require_once "./includes/Mfunctions.inc.php";

 $uid=$_SESSION["userMid"];
 $result = mysqli_query($conn,"SELECT * FROM meditation_instructor WHERE meditation_instructor_id=$uid");
 $row = mysqli_fetch_array($result)
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
 include_once "Mfooter.php";
?>
