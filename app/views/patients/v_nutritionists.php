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
    <title>Find a Nutritionist</title>
</head>
<body>
    
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <div class="nutritionist-main-picture-container">
        <div class="tittle">
            <i class="fa-solid fa-seedling"></i>
            <h1>Get a Diet Plan from a<br>Nutritionist!</h1>
        </div>
        <div class="pharmacy-search-section theme">
            <form action="" class="search-form-pharmacy" method="POST">
                <div class="main-search">
                    <input type="text" name="search" placeholder="Search nutritionist by name..">
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
        </div>
    </div>

    <!-- <div class="search-container-for-doctors" id="search-container-for-doctors">
        <form action="" class="main-form" method="POST">
            <div class="filter-by">
                
            </div>
            <div class="main-search">
                <div class="search-section">
                    <input type="text" name="search" placeholder="Search by Nutritionist name...">
                </div>
                <div class="button-section">
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>
        </form>
    </div> -->

    <section class="doctor-cards-container theme">
        <div class="doctor-cards-topic">
            <span class="line"></span>
            <h2>Available Nutritionists</h2>
        </div>
        <div class="card-content-fordoctors" id="to-be-show-more">
        <div class="card-page">
            <?php foreach($data['nutritionists'] as $nutritionist): ?>
                <div class="card theme theme">
                    <div class="left theme">
                        <p></p>
                        <h2>Dr. <?php  echo $nutritionist->first_name ?> <?php  echo $nutritionist->last_name ?></h2>
                        <a href="<?php echo URLROOT ?>/Patient/viewNutritionistProfile/<?php echo $nutritionist->nutritionist_id ?>">View profile <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                    <div class="right">
                        <p>Fee: Rs. <?php  echo $nutritionist->fee ?></p>
                        <h2>Nutritionist</h2>
                        <form action="<?php echo URLROOT ?>/Patient/getNutritionistId" method="POST">
                            <input type="hidden" name="nutritionist_id" id="nutritionist_id" value="<?php echo $nutritionist->nutritionist_id ?>">
                            <input type="hidden" name="fee" id="fee" value="<?php echo $nutritionist->fee?>">
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