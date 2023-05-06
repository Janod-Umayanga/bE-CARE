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
    <script defer src="<?php echo URLROOT; ?>/js/pushNotification.js"></script>
    <title>BeCare</title>
</head>
<body>
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <div id="notification-container"></div>
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
        <div class="service-topic">
            <span class="line"></span>
            <h2>Our Services</h2>
        </div>
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
            <a href="<?php echo URLROOT ?>/Patient/findMeditationInstructor" class="card">
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
            <a href="<?php echo URLROOT ?>/Patient/viewCounsellorAppointments" class="card">
                <img src="<?php echo URLROOT; ?>/img/sevices-images/counsellor appointments.jpg" alt="">
                <p>******<br>Your Counsellor Appointments</p>
            </a>
            <a href="<?php echo URLROOT ?>/Patient/viewCounsellorChannelingHistory" class="card">
                <img src="<?php echo URLROOT; ?>/img/sevices-images/counsellor history.jpg" alt="">
                <p>******<br>Your Counsellor Channeling History</p>
            </a>
            <a href="<?php echo URLROOT ?>/Patient/viewDietPlans" class="card">
                <img src="<?php echo URLROOT; ?>/img/sevices-images/diet plans.jpg" alt="">
                <p>******<br>Your Diet Plans</p>
            </a>
            <a href="<?php echo URLROOT ?>/Patient/viewMeditationInstructorAppointments" class="card">
                <img src="<?php echo URLROOT; ?>/img/sevices-images/meditation instructor appointments.jpg" alt="">
                <p>******<br>Your Meditation Instructor Appointments</p>
            </a>
            <a href="<?php echo URLROOT ?>/Patient/viewMeditationInstructorHistory" class="card">
                <img src="<?php echo URLROOT; ?>/img/sevices-images/Meditating history.jpg" alt="">
                <p>******<br>Your Meditation Instructing History</p>
            </a>
            <a href="<?php echo URLROOT ?>/Patient/viewRegisteredSessions" class="card">
                <img src="<?php echo URLROOT; ?>/img/sevices-images/registered sessions.jpg" alt="">
                <p>******<br>Your Registered Sessions</p>
            </a>
        </div>
        <button id="show-button" class="show-button" onclick="showMore()"><span id="show-text">Show More</span><i class="fa-solid fa-angle-down" id="icon-more-orless"></i></button>
    </section>

    <!-- For push notifications -->
    <span id="isPatientLoggedIn"><?php if(isset($_SESSION['first_time_logged'])){echo $_SESSION['first_time_logged']; unset($_SESSION['first_time_logged']);}?></span>
    <span id="isOrderSent"><?php if(isset($_SESSION['order_sent'])){echo $_SESSION['order_sent']; unset($_SESSION['order_sent']);}?></span>
    <span id="isPaidForOrder"><?php if(isset($_SESSION['paid_for_order'])){echo $_SESSION['paid_for_order']; unset($_SESSION['paid_for_order']);}?></span>
    <span id="isChannelCreated"><?php if(isset($_SESSION['channel_created'])){echo $_SESSION['channel_created']; unset($_SESSION['channel_created']);}?></span>
    <span id="isLoggedOut"><?php if(isset($_SESSION['logout'])){echo $_SESSION['logout']; unset($_SESSION['logout']);}?></span>
    <span id="isDetailsUpdated"><?php if(isset($_SESSION['details_updated'])){echo $_SESSION['details_updated']; unset($_SESSION['details_updated']);}?></span>
    <span id="isPasswordUpdated"><?php if(isset($_SESSION['pw_updated'])){echo $_SESSION['pw_updated']; unset($_SESSION['pw_updated']);}?></span>
    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>