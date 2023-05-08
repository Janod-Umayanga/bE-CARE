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
    <title>View Complaint </title>
</head>
<body>
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <section class="view-profile-container-complaintMgmtViewMore theme">
        <div class="card">
            <div class="main-image">
                <a href="<?php echo URLROOT ?>/AdminComplaintMgmt/solvedComplaint" class="backto-doctors"><i class="fa-solid fa-arrow-left"></i>Back to Solved Complaints</a>
                <h1><?php echo $data['first_name'] ?> <br> <?php echo $data['last_name'] ?></h1>
                <div class="profile-icon"><?php echo substr($data['first_name'], 0,1) ?><?php echo substr($data['last_name'], 0,1) ?></div>
                
                 <!-- second argument is the starting position 
                 third argument is the length of the extracted substring  -->


            </div>
            <div class="bottom">
                <ul>
                    <li>Subject - <?php echo $data['complaint']->subject ?></li>
                    <li>Date - <?php echo $data['complaint']->complaint_date ?></li>
                    <li>Email - <a href="mailto:<?php echo $data['email'] ?>"></a><?php echo $data['email'] ?></li>
                    <li>Complaint <br><br> <?php echo $data['complaint']->description ?></li>
                    <li>Solved By <br><br>   </li>             
                    <li>Admin Name - <?php echo $data['complaint']->first_name  ?>  <?php echo $data['complaint']->last_name  ?></li>
                    <li>Admin email - <?php echo $data['complaint']->email  ?></li>
                  
                
                   
                </ul>
                <div class="bottom-line"></div>
            </div>
        </div>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>