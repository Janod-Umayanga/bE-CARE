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
    <title>View Admin </title>
</head>
<body>
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <section class="view-profile-container-userMgmt theme">
        <div class="card">
            
            <div class="main-image">
                <a href="<?php echo URLROOT ?>/AdminUserMgmt/Admin" class="backto-doctors"><i class="fa-solid fa-arrow-left"></i>Back to Admin</a>
                <h1><?php echo $data['admin']->first_name ?> <br> <?php echo $data['admin']->last_name ?></h1>
                <div class="profile-icon"><?php echo substr($data['admin']->first_name, 0,1) ?><?php echo substr($data['admin']->last_name, 0,1) ?></div>
                <div class="social-media-icons">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-linkedin"></i>
                    <i class="fa-brands fa-twitter"></i>
                </div>
            </div>

            <div class="bottom">
                <ul>
                    <li>Email - <a href="mailto:<?php echo $data['admin']->email ?>"><?php echo $data['admin']->email ?></a></li>
                    <li>Contact number - <?php echo $data['admin']->contact_number ?></li>
                    <li>Registered date - <?php echo $data['admin']->registered_date ?></li>
                   
                    <li>NIC - <?php echo $data['admin']->nic ?></li>
                    <li>Title - <?php echo $data['admin']->gender ?></li>
                    <li>Bank Name - <?php echo $data['admin']->bank_name ?></li>
                 
                    <li>Account holder Name - <?php echo $data['admin']->account_holder_name ?></li>
                    <li>Branch - <?php echo $data['admin']->branch ?></li>
                    <li>Account Number - <?php echo $data['admin']->account_number ?></li>
                

                    <?php if($data['admin']->admin_id!=1): ?>
                      
                    <?php if($data['admin']->delete_flag==0): ?>
                        <form class="deactiveForm" action="<?php echo URLROOT;?>/AdminUserMgmt/adminDeactivatedAdmin/<?php echo $data['admin']->admin_id ?>" method="GET">
                             <button type="submit">Deactivate</button>
                       </form>  
                       
                    <?php elseif($data['admin']->delete_flag==1):?>
                        <form class="activeForm" action="<?php echo URLROOT;?>/AdminUserMgmt/adminActivatedAdmin/<?php echo $data['admin']->admin_id ?>" method="GET">
                             <button type="submit">Activate</button>
                       </form>  
                    
                    
                     <?php endif?> 
                   
                     <?php endif?>

                </ul>
                <div class="bottom-line"></div>
            </div>
        </div>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>