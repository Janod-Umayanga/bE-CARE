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
                <h1>Registered Sessions</h1>
            </div>
            <div class="table">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <th>Given name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Paid Amount</th>
                        <th>Registered Date and Time</th>
                        <th>Session Details</th>
                    </tr>
                    <?php foreach($data['registered_sessions'] as $registered_session): ?>
                    <?php if($registered_session->date > $data['currentDate'] || ($registered_session->date == $data['currentDate'] && $registered_session->starting_time >= $data['currentTime'])): ?>
                    <tr>
                        <td><?php echo $registered_session->name ?></td>
                        <td><?php echo $registered_session->date ?></td>
                        <td><?php echo $registered_session->starting_time ?></td>
                        <td>Rs. <?php echo $registered_session->paid_amount ?></td>
                        <td><?php echo $registered_session->registered_date_and_time ?></td>
                        <td>
                        <form action="<?php echo URLROOT ?>/Patient/viewSessionDetails/<?php echo $registered_session->session_id ?>">
                            <button class="delete"><i class="fa-solid fa-circle-info"></i> details</button>
                        </form>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>