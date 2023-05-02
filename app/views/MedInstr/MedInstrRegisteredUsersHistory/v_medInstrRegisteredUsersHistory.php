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
    <title>Registered Users history</title>
</head>
<body>
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>


    <section class="table-section-2 theme">
        <div class="table-container theme">
            <div class="table-topic-main">
                <h1>Registered Users history</h1>
            </div>
            <div class="search-section">
                <div class="search-bar">
                 
                    <form class="searchForm" action="<?php echo URLROOT;?>/MedInstrRegisteredUsersHistory/searchMedInstrRegisteredUsersHistory" method="GET">
                       <input type="text" name="search" value="<?php echo $data['search'] ?>"  placeholder="Filter registered users history by day date starting time ending time name, address">
                       <button  type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>

                </div>
            </div>
          
            <div class="table">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                      <th>Date</th>
                      <th>Starting time</th>
                      <th>Ending time</th>
                      <th>Day</th>
                      <th>Name</th>
                      <th></th>
                    </tr>
                   
                     
                    <?php foreach($data['medChannel'] as $medChannel): ?>
                        
                      <tr>
                        <td><?php echo $medChannel->date ?></td>
                        <td><?php echo $medChannel->starting_time ?></td>
                        <td><?php echo $medChannel->ending_time ?></td>
                        <td><?php echo $medChannel->day ?></td>
                        <td><?php echo $medChannel->name ?></td>

                        
                         <td>
                           <form  action="<?php echo URLROOT;?>/MedInstrRegisteredUsersHistory/viewMoreMedInstrRegisteredUsersHistory/<?php echo $medChannel->med_ins_appointment_day_id?>" method="post">
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