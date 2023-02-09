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


    <section class="table-section-CounsellorSessionRegUsers theme">
        <div class="table-container theme">
            <div class="table-topic-main">
                <h1>Registered Users</h1>
            </div>
            <div class="search-section">
                <div class="search-bar">
                 
                    <form class="searchform" action="<?php echo URLROOT;?>/CounsellorSession/searchCounsellorNewSessionRegUsers" method="GET">
                       <input type="text" name="search" value="<?php echo $data['search'] ?>"  placeholder="Filter registered users by name, age">
                       <button  type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>

                </div>
            </div>
          
            <div class="table">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                      <th>Name</th>
                      <th>Contact Number</th>
                      <th>Age</th>
                      <th>Gender</th>
                      <th>Registered Date and Time</th>
                    </tr>
                   
                    <?php foreach($data['sessionRegUser'] as $sessionRegUser): ?>
                      <tr>
                          <td><?php echo $sessionRegUser->name ?></td>
                          <td><?php echo $sessionRegUser->contact_number ?></td>
                          <td><?php echo $sessionRegUser->age ?></td>
                          <td><?php echo $sessionRegUser->gender?></td>
                          <td><?php echo $sessionRegUser->registered_date_and_time ?></td>
                        
                      </tr>
                                      
                   <?php endforeach;?>

                  </table>
            </div>
        </div>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>