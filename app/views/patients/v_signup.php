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
    <script defer src="<?php echo URLROOT; ?>/js/multipleSignup.js"></script>
    <title>Signup</title>
</head>
<body onload="setFormNumber()">
    <section class="diet-plan-section"> <!--In this page, the classes are the same that exists in dietPlan-->
        <div class="diet-plan-leftside">
            <div class="diet-left-side-container">
                <a href="<?php echo URLROOT ?>/Pages/index" class="page-change-button-from-diet"><i class="fa-solid fa-arrow-left"></i>Back to Homepage</a>
                <div>
                    <h1><i class="fa-solid fa-pills"></i> Be-Care</h1>
                    <h2>Fill these details to request the diet plan</h2>
                    <p>Login to the application to experience the healthcare services we are providing. If you haven't registered with the application yet, click the <b>sign up</b> button and create an account for free.</p>
                </div>
            </div>
        </div>
        <div class="diet-plan-rightside">
            <div class="form-topic">
                <button id="previous-button-status"><i class="fa-solid fa-chevron-left"></i></button>
                <h2 id="form-status">patient</h2>
                <button id="next-button-status"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
            <span id="formNumber" ><?php if(isset($_SESSION['signup_form_number'])){echo $_SESSION['signup_form_number'];}else{echo 0;} ?></span>
            <div class="form-container" id="form-container">
            <form action="<?php echo URLROOT ?>/Patient/signup" method="POST" id="patient-form">
                <div class="topic-of-form">
                    <h1>Signup..</h1>
                    <p>Already have an account <a href="<?php echo URLROOT ?>/Login/login">Login</a></p>
                </div>
                <div class="diet-form-inputs-and-buttons">
                    <div class="left">
                        <label for="fname">First name</label>
                        <input type="text" id="fname" name="fname"  value="<?php if(isset($data['fname'])){echo $data['fname'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['fname_err'])){echo $data['fname_err'];} ?></span>

                        <label for="lname">Last name</label>
                        <input type="text" id="lname" name="lname"  value="<?php if(isset($data['lname'])){echo $data['lname'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['lname_err'])){echo $data['lname_err'];} ?></span>

                        <label for="nic">NIC</label>
                        <input type="text" id="nic" name="nic"  value="<?php if(isset($data['nic'])){echo $data['nic'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['nic_err'])){echo $data['nic_err'];} ?></span>

                        <label for="cnumber">Contact number</label>
                        <input type="text" id="cnumber" name="cnumber"  value="<?php if(isset($data['cnumber'])){echo $data['cnumber'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['cnumber_err'])){echo $data['cnumber_err'];} ?></span>

                        <button>Submit</button>
                    </div>
                    <div class="right">
                        <label for="gender">Gender</label>
                        <input type="text" id="gender" name="gender"  value="<?php if(isset($data['gender'])){echo $data['gender'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['gender_err'])){echo $data['gender_err'];} ?></span>

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email"  value="<?php if(isset($data['email'])){echo $data['email'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['email_err'])){echo $data['email_err'];} ?></span>

                        <label for="password">Password</label>
                        <input type="password" id="password" name="password"  value="<?php if(isset($data['password'])){echo $data['password'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['password_err'])){echo $data['password_err'];} ?></span>

                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"  value="<?php if(isset($data['password_confirmation'])){echo $data['password_confirmation'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['password_confirmation_err'])){echo $data['password_confirmation_err'];} ?></span>
                    </div>
                </div>
            </form>

            <form action="<?php echo URLROOT ?>/ServiceProviderSignup/signupDoctor" id="doctor-form" method="POST" enctype="multipart/form-data">
                <div class="diet-form-inputs-and-buttons">
                    <div class="left">

                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" value="<?php if(isset($data['d_first_name'])){echo $data['d_first_name'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['d_first_name_err'])){echo $data['d_first_name_err'];} ?></span>
                       
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" value="<?php if(isset($data['d_last_name'])){echo $data['d_last_name'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['d_last_name_err'])){echo $data['d_last_name_err'];} ?></span>

                        <label for="nic">NIC</label>
                        <input type="text" id="nic" name="nic" value="<?php if(isset($data['d_nic'])){echo $data['d_nic'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['d_nic_err'])){echo $data['d_nic_err'];} ?></span>

                        <label for="contact_number">contact Number</label>
                        <input type="text" id="contact_number" name="contact_number" value="<?php if(isset($data['d_contact_number'])){echo $data['d_contact_number'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['d_contact_number_err'])){echo $data['d_contact_number_err'];} ?></span>

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php if(isset($data['d_email'])){echo $data['d_email'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['d_email_err'])){echo $data['d_email_err'];} ?></span>

                        
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" >
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <span class="form-invalid"><?php if(isset($data['d_gender_err'])){echo $data['d_gender_err'];} ?></span>


                        <label for="city">City</label>
                        <input type="text" id="city" name="city" value="<?php if(isset($data['d_city'])){echo $data['d_city'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['d_city_err'])){echo $data['d_city_err'];} ?></span>

                        <label for="slmc">SLMC registration Number</label>
                        <input type="text" id="slmc" name="slmc" value="<?php if(isset($data['d_slmc_reg_number'])){echo $data['d_slmc_reg_number'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['d_slmc_reg_number_err'])){echo $data['d_slmc_reg_number_err'];} ?></span>

                        <button>Submit</button>
                    </div>
                    <div class="right">
                       
                        <label for="type">Type</label>
                        <select name="type" id="type" value="" >
                            <option value="MBBS">MBBS</option>
                            <option value="BAMS">BAMS</option>
                        </select>
                        <span class="form-invalid"><?php if(isset($data['d_type_err'])){echo $data['d_type_err'];} ?></span>

                       
                        <label for="qualification_file">Qualification File</label>
                        <input type="file" id="qualification_file" name="qualification_file" value="<?php if(isset($data['d_qualification_file'])){echo $data['d_qualification_file'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['d_qualification_file_err'])){echo $data['d_qualification_file_err'];} ?></span>

                        <label for="specialization">Specialization</label>
                        <input type="text" id="specialization" name="specialization" value="<?php if(isset($data['d_specialization'])){echo $data['d_specialization'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['d_specialization_err'])){echo $data['d_specialization_err'];} ?></span>

                        <label for="password">Password</label>
                        <input type="password" id="password" name="password">
                        <span class="form-invalid"><?php if(isset($data['d_password_err'])){echo $data['d_password_err'];} ?></span>


                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password">
                        <span class="form-invalid"><?php if(isset($data['d_confirm_password_err'])){echo $data['d_confirm_password_err'];} ?></span>

                        <label for="bank_name">Bank Name</label>
                        <input type="text" id="bank_name" name="bank_name" value="<?php if(isset($data['d_bank_name'])){echo $data['d_bank_name'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['d_bank_name_err'])){echo $data['d_bank_name_err'];} ?></span>

                        <label for="account_holder_name">Account Holder Name</label>
                        <input type="text" id="account_holder_name" name="account_holder_name" value="<?php if(isset($data['d_account_holder_name'])){echo $data['d_account_holder_name'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['d_account_holder_name_err'])){echo $data['d_account_holder_name_err'];} ?></span>

                        <label for="branch">Branch</label>
                        <input type="text" id="branch" name="branch" value="<?php if(isset($data['d_branch'])){echo $data['d_branch'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['d_branch_err'])){echo $data['d_branch_err'];} ?></span>

                        <label for="account_number">Account Number</label>   
                        <input type="text" id="account_number" name="account_number" value="<?php if(isset($data['d_account_number'])){echo $data['d_account_number'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['d_account_number_err'])){echo $data['d_account_number_err'];} ?></span>

                    </div>
                </div>
            </form>

            <form action="<?php echo URLROOT ?>/ServiceProviderSignup/signupCounsellor" id="counsellor-form" method="POST" enctype="multipart/form-data">
                <div class="diet-form-inputs-and-buttons">
                    <div class="left">

                       <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" value="<?php if(isset($data['c_first_name'])){echo $data['c_first_name'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['c_first_name_err'])){echo $data['c_first_name_err'];} ?></span>
                       
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" value="<?php if(isset($data['c_last_name'])){echo $data['c_last_name'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['c_last_name_err'])){echo $data['c_last_name_err'];} ?></span>

                        <label for="nic">NIC</label>
                        <input type="text" id="nic" name="nic" value="<?php if(isset($data['c_nic'])){echo $data['c_nic'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['c_nic_err'])){echo $data['c_nic_err'];} ?></span>

                        <label for="contact_number">contact Number</label>
                        <input type="text" id="contact_number" name="contact_number" value="<?php if(isset($data['c_contact_number'])){echo $data['c_contact_number'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['c_contact_number_err'])){echo $data['c_contact_number_err'];} ?></span>

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php if(isset($data['c_email'])){echo $data['c_email'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['c_email_err'])){echo $data['c_email_err'];} ?></span>

                        
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" >
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <span class="form-invalid"><?php if(isset($data['c_gender_err'])){echo $data['c_gender_err'];} ?></span>


                        <label for="city">City</label>
                        <input type="text" id="city" name="city" value="<?php if(isset($data['c_city'])){echo $data['c_city'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['c_city_err'])){echo $data['c_city_err'];} ?></span>


                        <button>Submit</button>
                    </div>
                    <div class="right">
                       
                        <label for="slmc">SLMC registration Number</label>
                        <input type="text" id="slmc" name="slmc" value="<?php if(isset($data['c_slmc_reg_number'])){echo $data['c_slmc_reg_number'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['c_slmc_reg_number_err'])){echo $data['c_slmc_reg_number_err'];} ?></span>

                       
                       <label for="qualification_file">Qualification File</label>
                        <input type="file" id="qualification_file" name="qualification_file" value="<?php if(isset($data['c_qualification_file'])){echo $data['c_qualification_file'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['c_qualification_file_err'])){echo $data['c_qualification_file_err'];} ?></span>

                       
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password">
                        <span class="form-invalid"><?php if(isset($data['c_password_err'])){echo $data['c_password_err'];} ?></span>


                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password">
                        <span class="form-invalid"><?php if(isset($data['c_confirm_password_err'])){echo $data['c_confirm_password_err'];} ?></span>

                        <label for="bank_name">Bank Name</label>
                        <input type="text" id="bank_name" name="bank_name" value="<?php if(isset($data['c_bank_name'])){echo $data['c_bank_name'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['c_bank_name_err'])){echo $data['c_bank_name_err'];} ?></span>

                        <label for="account_holder_name">Account Holder Name</label>
                        <input type="text" id="account_holder_name" name="account_holder_name" value="<?php if(isset($data['c_account_holder_name'])){echo $data['c_account_holder_name'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['c_account_holder_name_err'])){echo $data['c_account_holder_name_err'];} ?></span>

                        <label for="branch">Branch</label>
                        <input type="text" id="branch" name="branch" value="<?php if(isset($data['c_branch'])){echo $data['c_branch'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['c_branch_err'])){echo $data['c_branch_err'];} ?></span>

                        <label for="account_number">Account Number</label>   
                        <input type="text" id="account_number" name="account_number" value="<?php if(isset($data['c_account_number'])){echo $data['c_account_number'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['c_account_number_err'])){echo $data['c_account_number_err'];} ?></span>

                    </div>
                </div>
            </form>

            <form action="<?php echo URLROOT ?>/ServiceProviderSignup/signupPharmacist" id="pharmacist-form" method="POST" enctype="multipart/form-data">
                <div class="diet-form-inputs-and-buttons">
                    <div class="left">

                    <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" value="<?php if(isset($data['p_first_name'])){echo $data['p_first_name'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['p_first_name_err'])){echo $data['p_first_name_err'];} ?></span>
                       
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" value="<?php if(isset($data['p_last_name'])){echo $data['p_last_name'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['p_last_name_err'])){echo $data['p_last_name_err'];} ?></span>

                        <label for="nic">NIC</label>
                        <input type="text" id="nic" name="nic" value="<?php if(isset($data['p_nic'])){echo $data['p_nic'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['p_nic_err'])){echo $data['p_nic_err'];} ?></span>

                        <label for="contact_number">Contact Number</label>
                        <input type="text" id="contact_number" name="contact_number" value="<?php if(isset($data['p_contact_number'])){echo $data['p_contact_number'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['p_contact_number_err'])){echo $data['p_contact_number_err'];} ?></span>

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php if(isset($data['p_email'])){echo $data['p_email'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['p_email_err'])){echo $data['p_email_err'];} ?></span>

                        
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" >
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <span class="form-invalid"><?php if(isset($data['p_gender_err'])){echo $data['p_gender_err'];} ?></span>


                        <label for="city">City</label>
                        <input type="text" id="city" name="city" value="<?php if(isset($data['p_city'])){echo $data['p_city'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['p_city_err'])){echo $data['p_city_err'];} ?></span>

                      
                        <label for="pharmacy_name">Pharmacy Name</label>
                        <input type="text" id="pharmacy_name" name="pharmacy_name" value="<?php if(isset($data['p_pharmacy_name'])){echo $data['p_pharmacy_name'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['p_pharmacy_name_err'])){echo $data['p_pharmacy_name_err'];} ?></span>


                        <button>Submit</button>
                    </div>
                    <div class="right">
                      
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" value="<?php if(isset($data['p_address'])){echo $data['p_address'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['p_address_err'])){echo $data['p_address_err'];} ?></span>

                        <label for="slmc">SLMC registration Number</label>
                        <input type="text" id="slmc" name="slmc" value="<?php if(isset($data['p_slmc_reg_number'])){echo $data['p_slmc_reg_number'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['p_slmc_reg_number_err'])){echo $data['p_slmc_reg_number_err'];} ?></span>

                        <label for="qualification_file">Qualification File</label>
                        <input type="file" id="qualification_file" name="qualification_file" value="<?php if(isset($data['p_qualification_file'])){echo $data['p_qualification_file'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['p_qualification_file_err'])){echo $data['p_qualification_file_err'];} ?></span>

                       
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password">
                        <span class="form-invalid"><?php if(isset($data['p_password_err'])){echo $data['p_password_err'];} ?></span>


                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password">
                        <span class="form-invalid"><?php if(isset($data['p_confirm_password_err'])){echo $data['p_confirm_password_err'];} ?></span>

                        <label for="bank_name">Bank Name</label>
                        <input type="text" id="bank_name" name="bank_name" value="<?php if(isset($data['p_bank_name'])){echo $data['p_bank_name'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['p_bank_name_err'])){echo $data['p_bank_name_err'];} ?></span>

                        <label for="account_holder_name">Account Holder Name</label>
                        <input type="text" id="account_holder_name" name="account_holder_name" value="<?php if(isset($data['p_account_holder_name'])){echo $data['p_account_holder_name'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['p_account_holder_name_err'])){echo $data['p_account_holder_name_err'];} ?></span>

                        <label for="branch">Branch</label>
                        <input type="text" id="branch" name="branch" value="<?php if(isset($data['p_branch'])){echo $data['p_branch'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['p_branch_err'])){echo $data['p_branch_err'];} ?></span>

                        <label for="account_number">Account Number</label>   
                        <input type="text" id="account_number" name="account_number" value="<?php if(isset($data['p_account_number'])){echo $data['p_account_number'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['p_account_number_err'])){echo $data['p_account_number_err'];} ?></span>

                    </div>
                </div>
            </form>

            <form action="<?php echo URLROOT ?>/ServiceProviderSignup/signupNutritionist" id="nutritionist-form" method="POST" enctype="multipart/form-data">
                <div class="diet-form-inputs-and-buttons">
                    <div class="left">

                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" value="<?php if(isset($data['n_first_name'])){echo $data['n_first_name'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['n_first_name_err'])){echo $data['n_first_name_err'];} ?></span>
                       
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" value="<?php if(isset($data['n_last_name'])){echo $data['n_last_name'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['n_last_name_err'])){echo $data['n_last_name_err'];} ?></span>

                        <label for="nic">NIC</label>
                        <input type="text" id="nic" name="nic" value="<?php if(isset($data['n_nic'])){echo $data['n_nic'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['n_nic_err'])){echo $data['n_nic_err'];} ?></span>

                        <label for="contact_number">contact Number</label>
                        <input type="text" id="contact_number" name="contact_number" value="<?php if(isset($data['n_contact_number'])){echo $data['n_contact_number'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['n_contact_number_err'])){echo $data['n_contact_number_err'];} ?></span>

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php if(isset($data['n_email'])){echo $data['n_email'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['n_email_err'])){echo $data['n_email_err'];} ?></span>

                        
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" >
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <span class="form-invalid"><?php if(isset($data['n_gender_err'])){echo $data['n_gender_err'];} ?></span>

                        
                        <label for="fee">Fee</label>
                        <input type="text" id="fee" name="fee" value="<?php if(isset($data['n_fee'])){echo $data['n_fee'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['n_fee_err'])){echo $data['n_fee_err'];} ?></span>

                       
                        <button>Submit</button>
                    </div>
                    <div class="right">

                        <label for="slmc">SLMC registration Number</label>
                        <input type="text" id="slmc" name="slmc" value="<?php if(isset($data['n_slmc_reg_number'])){echo $data['n_slmc_reg_number'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['n_slmc_reg_number_err'])){echo $data['n_slmc_reg_number_err'];} ?></span>

                  
                        <label for="qualification_file">Qualification File</label>
                        <input type="file" id="qualification_file" name="qualification_file" value="<?php if(isset($data['n_qualification_file'])){echo $data['n_qualification_file'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['n_qualification_file_err'])){echo $data['n_qualification_file_err'];} ?></span>

                       
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password">
                        <span class="form-invalid"><?php if(isset($data['n_password_err'])){echo $data['n_password_err'];} ?></span>


                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password">
                        <span class="form-invalid"><?php if(isset($data['n_confirm_password_err'])){echo $data['n_confirm_password_err'];} ?></span>

                        <label for="bank_name">Bank Name</label>
                        <input type="text" id="bank_name" name="bank_name" value="<?php if(isset($data['n_bank_name'])){echo $data['n_bank_name'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['n_bank_name_err'])){echo $data['n_bank_name_err'];} ?></span>

                        <label for="account_holder_name">Account Holder Name</label>
                        <input type="text" id="account_holder_name" name="account_holder_name" value="<?php if(isset($data['n_account_holder_name'])){echo $data['n_account_holder_name'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['n_account_holder_name_err'])){echo $data['n_account_holder_name_err'];} ?></span>

                        <label for="branch">Branch</label>
                        <input type="text" id="branch" name="branch" value="<?php if(isset($data['n_branch'])){echo $data['n_branch'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['n_branch_err'])){echo $data['n_branch_err'];} ?></span>

                        <label for="account_number">Account Number</label>   
                        <input type="text" id="account_number" name="account_number" value="<?php if(isset($data['n_account_number'])){echo $data['n_account_number'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['n_account_number_err'])){echo $data['n_account_number_err'];} ?></span>

                    </div>
                </div>
            </form>

            <form action="<?php echo URLROOT ?>/ServiceProviderSignup/signupMeditationInstructor" id="meditation-instructor-form" method="POST" enctype="multipart/form-data">
                <div class="diet-form-inputs-and-buttons">
                    <div class="left">

                       
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" value="<?php if(isset($data['m_first_name'])){echo $data['m_first_name'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['m_first_name_err'])){echo $data['m_first_name_err'];} ?></span>
                       
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" value="<?php if(isset($data['m_last_name'])){echo $data['m_last_name'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['m_last_name_err'])){echo $data['m_last_name_err'];} ?></span>

                        <label for="nic">NIC</label>
                        <input type="text" id="nic" name="nic" value="<?php if(isset($data['m_nic'])){echo $data['m_nic'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['m_nic_err'])){echo $data['m_nic_err'];} ?></span>

                        <label for="contact_number">contact Number</label>
                        <input type="text" id="contact_number" name="contact_number" value="<?php if(isset($data['m_contact_number'])){echo $data['m_contact_number'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['m_contact_number_err'])){echo $data['m_contact_number_err'];} ?></span>

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php if(isset($data['m_email'])){echo $data['m_email'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['m_email_err'])){echo $data['m_email_err'];} ?></span>

                        
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" >
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <span class="form-invalid"><?php if(isset($data['m_gender_err'])){echo $data['m_gender_err'];} ?></span>


                        <label for="city">City</label>
                        <input type="text" id="city" name="city" value="<?php if(isset($data['m_city'])){echo $data['m_city'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['m_city_err'])){echo $data['m_city_err'];} ?></span>


                        <label for="address">address</label>
                        <input type="text" id="address" name="address" value="<?php if(isset($data['m_address'])){echo $data['m_address'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['m_address_err'])){echo $data['m_address_err'];} ?></span>



                        <button>Submit</button>
                    </div>
                    <div class="right">
                      
                        <label for="fee">fee</label>
                        <input type="text" id="fee" name="fee" value="<?php if(isset($data['m_fee'])){echo $data['m_fee'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['m_fee_err'])){echo $data['m_fee_err'];} ?></span>


                        <label for="qualification_file">Qualification File</label>
                        <input type="file" id="qualification_file" name="qualification_file" value="<?php if(isset($data['m_qualification_file'])){echo $data['m_qualification_file'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['m_qualification_file_err'])){echo $data['m_qualification_file_err'];} ?></span>

                       
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password">
                        <span class="form-invalid"><?php if(isset($data['m_password_err'])){echo $data['m_password_err'];} ?></span>


                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password">
                        <span class="form-invalid"><?php if(isset($data['m_confirm_password_err'])){echo $data['m_confirm_password_err'];} ?></span>

                        <label for="bank_name">Bank Name</label>
                        <input type="text" id="bank_name" name="bank_name" value="<?php if(isset($data['m_bank_name'])){echo $data['m_bank_name'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['m_bank_name_err'])){echo $data['m_bank_name_err'];} ?></span>

                        <label for="account_holder_name">Account Holder Name</label>
                        <input type="text" id="account_holder_name" name="account_holder_name" value="<?php if(isset($data['m_account_holder_name'])){echo $data['m_account_holder_name'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['m_account_holder_name_err'])){echo $data['m_account_holder_name_err'];} ?></span>

                        <label for="branch">Branch</label>
                        <input type="text" id="branch" name="branch" value="<?php if(isset($data['m_branch'])){echo $data['m_branch'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['m_branch_err'])){echo $data['m_branch_err'];} ?></span>

                        <label for="account_number">Account Number</label>   
                        <input type="text" id="account_number" name="account_number" value="<?php if(isset($data['m_account_number'])){echo $data['m_account_number'];} ?>">
                        <span class="form-invalid"><?php if(isset($data['m_account_number_err'])){echo $data['m_account_number_err'];} ?></span>

                    </div>
                </div>
            </form>
            </div>
        </div>
    </section>  
</body>
</html>