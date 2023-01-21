<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>




<div class="form-container">

   <div class="form-header">
          <center> <h1>Users Signup</h1> </center>
   </div>

   <form action="<?php echo URLROOT?>/Users/register" method="post" enctype="multipart/form-data">
      

      <div class="form-drag-area">
         <div class="icon">
            <img src="<?php echo URLROOT;?>/img/components/imageUpload/placeholder-icon.png" alt="placeholder" width="90px" height="90px" id="profile_image_placeholder">
         </div>
          
          <div class="right-content">
             <div class="description">Drag & Drop to upload file</div>
             <div class="form-upload">
               <input type="file" name="profile_image" id="profile_image" style="display:none;">
               Browse File
             </div>
          </div> 
      </div>

      
      <div class="form-validation">
            <div class="profile-image-validation">
               <img src="<?php echo URLROOT;?>/img/components/imageUpload/green-tick-icon.png" alt="green-tick" width="15px" height="15px">
               Select a Profile Image 
            </div>
      </div>
      <span class="form-invalid"><?php echo $data['profile_image_err'] ?></span>


      <div class="form-input-title">Name  </div>
      <input type="text" name="name" id="name" class="name" value="<?php echo $data['name']; ?>">
      <span class="form-invalid"><?php echo $data['name_err'] ?></span>

      <div class="form-input-title">Email  </div>
      <input type="text" name="email" id="email" class="email" value="<?php echo $data['email']; ?>">
      <span class="form-invalid"><?php echo $data['email_err'] ?></span>

      <div class="form-input-title">password  </div>
      <input type="password" name="password" id="password" class="password" value="<?php echo $data['password']; ?>">
      <span class="form-invalid"><?php echo $data['password_err'] ?></span>

      <div class="form-input-title">Confirm password </div>
      <input type="password" name="confirm_password" id="confirm_password" class="confirm_password" value="<?php echo $data['confirm_password']; ?>" >
      <span class="form-invalid"><?php echo $data['confirm_password_err'] ?></span>
      <br><br>

      <input type="submit" value="Register" class="form-btn">
   </form>
   
</div>

<script type="text/javaScript" src="<?php echo URLROOT; ?>/js/components/imageUpload/imageUpload.js"></script>


<?php require APPROOT.'/views/inc/footer.php'; ?>
