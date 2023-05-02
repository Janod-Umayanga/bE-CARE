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
                <h1>Sunday Registered Users</h1>
            </div>
            <div class="search-section">
                <div class="search-bar">
                 
                    <form class="searchForm" action="<?php echo URLROOT;?>/MedInstrRegisteredUsers/searchMedInstrRegisteredUsersSunday" method="GET">
                       <input type="text" name="search" value="<?php echo $data['search'] ?>"  placeholder="Filter by date address fee">
                       <button  type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>

                </div>
            </div>
          
            <?php if(!empty($data['sunday'])){ ?>

            <?php foreach($data['sunday'] as $sunday): ?>
                     
               <h1><?php echo $sunday->date; ?> | <?php echo $sunday->day; ?></h1>
                   <h4 style="color:Green;"><?php echo $sunday->address; ?> | Rs.<?php echo $sunday->fee; ?></h4>
          

            <div class="table">
                <table cellspacing="0" cellpadding="0">
                <?php $gg=1; ?>
                    <?php foreach($data['medChannel'] as $medChannel): ?>
                     <?php if($sunday->med_ins_appointment_day_id==$medChannel->med_ins_appointment_day_id){ ?>
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
                            <td><?php echo $sunday->starting_time ?></td>
                            <td><?php echo $sunday->ending_time ?></td>
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

            <?php }elseif(empty($data['timeslot'])){ ?>


<!--  -->

                              
              <div class="table">
                  <table cellspacing="0" cellpadding="0">
                     
                      
                  
                     <tr>
                        <th>Starting time</th>
                        <th>Ending time</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Contact number</th>
                        <th>Gender</th>
                     
                      </tr>
                     
                                    
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        
                      </tr>
  
                
                    </table>
              </div>


           <!--  -->




    <?php } ?>
    
        </div>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>