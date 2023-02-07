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
<body>
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
            <div class="form-container" id="form-container">
            <form action="<?php echo URLROOT ?>/Patient/signup" method="POST" id="patient-form">
                <div class="topic-of-form">
                    <h1>Signup..</h1>
                    <p>Already have an account <a href="<?php echo URLROOT ?>/Login/login">Login</a></p>
                </div>
                <div class="diet-form-inputs-and-buttons">
                    <div class="left">
                        <label for="fname">First name</label>
                        <input type="text" id="fname" name="fname"  value="<?php echo $data['fname'] ?>">
                        <span class="form-invalid"><?php echo $data['fname_err'] ?></span>

                        <label for="lname">Last name</label>
                        <input type="text" id="lname" name="lname"  value="<?php echo $data['lname'] ?>">
                        <span class="form-invalid"><?php echo $data['lname_err'] ?></span>

                        <label for="nic">NIC</label>
                        <input type="text" id="nic" name="nic"  value="<?php echo $data['nic'] ?>">
                        <span class="form-invalid"><?php echo $data['nic_err'] ?></span>

                        <label for="cnumber">Contact number</label>
                        <input type="text" id="cnumber" name="cnumber"  value="<?php echo $data['cnumber'] ?>">
                        <span class="form-invalid"><?php echo $data['cnumber_err'] ?></span>

                        <button>Submit</button>
                    </div>
                    <div class="right">
                        <label for="gender">Gender</label>
                        <input type="text" id="gender" name="gender"  value="<?php echo $data['gender'] ?>">
                        <span class="form-invalid"><?php echo $data['gender_err'] ?></span>

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email"  value="<?php echo $data['email'] ?>">
                        <span class="form-invalid"><?php echo $data['email_err'] ?></span>

                        <label for="password">Password</label>
                        <input type="password" id="password" name="password"  value="<?php echo $data['password'] ?>">
                        <span class="form-invalid"><?php echo $data['password_err'] ?></span>

                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"  value="<?php echo $data['password_confirmation'] ?>">
                        <span class="form-invalid"><?php echo $data['password_confirmation_err'] ?></span>
                    </div>
                </div>
            </form>

            <form action="<?php echo URLROOT ?>/ServiceProviderSignup/signupDoctor" id="doctor-form" method="POST" enctype="multipart/form-data">
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

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo $data['email'] ?>">
                        <span class="form-invalid"><?php echo $data['email_err'] ?></span>

                        
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" >
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <span class="form-invalid"><?php echo $data['gender_err'] ?></span>


                        <label for="city">City</label>
                        <input type="text" id="city" name="city" value="<?php echo $data['city'] ?>">
                        <span class="form-invalid"><?php echo $data['city_err'] ?></span>

                        <label for="slmc">SLMC registration Number</label>
                        <input type="text" id="slmc" name="slmc" value="<?php echo $data['slmc_reg_number'] ?>">
                        <span class="form-invalid"><?php echo $data['slmc_reg_number_err'] ?></span>

                        <button>Submit</button>
                    </div>
                    <div class="right">
                       
                        <label for="type">Type</label>
                        <select name="type" id="type" value="<?php echo $data['type'] ?>" >
                            <option value="MBBS">MBBS</option>
                            <option value="BAMS">BAMS</option>
                        </select>
                        <span class="form-invalid"><?php echo $data['type_err'] ?></span>

                       
                        <label for="qualification_file">Qualification File</label>
                        <input type="file" id="qualification_file" name="qualification_file" value="<?php echo $data['qualification_file'] ?>">
                        <span class="form-invalid"><?php echo $data['qualification_file_err'] ?></span>

                        <label for="specialization">Specialization</label>
                        <input type="text" id="specialization" name="specialization" value="<?php echo $data['specialization'] ?>">
                        <span class="form-invalid"><?php echo $data['specialization_err'] ?></span>

                        <label for="password">Password</label>
                        <input type="password" id="password" name="password">
                        <span class="form-invalid"><?php echo $data['password_err'] ?></span>


                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password">
                        <span class="form-invalid"><?php echo $data['confirm_password_err'] ?></span>

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

            <form action="<?php echo URLROOT ?>/ServiceProviderSignup/signupCounsellor" id="counsellor-form" method="POST" enctype="multipart/form-data">
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

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo $data['email'] ?>">
                        <span class="form-invalid"><?php echo $data['email_err'] ?></span>

                        
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" >
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <span class="form-invalid"><?php echo $data['gender_err'] ?></span>


                        <label for="city">City</label>
                        <input type="text" id="city" name="city" value="<?php echo $data['city'] ?>">
                        <span class="form-invalid"><?php echo $data['city_err'] ?></span>


                        <button>Submit</button>
                    </div>
                    <div class="right">
                    <label for="slmc">SLMC registration Number</label>
                        <input type="text" id="slmc" name="slmc" value="<?php echo $data['slmc_reg_number'] ?>">
                        <span class="form-invalid"><?php echo $data['slmc_reg_number_err'] ?></span>

                       
                        <label for="qualification_file">Qualification File</label>
                        <input type="file" id="qualification_file" name="qualification_file" value="<?php echo $data['qualification_file'] ?>">
                        <span class="form-invalid"><?php echo $data['qualification_file_err'] ?></span>

    
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password">
                        <span class="form-invalid"><?php echo $data['password_err'] ?></span>


                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password">
                        <span class="form-invalid"><?php echo $data['confirm_password_err'] ?></span>

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

            <form action="<?php echo URLROOT ?>/ServiceProviderSignup/signupPharmacist" id="pharmacist-form" method="POST" enctype="multipart/form-data">
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

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo $data['email'] ?>">
                        <span class="form-invalid"><?php echo $data['email_err'] ?></span>

                        
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" >
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <span class="form-invalid"><?php echo $data['gender_err'] ?></span>


                        <label for="city">City</label>
                        <input type="text" id="city" name="city" value="<?php echo $data['city'] ?>">
                        <span class="form-invalid"><?php echo $data['city_err'] ?></span>

                        <label for="pharmacy_name">contact Number</label>
                        <input type="text" id="pharmacy_name" name="pharmacy_name" value="<?php echo $data['pharmacy_name'] ?>">
                        <span class="form-invalid"><?php echo $data['pharmacy_name_err'] ?></span>


                        <button>Submit</button>
                    </div>
                    <div class="right">
                    <label for="address">address</label>
                        <input type="text" id="address" name="address" value="<?php echo $data['address'] ?>">
                        <span class="form-invalid"><?php echo $data['address_err'] ?></span>

            
                        <label for="slmc">SLMC registration Number</label>
                        <input type="text" id="slmc" name="slmc" value="<?php echo $data['slmc_reg_number'] ?>">
                        <span class="form-invalid"><?php echo $data['slmc_reg_number_err'] ?></span>
        
                       
                        <label for="qualification_file">Qualification File</label>
                        <input type="file" id="qualification_file" name="qualification_file" value="<?php echo $data['qualification_file'] ?>">
                        <span class="form-invalid"><?php echo $data['qualification_file_err'] ?></span>

                        <label for="password">Password</label>
                        <input type="password" id="password" name="password">
                        <span class="form-invalid"><?php echo $data['password_err'] ?></span>


                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password">
                        <span class="form-invalid"><?php echo $data['confirm_password_err'] ?></span>

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

            <form action="<?php echo URLROOT ?>/ServiceProviderSignup/signupNutritionist" id="nutritionist-form" method="POST" enctype="multipart/form-data">
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

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo $data['email'] ?>">
                        <span class="form-invalid"><?php echo $data['email_err'] ?></span>

                        
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" >
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <span class="form-invalid"><?php echo $data['gender_err'] ?></span>

                        <button>Submit</button>
                    </div>
                    <div class="right">
                    <label for="fee">fee</label>
                        <input type="text" id="fee" name="fee" value="<?php echo $data['fee'] ?>">
                        <span class="form-invalid"><?php echo $data['fee_err'] ?></span>
 
                        <label for="slmc">SLMC registration Number</label>
                        <input type="text" id="slmc" name="slmc" value="<?php echo $data['slmc_reg_number'] ?>">
                        <span class="form-invalid"><?php echo $data['slmc_reg_number_err'] ?></span>
        
                  
                        <label for="qualification_file">Qualification File</label>
                        <input type="file" id="qualification_file" name="qualification_file" value="<?php echo $data['qualification_file'] ?>">
                        <span class="form-invalid"><?php echo $data['qualification_file_err'] ?></span>

                        <label for="password">Password</label>
                        <input type="password" id="password" name="password">
                        <span class="form-invalid"><?php echo $data['password_err'] ?></span>


                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password">
                        <span class="form-invalid"><?php echo $data['confirm_password_err'] ?></span>

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

            <form action="<?php echo URLROOT ?>/ServiceProviderSignup/signupMeditationInstructor" id="meditation-instructor-form" method="POST" enctype="multipart/form-data">
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

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo $data['email'] ?>">
                        <span class="form-invalid"><?php echo $data['email_err'] ?></span>

                        
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" >
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <span class="form-invalid"><?php echo $data['gender_err'] ?></span>


                        <label for="city">City</label>
                        <input type="text" id="city" name="city" value="<?php echo $data['city'] ?>">
                        <span class="form-invalid"><?php echo $data['city_err'] ?></span>

                        <label for="address">address</label>
                        <input type="text" id="address" name="address" value="<?php echo $data['address'] ?>">
                        <span class="form-invalid"><?php echo $data['address_err'] ?></span>


                        <button>Submit</button>
                    </div>
                    <div class="right">
                    <label for="fee">fee</label>
                        <input type="text" id="fee" name="fee" value="<?php echo $data['fee'] ?>">
                        <span class="form-invalid"><?php echo $data['fee_err'] ?></span>
 
                       
                        <label for="qualification_file">Qualification File</label>
                        <input type="file" id="qualification_file" name="qualification_file" value="<?php echo $data['qualification_file'] ?>">
                        <span class="form-invalid"><?php echo $data['qualification_file_err'] ?></span>

                        <label for="password">Password</label>
                        <input type="password" id="password" name="password">
                        <span class="form-invalid"><?php echo $data['password_err'] ?></span>


                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password">
                        <span class="form-invalid"><?php echo $data['confirm_password_err'] ?></span>

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
        </div>
    </section>  
</body>
</html>