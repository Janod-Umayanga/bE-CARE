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
    <title>User Mangement</title>
</head>
<body>
    
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <div class="doctor-main-picture-container">
        <div class="tittle">
            <i class="fa-solid fa-stethoscope"></i>
            <h1>User<br>Management!</h1>
        </div>
    </div>

    <section class="our-services-container theme" id="our-services-container">
        <dev class="service-topic">
            <span class="line"></span>
            <h2>Users</h2>
        </dev>
        <div class="card-container-forservices" id="to-be-show-more">
             <a href="<?php echo URLROOT;?>/AdminUserMgmt/Patient" class="card">
                <img src="<?php echo URLROOT;?>/img/reqserviceProvImgs/d1.jpg" alt="">
                <h2>Patient - <?php echo $data["patient"]->patient_count ?> </h2>
                <p><b style="color:green">Active <?php echo $data["patient_active"]->patient_active_count ?> | </b>
                <b style="color: red;">Deactive <?php echo $data["patient_deactive"]->patient_deactive_count ?></b></p><br>
                
            </a>
            
            <a href="<?php echo URLROOT;?>/AdminUserMgmt/Doctor" class="card">
                <img src="<?php echo URLROOT;?>/img/reqserviceProvImgs/d1.jpg" alt="">
                <p><b><?php echo$data["doctor"]->doctor_count ?></b><br>Doctor</p>
            </a>
            
            <a href="<?php echo URLROOT;?>/AdminUserMgmt/Counsellor" class="card">
                <img src="<?php echo URLROOT;?>/img/reqserviceProvImgs/d1.jpg" alt="">
                <p><b><?php echo $data["counsellor"]->counsellor_count ?></b><br>Counsellor</p>
            </a>
            
            <a href="<?php echo URLROOT;?>/AdminUserMgmt/admin" class="card">
                <img src="<?php echo URLROOT;?>/img/reqserviceProvImgs/d1.jpg" alt="">
                <p><b><?php echo $data["admin"]->admin_count ?></b><br>Admin</p>
            </a>
            
            <a href="<?php echo URLROOT;?>/AdminUserMgmt/meditationInstructor" class="card">
                <img src="<?php echo URLROOT;?>/img/reqserviceProvImgs/d1.jpg" alt="">
                <p><b><?php echo $data["meditationInstr"]->meditation_instructor_count ?></b><br>Meditation Instructor</p>
            </a>
            
            <a href="<?php echo URLROOT;?>/AdminUserMgmt/pharmacist" class="card">
                <img src="<?php echo URLROOT;?>/img/reqserviceProvImgs/d1.jpg" alt="">
                <p><b><?php echo $data["pharmacist"]->pharmacist_count?></b><br>Pharmacist</p>
            </a>
            
            <a href="<?php echo URLROOT;?>/AdminUserMgmt/nutritionist" class="card">
                <img src="<?php echo URLROOT;?>/img/reqserviceProvImgs/d1.jpg" alt="">
                <p><b><?php echo $data["nutritionist"]->nutritionist_count ?></b><br>Nutritionist</p>
            </a>
            
        </div>
        <button id="show-button" class="show-button" onclick="showMore()"><span id="show-text">Show More</span><i class="fa-solid fa-angle-down" id="icon-more-orless"></i></button>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>