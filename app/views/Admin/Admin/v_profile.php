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
  
    <title>Admin Details</title>
</head>
<body>
    
    <div id="notification-container"></div>
    <section class="diet-plan-section">
        <div class="diet-plan-leftside">
            <div class="diet-left-side-container">
                <a href="<?php echo URLROOT ?>/AdminDashBoard/adminDashBoard" class="page-change-button-from-diet"><i class="fa-solid fa-arrow-left"></i>Back to Home page</a>
                <div>
                    <h1><i class="fa-solid fa-pills"></i> Be-Care</h1>
                    <h2>update your profile with the relevant details</h2>
                    <p>Click the "Update" button to save your changes and update your profile information.</p>
                </div>
            </div>
        </div>
        <div class="diet-plan-rightside">
           
           <form action="<?php echo URLROOT ?>/Admin/editProfile/<?php echo $_SESSION['admin_id'];?>" method="POST">
                
                <div class="">
                    <h1>Your Details</h1>
                    <p>Change Password<a href="<?php echo URLROOT ?>/Admin/changePW/"> Here</a></p>
                </div>
                  <div class="diet-form-inputs-and-buttons">
                    <div class="left"> 

                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" value="<?php echo $data['first_name'] ?>">
                        <span class="form-invalid"><?php echo $data['first_name_err'] ?></span>

                       
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" value="<?php echo $data['last_name'] ?>">
                        <span class="form-invalid"><?php echo $data['last_name_err'] ?></span>

                        <label for="nic">NIC</label>
                        <input type="text" id="nic" name="nic" disabled="true" value="<?php echo $data['nic'] ?>">
                        <span class="form-invalid"><?php echo $data['nic_err'] ?></span>

                        <label for="contact_number">contact Number</label>
                        <input type="text" id="contact_number" name="contact_number" value="<?php echo $data['contact_number'] ?>">
                        <span class="form-invalid"><?php echo $data['contact_number_err'] ?></span>

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" disabled="true" value="<?php echo $data['email'] ?>">
                        
            

                        <button type="submit" >Update</button> 
                    </div>
    
                    <div class="right">
                   
       
                
                        <label for="gender">Title</label>
                        <input type="text" id="gender" disabled='true' name="gender" value="<?php echo $data['gender'] ?>">
                   
                        <span class="form-invalid"><?php echo $data['gender_err'] ?></span>

                        <label for="bank_name">Bank Name</label>
                        <input type="text" id="bank_name" name="bank_name" value="<?php echo $data['bank_name'] ?>">
                        <span class="form-invalid"><?php echo $data['bank_name_err'] ?></span>

                        <label for="account_holder_name">Account Holder Name</label>
                        <input type="text" id="account_holder_name" name="account_holder_name" value="<?php echo $data['account_holder_name'] ?>">
                        <span class="form-invalid"><?php echo $data['account_holder_name_err'] ?></span>

                        <label for="branch">Branch</label>
                        <input type="text" id="branch" name="branch" value="<?php echo $data['branch'] ?>">
                        <span class="form-invalid"><?php echo $data['branch_err'] ?></span>

                      

                        <label for="account_number">Account Number</label>
                        <input type="text" id="account_number" name="account_number" value="<?php echo $data['account_number'] ?>">
                        <span class="form-invalid"><?php echo $data['account_number_err'] ?></span>

                        
                        
                    </div>
                </div>
            </form>
        </div>
    </section>  
     <!-- For push notifications -->
     <span id="isUpdated"><?php if(isset($_SESSION['profile_updateAdmin'])){echo $_SESSION['profile_updateAdmin']; unset($_SESSION['profile_updateAdmin']);}?></span>
     <span id="isUpdatedPassword"><?php if(isset($_SESSION['profile_updatePasswordAdmin'])){echo $_SESSION['profile_updatePasswordAdmin']; unset($_SESSION['profile_updatePasswordAdmin']);}?></span>
   
</body>
</html>