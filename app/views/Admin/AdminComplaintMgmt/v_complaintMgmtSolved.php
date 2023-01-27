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


    <section class="table-section-2 theme">
        <div class="table-container theme">
            <div class="table-topic-main">
                <h1>Solved Complaints</h1>
            </div>
           
            <div class="table">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                    <th>Name</th>
                    <th>User Type</th>
                    <th>Date</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th></th>
                    </tr>
                   
                     
                    <?php foreach($data['complaint'] as $complaint): ?>
         
         <?php if($complaint->patient_id != NULL):
              
                  foreach($data['patient'] as $patient): 
                    
                     if($complaint->patient_id==$patient->patient_id):
                         $firstname = $patient->first_name;
                         $lastname = $patient->last_name;
                         $email=$patient->email;
                         $type="Patient";
                     endif;
                  
                endforeach; 
       
        
          elseif($complaint->doctor_id != NULL):
              
              foreach($data['doctor'] as $doctor): 
                
                 if($complaint->doctor_id==$doctor->doctor_id):
                     $firstname = $doctor->first_name;
                     $lastname = $doctor->last_name;
                     $email=$doctor->email;
                     $type="Doctor";
                 endif;
              
             endforeach; 
   
             elseif($complaint->counsellor_id != NULL):
              
              foreach($data['counsellor'] as $counsellor): 
                
                 if($complaint->counsellor_id==$counsellor->counsellor_id):
                     $firstname = $counsellor->first_name;
                     $lastname = $counsellor->last_name;
                     $email=$counsellor->email;
                     $type="Counsellor";
                 endif;

                   
             endforeach; 
         
             elseif($complaint->nutritionist_id != NULL):
              
              foreach($data['nutritionist'] as $nutritionist): 
                
                 if($complaint->nutritionist_id==$nutritionist->nutritionist_id):
                     $firstname = $nutritionist->first_name;
                     $lastname = $nutritionist->last_name;
                     $email=$nutritionist->email;
                     $type="Nutritionist";
                 endif;

                   
             endforeach;
             
             
             elseif($complaint->pharmacist_id != NULL):
              
              foreach($data['pharmacist'] as $pharmacist): 
                
                 if($complaint->pharmacist_id==$pharmacist->pharmacist_id):
                     $firstname = $pharmacist->first_name;
                     $lastname = $pharmacist->last_name;
                     $email=$pharmacist->email;
                     $type="Pharmacist";
                 endif;

                   
             endforeach; 

             elseif($complaint->meditation_instructor_id != NULL):
              
              foreach($data['meditationInstr'] as $meditation_instructor): 
                
                 if($complaint->meditation_instructor_id==$meditation_instructor->meditation_instructor_id):
                     $firstname = $meditation_instructor->first_name;
                     $lastname = $meditation_instructor->last_name;
                     $email=$meditation_instructor->email;
                     $type="Meditation Instructor";
                 endif;

                   
             endforeach; 
         
          
         
             endif;?>



                    <tr>
                    <td><?php echo $firstname ?> <?php echo $lastname ?></td>
                    <td><?php echo $type ?></td>
                    <td><?php echo $complaint->complaint_date ?></td>
                    <td><?php echo $email ?></td>
                    <td><?php echo $complaint->subject ?></td>

                    <td>
                        <form action="<?php echo URLROOT ?>/AdminComplaintMgmt/viewMoreS/<?php echo  $complaint->complaint_id ?>" method="post">
                            <input type="hidden" name="first_name" value="<?php echo $firstname ?>">
                            <input type="hidden" name="last_name" value="<?php echo $lastname ?>">
                            <input type="hidden" name="type" value="<?php echo $type ?>">
                            <input type="hidden" name="email" value="<?php echo $email ?>">
                            
                              <button class="view-more"><i class="fa-solid fa-circle-info"></i></button>
                        </form>
                    </td>

                              
                   <?php endforeach;?>

                  </table>
            </div>
        </div>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>