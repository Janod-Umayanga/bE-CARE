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

    <div class="doctor-main-picture-container-userMgmt">
        <div class="tittle">
           <i class="fa-solid fa-users"></i>
           <h1>User<br>Management!</h1>
        </div>
    </div>

    <section class="our-services-container theme" id="our-services-container">
        <div class="service-topic">
            <span class="line"></span>
            <h2>Users</h2>
        </div>
        <div class="card-container-forUserMgmt" id="to-be-show-more">
            
           <a href="<?php echo URLROOT;?>/AdminUserMgmt/Patient" class="card">
                <img src="<?php echo URLROOT;?>/img/adminUserManagement/patient.jpg" alt="">
                <h3>Patient - <?php echo $data["patient"]->patient_count ?> </h3>
                <p><b style="color:green">Active <?php echo $data["patient_active"]->patient_active_count ?> | </b>
                <b style="color: red;">Deactive <?php echo $data["patient_deactive"]->patient_deactive_count ?></b></p><br>
                
            </a>
            
            <a href="<?php echo URLROOT;?>/AdminUserMgmt/Doctor" class="card">
                <img src="<?php echo URLROOT;?>/img/adminUserManagement/doctor.jpg" alt="">
                <h3>Doctor - <?php echo $data["doctor"]->doctor_count ?> </h3>
                <p><b style="color:green">Active <?php echo $data["doctor_active"]->doctor_active_count ?> | </b>
                <b style="color: red;">Deactive <?php echo $data["doctor_deactive"]->doctor_deactive_count ?></b></p><br>
         
            </a>
            
            <a href="<?php echo URLROOT;?>/AdminUserMgmt/Counsellor" class="card">
                <img src="<?php echo URLROOT;?>/img/adminUserManagement/counsellor.jpg" alt="">
                <h3>Counsellor - <?php echo $data["counsellor"]->counsellor_count ?> </h3>
                <p><b style="color:green">Active <?php echo $data["counsellor_active"]->counsellor_active_count ?> | </b>
                <b style="color: red;">Deactive <?php echo $data["counsellor_deactive"]->counsellor_deactive_count ?></b></p><br>
         
            </a>
            
            <a href="<?php echo URLROOT;?>/AdminUserMgmt/admin" class="card">
                <img src="<?php echo URLROOT;?>/img/adminUserManagement/admin.jpg" alt="">
                <h3>Admin - <?php echo $data["admin"]->admin_count ?> </h3>
                <p><b style="color:green">Active <?php echo $data["admin_active"]->admin_active_count ?> | </b>
                <b style="color: red;">Deactive <?php echo $data["admin_deactive"]->admin_deactive_count ?></b></p><br>
         
            </a>
            
            <a href="<?php echo URLROOT;?>/AdminUserMgmt/meditationInstructor" class="card">
                <img src="<?php echo URLROOT;?>/img/adminUserManagement/meditationInstructor.jpg" alt="">
                <h3>Meditation Instructor - <?php echo $data["meditationInstructor"]->meditation_instructor_count ?> </h3>
                <p><b style="color:green">Active <?php echo $data["meditationInstructor_active"]->meditationInstructor_active_count ?> | </b>
                <b style="color: red;">Deactive <?php echo $data["meditationInstructor_deactive"]->meditationInstructor_deactive_count ?></b></p><br>
         
            </a>
            
            <a href="<?php echo URLROOT;?>/AdminUserMgmt/pharmacist" class="card">
                <img src="<?php echo URLROOT;?>/img/adminUserManagement/pharmacist.jpg" alt="">
                <h3>Pharmacist - <?php echo $data["pharmacist"]->pharmacist_count ?> </h3>
                <p><b style="color:green">Active <?php echo $data["pharmacist_active"]->pharmacist_active_count ?> | </b>
                <b style="color: red;">Deactive <?php echo $data["pharmacist_deactive"]->pharmacist_deactive_count ?></b></p><br>
         
            </a>
            
            <a href="<?php echo URLROOT;?>/AdminUserMgmt/nutritionist" class="card">
                <img src="<?php echo URLROOT;?>/img/adminUserManagement/nutritionist.jpg" alt="">
                <h3>Nutritionist - <?php echo $data["nutritionist"]->nutritionist_count ?> </h3>
                <p><b style="color:green">Active <?php echo $data["nutritionist_active"]->nutritionist_active_count ?> | </b>
                <b style="color: red;">Deactive <?php echo $data["nutritionist_deactive"]->nutritionist_deactive_count ?></b></p><br>
         
            </a>
            
        </div>
        <button id="show-button" class="show-button" onclick="showMore()"><span id="show-text">Show More</span><i class="fa-solid fa-angle-down" id="icon-more-orless"></i></button>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>