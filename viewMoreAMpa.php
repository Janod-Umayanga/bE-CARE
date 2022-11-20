<?php
 include_once "sessionfile.php";
?>

<?php
 include_once "header.php";
?>

<?php
  if(isset($_POST["submit"])){
    require_once "includes/dbh.inc.php";
    $patid=$_POST["submit"];
    $result = mysqli_query($conn,"SELECT * FROM patient WHERE patient_id=$patid");
    $row = mysqli_fetch_array($result);
  }
 ?>


<sectionc class="sViewMAMD">

      <div class="cViewMAMD">

              <h1>Patient Details</h1>

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


                    <label>Registered Date</label>
                    <input type="text" name="registered_date" id="registered_date"  disabled="true" value="<?php echo $row["registered_date"] ?>">


                      <button id="cBigButton" onclick="location.href='amPatient.php'" type="button">Go back</button>



                  </div>




              </form>

      </div>


      </div>

  </section>




<?php
 include_once "footer.php";
?>
