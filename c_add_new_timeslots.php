<?php include("include/home_header.php") ?>


    <div class="mid">
         
        <div class="center_wrapper_mid">

            <div class="left2">
                
            </div>
            <div class="center">
                <form action="include/c_add_new_timeslot.inc.php" class="form_doctor_add_time" method = "post">
                    <div class = "input_2">

                        <div class="title">Add new time slots</div>

                        <label for="counsellor_id">counsellor Id</label> <br> 
                        <input type="text" required = "true" name = "counsellor_id"><br><br>

                        <label for="">Day</label> <br> 
                        <select required = "true">
                            <option value="" name = "channeling_day" required = "true" class = "day">Sunday</option>
                            <option value="" name = "channeling_day" required = "true" class = "day">Monday</option>
                            <option value="" name = "channeling_day" required = "true" class = "day">Tuesday</option>
                            <option value="" name = "channeling_day" required = "true" class = "day">Wednessday</option>
                            <option value="" name = "channeling_day" required = "true" class = "day">Thursday</option>
                            <option value="" name = "channeling_day" required = "true" class = "day">Friday</option>
                            <option value="" name = "channeling_day" required = "true" class = "day">Satarday</option>
                        </select> <br><br>

                        <label for="">Start time</label> <br> <input type="time" required = "true" name = "start_time"> <br><br>

                        <label for="">End time</label> <br> <input type="time" required = "true" name = "end_time"> <br><br>

                        <label for="">Address</label> <br> <input type="text" required = "true" name = "address"> <br><br>

                        <label for="">Channeling fee(Rs)</label> <br> <input type="text" required = "true" name = "channeling_fee"> <br><br>
                       
                        <button type="submit" id="Signup_btn2" name = "add">Add</button>
                      
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