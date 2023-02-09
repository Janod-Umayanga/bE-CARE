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
    <title>Complaint Mangement</title>
</head>
<body>
    
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <div class="doctor-main-picture-container-complaint">
        <div class="tittle">
            <i class="fa-solid fa-exclamation"></i>
            <h1>Complaint<br>Management!</h1>
        </div>
    </div>

    <section class="our-services-container-complaint theme" id="our-services-container">
        <dev class="service-topic">
            <span class="line"></span>
            <h2>Complaints</h2>
        </dev>

        <div class="card-container-forservices" id="to-be-show-more">
             
            
            <a href="<?php echo URLROOT;?>/AdminComplaintMgmt/solvedComplaint" class="card">
                <img src="<?php echo URLROOT;?>/img/adminComplaintManagement/solved.jpeg" alt="">
                <h2>Solved - <?php echo $data["solvedComplaint"]->solvedComplaint_count ?> </h2>
            </a>
            
            <a href="<?php echo URLROOT;?>/AdminComplaintMgmt/unsolvedComplaint" class="card">
                <img src="<?php echo URLROOT;?>/img/adminComplaintManagement/unsolved.jpeg" alt="">
                <h2>Unsolved - <?php echo $data["unsolvedComplaint"]->unsolvedComplaint_count ?> </h2>     
            </a>
            
            
        </div>
        <button id="show-button" class="show-button" onclick="showMore()"><span id="show-text">Show More</span><i class="fa-solid fa-angle-down" id="icon-more-orless"></i></button>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>