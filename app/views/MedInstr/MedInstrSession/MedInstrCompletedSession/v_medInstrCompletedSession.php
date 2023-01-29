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


    <section class="table-section-MISession theme">
        <div class="table-container theme">
            <div class="table-topic-main">
                <h1>Completed Sessions</h1>
            </div>
            <div class="search-section">
                <div class="search-bar">
                 
                    <form class="searchform" action="<?php echo URLROOT;?>/MedInstrSession/searchMedInstrOldSession" method="GET">
                       <input type="text" name="search" value="<?php echo $data['search'] ?>"  placeholder="Filter Completed sessions by title date address fee">
                       <button  type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>

                </div>
            </div>
          
            <div class="table">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                      <th>Session Title</th>
                      <th>Date</th>
                      <th>Starting Time</th>
                      <th>Ending Time</th>
                      <th></th>
                    </tr>
                   
                    <?php foreach($data['oldSession'] as $oldSession): ?>
                    <tr>
                        <td><?php echo $oldSession->title ?></td>
                        <td><?php echo $oldSession->date ?></td>
                        <td><?php echo $oldSession->starting_time ?></td>
                        <td><?php echo $oldSession->ending_time ?></td>
                          
                              
                    
                        <td>
                        <form  action="<?php echo URLROOT;?>/MedInstrSession/viewMoreMedInstrOldSession/<?php echo $oldSession->session_id?>" method="post">
                           <button class="viewMore"  name="submit">View</button>
                        </form>
                        

                        <form  action="<?php echo URLROOT;?>/MedInstrSession/viewRegUsersMedInstrOldSession/<?php echo $oldSession->session_id?>" method="post">
                          <button class="viewRegUsers"  name="regusersSession">Registered Users</button>
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