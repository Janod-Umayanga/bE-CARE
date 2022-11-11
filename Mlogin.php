<?php
 include_once "Mheader.php";
?>
<sectionc class="signup">

      <div class="content">

              <h1>Login as a Meditation Instructor</h1>

              <form action="includes/Mlogin.inc.php" method="post">
                  <div>

                      <label>Email</label>
                      <input type="text"  required="true" name="email" >

                      <label>Password</label>
                      <input type="password"  required="true" name="password" >

                      <button type="submit" name="submit">Log In</button>

                  </div>

                  <div>

                  </div>


              </form>
              <?php
                  if(isset($_GET["error"])){
                    if($_GET["error"]=="emptyinput"){
                       echo "<p>Fill in all fields!</p>";
                    }
                    else if($_GET["error"]=="wronglogin"){
                       echo "<p>Incorrect login information!</p>";
                    }
                  }
               ?>
      </div>

  </section>


<?php
 include_once "Mfooter.php";
?>
