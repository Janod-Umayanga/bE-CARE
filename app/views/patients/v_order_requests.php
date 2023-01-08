<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <title>View Orders</title>
</head>
<body>

<?php require APPROOT.'/views/inc/components/header.php'; ?>

    <section class="doctor-cards">
        <div class="left">
            <?php foreach($data['orders'] as $order): ?>
            <div class="card">
                <div class="card-left">
                    <p>Ordered on:<br><?php echo $order->ordered_date_and_time ?></p>
                </div>
                <div class="card-right">
                    <div>
                        <h3>From: <?php echo $order->pharmacy_name ?></h3>
                        <p>Address : <?php  echo $order->address ?></p>
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
</html>