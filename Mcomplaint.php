<?php
 include_once "Msessionfile.php";
?>
<?php
 include_once "Mheader.php";
?>


<sectionc class="sMComplaint">

      <div class="cMComplaint">

              <h1>Add Complaint</h1>

              <form action="includes/Mcomplaint.inc.php" method="post">
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
  <?php

  ?>

<?php
 include_once "Mfooter.php";
?>
