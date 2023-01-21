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
    <title>Meditation Instructor Session</title>
</head>
<body>
    
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <div class="doctor-main-picture-container">
        <div class="tittle">
            <i class="fa-solid fa-stethoscope"></i>
            <h1>Meditation Instructor<br>Session!</h1>
        </div>
    </div>

    <section class="doctor-cards-container theme">
        <div class="doctor-cards-topic">
            <span class="line"></span>
            <h2>Sessions</h2>
        </div>
        <div class="card-content-fordoctors" id="to-be-show-more">
            <div class="card-page">
                

              <div class="card theme theme">
                    <div class="left theme">
                        <p>No Of</p>
                        <h2>Completed Sessions</h2>
                       
                    </div>
                    <div class="right"><br><br>
                        <h2> <b><?php echo $data["noOfoldSession"]->oldSession_count ?></b></h2>
                          <button class="channel-butten"><a href="<?php echo URLROOT;?>/MedInstrSession/medInstrOldSession">View </a></button>
                    </div>
                </div>


               <div class="card theme theme">
                    <div class="left theme">
                        <p>No Of </p>
                        <h2> Sessions To be Done </h2>
                       
                    </div>
                    <div class="right"><br><br>
                        <h2> <b><?php echo $data["noOfnewSession"]->newSession_count ?></b></h2>
                          <button class="channel-butten"><a href="<?php echo URLROOT;?>/MedInstrSession/medInstrNewSession">View </a></button>
                    </div>
                </div>

              
             
            </div>
        </div>
        <button id="show-button" class="show-button" onclick="showMore()"><span id="show-text">Show More</span><i class="fa-solid fa-angle-down" id="icon-more-orless"></i></button>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>