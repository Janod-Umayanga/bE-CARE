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

    <section class="view-profile-container-medinstrHistory theme">
        <div class="card">
            <div class="main-image">
                <a href="<?php echo URLROOT ?>/MedInstrRegisteredUsersHistory/medInstrRegisteredUsersHistory" class="backto-doctors"><i class="fa-solid fa-arrow-left"></i>Back to Registered Users History</a>
                <h1> <?php echo $data['medChannel']->name ?> <br> <?php echo $data['medChannel']->age ?></h1>
                <p><?php echo $data['medChannel']->contact_number ?></p>
                <div class="profile-icon"><?php echo substr($data['medChannel']->name, 0,1) ?></div>
                <div class="social-media-icons">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-linkedin"></i>
                    <i class="fa-brands fa-twitter"></i>
                </div>
            </div>
            <div class="bottom">
                <ul>
                    <li>Date - <?php echo $data['medChannel']->date ?></li>
                    <li>Starting Time - <?php echo $data['medChannel']->starting_time ?></li>
                    <li>Ending Time - <?php echo $data['medChannel']->ending_time ?></li>
                    <li>Day - <?php echo $data['medChannel']->day?></li>
                   
                    <li>Gender - <?php echo $data['medChannel']->gender ?></li>
                    <li>Registered date - <?php echo $data['medChannel']->registered_date_and_time ?></li>
                    <li>Fee - <?php echo $data['medChannel']->fee ?></li>
                    <li>Address - <?php echo $data['medChannel']->address ?></li>
                   
                </ul>
                <div class="bottom-line"></div>
            </div>
        </div>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>