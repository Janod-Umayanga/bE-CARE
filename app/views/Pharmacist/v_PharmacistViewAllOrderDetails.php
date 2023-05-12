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
    <title>Pharmacist Order Details</title>
</head>
<body>
    
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <div class="pharmacist-main-picture-container-pharmacistOrders">
        <div class="tittle">
        <i class='fas fa-capsules'></i>
            <h1>Your Order Details!</h1>
        </div>
    </div>
    <!--css 1792-->
    <section class="our-services-container-complaint theme" id="our-services-container">
        <div class="service-topic">
            <span class="line"></span>
            <h2>Your orders Details</h2>
        </div>

        <div class="card-container-forservices" id="to-be-show-more">
             
            
            <a href="<?php echo URLROOT;?>/Pharmacist/pharmacistViewPendingOrders/" class="card">
                <img src="<?php echo URLROOT;?>/img/pharmacist-page-pictures/pending_orders.jpg" alt="">
                <h3>******<br> Pending Orders - <?php echo $data["noOfPendingOrders"]->pending_orders_count ?> </h3> 
            </a>
            
            <a href="<?php echo URLROOT;?>/Pharmacist/pharmacistViewAcceptedOrders/" class="card">
                <img src="<?php echo URLROOT;?>/img/pharmacist-page-pictures/accepted_orders.jpg" alt="">
                <h3>******<br> Accepted Orders - <?php echo $data["noOfAcceptedOrders"]->accpted_orders_count ?>    </h3> 
            </a>

            <a href="<?php echo URLROOT;?>/Pharmacist/pharmacistViewRejectedOrders/" class="card">
                <img src="<?php echo URLROOT;?>/img/pharmacist-page-pictures/rejected_orders.jpg" alt="">
                <h3>******<br> Rejected Orders - <?php echo $data["noOfRejectedOrders"]->rejected_orders_count ?> </h3>  
            </a>

            <a href="<?php echo URLROOT;?>/Pharmacist/pharmacistViewPaidOrders/" class="card">
                <img src="<?php echo URLROOT;?>/img/pharmacist-page-pictures/paid_orders.jpg" alt="">
                <h3>******<br> Paid Orders - <?php echo $data["noOfPaidOrders"]->paid_orders_count?> </h3> 
            </a>
            
            
        </div>
        <button id="show-button" class="show-button" onclick="showMore()"><span id="show-text">Show More</span><i class="fa-solid fa-angle-down" id="icon-more-orless"></i></button>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>