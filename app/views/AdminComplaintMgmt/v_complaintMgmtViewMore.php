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
    <title>View Complaint </title>
</head>
<body>
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <section class="view-profile-container theme">
        <div class="card">
            <div class="main-image">
                <a href="<?php echo URLROOT ?>/AdminComplaintMgmt/adminComplaintMgmt" class="backto-doctors"><i class="fa-solid fa-arrow-left"></i>Back to Complaints</a>
                <h1><?php echo $data['first_name'] ?> <br> <?php echo $data['last_name'] ?></h1>
                <div class="profile-icon"><?php echo substr($data['first_name'], 0,1) ?><?php echo substr($data['last_name'], 0,1) ?></div>
                
            </div>
            <div class="bottom">
                <ul>
                    <li>Subject - <?php echo $data['complaint']->subject ?></a></li>
                    <li>Date - <?php echo $data['complaint']->complaint_date ?></a></li>
                    <li>Email - <a href="mailto:<?php echo $data['email'] ?>"><?php echo $data['email'] ?></a></li>
                    <li>Complaint - <?php echo $data['complaint']->description ?></a></li>
                              
                
                
                   
                </ul>
                <div class="bottom-line"></div>
            </div>
        </div>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>