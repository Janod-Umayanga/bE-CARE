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
    <title>Patient Details</title>
</head>
<body>
    <section class="login-section">
        <div class="login-page-leftside">
            <div class="left-side-container">
                <a href="<?php echo URLROOT ?>/Pages/index" class="page-change-button"><i class="fa-solid fa-arrow-left"></i>Back to Homepage</a>
                <div>
                    <h1><i class="fa-solid fa-pills"></i> Be-Care</h1>
                    <h2>Change your account details</h2>
                    <p>Fill the relevant fields you need to change. If you need to change the password, click the provided link for that.</p>
                </div>
            </div>
        </div>
        <div class="login-page-rightside">
            <form action="" method="POST">
                <div class="topic-of-form">
                    <h1>Your Details</h1>
                    <p>Change Password<a href="<?php echo URLROOT ?>/Patient/changePW"> Here</a></p>
                </div>

                <div class="diet-form-inputs-and-buttons">
                    <div class="left">
                        <label for="fname">First name</label>
                        <input type="text" id="fname" name="fname" value="<?php echo $data['fname'] ?>">
                        <span class="form-invalid"><?php echo $data['fname_err'] ?></span>

                        <label for="lname">Last name</label>
                        <input type="text" id="lname" name="lname" value="<?php echo $data['lname'] ?>">
                        <span class="form-invalid"><?php echo $data['lname_err'] ?></span>

                        <label for="nic">NIC</label>
                        <input type="text" id="nic" name="nic" value="<?php echo $data['nic'] ?>">
                        <span class="form-invalid"><?php echo $data['nic_err'] ?></span>

                        <label for="cnumber">Contact number</label>
                        <input type="text" id="cnumber" name="cnumber" value="<?php echo $data['cnumber'] ?>">
                        <span class="form-invalid"><?php echo $data['cnumber_err'] ?></span>

                        <button>Update</button>
                    </div>
                    <div class="right">
                        <label for="gender">Title</label>
                            <select name="gender" id="gender"  value="<?php echo $data['gender'] ?>">
                                <option value="">Title</option>
                                <option value="Mr">Mr</option>
                                <option value="Ms">Ms</option>
                            </select>
                        <span class="form-invalid"><?php echo $data['gender_err'] ?></span>

                        <label for="email">Email</label>
                        <p><?php echo $data['email'] ?></p>
                    </div>
                </div>
            </form>
        </div>
    </section>  
</body>
</html>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <title>Patient-Details</title>
</head>
<body>

<?php require APPROOT.'/views/inc/components/header.php'; ?>

    <section class="signup">

        <div class="content">
                <h1>Your Details</h1>
                <h3>Registered on <?php echo $data['rdate'] ?></h3>
                <form action="<?php echo URLROOT ?>/Patient/details" method="post">
                    <div>
                        <label for="fname">First name</label>
                        <input type="text" id="fname" name="fname" value="<?php echo $data['fname'] ?>">
                        <span class="form-invalid"><?php echo $data['fname_err'] ?></span>

                        <label for="lname">Last name</label>
                        <input type="text" id="lname" name="lname" value="<?php echo $data['lname'] ?>">
                        <span class="form-invalid"><?php echo $data['lname_err'] ?></span>

                        <label for="nic">NIC</label>
                        <input type="text" id="nic" name="nic" value="<?php echo $data['nic'] ?>">
                        <span class="form-invalid"><?php echo $data['nic_err'] ?></span>

                        <label for="cnumber">Contact number</label>
                        <input type="text" id="cnumber" name="cnumber" value="<?php echo $data['cnumber'] ?>">
                        <span class="form-invalid"><?php echo $data['cnumber_err'] ?></span>
                    </div>
                    <div>
                        <label for="gender">Gender</label>
                        <input type="text" id="gender" name="gender" value="<?php echo $data['gender'] ?>">
                        <span class="form-invalid"><?php echo $data['gender_err'] ?></span>

                        <label for="email">Email</label>
                        <p><?php echo $data['email'] ?></p>

                        <button>Update</button>
                    </div>
                </form>
        </div>
    </section>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>

</body>
</html> -->