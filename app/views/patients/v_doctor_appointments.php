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
    <title>Document</title>
</head>
<body>
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <div class="time-slot-main-picture-container">
        <div class="tittle">
            <i class="fa-solid fa-stopwatch"></i>
            <h1>Keep in touch with Your<br>Appointments!</h1>
        </div>
    </div>

    <section class="pharmacy-card-container theme">
        <div class="pharmacy-cards-topic">
            <span class="line"></span>
            <h2>Appointments</h2>
        </div>
        <div class="time-slot-main-container" id="to-be-show-more">
            <div class="time-slot-sub">
            <?php foreach($data['appointments'] as $appointment): ?>
                <?php if($appointment->date > $data['currentDate'] || ($appointment->date == $data['currentDate'] && $appointment->time >= $data['currentTime'])): ?>
                    <div class="card">
                        <div class="top">
                            <h1>Dr. <?php echo $appointment->first_name ?> <?php echo $appointment->last_name ?></h1>
                            <p><?php  echo $appointment->address ?></p>
                        </div>
                        <div class="bottom">
                            <p><i class="fa-solid fa-calendar-days"></i> <?php  echo $appointment->date ?></p>
                            <p><i class="fa-solid fa-clock"></i> <?php  echo $appointment->time ?></p>
                        </div>
                        <div class="top-box"></div>
                        <div class="bottom-box"></div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
            </div>
        </div>
        <button id="show-button" class="show-button" onclick="showMore()"><span id="show-text">Show More</span><i class="fa-solid fa-angle-down" id="icon-more-orless"></i></button>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <title>View Doctor Appointments</title>
</head>
<body>

<?php require APPROOT.'/views/inc/components/header.php'; ?>

    <section class="doctor-cards">
        <div class="left">
        <h1>Doctor Appointments</h1>
            <?php foreach($data['appointments'] as $appointment): ?>
                <?php if($appointment->date > $data['currentDate'] || ($appointment->date == $data['currentDate'] && $appointment->time >= $data['currentTime'])): ?>
                <div class="card">
                    <div class="card-left">
                        <p>Appontment On<br><?php echo $appointment->date ?></p><br>
                    </div>
                    <div class="card-right">
                        <div>
                            <h3>For Dr. <?php echo $appointment->first_name ?> <?php echo $appointment->last_name ?></h3>
                            <p>Address : <?php  echo $appointment->address ?></p>
                            <p>Appointment time:<br><?php echo $appointment->time ?></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <div class="right">
            <img src="../public/img/doctor-cards.png" alt="">
        </div>
    </section>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>

</body>
</html> -->