<?php include("include_d/signup_header.php") ?>

<?php
 require_once 'include/database.inc.php';
 require_once 'include/functions.inc.php';

 $uid = $_SESSION["user_d_id"];

 $result = mysqli_query($conn,"SELECT * FROM doctor WHERE doctor_id = $uid");

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
                        <input type="text" name="nic"><br><br>

                        <label for="">Email</label><br>
                        <input type="text" name="email"><br><br>

                        <label for="">Bank account details <br> Account number</label><br>
                        <input type="text" name="account_number"><br><br>

                        <label for="">Branch</label><br>
                        <input type="text" name="branch"><br><br>

                        <label for="">Account holder name</label><br>
                        <input type="text" name="account_holder_name"><br><br>

                        <label for="">Bank name</label><br>
                        <input type="text" name="bank_name"><br><br>

                        <label for="">City</label><br>
                        <input type="text" name="city"><br>
                    </div>
                    <div class = "form_right">
                        <label for="">Gender</label>
                        <select id="gender" class="select" name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                        <br>
                        <br>

                        <label for="">Contact number</label><br>
                        <input type="text" name="contact_number"><br><br>

                        <label for="">Date</label><br>
                        <input type="date" name="registered_date"><br><br>

                        <label for="">Password</label><br>
                        <input type="password" name="password"><br><br>

                        <label for="">Re-Type Password</label><br>
                        <input type="password" name="re_type_password"><br><br>

                        <label for="">Type</label><br>
                        <input type="text" name="type"><br><br>

                        <label for="">Specialization</label><br>
                        <input type="text" name="specialization"><br><br>

                        <label for="">SLMC Registration Number</label><br>
                        <input type="text" name="slmc_reg_number"><br><br>

                        <label for="">Qualification</label><br>
                        <input type="file" name="qualification_file" class = "file"><br><br>

                       
                    
                        <button type="submit" id="Signup_btn2" name="submit">Update</button>
                        
                    </div>
                  
                </form>
               
                   <?php

                        if(isset($_GET["error"])){
                              echo "<p>Fill the all fields</p>";
                        }
                    ?>
               
            </div>
            <div class="right2">
          </div>
        </div>
    </div>

  </div>
</div>

<?php include("include_d/footer.php") ?>
    
    