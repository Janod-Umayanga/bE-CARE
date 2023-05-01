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
    <title>Add new Counsellor</title>
</head>
<body>
    <section class="diet-plan-section">
        <div class="diet-plan-leftside">
            <div class="diet-left-side-container">
                <a href="<?php echo URLROOT ?>/AdminUserMgmt/Counsellor" class="page-change-button-from-diet"><i class="fa-solid fa-arrow-left"></i>Back to Counsellor</a>
                <div>
                    <h1><i class="fa-solid fa-pills"></i> Be-Care</h1>
                    <h2>Fill these details to add new Counsellor</h2>
                 
                    <p>The counselor's qualification file should include MBBS degree certificates, license or certification , specialization certificates, continuing education certificates, and proof of professional memberships , Additional relevant documents.</p>

                    <p>After successfully creating the counselor's account, the relevant counselor will receive an email with their username and password for login</p>
                </div>
            </div>
        </div>
        <div class="diet-plan-rightside">
            <div class="form-container" id="form-container">
        
            <form action="<?php echo URLROOT ?>/AdminUserMgmt/addnewCounsellor" method="POST" enctype="multipart/form-data">
                <div class="diet-form-inputs-and-buttons">
                    <div class="left"> <br><br><br>

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

                        
                        <label for="gender">Title</label>
                        <select name="gender" id="gender" >
                            <option value="">Title</option>
                            <option value="Mr">Mr</option>
                            <option value="Ms">Ms</option>
                        </select>
                        <span class="form-invalid"><?php echo $data['gender_err'] ?></span>

 
                        <label for="city">City</label>
                        <select name="city" id="city">
                            <option value="">City</option>
                            <option value="Colombo">Colombo</option>
                            <option value="Galle">Galle</option>
                            <option value="Kandy">Kandy</option>
                            <option value="Malabe">Malabe</option>
                            <option value="Matara">Matara</option>
                            <option value="Nugegoda">Nugegoda</option>
                            <option value="Ratnapura">Ratnapura</option>
                            <option value="Trincomalee">Trincomalee</option>
                        </select>
                        <span class="form-invalid"><?php echo $data['city_err'] ?></span>
                     
                        <button type="submit" >Submit</button> 
                    </div>
                    <div class="right">
                    <br><br><br>
       
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
          </div> 
        </div>
    </section>  
</body>
</html>