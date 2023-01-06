<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <title>Find a Pharmacy</title>
</head>
<body>

<?php require APPROOT.'/views/inc/components/header.php'; ?>

    <section class="doctor-cards">
        <div class="left">
            <form action="<?php echo URLROOT ?>/Patient/findPharmacy" method="POST">
                <input type="text" name="search" placeholder="Filter by pharmacy name or city">
                <button type="submit">Search</button>
            </form>

            <?php foreach($data['pharmacists'] as $pharmacist): ?>
            <div class="card">
                <div class="card-left">
                     <p><?php  echo $pharmacist->pharmacy_name ?></p>
                </div>
                <div class="card-right">
                    <div>
                        <h3><?php  echo $pharmacist->city ?></h3>
                        <p>Address : <?php  echo $pharmacist->address ?></p>
                    </div>
                    <form action="<?php echo URLROOT ?>/Patient/getPharmacistId" method="POST">
                        <input type="hidden" name="pharmacist_id" id="pharmacist_id" value="<?php echo $pharmacist->pharmacist_id ?>">
                        <button>Order</button>
                    </form>
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