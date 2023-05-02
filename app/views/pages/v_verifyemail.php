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
                    <h2></h2>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="login-page-rightside">
            <form action="<?php echo URLROOT ?>/Login/forgotPassword"  method="POST">
                <div class="topic-of-form">
                    <h1></h1>
                </div>

                <div class="form-inputs-and-buttons">
                      <h1>- To complete the registration process, please confirm your email address by clicking on the verification link sent to your registered email -</h1>
                </div>

            </form>
        </div>
    </section>
 </body>
</html>