<?php
 include_once "Msessionfile.php";
?>
<?php
 include_once "Mheader.php";
?>


<sectionc class="sMComplaint">

      <div class="cMComplaint">

              <h1>Add new Feedback</h1>

              <form action="includes/Mfeedback.inc.php" method="post">
                  <div>

                      <label>Feedback</label>
                      <textarea name="description" id="description" rows="6" cols="80"></textarea><br>

                      <button type="submit" name="submit" value="<?php echo $_SESSION["userMid"]?>">Submit</button>

                  </div>


              </form>

      </div>

  </section>
  <?php

  ?>

<?php
 include_once "Mfooter.php";
?>
