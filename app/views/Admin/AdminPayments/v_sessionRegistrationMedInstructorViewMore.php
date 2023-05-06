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
    <title>View Meditation Instructor Session Registration </title>
</head>
<body>
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <section class="view-profile-container-adminPayment theme">
        <div class="card">
            
            <div class="main-image">
                 
                <form  action="<?php echo URLROOT ?>/AdminPayments/doctorChannelPaymentsSearch" method="get">
                         <input type="hidden" name="service" value="<?php echo $data['service']?>">
                         <input type="hidden" name="period" value="<?php echo $data['period']?>">
                         <input type="hidden" name="search" value="<?php echo $data['search']?>">
                        <button class="backto-counsellors " type="submit" ><i class="fa-solid fa-arrow-left"></i>Back to Session Registration Payments </button> 
                </form>
                
       
                   

                <h1><?php echo $data['sessionRegistration']->gender ?>. <?php echo $data['sessionRegistration']->first_name ?> <br> <?php echo $data['sessionRegistration']->last_name ?></h1>
                <h3>Meditation Instructor</h3>
            </div>

            <div class="bottom">
                <ul> 
                    <li>Total Fee - <?php echo $data['sessionRegistration']->paid_amount ?></a></li>
                    <li>Meditation Instructor Fee - <?php echo ($data['sessionRegistration']->paid_amount/110)*100 ?></li>
                    <li>Profit - <?php echo ($data['sessionRegistration']->paid_amount/110)*10 ?></li>
                   

                    <li>Payment Date & Time - <?php echo $data['sessionRegistration']->registered_date_and_time ?> </li>
                   
                    <li>Meditation Instructor Email - <a href="mailto:<?php echo $data['sessionRegistration']->email ?>"><?php echo $data['sessionRegistration']->email ?></a></li>
                    <li>Meditation Instructor Contact Number - <?php echo $data['sessionRegistration']->contact_number ?></li>
                   
                    <li>Patient Name -<?php echo $data['sessionRegistration']->name ?></a></li>
                    <li>Patient Contact Number - <?php echo $data['sessionRegistration']->contact_number ?></li>
                    
                  
                </ul>
                <div class="bottom-line"></div>
            </div>
        </div>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>