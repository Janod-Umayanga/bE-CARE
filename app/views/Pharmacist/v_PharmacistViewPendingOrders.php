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
   
    <title>BeCare</title>
</head>
<body>
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <section class="table-section-Nutritionistreq theme">
        <div class="table-container theme">
            <div class="table-topic-main">
                <h1><center>Details of Pending Orders<br>(Make sure to accept the order within one day after it is made)</center> <!--Details of pending orders(not accepted)-->
                </h1>
            </div>
            <div class="table">
                
                <table cellspacing="0" cellpadding="0">
                    <tr> 
                        <th>Name of patient</th> 
                        <th>Order Date and Time</th>
                        <th></th>
                        
                        
                    </tr>
                    <?php foreach($data['Pendingorders'] as $Pendingorders): ?>
                        
                    <tr>
                        <td><?php echo $Pendingorders->name?></td>
                        <td><?php echo $Pendingorders->ordered_date_and_time?></td>

                        <td>

                        <form action="<?php echo URLROOT; ?>/Pharmacist/pharmacistViewPendingOrdersMore/" method="post">
                            <input type="hidden" name="order_request_id" value="<?php echo $Pendingorders->order_request_id; ?>">
                            <button class="view" name="submit">View</button>
                        </form>
                
                        <button class="Prescription"><i class="fa-solid fa-download"></i><a download="<?php echo $Pendingorders->prescription ?>"  href="<?php echo URLROOT?>/img/prescriptions/<?php echo $Pendingorders->prescription ?>">Prescription</a></button>

                        <form action="<?php echo URLROOT;?>/Pharmacist/acceptOrders/<?php echo $Pendingorders->ordered_date_and_time; ?>/<?php echo $Pendingorders->order_request_id; ?>" method="post">
                            <input type="hidden" name="order_request_id" value="<?php echo $Pendingorders->order_request_id; ?>">
                            <button class="accept " name="submit" >Accept</button>
                        </form>
 
                        <!--reject button-->  
                        <form id="order-form" action="<?php echo URLROOT;?>/Pharmacist/rejectOrders/<?php echo $Pendingorders->ordered_date_and_time; ?>/<?php echo $Pendingorders->order_request_id; ?>" method="post">   
                            <button type="submit" class="reject " name="submit" >Reject</button>
                            <input type="hidden" name="order_request_id" value="<?php echo $Pendingorders->order_request_id; ?>">
                        </form> 
                         
                        </td>                       
                    </tr>
                  
                    <?php endforeach;?>
                </table>
            </div>
        </div>
    </section>
       
<?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>