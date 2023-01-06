<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <title>Find a Doctor</title>
</head>
<body>

<?php require APPROOT.'/views/inc/components/header.php'; ?>

    <section class="doctor-cards">
        <div class="left">
            <form action="<?php echo URLROOT ?>/Patient/findDoctor" method="POST">
                <input type="text" name="search" placeholder="Filter by doctor name, type or city">
                <button type="submit">Search</button>
            </form>

            <?php foreach($data['doctors'] as $doctor): ?>
            <div class="card">
                <div class="card-left">
                     <p>Dr. <?php  echo $doctor->first_name ?> <?php  echo $doctor->last_name ?><br><?php  echo $doctor->type ?></p>
                </div>
                <div class="card-right">
                    <div>
                        <h3><?php  echo $doctor->specialization ?></h3>
                        <p>City : <?php  echo $doctor->city ?></p>
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