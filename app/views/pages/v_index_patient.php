<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <title>Patient-Home</title>
</head>
<body>

<?php require APPROOT.'/views/inc/components/header.php'; ?>

    <section class="patient-approaches">
        <div class="container">
                <a href="<?php echo URLROOT ?>/Patient/findDoctor">
                    <div>
                        <div class="image">
                            <img src="<?php echo URLROOT; ?>/img/page1-img1.jpg" alt="">
                        </div>
                        <h2>Find a Doctor</h2>
                        <p>Find a doctor from a list of available doctors from both western and Ayurvedic medicine practices.</p>
                    </div>
                </a>
                <a href="<?php echo URLROOT ?>/Patient/findCounsellor">
                    <div>
                        <div class="image">
                            <img src="<?php echo URLROOT; ?>/img/page1-img2.jpg" alt="">
                        </div>
                        <h2>Find a Counsellor</h2>
                        <p>Find a counsellor to keep you mentally healthy.</p>
                    </div>
                </a>
                <a href="<?php echo URLROOT ?>/Patient/findPharmacy">
                    <div>
                        <div class="image">
                            <img src="<?php echo URLROOT; ?>/img/page1-img3.png" alt="">
                        </div>
                        <h2>Find a Pharmacy</h2>
                        <p>Find a pharmacy as you prefer and place your medicine order according to your prescription.</p>
                    </div>
                </a>
                <a href="<?php echo URLROOT ?>/Patient/findNutritionist">
                    <div>
                        <div class="image">
                            <img src="<?php echo URLROOT; ?>/img/page1-img4.jpg" alt="">
                        </div>
                        <h2>Find a Nutritionist</h2>
                        <p>Find a nutritionist and get a diet plan for your prefered lifestyle.</p>
                    </div>
                </a>
                <a href="#">
                    <div>
                        <div class="image">
                            <img src="<?php echo URLROOT; ?>/img/page1-img5.jpg" alt="">
                        </div>
                        <h2>Find a Meditation Instructor</h2>
                        <p>Find a meditation instructor and keep up your wellbeing spiritually healthy.</p>
                    </div>
                </a>
                <a href="#">
                    <div>
                        <div class="image">
                            <img src="<?php echo URLROOT; ?>/img/page1-img7.jpg" alt="">
                        </div>
                        <h2>Register for a Session</h2>
                        <p>Register for a session conducted by a counsellor, nutritionist or a medidation instructor.</p>
                    </div>
                </a>
                <a href="<?php echo URLROOT ?>/Patient/viewDoctorAppointments">
                    <div>
                        <div class="image">
                            <img src="<?php echo URLROOT; ?>/img/page1-img9.jpg" alt="">
                        </div>
                        <h2>Your Doctor Appointments</h2>
                        <p>View your doctor appointments here.</p>
                    </div>
                </a>
                <a href="<?php echo URLROOT ?>/Patient/viewOrderRequests">
                    <div>
                        <div class="image">
                            <img src="<?php echo URLROOT; ?>/img/page1-img8.jpg" alt="">
                        </div>
                        <h2>Your Orders</h2>
                        <p>View your medicine orders and check their status.</p>
                    </div>
                </a>
        </div>   
    </section>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>

</body>
</html>