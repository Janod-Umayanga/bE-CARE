<?php

session_start();
if(isset($_SESSION['userid'])){
  header("location:indexAdmin.php");
}else if(isset($_SESSION['userMid'])){
  header("location:indexMeditationInstructor.php");
}

?>
<?php
 include_once "header.php";
?>
<sectionc class="s">

      <div class="c">

              <h1>Login</h1>

              <form action="includes/login.inc.php" method="post">
                  <div>
                      <label>User Type</label>
                      <select name="usertype" id="usertype" required="true" >
                        <option value="admin">Admin</option>
                        <option value="meditation_instructor">Meditation Instructor</option>
                     </select>

                      <label>Email</label>
                      <input type="text"  required="true" name="email" >

                      <label>Password</label>
                      <input type="password"  required="true" name="password" >

                      <button type="submit" name="submit">Log In</button>

                  </div>

                  <div >

                  </div>


              </form>
              <?php if(isset($_GET['error'])){?>
                <p class="error"><?php echo $_GET['error']; ?></p>
             <?php } ?>

      </div>

  </section>


<?php
 include_once "footer.php";
?>
