<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <title>View Doctor Appointments</title>
</head>
<body>

<?php require APPROOT.'/views/inc/components/header.php'; ?>

    <section class="doctor-cards">
        <div class="left">
            <?php foreach($data['appointments'] as $appointment): ?>
                <?php if($appointment->date >= $data['currentDate'] && $appointment->time >= $data['currentTime']): ?>
                <div class="card">
                    <div class="card-left">
                        <p>Appontment On<br><?php echo $appointment->date ?></p><br>
                    </div>
                    <div class="card-right">
                        <div>
                            <h3>For Dr. <?php echo $appointment->first_name ?> <?php echo $appointment->last_name ?></h3>
                            <p>Address : <?php  echo $appointment->address ?></p>
                            <p>Appointment time:<br><?php echo $appointment->time ?></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <div class="right">
            <img src="../public/img/doctor-cards.png" alt="">
        </div>
    </section>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>

</body>
</html>