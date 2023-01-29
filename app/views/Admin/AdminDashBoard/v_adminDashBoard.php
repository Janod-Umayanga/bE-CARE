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
    <title>BeCare</title>
</head>
<body>
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <section class="main-content-container">
        <div class="main-content">
            <p>From UCSC batch 19/20 CS Group 11</p>
            <h1>Local Healthcare <br> Platform</h1>
            <div class="main-two-buttons-container">
                <a href="#our-services-container" class="main-button">DashBoard</a>
                <a class="main-button">About</a>
            </div>
        </div>
    </section>

    <section class="our-services-container theme" id="our-services-container">
        <dev class="service-topic">
            <span class="line"></span>
            <h2>Admin</h2>
        </dev>
        <div class="card-container-forservices" id="to-be-show-more">
             <a href="<?php echo URLROOT;?>/AdminReqSerProviders/adminReqSerProviders" class="card">
                <img src="<?php echo URLROOT;?>/img/adminDashBoard/reqServiceProviders.jpg" alt="">
                <p>******<br>Requested Service Providers</p>
            </a>
            <a href="<?php echo URLROOT;?>/AdminComplaintMgmt/adminComplaintMgmt" class="card">
                <img src="<?php echo URLROOT;?>/img/adminDashBoard/complaintManagement.jpg" alt="">
                <p>******<br>Complaint Management</p>
            </a>
            <a href="<?php echo URLROOT;?>/AdminUserMgmt/adminUserMgmt" class="card">
                <img src="<?php echo URLROOT;?>/img/adminDashBoard/userManagement.jpg" alt="">
                <p>******<br>User Management</p>
            </a>
            <a href="<?php echo URLROOT;?>/AdminPayments/adminPayments" class="card">
                <img src="<?php echo URLROOT;?>/img/adminDashBoard/payments.jpg" alt="">
                <p>******<br>Payments</p>
            </a>
        
        </div>
        <button id="show-button" class="show-button" onclick="showMore()"><span id="show-text">Show More</span><i class="fa-solid fa-angle-down" id="icon-more-orless"></i></button>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>