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
    <title>Add new Patient</title>
</head>
<body>
    <section class="diet-plan-section">
        <div class="diet-plan-leftside">
            <div class="diet-left-side-container">
                <a href="<?php echo URLROOT ?>/AdminUserMgmt/Patient" class="page-change-button-from-diet"><i class="fa-solid fa-arrow-left"></i>Back to Patient</a>
                <div>
                    <h1><i class="fa-solid fa-pills"></i> Be-Care</h1>
                    <h2>Fill these details to add new patient</h2>
                    <p>Login to the application to experience the healthcare services we are providing. If you haven't registered with the application yet, click the <b>sign up</b> button and create an account for free.</p>
                </div>
            </div>
        </div>
        <div class="diet-plan-rightside">
            <form action="<?php echo URLROOT ?>/AdminUserMgmt/addnewPatient" method="POST">
                <div class="diet-form-inputs-and-buttons">
                    <div class="left">

                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" value="<?php echo $data['first_name'] ?>">
                        <span class="form-invalid"><?php echo $data['first_name_err'] ?></span>

                       
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" value="<?php echo $data['last_name'] ?>">
                        <span class="form-invalid"><?php echo $data['last_name_err'] ?></span>

                        <label for="nic">NIC</label>
                        <input type="text" id="nic" name="nic" value="<?php echo $data['nic'] ?>">
                        <span class="form-invalid"><?php echo $data['nic_err'] ?></span>

                        <label for="contact_number">contact Number</label>
                        <input type="text" id="contact_number" name="contact_number" value="<?php echo $data['contact_number'] ?>">
                        <span class="form-invalid"><?php echo $data['contact_number_err'] ?></span>

                        <button type="submit" >Submit</button>
                    </div>
                    <div class="right">
                        
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo $data['email'] ?>">
                        <span class="form-invalid"><?php echo $data['email_err'] ?></span>

                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" value="<?php echo $data['password'] ?>">
                        <span class="form-invalid"><?php echo $data['password_err'] ?></span>


                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" value="<?php echo $data['confirm_password'] ?>">
                        <span class="form-invalid"><?php echo $data['confirm_password_err'] ?></span>


                        <label for="gender">Gender</label>
                                <select name="gender" id="gender" >
                                   <option value="Male">Male</option>
                                   <option value="Female">Female</option>
                                </select>
                        <span class="form-invalid"><?php echo $data['gender_err'] ?></span>

                        
                    </div>
                </div>
            </form>
        </div>
    </section>  
</body>
</html>