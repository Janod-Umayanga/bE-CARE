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
    <script defer src="<?php echo URLROOT; ?>/js/script.js"></script>
    <title>View Nutritionist </title>
</head>
<body>
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <section class="view-profile-container theme">
        <div class="card">
            
            <div class="main-image">
                <a href="<?php echo URLROOT ?>/AdminUserMgmt/Nutritionist" class="backto-doctors"><i class="fa-solid fa-arrow-left"></i>Back to Nutritionists</a>
                <h1><?php echo $data['nutritionist']->first_name ?> <br> <?php echo $data['nutritionist']->last_name ?></h1>
                <div class="profile-icon"><?php echo substr($data['nutritionist']->first_name, 0,1) ?><?php echo substr($data['nutritionist']->last_name, 0,1) ?></div>
                <div class="social-media-icons">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-linkedin"></i>
                    <i class="fa-brands fa-twitter"></i>
                </div>
            </div>

            <div class="bottom">
                <ul>
                    <li>Email - <a href="mailto:<?php echo $data['nutritionist']->email ?>"><?php echo $data['nutritionist']->email ?></a></li>
                    <li>Contact number - <?php echo $data['nutritionist']->contact_number ?></li>
                    <li>Registered date - <?php echo $data['nutritionist']->registered_date ?></li>
                    <li>SLMC number - <?php echo $data['nutritionist']->slmc_reg_number ?></li>
                   
                    <li>NIC - <?php echo $data['nutritionist']->nic ?></li>
                    <li>Gender - <?php echo $data['nutritionist']->gender ?></li>
                    <li>Fee - <?php echo $data['nutritionist']->fee ?></li>
                   
                    <li>Bank Name - <?php echo $data['nutritionist']->bank_name ?></li>
                    <li>Account holder Name - <?php echo $data['nutritionist']->account_holder_name ?></li>
                    <li>Branch - <?php echo $data['nutritionist']->branch ?></li>
                   
                    <li>Account Number - <?php echo $data['nutritionist']->account_number ?></li>
                     <li>Qualification File -   <button class=""><a download="<?php echo $data['nutritionist']->qualification_file ?>"  href="<?php echo URLROOT?>/upload/nutritionist_qualification/<?php echo  $data['nutritionist']->qualification_file ?>">Download</a></button>
               </li>
                   
                </ul>
                <div class="bottom-line"></div>
            </div>
        </div>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>