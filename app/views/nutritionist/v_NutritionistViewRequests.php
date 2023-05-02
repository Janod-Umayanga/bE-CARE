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
                <h1><center>Diet Plan Requests</center></h1>
            </div>

            <div class="table">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <th>Name</th> 
                        <th>Requested Date</th> 
                        <th></th>
                    </tr>
                    <?php foreach($data['req'] as $req): ?>
                    <tr>
                        <td><?php echo $req->name;?></td>
                        <td><?php echo $req->requested_date_and_time;?></td>
                        

                        <td>

                        <form action="<?php echo URLROOT; ?>/Nutritionist/getAllRequestsMore/" method="post">
                               <input type="hidden" name="request_diet_plan_id" value="<?php echo $req->request_diet_plan_id; ?>">
                              <button class="view" name="submit" type="submit">View</button>    
                        </form>

                        <form action="<?php echo URLROOT; ?>/Nutritionist/viewissueDietPlans/" method="post">
                               <input type="hidden" name="request_diet_plan_id" value="<?php echo $req->request_diet_plan_id; ?>">
                              <button class="accept" name="submit">Issue</button>
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