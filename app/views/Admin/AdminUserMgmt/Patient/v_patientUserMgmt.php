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


    <section class="table-section-userMgmt theme">
        <div class="table-container theme">
            <div class="table-topic-main">
                <h1>Patient</h1>
                <button><a href="<?php echo URLROOT;?>/AdminUserMgmt/addnewPatient">Add New </a></button>
            </div>
            <div class="search-section">
                <div class="search-bar">
                 
                    <form class="searchForm" action="<?php echo URLROOT;?>/AdminUserMgmt/adminSearchPatient" method="GET">
                       <input type="text" name="search" value="<?php echo $data['search'] ?>"  placeholder="Filter patient by first name,last name">
                       <button  type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>

                </div>
            </div>
          
            <div class="table">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Nic</th>
                        <th>Registered Date</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                   
                     
                    <?php foreach($data['patient'] as $patient): ?>
                    <tr>
                      <td><?php echo $patient->first_name ?></td>
                      <td><?php echo $patient->last_name ?></td>
                      <td><?php echo $patient->nic ?></td>
                      <td ><?php echo $patient->registered_date ?></td>
                      <?php if($patient->delete_flag==0): ?>
                        <td style="color: green;">Active</td>
                      <?php else:?>
                        <td style="color: red;">Deactive</td>
                     
                      <?php endif?>
                      



                      <td>
                        <form  action="<?php echo URLROOT;?>/AdminUserMgmt/adminViewMorePatient/<?php echo $patient->patient_id ?>">
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