<?php include("include/signup_header.php") ?>


    <div class="mid">
        <div class="title">Login</div> 
        <div class="center_wrapper_mid">
            <div class="left2">
                
            </div>
            <div class="center">
                <form action="login.php" class="form" method = "post">
                    <div class = "input_main">

                        <label for="user_type">User type</label> <br>

                        <select name="user_type" id="user_type">
                            <option value="patient">Patient</option>
                            <option value="Doctor">Doctor</option>
                            <option value="counsellor">Consellor</option>
                            <option value="nutritionist">Nutritionist</option>
                            <option value="meditation_instructor">meditation_instructor</option>
                            <option value="admin">Admin</option>
                        </select> <br><br>
                       
                        <button type="submit" id="Signup_btn2">Submit</button>
                     
                        
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