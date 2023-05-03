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


    <section class="table-section-userMgmtDoctor theme">
        <div class="table-container theme">
            <div class="table-topic-main">
                <h1>Pharmacist</h1>
                <button><a href="<?php echo URLROOT;?>/AdminUserMgmt/addnewPharmacist">Add New </a></button>
            </div>
            <div class="search-section">
                <div class="search-bar">
                 
                    <form class="searchForm" action="<?php echo URLROOT;?>/AdminUserMgmt/adminSearchPharmacist" method="GET">
                       <input type="text" name="search" value="<?php echo $data['search'] ?>"  placeholder="Filter Pharmacist by first name, last name, pharmacy name, city, address">
                       <button  type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>

                </div>
            </div>
          
            <div class="table">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Registered date</th>
                      <th>pharmacy name</th>
                      <th>city</th>
                      <th>Status</th>
                      <th></th>
                    </tr>
                   
                     
                    <?php foreach($data['pharmacist'] as $pharmacist): ?>
                      <tr>
                      <td><?php echo $pharmacist->first_name ?></td>
                      <td><?php echo $pharmacist->last_name ?></td>
                      <td><?php echo $pharmacist->registered_date ?></td>
                      <td><?php echo $pharmacist->pharmacy_name ?></td>
                      <td><?php echo $pharmacist->city ?></td>
                      
                      <?php if($pharmacist->delete_flag==0): ?>
                        <td style="color: green;">Active</td>
                      <?php else:?>
                        <td style="color: red;">Deactive</td>
                     
                      <?php endif?>
                      



                      <td>
                        <form  action="<?php echo URLROOT;?>/AdminUserMgmt/adminViewMorePharmacist/<?php echo $pharmacist->pharmacist_id ?>">
                            <button class="view-more"><i class="fa-solid fa-circle-info"></i></button>
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