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
        <?php foreach($data['counsellor_sessions'] as $session): ?>
        <?php if($session->date > $data['currentDate'] || ($session->date == $data['currentDate'] && $session->starting_time >= $data['currentTime'])): ?>
        <div class="session-card theme">
            <div class="top-box">
                <div class="top-box-inner">
                    <h2><?php echo $session->title ?></h2>
                    <p><?php echo $session->description ?></p>
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
                <h3>This session will be conducted by Dr. <?php echo $session->first_name ?> <?php echo $session->last_name ?> on <?php echo $session->date ?> during <?php echo $session->starting_time ?> to <?php echo $session->ending_time ?> at <?php echo $session->address ?></h3>
                <button>Register</button>
            </div>
        </div>
        <?php endif; ?>
        <?php endforeach; ?>

        <?php foreach($data['nutritionist_sessions'] as $session): ?>
        <?php if($session->date > $data['currentDate'] || ($session->date == $data['currentDate'] && $session->starting_time >= $data['currentTime'])): ?>
        <div class="session-card theme">
            <div class="top-box">
                <div class="top-box-inner">
                    <h2><?php echo $session->title ?></h2>
                    <p><?php echo $session->description ?></p>
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
                <h3>This session will be conducted by Dr. <?php echo $session->first_name ?> <?php echo $session->last_name ?> on <?php echo $session->date ?> during <?php echo $session->starting_time ?> to <?php echo $session->ending_time ?> at <?php echo $session->address ?></h3>
                <button>Register</button>
            </div>
        </div>
        <?php endif; ?>
        <?php endforeach; ?>

        <?php foreach($data['meditation_instructor_sessions'] as $session): ?>
        <?php if($session->date > $data['currentDate'] || ($session->date == $data['currentDate'] && $session->starting_time >= $data['currentTime'])): ?>
        <div class="session-card theme">
            <div class="top-box">
                <div class="top-box-inner">
                    <h2><?php echo $session->title ?></h2>
                    <p><?php echo $session->description ?></p>
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
                <h3>This session will be conducted by <?php echo $session->gender ?>. <?php echo $session->first_name ?> <?php echo $session->last_name ?> on <?php echo $session->date ?> during <?php echo $session->starting_time ?> to <?php echo $session->ending_time ?> at <?php echo $session->address ?></h3>
                <button>Register</button>
            </div>
        </div>
        <?php endif; ?>
        <?php endforeach; ?>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <title>View Sessions</title>
</head>
<body>

<?php require APPROOT.'/views/inc/components/header.php'; ?>

    <section class="doctor-cards">
        <div class="left">
            <h1>Available Sessions</h1>
            <?php foreach($data['sessions'] as $session): ?>
            <div class="card">
                <div class="card-left">
                    <p>Will be held on:<br><?php echo $session->date ?><br><?php echo $session->starting_time ?> - <?php echo $session->ending_time ?></p>
                </div>
                <div class="card-right">
                    <div>
                        <h3><?php echo $session->title ?></h3>
                        <p>Address : <?php  echo $session->address ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="right">
            <img src="../public/img/doctor-cards.png" alt="">
        </div>
    </section>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>

</body>
</html> -->