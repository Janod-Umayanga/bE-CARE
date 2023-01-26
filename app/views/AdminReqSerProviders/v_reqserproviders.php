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
    <title>Requested Service Providers</title>
</head>
<body>
    
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <div class="doctor-main-picture-container">
        <div class="tittle">
            <i class="fa-solid fa-users"></i>
            <h1>Requested<br>Service Providers!</h1>
        </div>
    </div>

    <section class="our-services-container theme" id="our-services-container">
        <dev class="service-topic">
            <span class="line"></span>
            <h2>Requested Service Providers</h2>
        </dev>
        <div class="card-container-forservices" id="to-be-show-more">
            
            
            <a href="<?php echo URLROOT;?>/AdminReqSerProviders/adminReqDoctor" class="card">
                <img src="<?php echo URLROOT;?>/img/adminRequestedServiceProviders/doctor.jpg" alt="">
                <p><b><?php echo $data["doctor"]->doctor_count ?></b><br>Doctor</p>
            </a>
            
            <a href="<?php echo URLROOT;?>/AdminReqSerProviders/adminReqCounsellor" class="card">
                <img src="<?php echo URLROOT;?>/img/adminRequestedServiceProviders/counsellor.jpg" alt="">
                <p><b><?php echo $data["counsellor"]->counsellor_count ?></b><br>Counsellor</p>
            </a>
            
            
            <a href="<?php echo URLROOT;?>/AdminReqSerProviders/adminReqMeditationInstructor" class="card">
                <img src="<?php echo URLROOT;?>/img/adminRequestedServiceProviders/meditationInstructor.jpg" alt="">
                <p><b><?php echo $data["meditationInstr"]->meditation_instructor_count ?></b><br>Meditation Instructor</p>
            </a>
            
            <a href="<?php echo URLROOT;?>/AdminReqSerProviders/adminReqPharmacist" class="card">
                <img src="<?php echo URLROOT;?>/img/adminRequestedServiceProviders/pharmacist.jpg" alt="">
                <p><b><?php echo $data["pharmacist"]->pharmacist_count?></b><br>Pharmacist</p>
            </a>
            
            <a href="<?php echo URLROOT;?>/AdminReqSerProviders/adminReqNutritionist" class="card">
                <img src="<?php echo URLROOT;?>/img/adminRequestedServiceProviders/nutritionist.jpg" alt="">
                <p><b><?php echo $data["nutritionist"]->nutritionist_count ?></b><br>Nutritionist</p>
            </a>
            
        </div>
        <button id="show-button" class="show-button" onclick="showMore()"><span id="show-text">Show More</span><i class="fa-solid fa-angle-down" id="icon-more-orless"></i></button>
    </section>
    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>