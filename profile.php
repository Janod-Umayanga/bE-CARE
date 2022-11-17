<?php
 include_once "sessionfile.php";
?>
<?php
 include_once "header.php";
?>

<?php
 require_once "./includes/dbh.inc.php";
 require_once "./includes/functions.inc.php";

 $uid=$_SESSION["userid"];
 $result = mysqli_query($conn,"SELECT * FROM admin WHERE admin_id=$uid");
 $row = mysqli_fetch_array($result)
 ?>


<sectionc class="sAdminProfile">

      <div class="cAdminProfile">

              <h1>Account details</h1>
              <form action="includes/updateProfileA.inc.php" method="post">
                  <div>
                      <label>First name</label>
                      <input type="text" id="first_name" name="first_name" required="true" value="<?php echo $row["first_name"] ?>">

                      <label>Last name</label>
                      <input type="text" id="last_name" name="last_name" required="true" value="<?php echo $row["last_name"] ?>">

                      <label>NIC</label>
                      <input type="text" id="nic" name="nic" required="true" value="<?php echo $row["nic"] ?>">

                      <label>Contact number</label>
                      <input type="text" id="contact_number" name="contact_number" required="true" value="<?php echo $row["contact_number"] ?>">

                      <label>Email</label>
                      <input type="email" name="email" id="email" required="true" disabled="true" value="<?php echo $row["email"] ?>">


                  </div>
                  <div>
                        <label>Bank Name</label>
                        <input type="text" name="bank_name" id="bank_name"  required="true" value="<?php echo $row["bank_name"] ?>">

                        <label>Account holder Name</label>
                        <input type="text" name="account_holder_name" id="account_holder_name" required="true" value="<?php echo $row["account_holder_name"] ?>">

                        <label>Branch</label>
                        <input type="text" name="branch" id="branch" required="true" value="<?php echo $row["branch"] ?>">

                        <label>Account Number</label>
                        <input type="text" name="account_number" id="account_number" required="true" value="<?php echo $row["account_number"] ?>">

                        <label>Gender</label>
                        <select name="gender" id="gender" required="true" value="<?php echo $row["gender"] ?>" >
                           <option value="Male">Male</option>
                           <option value="Female">Female</option>
                        </select>

                  </div>

                  <div>

                        <button id="cAdminCP"> <a href="profileChangePW.php">Change Password</a></button>
                         <br>

                         <button type="submit" id="cAdminU" name="submit" value="<?php echo $_SESSION["userid"] ?>">Update</button>

                  </div>



              </form>

              <?php
                  if(isset($_GET["error"])){
                    if($_GET["error"]=="errorUpdating"){
                       echo "<p class='error'>Error Updating !</p>";
                    }
                    // else if($_GET["error"]=="none"){
                    //    echo "<p class='success'>Successfullly Updated</p>";
                    // }

                  }
               ?>

      </div>

  </section>




<?php
 include_once "footer.php";
?>
