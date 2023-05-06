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
    <title>View Requested Pharmacist </title>
</head>
<body>
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <section class="view-profile-container-requestedSP  theme">
        <div class="card">
            
            <div class="main-image">
                <a href="<?php echo URLROOT ?>/AdminReqSerProviders/adminReqPharmacist" class="backto-doctors"><i class="fa-solid fa-arrow-left"></i>Back to Requested Pharmacist</a>
                <h1><?php echo $data['pharmacist']->first_name ?> <br> <?php echo $data['pharmacist']->last_name ?></h1>
                <div class="profile-icon"><?php echo substr($data['pharmacist']->first_name, 0,1) ?><?php echo substr($data['pharmacist']->last_name, 0,1) ?></div>
                <div class="social-media-icons">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-linkedin"></i>
                    <i class="fa-brands fa-twitter"></i>
                </div>
            </div>

            <div class="bottom">
                <ul>
                   
                    <li>Pharmacy Name - <?php echo $data['pharmacist']->pharmacy_name ?></li>
                    <li>Email - <a href="mailto:<?php echo $data['pharmacist']->email ?>"><?php echo $data['pharmacist']->email ?></a></li>
                    <li>Contact number - <?php echo $data['pharmacist']->contact_number ?></li>
                    <li>Registered date - <?php echo $data['pharmacist']->registered_date ?></li>
                    <li>SLMC number - <?php echo $data['pharmacist']->slmc_reg_number ?></li>
                   
                    <li>NIC - <?php echo $data['pharmacist']->nic ?></li>
                    <li>Title - <?php echo $data['pharmacist']->gender ?></li>
                    <li>City - <?php echo $data['pharmacist']->city ?></li>
                   
                    <li>Bank Name - <?php echo $data['pharmacist']->bank_name ?></li>
                    <li>Account holder Name - <?php echo $data['pharmacist']->account_holder_name ?></li>
                    <li>Branch - <?php echo $data['pharmacist']->branch ?></li>
                   
                    <li>Account Number - <?php echo $data['pharmacist']->account_number ?></li>
                     <li>Qualification File -   <button class="download"><a download="<?php echo $data['pharmacist']->qualification_file ?>"  href="<?php echo URLROOT?>/upload/pharmacist_qualification/<?php echo  $data['pharmacist']->qualification_file ?>">Download</a></button>
               </li>
                   
                </ul>
                <div class="bottom-line"></div>
            </div>
        </div>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>