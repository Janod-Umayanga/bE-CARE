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
    <script defer src="<?php echo URLROOT; ?>/js/adminpayment.js"></script>
   
    <title>Document</title>
</head>
<body>
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>


    <section class="table-section-adminPayment theme">
        <div class="table-container theme">
            <div class="table-topic-main">
                <h1>Payments</h1>
              
                          
             
            <h1>
                <?php if(empty($data['search'])){ ?> 
                
                <?php if(empty($data['profit']->profit)){$data['profit']->profit=0; } ?>
                <?php echo $data['period'] ?>  <?php echo $data['profit']->no ?> <?php echo $data['service'] ?> , Rs. <?php echo Round($data['profit']->profit,2) ?> Profit
         
            <?php } ?>        
            
            </h1>

            </div>
            <div class="search-section">
                <div class="search-bar">
             
               <form action="<?php echo URLROOT?>/AdminPayments/doctorChannelPaymentsSearch" class="search-form-pharmacy" method="GET">
                <select name="service" id="service">
                    <option value="doctorChannel">Doctor Channel</option>
                    <option value="counsellorChannel">Counsellor Channel</option>
                    <option value="nutritionistDietPlan">Nutritionist DietPlan</option>
                    <option value="medInstructorRegistration">Med Instruction Registration </option>
                    <option value="pharmacistOrder">Pharmacist Order</option>
                    <option value="sessionRegistration">Session Registration</option>
                    
                </select>
                <select name="period" id="period">
                    <option value="transactionPeriod">Transaction Period</option>
                    <option value="today">Today</option>
                    <option value="yesterday">Yesterday</option>
                    <option value="thisMonth">This Month</option>
                    <option value="thisYear">This Year</option>
                </select>
               
                <div class="main-search">
                    <input type="text" name="search" placeholder="Filter by Service provider "  value="<?php echo $data['search'] ?>" >
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>


                
               </form>

               <!-- Generate Report Button -->
          
               <?php if(empty($data['search']) ): ?>

                  <form  action="<?php echo URLROOT?>/AdminPayments/generateReport" method="POST">
                         <button class="view-more" type="submit"><i class="fa-solid fa-file-invoice">Generate Report</i></button>
                  </form>
                  
               <?php endif ?>


                </div>
            </div>
          
            <div class="table">
                <table cellspacing="0" cellpadding="0">

                     <tr>
                        <th>Service Provider Name</th>
                        <th>Total Fee</th>
                        <th>Service Provider Fee</th>
                        <th>Profit</th>
                        <th>Date</th>
                        <th></th>
                    </tr>

                    <!-- Doctor Channel Payments Table -->
                    
                    <?php if($_SESSION['payment_table']=='doctorChannelPayments'): ?>

                     <?php foreach($data['docChannel'] as $docChannel): ?>
                     
                    <tr>
                        <td>Dr. <?php echo $docChannel->first_name?> <?php echo $docChannel->last_name?></td>
                        <td><?php echo Round($docChannel->paid_amount,2)?></td>
                        <td><?php echo Round(($docChannel->paid_amount/110)*100,2)?></td>
                        <td><?php echo Round(($docChannel->paid_amount/110)*10,2)?></td>
                        <td><?php echo $docChannel->paid_time?> </td>
                        
                      <td>
                        <form  action="<?php echo URLROOT?>/AdminPayments/doctorChannelViewMore/<?php echo $docChannel->doctor_channel_id ?>">
                            <button class="view-more"><i class="fa-solid fa-circle-info"></i></button>
                        </form>
                      </td>
                               
                    </tr>
                   
                    <?php endforeach ?>

                   <?php endif; ?>

                   <!-- Counsellor Channel Payments Table-->

                   <?php if($_SESSION['payment_table']=='counsellorChannelPayments'): ?>

                    <?php foreach($data['counsellorChannel'] as $counsellorChannel): ?>

                    <tr>
                    <td>Dr. <?php echo $counsellorChannel->first_name?> <?php echo $counsellorChannel->last_name?></td>
                    <td><?php echo Round($counsellorChannel->paid_amount)?></td>
                    <td><?php echo Round(($counsellorChannel->paid_amount/110)*100)?></td>
                    <td><?php echo Round(($counsellorChannel->paid_amount/110)*10)?></td>
                    <td><?php echo $counsellorChannel->paid_time?> </td>
                    
                    <td>
                    <form  action="<?php echo URLROOT?>/AdminPayments/counsellorChannelViewMore/<?php echo $counsellorChannel->counsellor_channel_id ?>">
                        <button class="view-more"><i class="fa-solid fa-circle-info"></i></button>
                         <input type="hidden" name="service" value="<?php echo $data['correctservice'] ?>">
                         <input type="hidden" name="period" value="<?php echo $data['correctperiod'] ?>">
                         <input type="hidden" name="search" value="<?php echo $data['search'] ?>">
                         
                    </form>
                    </td>

                    </tr>

                    <?php endforeach ?>

                    <?php endif; ?>

                    <!-- Nutritionist Diet Plan Payments Table-->

                    <?php if($_SESSION['payment_table']=='nutritionistDietPlanPayments'): ?>

                    <?php foreach($data['nutritionistDietPlan'] as $nutritionistDietPlan): ?>

                    <tr>
                    <td>Dr. <?php echo $nutritionistDietPlan->first_name?> <?php echo $nutritionistDietPlan->last_name?></td>
                    <td><?php echo Round($nutritionistDietPlan->paid_amount)?></td>
                    <td><?php echo Round(($nutritionistDietPlan->paid_amount/110)*100)?></td>
                    <td><?php echo Round(($nutritionistDietPlan->paid_amount/110)*10)?></td>
                    <td><?php echo $nutritionistDietPlan->requested_date_and_time?> </td>
                    
                    <td>
                    <form  action="<?php echo URLROOT?>/AdminPayments/nutritionistDietPlanViewMore/<?php echo $nutritionistDietPlan->request_diet_plan_id ?>">
                        <button class="view-more"><i class="fa-solid fa-circle-info"></i></button>
                         <input type="hidden" name="service" value="<?php echo $data['correctservice'] ?>">
                         <input type="hidden" name="period" value="<?php echo $data['correctperiod'] ?>">
                         <input type="hidden" name="search" value="<?php echo $data['search'] ?>">
                         
                    </form>
                    </td>

                    </tr>

                    <?php endforeach ?>

                    <?php endif; ?>

                 
                    <!-- Pharmacist Order Payments Table-->

                    <?php if($_SESSION['payment_table']=='pharmacistOrderPayments'): ?>

                    <?php foreach($data['pharmacistOrder'] as $pharmacistOrder): ?>


                    <tr>
                    <td><?php echo $pharmacistOrder->gender ?>. <?php echo $pharmacistOrder->first_name?> <?php echo $pharmacistOrder->last_name?></td>
                    <td><?php echo Round($pharmacistOrder->charge,2)?></td>
                    <td><?php echo Round(($pharmacistOrder->charge/110)*100,2)?></td>
                    <td><?php echo Round(($pharmacistOrder->charge/110)*10,2)?></td>
                    <td><?php echo $pharmacistOrder->paid_time?> </td>
                    
                    <td>
                    <form  action="<?php echo URLROOT?>/AdminPayments/pharmacistOrderViewMore/<?php echo $pharmacistOrder->order_id ?>">
                        <button class="view-more"><i class="fa-solid fa-circle-info"></i></button>
                         <input type="hidden" name="service" value="<?php echo $data['correctservice'] ?>">
                         <input type="hidden" name="period" value="<?php echo $data['correctperiod'] ?>">
                         <input type="hidden" name="search" value="<?php echo $data['search'] ?>">
                         
                    </form>
                    </td>

                    </tr>

                    <?php endforeach ?>

                    <?php endif; ?>




                   <!-- Med Instructor Registration Payments Table-->

                   <?php if($_SESSION['payment_table']=='medInstructorRegistrationPayments'): ?>

                    <?php foreach($data['medInstructorRegistration'] as $medInstructorRegistration): ?>


                    <tr>
                    <td><?php echo $medInstructorRegistration->gender ?> <?php echo $medInstructorRegistration->first_name?> <?php echo $medInstructorRegistration->last_name?></td>
                    <td><?php echo Round($medInstructorRegistration->paid_amount,2)?></td>
                    <td><?php echo Round(($medInstructorRegistration->paid_amount/110)*100,2)?></td>
                    <td><?php echo Round(($medInstructorRegistration->paid_amount/110)*10,2)?></td>
                    <td><?php echo $medInstructorRegistration->paid_time?> </td>
                    
                    <td>
                    <form  action="<?php echo URLROOT?>/AdminPayments/medInstructorRegistrationViewMore/<?php echo $medInstructorRegistration->med_ins_registration_id ?>">
                        <button class="view-more"><i class="fa-solid fa-circle-info"></i></button>
                         <input type="hidden" name="service" value="<?php echo $data['correctservice'] ?>">
                         <input type="hidden" name="period" value="<?php echo $data['correctperiod'] ?>">
                         <input type="hidden" name="search" value="<?php echo $data['search'] ?>">
                         
                    </form>
                    </td>

                    </tr>

                    <?php endforeach ?>

                    <?php endif; ?>


                    <!-- Session Registration Counsellor table -->

                   <?php if($_SESSION['payment_table']=='sessionRegistrationPayments'): ?>

                    <?php foreach($data['sessionRegistration'] as $session_registration): ?>
                   
                    <?php if(isset($session_registration->counsellor_id)){ ?>

                    <tr>
                    <td>Dr. <?php echo $session_registration->counsellor_first_name?> <?php echo $session_registration->counsellor_last_name?></td>
                    <td><?php echo Round($session_registration->paid_amount,2)?></td>
                    <td><?php echo Round(($session_registration->paid_amount/110)*100,2)?></td>
                    <td><?php echo Round(($session_registration->paid_amount/110)*10,2)?></td>
                    <td><?php echo $session_registration->registered_date_and_time?> </td>
                    
                    <td>
                    <form  action="<?php echo URLROOT?>/AdminPayments/sessionRegistrationCounsellorViewMore/<?php echo $session_registration->session_registration_id ?>">
                        <button class="view-more"><i class="fa-solid fa-circle-info"></i></button>
                         <input type="hidden" name="service" value="<?php echo $data['correctservice'] ?>">
                         <input type="hidden" name="period" value="<?php echo $data['correctperiod'] ?>">
                         <input type="hidden" name="search" value="<?php echo $data['search'] ?>">
                         
                    </form>
                    </td>

                    </tr>

                     <!-- Session Registration Nutritionist table -->

                   <?php }else if(isset($session_registration->nutritionist_id)){ ?> 


                    <tr>
                    <td>Dr. <?php echo $session_registration->nutritionist_first_name?> <?php echo $session_registration->nutritionist_last_name?></td>
                    <td><?php echo Round($session_registration->paid_amount,2)?></td>
                    <td><?php echo Round(($session_registration->paid_amount/110)*100,2)?></td>
                    <td><?php echo Round(($session_registration->paid_amount/110)*10,2)?></td>
                    <td><?php echo $session_registration->registered_date_and_time?> </td>
                    
                    <td>
                    <form  action="<?php echo URLROOT?>/AdminPayments/sessionRegistrationNutritionistViewMore/<?php echo $session_registration->session_registration_id ?>">
                        <button class="view-more"><i class="fa-solid fa-circle-info"></i></button>
                         <input type="hidden" name="service" value="<?php echo $data['correctservice'] ?>">
                         <input type="hidden" name="period" value="<?php echo $data['correctperiod'] ?>">
                         <input type="hidden" name="search" value="<?php echo $data['search'] ?>">
                         
                    </form>
                    </td>

                    </tr>

                     <!-- Session Registration Meditation Instructor table -->

                   <?php }else if(isset($session_registration->meditation_instructor_id)){ ?> 
                    
            
                    <tr>
                    <td><?php echo $session_registration->gender?> . <?php echo $session_registration->first_name?> <?php echo $session_registration->last_name?></td>
                    <td><?php echo Round($session_registration->paid_amount,2)?></td>
                    <td><?php echo Round(($session_registration->paid_amount/110)*100,2)?></td>
                    <td><?php echo Round(($session_registration->paid_amount/110)*10,2)?></td>
                    <td><?php echo $session_registration->registered_date_and_time?> </td>
                    
                    <td>
                    <form  action="<?php echo URLROOT?>/AdminPayments/sessionRegistrationMedInstructorViewMore/<?php echo $session_registration->session_registration_id ?>">
                        <button class="view-more"><i class="fa-solid fa-circle-info"></i></button>
                         <input type="hidden" name="service" value="<?php echo $data['correctservice'] ?>">
                         <input type="hidden" name="period" value="<?php echo $data['correctperiod'] ?>">
                         <input type="hidden" name="search" value="<?php echo $data['search'] ?>">
                         
                    </form>
                    </td>

                    </tr>


                   <?php }?>
         

                   

                    <?php endforeach ?>

                    <?php endif; ?>





                  </table>
            </div>
        </div>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>