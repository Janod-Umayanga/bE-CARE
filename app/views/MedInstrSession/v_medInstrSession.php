<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>


   <div class="cRS">

            <div class="card">
               <img src="<?php echo URLROOT;?>/img/medInstrSessionImgs/m3.jpg" alt="Avatar" style="width:100%; height:60%">
                   <div class="container">
                     <button class="btncard btncard1am"><a href="<?php echo URLROOT;?>/MedInstrSession/medInstrOldSession">Completed Sessions</a></button>
                    <p> <b><?php echo $data["noOfoldSession"]->oldSession_count ?></b></p>
                  </div>
            </div>

            <div class="card">
               <img src="<?php echo URLROOT;?>/img/medInstrSessionImgs/m4.jpg" alt="Avatar" style="width:90%; height:60%">
                   <div class="container">
                     <button class="btncard btncard1am"><a href="<?php echo URLROOT;?>/MedInstrSession/medInstrNewSession">Sessions To be Done</a></button>
                     <p> <b><?php echo $data["noOfnewSession"]->newSession_count ?></b></p>
                  </div>
            </div>


    </div>




 <?php require APPROOT.'/views/inc/footer.php'; ?>



