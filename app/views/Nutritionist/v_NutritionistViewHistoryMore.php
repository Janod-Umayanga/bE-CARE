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
    <title>View Registered User Details</title>
</head>
<body>
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <section class="table-section theme">
        <div class="table-container theme">

            <div class="table-topic-main">
                <h1>More Details of History</h1>
            </div>
            <div class="table">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <th>Field</th>
                        <th>Details</th>
                    </tr>
                    <tr>
                        <td>Diet Plan ID</td>
                        <td><?php echo $data['his']->request_diet_plan_id ?></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><?php echo $data['his']->description ;?></td>
                    </tr>
                    <tr>
                        <td>Diet Plan File</td>
                        <td><button class="Prescription"><i class="fa-solid fa-download"></i><a download="<?php echo $data['his']->diet_plan_file ?>"  href="<?php echo URLROOT?>/upload/dietplans/<?php echo $data['his']->diet_plan_file ?>">Download</a></button></td>
                    </tr>
                    <tr>
                        <td>Issued Date and Time</td>
                        <td><?php echo $data['his']->issued_date_and_time; ?></td>
                    </tr>
                    
                </table>
            </div>
        </div>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>