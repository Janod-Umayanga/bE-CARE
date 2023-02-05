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
    <script defer src="<?php echo URLROOT; ?>/js/pushNotification.js"></script>
    <title>BeCare</title>
</head>
<body>
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <div id="notification-container"></div>
    <section class="main-content-container">
        <div class="main-content">
            <p>From UCSC batch 19/20 CS Group 11</p>
            <h1>Local Healthcare <br> Platform</h1>
            <div class="main-two-buttons-container">
                <a href="#our-services-container" class="main-button">Dashboard</a>
                <a class="main-button">About</a>
            </div>
        </div>
    </section>

    <section class="our-services-container theme" id="our-services-container">
        <dev class="service-topic">
            <span class="line"></span>
            <h2>Diet Plans List</h2>
        </dev>

    <section class="table-section theme">
        <div class="table-container theme">
            <div class="table-topic-main">
                <h1>Requested Diet Plans Details</h1>
            </div>
            <div class="table">
                
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <th>Diet Plan ID</th>
                        <th>Name of patient</th> 
                        <th></th>
                        
                    </tr>
                    <?php foreach($data['plans'] as $plans): ?>
                    <tr>
                        <td><?php echo $plans->request_diet_plan_id?></td>
                        <td><?php echo $plans->name?></td>

                        <td>
                            <form class="viewMoreForm" action="<?php echo URLROOT;?>/Nutritionist/nutritionistViewRequestsMore<?php echo $plans->requested_diet_plan_id ?>">
                              <button class="view-more"><i class="fa-solid fa-circle-info"></i></button>
                          </form>
                       
                          <form class="acceptForm" action="<?php echo URLROOT;?>/Nutritionist/nutritionistAcceptRequest<?php echo $plans->requested_diet_plan_id ?>" method="post">
                                <button class="nav-buttons">Accept</button>
                          </form>
                        
                        
                        </td>
                    </tr>
                  
                    <?php endforeach;?>
                </table>
            </div>
        </div>
    </section>
       
        <button id="show-button" class="show-button" onclick="showMore()"><span id="show-text">Show More</span><i class="fa-solid fa-angle-down" id="icon-more-orless"></i></button>
    </section>

    <!-- For push notifications -->
    <span id="isPatientLoggedIn"><?php if(isset($_SESSION['first_time_logged'])){echo $_SESSION['first_time_logged']; unset($_SESSION['first_time_logged']);}?></span>
    <span id="isOrderSent"><?php if(isset($_SESSION['order_sent'])){echo $_SESSION['order_sent']; unset($_SESSION['order_sent']);}?></span>
    <span id="isLoggedOut"><?php if(isset($_SESSION['logout'])){echo $_SESSION['logout']; unset($_SESSION['logout']);}?></span>
    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>