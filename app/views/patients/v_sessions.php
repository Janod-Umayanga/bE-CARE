<!DOCTYPE html>
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
</html>