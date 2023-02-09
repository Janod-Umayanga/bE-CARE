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
                    <li>Name - <?php echo #$data['plans']->request_diet_plan_id 
                    'Shashikala Wijesiri'?></li>
                    <li>Age - <?php echo #$data['plans']->name 
                    '28 years old'?></li>
                     <li>Gender - <?php echo #$data['plans']->contact_number 
                    'Female'?></li>
                     <li>Contact Number - <?php echo #$data['plans']->gender 
                     '0757523975'?></li>
                    <li>Weight - <?php echo #$data['plans']->age
                    '69 Kg'?></li>
                   
                   
                    <li>Weight - <?php echo #$data['plans']->weight 
                    'melani@gmail.com'?></li>
                    <li>Marital Status - <?php echo #$data['plans']->height 
                    'Unmarried'?></li>
                    <li>Medical Details - <?php echo #$data['plans']->martial_status 
                    'No any other diseases'?></li>
                    <li>Allergies - <?php echo #$data['plans']->medical_details 
                    'No allergies'?></li>
                    <li>Sleeping hours - <?php echo #$data['plans']->allergies
                    '5 hours' ?></li>
                    <li>Water Consumption(per day) - <?php echo #$data['plans']->sleeping_hours 
                    '2 L'?></li>
                    <li>Goals - <?php echo #$data['plans']->water_consumption_per_day
                    'I want to lose my weight'?></li>
                   
                </ul>
                <div class="bottom-line"></div>
            </div>
        </div>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>