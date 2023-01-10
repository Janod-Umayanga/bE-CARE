<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>


<div class="cRS">

            <div class="card">
               <img src="<?php echo URLROOT;?>/img/reqserviceProvImgs/d1.jpg" alt="Avatar" style="width:100%">
                   <div class="container">
                     <button class="btncard btncard1am"><a href="<?php echo URLROOT;?>/AdminReqSerProviders/adminReqDoctor">Doctor</a></button>
                    <p>No of Requested <b><?php echo $data["doctor"]->doctor_count ?></b></p>
                  </div>                                             
            </div>

            <div class="card">
               <img src="<?php echo URLROOT;?>/img/reqserviceProvImgs/c4.jpg" alt="Avatar" style="width:100%; height:60%">
                   <div class="container">
                     <button class="btncard btncard1am"><a href="<?php echo URLROOT;?>/AdminReqSerProviders/adminReqCounsellor">Counsellor</a></button>
                      <p>No of Requested <b><?php echo $data["counsellor"]->counsellor_count ?></b></p>
                  </div>
            </div>


    </div>

    <div class="cRS2">

           <div class="card2">
              <img src="<?php echo URLROOT;?>/img/reqserviceProvImgs/n1.jpg" alt="Avatar" style="width:100%">
                  <div class="container">
                    <button class="btncard btncard1am"><a href="<?php echo URLROOT;?>/AdminReqSerProviders/adminReqNutritionist">Nutritionist</a></button>
                     <p>No of Requested <b><?php echo $data["nutritionist"]->nutritionist_count ?></b></p>
                 </div>
           </div>


           <div class="card2">
              <img src="<?php echo URLROOT;?>/img/reqserviceProvImgs/m2.jpg" alt="Avatar" style="width:100%">
                  <div class="container">
                    <button class="btncard btncard1am"><a href="<?php echo URLROOT;?>/AdminReqSerProviders/adminReqMeditationInstructor">Meditation Instructor</a></button>
                     <p>No of Requested <b><?php echo $data["meditationInstr"]->meditation_instructor_count ?></b></p>
                 </div>
           </div>

           <div class="card2">
              <img src="<?php echo URLROOT;?>/img/reqserviceProvImgs/p2.jpg" alt="Avatar" style="width:100%">
                  <div class="container">
                    <button class="btncard btncard1am"><a href="<?php echo URLROOT;?>/AdminReqSerProviders/adminReqPharmacist">Pharmacist</a></button>
                     <p>No of Requested <b><?php echo $data["pharmacist"]->pharmacist_count ?></b> </p>
                 </div>
           </div>

    </div>



<?php require APPROOT.'/views/inc/footer.php'; ?>
