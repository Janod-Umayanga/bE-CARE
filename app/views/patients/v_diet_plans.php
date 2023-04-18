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
    <title>Document</title>
</head>
<body>
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <section class="table-section theme">
        <div class="table-container theme">
            <div class="table-topic-main">
                <h1>Requested Diet Plans</h1>
            </div>
            <div class="table">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <th>Requested From</th>
                        <th>Paid Amount</th>
                        <th>Requested Date and Time</th>
                        <th>Details Provided by You</th>
                    </tr>
                    <?php foreach($data['requests'] as $request): ?>
                    <tr>
                        <td>Dr. <?php echo $request->first_name ?> <?php echo $request->last_name ?></td>
                        <td>Rs. <?php echo $request->paid_amount ?></td>
                        <td><?php echo $request->requested_date_and_time ?></td>
                        <td>
                        <form action="<?php echo URLROOT ?>/Patient/viewDietPlanDetails/<?php echo $request->request_diet_plan_id ?>">
                            <button class="delete"><i class="fa-solid fa-circle-info"></i> details</button>
                        </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </section>

    <section class="table-section theme">
        <div class="table-container theme">
            <div class="table-topic-main">
                <h1>Received Diet Plans</h1>
            </div>
            <div class="table">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <th>Requested From</th>
                        <th>Issued Date and Time</th>
                        <th>Diet Plan</th>
                        <th>Details Provided by You</th>
                    </tr>
                    <?php foreach($data['dietplans'] as $dietplan): ?>
                    <tr>
                        <td>Dr. <?php echo $dietplan->first_name ?> <?php echo $dietplan->last_name ?></td>
                        <td><?php echo $dietplan->issued_date_and_time ?></td>
                        <td><button class="delete"><i class="fa-solid fa-download"></i><a download="<?php echo $dietplan->diet_plan_file ?>"  href="<?php echo URLROOT?>/upload/dietplans/<?php echo $dietplan->diet_plan_file ?>">Download</a></button></td>
                        <td>
                        <form action="<?php echo URLROOT ?>/Patient/viewDietPlanDetails/<?php echo $dietplan->request_diet_plan_id ?>">
                            <button class="delete"><i class="fa-solid fa-circle-info"></i> details</button>
                        </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>