<?php
 include_once "header.php";
?>
<sectionc class="signup">

      <div class="content">

              <h1>Login as a Admin</h1>

              <form action="includes/login.inc.php" method="post">
                  <div>

                      <label>Email</label>
                      <input type="text" id="email" required="true" name="email" placeholder="Email..">

                      <label>Password</label>
                      <input type="password" id="password" required="true" name="password" placeholder="password..">

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
 include_once "footer.php";
?>
