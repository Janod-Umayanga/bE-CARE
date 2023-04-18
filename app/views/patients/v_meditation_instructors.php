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
    <title>Find a Doctor</title>
</head>
<body>
    
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <div class="doctor-main-picture-container">
        <div class="tittle">
            <i class="fa-solid fa-hands-praying"></i>
            <h1>Find Your Instructor<br>for Meditating!</h1>
        </div>
        <div class="pharmacy-search-section theme">
            <form action="" class="search-form-pharmacy" method="POST">
                <select name="city" id="city">
                    <option value="">City</option>
                    <option value="Colombo">Colombo</option>
                    <option value="Galle">Galle</option>
                    <option value="Kandy">Kandy</option>
                    <option value="Malabe">Malabe</option>
                    <option value="Matara">Matara</option>
                    <option value="Nugegoda">Nugegoda</option>
                    <option value="Ratnapura">Ratnapura</option>
                    <option value="Trincomalee">Trincomalee</option>
                </select>
                <div class="main-search">
                    <input type="text" name="search" placeholder="Search doctor by name..">
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
        </div>
    </div>
    

    <section class="doctor-cards-container theme">
        <div class="doctor-cards-topic">
            <span class="line"></span>
            <h2>Available Meditation Instructors</h2>
        </div>
        <div class="card-content-fordoctors" id="to-be-show-more">
            <div class="card-page">
            <?php foreach($data['meditation_instructors'] as $meditation_instructor): ?>
                <div class="card theme theme">
                    <div class="left theme">
                        <p></p>
                        <h2><?php echo $meditation_instructor->gender ?>. <?php  echo $meditation_instructor->first_name ?> <?php  echo $meditation_instructor->last_name ?></h2>
                        <a href="<?php echo URLROOT ?>/Patient/viewMeditationInstructorProfile/<?php echo $meditation_instructor->meditation_instructor_id ?>">View profile <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                    <div class="right">
                        <p>City : <?php  echo $meditation_instructor->city ?></p>
                        <h2>Meditation Instructor</h2>
                        <form action="<?php echo URLROOT ?>/Patient/getMeditationInstructorId" method="POST">
                            <input type="hidden" name="meditation_instructor_id" id="meditation_instructor_id" value="<?php echo $meditation_instructor->meditation_instructor_id ?>">
                            <button class="channel-butten">Select</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
        <button id="show-button" class="show-button" onclick="showMore()"><span id="show-text">Show More</span><i class="fa-solid fa-angle-down" id="icon-more-orless"></i></button>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>