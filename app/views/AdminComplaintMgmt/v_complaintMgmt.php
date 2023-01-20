<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>



 <sectionc class="sAdminAM">
     <div class="cAdminAM">
            <h1>Complaints</h1>
         <div class="amAdmintable">


            <table id="reg">
              <tr>
                <th>Name</th>
                <th>User Type</th>
                <th>Date</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Cpmplaint</th>


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
                    <form action="<?php echo URLROOT ?>/AdminComplaintMgmt/viewMore/<?php echo  $complaint->complaint_id ?>" method="post">
                         <input type="hidden" name="first_name" value="<?php echo $firstname ?>">
                         <input type="hidden" name="last_name" value="<?php echo $lastname ?>">
                         <input type="hidden" name="type" value="<?php echo $type ?>">
                         <input type="hidden" name="email" value="<?php echo $email ?>">
                         
                        <button  name="submit" class="buttonamDownload button1amDownload">View</button>
                    </form>
                </td>

                  <tr>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>

                 <td></td>
                 <td></td>
                 
                  <td>

                  </td>


                 </tr>

              

                 <?php endforeach; ?> 
         
               


           </table>
     </div>
      </div>
  </section>




<?php require APPROOT.'/views/inc/footer.php'; ?>
