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
    <title>View Doctor Channel </title>
</head>
<body>
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <section class="view-profile-container-userMgmt theme">
        <div class="card">
            
            <div class="main-image">
                <a href="<?php echo URLROOT ?>/AdminPayments/doctorChannelPayments" class="backto-doctors"><i class="fa-solid fa-arrow-left"></i>Back to Doctor Channel Payments</a>
                <h1>Dr. <?php echo $data['docChannel']->first_name ?> <br> <?php echo $data['docChannel']->last_name ?></h1>
                
            </div>

            <div class="bottom">
                <ul>
                    <li>Total Fee - <?php echo $data['docChannel']->paid_amount ?></a></li>
                    <li>Doctor Fee - <?php echo ($data['docChannel']->paid_amount/110)*100 ?></li>
                    <li>Profit - <?php echo ($data['docChannel']->paid_amount/110)*10 ?></li>
                   

                    <li>Payment Date & Time - <?php echo $data['docChannel']->paid_time ?></li>
                   
                    <li>Doctor Email - <a href="mailto:<?php echo $data['docChannel']->email ?>"><?php echo $data['docChannel']->email ?></a></li>
                    <li>Doctor Contact number - <?php echo $data['docChannel']->contact_number ?></li>
                   
                    <li>Patient Name -<?php echo $data['docChannel']->name ?></a></li>
                    <li>Patient Contact Number - <?php echo $data['docChannel']->contact_number ?></li>
                    

                 
                </ul>
                <div class="bottom-line"></div>
            </div>
        </div>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>