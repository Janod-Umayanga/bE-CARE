<?php require APPROOT.'/views/inc/header.php'; ?>

<?php 

if(isset($_SESSION['admin_id'])){
    require APPROOT.'/views/inc/components/topnavbar.php'; 
}else if(isset($_SESSION['MedInstr_id'])){
    require APPROOT.'/views/inc/components/topnavbar.php'; 
}

?>



 <sectionc class="s">
     <div class="c">
            <h1>Contact Us</h1>
      </div>
  </section>

  
  <?php require APPROOT.'/views/inc/footer.php'; ?>
