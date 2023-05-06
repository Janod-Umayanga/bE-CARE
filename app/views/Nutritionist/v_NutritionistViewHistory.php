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
    <script defer src="<?php echo URLROOT; ?>/js/pushNotification.js"></script>
    <title>BeCare</title>
</head>
<body>
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <div id="notification-container"></div>
  
        <section class="table-section-Nutritionistreq theme">
        <div class="table-container theme">
            <div class="table-topic-main">
                <h1><center>History</center></h1>
            </div>

            <div class="table">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <th>Diet Plan ID</th> 
                        <th>Issued Date and Time</th> 
                        <th></th>
                    </tr>
                    <?php foreach($data['his'] as $his): ?>
                    <tr>
                        <td><?php echo $his->diet_plan_id;?></td>
                        <td><?php echo $his->issued_date_and_time;?></td>
                        <td>

                        <form action="<?php echo URLROOT; ?>/Nutritionist/nutritionistViewHistoryMore" method="post">
                               <input type="hidden" name="diet_plan_id" value="<?php echo $his->diet_plan_id; ?>">
                              <button class="view" name="submit">View</button>
                        </form>


                        
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