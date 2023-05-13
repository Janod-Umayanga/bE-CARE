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
                <h1><center>Details of Accepted Orders</center> <!--pharmacist accepted order details-->
                </h1>
            </div>
            <div class="table">
                
            <table cellspacing="0" cellpadding="0">
                    <tr> 
                        <th>Name of patient</th> 
                        <th>Accepted Date and Time</th>
                        <th></th>                       
                    </tr>
                    <?php foreach($data['Acceptedorders'] as $Acceptedorders): ?>
                        
                    <tr>
                        <td><?php echo $Acceptedorders->name?></td>
                        <td><?php echo $Acceptedorders->accepted_date_and_time?></td>
                        <td>
                        <form action="<?php echo URLROOT; ?>/Pharmacist/pharmacistViewAcceptedOrdersMore/" method="post">
                            <input type="hidden" name="order_request_id" value="<?php echo $Acceptedorders->order_request_id; ?>">
                            <button class="view" name="submit">View</button>
                        </form>       
                   
                        <button class="Prescription"><i class="fa-solid fa-download"></i><a download="<?php echo $Acceptedorders->prescription ?>"  href="<?php echo URLROOT?>/img/prescriptions/<?php echo $Acceptedorders->prescription ?>">Prescription</a></button>
                        </td>
                          
                         
            </div>                  
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