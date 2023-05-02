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
    <title>Add Timeslot</title>
</head>
<body>
    <section class="login-section">
        <div class="login-page-leftside">
            <div class="left-side-container">
                <a href="<?php echo URLROOT ?>/Doctor/timeslots" class="page-change-button"><i class="fa-solid fa-arrow-left"></i>Back to Timeslots</a>
                <div>
                    <h1><i class="fa-solid fa-pills"></i> Be-Care</h1>
                    <h2>Enter your login details to get into the application</h2>
                    <p>Login to the application to experience the healthcare services we are providing. If you haven't registered with the application yet, click the <b>sign up</b> button and create an account for free.</p>
                </div>
            </div>
        </div>
        <div class="login-page-rightside">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="topic-of-form">
                    <h1>Add New Timeslot</h1>
                </div>

                <div class="form-inputs-and-buttons">
                    <label for="day">Day:</label>
                        <select id="day" name="day">
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                        <option value="Sunday">Sunday</option>
                        </select>

                        <label for="starting_time">Starting Time</label>
                        <input type="time" id="starting_time" name="starting_time" value="<?php echo $data['starting_time'] ?>">
                        <span class="form-invalid"><?php echo $data['starting_time_err'] ?></span>

                        <label for="ending_time">Ending Time</label>
                        <input type="time" id="ending_time" name="ending_time" value="<?php echo $data['ending_time'] ?>">
                        <span class="form-invalid"><?php echo $data['ending_time_err'] ?></span>

                        <label for="duration">Duration Per One Patient:</label>
                        <select id="duration" name="duration">
                        <option value="5">5 minutes</option>
                        <option value="10">10 minutes</option>
                        </select>

                        <label for="fee">Fee (Rs.)</label>
                        <input type="number" id="fee" name="fee" value="<?php echo $data['fee'] ?>">
                        <span class="form-invalid"><?php echo $data['fee_err'] ?></span>

                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" value="<?php echo $data['address'] ?>">
                        <span class="form-invalid"><?php echo $data['address_err'] ?></span>
                    <button>Add</button>
                </div>
            </form>
        </div>
    </section>  
</body>
</html>