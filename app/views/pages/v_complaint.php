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
    <script defer src="<?php echo URLROOT; ?>/js/pushNotificationforLogin.js"></script>
    <title>Document</title>
</head>
<body>
    <div id="notification-container"></div>
    <section class="login-section">
        <div class="login-page-leftside">
            <div class="left-side-container">
                <?php if(isset($_SESSION['patient_id'])):  ?>
                    <a href="<?php echo URLROOT ?>/Pages/index" class="page-change-button"><i class="fa-solid fa-arrow-left"></i>Back to Homepage</a>
                    <?php $userType='patient'; ?> 
               <?php elseif(isset($_SESSION['doctor_id'])):  ?>
                    <a href="<?php echo URLROOT ?>/Doctor/dashboard" class="page-change-button"><i class="fa-solid fa-arrow-left"></i>Back to Homepage</a>
                    <?php $userType='doctor'; ?>
                <?php elseif(isset($_SESSION['counsellor_id'])):  ?>
                    <a href="<?php echo URLROOT ?>/Counsellor/dashboard" class="page-change-button"><i class="fa-solid fa-arrow-left"></i>Back to Homepage</a>
                    <?php $userType='counsellor'; ?>
                <?php elseif(isset($_SESSION['MedInstr_id'])):  ?>
                    <a href="<?php echo URLROOT ?>/MedInstrDashBoard/medInstrDashBoard" class="page-change-button"><i class="fa-solid fa-arrow-left"></i>Back to Homepage</a>
                    <?php $userType='MedInstr'; ?>
                <?php elseif(isset($_SESSION['nutritionist_id'])):  ?>
                    <a href="<?php echo URLROOT ?>/Nutritionist/nutritionistDashBoard" class="page-change-button"><i class="fa-solid fa-arrow-left"></i>Back to Homepage</a>
                    <?php $userType='nutritionist'; ?>
                <?php elseif(isset($_SESSION['pharmacist_id'])):  ?>
                    <a href="<?php echo URLROOT ?>/Pharmacist/pharmacistDashBoard" class="page-change-button"><i class="fa-solid fa-arrow-left"></i>Back to Homepage</a>
                    <?php $userType='pharmacist'; ?>
                <?php endif  ?>

                <div>
                    <h1><i class="fa-solid fa-pills"></i> Be-Care</h1>
                    <h2>Enter your login details to get into the application</h2>
                    <p>Login to the application to experience the healthcare services we are providing. If you haven't registered with the application yet, click the <b>sign up</b> button and create an account for free.</p>
                </div>
            </div>
        </div>
        <div class="login-page-rightside">
            <form action="" method="POST">
                <div class="topic-of-form">
                    <h1>Complaint Form</h1>
                </div>

                <div class="form-inputs-and-buttons">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" value="<?php echo $data['subject'] ?>">
                    <span class="form-invalid"><?php echo $data['subject_err'] ?></span>

                    <label for="complaint">Complaint</label>
                    <textarea name="complaint" style="resize: none" id="complaint"  rows="10" cols="90"></textarea>
                    <span class="form-invalid"><?php echo $data['complaint_err'] ?></span>
                    <input type="hidden" name="usertype" value="<?php echo $userType ?>">
                    <button>Submit</button>
                </div>
            </form>
        </div>
    </section>
   
</body>
</html>