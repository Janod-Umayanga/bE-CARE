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
    <script defer src="<?php echo URLROOT; ?>/js/script.js"></script>
    <title>Document</title>
</head>
<body>
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>


    <section class="table-section-MIChangeTimeslot theme">
        <div class="table-container theme">
            <div class="table-topic-main">
                <h1>Change Timeslot</h1>
             </div>
            <div class="search-section">
                <div class="search-bar">
                 
                    <form class="searchform" action="<?php echo URLROOT;?>/MedInstrChangeTimeslot/searchMedInstrChangeTimeslot" method="GET">
                       <input type="text" name="search" value="<?php echo $data['search'] ?>"  placeholder="Filter timeslot by day starting time ending time">
                       <button  type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>

                </div>
            </div>
          
            <?php if(!empty($data['timeslot'])){ ?>

            <?php foreach($data['timeslot'] as $timeslot): ?>
              
            <div class="timeslot-section"> 
                <div class="timeslot-bar">      
            
                <h1><?php echo $timeslot->appointment_day ?>                <?php echo $timeslot->starting_time ?>  -  <?php echo $timeslot->ending_time ?></h1>
               
                
                 
                        <?php if($timeslot->continue_flag==1){ ?>
                 
                            <form  action="<?php echo URLROOT;?>/MedInstrChangeTimeslot/viewTimeslot/<?php echo $timeslot->med_timeslot_id ?>" method="post">
                                    <button class="update"  name="updatetimeslot">Update future Time slots</button>
                            </form>

                            <form  action="<?php echo URLROOT;?>/MedInstrChangeTimeslot/stopCreatingRecurringTimeslot/<?php echo $timeslot->med_timeslot_id ?>" method="post">
                                    <button class="create"  name="updatetimeslot">Stop Creating Recurring Time Slots  </button>
                            </form>

                        <?php }elseif($timeslot->continue_flag==0){ ?>
                                                                                        
                            <form  action="<?php echo URLROOT;?>/MedInstrChangeTimeslot/creatingRecurringTimeslot/<?php echo $timeslot->med_timeslot_id ?>" method="post">
                                    <button class="create"  name="updatetimeslot">Creating Recurring Time Slots  </button>
                            </form>

                            
                            
                        <?php } ?>
                 </div>       
            </div>            
                            
            <div class="table">
                <table cellspacing="0" cellpadding="0">
                   
                    
                
                   <tr>
                        <th>Date</th>
                        <th>Starting time</th>
                        <th>Ending Time</th>
                        <th>Max no. Participants</th>
                        <th></th>
                   
                    </tr>
                   
                                  
                    <?php foreach($data['appointmentday'] as $appointmentday): ?>
                    
                  <?php if($appointmentday->med_timeslot_id==$timeslot->med_timeslot_id){  ?>

                    <tr>
                    <td><?php echo $appointmentday->date ?></td>
                    <td><?php echo $appointmentday->starting_time ?></td>
                    <td><?php echo $appointmentday->ending_time ?></td>
                    <td><?php echo $appointmentday->noOfParticipants ?></td>
                    
                    <td>
                    <?php if($appointmentday->active==1){ ?>  
                    
                        <form  action="<?php echo URLROOT;?>/MedInstrChangeTimeslot/viewAppointmentDay/<?php echo $appointmentday->med_ins_appointment_day_id ?>" method="post">
                                <button class="update"  name="updateAppointment">Update</button>
                        </form>
                   
                        
                        <form action="<?php echo URLROOT;?>/MedInstrChangeTimeslot/disableAppointmentDay/<?php echo $appointmentday->med_ins_appointment_day_id ?>" method="post">
                                <button class="delete"  name="disableAppointment">Disable</button>
                        </form>

                        
                    <?php }else if($appointmentday->active==0){ ?>

                     
                          <form action="<?php echo URLROOT;?>/MedInstrChangeTimeslot/enableAppointmentDay/<?php echo $appointmentday->med_ins_appointment_day_id ?>" method="post">
                                <button class="update"  name="activateAppointment">Activate</button>
                            </form>
                     
                     
                      <?php } ?>

                    </td>
                    
                    </tr>
                   
                    <?php } ?>
                    
                   <?php endforeach;?>

              
                  </table>
            </div>
         <?php endforeach;?>

     <?php }elseif(empty($data['timeslot'])){ ?>


<!--  -->

                              
              <div class="table">
                  <table cellspacing="0" cellpadding="0">
                     
                      
                  
                     <tr>
                          <th>Date</th>
                          <th>Starting time</th>
                          <th>Ending Time</th>
                          <th>No of Participants</th>
                          <th></th>
                     
                      </tr>
                     
                                    
                      <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      
                      <td>
  
                      </td>
                      
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