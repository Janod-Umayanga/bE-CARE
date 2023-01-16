<?php require APPROOT.'/views/inc/header.php'; ?>

<?php 

if(isset($_SESSION['MedInstr_id'])){
    require APPROOT.'/views/inc/components/topnavbar.php'; 
} 

if(isset($_SESSION['MedInstr_id'])){
  $id=$_SESSION['MedInstr_id'];
}

?>


<sectionc class="sMComplaint">

      <div class="cMComplaint">

              <h1>Add Complaint</h1>

              <form action="<?php echo URLROOT;?>/Complaint/complaint/<?php echo $id ?>" method="post">
                  <div>

                      <label>Subject</label>
                      <input type="text" required="true" name="subject">

                      <label>Description</label>
                      <textarea name="description" id="description" rows="6" cols="80"></textarea><br>

                      <button type="submit" name="submit">Submit</button>

                  </div>


              </form>

      </div>

  </section>

  <?php require APPROOT.'/views/inc/footer.php'; ?>
