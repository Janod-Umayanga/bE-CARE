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
    <title>View Completed Session Details</title>
</head>
<body>
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <section class="view-profile-container-nutritionistSession theme">
        <div class="card">
            <div class="main-image">
                <a href="<?php echo URLROOT ?>/NutritionistSession/nutritionistOldSession" class="backto-doctors"><i class="fa-solid fa-arrow-left"></i>Back to Completed Sessions</a>
                <h1> <?php echo $data['nutritionistOldSession']->title ?> <br> <?php echo $data['nutritionistOldSession']->date ?></h1>
             
            </div>
            <div class="bottom">
                <ul>
                    <li>Starting Time - <?php echo $data['nutritionistOldSession']->starting_time ?></li>
                    <li>Ending Time - <?php echo $data['nutritionistOldSession']->ending_time ?></li>
                    <li>Fee - <?php echo $data['nutritionistOldSession']->registration_fee ?></li>
                    <li>Address - <?php echo $data['nutritionistOldSession']->address ?></li>
                    <li>Maximum No of Participants - <?php echo $data['nutritionistOldSession']->noOfParticipants ?></li>
                    <li><?php echo $data['nutritionistOldSession']->description ?></li>
                   
                </ul>
                <div class="bottom-line"></div>
            </div>
        </div>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>