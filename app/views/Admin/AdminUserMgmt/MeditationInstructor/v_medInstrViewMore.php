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
    <title>View Meditation Instructor </title>
</head>
<body>
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <section class="view-profile-container-userMgmtDoctorVM theme">
        <div class="card">
            
            <div class="main-image">
                <a href="<?php echo URLROOT ?>/AdminUserMgmt/meditationInstructor" class="backto-doctors"><i class="fa-solid fa-arrow-left"></i>Back to Meditation Instructors</a>
                <h1><?php echo $data['meditationInstructor']->first_name ?> <br> <?php echo $data['meditationInstructor']->last_name ?></h1>
                <div class="profile-icon"><?php echo substr($data['meditationInstructor']->first_name, 0,1) ?><?php echo substr($data['meditationInstructor']->last_name, 0,1) ?></div>
                <div class="social-media-icons">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-linkedin"></i>
                    <i class="fa-brands fa-twitter"></i>
                </div>
            </div>

            <div class="bottom">
                <ul>
                    <li>Email - <a href="mailto:<?php echo $data['meditationInstructor']->email ?>"><?php echo $data['meditationInstructor']->email ?></a></li>
                    <li>Contact number - <?php echo $data['meditationInstructor']->contact_number ?></li>
                    <li>Registered date - <?php echo $data['meditationInstructor']->registered_date ?></li>
                   
                    <li>NIC - <?php echo $data['meditationInstructor']->nic ?></li>
                    <li>Gender - <?php echo $data['meditationInstructor']->gender ?></li>
                    <li>City - <?php echo $data['meditationInstructor']->city ?></li>
                   
                    <li>Address - <?php echo $data['meditationInstructor']->address ?></li>
                    <li>Fee - <?php echo $data['meditationInstructor']->fee ?></li>
                   

                    <li>Bank Name - <?php echo $data['meditationInstructor']->bank_name ?></li>
                    <li>Account holder Name - <?php echo $data['meditationInstructor']->account_holder_name ?></li>
                    <li>Branch - <?php echo $data['meditationInstructor']->branch ?></li>
                   
                    <li>Account Number - <?php echo $data['meditationInstructor']->account_number ?></li>
                     <li>Qualification File -   <button class="qualification"><a download="<?php echo $data['meditationInstructor']->qualification_file ?>"  href="<?php echo URLROOT?>/upload/meditationInstructor_qualification/<?php echo  $data['meditationInstructor']->qualification_file ?>">Download</a></button>
               </li>
                          
                    <?php if($data['meditationInstructor']->delete_flag==0): ?>
                        <form class="deactiveForm" action="<?php echo URLROOT;?>/AdminUserMgmt/adminDeactivatedMeditationInstructor/<?php echo $data['meditationInstructor']->meditation_instructor_id ?>" method="GET">
                             <button type="submit">Deactivate</button>
                       </form>  
                       
                    <?php elseif($data['meditationInstructor']->delete_flag==1):?>
                        <form class="activeForm" action="<?php echo URLROOT;?>/AdminUserMgmt/adminActivatedMeditationInstructor/<?php echo $data['meditationInstructor']->meditation_instructor_id ?>" method="GET">
                             <button type="submit">Activate</button>
                       </form>  
                    <?php endif?>
            
                </ul>
                <div class="bottom-line"></div>
            </div>
        </div>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>

</html>


