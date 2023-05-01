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
    <title>Meditation Instructor Details</title>
</head>
<body>
    <section class="diet-plan-section">
        <div class="diet-plan-leftside">
            <div class="diet-left-side-container">
                <a href="<?php echo URLROOT ?>/MedInstrDashBoard/medInstrDashBoard" class="page-change-button-from-diet"><i class="fa-solid fa-arrow-left"></i>Back to Home page</a>
                <div>
                    <h1><i class="fa-solid fa-pills"></i> Be-Care</h1>
                    <h2>Update your password with the relavent details</h2>
                    <p>Make sure to choose a strong and secure password. Click the "Change Password" button to update your password.</p>
                 </div>
            </div>
        </div>
        <div class="diet-plan-rightside">
           
           <form action="<?php echo URLROOT ?>/MedInstr/updatePW/<?php echo $_SESSION['MedInstr_id'];?>" method="POST">
                
                <div class="">
                    <h1>Change Password</h1>
                </div>
                  <div class="diet-form-inputs-and-buttons">
                    <div class="left"> <br><br><br>

                         <label>Current Password</label>
                         <input type="password" name="current_password" id="password"  >
                         <span class="form-invalid"><?php echo $data['current_password_err'] ?></span>


                         <label>New Password</label>
                         <input type="password" name="new_password" id="password"  >
                         <span class="form-invalid"><?php echo $data['new_password_err'] ?></span>


                         <label>Re-Type New Password</label>
                         <input type="password" name="retype_new_password" id="passwordRepeat"  >
                         <span class="form-invalid"><?php echo $data['retype_new_password_err'] ?></span>



                        <button type="submit" >Change Password</button> 
                    </div>
    
                  
            </form>
        </div>
    </section>  
</body>
</html>