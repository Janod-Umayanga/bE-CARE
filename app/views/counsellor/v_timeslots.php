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
                <h1>Your Timeslots</h1>
                <form action="<?php echo URLROOT ?>/Doctor/addTimeslot">
                    <button>Add new</button>
                </form>
            </div>
            <div class="table">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <th>Day</th>
                        <th>Starting Time</th>
                        <th>Ending Time</th>
                        <th>Fee</th>
                        <th>Address</th>
                        <th></th>
                    </tr>
                    <?php foreach($data['timeslots'] as $timeslot): ?>
                    <tr>
                        <td><?php echo $timeslot->channeling_day ?></td>
                        <td><?php echo $timeslot->starting_time ?></td>
                        <td><?php echo $timeslot->ending_time ?></td>
                        <td><?php echo $timeslot->fee ?></td>
                        <td><?php echo $timeslot->address ?></td>
                        <td>
                            <button class="view-more"><i class="fa-solid fa-circle-info"></i></button>
                            <button class="delete"><i class="fa-solid fa-trash"></i></button>
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