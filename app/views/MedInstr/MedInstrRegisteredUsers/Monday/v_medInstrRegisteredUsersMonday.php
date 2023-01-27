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


    <section class="table-section-MIRegUsers theme">
        <div class="table-container theme">
            <div class="table-topic-main">
                <h1>Monday Registered Users</h1>
            </div>
            <div class="search-section">
                <div class="search-bar">
                 
                    <form class="searchForm" action="<?php echo URLROOT;?>/MedInstrRegisteredUsers/searchMedInstrRegisteredUsersMonday" method="GET">
                       <input type="text" name="search" value="<?php echo $data['search'] ?>"  placeholder="Filter by date address fee">
                       <button  type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>

                </div>
            </div>
          

            <?php foreach($data['monday'] as $monday): ?>
                     
               <h1><?php echo $monday->date; ?> | <?php echo $monday->appointment_day; ?></h1>
                   <h4 style="color:Green;"><?php echo $monday->address; ?> | Rs.<?php echo $monday->fee; ?></h4>
          

            <div class="table">
                <table cellspacing="0" cellpadding="0">
                <?php $gg=1; ?>
                    <?php foreach($data['medChannel'] as $medChannel): ?>
                     <?php if($monday->med_timeslot_id==$medChannel->med_timeslot_id){ ?>
                        <?php if($gg==1){ ?> 
                    <tr>
                        <th>Starting time</th>
                        <th>Ending time</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Contact number</th>
                        <th>Gender</th>
                    </tr>
                    <?php $gg=0;?>
                    <?php } ?>
                     
                    <tr>
                            <td><?php echo $monday->starting_time ?></td>
                            <td><?php echo $monday->ending_time ?></td>
                            <td><?php echo $medChannel->name ?></td>
                            <td><?php echo $medChannel->age ?></td>
                            <td><?php echo $medChannel->contact_number ?></td>
                            <td><?php echo $medChannel->gender ?></td>
                          </tr>
                              
                
                          <?php }?>
                        <?php endforeach?> 

                  </table>

                
            </div>
            <?php endforeach;?>
        </div>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>