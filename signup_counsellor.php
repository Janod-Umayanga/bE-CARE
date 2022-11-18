<?php include("include/signup_header.php") ?>

    <div class="mid">
        <div class="title">Signup as a Counsellor</div> 
        <div class="center_wrapper_mid">
            <div class="left2">
                
            </div>
            <div class="center">
                <form action="include/signup.inc.php" class="form" method = "post">
                  
                    <div class="form_left">
                        
                        <label for="">First name</label><br>
                        <input type="text" name="first_name" required = "true"><br><br>

                        <label for="">Last Name</label><br>
                        <input type="text" name="last_name" required = "true"><br><br>

                        <label for="">NIC</label><br>
                        <input type="text" name="nic" required = "true"><br><br>

                        <label for="">Email</label><br>
                        <input type="email" name="email" required = "true"><br><br>

                        <label for="">Bank account details <br> Account number</label><br>
                        <input type="text" name="account_number" required = "true"><br><br>

                        <label for="">Branch</label><br>
                        <input type="text" name="branch" required = "true"><br><br>

                        <label for="">Account holder name</label><br>
                        <input type="text" name="account_holder_name" required = "true"><br><br>

                        <label for="">Bank name</label><br>
                        <input type="text" name="bank_name" required = "true"><br><br>

                        <label for="">City</label><br>
                        <input type="text" name="city" required = "true"><br>
                    </div>
                    <div class = "form_right">
                        <label for="">Gender</label>
                        <select id="gender" class="select" name="gender">
                            <option value="male" required = "true">Male</option>
                            <option value="female" required = "true">Female</option>
                            <option value="other" required = "true">Other</option>
                        </select>
                        <br>
                        <br>

                        <label for="">Contact number</label><br>
                        <input type="text" name="contact_number" required = "true"><br><br>

                        <label for="">Date</label><br>
                        <input type="date" name="registered_date" required = "true"><br><br>

                        <label for="">Password</label><br>
                        <input type="password" name="password" required = "true"><br><br>

                        <label for="">Re-Type Password</label><br>
                        <input type="password" name="re_type_password" required = "true"><br><br>

                        <label for="">SLMC Registration Number</label><br>
                        <input type="text" name="slmc_reg_number" required = "true"><br><br>

                        <label for="">Qualification</label><br>
                        <input type="file" name="qualification_file" class = "file" required = "true"><br><br>

                       
                    
                        <button type="submit" id="Signup_btn2" name="submit" required = "true">Signup</button>
                        
                    </div>
                  
                </form>
                 
            </div>
            <div class="right2">
          </div>
        </div>
    </div>

  </div>
</div>

<?php include("include/signup_footer.php") ?>
    
    