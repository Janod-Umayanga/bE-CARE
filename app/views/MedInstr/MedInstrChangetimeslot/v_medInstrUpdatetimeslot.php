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
    <title>Update timeslot</title>
</head>
<body>
    <section class="diet-plan-section">
        <div class="diet-plan-leftside">
            <div class="diet-left-side-container">
                <a href="<?php echo URLROOT ?>/MedInstrChangetimeslot/medInstrChangetimeslot" class="page-change-button-from-diet"><i class="fa-solid fa-arrow-left"></i>Back to Change Timeslot</a>
                <div>
                    <h1><i class="fa-solid fa-pills"></i> Be-Care</h1>
                    <h2>Fill these details to update future timeslot</h2>
                    <p>Click the "Update" button to save your changes and update timeslot.</p>
               </div>
            </div>
        </div>
        <div class="diet-plan-rightside">
            <form action="<?php echo URLROOT ?>/MedInstrChangeTimeslot/updateFutureTimeslot/<?php echo  $data["timeslot_id"] ?>" method="POST">
                <input type="hidden" name="appointment_day" value="<?php echo $data["appointment_day"] ?>">
                <div class="diet-form-inputs-and-buttons">
                    <div class="left">

                     

                        <label for="Date">Day</label>
                        <input type="text" id="dat" name="dat"  disabled="true" value="<?php echo $data['appointment_day'] ?>">
                        <span class="form-invalid"><?php echo $data['appointment_day_err'] ?></span>

                        
                        <label for="starting Time">Starting Time</label>
                        <input type="time" id="starting_time" name="starting_time" value="<?php echo $data['starting_time'] ?>">
                        <span class="form-invalid"><?php echo $data['starting_time_err'] ?></span>

                        <label for="Ending Time">Ending Time</label>
                        <input type="time" id="ending_time" name="ending_time" value="<?php echo $data['ending_time'] ?>">
                        <span class="form-invalid"><?php echo $data['ending_time_err'] ?></span>

                        <label for="fee">Fee (Rs.)</label>
                        <input type="number" id="fee" name="fee" value="<?php echo $data['fee'] ?>">
                        <span class="form-invalid"><?php echo $data['fee_err'] ?></span>


                        <button>Update</button>
                    </div>
                    <div class="right">
                        
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" value="<?php echo $data['address'] ?>">
                        <span class="form-invalid"><?php echo $data['address_err'] ?></span>

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