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
                <a href="#our-services-container" class="main-button">Services</a>
                <a class="main-button">About</a>
            </div>
        </div>
    </section>

    <section class="our-services-container theme" id="our-services-container">
        <dev class="service-topic">
            <span class="line"></span>
            <h2>Our Services</h2>
        </dev>
        <div class="card-container-forservices" id="to-be-show-more">
            <a href="<?php echo URLROOT ?>/Patient/findDoctor" class="card">
                <img src="<?php echo URLROOT; ?>/img/sevices-images/channel-a-doctor.jpg" alt="">
                <p>******<br>Find a Doctor</p>
            </a>
            <a href="<?php echo URLROOT ?>/Patient/findCounsellor" class="card">
                <img src="<?php echo URLROOT; ?>/img/sevices-images/find-a-counsellor.jpg" alt="">
                <p>******<br>Find a Counsellor</p>
            </a>
            <a href="<?php echo URLROOT ?>/Patient/findPharmacy" class="card">
                <img src="<?php echo URLROOT; ?>/img/sevices-images/find-a-pharmacy.jpg" alt="">
                <p>******<br>Find a Pharmacy</p>
            </a>
            <a href="<?php echo URLROOT ?>/Patient/findNutritionist" class="card">
                <img src="<?php echo URLROOT; ?>/img/sevices-images/find-a-nutritionist.jpg" alt="">
                <p>******<br>Find a Nutritionist</p>
            </a>
            <a href="<?php echo URLROOT ?>/Patient/findMedidationInstructor" class="card">
                <img src="<?php echo URLROOT; ?>/img/sevices-images/find-a-meditation-instructor.jpg" alt="">
                <p>******<br>Find a Meditation Instructor</p>
            </a>
            <a href="<?php echo URLROOT ?>/Patient/findSession" class="card">
                <img src="<?php echo URLROOT; ?>/img/sevices-images/Register for a Session.jpg" alt="">
                <p>******<br>Register for a Session</p>
            </a>
            <a href="<?php echo URLROOT ?>/Patient/viewDoctorAppointments" class="card">
                <img src="<?php echo URLROOT; ?>/img/sevices-images/Your Doctor Appointments.jpg" alt="">
                <p>******<br>Your Doctor Appointments</p>
            </a>
            <a href="<?php echo URLROOT ?>/Patient/viewDoctorChannelingHistory" class="card">
                <img src="<?php echo URLROOT; ?>/img/sevices-images/Your Doctor Channeling History.jpg" alt="">
                <p>******<br>Your Doctor Channeling History</p>
            </a>
            <a href="<?php echo URLROOT ?>/Patient/viewOrderRequests" class="card">
                <img src="<?php echo URLROOT; ?>/img/sevices-images/Your Orders.jpg" alt="">
                <p>******<br>Your Orders</p>
            </a>
        </div>
        <button id="show-button" class="show-button" onclick="showMore()"><span id="show-text">Show More</span><i class="fa-solid fa-angle-down" id="icon-more-orless"></i></button>
    </section>

    <span id="isPatientLoggedIn"><?php if(isset($_SESSION['first_time_logged'])){echo $_SESSION['first_time_logged']; unset($_SESSION['first_time_logged']);}?></span>
    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
    <script>
        let loggedInMessage = document.getElementById('isPatientLoggedIn');
        if (loggedInMessage.innerText){
            alert("Logged In");
            loggedInMessage.innerText = "";
        }
    </script>
</body>
</html>