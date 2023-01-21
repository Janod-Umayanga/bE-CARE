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
    <title>Meditation Instructor Registered Users</title>
</head>
<body>
    
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <div class="doctor-main-picture-container">
        <div class="tittle">
            <i class="fa-solid fa-stethoscope"></i>
            <h1>Meditation Instructor<br>Registered Users!</h1>
        </div>
    </div>

    <section class="doctor-cards-container theme">
        <div class="doctor-cards-topic">
            <span class="line"></span>
            <h2>Registered Users</h2>
        </div>
        <div class="card-content-fordoctors" id="to-be-show-more">
            <div class="card-page">
                
            <?php if($data['monday']->d1  > 0){?>
           
              <div class="card theme theme">
                    <div class="left theme">
                        <p></p>
                        <h2>Monday</h2>
                       
                    </div>
                    <div class="right"><br><br>
                        <h2> <b></b></h2>
                          <button class="channel-butten"><a href="<?php echo URLROOT;?>/MedInstrRegisteredUsers/mondayRegisteredUsers">View  </a></button>
                    </div>
              </div>

            
            <?php } if($data['tuesday']->d2 >0) { ?>
  
              <div class="card theme theme">
                    <div class="left theme">
                        <p></p>
                        <h2>Tuesday</h2>
                       
                    </div>
                    <div class="right"><br><br>
                        <h2> <b></b></h2>
                          <button class="channel-butten"><a href="<?php echo URLROOT;?>/MedInstrRegisteredUsers/tuesdayRegisteredUsers">View  </a></button>
                    </div>
              </div>

              <?php }if($data['wednesday']->d3 >0) { ?>

              <div class="card theme theme">
                    <div class="left theme">
                        <p></p>
                        <h2>Wednesday</h2>
                       
                    </div>
                    <div class="right"><br><br>
                        <h2> <b></b></h2>
                          <button class="channel-butten"><a href="<?php echo URLROOT;?>/MedInstrRegisteredUsers/wednesdayRegisteredUsers">View  </a></button>
                    </div>
              </div>

              <?php }if($data['thursday']->d4 >0) { ?>  

              <div class="card theme theme">
                    <div class="left theme">
                        <p></p>
                        <h2>Thursday</h2>
                       
                    </div>
                    <div class="right"><br><br>
                        <h2> <b></b></h2>
                          <button class="channel-butten"><a href="<?php echo URLROOT;?>/MedInstrRegisteredUsers/thursdayRegisteredUsers">View  </a></button>
                    </div>
              </div>

              <?php }if($data['friday']->d5 >0) { ?>

              <div class="card theme theme">
                    <div class="left theme">
                        <p></p>
                        <h2>Friday</h2>
                       
                    </div>
                    <div class="right"><br><br>
                        <h2> <b></b></h2>
                          <button class="channel-butten"><a href="<?php echo URLROOT;?>/MedInstrRegisteredUsers/fridayRegisteredUsers">View  </a></button>
                    </div>
              </div>

              <?php }if($data['saturday']->d6 >0) { ?>


              <div class="card theme theme">
                    <div class="left theme">
                        <p></p>
                        <h2>Saturday</h2>
                       
                    </div>
                    <div class="right"><br><br>
                        <h2> <b></b></h2>
                          <button class="channel-butten"><a href="<?php echo URLROOT;?>/MedInstrRegisteredUsers/saturdayRegisteredUsers">View  </a></button>
                    </div>
              </div>
            
              
              <?php }if($data['sunday']->d7 >0) { ?>


              <div class="card theme theme">
                    <div class="left theme">
                        <p></p>
                        <h2>Sunday</h2>
                       
                    </div>
                    <div class="right"><br><br>
                        <h2> <b></b></h2>
                          <button class="channel-butten"><a href="<?php echo URLROOT;?>/MedInstrRegisteredUsers/sundayRegisteredUsers">View  </a></button>
                    </div>
              </div>

              <?php } if(($data['monday']->d1==0) &&($data['tuesday']->d2==0) &&($data['wednesday']->d3==0) &&($data['thursday']->d4==0) &&($data['friday']->d5==0) &&($data['saturday']->d6==0) &&($data['sunday']->d7==0)){ ?>
                  <h1>No registered users yet</h1>
               <?php }?>
            
             
            </div>
        </div>
        <button id="show-button" class="show-button" onclick="showMore()"><span id="show-text">Show More</span><i class="fa-solid fa-angle-down" id="icon-more-orless"></i></button>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>