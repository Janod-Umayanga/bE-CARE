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


    <section class="table-section-requested theme">
        <div class="table-container theme">
            <div class="table-topic-main">
               <h1>Requested Nutritionist</h1>
            </div>
            <div class="search-section">
                <div class="search-bar">
                 
                    <form class="searchForm" action="<?php echo URLROOT;?>/AdminReqSerProviders/adminSearchReqNutritionist" method="GET">
                       <input type="text"  name="search" value="<?php echo $data['search'] ?>"  placeholder="Filter requested nutritionist by first name, last name">
                       <button  type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>

                </div>
            </div>
          
            <div class="table">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Contact Number</th>
                      <th>Requested Date</th>
                      <th>Fee</th>
                      <th></th>
                        
                    </tr>
                   
                     
                    <?php foreach($data['nutritionist'] as $nutritionist): ?>
                        <tr>
                        <td><?php echo $nutritionist->first_name ?></td>
                        <td><?php echo $nutritionist->last_name ?></td>
                        <td><?php echo $nutritionist->contact_number ?></td>
                        <td><?php echo $nutritionist->registered_date ?></td>
                        <td><?php echo $nutritionist->fee ?></td>

                        <td>
                          <form class="viewMoreForm" action="<?php echo URLROOT;?>/AdminReqSerProviders/adminViewMoreReqNutritionist/<?php echo $nutritionist->requested_nutritionist_id ?>">
                              <button class="viewMore"><i class="fa-solid fa-circle-info"></i></button>
                          </form>
                       
                          <form class="verifyForm" action="<?php echo URLROOT;?>/AdminReqSerProviders/adminVerifyReqNutritionist/<?php echo $nutritionist->requested_nutritionist_id  ?>" method="post">
                                <button class="verify">Verify</button>
                          </form>
                        
                          <form class="notVerifyForm" action="<?php echo URLROOT;?>/AdminReqSerProviders/adminNotVerifyReqNutritionist/<?php echo $nutritionist->requested_nutritionist_id ?>" method="post">
                                <button class="notVerify">Not Verify</button>
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