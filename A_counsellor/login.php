 <?php include("include/header.php") ?>

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
                        <div class = "select">
                         <select required = "true">
                             <option value="counsellor">Counsellor</option>
                             <option value="doctor"  >Doctor</option>
                         </select> 
                         <br><br>
                        </div>
                        

                        <label for="">Email</label><br>
                        <input type="email" name="email" required = "true"><br><br>

                        <label for="">Password</label><br>
                        <input type="password" name="password" required = "true"><br><br>

                        <button type="submit" id="Signup_btn2" name="submit">Login</button>

                      </div>
                     
                    </form>
                
                </div>
                 
            </div>
        
     
        </div>
    </div>
<?php include("include/footer.php") ?>