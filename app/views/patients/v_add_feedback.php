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
                <a href="<?php echo URLROOT ?>/Pages/index" class="page-change-button"><i class="fa-solid fa-arrow-left"></i>Back to Home</a>
                <div>
                    <h1><i class="fa-solid fa-pills"></i> Be-Care</h1>
                    <h2>Enter your feedback</h2>
                    <p>Type your feedback on our Be Care website to share the experience with others. Mention if our service has been helpful for you and don't forget to mention the weaknesses of our system if you faced any so we can improve the system according to your needs.</p>
                </div>
            </div>
        </div>
        <div class="login-page-rightside">
            <form action="" method="POST">
                <div class="topic-of-form">
                    <h1>Add Your Feedback</h1>
                </div>

                <div class="form-inputs-and-buttons">
                    <label for="feedback">Your Feedback</label>
                    <textarea name="feedback" style="resize: none" id="feedback"  rows="10" cols="90"></textarea>
                    <span class="form-invalid"><?php echo $data['feedback_err'] ?></span>
                    <button>Add Feedback</button>
                </div>
            </form>
        </div>
    </section>
   
</body>
</html>