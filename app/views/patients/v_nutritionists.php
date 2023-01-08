<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <title>Find a Nutritionist</title>
</head>
<body>

<?php require APPROOT.'/views/inc/components/header.php'; ?>

    <section class="doctor-cards">
        <div class="left">
            <form action="<?php echo URLROOT ?>/Patient/findNutritionist" method="POST">
                <input type="text" name="search" placeholder="Filter by nutritionist name">
                <button type="submit">Search</button>
            </form>

            <?php foreach($data['nutritionists'] as $nutritionist): ?>
            <div class="card">
                <div class="card-left">
                    <p>Dr. <?php echo $nutritionist->first_name ?> <?php echo $nutritionist->last_name ?></p>
                </div>
                <div class="card-right">
                    <div>
                        <h3>Nutritionist</h3>
                        <p></p>
                    </div>
                    <form action="<?php echo URLROOT ?>/Patient/getNutritionistId" method="POST">
                        <input type="hidden" name="nutritionist_id" id="nutritionist_id" value="<?php echo $nutritionist->nutritionist_id ?>">
                        <button>Select</button>
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