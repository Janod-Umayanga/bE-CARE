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
                <h1><center>More Details of Selling History</center></h1>
            </div>
            <div class="table">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <th>Field</th>
                        <th>Details </th>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><?php echo $data['historymore']->name ?></td>
                    </tr>
                    <tr>
                        <td>Contact Number</td>
                        <td><?php echo $data['historymore']->contact_number ?></td>
                    </tr>
                    <tr>
                        <td>Delivery Address</td>
                        <td><?php echo $data['historymore']->delivery_address ?></td>
                    </tr>
                    
                    <tr>
                        <td>Ordered Date and Time</td>
                        <td><?php echo $data['historymore']->ordered_date_and_time ?></td>
                    </tr>
                    <tr>
                        <td>Accepted Date and Time</td>
                        <td><?php echo $data['historymore']->accepted_date_and_time ?></td>
                    </tr>
                    <tr>
                        <td>Pharmacist Note</td>
                        <td><?php echo $data['historymore']->pharmacist_note ?></td>
                    </tr>
                    <tr>
                        <td>Charge</td>
                        <td><?php echo $data['historymore']->charge?></td>
                        
                    </tr>
                    
                </table>
            </div>
        </div>
    </section>


    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>