<?php
 include_once "sessionfile.php";
?>

<?php
 include_once "header.php";
?>

<sectionc class="sAdmin">

      <div class="cAdmin">

              <h1>Add New Patient</h1>
              <form action="includes/addnewpatient.inc.php" method="post">
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
                      <!-- <label>Gender</label>
                      <input type="text" name="gender" id="gender" required="true" > -->

                      <label>Email</label>
                      <input type="email" name="email" id="email" required="true" >

                      <label>Password</label>
                      <input type="password" name="password" id="password" required="true">

                      <label>Confirm Password</label>
                      <input type="password" name="passwordRepeat" id="passwordRepeat"  required="true" >

                      <label>Gender</label>
                      <select name="gender" id="gender" required="true" >
                         <option value="Male">Male</option>
                         <option value="Female">Female</option>
                      </select>

                      <button type="submit" name="submit">Add</button>

                  </div>


              </form>


                  <?php
                      if(isset($_GET["error"])){
                        if($_GET["error"]=="invalidemail"){
                           echo "<p class='error'>Choose a proper email!</p>";
                        }
                        else if($_GET["error"]=="passwordsdontmatch"){
                           echo "<p class='error'>Password doesn't match!</p>";
                        }
                        else if($_GET["error"]=="stmtfailed"){
                           echo "<p class='error'>Something went wrong!</p>";
                        }
                        else if($_GET["error"]=="emailtaken"){
                           echo "<p class='error'>Email already taken!</p>";
                        }
                        else if($_GET["error"]=="none"){
                           echo "<p class='success'>You have signed up!</p>";
                        }
                      }
                   ?>


      </div>

  </section>




<?php
 include_once "footer.php";
?>
