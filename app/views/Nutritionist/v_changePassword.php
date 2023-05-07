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
    <script defer src="<?php echo URLROOT; ?>/js/pushNotificationProfile.js"></script>
 
    <title>Counsellor Details</title>
</head>
<body>
  <div id="notification-container"></div>
    <section class="diet-plan-section">
        <div class="diet-plan-leftside">
            <div class="diet-left-side-container">
                <a href="<?php echo URLROOT ?>/Nutritionist/nutritionistDashBoard" class="page-change-button-from-diet"><i class="fa-solid fa-arrow-left"></i>Back to Home page</a>
                <div>
                    <h1><i class="fa-solid fa-pills"></i> Be-Care</h1>
                    <h2>Update your password with the relavent details</h2>
                    <p>Make sure to choose a strong and secure password. Click the "Change Password" button to update your password.</p>
                </div>
            </div>
        </div>
        <div class="diet-plan-rightside">
           
        <form action="<?php echo URLROOT ?>/Nutritionist/updatePassword/<?php echo $_SESSION['nutritionist_id'];?>" method="POST">
                
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



                        <button type="submit" >Update</button> 
                    </div>
    
                  
            </form>
        </div>
    </section>  

      <!-- For push notifications -->
      <span id="isUpdated"><?php if(isset($_SESSION['profile_updateNutritionist'])){echo $_SESSION['profile_updateNutritionist']; unset($_SESSION['profile_updateNutritionist']);}?></span>
       <span id="isUpdatedPassword"><?php if(isset($_SESSION['profile_updatePasswordNutritionist'])){echo $_SESSION['profile_updatePasswordNutritionist']; unset($_SESSION['profile_updatePasswordNutritionist']);}?></span>
   
</body>
</html>