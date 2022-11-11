<?php
 include_once "header.php";
?>

<sectionc class="signupAdmin">

      <div class="contentAdmin">

              <h1>Add New Admin</h1>
              <form action="includes/addnewadmin.inc.php" method="post">
                  <div>
                      <label>First name</label>
                      <input type="text" id="first_name" name="first_name" required="true" >

                      <label>Last name</label>
                      <input type="text" id="last_name" name="last_name" required="true" >

                      <label>NIC</label>
                      <input type="text" id="nic" name="nic" required="true" >

                      <label>Contact number</label>
                      <input type="text" id="contact_number" name="contact_number" required="true" >


                  </div>
                  <div>
                      <label>Gender</label>
                      <input type="text" name="gender" id="gender" required="true" >

                      <label>Email</label>
                      <input type="email" name="email" id="email" required="true" >

                      <label>Password</label>
                      <input type="password" name="password" id="password" required="true">

                      <label>Confirm Password</label>
                      <input type="password" name="passwordRepeat" id="passwordRepeat"  required="true" >

                  </div>

                  <div>
                      <label>Bank Name</label>
                      <input type="text" name="bank_name" id="bank_name"  required="true" >

                      <label>Account holder Name</label>
                      <input type="text" name="account_holder_name" id="account_holder_name" required="true" >

                      <label>Branch</label>
                      <input type="text" name="branch" id="branch" required="true" >

                      <label>Account Number</label>
                      <input type="text" name="account_number" id="account_number" required="true" >


                      <button type="submit" name="submit">Add</button>
                  </div>




              </form>


                  <?php
                      if(isset($_GET["error"])){
                        if($_GET["error"]=="invalidemail"){
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
