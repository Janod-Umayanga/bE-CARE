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
    <title>Change Password</title>
</head>
<body>
    <section class="login-section">
        <div class="login-page-leftside">
            <div class="left-side-container">
                <a href="<?php echo URLROOT ?>/Patient/details" class="page-change-button"><i class="fa-solid fa-arrow-left"></i>Back to Your Details</a>
                <div>
                    <h1><i class="fa-solid fa-pills"></i> Be-Care</h1>
                    <h2>Change your password</h2>
                    <p>Provide your current password. Then fill the new password twice. Make sure to give a strong password.</p>
                </div>
            </div>
        </div>
        <div class="login-page-rightside">
            <form action="" method="POST">
                <div class="topic-of-form">
                    <h1>Change Password</h1>
                </div>

                <div class="form-inputs-and-buttons">
                    <label for="expw">Current Password</label>
                        <input type="password" id="expw" name="expw" value="<?php echo $data['expw'] ?>">
                        <span class="form-invalid"><?php echo $data['expw_err'] ?></span>
                    <label for="newpw">New Password</label>
                        <input type="password" id="newpw" name="newpw" value="<?php echo $data['newpw'] ?>">
                        <span class="form-invalid"><?php echo $data['newpw_err'] ?></span>
                    <label for="password_confirmation">Confirm New Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" value="<?php echo $data['password_confirmation'] ?>">
                        <span class="form-invalid"><?php echo $data['password_confirmation_err'] ?></span>
                    <button>Change Password</button>
                </div>
            </form>
        </div>
    </section>  
</body>
</html>