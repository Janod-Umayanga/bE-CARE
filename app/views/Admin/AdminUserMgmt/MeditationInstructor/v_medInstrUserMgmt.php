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


    <section class="table-section-userMgmtDoctor theme">
        <div class="table-container theme">
            <div class="table-topic-main">
                <h1>Meditation Instructor</h1>
                <button><a href="<?php echo URLROOT;?>/AdminUserMgmt/addnewMeditationInstructor">Add New </a></button>
            </div>
            <div class="search-section">
                <div class="search-bar">
                 
                    <form class="searchForm" action="<?php echo URLROOT;?>/AdminUserMgmt/adminSearchMeditationInstructor" method="GET">
                       <input type="text" name="search" value="<?php echo $data['search'] ?>"  placeholder="Filter meditation instructor by first name, last name, city, address">
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
                    <th>city</th>
                    <th>fee</th>
                      <th>Status</th>
                      <th></th>
                    </tr>
                   
                     
                    <?php foreach($data['meditationInstructor'] as $meditationInstructor): ?>
                    <tr>
                    <td><?php echo $meditationInstructor->first_name ?></td>
                    <td><?php echo $meditationInstructor->last_name ?></td>
                    <td><?php echo $meditationInstructor->registered_date ?></td>
                    <td><?php echo $meditationInstructor->city ?></td>
                    <td><?php echo $meditationInstructor->fee ?></td>
                    
                      <?php if($meditationInstructor->delete_flag==0): ?>
                        <td style="color: green;">Active</td>
                      <?php else:?>
                        <td style="color: red;">Deactive</td>
                     
                      <?php endif?>
                      



                      <td>
                        <form  action="<?php echo URLROOT;?>/AdminUserMgmt/adminViewMoremeditationInstructor/<?php echo $meditationInstructor->meditation_instructor_id ?>">
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