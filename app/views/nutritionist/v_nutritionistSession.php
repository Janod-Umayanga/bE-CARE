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
    <title>Nutritionist Session</title>
</head>
<body>
    
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <div class="doctor-main-picture-container-nutritionistSession">
        <div class="tittle">
            <i class="fa-solid fa-microphone"></i>
            <h1>Nutritionist Session</h1>
        </div>
    </div>

    <section class="our-services-container-complaint theme" id="our-services-container">
        <div class="service-topic">
            <span class="line"></span>
            <h2>Sessions</h2>
        </div>

        <div class="card-container-forservices" id="to-be-show-more">
             
            
            <a href="<?php echo URLROOT;?>/NutritionistSession/nutritionistOldSession" class="card">
                <img src="<?php echo URLROOT;?>/img/nutritionis-page-pictures/n-completed.jpg" alt="">
                <h3>Completed Sessions - <?php echo  $data["noOfoldNutritionistSession"]->oldSession_count ?> </h3>
            </a>
            
            <a href="<?php echo URLROOT;?>/NutritionistSession/nutritionistNewSession" class="card">
                <img src="<?php echo URLROOT;?>/img/nutritionist-page-pictures/n-upcoming.jpg" alt="">
                <h3> Upcomming Sessions - <?php echo$data["noOfnewNutritionistSession"]->newSession_count ?> </h3>     
            </a>
            
            
        </div>
        <button id="show-button" class="show-button" onclick="showMore()"><span id="show-text">Show More</span><i class="fa-solid fa-angle-down" id="icon-more-orless"></i></button>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>