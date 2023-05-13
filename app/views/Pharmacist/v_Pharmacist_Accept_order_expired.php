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
    <title>Invoice</title>
</head>
<body>


    <section class="pay-section theme">
        <div class="pay-card theme">
            <i class="fa-solid fa-square-xmark" id="pay-icon"></i>
            <h1 class="main-topic">We're sorry. Your Order has expired! You must accept within one day after the order is made..</h1>
        
            <form action="<?php echo URLROOT ?>/Pharmacist/v_PharmacistDashboard">
                <button>Go to Home Page</button>
            </form>
        </div>
    </section>

    
</body>
</html>