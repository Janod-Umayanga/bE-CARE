<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>



<sectionc class="sMFeedback">

      <div class="cMFeedback">

        <h1>Feedback</h1>

        <div class="cMFeedbackAA">

          <?php foreach($data['feedback'] as $feedback): ?>
          <form  class='aaaa' action='' method='post'>

                       <?php foreach($data['patient'] as $patient): 
                        
                           if($feedback->patient_id == $patient->patient_id)
                           {?>
                              <label><?php echo $patient->first_name?> <?php echo $patient->last_name ?></label>
                        
                        <?php } endforeach; ?> 


                        <label><?php echo $feedback->feedback_date?></label>
                        <label><?php echo $feedback->description ?></label>
                                          
          </form>
          

          <?php endforeach; ?> 


       </div>

      </div>

  </section>


  <?php require APPROOT.'/views/inc/footer.php'; ?>
