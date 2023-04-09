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
    <section class="login-section">
        <div class="login-page-leftside">
            <div class="left-side-container">
                <a href="<?php echo URLROOT ?>/Login/login" class="page-change-button"><i class="fa-solid fa-arrow-left"></i>Back to Login</a>
                <div>
                    <h1><i class="fa-solid fa-pills"></i> Be-Care</h1>
                    <h2>Enter your login details to get into the application</h2>
                    <p>Login to the application to experience the healthcare services we are providing. If you haven't registered with the application yet, click the <b>sign up</b> button and create an account for free.</p>
                </div>
            </div>
        </div>
        <div class="login-page-rightside">
            <form action="<?php echo URLROOT ?>/Login/forgotPassword"  method="POST">
                <div class="topic-of-form">
                    <h1>Forgot Password..</h1>
                </div>

                <div class="form-inputs-and-buttons">

                       <label for="usertype">User Type</label>
                        <select id="usertype" name="usertype">
                        <option value="patient">Patient</option>
                        <option value="doctor">Doctor</option>
                        <option value="counsellor">Counsellor</option>
                        <option value="pharmacist">Pharmacist</option>
                        <option value="nutritionist">Nutritionist</option>
                        <option value="meditation_instructor">Meditation Instructor</option>
                        <option value="admin">Admin</option>
                        </select>
                    <label for="email">Email</label>
                        <input type="email" id="email" name="forgot_email" value="<?php echo $data['email'] ?>" >
                        <span class="form-invalid"><?php echo $data['email_err'] ?></span>
                    <button name="forgot_btn">Reset Password Link</button>

                </div>

            </form>
        </div>
    </section>
 </body>
</html>