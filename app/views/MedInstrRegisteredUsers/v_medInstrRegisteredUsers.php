<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>

   
<div class="cRS">
            <?php if($data['monday']->d1  > 0){?>
            <div class="card">
               <img src="<?php echo URLROOT;?>/img/medInstrRegisteredUsersImgs/mm5.jpg" alt="Avatar" style="width:90%; height:60%">
                   <div class="container">
                     <button class="btncard btncard1am"><a href="<?php echo URLROOT;?>/MedInstrRegisteredUsers/mondayRegisteredUsers">Monday</a></button>

                  </div>
            </div>

          <?php } if($data['tuesday']->d2 >0) { ?>


            <div class="card">
               <img src="<?php echo URLROOT;?>/img/medInstrRegisteredUsersImgs/m4.jpg" alt="Avatar" style="width:90%; height:60%">
                   <div class="container">
                     <button class="btncard btncard1am"><a href="<?php echo URLROOT;?>/MedInstrRegisteredUsers/tuesdayRegisteredUsers">Tuesday</a></button>
                  </div>
            </div>

          <?php }if($data['wednesday']->d3 >0) { ?>

            <div class="card">
               <img src="<?php echo URLROOT;?>/img/medInstrRegisteredUsersImgs/mm3.jpg" alt="Avatar" style="width:70%; height:60%">
                   <div class="container">
                     <button class="btncard btncard1am"><a href="<?php echo URLROOT;?>/MedInstrRegisteredUsers/wednesdayRegisteredUsers">Wednesday</a></button>

                  </div>
            </div>


    </div>

    <div class="cRS2">

    <?php }if($data['thursday']->d4 >0) { ?>

             <div class="card">
                <img src="<?php echo URLROOT;?>/img/medInstrRegisteredUsersImgs/mm8.jpg" alt="Avatar" style="width:70%; height:60%">
                    <div class="container">
                      <button class="btncard btncard1am"><a href="<?php echo URLROOT;?>/MedInstrRegisteredUsers/thursdayRegisteredUsers">Thursday</a></button>

                   </div>
             </div>

        <?php }if($data['friday']->d5 >0) { ?>

             <div class="card">
                <img src="<?php echo URLROOT;?>/img/medInstrRegisteredUsersImgs/m5.jpg" alt="Avatar" style="width:90%; height:60%">
                    <div class="container">
                      <button class="btncard btncard1am"><a href="<?php echo URLROOT;?>/MedInstrRegisteredUsers/fridayRegisteredUsers">Friday</a></button>

                   </div>
             </div>

        <?php }if($data['saturday']->d6 >0) { ?>

             <div class="card">
                <img src="<?php echo URLROOT;?>/img/medInstrRegisteredUsersImgs/m1.jpg" alt="Avatar" style="width:90%; height:60%">
                    <div class="container">
                      <button class="btncard btncard1am"><a href="<?php echo URLROOT;?>/MedInstrRegisteredUsers/saturdayRegisteredUsers">Saturday</a></button>

                   </div>
             </div>

       <?php }if($data['sunday']->d7 >0) { ?>

             <div class="card">
                <img src="<?php echo URLROOT;?>/img/medInstrRegisteredUsersImgs/mm9.jpg" alt="Avatar" style="width:90%; height:60%">
                    <div class="container">
                      <button class="btncard btncard1am"><a href="<?php echo URLROOT;?>/MedInstrRegisteredUsers/sundayRegisteredUsers">Sunday</a></button>

                   </div>
             </div>
       <?php } if(($data['monday']->d1==0) &&($data['tuesday']->d2==0) &&($data['wednesday']->d3==0) &&($data['thursday']->d4==0) &&($data['friday']->d5==0) &&($data['saturday']->d6==0) &&($data['sunday']->d7==0)){ ?>
                  <h1>No registered users yet</h1>
       <?php }?>
     </div>




  <?php require APPROOT.'/views/inc/footer.php'; ?>
