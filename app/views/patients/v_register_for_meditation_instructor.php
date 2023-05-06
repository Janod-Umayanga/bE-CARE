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
    <title>Channel Doctor</title>
</head>
<body>
    <section class="login-section">
        <div class="login-page-leftside">
            <div class="left-side-container">
                <a href="<?php echo URLROOT ?>/Patient/findMeditationInstructor" class="page-change-button"><i class="fa-solid fa-arrow-left"></i>Back to Find a Meditation Instructor</a>
                <div>
                    <h1><i class="fa-solid fa-pills"></i> Be-Care</h1>
                    <h2>Enter your details</h2>
                    <p>Fill the relevant details needed for the appointment and click submit to proceed with the payment to complete the appointment.</p>
                </div>
            </div>
        </div>
        <div class="login-page-rightside">
            <form action="<?php echo URLROOT ?>/Patient/registerForMeditationInstructor/<?php echo $data['meditation_instructor_id'] ?>/<?php echo $data['appointment_day_id'] ?>/<?php echo $data['noOfParticipants'] ?>/<?php echo $data['current_participants'] ?>/<?php echo $data['fee'] ?>" method="POST">
                <div class="topic-of-form">
                    <h1>Make an Appointment</h1>
                </div>

                <div class="form-inputs-and-buttons">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="<?php echo $data['name'] ?>">
                        <span class="form-invalid"><?php echo $data['name_err'] ?></span>

                        <label for="age">Age</label>
                        <input type="number" id="age" name="age" value="<?php echo $data['age'] ?>">
                        <span class="form-invalid"><?php echo $data['age_err'] ?></span>

                        <label for="gender">Title</label>
                            <select name="gender" id="gender"  value="<?php echo $data['gender'] ?>">
                                <option value="">Title</option>
                                <option value="Mr">Mr</option>
                                <option value="Ms">Ms</option>
                            </select>
                        <span class="form-invalid"><?php echo $data['gender_err'] ?></span>

                        <label for="cnumber">Contact number</label>
                        <input type="number" id="cnumber" name="cnumber" value="<?php echo $data['cnumber'] ?>">
                        <span class="form-invalid"><?php echo $data['cnumber_err'] ?></span>

                    <button>Submit</button>
                </div>
            </form>
        </div>
    </section>  
</body>
</html>