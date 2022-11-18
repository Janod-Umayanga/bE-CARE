<?php include("include/signup_header.php") ?>

  <div class="mid">
        <div class="title">Login</div> 
            <div class="center_wrapper_mid">
            
                <div class="center">
                    <form action="include/login.inc.php" class="form_login" method = "post">
                      <div class = "l_inputs">
                      
                        <!-- <label for="">User type</label><select id="user_type" class="select" name="gender">
                            <option value="male">Male</option>
                        </select> -->
                        
                        <label for="">User type</label><br>
                        <select>
                          <option value="doctor">Doctor</option>
                          <option value="counsellor">Counsellor</option>
                        </select> <br><br>

                        <label for="">Email</label><br>
                        <input type="text" name="email"><br><br>

                        <label for="">Password</label><br>
                        <input type="password" name="password"><br><br>

                        <button type="submit" id="Signup_btn2" name="submit">Submit</button>

                      </div>
                
                    </form>
                
                </div>
                 
            </div>
        
     
        </div>
    </div>
<?php include("include/signup_footer.php") ?>