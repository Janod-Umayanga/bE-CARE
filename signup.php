<?php
 include_once "header.php";
?>

<sectionc class="signup">

      <div class="content">

              <h1>Signup as a Admin</h1>
              <form action="includes/signup.inc.php" method="post">
                  <div>
                      <label>First name</label>
                      <input type="text" id="first_name" name="first_name" required="true" placeholder="First Name..">

                      <label>Last name</label>
                      <input type="text" id="last_name" name="last_name" required="true" placeholder="Last Name..">

                      <label>NIC</label>
                      <input type="text" id="nic" name="nic" required="true" placeholder="Nic..">

                      <label>Contact number</label>
                      <input type="text" id="contact_number" name="contact_number" required="true" placeholder="Contact number..">


                  </div>
                  <div>
                      <label>Gender</label>
                      <input type="text" name="gender" id="gender" required="true" placeholder="Gender..">

                      <label>Email</label>
                      <input type="email" name="email" id="email" required="true" placeholder="email..">

                      <label>Password</label>
                      <input type="password" name="password" id="password" required="true" placeholder="password..">

                      <label>Confirm Password</label>
                      <input type="password" name="passwordRepeat" id="passwordRepeat"  required="true" placeholder="Repeat password..">


                      <button type="submit" name="submit">Sign Up</button>
                  </div>



              </form>


                  <?php
                      if(isset($_GET["error"])){
                        if($_GET["error"]=="emptyinput"){
                           echo "<p>Fill in all fields!</p>";
                        }
                        else if($_GET["error"]=="invalidemail"){
                           echo "<p>Choose a proper email!</p>";
                        }
                        else if($_GET["error"]=="passwordsdontmatch"){
                           echo "<p>Password doesn't match!</p>";
                        }
                        else if($_GET["error"]=="stmtfailed"){
                           echo "<p>Something went wrong!</p>";
                        }
                        else if($_GET["error"]=="usernametaken"){
                           echo "<p>Username already taken!</p>";
                        }
                        else if($_GET["error"]=="none"){
                           echo "<p>You have signed up!</p>";
                        }
                      }
                   ?>


      </div>

  </section>




<?php
 include_once "footer.php";
?>
