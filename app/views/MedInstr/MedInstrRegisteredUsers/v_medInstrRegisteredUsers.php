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
    <title>Meditation Instructor Registered Users</title>
</head>
<body>
    
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <div class="doctor-main-picture-container-meditationInstructorRegisteredUsers">
        <div class="tittle">
            <i class="fa-solid fa-users"></i>
            <h1>Meditation Instructor<br>Registered Users!</h1>
        </div>
    </div>

    <section class="our-services-container theme" id="our-services-container">
        <dev class="service-topic">
            <span class="line"></span>
            <h2>Registered Users</h2>
        </dev>
        <div class="card-container-forservices" id="to-be-show-more">
               
        <?php if($data['monday']->d1  > 0){?>

            <a href="<?php echo URLROOT;?>/MedInstrRegisteredUsers/mondayRegisteredUsers" class="card">
              <img src="<?php echo URLROOT;?>/img/meditationInstructorRegisteredUsers/monday.jpeg" alt="">
              <h3>Monday</h3>
            </a>


        <?php } if($data['tuesday']->d2 >0) { ?>


            <a href="<?php echo URLROOT;?>/MedInstrRegisteredUsers/tuesdayRegisteredUsers" class="card">
              <img src="<?php echo URLROOT;?>/img/meditationInstructorRegisteredUsers/tuesday.jpeg" alt="">
              <h3>Tuesday</h3>
            </a>

        <?php }if($data['wednesday']->d3 >0) { ?>

        
            <a href="<?php echo URLROOT;?>/MedInstrRegisteredUsers/wednesdayRegisteredUsers" class="card">
              <img src="<?php echo URLROOT;?>/img/meditationInstructorRegisteredUsers/wednesday.jpeg" alt="">
              <h3>Wednesday</h3>
            </a>


        <?php }if($data['thursday']->d4 >0) { ?>  

        
            <a href="<?php echo URLROOT;?>/MedInstrRegisteredUsers/thursdayRegisteredUsers" class="card">
              <img src="<?php echo URLROOT;?>/img/meditationInstructorRegisteredUsers/thursday.jpeg" alt="">
              <h3>Thursday</h3>
            </a>

        <?php }if($data['friday']->d5 >0) { ?>


            <a href="<?php echo URLROOT;?>/MedInstrRegisteredUsers/fridayRegisteredUsers" class="card">
              <img src="<?php echo URLROOT;?>/img/meditationInstructorRegisteredUsers/friday.jpeg" alt="">
              <h3>Friday</h3>
            </a>


        <?php }if($data['saturday']->d6 >0) { ?>


            <a href="<?php echo URLROOT;?>/MedInstrRegisteredUsers/saturdayRegisteredUsers" class="card">
                <img src="<?php echo URLROOT;?>/img/meditationInstructorRegisteredUsers/saturday.jpeg" alt="">
                <h3>Saturday</h3>
            </a>

        
        <?php }if($data['sunday']->d7 >0) { ?>



            <a href="<?php echo URLROOT;?>/MedInstrRegisteredUsers/sundayRegisteredUsers" class="card">
                <img src="<?php echo URLROOT;?>/img/meditationInstructorRegisteredUsers/sunday.jpeg" alt="">
                <h3>Sunday</h3>
            </a>


        <?php } if(($data['monday']->d1==0) &&($data['tuesday']->d2==0) &&($data['wednesday']->d3==0) &&($data['thursday']->d4==0) &&($data['friday']->d5==0) &&($data['saturday']->d6==0) &&($data['sunday']->d7==0)){ ?>
            <h1>No registered users yet</h1>
        <?php }?>
            
        </div>
        <button id="show-button" class="show-button" onclick="showMore()"><span id="show-text">Show More</span><i class="fa-solid fa-angle-down" id="icon-more-orless"></i></button>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>