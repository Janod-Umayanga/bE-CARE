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
                <h1>Appoinments</h1>
                
            </div>
            <div class="table">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <th>Patient ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Contact Number</th>
                        <th>Gender</th>
                        <th>Date</th>
                        <th>Time</th>

                        <th></th>
                    </tr>
                    <?php foreach($data['appoinments'] as $appoinments): ?>
                    <tr>
                        <td><?php echo $appoinments->patient_id ?></td>
                        <td><?php echo $appoinments->name ?></td>
                        <td><?php echo $appoinments->age ?></td>
                        <td><?php echo $appoinments->contact_number ?></td>
                        <td><?php echo $appoinments->gender ?></td>
                        <td><?php echo $appoinments->date ?></td>
                        <td><?php echo $appoinments->time ?></td>
                        
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>