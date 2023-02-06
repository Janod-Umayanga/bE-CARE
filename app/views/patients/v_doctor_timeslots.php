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
            <h1>Find the best time<br>you need!</h1>
        </div>
    </div>

    <section class="pharmacy-card-container theme">
        <div class="pharmacy-cards-topic">
            <span class="line"></span>
            <h2>Doctor's Available Timeslots</h2>
        </div>
        <div class="time-slot-main-container" id="to-be-show-more">
            <div class="time-slot-sub">
                <?php foreach($data['timeslots'] as $timeslot): ?>
                <div class="card">
                    <div class="top">
                        <h1><?php  echo $timeslot->channeling_day ?></h1>
                        <p>Dr. <?php  echo $timeslot->first_name ?> <?php  echo $timeslot->last_name ?></p>
                    </div>
                    <div class="bottom">
                        <p><i class="fa-solid fa-calendar-days"></i> <?php echo $timeslot->day ?></p>
                        <p><i class="fa-solid fa-clock"></i> <?php echo $timeslot->starting_time ?> - <?php  echo $timeslot->ending_time ?></p>
                        <p><i class="fa-solid fa-location-dot"></i><?php echo $timeslot->address ?></p>
                        <p><i class="fa-solid fa-phone-volume"></i><?php echo $timeslot->contact_number ?></p>
                        <p><i class="fa-solid fa-circle-dollar-to-slot"></i>Rs. <?php echo $timeslot->fee ?></p>
                    </div>
                    <div class="top-box"></div>
                    <div class="bottom-box"></div>
                    <form action="<?php echo URLROOT ?>/Patient/channelDoctor/<?php echo $timeslot->doctor_id ?>/<?php echo $timeslot->doctor_channel_day_id ?>/<?php echo $timeslot->day ?>/<?php echo $timeslot->current_channel_time ?>/<?php echo $timeslot->fee ?>">
                        <button class="main-button">Channel</button>
                    </form>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <button id="show-button" class="show-button" onclick="showMore()"><span id="show-text">Show More</span><i class="fa-solid fa-angle-down" id="icon-more-orless"></i></button>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>