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
    <title>View Registered User Details</title>
</head>
<body>
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <section class="view-profile-container-nutritionistSession theme">
        <div class="card">
            <div class="main-image">
                <a href="<?php echo URLROOT ?>/Nutritionist/nutritionistViewRequests/" class="backto-doctors"><i class="fa-solid fa-arrow-left"></i>Back to Diet Plans List</a> 
            </div>
            <div class="bottom">
                <ul>
                    <li>Name - <?php echo $data['more']->name ?></li>
                    <li>Age - <?php echo $data['more']->age ?></li>
                    <li>Gender - <?php echo $data['more']->gender ?></li>
                    <li>Contact Number - <?php echo $data['more']->contact_number ?></li>
                    <li>Weight - <?php echo $data['more']->weight?></li>   
                    <li>Height - <?php echo $data['more']->height ?></li>
                    <li>Marital Status - <?php echo $data['more']->marital_status ?></li>
                    <li>Medical Details - <?php echo $data['more']->medical_details ?></li>
                    <li>Allergies - <?php echo $data['more']->allergies ?></li>
                    <li>Sleeping hours - <?php echo $data['more']->sleeping_hours?></li>
                    <li>Water Consumption(per day) - <?php echo $data['more']->water_consumption_per_day ?></li>
                    <li>Goals - <?php echo $data['more']->goal ?></li>
                </ul>
                <div class="bottom-line"></div>
            </div>
        </div>  
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>