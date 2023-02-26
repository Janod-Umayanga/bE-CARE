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
                        <p>Diet plan fee</p>
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
            <form action="<?php echo URLROOT ?>/Payment/createDietPlanRequest" method="POST">
                <input type="hidden" name="name" value="<?php echo $data['name'] ?>">
                <input type="hidden" name="age" value="<?php echo $data['age'] ?>">
                <input type="hidden" name="gender" value="<?php echo $data['name'] ?>">
                <input type="hidden" name="cnumber" value="<?php echo $data['cnumber'] ?>">
                <input type="hidden" name="weight" value="<?php echo $data['weight'] ?>">
                <input type="hidden" name="height" value="<?php echo $data['height'] ?>">
                <input type="hidden" name="marital_status" value="<?php echo $data['marital_status'] ?>">
                <input type="hidden" name="medical_details" value="<?php echo $data['medical_details'] ?>">
                <input type="hidden" name="allergies" value="<?php echo $data['allergies'] ?>">
                <input type="hidden" name="sleeping_hours" value="<?php echo $data['sleeping_hours'] ?>">
                <input type="hidden" name="water_consumption_per_day" value="<?php echo $data['water_consumption_per_day'] ?>">
                <input type="hidden" name="goal" value="<?php echo $data['goal'] ?>">
                <input type="hidden" name="nutritionist_id" value="<?php echo $data['nutritionist_id'] ?>">
                <input type="hidden" name="fee" value="<?php echo $data['fee'] ?>">
                <button>Pay here</button>
            </form>
        </div>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>
    