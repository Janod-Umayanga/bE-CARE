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
                <a href="<?php echo URLROOT ?>/Pharmacist/pharmacistViewOrders" class="backto-doctors"><i class="fa-solid fa-arrow-left"></i>Back to Orders</a> 
            </div>
            <div class="bottom">
                <ul>
                    <li>Order ID - <?php echo #$data['plans']->request_diet_plan_id 
                    '01'?></li>
                    <li>Name - <?php echo #$data['plans']->name 
                    'Kushani Sandareka'?></li>
                     <li>Contact Number - <?php echo #$data['plans']->contact_number 
                    '0787823456'?></li>
                    <li>Delivery Address - <?php echo #$data['plans']->age
                    'NO.191/2,Nawala.'?></li>
                   
                   
                    <li>Ordered Date and Time - <?php echo #$data['plans']->weight 
                    '2023-01-01 08:45:18'?></li>
                </ul>
                <div class="bottom-line"></div>
            </div>
        </div>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>