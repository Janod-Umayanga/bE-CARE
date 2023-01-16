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
    <title>Find a Pharmacy</title>
</head>
<body>
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <div class="pharmacy-main-picture-container">
        <div class="tittle">
            <i class="fa-solid fa-house-medical"></i>
            <h1>Find any Medicine<br>you need!</h1>
        </div>
        <div class="pharmacy-search-section theme">
            <form action="<?php echo URLROOT ?>/Patient/findPharmacy" class="search-form-pharmacy" method="POST">
                <select name="city" id="city">
                    <option value="">City</option>
                    <option value="">Colombo</option>
                    <option value="Malabe">Malabe</option>
                    <option value="Matara">Matara</option>
                </select>
                <div class="main-search">
                    <input type="text" name="search" placeholder="Search pharmacy by name..">
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
        </div>
    </div>

    <section class="pharmacy-card-container theme">
        <div class="pharmacy-cards-topic">
            <span class="line"></span>
            <h2>Available Pharmacies</h2>
        </div>
        <div class="pharmacy-main-container" id="to-be-show-more">
            <div class="pharmacy-sub">
                <?php foreach($data['pharmacists'] as $pharmacist): ?>
                <div class="card">
                    <div class="circle"></div>
                    <div class="name">
                        <h1><?php echo $pharmacist->pharmacy_name ?></h1>
                    </div>
                    <div class="description">
                        <h2><?php echo $pharmacist->city ?></h2>
                        <p>Address: <?php echo $pharmacist->address ?></p>
                    </div>
                    <form action="<?php echo URLROOT ?>/Patient/getPharmacistId" method="POST" class="card-main-button">
                        <input type="hidden" name="pharmacist_id" id="pharmacist_id" value="<?php echo $pharmacist->pharmacist_id ?>">
                        <button>Order</button>
                    </form>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <button id="show-button" class="show-button" onclick="showMore()"><span id="show-text">Show More</span><i class="fa-solid fa-angle-down" id="icon-more-orless"></i></button>
    </section>
    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>