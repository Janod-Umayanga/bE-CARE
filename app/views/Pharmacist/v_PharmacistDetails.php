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
    <title>Pharmacist Details</title>
</head>
<body>
    <section class="login-section-p-and-n">
        <div class="login-page-leftside">
            <div class="left-side-container">
                <a href="<?php echo URLROOT ?>/Pharmacist/v_PharmacistDashBoard" class="page-change-button"><i class="fa-solid fa-arrow-left"></i>Back to Homepage</a>
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
                    <h1>Your Details</h1>
                    <p>Change Password<a href="<?php echo URLROOT ?>/Pharmacist/changePW"> Here</a></p>
                </div>

                <div class="diet-form-inputs-and-buttons">
                    <div class="left">
                        <label for="fname">First name</label>
                        <input type="text" id="fname" name="first_name" value="<?php echo $data['fname'] ?>">
                        <span class="form-invalid"><?php echo $data['fname_err'] ?></span>

                        <label for="lname">Last name</label>
                        <input type="text" id="lname" name="last_name" value="<?php echo $data['lname'] ?>">
                        <span class="form-invalid"><?php echo $data['lname_err'] ?></span>

                        <label for="nic">NIC</label>
                        <input type="text" id="nic" name="nic" value="<?php echo $data['nic'] ?>">
                        <span class="form-invalid"><?php echo $data['nic_err'] ?></span>

                        <label for="cnumber">Contact number</label>
                        <input type="text" id="cnumber" name="contact_number" value="<?php echo $data['cnumber'] ?>">
                        <span class="form-invalid"><?php echo $data['cnumber_err'] ?></span>
                        
                        <label for="gender">Gender</label>
                        <input type="text" id="gender" name="gender" value="<?php echo $data['gender'] ?>">
                        <span class="form-invalid"><?php echo $data['gender_err'] ?></span>

                        <label for="pharname">Pharmacy Name</label>
                        <input type="text" id="pharmacy_name" name="pharmacy_name" value="<?php echo $data['pharname'] ?>">
                        <span class="form-invalid"><?php echo $data['pname_err'] ?></span>

                        <label for="city">city</label>
                        <input type="text" id="city" name="city" value="<?php echo $data['city'] ?>">
                        <span class="form-invalid"><?php echo $data['city_err'] ?></span>




                        <button>Update</button>
                    </div>
                    <div class="right">

                    <label for="slmc_reg_number">SLMC Reg No</label>
                        <p><?php echo $data['slmcregNo'] ?></p>
                       
                    <label for="address">Address</label>
                        <input type="text" id="address" name="address" value="<?php echo $data['address'] ?>">
                        <span class="form-invalid"><?php echo $data['address_err'] ?></span>

                
                    <label for="bank-name">Bank Name</label>
                        <input type="text" id="bank_name" name="bank_name" value="<?php echo $data['bankname'] ?>">
                        <span class="form-invalid"><?php echo $data['bname_err'] ?></span>

            
                    <label for="account_holder_name">Account Holder Name</label>
                        <input type="text" id="account_holder_name" name="account_holder_name" value="<?php echo $data['accholdername'] ?>">
                        <span class="form-invalid"><?php echo $data['hname_err'] ?></span>

                    
                    <label for="branch">Branch</label>
                        <input type="text" id="branch" name="branch" value="<?php echo $data['branch'] ?>">
                        <span class="form-invalid"><?php echo $data['branch_err'] ?></span>

                    <label for="account_number">Account Number</label>
                        <input type="text" id="account_number" name="account_number" value="<?php echo $data['accountnumber'] ?>">
                        <span class="form-invalid"><?php echo $data['accno_err'] ?></span>


                        <label for="email">Email</label>
                        <p><?php echo $data['email'] ?></p>
                    </div>
                </div>
            </form>
        </div>
    </section>  
</body>
</html>

