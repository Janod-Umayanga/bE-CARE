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


<sectionc class="sMed">

      <div class="cMed">

              <h1>Account details</h1>
              <form action="includes/updateProfileM.inc.php" method="post">
                <div>
                      <label>First name</label>
                      <input type="text" id="first_name" name="first_name" required="true" value="<?php echo $row["first_name"] ?>">

                      <label>Last name</label>
                      <input type="text" id="last_name" name="last_name" required="true" value="<?php echo $row["last_name"] ?>">

                      <label>NIC</label>
                      <input type="text" id="nic" name="nic" required="true" value="<?php echo $row["nic"] ?>">

                      <label>Contact number</label>
                      <input type="text" id="contact_number" name="contact_number" required="true" value="<?php echo $row["contact_number"] ?>">

                      <label>Gender</label>
                      <select name="gender" id="gender" required="true" value="<?php echo $row["gender"] ?>">
                         <option value="Male">Male</option>
                         <option value="Female">Female</option>
                      </select>

                      <label>Email</label>
                      <input type="email" name="email" id="email" required="true" value="<?php echo $row["email"] ?>" disabled>


                  </div>
                  <div>
                        <label>City</label>
                        <input type="text" name="city" required="true"  value="<?php echo $row["city"] ?>">

                        <label>Address</label>
                        <input type="text" name="address" id="address" required="true" value="<?php echo $row["address"] ?>">

                        <label>Registration Fee (Rs.)</label>
                        <input type="number" name="fee" id="fee" required="true" value="<?php echo $row["fee"] ?>">

                        <label>Bank Name</label>
                        <input type="text" name="bank_name" id="bank_name"  required="true" value="<?php echo $row["bank_name"] ?>">

                        <label>Account holder Name</label>
                        <input type="text" name="account_holder_name" id="account_holder_name" required="true" value="<?php echo $row["account_holder_name"] ?>">

                        <label>Branch</label>
                        <input type="text" name="branch" id="branch" required="true" value="<?php echo $row["branch"] ?>">

                  </div>

                  <div>
                         <label>Account Number</label>
                         <input type="text" name="account_number" id="account_number" required="true" value="<?php echo $row["account_number"] ?>">

                         <button id="cMedCP"> <a href="MprofileChangePW.php">Change Password</a></button>
                          <br>

                         <button type="submit" name="submit" id="cMedS" value="<?php echo $_SESSION["userMid"] ?>">Update</button>

                  </div>



              </form>

              <?php
                  if(isset($_GET["error"])){
                    if($_GET["error"]=="errorUpdating"){
                       echo "<p class='error'>Error Updating !</p>";
                    }

                  }
               ?>


      </div>

  </section>




<?php
 include_once "Mfooter.php";
?>
