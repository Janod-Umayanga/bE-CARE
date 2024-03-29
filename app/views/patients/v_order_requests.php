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
                <h1>Pending Orders</h1>
            </div>
            <div class="table">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <th>Pharmacy Name</th>
                        <th>Pharmacy Address</th>
                        <th>Pharmacy Contact Number</th>
                        <th>Delivery Address</th>
                        <th>Given Prescription</th>
                        <th>Ordered Date and Time</th>
                    </tr>
                    <?php foreach($data['orders'] as $order): ?>
                    <tr>
                        <td><?php echo $order->pharmacy_name ?></td>
                        <td><?php echo $order->address ?></td>
                        <td><?php echo $order->contact_number ?></td>
                        <td><?php echo $order->delivery_address ?></td>
                        <td><button class="delete"><i class="fa-solid fa-download"></i><a download="<?php echo $order->prescription ?>"  href="<?php echo URLROOT?>/img/prescriptions/<?php echo $order->prescription ?>">Download</a></button></td>
                        <td><?php echo $order->ordered_date_and_time ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </section>

    <section class="table-section theme">
        <div class="table-container theme">
            <div class="table-topic-main">
                <h1>Accepted Orders (Make sure to pay for the order before a day after the order is accepted)</h1>
            <div class="table">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <th>Pharmacy Name</th>
                        <th>Pharmacy Contact Number</th>
                        <th>Delivery Address</th>
                        <th>Given Prescription</th>
                        <th>Accepted Date and Time</th>
                        <th>Pharmacist Note</th>
                        <!-- <th>Accepted Date and Time</th> -->
                        <th></th>
                    </tr>
                    <?php foreach($data['acccepted_orders'] as $accepted_order): ?>
                    <?php if(!$accepted_order->paid_amount): ?>
                    <tr>
                        <td><?php echo $accepted_order->pharmacy_name ?></td>
                        <td><?php echo $accepted_order->contact_number ?></td>
                        <td><?php echo $accepted_order->delivery_address ?></td>
                        <td><button class="delete"><i class="fa-solid fa-download"></i><a download="<?php echo $accepted_order->prescription ?>"  href="<?php echo URLROOT?>/img/prescriptions/<?php echo $accepted_order->prescription ?>">Download</a></button></td>
                        <td><?php echo $accepted_order->accepted_date_and_time ?></td>
                        <td><?php echo $accepted_order->pharmacist_note ?></td>
                        <td>
                            <form action="<?php echo URLROOT ?>/Patient/payForOrder/<?php echo $accepted_order->order_id ?>/<?php echo $accepted_order->charge ?>/<?php echo $accepted_order->email ?>/<?php echo $accepted_order->accepted_date_and_time ?>/<?php echo $accepted_order->pharmacist_id ?>">
                                <button class="delete"><i class="fa-solid fa-credit-card"></i>Pay!</button>
                            </form>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </section>

    <section class="table-section theme">
        <div class="table-container theme">
            <div class="table-topic-main">
                <h1>Rejected Orders</h1>
            <div class="table">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <th>Pharmacy Name</th>
                        <th>Pharmacy Contact Number</th>
                        <th>Given Prescription</th>
                        <th>Ordered Date and Time</th>
                        <!-- <th>Accepted Date and Time</th> -->
                        <th></th>
                    </tr>
                    <?php foreach($data['rejected_orders'] as $accepted_order): ?>
                    <!-- <?php if(!$accepted_order->paid_amount): ?> -->
                    <tr>
                        <td><?php echo $accepted_order->pharmacy_name ?></td>
                        <td><?php echo $accepted_order->contact_number ?></td>
                        <td><button class="delete"><i class="fa-solid fa-download"></i><a download="<?php echo $accepted_order->prescription ?>"  href="<?php echo URLROOT?>/img/prescriptions/<?php echo $accepted_order->prescription ?>">Download</a></button></td>
                        <td><?php echo $accepted_order->ordered_date_and_time ?></td>
                    </tr>
                    <!-- <?php endif; ?> -->
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </section>

    <section class="table-section theme">
        <div class="table-container theme">
            <div class="table-topic-main">
                <h1>Buying History</h1>
            <div class="table">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <th>Pharmacy Name</th>
                        <th>Delivery Address</th>
                        <th>Given Prescription</th>
                        <th>Ordered Date and Time</th>
                        <th>Paid Amount</th>
                        <th>Paid Time</th>
                        <th></th>
                    </tr>
                    <?php foreach($data['acccepted_orders'] as $accepted_order): ?>
                    <?php if($accepted_order->paid_amount): ?>
                    <tr>
                        <td><?php echo $accepted_order->pharmacy_name ?></td>
                        <td><?php echo $accepted_order->delivery_address ?></td>
                        <td><button class="delete"><i class="fa-solid fa-download"></i><a download="<?php echo $accepted_order->prescription ?>"  href="<?php echo URLROOT?>/img/prescriptions/<?php echo $accepted_order->prescription ?>">Download</a></button></td>
                        <td><?php echo $accepted_order->ordered_date_and_time ?></td>
                        <td>Rs. <?php echo $accepted_order->paid_amount ?></td>
                        <td><?php echo $accepted_order->paid_time ?></td>
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