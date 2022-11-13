<?php
 include_once "Msessionfile.php";
?>
<?php
 include_once "Mheader.php";
?>

<?php
 require_once "./includes/dbh.inc.php";

 $id=$_POST["updateSession"];
 $result = mysqli_query($conn,"SELECT * FROM session WHERE session_id=$id");
 $row = mysqli_fetch_array($result)

 ?>


<sectionc class="sMSession">

      <div class="cMSession">

              <h1>Update Session</h1>
              <form action="Mchangesessiondetails.php" method="post">
                  <div>
                      <label>Title</label>
                      <input type="text" id="title" name="title" required="true" value="<?php echo $row["title"] ?>">

                      <label>Date</label>
                      <input type="date" id="date" name="date" required="true" value="<?php echo $row["date"] ?>">

                      <label>Starting Time</label>
                      <input type="time" id="starting_time" name="starting_time" required="true" value="<?php echo $row["starting_time"] ?>">

                      <label>Ending Time</label>
                      <input type="time" id="ending_time" name="ending_time" required="true" value="<?php echo $row["ending_time"] ?>">

                  </div>
                  <div>

                      <label>Address</label>
                      <input type="text" name="address" id="address" required="true" value="<?php echo $row["address"] ?>">

                      <label>Session Fee (Rs.)</label>
                      <input type="number" name="fee" id="fee" required="true" placeholder="1500" value="<?php echo $row["fee"] ?>">

                      <label>Description</label>
                      <textarea name="description" id="description" required="true" rows="8" cols="80"><?php echo $row["description"] ?></textarea>
                       <br>
                      <button type="submit" name="submit">Update</button>

                  </div>





              </form>


        </div>

  </section>




<?php
 include_once "Mfooter.php";
?>
