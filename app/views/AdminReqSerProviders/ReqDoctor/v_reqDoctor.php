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
    <title>Document</title>
</head>
<body>
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>


    <section class="table-section-requested theme">
        <div class="table-container theme">
            <div class="table-topic-main">
                <h1>Requested Doctors</h1>
            </div>
            <div class="search-section">
                <div class="search-bar">
                 
                    <form class="searchForm" action="<?php echo URLROOT;?>/AdminReqSerProviders/adminSearchReqDoctor" method="GET">
                       <input type="text"  name="search" value="<?php echo $data['search'] ?>"  placeholder="Filter requested doctor by first name, last name, city, type, specialization">
                       <button  type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>

                </div>
            </div>
          
            <div class="table">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Requested Date</th>
                        <th>Type</th>
                        <th>Specialization</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                   
                     
                    <?php foreach($data['doctor'] as $doctor): ?>
                        <tr>
                        <td><?php echo $doctor->first_name ?></td>
                        <td><?php echo $doctor->last_name ?></td>
                        <td><?php echo $doctor->registered_date ?></td>
                        <td><?php echo $doctor->type ?></td>
                        <td><?php echo $doctor->specialization ?></td>
                      

                        <td>
                          <form class="viewMoreForm" action="<?php echo URLROOT;?>/AdminReqSerProviders/adminViewMoreReqDoctor/<?php echo $doctor->requested_doctor_id ?>">
                              <button class="viewMore"><i class="fa-solid fa-circle-info"></i></button>
                          </form>
                        </td>


                        
                        <td>
                          <form class="verifyForm" action="<?php echo URLROOT;?>/AdminReqSerProviders/adminVerifyReqDoctor/<?php echo $doctor->requested_doctor_id ?>" method="post">
                                <button class="verify">Verify</button>
                          </form>
                        </td>

                        <td>
                          <form class="notVerifyForm" action="<?php echo URLROOT;?>/AdminReqSerProviders/adminNotVerifyReqDoctor/<?php echo $doctor->requested_doctor_id ?>" method="post">
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