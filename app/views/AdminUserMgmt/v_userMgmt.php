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
    <title>User Mangement</title>
</head>
<body>
    
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <div class="doctor-main-picture-container">
        <div class="tittle">
            <i class="fa-solid fa-stethoscope"></i>
            <h1>User<br>Management!</h1>
        </div>
    </div>

    <section class="doctor-cards-container theme">
        <div class="doctor-cards-topic">
            <span class="line"></span>
            <h2>Service Providers</h2>
        </div>
        <div class="card-content-fordoctors" id="to-be-show-more">
            <div class="card-page">
                

              <div class="card theme theme">
                    <div class="left theme">
                        <p>No Of </p>
                        <h2> Patients </h2>
                       
                    </div>
                    <div class="right"><br><br>
                        <h2> <b><?php echo $data["patient"]->patient_count ?></b></h2>
                          <button class="channel-butten"><a href="<?php echo URLROOT;?>/AdminUserMgmt/Patient">View </a></button>
                    </div>
                </div>


               <div class="card theme theme">
                    <div class="left theme">
                        <p>No Of </p>
                        <h2> Doctor </h2>
                       
                    </div>
                    <div class="right"><br><br>
                        <h2> <b><?php echo $data["doctor"]->doctor_count ?></b></h2>
                          <button class="channel-butten"><a href="<?php echo URLROOT;?>/AdminUserMgmt/Doctor">View </a></button>
                    </div>
                </div>

                

                <div class="card theme theme">
                    <div class="left theme">
                        <p>No Of </p>
                        <h2> Counsellor </h2>
                       
                    </div>
                    <div class="right"><br><br>
                        <h2> <b><?php echo $data["counsellor"]->counsellor_count ?></b></h2>
                          <button class="channel-butten"><a href="<?php echo URLROOT;?>/AdminUserMgmt/Counsellor">View </a></button>
                    </div>
                </div>

                
                <div class="card theme theme">
                    <div class="left theme">
                        <p>No Of </p>
                        <h2> Admin </h2>
                       
                    </div>
                    <div class="right"><br><br>
                        <h2> <b><?php echo $data["admin"]->admin_count ?></b></h2>
                          <button class="channel-butten"><a href="<?php echo URLROOT;?>/AdminUserMgmt/admin">View </a></button>
                    </div>
                </div>

                <div class="card theme theme">
                    <div class="left theme">
                        <p>No Of </p>
                        <h2> Meditation Instructors </h2>
                       
                    </div>
                    <div class="right"><br><br>
                        <h2> <b><?php echo $data["meditationInstr"]->meditation_instructor_count ?></b></h2>
                          <button class="channel-butten"><a href="<?php echo URLROOT;?>/AdminUserMgmt/meditationInstructor">View </a></button>
                    </div>
                </div>

                 
                <div class="card theme theme">
                    <div class="left theme">
                        <p>No Of </p>
                        <h2> Pharmacists </h2>
                       
                    </div>
                    <div class="right"><br><br>
                        <h2> <b><?php echo $data["pharmacist"]->pharmacist_count ?></b></h2>
                          <button class="channel-butten"><a href="<?php echo URLROOT;?>/AdminUserMgmt/pharmacist">View </a></button>
                    </div>
                </div>

                
                <div class="card theme theme">
                    <div class="left theme">
                        <p>No Of </p>
                        <h2> Nutritionist </h2>
                       
                    </div>
                    <div class="right"><br><br>
                        <h2> <b><?php echo $data["nutritionist"]->nutritionist_count ?></b></h2>
                          <button class="channel-butten"><a href="<?php echo URLROOT;?>/AdminUserMgmt/nutritionist">View </a></button>
                    </div>
                </div>

               
            </div>
        </div>
        <button id="show-button" class="show-button" onclick="showMore()"><span id="show-text">Show More</span><i class="fa-solid fa-angle-down" id="icon-more-orless"></i></button>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>