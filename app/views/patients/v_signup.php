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
                    <p>Already have an account <a href="<?php echo URLROOT ?>/Patient/login">Login</a></p>
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

            <form action="" id="doctor-form">
                <div class="diet-form-inputs-and-buttons">
                    <div class="left">

                        <label for="">Age</label>
                        <input type="number">

                        <label for="">Gender</label>
                        <select name="gender" id="gender">
                            <option value="male">Male</option>
                            <option value="Female">Female</option>
                        </select>

                        <label for="">Contact number</label>
                        <input type="number">

                        <label for="">Weight</label>
                        <input type="number">

                        <label for="">Height</label>
                        <input type="number">

                        <button>Submit</button>
                    </div>
                    <div class="right">
                        <label for="">Marital status</label>
                        <select name="marital-status" id="marital-status">
                            <option value="married">Married</option>
                            <option value="unmarried">Unmarried</option>
                        </select>

                        <label for="">Medical details</label>
                        <input type="text">

                        <label for="">Allergies</label>
                        <input type="text">

                        <label for="">Sleeping hours per day</label>
                        <input type="number">

                        <label for="">Water consumption per day (ml)</label>
                        <input type="number">

                        <label for="">Goal</label>
                        <textarea name="goal" id="goal" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </form>

            <form action="" id="admin-form">
                <div class="diet-form-inputs-and-buttons">
                    <div class="left">

                        <label for="">Age</label>
                        <input type="number">

                        <label for="">Gender</label>
                        <select name="gender" id="gender">
                            <option value="male">Male</option>
                            <option value="Female">Female</option>
                        </select>

                        <label for="">Contact number</label>
                        <input type="number">

                        <label for="">Weight</label>
                        <input type="number">

                        <label for="">Height</label>
                        <input type="number">

                        <button>Submit</button>
                    </div>
                    <div class="right">
                        <label for="">Marital status</label>
                        <select name="marital-status" id="marital-status">
                            <option value="married">Married</option>
                            <option value="unmarried">Unmarried</option>
                        </select>

                        <label for="">Medical details</label>
                        <input type="text">

                        <label for="">Allergies</label>
                        <input type="text">

                        <label for="">Sleeping hours per day</label>
                        <input type="number">

                        <label for="">Water consumption per day (ml)</label>
                        <input type="number">
                    </div>
                </div>
            </form>
            </div>
        </div>
    </section>  
</body>
</html>