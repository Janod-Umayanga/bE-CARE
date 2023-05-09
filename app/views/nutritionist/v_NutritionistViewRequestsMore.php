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
                <h1>More Details</h1>
            </div>
            <div class="table">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <th>Field</th>
                        <th>Details</th>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><?php echo $data['more']->name ?></td>
                    </tr>
                    <tr>
                        <td>Age</td>
                        <td><?php echo $data['more']->age ?></td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td><?php echo $data['more']->gender ?></td>
                    </tr>
                    <tr>
                        <td>Contact Number</td>
                        <td><?php echo $data['more']->contact_number ?></td>
                    </tr>
                    <tr>
                        <td>Weight</td>
                        <td><?php echo $data['more']->weight ?></td>
                    </tr>
                    <tr>
                        <td>Height</td>
                        <td><?php echo $data['more']->height ?></td>
                    </tr>
                    <tr>
                        <td>Marital Status</td>
                        <td><?php echo $data['more']->marital_status ?></td>
                    </tr>
                    <tr>
                        <td>Medical Details</td>
                        <td><?php echo $data['more']->medical_details ?></td>
                    </tr>
                    <tr>
                        <td>Allergies</td>
                        <td><?php echo $data['more']->allergies ?></td>
                    </tr>
                    <tr>
                        <td>Sleeping hours</td>
                        <td><?php echo $data['more']->sleeping_hours ?></td>
                    </tr>
                    <tr>
                        <td>Water Consumption(per day)</td>
                        <td><?php echo $data['more']->water_consumption_per_day ?></td>
                    </tr>
                    <tr>
                        <td>Goals</td>
                        <td><?php echo $data['more']->goal?></td>
                    </tr>
                    
                </table>
            </div>
        </div>
    </section>

    

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>