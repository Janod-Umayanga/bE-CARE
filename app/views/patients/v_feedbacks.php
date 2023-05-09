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
    <title>Feedback</title>
</head>
<body>
<?php require APPROOT.'/views/inc/components/header1.php'; ?>
    <section class="feed-backs-section theme">
        <h1 class="theme">Feedbacks</h1>
        <div class="feed-back-container theme" id="to-be-show-more">
        <?php foreach($data['feedbacks'] as $feedback): ?>
            <div class="feed-back-card theme">
                <h2 class="theme"><?php  echo $feedback->first_name ?> <?php  echo $feedback->last_name ?></h2>
                <p class="theme">Added on <?php  echo $feedback->added_time ?></p>
                <div class="feed-back-message-box">
                    <i class="fa-solid fa-quote-left theme"></i>
                    <i class="fa-solid fa-quote-right theme"></i>
                    <p class="theme"><?php  echo $feedback->feedback ?></p>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </section>
    <div class="show-more-button-container-in-feedback theme">
        <button id="show-button" class="show-button" onclick="showMore()"><span id="show-text">Show More</span><i class="fa-solid fa-angle-down" id="icon-more-orless"></i></button>
    </div>
    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>