<?php
 include_once "Mheader.php";
?>

<sectionc class="signupMed">

      <div class="contentMed">

              <h1>Signup as a Meditation Instructor</h1>
              <form action="includes/Msignup.inc.php" method="post">
                  <div>
                      <label>First name</label>
                      <input type="text" id="first_name" name="first_name" required="true" >

                      <label>Last name</label>
                      <input type="text" id="last_name" name="last_name" required="true" >

                      <label>NIC</label>
                      <input type="text" id="nic" name="nic" required="true" >

                      <label>Contact number</label>
                      <input type="text" id="contact_number" name="contact_number" required="true" >

                      <label>Gender</label>
                      <input type="text" name="gender" id="gender" required="true" >

                      <label>Email</label>
                      <input type="email" name="email" id="email" required="true" >



                  </div>
                  <div>
                      <label>City</label>
                      <input type="text" name="city" required="true" >

                      <label>Address</label>
                      <input type="text" name="address" id="address" required="true" >

                      <label>Fee</label>
                      <input type="number" name="fee" id="fee" required="true" >

                      <label>Bank Name</label>
                      <input type="text" name="bank_name" id="bank_name"  required="true" >

                      <label>Account holder Name</label>
                      <input type="text" name="account_holder_name" id="account_holder_name" required="true" >

                      <label>Branch</label>
                      <input type="text" name="branch" id="branch" required="true" >

                  </div>

                  <div>
                    <label>Account Number</label>
                    <input type="text" name="account_number" id="account_number" required="true" >

                    <label>Qualification File</label>
                    <input type="file" name="qualification_file" id="qualification_file"  required="true" >


                    <label>Password</label>
                    <input type="password" name="password" id="password" required="true" >

                    <label>Confirm Password</label>
                    <input type="password" name="passwordRepeat" id="passwordRepeat"  required="true" >

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
 include_once "Mfooter.php";
?>
