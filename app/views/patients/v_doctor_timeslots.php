<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <title>Doctor Timeslots</title>
</head>
<body>

<?php require APPROOT.'/views/inc/components/header.php'; ?>

    <section class="doctor-cards">
        <div class="left">
            <?php foreach($data['timeslots'] as $timeslot): ?>
            <div class="card">
                <div class="card-left">
                     <p>Day</p>
                </div>
                <div class="card-right">
                    <div>
                        <h3><?php  echo $timeslot->channeling_day ?></h3>
                        <p><?php  echo $timeslot->starting_time ?> - <?php  echo $timeslot->ending_time ?></p>
                        <p>At <?php  echo $timeslot->address ?></p>
                        <p>Channeling fee: Rs.<?php  echo $timeslot->fee ?></p>
                    </div>
                    <a href="">Channel</a>
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