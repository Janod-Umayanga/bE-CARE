<?php
 include_once "sessionfile.php";
?>

<?php
 include_once "header.php";
?>

<?php
  if(isset($_POST["submit"])){
    require_once "includes/dbh.inc.php";
    $miid=$_POST["submit"];
    $result = mysqli_query($conn,"SELECT * FROM requested_meditation_instructor WHERE requested_meditation_instructor_id=$miid");
    $row = mysqli_fetch_array($result);
  }
 ?>


<sectionc class="sViewMAMD">

      <div class="cViewMAMD">

              <h1>meditation Instructor Details</h1>

      <div class="cViewMAMDAA">


              <form >
                  <div>
                      <label>First name</label>
                      <input type="text" id="first_name" name="first_name" disabled="true" value="<?php echo $row["first_name"] ?>">

                      <label>Last name</label>
                      <input type="text" id="last_name" name="last_name" disabled="true" value="<?php echo $row["last_name"] ?>">

                      <label>NIC</label>
                      <input type="text" id="nic" name="nic" disabled="true" value="<?php echo $row["nic"] ?>">

                      <label>Contact number</label>
                      <input type="text" id="contact_number" name="contact_number" disabled="true" value="<?php echo $row["contact_number"] ?>" >

                      <label>Email</label>
                      <input type="email" name="email" id="email" disabled="true" value="<?php echo $row["email"] ?>">

                      <label>Gender</label>
                      <input type="text" name="gender" id="gender" disabled="true" value="<?php echo $row["gender"] ?>">

                    <label>City</label>
                    <input type="text" name="city" disabled="true" value="<?php echo $row["city"] ?>"  >

                    <label>Address</label>
                    <input type="text" name="address" disabled="true" value="<?php echo $row["address"] ?>"  >

                    <label>Fee</label>
                    <input type="text" name="fee" disabled="true" value="<?php echo $row["fee"] ?>"  >

                    <label>Bank Name</label>
                    <input type="text" name="bank_name" id="bank_name"  disabled="true" value="<?php echo $row["bank_name"] ?>">

                    <label>Account holder Name</label>
                    <input type="text" name="account_holder_name" id="account_holder_name" disabled="true" value="<?php echo $row["account_holder_name"] ?>">

                    <label>Branch</label>
                    <input type="text" name="branch" id="branch" disabled="true" value="<?php echo $row["branch"] ?>" >

                    <label>Account Number</label>
                    <input type="text" name="account_number" id="account_number" disabled="true" value="<?php echo $row["account_number"] ?>">

                    <label>Qualification File</label>
                    <button class="buttonamDownload button1amDownload"><a download="<?php echo $row['qualification_file'] ?>"  href="uploads/<?php echo $row['qualification_file'] ?>">Download</a></button>

                    <label>registered Date</label>
                    <input type="text" name="registered_date" id="registered_date" disabled="true" value="<?php echo $row["registered_date"] ?>" >

                    <button id="cBigButton" onclick="location.href='rsMeditationInstructor.php'" type="button">Go back</button>


                  </div>




              </form>

      </div>


      </div>

  </section>




<?php
 include_once "footer.php";
?>
