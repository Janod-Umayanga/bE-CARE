<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>



<sectionc class="sViewMAMD">

      <div class="cViewMAMD">

              <h1>Complaint</h1>


              <form >
                  <div>
                      <textarea style="resize:none"  name="name" rows="18" cols="70"  ><?php echo $data['complaint']->description ?> </textarea>
                  </div>

              </form>



      </div>

  </section>





  <?php require APPROOT.'/views/inc/footer.php'; ?>
