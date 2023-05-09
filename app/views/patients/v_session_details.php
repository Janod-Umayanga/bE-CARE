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
    <title>Document</title>
</head>
<body>
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <section class="session-container theme">
        <div class="session-card theme">
            <div class="top-box">
                <div class="top-box-inner">
                    <h2><?php echo $data['session']->title ?></h2>
                    <p><?php echo $data['session']->description ?></p>
                    <div class="icon-container">
                        <i class="fa-brands fa-facebook"></i>
                        <i class="fa-brands fa-linkedin"></i>
                        <i class="fa-brands fa-twitter"></i>
                    </div>
                    <div class="inner-circle-for-initials">
                        <h1>SL</h1>
                    </div>
                </div>
            </div>
            <div class="bottom">
                <p>*******</p>
                <h3>This session will be on <?php echo $data['session']->date ?> during <?php echo $data['session']->starting_time ?> to <?php echo $data['session']->ending_time ?> at <?php echo $data['session']->address ?></h3>
            </div>
        </div>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>