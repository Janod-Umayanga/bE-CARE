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
    <title>View Med Instructor Registration </title>
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
                        <button class="backto-counsellors " type="submit" ><i class="fa-solid fa-arrow-left"></i>Back to Med Instructor Registration Payments </button> 
                </form>
                  <h1><?php echo $data['medInstructorRegistration']->gender ?>. <?php echo $data['medInstructorRegistration']->first_name ?> <br> <?php echo $data['medInstructorRegistration']->last_name ?></h1>
                
            </div>

            <div class="bottom">
                <ul>
                    <li>Total Fee - <?php echo $data['medInstructorRegistration']->paid_amount ?></a></li>
                    <li>Doctor Fee - <?php echo ($data['medInstructorRegistration']->paid_amount/110)*100 ?></li>
                    <li>Profit - <?php echo ($data['medInstructorRegistration']->paid_amount/110)*10 ?></li>
                   

                    <li>Payment Date & Time - <?php echo $data['medInstructorRegistration']->paid_time?></li>
                   
                    <li>Meditation Instructor Email - <a href="mailto:<?php echo $data['medInstructorRegistration']->email ?>"><?php echo $data['medInstructorRegistration']->email ?></a></li>
                    <li>Meditation Instructor Contact number - <?php echo $data['medInstructorRegistration']->contact_number ?></li>
                   
                    <li>Patient Name -<?php echo $data['medInstructorRegistration']->name ?></a></li>
                    <li>Patient Contact Number - <?php echo $data['medInstructorRegistration']->contact_number ?></li>
                    

                 
                </ul>
                <div class="bottom-line"></div>
            </div>
        </div>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>