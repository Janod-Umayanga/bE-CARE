<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c4a594ff55.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f1513ae29e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style2.css">
    <title>Document</title>
</head>
<body>
    <section class="diet-plan-section">
        <div class="diet-plan-leftside">
            <div class="diet-left-side-container">
                <a href="<?php echo URLROOT ?>/MedInstrDashboard/medInstrDashBoard" class="page-change-button-from-diet"><i class="fa-solid fa-arrow-left"></i>Back to Dashboard</a>
                <div>
                    <h1><i class="fa-solid fa-pills"></i> Be-Care</h1>
                    <h2>Fill these details to add new timeslot</h2>
                    <p>Click the "Submit" button to save your changes and add new timeslot.</p>
                </div>
            </div>
        </div>
        <div class="diet-plan-rightside">
            <form action="<?php echo URLROOT ?>/MedInstrAddtimeslot/medInstrAddtimeslot" method="POST">
                <div class="diet-form-inputs-and-buttons">
                    <div class="left">

                    
                        <label for="day">Day</label>
                                <select name="day" id="day" >
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>

                            </select>
                       <span class="form-invalid"><?php echo $data['day_err'] ?></span>

                        <label for="starting Time">Starting Time</label>
                        <input type="time" id="starting_time" name="starting_time" value="<?php echo $data['starting_time'] ?>">
                        <span class="form-invalid"><?php echo $data['starting_time_err'] ?></span>

                        <label for="Ending Time">Ending Time</label>
                        <input type="time" id="ending_time" name="ending_time" value="<?php echo $data['ending_time'] ?>">
                        <span class="form-invalid"><?php echo $data['ending_time_err'] ?></span>

                        <label for="fee">Fee (Rs.)</label>
                        <input type="number" id="fee" name="fee" value="<?php echo $data['fee'] ?>">
                        <span class="form-invalid"><?php echo $data['fee_err'] ?></span>

                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" value="<?php echo $data['address'] ?>">
                        <span class="form-invalid"><?php echo $data['address_err'] ?></span>

                        <button>Submit</button>
                    </div>
                    <div class="right">
                        
                      
                        <label for="noOfParticipants">No Of Participants</label>
                        <input type="text" id="noOfParticipants" name="noOfParticipants" value="<?php echo $data['noOfParticipants'] ?>">
                        <span class="form-invalid"><?php echo $data['noOfParticipants_err'] ?></span>

                        
                    </div>
                </div>
            </form>
        </div>
    </section>  
</body>
</html>