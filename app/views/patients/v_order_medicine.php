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
    <title>Order Medicine</title>
</head>
<body>
    <section class="login-section">
        <div class="login-page-leftside">
            <div class="left-side-container">
                <a href="<?php echo URLROOT ?>/Patient/findPharmacy" class="page-change-button"><i class="fa-solid fa-arrow-left"></i>Back to Find a Pharmacy</a>
                <div>
                    <h1><i class="fa-solid fa-pills"></i> Be-Care</h1>
                    <h2>Enter your login details to get into the application</h2>
                    <p>Login to the application to experience the healthcare services we are providing. If you haven't registered with the application yet, click the <b>sign up</b> button and create an account for free.</p>
                </div>
            </div>
        </div>
        <div class="login-page-rightside">
            <form action="<?php echo URLROOT ?>/Patient/orderMedicine/<?php echo $data['pharmacist_id'] ?>" method="POST" enctype="multipart/form-data">
                <div class="topic-of-form">
                    <h1>Order Medicine</h1>
                </div>

                <div class="form-inputs-and-buttons">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="<?php echo $data['name'] ?>">
                        <span class="form-invalid"><?php echo $data['name_err'] ?></span>

                        <label for="address">Delivery Address</label>
                        <input type="text" id="address" name="address" value="<?php echo $data['address'] ?>">
                        <span class="form-invalid"><?php echo $data['address_err'] ?></span>

                        <label for="cnumber">Contact number</label>
                        <input type="text" id="cnumber" name="cnumber" value="<?php echo $data['cnumber'] ?>">
                        <span class="form-invalid"><?php echo $data['cnumber_err'] ?></span>

                        <label for="prescription">Upload Prescription</label>
                        <input type="file" id="prescription" name="prescription" value="<?php echo $data['prescription'] ?>">
                        <span class="form-invalid"><?php echo $data['prescription_err'] ?></span>
                    <button>Submit</button>
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c4a594ff55.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f1513ae29e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style2.css">
    <title>Order Medicine</title>
</head>
<body>
    <section class="diet-plan-section">
        <div class="diet-plan-leftside">
            <div class="diet-left-side-container">
                <a href="<?php echo URLROOT ?>/Patient/findPharmacy" class="page-change-button-from-diet"><i class="fa-solid fa-arrow-left"></i>Back to Find a Pharmacy</a>
                <div>
                    <h1><i class="fa-solid fa-pills"></i> Be-Care</h1>
                    <h2>Fill these details to request the diet plan</h2>
                    <p>Login to the application to experience the healthcare services we are providing. If you haven't registered with the application yet, click the <b>sign up</b> button and create an account for free.</p>
                </div>
            </div>
        </div>
        <div class="diet-plan-rightside">
            <form action="<?php echo URLROOT ?>/Patient/orderMedicine/<?php echo $data['pharmacist_id'] ?>" method="POST" enctype="multipart/form-data">
                <div class="topic-of-form">
                    <h1>Order Medicine</h1>
                </div>
                <div class="diet-form-inputs-and-buttons">
                    <div class="left">
                    <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="<?php echo $data['name'] ?>">
                        <span class="form-invalid"><?php echo $data['name_err'] ?></span>

                        <label for="address">Delivery Address</label>
                        <input type="text" id="address" name="address" value="<?php echo $data['address'] ?>">
                        <span class="form-invalid"><?php echo $data['address_err'] ?></span>

                        <button>Submit</button>
                    </div>
                    <div class="right">
                    <label for="cnumber">Contact number</label>
                        <input type="text" id="cnumber" name="cnumber" value="<?php echo $data['cnumber'] ?>">
                        <span class="form-invalid"><?php echo $data['cnumber_err'] ?></span>

                        <label for="prescription">Upload Prescription</label>
                        <input type="file" id="prescription" name="prescription" value="<?php echo $data['prescription'] ?>">
                        <span class="form-invalid"><?php echo $data['prescription_err'] ?></span>
                    </div>
                </div>
            </form>
        </div>
    </section>  
</body>
</html> -->

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <title>Patient-Order-Medicine-Form</title>
</head>
<body>

<?php require APPROOT.'/views/inc/components/header.php'; ?>

    <section class="signup">
        <div class="content">
                <h1>Order Medicine</h1>
                <form action="<?php echo URLROOT ?>/Patient/orderMedicine/<?php echo $data['pharmacist_id'] ?>" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="<?php echo $data['name'] ?>">
                        <span class="form-invalid"><?php echo $data['name_err'] ?></span>

                        <label for="address">Delivery Address</label>
                        <input type="text" id="address" name="address" value="<?php echo $data['address'] ?>">
                        <span class="form-invalid"><?php echo $data['address_err'] ?></span>
                    </div>
                    <div>
                        <label for="cnumber">Contact number</label>
                        <input type="text" id="cnumber" name="cnumber" value="<?php echo $data['cnumber'] ?>">
                        <span class="form-invalid"><?php echo $data['cnumber_err'] ?></span>

                        <label for="prescription">Upload Prescription</label>
                        <input type="file" id="prescription" name="prescription" value="<?php echo $data['prescription'] ?>">
                        <span class="form-invalid"><?php echo $data['prescription_err'] ?></span>

                        <button>Submit</button>
                    </div>     
                </form>
        </div>
    </section>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>

</body>
</html> -->