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
    <script defer src="script.js"></script>
    <script defer src="<?php echo URLROOT; ?>/js/adminpayment.js"></script>
   
    <title>Document</title>
</head>
<body>
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>


    <section class="table-section-adminPayment theme">
        <div class="table-container theme">
            <div class="table-topic-main">
                <h1>Payments</h1>
              
               
                <?php if(empty($data['search'])): ?>
                    <?php if(empty($data['profit']->profit)){$data['profit']->profit=0; } ?>

                    <h1> <?php echo $data['period'] ?> <?php echo $data['service'] ?> Profit Rs. <?php echo $data['profit']->profit ?></h1>
                <!-- <button><a href="">Payment Report </a></button> -->
                <?php endif ?>
            </div>
            <div class="search-section">
                <div class="search-bar">
             
               <form action="<?php echo URLROOT?>/AdminPayments/doctorChannelPaymentsSearch" class="search-form-pharmacy" method="GET">
                <select name="service" id="service">
                    <option value="doctorChannel">Doctor Channel</option>
                    <option value="">Counsellor Channel</option>
                    <option value="">Nutritionist DietPlan</option>
                    <option value="">Med Instructor Registration </option>
                    <option value="">Pharmacist Order</option>
                    <option value="">Session Registration</option>
                    
                </select>
                <select name="period" id="period">
                    <option value="transactionPeriod">Transaction Period</option>
                    <option value="today">Today</option>
                    <option value="yesterday">Yesterday</option>
                    <option value="thisMonth">This Month</option>
                    <option value="thisYear">This Year</option>
                </select>
               
                <div class="main-search">
                    <input type="text" name="search" placeholder="Filter by Service provider.."  value="<?php echo $data['search'] ?>" >
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>

               </form>

                 

                </div>
            </div>
          
            <div class="table">
                <table cellspacing="0" cellpadding="0">

                     <tr>
                        <th>Service Provider Name</th>
                        <th>Total Fee</th>
                        <th>Service Provider Fee</th>
                        <th>Profit</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                   
                    <?php if(isset($_SESSION['payment_table'])): ?>

                     <?php foreach($data['docChannel'] as $docChannel): ?>
                     
                    <tr>
                        <td>Dr. <?php echo $docChannel->first_name?> <?php echo $docChannel->last_name?></td>
                        <td><?php echo $docChannel->paid_amount?></td>
                        <td><?php echo ($docChannel->paid_amount/110)*100?></td>
                        <td><?php echo ($docChannel->paid_amount/110)*10?></td>
                        <td><?php echo $docChannel->date?> <?php echo $docChannel->time?> </td>
                        
                      <td>
                        <form  action="<?php echo URLROOT?>/AdminPayments/doctorChannelViewMore/<?php echo $docChannel->doctor_channel_id ?>">
                            <button class="view-more"><i class="fa-solid fa-circle-info"></i></button>
                        </form>
                      </td>

                    </tr>
                   
                    <?php endforeach ?>

                   <?php endif; ?>
                
     
                  </table>
            </div>
        </div>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>