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
    <title>Invoice</title>
</head>
<body>
<?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <section class="pay-section theme">
        <div class="pay-card theme">
            <i class="fa-regular fa-credit-card" id="pay-icon"></i>
            <h1 class="main-topic">Pay card</h1>
            <div class="content">
                <div class="topic">
                    <div>
                        <h4>Description</h4>
                    </div>
                    <div>
                        <h4>Amount</h4>
                    </div>
                </div>
                <ul class="description-and-amount-container">
                    <li>
                        <p>Channeling fee</p>
                        <p>Rs. <?php echo $data['fee'] ?></p>
                    </li>
                    <li>
                        <p>System charge</p>
                        <p>Rs. <?php echo $data['fee']*0.1 ?></p>
                    </li>
                </ul>
                <div class="total">
                    <h3>Total Rs. <?php echo $data['fee']+$data['fee']*0.1 ?></h3>
                </div>
            </div>
            <form action="<?php echo URLROOT ?>/Payment/payforDoctorChannel" method="POST">
                <input type="hidden" name="fee" value="<?php echo $data['fee'] ?>">
                <input type="hidden" name="doctor_id" value="<?php echo $data['doctor_id'] ?>">
                <input type="hidden" name="channel_day_id" value="<?php echo $data['channel_day_id'] ?>">
                <input type="hidden" name="date" value="<?php echo $data['date'] ?>">
                <input type="hidden" name="starting_time" value="<?php echo $data['starting_time'] ?>">
                <input type="hidden" name="time" value="<?php echo $data['time'] ?>">
                <input type="hidden" name="duration" value="<?php echo $data['duration'] ?>">
                <input type="hidden" name="ending_time" value="<?php echo $data['ending_time'] ?>">
                <input type="hidden" id="name" name="name" value="<?php echo $data['name'] ?>">
                <input type="hidden" id="age" name="age" value="<?php echo $data['age'] ?>">
                <input type="hidden" id="gender" name="gender" value="<?php echo $data['gender'] ?>">
                <input type="hidden" id="cnumber" name="cnumber" value="<?php echo $data['cnumber'] ?>">
                <button>Pay here</button>
            </form>
        </div>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>