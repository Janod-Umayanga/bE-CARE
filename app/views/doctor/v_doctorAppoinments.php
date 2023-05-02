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
                        <th>Appoinment Date</th>
                        <th>Starting Time</th>
                        <th>Ending Time</th>
                        <th>Number of Registered Patients</th>
                        <th>View Registered Patients</th>
                        <th>Enable/Disable Timeslot</th>
                        
                    </tr>
                    <?php foreach($data['appoinments'] as $appoinments): ?>
                    <tr>
                        <td><?php echo $appoinments->day ?></td>
                        <td><?php echo $appoinments->starting_time ?></td>
                        <td><?php echo $appoinments->ending_time ?></td>
                        <td><?php echo (strtotime($appoinments->current_channel_time) - strtotime($appoinments->starting_time))/($appoinments->duration_for_one_patient * 60) ?></td>
                        <td><form action="<?php echo URLROOT ?>/DoctorAppoinments/viewPatients/<?php echo $appoinments->doctor_channel_day_id ?>" method="POST">
                            <button class="View-button">View</button>
                        </form></td>
                        <?php if($appoinments->active == 0): ?>
                            <td><form action="<?php echo URLROOT ?>/Doctor/enableTimeslot/<?php echo $appoinments->doctor_channel_day_id ?>">
                            <?php if($appoinments->current_channel_time == $appoinments->ending_time): ?>
                                <button class="main-button" disabled>Timeslot Full</button>
                            <?php else: ?>
                                <button class="main-button">enable</button>
                            <?php endif; ?>
                            </form></td>
                        <?php else: ?>
                            <td><form action="<?php echo URLROOT ?>/Doctor/disableTimeslot/<?php echo $appoinments->doctor_channel_day_id ?>">
                            <?php if($appoinments->current_channel_time != $appoinments->starting_time): ?>
                                <button class="main-button" disabled>Patients Already Registered</button>
                            <?php else: ?>
                                <button class="main-button">Disable</button>
                            <?php endif; ?>
                            </form></td>
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>