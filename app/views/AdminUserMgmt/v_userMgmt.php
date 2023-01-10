<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>


<div class="cRS">

           <div class="card">
               <img src="<?php echo URLROOT;?>/img/userMgmtImgs/pa2.jpg" alt="Avatar" style="width:100%">
                   <div class="container">
                     <button class="btncard btncard1am"><a href="<?php echo URLROOT;?>/AdminUserMgmt/Patient">Patient</a></button>
                    <p>No of Requested <b><?php echo $data["patient"]->patient_count ?></b></p>
                  </div>                                             
            </div>

            <div class="card">
               <img src="<?php echo URLROOT;?>/img/userMgmtImgs/d1.jpg" alt="Avatar" style="width:100%">
                   <div class="container">
                     <button class="btncard btncard1am"><a href="<?php echo URLROOT;?>/AdminUserMgmt/Doctor">Doctor</a></button>
                    <p>No of Requested <b><?php echo $data["doctor"]->doctor_count ?></b></p>
                  </div>                                             
            </div>

            <div class="card">
               <img src="<?php echo URLROOT;?>/img/userMgmtImgs/c4.jpg" alt="Avatar" style="width:100%; height:60%">
                   <div class="container">
                     <button class="btncard btncard1am"><a href="<?php echo URLROOT;?>/AdminUserMgmt/Counsellor">Counsellor</a></button>
                      <p>No of Requested <b><?php echo $data["counsellor"]->counsellor_count ?></b></p>
                  </div>
            </div>


    </div>

    <div class="cRS2">

          <div class="card2">
              <img src="<?php echo URLROOT;?>/img/userMgmtImgs/a3.jpg" alt="Avatar" style="width:100%">
                  <div class="container">
                    <button class="btncard btncard1am"><a href="<?php echo URLROOT;?>/AdminUserMgmt/admin">Admin</a></button>
                     <p>No of Requested <b><?php echo $data["admin"]->admin_count ?></b></p>
                 </div>
           </div>
      

           <div class="card2">
              <img src="<?php echo URLROOT;?>/img/userMgmtImgs/m2.jpg" alt="Avatar" style="width:100%">
                  <div class="container">
                    <button class="btncard btncard1am"><a href="<?php echo URLROOT;?>/AdminUserMgmt/meditationInstructor">Meditation Instructor</a></button>
                     <p>No of Requested <b><?php echo $data["meditationInstr"]->meditation_instructor_count ?></b></p>
                 </div>
           </div>

           <div class="card2">
              <img src="<?php echo URLROOT;?>/img/userMgmtImgs/p2.jpg" alt="Avatar" style="width:100%">
                  <div class="container">
                    <button class="btncard btncard1am"><a href="<?php echo URLROOT;?>/AdminUserMgmt/pharmacist">Pharmacist</a></button>
                     <p>No of Requested <b><?php echo $data["pharmacist"]->pharmacist_count ?></b> </p>
                 </div>
           </div>

           <div class="card2">
              <img src="<?php echo URLROOT;?>/img/userMgmtImgs/n1.jpg" alt="Avatar" style="width:100%">
                  <div class="container">
                    <button class="btncard btncard1am"><a href="<?php echo URLROOT;?>/AdminUserMgmt/nutritionist">Nutritionist</a></button>
                     <p>No of Requested <b><?php echo $data["nutritionist"]->nutritionist_count ?></b></p>
                 </div>
           </div>

    </div>



<?php require APPROOT.'/views/inc/footer.php'; ?>
