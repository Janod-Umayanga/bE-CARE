<?php include("include/header.php") ?>

<?php
 require_once 'include/database.inc.php';
 require_once 'include/functions.inc.php';

 $uid = $_SESSION["user_c_id"];

 $result = mysqli_query($conn,"SELECT * FROM counsellor WHERE counsellor_id = $uid");

 $row = mysqli_fetch_array($result);

 ?>


    <div class="mid">
        <div class="title">Profile details</div> 
        <div class="center_wrapper_mid">
            <div class="left2">
                
            </div>
            <div class="center">
                <form action="include/signup.inc.php" class="form" method = "post">
                  
                    <div class="form_left">
                        
                        <label for="">First name</label><br>
                        <input type="text" name="first_name" value = "<?php echo $row["first_name"]; ?>"><br><br>

                        <label for="">Last Name</label><br>
                        <input type="text" name="last_name" value = "<?php echo $row["last_name"]; ?>"><br><br>

                        <label for="">NIC</label><br>
                        <input type="text" name="nic" value = "<?php echo $row["nic"]; ?>"><br><br>

                        <label for="">Email</label><br>
                        <input type="text" name="email" value = "<?php echo $row["email"]; ?>"><br><br>

                        <label for="">Bank account details <br> Account number</label><br>
                        <input type="text" name="account_number" value = "<?php echo $row["account_number"]; ?>"><br><br>

                        <label for="">Branch</label><br>
                        <input type="text" name="branch" value = "<?php echo $row["branch"]; ?>"><br><br>

                        <label for="">Account holder name</label><br>
                        <input type="text" name="account_holder_name" value = "<?php echo $row["account_holder_name"]; ?>"><br><br>

                        <label for="">Bank name</label><br>
                        <input type="text" name="bank_name" value = "<?php echo $row["bank_name"]; ?>"><br><br>

                        <label for="">City</label><br>
                        <input type="text" name="city" value = "<?php echo $row["city"]; ?>"><br>
                    </div>
                    <div class = "form_right">
                        <label for="">Gender</label><br>
                        <input type="text" name="gender" value = "<?php echo $row["gender"]; ?>">
                        <br>
                        <br>

                        <label for="">Contact number</label><br>
                        <input type="text" name="contact_number" value = "<?php echo $row["contact_number"]; ?>"><br><br>

                        <label for="">Date</label><br>
                        <input type="date" name="registered_date" value = "<?php echo $row["registered_date"]; ?>"><br><br>

                        <label for="">SLMC Registration Number</label><br>
                        <input type="text" name="slmc_reg_number" value = "<?php echo $row["slmc_reg_number"]; ?>"><br><br>

                        <label for="">Qualification</label><br>
                        <input type="file" name="qualification_file" class = "file" value = "<?php echo $row["qualification_file"]; ?>"><br><br><br>

                        <form action='update.php'>
                            <button type="submit" id="Signup_btn2" name="submit">Update</button>
                        </form>
                        
                        
                    </div>
                  
                </form>
               
               
            </div>
            <div class="right2">
          </div>
        </div>
    </div>

  </div>
</div>

<?php include("include/footer.php") ?>
    
    